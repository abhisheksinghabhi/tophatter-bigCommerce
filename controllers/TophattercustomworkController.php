<?php
/**
 * Created by PhpStorm.
 * User: cedcoss
 * Date: 19/4/17
 * Time: 11:36 AM
 */
namespace frontend\modules\tophatter\controllers;
use frontend\modules\tophatter\components\Data;
use frontend\modules\tophatter\components\TophatterProduct;
use frontend\modules\tophatter\components\Tophatterapi;
use frontend\modules\tophatter\components\TophatterRepricing;
use frontend\modules\tophatter\components\BigcommerceClientHelper;
use Yii;

class TophattercustomworkController extends TophattermainController
{
    public function actionGetproductreport()
    {
        $reprice = new TophatterRepricing(API_USER, API_PASSWORD, CONSUMER_CHANNEL_TYPE_ID);
        $reprice->fetchTophatterProductReport();

    }

    public function actionGetbuyboxreport()
    {
        $reprice = new TophatterRepricing(API_USER, API_PASSWORD, CONSUMER_CHANNEL_TYPE_ID);
        $reprice->fetchTophatterBuyboxReport(null, true);
    }

    public function actionTestupc()
    {
        $product['upc'] = $_GET['upc'];
        $value = Data::validateUpc($product['upc']);

        var_dump($product['upc']);
        var_dump($value);
        die('sdsdsd');
    }

    public function actionMatchcatalog()
    {
        if (Yii::$app->user->isGuest) {
            return \Yii::$app->getResponse()->redirect(\Yii::$app->getUser()->loginUrl);
        }
        $merchant_id = Yii::$app->user->identity->id;
        $import_errors = array();
        $error_array = array();
        $count = 0;

        $file_path = Yii::getAlias('@webroot') . '/var/ItemReport_10000002750_2017-04-18T171007.2990000.csv';
        if (file_exists($file_path)) {

            $row = 0;

            if (($handle = fopen($file_path, "r"))) {
                $allSku = TophatterProduct::getAllProductSku($merchant_id);
                $row = 0;

                while (($data = fgetcsv($handle, 90000, ",")) !== FALSE) {

                    $row++;
                    if ($row == 1)
                    {
                        $header = $data;
                        continue;
                    }

                    $pro_sku = trim($data[1]);

                    if (!in_array($pro_sku, $allSku)) {

                        $error_array[] = $data;
                        $import_errors[] = array_combine($header,$data);
                        $count++;
                    }
                }
            }
        }else{
            echo 'file not found';
        }

        /*if(!empty($error_array)){

            if (!file_exists(\Yii::getAlias('@webroot') . '/var/')) {
                mkdir(\Yii::getAlias('@webroot') . '/var/', 0775, true);
            }
            $base_path = \Yii::getAlias('@webroot') . '/var/'.$merchant_id.'.csv';
            $file = fopen($base_path, "w");

            $row = array();
            foreach ($header as $head) {
                $row[] = $head;
            }
            fputcsv($file, $row);

            foreach ($error_array as $v) {

                fputcsv($file, $v);
            }

            fclose($file);
            $encode = "\xEF\xBB\xBF"; // UTF-8 BOM
            $content = $encode . file_get_contents($base_path);
            return \Yii::$app->response->sendFile($base_path);
        }*/
        echo '<pre>';
        print_r($count);
        print_r($import_errors);
        die('success');
    }

    public function actionGetfeedstatus()
    {
        if(isset($_GET['feed']) && !empty($_GET['feed'])){
            print_r($_GET['feed']);
            $tophatterapi = new Tophatterapi(API_USER, API_PASSWORD, CONSUMER_CHANNEL_TYPE_ID);
            $result = $tophatterapi->getFeeds($_GET['feed']);
            var_dump($result);
            die('success');

        }
    }

    public function actionGetproductbyid()
    {
        
        $id=$_GET['id'];  
        $resource='';  
        $products = $this->bigcom->call('GET', 'catalog/products/'.$id.'?include=variants,images');
        print_r($products);die("dfds");
            
    }

    public function actionGetorderdetails()
    {
        if($_GET['purchaseorderid']){
            $this->tophatterHelper = new Tophatterapi(API_USER,API_PASSWORD,CONSUMER_CHANNEL_TYPE_ID);
            $orderdata = $this->tophatterHelper->getOrder($_GET['purchaseorderid']);
            $shipdata = json_decode($orderdata,true);
            print_r($shipdata);die;
        }
    }

