<?php
namespace frontend\modules\tophatter\components;
use Yii;
use yii\base\Component;

class Appinstall extends component{
	
	public function postToken($tokenUrl,$params){
	
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt( $ch, CURLOPT_URL, $tokenUrl );
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	
		curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, false );
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode($params));
	
		$response = curl_exec( $ch );
		$result = json_decode($response,true);
	
		if (curl_errno($ch)){
		} else {
			curl_close($ch);
				
		}
		return $result;
	}
	
	public function verifySignedRequest($signedRequest)
	{
		
		list($encodedData, $encodedSignature) = explode('.', $signedRequest, 2);
	
		// decode the data
		$signature = base64_decode($encodedSignature);
		$jsonStr = base64_decode($encodedData);
		$data = json_decode($jsonStr, true);
		$clientSecret = 'e8bymcb3qianqkt9lzn7qo20qt5yz5p';
		// confirm the signature
		$expectedSignature = hash_hmac('sha256', $jsonStr, $clientSecret, $raw = false);
		if(!function_exists('hash_equals')) {
			function hash_equals($expectedSignature, $signature) {
				if(strlen($str1) != strlen($str2)) {
					error_log('Bad signed request from Bigcommerce!');
					return null;
				} 
			}
		}
		return $data;
	}
	
	public function get($client_id,$accesstoken,$store_hash)
	{
		$api_url = 'https://api.bigcommerce.com/stores/'.$store_hash.'/v2/hooks';
		$ch = curl_init();
		curl_setopt( $ch, CURLOPT_URL, $api_url );
		curl_setopt( $ch, CURLOPT_HTTPHEADER, array ('X-Auth-Client: '.$client_id,'X-Auth-Token: '.$accesstoken,'Accept: application/json', 'Content-Length: 0') );
		curl_setopt( $ch, CURLOPT_VERBOSE, 0 );
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
		curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0 );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );

		$response = curl_exec( $ch );
		$result = json_decode($response);
		return $result;
	}

	public function post($client_id,$accesstoken,$store_hash,$arr) 
	{
	
		$api_url = 'https://api.bigcommerce.com/stores/'.$store_hash.'/v2/hooks';
		$ch = curl_init();
		curl_setopt( $ch, CURLOPT_HTTPHEADER, array ('X-Auth-Client: '.$client_id,'X-Auth-Token: '.$accesstoken,'Content-Type: application/json','Accept: application/json') );
		curl_setopt( $ch, CURLOPT_URL, $api_url );
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
		curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0 );
		curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0 );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode($arr));
		$response = curl_exec( $ch );
		$result = json_decode($response,true);
		return $result;
	
	}
	
	public function delete($client_id,$accesstoken,$store_hash)
	{
		$api_url = 'https://api.bigcommerce.com/stores/'.$store_hash.'/v2/hooks/9125548';
		$ch = curl_init();
		curl_setopt( $ch, CURLOPT_HTTPHEADER, array ('X-Auth-Client: '.$client_id,'X-Auth-Token: '.$accesstoken,'Content-Type: application/json','Accept: application/json') );
		curl_setopt( $ch, CURLOPT_URL, $api_url );
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
		curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0 );
		curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0 );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode($arr));
		$response = curl_exec( $ch );
		$result = json_decode($response,true);
		return $result;
	}
	
	public function storedetails($client_id,$accesstoken,$store_hash)
	{
		$api_url = 'https://api.bigcommerce.com/stores/'.$store_hash.'/v2/store';
		$ch = curl_init();
		curl_setopt( $ch, CURLOPT_HTTPHEADER, array ('X-Auth-Client: '.$client_id,'X-Auth-Token: '.$accesstoken,'Content-Type: application/json','Accept: application/json') );
		curl_setopt( $ch, CURLOPT_URL, $api_url );
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
		curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0 );
		curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0 );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
		$response = curl_exec( $ch );
		$result = json_decode($response,true);
		return $result;
	}
	
	// Get the URL required to request authorization
	public function getAuthorizeUrl($shop, $redirect_url='') {
		$url = "https://{$shop}/manage/marketplace/apps/".TOPHATTER_APP_ID;
		/* if ($redirect_url != '')
		{
			$url .= "&redirect_uri=" .$redirect_url;
		} */
		return $url;
	}

}