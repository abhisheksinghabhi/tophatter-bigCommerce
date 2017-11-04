<?php 
namespace frontend\modules\tophatter\components;

use Yii;
use ZipArchive;

class TophatterReport extends TophatterRepricing
{
	const REPORT_TYPE_ITEM = 'item';
	const REPORT_TYPE_BUYBOX = 'buybox';

	/**
	 * Download Item Report
	 *
	 * @param string $merchant_id
	 *
	 * @return string|bool
	 */
	public function downloadItemReport($merchant_id, $filePath=null)
	{
		$default_file_path = \Yii::getAlias('@webroot').'/var/report/'.$merchant_id.'/item/item.zip';

		/**
		 * time in "hours:minutes:seconds"
		 */
		$interval_time = '0:30:0';
		
		$dafaultPathFlag = false;
		if(is_null($filePath)) {
			$dafaultPathFlag = true;
			$filePath = $default_file_path;
		}

		$report_type = self::REPORT_TYPE_ITEM;
		$query = "SELECT * FROM `tophatter_report` WHERE NOW() > ADDTIME(`download_time`, '".$interval_time."') AND `merchant_id`={$merchant_id} AND `report_type` LIKE '{$report_type}' LIMIT 0,1";
		$result = Data::sqlRecords($query,'one');

		$isExist = Data::sqlRecords("SELECT * FROM `tophatter_report` WHERE `merchant_id`={$merchant_id} AND `report_type` LIKE '{$report_type}' LIMIT 0,1",'one');

		if($result || !$isExist)
		{
			if(file_exists($filePath)) {
				unlink($filePath);
			}
			$extractDir = dirname($filePath).'/extract';
			if(is_dir($extractDir)) {
				self::deleteDir($extractDir);
			}

			if($this->fetchTophatterProductReport($filePath)) 
			{
				$time = time();
				if($isExist)
				{
					$query = "UPDATE `tophatter_report` SET `timestamp` = '{$time}' WHERE `id` = {$result['id']}";
					Data::sqlRecords($query,null,'update');
				}
				else
				{
					$query = "INSERT INTO `tophatter_report` (`merchant_id`, `timestamp`, `report_type`) VALUES ({$merchant_id},'{$time}', '{$report_type}')";
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
	 * Read Item Csv File
	 *
	 * @param string $csvFilePath Path of Csv File
	 * @param int $limit Number of records to fetch
	 * @param int $page  
	 * @return array
	 */
	public static function readItemCsv($csvFilePath, $limit=null, $page=0)
	{
		$csvData = [];
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
					if($row==0 || in_array('PARTNER ID', $data) || in_array('SKU', $data)) {
						$row++;
						$columns = $data;
						$skuIndex = array_search('SKU', $data);
						continue;
					}

					if(is_null($limit))
					{
						if(count($prepareData=self::prepareCsvData($columns,$data))) {
							if($skuIndex) {
								$sku = addslashes(trim($data[$skuIndex]));
								$csvData[$sku] = $prepareData;
							} else {
								$csvData[] = $prepareData;
							}
						}
					}
					else
					{
						if($start <= $row && $row <= $end)
						{
							if(count($prepareData=self::prepareCsvData($columns,$data))) {
								if($skuIndex) {
									$sku = addslashes(trim($data[$skuIndex]));
									$csvData[$sku] = $prepareData;
								} else {
									$csvData[] = $prepareData;
								}
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
		return $csvData;
	}

	/**
	 * Prepare CSV Data
	 *
	 * @param array $header Csv Header Row
	 * @param array $row Csv Data Row
	 * @return array
	 */
	public static function prepareCsvData($header, $row)
	{
		$data = [];
		if(is_array($header) && is_array($row))
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

}