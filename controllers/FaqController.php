<?php
namespace frontend\modules\tophatter\controllers;

use frontend\modules\tophatter\components\Data;
use yii\helpers\Url;
use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
/**
 * FaqController
 */
class FaqController extends TophattermainController
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
    public function actionIndex()
    {
        if(Yii::$app->user->isGuest) {
            return \Yii::$app->getResponse()->redirect(\Yii::$app->getUser()->loginUrl);
        }

        try{
            $resultdata=array();
            $query="SELECT * FROM `tophatter_faq` ";        
            $resultdata = Data::sqlRecords($query,"all","select");
            
            return $this->render('index', [
                'data'=>$resultdata 
            ]);  
        }
        catch(Exception $e)
        {
            echo $e->getMessage();die;
        }     
    }

}    