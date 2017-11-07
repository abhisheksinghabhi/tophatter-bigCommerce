<?php
namespace frontend\modules\tophatter\components;
use Yii;
use yii\base\Component;
use Exception;

class BigcommerceClientHelper extends Component{
	public $clientid;
	private $token;
	private $storehash;
	private $last_response_headers = null;
	public $name;
	
	public function __construct($clientid, $token, $store_hash) {
		$this->clientid = $clientid;
		$this->token = $token;
		$this->storehash = $store_hash;	
	}
	
	public function get($resource,$config=false) {
		$api_url = 'https://api.bigcommerce.com/stores/'.$this->storehash.'/v3/'.$resource;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-Auth-Client:'.$this->clientid,'X-Auth-Token:'.$this->token,'Accept: application/json', 'Content-Length: 0'));
		curl_setopt( $ch, CURLOPT_URL, $api_url );
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
		curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0 );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );

		$response = curl_exec( $ch );
		
		$result = json_decode($response,true);
		return $result;
		
	}

	public function getbuybox($upc){
		$api_url = 'http://api.tophatterlabs.com/v1/items?apiKey=xm2kns3xv2hyt773y597yph5&upc='.$upc;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-Auth-Client:'.$this->clientid,'X-Auth-Token:'.$this->token,'Accept: application/json', 'Content-Length: 0'));
		curl_setopt( $ch, CURLOPT_URL, $api_url );
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
		curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0 );
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

	public static function verifySignedRequest($signedRequest)
	{
		
		list($encodedData, $encodedSignature) = explode('.', $signedRequest, 2);
	
		// decode the data
		$signature = base64_decode($encodedSignature);
		$jsonStr = base64_decode($encodedData);
		$data = json_decode($jsonStr, true);
		$clientSecret = TOPHATTER_APP_SECRET;
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
	public function postToken($tokenUrl,$params){
	
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt( $ch, CURLOPT_URL, $tokenUrl );
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_HTTPGET, true);
		
		curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, false );
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_DNS_USE_GLOBAL_CACHE, false );
		curl_setopt($ch, CURLOPT_DNS_CACHE_TIMEOUT, 2 );
		curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode($params));
	
		$response = curl_exec( $ch );
		
		$result = json_decode($response,true);
	
		if (curl_errno($ch)){
			echo 'Curl error: ' . curl_error($ch);
		} else {
			curl_close($ch);
				
		}
		return $result;
	}
	
	public function get1($resource,$config=false) {
	
		$api_url = 'https://api.bigcommerce.com/stores/'.$this->storehash.'/v2/'.$resource;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-Auth-Client:'.$this->clientid,'X-Auth-Token:'.$this->token,'Accept: application/json', 'Content-Length: 0'));
		curl_setopt( $ch, CURLOPT_URL, $api_url );
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
		curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0 );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
		$response = curl_exec( $ch );
	
		$result = json_decode($response,true);
		return $result;
	
	}

	public function put($resource,$create) {
	
		$api_url = 'https://api.bigcommerce.com/stores/'.$this->storehash.'/v3/'.$resource;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-Auth-Client:'.$this->clientid,'X-Auth-Token:'.$this->token,'Accept: application/json', 'Content-Length: 0'));
		curl_setopt( $ch, CURLOPT_URL, $api_url );
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
		curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0 );
		curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0 );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode($create));
		$response = curl_exec( $ch );
		$result = json_decode($response,true);
		return $result;
		// echo "<pre>";
		// print_r($result);
		// echo "</pre>";die;
	
	}
	
	public function getorder($resource) {
		$api_url = 'https://api.bigcommerce.com/stores/'.$this->storehash.'/v2/'.$resource;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-Auth-Client:'.$this->clientid,'X-Auth-Token:'.$this->token,'Accept: application/json', 'Content-Length: 0'));
		curl_setopt( $ch, CURLOPT_URL, $api_url );
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
		curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0 );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
	
		$response = curl_exec( $ch );
		
		//$response = utf8_encode($response);
	
		//$response = json_decode($response,true);
		return $response;
	
	}
	
	
	
	public function getData($resource) {

		$api_url = 'https://api.bigcommerce.com/stores/'.$this->storehash.'/v2'.$resource.'.json';
		//echo $api_url;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-Auth-Client:'.$this->clientid,'X-Auth-Token:'.$this->token,'Accept: application/json', 'Content-Length: 0'));
		curl_setopt( $ch, CURLOPT_URL, $api_url );
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
		curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0 );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );

		$response = curl_exec( $ch );
		
		$result = json_decode($response,true);
		//print_r($result);die;
		return $result;
	}
	
	public function post($resource,$Orderarray,$config=false) {
		
		
		$api_url = 'https://api.bigcommerce.com/stores/'.$this->storehash.'/v2/'.$resource;
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-Auth-Client:'.$this->clientid,'X-Auth-Token:'.$this->token,'Content-Type: application/json','Accept: application/json'));
		curl_setopt( $ch, CURLOPT_URL, $api_url );
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
		curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0 );
		curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0 );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode($Orderarray));
		$response = curl_exec( $ch );
		$result = json_decode($response,true);
		return $result;
		
	}
	
	// Once the User has authorized the app, call this with the code to get the access token
	public function getAccessToken($code) {
		// POST to  POST https://SHOP_NAME.myshopify.com/admin/oauth/access_token
		$url = "https://{$this->shop_domain}/admin/oauth/access_token";
		$payload = "client_id={$this->api_key}&client_secret={$this->secret}&code=$code";
		$response = $this->curlHttpApiRequest('POST', $url, '', $payload, array());
		$response = json_decode($response, true);
		if (isset($response['access_token']))
			return $response['access_token'];
		return '';
	}

	public function callsMade()
	{
		return $this->shopApiCallLimitParam(0);
	}

	public function callLimit()
	{
		return $this->shopApiCallLimitParam(1);
	}

	public function callsLeft($response_headers)
	{
		return $this->callLimit() - $this->callsMade();
	}

	public function call($method, $path, $params=array())
	{
		
		$baseurl = "https://api.bigcommerce.com/stores/$this->storehash/v3/";
	
		$url = $baseurl.ltrim($path, '/');
		
		$query = in_array($method, array('GET','DELETE')) ? $params : array();
		$payload = in_array($method, array('POST','PUT')) ? json_encode($params) : array();

		$request_headers = in_array($method, array('POST','PUT','GET','DELETE')) ? array('X-Auth-Client:'.$this->clientid,'X-Auth-Token:'.$this->token,'Content-Type: application/json', 'Accept: application/json') : array();
		
		// add auth headers

		$response = $this->curlHttpApiRequest($method, $url, $query, $payload, $request_headers);
		$response = json_decode($response, true);
		/*print_r($response);
		die("bjkljsdkhanumant");*/
		
		if (isset($response['errors']) or ($this->last_response_headers['http_status_code'] >= 400))
		{
			return $response;
		}
		return $response;
	}
	
	public function call1($method, $path, $params=array())
	{
		$baseurl = "https://api.bigcommerce.com/stores/$this->storehash/v2/";
	
		$url = $baseurl.ltrim($path, '/');
		
		$query = in_array($method, array('GET','DELETE')) ? $params : array();
		$payload = in_array($method, array('POST','PUT')) ? json_encode($params) : array();
		$request_headers = in_array($method, array('POST','PUT','GET','DELETE')) ? array('X-Auth-Client:'.$this->clientid,'X-Auth-Token:'.$this->token,'Content-Type: application/json', 'Accept: application/json') : array();
		
		
		$response = $this->curlHttpApiRequest($method, $url, $query, $payload, $request_headers);
		
		$response = json_decode($response, true);
		if (isset($response['errors']) or ($this->last_response_headers['http_status_code'] >= 400))
		{
			return $response;
		}
		return $response;
	}

	public function validateSignature($query)
	{
		if(!is_array($query) || empty($query['signature']) || !is_string($query['signature']))
			return false;

		foreach($query as $k => $v) {
			if($k != 'shop' && $k != 'code' && $k != 'timestamp') continue;
			$signature[] = $k . '=' . $v;
		}

		sort($signature);
		$signature = md5($this->secret . implode('', $signature));

		return $query['signature'] == $signature;
	}

	private function curlHttpApiRequest($method, $url, $query='', $payload='', $request_headers=array())
	{
		$url = $this->curlAppendQuery($url, $query);
		$ch = curl_init($url);
		$this->curlSetopts($ch, $method, $payload, $request_headers);
		$response = curl_exec($ch);
		$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		$errno = curl_errno($ch);
		$error = curl_error($ch);
		curl_close($ch);
		
		$_err = '';
		if ($errno){
			$_err = 'Curl error: ' .$url." -- ".$error;
		}


		if($response)
		{
			list($message_headers, $message_body) = preg_split("/\r\n\r\n|\n\n|\r\r/", $response, 2);
			$this->last_response_headers = $this->curlParseHeaders($message_headers);
			return $message_body;
		}
		else
		{
			return json_encode(['errors'=>$_err]);
		}
	}

	private function curlAppendQuery($url, $query)
	{
		if (empty($query)) return $url;
		if (is_array($query)) return "$url?".http_build_query($query);
		else return "$url?$query";
	}

	private function curlSetopts($ch, $method, $payload, $request_headers)
	{
		curl_setopt($ch, CURLOPT_HEADER, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//deepak
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
		curl_setopt($ch, CURLOPT_TIMEOUT, 300);

		curl_setopt ($ch, CURLOPT_CUSTOMREQUEST, $method);
		if (!empty($request_headers)) curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
		
		if ($method != 'GET' && !empty($payload))
		{
			if (is_array($payload)) $payload = http_build_query($payload);
			curl_setopt ($ch, CURLOPT_POSTFIELDS, $payload);
		}
	}

	private function curlParseHeaders($message_headers)
	{
		$header_lines = preg_split("/\r\n|\n|\r/", $message_headers);
		$headers = array();
		list(, $headers['http_status_code'], $headers['http_status_message']) = explode(' ', trim(array_shift($header_lines)), 3);
		foreach ($header_lines as $header_line)
		{
			list($name, $value) = explode(':', $header_line, 2);
			$name = strtolower($name);
			$headers[$name] = trim($value);
		}

		return $headers;
	}
	
	private function shopApiCallLimitParam($index)
	{
		if ($this->last_response_headers == null)
		{
			throw new Exception('Cannot be called before an API call.');
		}
		$params = explode('/', $this->last_response_headers['http_x_shopify_shop_api_call_limit']);
		return (int) $params[$index];
	}	
	
}

?>