     public function actionViewfeed()
    {

        if (isset($_GET['feed']) && !empty($_GET['feed'])) {
            $id = $_GET['feed'];
            $limit = 50;

            if (!empty($id)) {
                $wal = new Tophatterapi(API_USER, API_PASSWORD, CONSUMER_CHANNEL_TYPE_ID);
                $feed_data = $wal->viewFeed($id, $limit);

                print_r($feed_data);
                die('success');
            }
        }
    }

    public function actionGettophatterproductstatus()
    {
        if (isset($_GET['sku']) && !empty($_GET['sku'])) {
            $sku = $_GET['sku'];
            $limit = 50;

            if (!empty($sku)) {
                $wal = new Tophatterapi(API_USER, API_PASSWORD, CONSUMER_CHANNEL_TYPE_ID);
                $feed_data = $wal->getItem($sku);


                print_r($feed_data);
                die('success');
            }
        }
    }
   /* public function actionProductedit(){
        $query = "select sku,upc,bigproduct_id,title from jet_product where merchant_id='" .MERCHANT_ID. "'";
        $product = Data::sqlRecords($query, 'all', 'select');

        foreach ($product as $key => $value) {
            
            $value1=explode('[',$value['title']);
            $value2=explode(']',$value1[1]);
           // if(strpos($value['upc'],'-')){
                //$value['upc']=str_replace('-', '', $value['upc']);
               // $value['upc']='0'.$value['upc'];
                $query = "update jet_product set brand='" .addslashes($value2[0]) . "' where bigproduct_id='" . $value['bigproduct_id'] . "' and merchant_id='".MERCHANT_ID."' and brand=''";
                Data::sqlRecords($query, null, 'update');
            //}
        }
    }*/

    public function actionGetallproduct()
    {
        $index = $_GET['index'];
        
        $shopname = Yii::$app->user->identity->username;
        $sc = new BigcommerceClientHelper($shopname, TOKEN, PUBLIC_KEY, PRIVATE_KEY);

        $prod_id=$_GET['id'];
        $countProducts=$sc->call('GET', '/admin/products.json', array('limit' => 250, 'page' => $index));
        echo "<pre>";
        print_r($countProducts);
        die ;
    }
    public function actionCreateWebhook()
    {
        //*die("kljdlkflkd");
        //if(isset($_GET['offset'],$_GET['limit']))
       // {
             $baseurl="https://bigcommerce.cedcommerce.com/integration/";

           /* $query = "SELECT auth_key,username,token,store_hash FROM `user` LEFT JOIN `walmart_shop_details` ON user.id=walmart_shop_details.merchant_id LIMIT('".$_GET['offset']."','".$_GET['limit']."')";
            $results = Data::sqlRecords($query, 'all');
            foreach ($results as $key => $value) 
            {
                if($value['auth_key'])
                {
                    $bigcom = new BigcommerceClientHelper(JET_APP_KEY,$value['auth_key'],$value['store_hash']);
                }else{
                    $bigcom = new BigcommerceClientHelper(WALMART_APP_KEY,$value['token'],$value['store_hash']);
                }
                Data::deleteAllWebhooks($bigcom,$value['username'],$value['store_hash']);
                Data::createNewWebhook($bigcom,$value['username'],$value['store_hash']);
                var_dump($bigcom->call1("GET","hooks"));echo "<hr>";
            }*/
        //}
 
        $webhookresponse=$this->bigcom->call1("GET","hooks"); 

        
        if(is_array($webhookresponse) && count($webhookresponse)>0)
        {
            foreach ($webhookresponse as $key => $value) 
            {
                $this->bigcom->call1("DELETE","hooks/".$value['id']);
            }
        }

        $webhook_topics = 
                [
                    "store/product/created"=>"productcreate",
                    "store/sku/created"=>"productcreate",
                    "store/product/updated"=>"productupdate",
                    "store/sku/updated"=>"productupdate",
                    "store/product/deleted"=>"productdelete",
                    "store/sku/deleted"=>"productdelete",
                    "store/product/inventory/updated"=>"inventoryupdate",
                    "store/sku/inventory/updated"=>"inventoryupdate",
                    "store/product/inventory/order/updated"=>"inventoryupdate",
                    "store/sku/inventory/order/updated"=>"inventoryupdate",
                    "store/shipment/created"=>"createshipment",
                    "store/app/uninstalled"=>"isinstall",
                ];

        foreach ($webhook_topics as $key => $value) 
        {
            if($value=="isinstall"){
                $url=$baseurl."tophatter/tophatter-webhook/";
                $response=$this->bigcom->call1("POST","hooks",["destination"=>$url.$value,"scope"=>$key]);     
            }
            else
            {
                $url=$baseurl."bigcommercewebhook/";
                $response=$this->bigcom->call1("POST","hooks",["destination"=>$url.$value,"scope"=>$key]);     
            }
            //svar_dump($response);
        } 
       
        //echo "create"."<br>";
        var_dump($this->bigcom->call1("GET","hooks"));echo "<hr>";
        //$response = $this->bigcom->call1('GET','catalog/products/127?include="variants"');
        //var_dump($response);die;
    }

