<?php 
namespace frontend\modules\walmart\components;

use Yii;
use ZipArchive;

class WalmartRepricing extends Walmartapi
{
	const REPRICING_FILLER_AMOUNT = 0.5;

	/**
	 * Get BestMarketplacePrice for an Item
	 *
	 * @param int|array $walmartItemId 
	 * @return array 
	 */
	public static function getBestMarketplacePrice($walmartItemId,$upc=false)
	{
		$apiKey = "q67dm5pkwm36rd366ggzzm5e";
		if(is_numeric($walmartItemId) && !$upc)
		{
			$url = "http://api.walmartlabs.com/v1/items/$walmartItemId?format=json&apiKey=$apiKey";
		}
		elseif(is_array($walmartItemId) && !$upc)
		{
			//supports upto 20 items in one call
			$walmartItemIds = implode(',', $walmartItemId);
			$url = "http://api.walmartlabs.com/v1/items?format=json&ids=$walmartItemIds&apiKey=$apiKey";
		}
		elseif($upc)
		{
			$url = "http://api.walmartlabs.com/v1/items?format=json&apiKey=$apiKey&upc=$walmartItemId";
		}
		else
		{
			return false;
		}

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, $url);
		$output = curl_exec($ch);
		curl_close($ch);

		if(is_array($result=json_decode($output, true)) && (json_last_error() == JSON_ERROR_NONE))
		{
			return $result;
		}
		elseif(simplexml_load_string($output))
		{
			return $result = Walmartapi::xmlToArray($output);
		}
		else
		{
			return $output; //when curl return 'false'
		}
	}

	public static function getSavedRepricingData($product_id)
	{
		try
		{
			$query = 'SELECT * FROM `walmart_product_repricing` WHERE product_id="'.$product_id.'"';
			$data = Data::sqlRecords($query,"all","select");
			if($data)
			{
				$result = [];
				foreach ($data as $value) {
					if($value['option_id'] != '0')
					{
						$result[$value['option_id']] = $value;
					}
					else
					{
						$result[$value['product_id']] = $value;
					}
				}
				return $result;
			}
			else
			{
				return [];
			}
		}
		catch(\Exception $e){
			return [];
		}
	}

	public static function getProductData($product_id)
	{
		try
		{
			//$query = 'SELECT product_id,title,sku,type,wal.product_type,wal.status,description,image,qty,price,weight,vendor,upc,walmart_attributes,category,tax_code,short_description,self_description,common_attributes,attr_ids,sku_override,product_id_override FROM `walmart_product` wal INNER JOIN `jet_product` jet ON jet.id=wal.product_id WHERE wal.product_id="'.$product_id.'" LIMIT 1';
			$query = 'SELECT product_id,title,sku,type,wal.product_type,wal.status,description,image,qty,price,weight,upc,walmart_attributes,category,tax_code,short_description,self_description,common_attributes,sku_override,product_id_override FROM (SELECT * FROM `walmart_product` WHERE `product_id` ="'.$product_id.'") as wal INNER JOIN (SELECT * FROM `jet_product` WHERE `bigproduct_id` ="'.$product_id.'") as jet ON jet.bigproduct_id=wal.product_id WHERE wal.product_id="'.$product_id.'" LIMIT 1';
			$product = Data::sqlRecords($query,"one","select");
			

		}
		catch(\Exception $e){
			return false;
		}
		return $product;
	}

	public static function getProductVariants($product_id)
	{
		try
		{
			//$query = 'SELECT jet.option_id,option_title,option_sku,wal.status,wal.walmart_option_attributes,option_image,option_qty,option_price,option_weight,option_unique_id FROM `walmart_product_variants` wal INNER JOIN `jet_product_variants` jet ON jet.option_id=wal.option_id WHERE wal.product_id="'.$product_id.'"';
			$query = 'SELECT jet.option_id,option_title,option_sku,wal.status,wal.walmart_option_attributes,option_image,option_qty,option_price,option_weight,option_unique_id FROM (SELECT * FROM `walmart_product_variants` WHERE `product_id` ="'.$product_id.'") as wal INNER JOIN (SELECT * FROM `jet_product_variants` WHERE `product_id` ="'.$product_id.'") as jet ON jet.option_id=wal.option_id WHERE wal.product_id="'.$product_id.'"';
			$variants = Data::sqlRecords($query,"all","select");
		}
		catch(\Exception $e){
			return false;
		}
		return $variants;
	}

	public static function getProductIdsBySku($sku, $merchant_id)
	{
		try
		{
			$main_table = "SELECT `product_id`, `variant_id` FROM `walmart_product` `wp` INNER JOIN (SELECT * FROM `jet_product` WHERE `sku`='{$sku}' AND `merchant_id`={$merchant_id}) as `jp` ON `jp`.`bigproduct_id`=`wp`.`product_id`";


			$variant_table = "SELECT `wpv`.`product_id`, `wpv`.`option_id` as `variant_id` FROM `walmart_product_variants` `wpv` INNER JOIN (SELECT * FROM `jet_product_variants` WHERE `option_sku`='{$sku}' AND `merchant_id`={$merchant_id}) as `jpv` ON `wpv`.`option_id`=`jpv`.`option_id`";
			
			$query = $main_table." UNION ".$variant_table;

			$result = Data::sqlRecords($query, "one", "select");
		}
		catch(\Exception $e){
			return false;
		}
		return $result;
	}

	public static function isExist($sku, $merchant_id)
	{
		$query = "SELECT `id` FROM `walmart_product_repricing` WHERE `merchant_id` = {$merchant_id} AND `sku` LIKE '{$sku}' LIMIT 0,1";
		$result = Data::sqlRecords($query, "one", "select");

		if(!$result)
			return false;
		else
			return $result;
	}

	public static function saveProduct($product_id, $data=[], $table='jet_product', $primary_col='id')
	{
		$merchant_id = MERCHANT_ID;
		try {
			$query = "SELECT `$primary_col` FROM $table WHERE `$primary_col`='{$product_id}' LIMIT 0,1";
			$product = Data::sqlRecords($query, 'one', 'select');
			if($product)
			{
				$sql = "UPDATE `$table` SET ";

				if(is_array($data) && count($data))
				{
		            foreach ($data as $updateKey=>$updateVal) {
		            	$sql .= "`$updateKey`='{$updateVal}',";
		            }
		            $sql = rtrim($sql,',');

		            $sql .= " WHERE `$primary_col`='".$product_id."' AND `merchant_id`='".$merchant_id."'";
		            
		            Data::sqlRecords($sql, null, "update");
	        	}
			}
			else
			{
				if(is_array($data) && count($data))
				{
					$col_names = ''; $col_values = '';
					foreach ($data as $updateKey=>$updateVal) {
		            	$col_names .= "`$updateKey`,";
		            	$col_values = "'".$updateVal."',";
		            }
		            $sql = rtrim($col_names,',');
		            $sql = rtrim($col_values,',');

					$sql = "INSERT INTO `$table` ($col_names) VALUES ($col_values)";
					
					Data::sqlRecords($sql, null, "insert");
				}
			}
		} catch(Exception $e) {
			echo "Exception : ".$e->getMessage();
			die;
		}
	}

	public function saveProductVariant($product_id, $option_id, $data=[], $table='jet_product_variants')
	{
		$merchant_id = MERCHANT_ID;
		try {
			$query = "SELECT `$primary_col` FROM $table WHERE `$primary_col`='{$option_id}' LIMIT 0,1";
			$product = Data::sqlRecords($query, 'one', 'select');
			if($product)
			{
				$sql = "UPDATE `$table` SET ";

				if(is_array($data) && count($data))
				{
		            foreach ($data as $updateKey=>$updateVal) {
		            	$sql .= "`$updateKey`='{$updateVal}',";
		            }
		            $sql = rtrim($sql,',');

		            $sql .= " WHERE `$primary_col`='".$option_id."' AND `merchant_id`='".$merchant_id."'";
		            
		            Data::sqlRecords($sql, null, "update");
	        	}
			}
			else
			{
				if(is_array($data) && count($data))
				{
					$col_names = ''; $col_values = '';
					foreach ($data as $updateKey=>$updateVal) {
		            	$col_names .= "`$updateKey`,";
		            	$col_values = "'".$updateVal."',";
		            }
		            $sql = rtrim($col_names,',');
		            $sql = rtrim($col_values,',');

					$sql = "INSERT INTO `$table` ($col_names) VALUES ($col_values)";
					
					Data::sqlRecords($sql, null, "insert");
				}
			}
		} catch(Exception $e) {
			echo "Exception : ".$e->getMessage();
			die;
		}
	}

	public static function removeIndexes($array)
	{
		//array(6) { ["price"]=> float(197) ["sellerInfo"]=> string(7) "JZJ LLC" ["standardShipRate"]=> float(0) ["twoThreeDayShippingRate"]=> float(72.15) ["availableOnline"]=> bool(true) ["clearance"]=> bool(false) } 
		$indexes = ['sellerInfo','availableOnline','clearance'];
		if(is_array($array) && count($array))
		{
			foreach ($indexes as $index) {
				if(array_key_exists($index, $array))
					unset($array[$index]);
			}
		}
		return $array;
	}

	public static function getTotal($array)
	{
		$total = 0;
		if(is_array($array) && count($array))
		{
			foreach ($array as $value) {
				$total += $value;
			}
		}
		return $total;
	}

	/**
	 * Get Report of Products on Walmart 
	 * you will get to download .zip file which has the csv file of product report.
	 *
	 * @return void 
	 */
	public function fetchWalmartProductReport()
	{
		$url = Walmartapi::GET_REPORTS_SUB_URL."?type=item";

		$signature = $this->apiSignature->getSignature($url,'GET',$this->apiConsumerId,$this->apiPrivateKey);
        
        $url = $this->apiUrl . $url;

        $headers = [];
        $headers[] = "WM_SVC.NAME: Walmart Marketplace";
        $headers[] = "WM_QOS.CORRELATION_ID: " . base64_encode(\phpseclib\Crypt\Random::string(16));
        $headers[] = "WM_SEC.TIMESTAMP: " . $this->apiSignature->timestamp;
        $headers[] = "WM_SEC.AUTH_SIGNATURE: " . $signature;
        $headers[] = "WM_CONSUMER.ID: " .  $this->apiConsumerId;
        $headers[] = "WM_CONSUMER.CHANNEL.TYPE: 7b2c8dab-c79c-4cee-97fb-0ac399e17ade";
        $headers[] = "Content-Type: application/json";
        $headers[] = "Accept: application/xml";
        $headers[] = "HOST: marketplace.walmartapis.com";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec ($ch);

        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if($httpcode == 200)
        {
        	$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
	        /*$fileName = substr($server_output, strpos($server_output, "filename="),$header_size);
	        $fileName = substr($fileName, 0, strpos($fileName, ".zip"));
	        $fileName = explode("=", $fileName);
	        $fileName = $fileName[1].".zip";*/

	        if(is_null($filePath))
	        	$filePath = \Yii::getAlias('@webroot').'/var/report/'.MERCHANT_ID.'/item/item.zip';

	        if(!file_exists(dirname($filePath))) {
				mkdir(dirname($filePath), 0775, true);
			}


	        $response = substr($server_output, $header_size);

	        $file = fopen($filePath, "w");
	        fwrite($file, $response);
	        fclose($file);

	        if($downloadable)
	        {
	        	$fileName = 'item.zip';
	        	if(strpos($filePath, $fileName)===false) {
	        		$filePath = $filePath.$fileName;
	        	}

		        header("Content-Description: File Transfer");
		        header('Content-Type: application/octet-stream');
		        header('Content-Disposition: attachment; filename="'.$fileName.'"');
		        header("Content-Transfer-Encoding: binary");
				header("Content-Length: ".filesize($filePath));
				header('Connection: close');
				ob_end_flush();
				@readfile($filePath);
			}
			else
			{
				return true;
			}
        }
        else
        {
        	return false;
        }
	}

	/**
	 * Get Report of Products Buybox on Walmart 
	 * you will get to download .zip file which has the csv file of products buybox.
	 *
	 * @param $filePath
	 * @return void|bool
	 */
	public function fetchWalmartBuyboxReport($filePath=null, $downloadable=false)
	{
		$url = Walmartapi::GET_REPORTS_SUB_URL."?type=buybox";

		$signature = $this->apiSignature->getSignature($url,'GET',$this->apiConsumerId,$this->apiPrivateKey);
        
        $url = $this->apiUrl . $url;

        $headers = [];
        $headers[] = "WM_SVC.NAME: Walmart Marketplace";
        $headers[] = "WM_QOS.CORRELATION_ID: " . base64_encode(\phpseclib\Crypt\Random::string(16));
        $headers[] = "WM_SEC.TIMESTAMP: " . $this->apiSignature->timestamp;
        $headers[] = "WM_SEC.AUTH_SIGNATURE: " . $signature;
        $headers[] = "WM_CONSUMER.ID: " .  $this->apiConsumerId;
        //$headers[] = "WM_CONSUMER.ID: " .  'test123';
        $headers[] = "WM_CONSUMER.CHANNEL.TYPE: 7b2c8dab-c79c-4cee-97fb-0ac399e17ade";
        $headers[] = "Content-Type: application/json";
        $headers[] = "Accept: application/xml";
        $headers[] = "HOST: marketplace.walmartapis.com";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec ($ch);

        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if($httpcode == 200)
        {
			$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
	        /*$fileName = substr($server_output, strpos($server_output, "filename="),$header_size);
	        $fileName = substr($fileName, 0, strpos($fileName, ".zip"));
	        $fileName = explode("=", $fileName);
	        $fileName = $fileName[1].".zip";*/

	        if(is_null($filePath))
	        	$filePath = \Yii::getAlias('@webroot').'/var/report/'.MERCHANT_ID.'/buybox/buybox.zip';

	        if(!file_exists(dirname($filePath))) {
				mkdir(dirname($filePath), 0775, true);
			}

	        $response = substr($server_output, $header_size);

	        $file = fopen($filePath, "w");
	        fwrite($file, $response);
	        fclose($file);

	        if($downloadable)
	        {
	        	$fileName = 'buybox.zip';
	        	if(strpos($filePath, $fileName)===false) {
	        		$filePath = $filePath.$fileName;
	        	}

		        header("Content-Description: File Transfer");
		        header('Content-Type: application/octet-stream');
		        header('Content-Disposition: attachment; filename="'.$fileName.'"');
		        header("Content-Transfer-Encoding: binary");
				header("Content-Length: ".filesize($filePath));
				header('Connection: close');
				ob_end_flush();
				@readfile($filePath);
			}
			else
			{
				return true;
			}
        }
        else
        {
        	/*$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        	$header = substr($server_output, 0, $header_size);
        	$response = substr($server_output, $header_size);

        	$response = str_replace('ns2:', "", $response);

            $responseArray = [];
            $responseArray = Walmartapi::xmlToArray($response);*/
            
        	return false;
        }
	}

	/**
	 * Get Product Price to be Uploaded on Walmart
	 *
	 * @param $orignal_price Original Price of product
	 * @param string $type ('simple' or 'variant')
	 * @param string|int $id (ProductId in case of simple & OptionId in case of variant)
	 * @param string $merchant_id
	 * 
	 * @return int
	 */
	public static function getProductPrice($orignal_price,$type,$id,$merchant_id)
	{
		$price = 0;
		if($type == 'simple')
		{
			$updatePrice = Data::getCustomPrice($orignal_price, $merchant_id);

			$query = "SELECT * FROM `walmart_product_repricing` WHERE `product_id` = '{$id}' AND `repricing_status` = '1' LIMIT 0,1";
			$result = Data::sqlRecords($query,"one","select");
			if($result) {
				$minPrice = floatval($result['min_price']);
				$maxPrice = floatval($result['max_price']);
				$bestMktPrice = self::getBestMktPrice($result);
				$price = self::calculateBestPrice($orignal_price,$bestMktPrice,$minPrice,$maxPrice);
			} elseif($updatePrice) {
				$price = $updatePrice;
			} else {
				$price = $orignal_price;
			}
		}
		elseif($type == 'variants')
		{
			$updatePrice = Data::getCustomPrice($orignal_price, $merchant_id);
			
			$query = "SELECT * FROM `walmart_product_repricing` WHERE `option_id` = '{$id}' LIMIT 0,1";
			$result = Data::sqlRecords($query,"one","select");
			if($result) {
				$minPrice = floatval($result['min_price']);
				$maxPrice = floatval($result['max_price']);
				$bestMktPrice = self::getBestMktPrice($result);
				$price = self::calculateBestPrice($orignal_price,$bestMktPrice,$minPrice,$maxPrice);
			} elseif($updatePrice) {
				$price = $updatePrice;
			} else {
				$price = $orignal_price;
			}
		}
		return $price;
	}

	/**
	 * Get BestPrice of Product
	 *
	 * @param [] $repriceData (Array of reprice data inserted in table)
	 * 
	 * @return int
	 */
	public static function getBestMktPrice($repriceData)
	{
		if(isset($repriceData['best_price']) && $repriceData['best_price'] != '')
		{
			return floatval($repriceData['best_price']);
		}
		else
		{
			return 0;
		}
	}

	/**
	 * Calculate the Best Price of the Product Based on Best Marketplace Price
	 *
	 * @param int|float $orignal_price Original Price of product
	 * @param int|float $bestMktPrice Best Marketplace Price for this product
	 * @param int|float $minPrice Min Range
	 * @param int|float $maxPrice Max Range
	 * 
	 * @return int
	 */
	public static function calculateBestPrice($orignal_price,$bestMktPrice,$minPrice,$maxPrice)
	{
		$price = 0;
		$filler = self::REPRICING_FILLER_AMOUNT;
		if($bestMktPrice) {
			if($bestMktPrice > $orignal_price) {
				$price = $maxPrice;
				if($price >= $bestMktPrice)
				{
					while ($price >= $bestMktPrice) {
						$price = $price - $filler;
					}

					if($price < $minPrice) {
						$price = $minPrice;
					}
				}
			} elseif($bestMktPrice < $orignal_price) {
				$price = $minPrice;
				if($price < $bestMktPrice)
				{
					while ($price < $bestMktPrice) {
						$price = $price + $filler;
					}

					if($price >= $bestMktPrice) {
						$price = $price - $filler;
					}

					if($price > $maxPrice) {
						$price = $maxPrice;
					}
				}
			}else{
				$price = $orignal_price;
			}
			return $price;
		} else {
			return $orignal_price;
		}
	}

	/**
	 * Download BuyBox Report
	 *
	 * @param string $merchant_id
	 *
	 * @return string|bool
	 */
	public static function downloadBuyBoxReport($merchant_id, $filePath=null)
	{
		$default_file_path = \Yii::getAlias('@webroot').'/var/report/'.$merchant_id.'/buybox/buybox.zip';

		/**
		 * time in "hours:minutes:seconds"
		 */
		$interval_time = '0:30:0';
		
		$dafaultPathFlag = false;
		if(is_null($filePath)) {
			$dafaultPathFlag = true;
			$filePath = $default_file_path;
		}

		$query = "SELECT * FROM `walmart_buybox_report` WHERE NOW() > ADDTIME(`download_time`, '".$interval_time."') AND `merchant_id`={$merchant_id} LIMIT 0,1";
		$result = Data::sqlRecords($query,'one');

		$isExist = Data::sqlRecords("SELECT * FROM `walmart_buybox_report` WHERE `merchant_id`={$merchant_id} LIMIT 0,1",'one');

		if($result || !$isExist)
		{
			if(file_exists($filePath)) {
				unlink($filePath);
			}
			$extractDir = dirname($filePath).'/extract';
			if(is_dir($extractDir)) {
				self::deleteDir($extractDir);
			}

			if($this->fetchWalmartBuyboxReport($filePath)) 
			{
				$time = time();
				if($isExist)
				{
					$query = "UPDATE `walmart_buybox_report` SET `timestamp` = '{$time}' WHERE `id` = {$result['id']}";
					Data::sqlRecords($query,null,'update');
				}
				else
				{
					$query = "INSERT INTO `walmart_buybox_report` (`merchant_id`, `timestamp`) VALUES ({$merchant_id},'{$time}')";
					Data::sqlRecords($query,null,'insert');
				}

				$return = self::extractZipFile($filePath);
				return $return;
			}
			else {
				return false;
			} 
		}
		else
		{
			if(file_exists($filePath)) {
				$return = self::extractZipFile($filePath);
				return $return;
			}
			elseif(!$dafaultPathFlag) {
				$defaultPath = $default_file_path;
				if(file_exists($defaultPath)) {
					$return = self::extractZipFile($filePath);
					return $return;
				}
				else {
					return false;
				}
			}
			else {
				return false;
			}
		}
	}

	/**
	 * Extract Zip File
	 *
	 * @param string $filePath
	 * @param bool $extract
	 *
	 * @return string|bool
	 */
	public static function extractZipFile($filePath, $extract=true)
	{
		try
		{
			$zip = new ZipArchive();
			if ($zip->open($filePath, ZipArchive::CREATE)===TRUE) {
				$extractToPath = dirname($filePath).'/extract';
				if($extract) {
					if(!file_exists($extractToPath)) {
						mkdir($extractToPath, 0775, true);
					}
					$zip->extractTo($extractToPath);
				}
				$zip->close();

				$files = scandir($extractToPath);
				$extractFileName = '';
				foreach ($files as $file) {
					$ext = pathinfo($file, PATHINFO_EXTENSION);
					if($ext == 'csv')
						$extractFileName = $file;
				}

				if($extractFileName != '')
					return $extractToPath.'/'.$extractFileName;
				else
					return false;
			} else {
				return false;
			}
		}
		catch(Exception $e)
		{
			//echo $e->getMessage();die;
			return false;
		}
	}

	/**
	 * Delete Directory
	 *
	 * @param string $dirPath
	 *
	 * @return void
	 */
	public static function deleteDir($dirPath) 
	{
	    if (is_dir($dirPath)) {
	     	if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
		        $dirPath .= '/';
		    }
		    $files = glob($dirPath . '*', GLOB_MARK);
		    foreach ($files as $file) {
		        if (is_dir($file)) {
		            self::deleteDir($file);
		        } else {
		            unlink($file);
		        }
		    }
		    rmdir($dirPath);   
	    }
	}

	/**
	 * Prepare Buybox Data
	 *
	 * @param array $header Csv Header Row
	 * @param array $row Csv Data Row
	 * @return array
	 */
	public static function prepareBuyboxData($header, $row)
	{
		$data = [];
		if(is_array($header) && is_array($row) && in_array('Sku', $header))
		{
			foreach ($header as $headerKey => $headerValue) 
			{
				if(isset($row[$headerKey]))
				{
					$index = str_replace(' ', '_', strtolower($headerValue));
					$data[$index] = $row[$headerKey];
				}
			}
		}
		return $data;
	}

	/**
	 * Read Buybox Csv File
	 *
	 * @param string $csvFilePath Path of Csv File
	 * 
	 * @return array
	 */
	public static function readBuyboxCsv($csvFilePath, $limit=null, $page=0)
	{
		$buyBoxReport = [];
		if(file_exists($csvFilePath))
		{
			if (($handle = fopen($csvFilePath, "r")))
			{
				$row=0;
				$columns = [];
				$skuIndex = '';

				$start = 1+($page*$limit);
				$end = $limit+($page*$limit);

				while (($data = fgetcsv($handle, 90000, ",")) !== FALSE)
				{
					if($row==0 || in_array('Seller Id', $data) || in_array('Sku', $data)) {
						$row++;
						$columns = $data;
						$skuIndex = array_search('Sku', $data);
						continue;
					}

					if(is_null($limit))
					{
						if(count($prepareData=self::prepareBuyboxData($columns,$data))) {
							$sku = addslashes($data[$skuIndex]);
							$buyBoxReport[$sku] = $prepareData;
						}
					}
					else
					{
						if($start <= $row && $row <= $end)
						{
							if(count($prepareData=self::prepareBuyboxData($columns,$data))) {
								$sku = addslashes($data[$skuIndex]);
								$buyBoxReport[$sku] = $prepareData;
							}
						}
						elseif($row > $end)
						{
							break;
						}
					}
					$row++;
				}
			}
		}
		return $buyBoxReport;
	}

	/**
	 * Get the Number of rows in csv
	 *
	 * @param string $csvFilePath Path of Csv File
	 * 
	 * @return array
	 */
	public static function getRowsInCsv($csvFilePath)
	{
		if(file_exists($csvFilePath)) {
			return count(file($csvFilePath))-1;
		}
		else {
			return 0;
		}
	}

	/**
	 * Check if Repricing is Enabled or Not
	 *
	 * @param array $attribute
	 * you can check it either by product_id, option_id, sku
	 * For Example : $attribute = ['product_id'=>'123XXXXXX']; OR 
	 * 				 $attribute = ['option_id'=>'123XXXXXX']; OR
	 * 				 $attribute = ['sku'=>'123XXXXXX'];
	 * 
	 * @return boolean
	 */
	public static function isRepricingEnabled($attribute,$merchant_id=null)
	{
		$where = '';
		if(isset($attribute['product_id'])) {
			$where = '`product_id`='.$attribute['product_id'];
		} elseif(isset($attribute['option_id'])) {
			$where = '`option_id`='.$attribute['option_id'];
		} elseif(isset($attribute['sku'])) {
			$where = '`sku`="'.addslashes($attribute['sku']).'"';
		}
		if(is_null($merchant_id)){
			$merchant_id = Yii::$app->user->identity->id;
		}
		if($where != '') 
		{
			$query = 'SELECT `id` FROM `walmart_product_repricing` WHERE '.$where.' AND `repricing_status`=1 AND `merchant_id`="'.$merchant_id.'" LIMIT 0,1';
			$result = Data::sqlRecords($query, 'one');
			if(!$result) {
				return false;
			} else {
				return true;
			}
		} 
		else 
		{
			return false;
		}
	}
}
