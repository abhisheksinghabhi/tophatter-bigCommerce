<?php
namespace frontend\modules\tophatter\components;
use Yii;
use yii\base\Component;
use frontend\modules\tophatter\components\BigcommerceApiException;
use app\models\JetConfiguration;

class Bigcomapi extends component{

	protected $apiHost;
	protected $user;
	protected $pass;  

	public function __construct($apiHost,$user,$pass){
		$this->apiHost =$apiHost;
		$this->user = $user;
		$this->pass = $pass;
	}

	public function get($resource,$config=false) {
		
		$merchant_id = $config ? $config['merchant_id']:Yii::$app->user->identity->id;
		$connection=Yii::$app->getDb();
		$apiConfig="";
		$queryObj="";
		$queryObj = $connection->createCommand("SELECT * FROM `bigcom_apidetails` WHERE merchant_id='".$merchant_id."'");
		$apiConfig = $queryObj->queryOne();
		$api_url = $apiConfig['api_url'].$resource;
		$ch = curl_init();
		curl_setopt( $ch, CURLOPT_URL, $api_url );
		curl_setopt( $ch, CURLOPT_HTTPHEADER, array ('Accept: application/json', 'Content-Length: 0') );
		curl_setopt( $ch, CURLOPT_VERBOSE, 0 );
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
		curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0 );
		curl_setopt( $ch, CURLOPT_USERPWD, $apiConfig['username'].":".$apiConfig['token']);
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );	
		$response = curl_exec( $ch );
		$result = json_decode($response);
		return $result;
		
	}

	public function get1($resource,$config=false) {
		
		$merchant_id = $config ? $config['merchant_id']:Yii::$app->user->identity->id;
		$connection=Yii::$app->getDb();
		$apiConfig="";
		$queryObj="";
		$queryObj = $connection->createCommand("SELECT * FROM `bigcom_apidetails` WHERE merchant_id='".$merchant_id."'");
		$apiConfig = $queryObj->queryOne();
		$api_url = $apiConfig['api_url'].$resource;

		$ch = curl_init();
		curl_setopt( $ch, CURLOPT_URL, $api_url );
		curl_setopt( $ch, CURLOPT_HTTPHEADER, array ('Accept: application/json', 'Content-Length: 0') );
		curl_setopt( $ch, CURLOPT_VERBOSE, 0 );
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
		curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0 );
		curl_setopt( $ch, CURLOPT_USERPWD, $apiConfig['username'].":".$apiConfig['token']);
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );	
		$response = curl_exec( $ch );
		$result = json_decode($response);
		return $result;
	}

	public function getData($resource) {

		$merchant_id = \Yii::$app->user->identity->id;
		$connection=Yii::$app->getDb();
		$apiConfig="";
		$queryObj="";
		$queryObj = $connection->createCommand("SELECT * FROM `bigcom_apidetails` WHERE merchant_id='".$merchant_id."'");
		$apiConfig = $queryObj->queryOne();
		$url = substr($apiConfig['api_url'], 0, -1);
		$api_url = $url.$resource.'.json';
		$ch = curl_init();
		curl_setopt( $ch, CURLOPT_HTTPHEADER, array ('Accept: application/json', 'Content-Length: 0') );
		curl_setopt( $ch, CURLOPT_URL, $api_url );
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
		curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0 );
		curl_setopt( $ch, CURLOPT_USERPWD, $apiConfig['username'].":".$apiConfig['token']);
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );

		$response = curl_exec( $ch );
		
		$result = json_decode($response);
		return $result;
		
	}
	
	public function post($resource,$Orderarray,$config=false) {
	
		
		//print_r($config);
		//print_r($Orderarray);die("gdfg");
		$merchant_id = $config ? $config['merchant_id']:Yii::$app->user->identity->id;
		$connection=Yii::$app->getDb();
		$apiConfig="";
		$queryObj="";
		$queryObj = $connection->createCommand("SELECT * FROM `bigcom_apidetails` WHERE merchant_id='".$merchant_id."'");
		$apiConfig = $queryObj->queryOne();
		$api_url = $apiConfig['api_url'].$resource;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Accept: application/json'));
		curl_setopt( $ch, CURLOPT_URL, $api_url );
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
		curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0 );
		curl_setopt( $ch, CURLOPT_USERPWD, $apiConfig['username'].":".$apiConfig['token']);
		curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0 );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode($Orderarray));
		$response = curl_exec( $ch );
		$result = json_decode($response,true);	
		return $result;
		
	}
	
	public function put($resource,$create) {
	
		$merchant_id = \Yii::$app->user->identity->id;
		$connection=Yii::$app->getDb();
		$apiConfig="";
		$queryObj="";
		$queryObj = $connection->createCommand("SELECT * FROM `bigcom_apidetails` WHERE merchant_id='".$merchant_id."'");
		$apiConfig = $queryObj->queryOne();
		$api_url = $apiConfig['api_url'].$resource;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Accept: application/json'));
		curl_setopt( $ch, CURLOPT_URL, $api_url );
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
		curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0 );
		curl_setopt( $ch, CURLOPT_USERPWD, $apiConfig['username'].":".$apiConfig['token']);
		curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0 );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode($create));
		$response = curl_exec( $ch );
		$result = json_decode($response,true);
		return $result;
	}

}
?>