<?php
namespace frontend\modules\walmart\controllers;

use Yii;
use frontend\modules\walmart\models\WalmartOrderImportError;
use frontend\modules\walmart\models\WalmartOrderImportErrorSearch;
use frontend\modules\walmart\controllers\WalmartcustomworkController;
use frontend\modules\walmart\components\Walmartapi;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WalmartorderimporterrorController implements the CRUD actions for WalmartOrderImportError model.
 */
class WalmartorderimporterrorController extends WalmartmainController
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
     * Lists all WalmartOrderImportError models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new WalmartOrderImportErrorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single WalmartOrderImportError model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new WalmartOrderImportError model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new WalmartOrderImportError();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing WalmartOrderImportError model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing WalmartOrderImportError model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the WalmartOrderImportError model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return WalmartOrderImportError the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = WalmartOrderImportError::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionCancelOrder($config=false){
    
        $merchant_id = $config ? $config['merchant_id']:Yii::$app->user->identity->id;
        if (!$config && Yii::$app->user->isGuest) {
            return \Yii::$app->getResponse()->redirect(\Yii::$app->getUser()->loginUrl);
        }
        if($config){
            $this->walmartHelper = new Walmartapi($config['consumer_id'],$config['secret_key'],$config['consumer_channel_type_id']);
        }
        $data = Yii::$app->request->queryParams;

       
        if(isset($data['pid'])){

            $order=self::Getorderdetails($data['pid']);

            if($merchant_id){
                $orderData = $order['order'];
               
                if(isset($orderData['orderLines']['orderLine']))
                {
                    $items = isset($orderData['orderLines']['orderLine'][0])?$orderData['orderLines']['orderLine']:[$orderData['orderLines']['orderLine']];
                    foreach($items as $item){
                        if (isset($item['lineNumber'])) {
                            $lineNumbers[]=$item['lineNumber'];
                        }
                        elseif(isset($item[0]['lineNumber'])){
                            $lineNumbers[]=$item[0]['lineNumber'];
                        }
                    }
                }
                $dataShip = ['shipments'=>[['cancel_items'=>[['lineNumber'=>implode(',',$lineNumbers)]]]]];
                $directory = \Yii::getAlias('@webroot').'/var/order/'.$merchant_id.'/'.$data['pid'].'/';
                if (!file_exists($directory)){
                    mkdir($directory,0775, true);
                }
                $handle = fopen($directory.'/cancel.log','a');
                fwrite($handle,'Cancel SHIP DATA : '.print_r($dataShip,true).PHP_EOL.PHP_EOL);
                $response = $this->walmartHelper->rejectOrder($data['pid'],$dataShip);

                
                if(isset($response['errors'])){
                    if(isset($response['errors']['error']))
                        Yii::$app->session->setFlash('error', $response['errors']['error']['description']);
                    else
                        Yii::$app->session->setFlash('error', 'Order Can\'t be cancelled.');
                }
                else{
                    Yii::$app->session->setFlash('error', 'Order is in cancelled status');

                }
                //var_dump($response);
                fwrite($handle,'RESPONSE:'.print_r($response,true));
                fclose($handle);
                return $this->redirect(['index']);
                //die;
            }else
            {
                Yii::$app->session->setFlash('error', 'You are not authorized to cancel this order.');
                die('You are not authorized to cancel this order');
            }
        }
    }

     public function Getorderdetails($pid)
    {
        if($pid){
            $this->walmartHelper = new Walmartapi(API_USER,API_PASSWORD,CONSUMER_CHANNEL_TYPE_ID);
            $orderdata = $this->walmartHelper->getOrder($pid);
            $shipdata = json_decode($orderdata,true);
            return $shipdata;
        }
    }
}