    public function actionGetbigcomorder()
    {
        $merchant_id=$shopname = \Yii::$app->user->identity->id;
       
        $bigcom = new BigcommerceClientHelper(TOPHATTER_APP_KEY,TOKEN,STOREHASH);
        
        if($_GET['order_id'])
        {
            $ship1 = 'orders/'.$_GET['order_id'].'/shipments';
            $orderdata = $bigcom->get1($ship1);  
            print_r($orderdata);die;
        }
    }
    
    public function actionGetallhook()
    {
        //die("jk");
        $merchant_id=Yii::$app->user->identity->id;
        $shopname = \Yii::$app->user->identity->username;
        $session = Yii::$app->session;
        $session->open();
        
        $bigcom = new BigcommerceClientHelper(TOPHATTER_APP_KEY,TOKEN,STOREHASH);
        $hooks = $bigcom->call1('GET','hooks');
        print_r($hooks);die(); 
            
    }

    public function actionDeleteallhook()
    {
        $merchant_id=Yii::$app->user->identity->id;
        $shopname = \Yii::$app->user->identity->username;
        $session = Yii::$app->session;
        $session->open();
        
        $bigcom = new BigcommerceClientHelper(TOPHATTER_APP_KEY,TOKEN,STOREHASH);
        $hooks = $bigcom->call1('GET','hooks');
        foreach ($hooks as $hook) {
            $delete = $bigcom->call1('DELETE','hooks/'.$hook['id']);
        }
    }

    public function actionShopdata()
    {
        $merchant_id=Yii::$app->user->identity->id;
        $shopname = \Yii::$app->user->identity->username;
        $session = Yii::$app->session;
        $session->open();
        
        $bigcom = new BigcommerceClientHelper(TOPHATTER_APP_KEY,TOKEN,STOREHASH);
        $shopdata = $bigcom->call1('GET','store');
        print_r($shopdata);die("d");
    }

    public function actionSynccategory(){

        $c=0;
        $query = "select product_type from tophatter_product where merchant_id='" .MERCHANT_ID. "' ";
        $product = Data::sqlRecords($query, 'all', 'select');

        foreach ($product as $k=> $pro){

            $wp[]=$pro['product_type'];
        }



        $query1 = "select product_type from tophatter_category_map where merchant_id='" .MERCHANT_ID. "' ";
        $product1 = Data::sqlRecords($query1, 'all', 'select');

        foreach ($product1 as $k=> $pro1){

            $wcm[]=$pro1['product_type'];
        }

        foreach ($wcm as $p) {
            if (!in_array($p, $wp)) {

                $query1 = "delete from tophatter_category_map where merchant_id='" .MERCHANT_ID. "' and product_type='".addslashes($p)."'";
                $product1 = Data::sqlRecords($query1, 'all', 'delete');

            }
        }

        Yii::$app->session->setFlash('success', "Tophatter Categories are synced successfully");

        return $this->redirect(['categorymap/index']);


       // print_r($wcm);die;


        /*foreach ($product1 as $k=> $pro){

             if(in_array($product[$k]['product_type'],$pro['product_type'])){
                 $c++;
             }
             echo $c;
        }

        print_r($product);

        print_r($product1);die;*/


        /*$query = "select jp.product_type from walmart_product jp INNER JOIN walmart_category_map wcm On jp.product_type=wcm.product_type where jp.merchant_id='" .MERCHANT_ID. "' ";
        $product = Data::sqlRecords($query, 'all', 'select');*/



    }
}