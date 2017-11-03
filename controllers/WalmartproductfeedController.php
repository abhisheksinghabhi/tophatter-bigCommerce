<?php
namespace frontend\modules\walmart\controllers;

use frontend\modules\walmart\components\Data;
use frontend\modules\walmart\components\Walmartapi;
use Yii;
use frontend\modules\walmart\models\WalmartProductFeed;
use frontend\modules\walmart\models\WalmartProductFeedSearch;
use yii\base\Exception;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WalmartproductfeedController implements the CRUD actions for WalmartProductFeed model.
 */
class WalmartproductfeedController extends WalmartmainController
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all WalmartProductFeed models.
     * @return mixed
     */
    public function actionIndex()
    {

        $searchModel = new WalmartProductFeedSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionBulkfeedstatus()
    {
        $pages = 1;
        $session = "";
        $session = Yii::$app->session;

        $feed_ids = (array)Yii::$app->request->post('selection');

        if (!empty($feed_ids)) {

            $session['feed_details'] = array('ids' => $feed_ids, 'pages' => $pages);

            return $this->render('feedupdate', [
                'totalcount' => count($feed_ids),
                'pages' => $pages
            ]);
        }
        Yii::$app->session->setFlash('error', "Please select the Feed Id");
        return $this->redirect('index');

    }

    public function actionUpdatefeedstatus()
    {
        $session = "";
        $count =0;
        $session = Yii::$app->session;
        $feed_details = $session['feed_details'];

        foreach ($feed_details['ids'] as $feed_id) {

            $query = Data::sqlRecords('SELECT status FROM `walmart_product_feed` WHERE feed_id="'.$feed_id.'"','one');

            if($query['status'] != 'PROCESSED') {

                $wal = new Walmartapi(API_USER, API_PASSWORD, CONSUMER_CHANNEL_TYPE_ID);
                $feed_data = $wal->getFeeds($feed_id);

                try {
                    if (isset($feed_data['results']) && !empty($feed_data['results'])) {
                        foreach ($feed_data['results'] as $val) {
//                $feed_date = date ( 'F jS Y \a\t g:ia', substr ( $val['feed_date'] ,0,10) );

                            if(isset($val['feedDate'])) {
                                $feed_date = date('Y-m-d H:i:s', substr($val['feedDate'], 0, 10));
                            }else{
                                $feed_date = "";
                            }
                            $model = Data::sqlRecords('UPDATE `walmart_product_feed` SET status ="' . $val['feedStatus'] . '", items_received="' . $val['itemsReceived'] . '", items_succeeded="' . $val['itemsSucceeded'] . '", items_failed="' . $val['itemsFailed'] . '", items_processing="' . $val['itemsProcessing'] . '", feed_date="' . $feed_date . '" WHERE feed_id="' . $val['feedId'] . '" AND merchant_id="' . MERCHANT_ID . '" ', null, 'update');
                            $count++;
                        }
                    }else{
                        Yii::$app->session->setFlash('error', "Something went wrong");
                    }

                } catch (Exception $e) {
                    return $returnArr['error'] = $e->getMessage();
                }

            }else {
                Yii::$app->session->setFlash('success', "Selected feeds are already PROCESSED");
            }
        }
        if($count>0) {
            $returnArr['success']['count'] = $count;
        }else{
            return true;
        }
            return json_encode($returnArr);
    }

    public function actionViewfeed($id)
    {

        $feed_detail = Data::sqlRecords("SELECT * FROM `walmart_product_feed` WHERE id='" . $id . "'", 'one');

        if (!empty($feed_detail['feed_id'])) {
            $wal = new Walmartapi(API_USER, API_PASSWORD, CONSUMER_CHANNEL_TYPE_ID);
            $feed_data = $wal->viewFeed($feed_detail['feed_id']);
        }

        return $this->render('viewfeed', ['feed_data' => $feed_data, 'feed_created_date' => $feed_detail['created_at']]);

    }

    public function actionFile($id)
    {
        $merchant_id = MERCHANT_ID;

        $query = Data::sqlRecords('SELECT feed_file FROM `walmart_product_feed` WHERE merchant_id="'.$merchant_id.'" AND id= "'.$id.'" ','one');

        if (!empty($query['feed_file']) && file_exists($query['feed_file'])){
            $file = $query['feed_file'];
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($file).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            readfile($file);
            exit;
        }
        return $this->redirect('index');

    }


    /**
     * Finds the WalmartProductFeed model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return WalmartProductFeed the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = WalmartProductFeed::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}