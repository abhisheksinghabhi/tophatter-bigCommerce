<?php
namespace frontend\modules\tophatter\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\modules\tophatter\components\BigcommerceClientHelper;

class TophatterproductstatusController extends TophattermainController
{
	public function actionGetproduct()
    {
    	$sku = $_GET['id'];
        $bigcom = new BigcommerceClientHelper("twagyxrn27mxjav4k99fbke4w5lyme7",TOKEN,STOREHASH);
        $resource= 'products/'.$sku.'?include=@summary';
        // $resource='products/9117';        
        $countUpload=$bigcom->get1($resource);
        echo "<pre>";
        print_r($countUpload);
        die("<hr>dfgj");
    }
    public function actionUpdateinventory()
    {
        $sku = $_GET['sku'];
        $bigcom = new BigcommerceClientHelper("twagyxrn27mxjav4k99fbke4w5lyme7",TOKEN,STOREHASH);
        $resource= 'products/count';
        // $resource='catalog/products?include=variants,images&limit=50&page=3';
        $countUpload=$bigcom->get1($resource);
        echo "<pre>";
        print_r($countUpload);
        die("<hr>dfgj");
    }
}