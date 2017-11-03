<?php
namespace frontend\modules\walmart\controllers;
use Yii;
use frontend\modules\walmart\components\Data;
use frontend\modules\walmart\components\WalmartDataValidation;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;

/**
 * JetproductController implements the CRUD actions for JetProduct model.
 */
class WalmartvalidateController extends WalmartmainController
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
    protected $connection;
    /**
     * Lists all JetProduct models.
     * @return mixed
     */
    
    public function actionIndex()
    {
       
        if (Yii::$app->user->isGuest) {
            return \Yii::$app->getResponse()->redirect(\Yii::$app->getUser()->loginUrl);
        }
        else
        {
            $result = [];
            $count = [];
            $total = 0;
            $merchant_id = Yii::$app->user->identity->id;
            $result = WalmartDataValidation::validateData([], $merchant_id);
           
            $query = "";
            $query = "SELECT COUNT(*) as `count` from `jet_product` as `main` INNER JOIN `walmart_product` as `wp` ON `main`.`bigproduct_id`=`wp`.`product_id` where `main`.`merchant_id`= {$merchant_id}";
            //$count = $connection->createCommand($query)->queryOne();
            $count = Data::sqlRecords($query, 'all');
            $total = is_array($count) && isset($count[0]["count"])?$count[0]["count"]:0;
           
            if(count($result)>0){
                return $this->render('index', ['data' => $result]);
            }elseif(count($result)==0 && $total>0){
                Yii::$app->session->setFlash('success',"All product(s) validated successfully. No error found.");
            }else{
                Yii::$app->session->setFlash('success',"No product(s) available to validate.");
            }
         }
        return $this->redirect(['walmartproduct/index']);
    }
    
}
