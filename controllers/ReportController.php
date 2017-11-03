<?php
/**
 * Created by PhpStorm.
 * User: cedcoss
 * Date: 13/4/17
 * Time: 1:54 PM
 */
namespace frontend\modules\walmart\controllers;

use frontend\modules\walmart\components\Data;
use Yii;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;


/**
 * Walmart report detail Controller
 */
class ReportController extends WalmartmainController
{

    public function actionIndex()
    {

        $inventory_data = Data::sqlRecords("SELECT * FROM (SELECT * FROM (SELECT * FROM (SELECT `product_id` ,`product_title` FROM `walmart_product` WHERE `merchant_id`= '".MERCHANT_ID."') as `wp` INNER JOIN (SELECT title,sku,type,id,qty FROM `jet_product` WHERE `merchant_id`='".MERCHANT_ID."' ) as `jp` ON `wp`.`product_id`=`jp`.`id`) as `walmart_main` ) as `walmart_table` LEFT JOIN (SELECT * FROM (SELECT * FROM (SELECT `option_id` as `walmart_option_id` FROM `walmart_product_variants` WHERE `merchant_id`= '".MERCHANT_ID."') as `wpv` INNER JOIN (SELECT `option_id`,`option_qty`,`option_sku`,`product_id` FROM `jet_product_variants` WHERE `merchant_id`='".MERCHANT_ID."' ) as `jpv` ON `wpv`.`walmart_option_id`=`jpv`.`option_id`) as `jet_main` ) as `jet_table` ON `walmart_table`.`product_id`=`jet_table`.`product_id`", 'all');

        $header = ['PRODUCT ID', 'PRODUCT TITLE', 'PRODUCT TITLE ON WALMART', 'SKU', 'TYPE', 'ID', 'QTY', 'WALMART OPTION ID', 'OPTION ID', 'VARIANT QTY', 'VARIANT SKU'];

        $items = array();
        foreach ($inventory_data as $row) {
            $items[] = array_combine($header, $row);
        }


        $searchAttributes = ['ID', 'PRODUCT TITLE', 'SKU', 'TYPE', 'QTY', 'VARIANT QTY', 'VARIANT SKU'];
        $searchModel = [];
        $searchColumns = [];

        foreach ($searchAttributes as $searchAttribute) {
            $filterName = $searchAttribute;

            $filterValue = Yii::$app->request->getQueryParam(str_replace(' ', '_', $filterName), '');
            $searchModel[$searchAttribute] = $filterValue;

            $items = array_filter($items, function ($item) use (&$filterValue, &$searchAttribute) {

                /*if($searchAttribute == 'PRODUCT TITLE'){

                    if(empty($filterValue)){
                        $searchAttribute = 'PRODUCT TITLE ON WALMART';
                    }
                }
                if(strlen($filterValue) > 0 ? stripos('/^' . strtolower($item[$searchAttribute]) . '/', strtolower($filterValue)) : true){

                }*/
                return strlen($filterValue) > 0 ? stripos('/^' . strtolower($item[$searchAttribute]) . '/', strtolower($filterValue)) : true;
            });

        }

        /*Prepare Data For SKU by sales */

        $action='';
        if(isset($_POST['action']) && !empty($_POST['action'])){
            $action = $_POST['action'];

            $date='';$date1='';
            switch ($action) {
                case "today":
                    $date=date('Y-m-d  H:i:s');
                    $date1 = date('Y-m-d 00:00:00');
                    break;
                case "weekly":
                    $date=date('Y-m-d');
                    $date1=date('Y-m-d',strtotime('-7 days', strtotime(date('Y-m-d'))));
                    break;
                case "monthly":
                    $date=date('Y-m-d');
                    $date1=date('Y-m-d',strtotime('-30 days', strtotime(date('Y-m-d'))));
                    break;
                case "yearly":
                    $date=date('Y-m-d');
                    $date1=date('Y-m-d',strtotime('-365 days', strtotime(date('Y-m-d'))));
                    break;
            }


        }
        if(!empty($date) && !empty($date1))
        {
            $where = "WHERE `merchant_id` = '".MERCHANT_ID."' AND `created_at` BETWEEN '{$date1}' AND '{$date}' AND `status` = 'completed'";
        }else{
            $where = "WHERE `merchant_id` = '".MERCHANT_ID."' AND `status` = 'completed'";
        }

//        print_r("SELECT `sku`,`created_at`, COUNT(`purchase_order_id`) as `counter`,SUM(order_total) as revenue FROM `walmart_order_details` {$where} group by sku order by counter desc ");die;
        $order = Data::sqlRecords("SELECT `sku`,`created_at`, COUNT(`purchase_order_id`) as `counter`,SUM(order_total) as revenue FROM `walmart_order_details` {$where} group by sku order by counter desc ",'all');
        $header = ['SKU', 'CREATED AT', 'QUANTITY', 'REVENUE'];

        $order_data = array();
        foreach ($order as $row) {
            $order_data[] = array_combine($header, $row);
        }
        $searchOrderAttributes = ['SKU','CREATED AT','QUANTITY', 'REVENUE'];
        $searchOrderModel = [];
        $searchOrderColumns = [];
        /*$searchOrderColumns = [];*/

        foreach ($searchOrderAttributes as $searchOrderAttribute) {
            $filterName1 = $searchOrderAttribute;

            $filterValue1 = Yii::$app->request->getQueryParam(str_replace(' ', '_', $filterName1), '');
            $searchOrderModel[$searchOrderAttribute] = $filterValue1;

            $searchOrderColumns[] = [
                'attribute' => $searchOrderAttribute,
                'filter' => '<input class="form-control" name="' . str_replace(' ', '_',$filterName1) . '" value="' . $filterValue1 . '" type="text">',
                'value' => $searchOrderAttribute,
            ];

            $order_data = array_filter($order_data, function ($item) use (&$filterValue1, &$searchOrderAttribute) {

                /*if($searchAttribute == 'PRODUCT TITLE'){

                    if(empty($filterValue)){
                        $searchAttribute = 'PRODUCT TITLE ON WALMART';
                    }
                }
                if(strlen($filterValue) > 0 ? stripos('/^' . strtolower($item[$searchAttribute]) . '/', strtolower($filterValue)) : true){

                }*/
                return strlen($filterValue1) > 0 ? stripos('/^' . strtolower($item[$searchOrderAttribute]) . '/', strtolower($filterValue1)) : true;
            });

        }

        return $this->render('index-new', ['items' => $items, 'searchAttributes' => $searchAttributes, 'searchModel' => $searchModel/*,'searchColumns'=>$searchColumns*/,'order'=>$order_data,'searchOrderAttributes'=>$searchOrderAttributes,'searchOrderModel'=>$searchOrderModel,'searchOrderColumns'=>$searchOrderColumns,'action'=>$action]);

    }

}