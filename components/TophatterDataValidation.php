<?php
namespace frontend\modules\tophatter\components;

use Yii;
use yii\base\Component;


class TophatterDataValidation extends component
{
	const TITLE_NONE = "Title is Blank.";
	const TITLE_SMALL = "Title is Small in Length. Expecting 5 to 500 characters";
	const TITLE_LARGE = "Title is Large in Length. Expecting 5 to 500 characters";
	const TITLE_KEYWORDS = "Title contains keywords like ( 'new', 'offer', 'sale' ) which is incorrect";
	const SKU_OPERATORS = "Sku contains characters like ( '+', '/', '*', ':' ) which is incorrect";
	const DESC_NONE = "Description is Blank";
	const DESC_LARGE = "Description is Large in Length. Expecting 1 to 2000 characters";
	const UPC_NONE = "UPC is Blank";
	const UPC_LENGTH = "UPC with Wrong Length. Expected Length : '10', '12', '13' or '14'";
	const ASIN_NONE = "ASIN is Blank";
	const ASIN_LENGTH = "ASIN with Wrong Length. Expected Length : '10'";
	const MPN_NONE = "MPN is Blank";
	const MPN_LARGE = "MPN with Wrong Length. Expecting Length : '1' to '50'";


	public static function validateData($productIds = [], $merchantId)
	{

			$data = [];
			$connection = Yii::$app->getDb();
			$subQuery = "";
			if(count($productIds)>0){
				$subQuery = " AND `main`.`id` IN(".implode(',', $productIds).")";
			}
			/*$query = "SELECT `main`.`id` , `main`.`sku`, `main`.`title`, `main`.`type`, `main`.`description`, `main`.`variant_id`, `main`.`upc`,`main`.`ASIN`, `main`.`mpn`, `sub`.`option_sku`, `sub`.`option_title`, `sub`.`option_id`, `sub`.`option_unique_id`, `sub`.`option_mpn`, `sub`.`asin` ".
			" FROM `jet_product` as `main` INNER JOIN `tophatter_product` as `wp` ON `main`.`id`=`wp`.`product_id` LEFT JOIN `jet_product_variants` as `sub` ON `main`.`id`=`sub`.`product_id` AND `main`.`merchant_id`=`sub`.`merchant_id` ".
			"WHERE `main`.`merchant_id` = {$merchantId} AND ".
			"(".
				"(".
					"(`main`.`sku` LIKE '%/%' OR `main`.`sku` LIKE '%+%' OR `main`.`sku` LIKE '%*%' OR `main`.`sku` LIKE '%:%')".//jet_product table sku
					" OR (`sub`.`option_sku` LIKE '%/%' OR `sub`.`option_sku` LIKE '%+%' OR `sub`.`option_sku` LIKE '%*%' OR `sub`.`option_sku` LIKE '%:%')".//jet_variants table sku
				 ") OR (".
						"(".
							"(CHAR_LENGTH(`main`.`title`))<5 OR (CHAR_LENGTH(`main`.`title`))>500 OR `main`.`title` LIKE '%sale%' OR `main`.`title` LIKE '%offer%' OR `main`.`title` LIKE '%new%' ".//jet_product table title
						//") OR (".
						//	"(CHAR_LENGTH(`sub`.`option_title`))<5 OR (CHAR_LENGTH(`sub`.`option_title`))>500 OR `sub`.`option_title` LIKE '%sale%' OR `sub`.`option_title` LIKE '%offer%' OR `sub`.`option_title` LIKE '%new%' ".//jet_variant table title
						")".
				") OR (".
						"(".
							"((CHAR_LENGTH(`main`.`upc`))!=12 AND (CHAR_LENGTH(`main`.`upc`))!=14 AND (CHAR_LENGTH(`main`.`upc`))!=13 AND CHAR_LENGTH(`main`.`upc`)!=10) AND (CHAR_LENGTH(`main`.`ASIN`)!=10) AND ( CHAR_LENGTH(`main`.`mpn`)>50 OR CHAR_LENGTH(`main`.`mpn`)<1 )".//jet_product table barcode
						") OR (".
							"((CHAR_LENGTH(`sub`.`option_unique_id`))!=12 AND(CHAR_LENGTH(`sub`.`option_unique_id`))!=14 AND (CHAR_LENGTH(`sub`.`option_unique_id`))!=13 AND CHAR_LENGTH(`sub`.`option_unique_id`)!=10) AND (CHAR_LENGTH(`sub`.`asin`)!=10) AND ( CHAR_LENGTH(`sub`.`option_mpn`)>50 OR CHAR_LENGTH(`sub`.`option_mpn`)<1 ) ".//jet_varients table barcode
						")".
				") OR (".
						"(".
							"(CHAR_LENGTH(`main`.`description`))<1 OR (CHAR_LENGTH(`main`.`description`))>2000".//jet_product table description
						")".
				")".
			") ".$subQuery." Order BY `main`.`id`, `sub`.`option_id` DESC";*/

        $query = "SELECT `main`.`id` , `main`.`sku`, `main`.`title`, `main`.`type`, `main`.`description`, `main`.`upc`,`main`.`ASIN`, `main`.`mpn`, `sub`.`option_sku`, `sub`.`option_title`, `sub`.`option_id`, `sub`.`option_unique_id`, `sub`.`option_mpn`, `sub`.`asin` ".
            " FROM (SELECT * FROM `jet_product` WHERE `merchant_id`='".$merchantId."') as `main` INNER JOIN (SELECT * FROM `tophatter_product` WHERE `merchant_id`='".$merchantId."') as `wp` ON `main`.`bigproduct_id`=`wp`.`product_id` LEFT JOIN (SELECT * FROM `jet_product_variants` WHERE `merchant_id`='".$merchantId."') as `sub` ON `main`.`bigproduct_id`=`sub`.`product_id` AND `main`.`merchant_id`=`sub`.`merchant_id` ".
            "WHERE `main`.`merchant_id` = {$merchantId} AND ".
            "(".
            "(".
            "(`main`.`sku` LIKE '%/%' OR `main`.`sku` LIKE '%+%' OR `main`.`sku` LIKE '%*%' OR `main`.`sku` LIKE '%:%')".//jet_product table sku
            " OR (`sub`.`option_sku` LIKE '%/%' OR `sub`.`option_sku` LIKE '%+%' OR `sub`.`option_sku` LIKE '%*%' OR `sub`.`option_sku` LIKE '%:%')".//jet_variants table sku
            ") OR (".
            "(".
            "(CHAR_LENGTH(`main`.`title`))<5 OR (CHAR_LENGTH(`main`.`title`))>500 OR `main`.`title` LIKE '%sale%' OR `main`.`title` LIKE '%offer%' OR `main`.`title` LIKE '%new%' ".//jet_product table title
            //") OR (".
            //	"(CHAR_LENGTH(`sub`.`option_title`))<5 OR (CHAR_LENGTH(`sub`.`option_title`))>500 OR `sub`.`option_title` LIKE '%sale%' OR `sub`.`option_title` LIKE '%offer%' OR `sub`.`option_title` LIKE '%new%' ".//jet_variant table title
            ")".
            ") OR (".
            "(".
            "((CHAR_LENGTH(`main`.`upc`))!=12 AND (CHAR_LENGTH(`main`.`upc`))!=14 AND (CHAR_LENGTH(`main`.`upc`))!=13 AND CHAR_LENGTH(`main`.`upc`)!=10) AND (CHAR_LENGTH(`main`.`ASIN`)!=10) AND ( CHAR_LENGTH(`main`.`mpn`)>50 OR CHAR_LENGTH(`main`.`mpn`)<1 )".//jet_product table barcode
            ") OR (".
            "((CHAR_LENGTH(`sub`.`option_unique_id`))!=12 AND(CHAR_LENGTH(`sub`.`option_unique_id`))!=14 AND (CHAR_LENGTH(`sub`.`option_unique_id`))!=13 AND CHAR_LENGTH(`sub`.`option_unique_id`)!=10) AND (CHAR_LENGTH(`sub`.`asin`)!=10) AND ( CHAR_LENGTH(`sub`.`option_mpn`)>50 OR CHAR_LENGTH(`sub`.`option_mpn`)<1 ) ".//jet_varients table barcode
            ")".
            ") OR (".
            "(".
            "(CHAR_LENGTH(`main`.`description`))<1 OR (CHAR_LENGTH(`main`.`description`))>2000".//jet_product table description
            ")".
            ")".
            ") ".$subQuery." Order BY `main`.`bigproduct_id`, `sub`.`option_id` DESC LIMIT 0 , 5000";

			$data = Yii::$app->db->createCommand($query)->queryAll();
			$connection->close();
			$result = [];
			foreach($data as $row){//0-correct/not present, 1-incorrect
				$main_title = 0;
				$main_sku = 0;
				$main_upc = 0;
				$main_mpn = 0;
				$main_asin = 0;
				$main_desc = 0;
				$sub_sku = 0;
				$sub_title = 0;
				$sub_asin = 0;
				$sub_upc = 0;
				$sub_mpn = 0;
				$sub_barcode = 0;
				$main_barcode = 0;
				$subTitleIssueKeywords = "";
				$mainTitleIssueKeywords = "";
				$subSkuIssueKeywords = "";
				$mainSkuIssueKeywords = "";
				$subBarcodeIssueKeywords = "";
				$mainBarcodeIssueKeywords = "";
				$mainDescIssueKeywords = "";
				if(strlen($row['title'])<5 || strlen($row['title'])>500 || preg_match("/sale/", $row['title']) || preg_match("/offer/", $row['title']) || preg_match("/new/", $row['title'])){
					$main_title = 1;
					if(strlen($row['title'])<1){
						$mainTitleIssueKeywords = "{title_none}";
					}elseif(strlen($row['title'])<5){
						$mainTitleIssueKeywords = "{title_small}";
					}elseif(strlen($row['title'])>500){
						$mainTitleIssueKeywords = "{title_large}";
					}
					if(preg_match("/(sale)|(new)|(offer)/", $row['title'])){
						if($mainTitleIssueKeywords != ""){
							$mainTitleIssueKeywords .= "{title_keywords}";
						}else{
							$mainTitleIssueKeywords = "{title_keywords}";
						}
					}

				}

				if(preg_match('/\+|\/|\*|:/',$row['sku'])){
					$main_sku = 1;
					$mainSkuIssueKeywords = "{sku_operator}";
				}

				if(strlen($row['description'])<1 || strlen($row['description'])>2000){
					$main_desc = 1;
					if(strlen($row['description'])<1){
						$mainDescIssueKeywords = "{desc_none}";
					}else{
						$mainDescIssueKeywords = "{desc_large}";
					}
				}
				if(!in_array(strlen($row['upc']), [10,12,13,14])){
					$main_upc = 1;
					if(strlen($row['upc'])<1){
						$mainBarcodeIssueKeywords = "{upc_none}";
					}else{
						$mainBarcodeIssueKeywords = "{upc_length}";
					}

				}
				if(strlen($row['ASIN'])!=10){
					$main_asin = 1;
					if ($mainBarcodeIssueKeywords!=""){
						if(strlen($row['ASIN'])<1){
							$mainBarcodeIssueKeywords .= "{asin_none}";
						}else{
							$mainBarcodeIssueKeywords .= "{asin_length}";
						}
					}else{
						if(strlen($row['ASIN'])<1){
							$mainBarcodeIssueKeywords = "{asin_none}";
						}else{
							$mainBarcodeIssueKeywords = "{asin_length}";
						}
					}
				}
				if(strlen($row['mpn'])<1 || strlen($row['mpn'])>50){
					$main_mpn = 1;
					if(strlen($row['mpn'])<1){
						if ($mainBarcodeIssueKeywords!=""){
							$mainBarcodeIssueKeywords .= "{mpn_none}";
						}else{
							$mainBarcodeIssueKeywords = "{mpn_none}";
						}
					}else{
							if ($mainBarcodeIssueKeywords!=""){
								$mainBarcodeIssueKeywords .= "{mpn_large}";
							}else{
								$mainBarcodeIssueKeywords = "{mpn_large}";
							}
					}
				}
				if(trim($row['type']) != 'simple'){
						/*if(strlen($row['option_title'])<5 || strlen($row['option_title'])>500 || preg_match("/(sale)|(new)|(offer)/", $row['option_title'])){
							$sub_title = 1;
							if(strlen($row['option_title'])<1){
								$subTitleIssueKeywords = "{title_none}";
							}elseif(strlen($row['option_title'])<5){
								$subTitleIssueKeywords = "{title_small}";
							}elseif(strlen($row['option_title'])>500){
								$subTitleIssueKeywords = "{title_large}";
							}
							if(preg_match("/(sale)|(new)|(offer)/", $row['option_title'])){
								if($subTitleIssueKeywords != ""){
									$subTitleIssueKeywords .= "{title_keywords}";
								}else{
									$subTitleIssueKeywords = "{title_keywords}";
								}
							}

						}*/
						if(preg_match('/\+|\/|\*|:/',$row['option_sku'])){
							$sub_sku = 1;
							$subSkuIssueKeywords = "{sku_operator}";
						}
						if(!in_array(strlen($row['option_unique_id']), [10,12,13,14])){
							$sub_upc = 1;
							if(strlen($row['option_unique_id'])<1){
								$subBarcodeIssueKeywords = "{upc_none}";
							}else{
								$subBarcodeIssueKeywords = "{upc_length}";
							}

						}
						if(strlen($row['asin'])!=10){
							$sub_asin = 1;
							if ($subBarcodeIssueKeywords!=""){
								if(strlen($row['asin'])<1){
									$subBarcodeIssueKeywords .= "{asin_none}";
								}else{
									$subBarcodeIssueKeywords .= "{asin_length}";
								}

							}else{
								if(strlen($row['asin'])<1){
									$subBarcodeIssueKeywords = "{asin_none}";
								}else{
									$subBarcodeIssueKeywords = "{asin_length}";
								}

							}
						}
						if(strlen($row['option_mpn'])<1 || strlen($row['option_mpn'])>50){
							$sub_mpn = 1;
							if(strlen($row['option_mpn'])<1){
								if ($subBarcodeIssueKeywords!=""){
									$subBarcodeIssueKeywords .= "{mpn_none}";
								}else{
									$subBarcodeIssueKeywords = "{mpn_none}";
								}
							}else{
									if ($subBarcodeIssueKeywords!=""){
										$subBarcodeIssueKeywords .= "{mpn_large}";
									}else{
										$subBarcodeIssueKeywords = "{mpn_large}";
									}
							}
						}
						if($sub_upc && $sub_mpn && $sub_asin){
							$sub_barcode = 1;

						}
				}

				if($main_upc && $main_mpn && $main_asin){
					$main_barcode = 1;
				}
				if($main_title || $main_sku || $main_desc || $main_barcode){
					$result[$row['id']]['display_name'] =  $row ['title'];
					$result[$row['id']]['skus'] =  $row ['sku'];

					if($main_title){
						$result[$row['id']]['title'] =  $row ['title'];
						$result[$row['id']]['titleIssue'] = self::addCommaNAnd($mainTitleIssueKeywords);
					}
					if($main_sku){
						$result[$row['id']]['sku'] =  $row ['sku'];
						$result[$row['id']]['skuIssue'] = self::addCommaNAnd($mainSkuIssueKeywords);
					}
					if($main_desc){
						$result[$row['id']]['description'] =  "Wrong";//$row ['description'];
						$result[$row['id']]['descriptionIssue'] = self::addCommaNAnd($mainDescIssueKeywords);
					}
					if($main_barcode){
						$result[$row['id']]['barcode']['upc'] =  $row ['upc'];
						$result[$row['id']]['barcode']['asin'] =  $row ['ASIN'];
						$result[$row['id']]['barcode']['mpn'] =  $row ['mpn'];
						$result[$row['id']]['barcodeIssue'] = self::addCommaNAnd($mainBarcodeIssueKeywords);
					}
				}
				if($sub_sku || $sub_barcode){//$sub_title ||
					$result[$row['id']]['display_name'] =  $row ['title'];
					//$count = isset($result[$row['id']]['variants']) ? count($result[$row['id']]['variants']): 0;
					$result[$row['id']]['variants'][$row ['option_id']]['display_name'] = $row ['option_sku'];
					/*if($sub_title){
						$result[$row['id']]['variants'][$row ['option_id']]['title'] = $row ['option_title'];
						$result[$row['id']]['variants'][$row ['option_id']]['titleIssue'] = self::addCommaNAnd($subTitleIssueKeywords);
					}*/
                    $result[$row['id']]['variants'][$row ['option_id']]['skus'] = $row ['option_sku'];

                    if($sub_sku){
						$result[$row['id']]['variants'][$row ['option_id']]['sku'] = $row ['option_sku'];
						$result[$row['id']]['variants'][$row ['option_id']]['skuIssue'] = self::addCommaNAnd($subSkuIssueKeywords);
					}
					if($sub_barcode){
						$result[$row['id']]['variants'][$row ['option_id']]['barcode']['upc'] = $row ['option_unique_id'];
						$result[$row['id']]['variants'][$row ['option_id']]['barcode']['asin'] = $row ['asin'];
						$result[$row['id']]['variants'][$row ['option_id']]['barcode']['mpn'] = $row ['option_mpn'];
						$result[$row['id']]['variants'][$row ['option_id']]['barcodeIssue'] = self::addCommaNAnd($subBarcodeIssueKeywords);
					}
				}
			}

			//echo "<pre>";print_r($result);echo "</pre>";die('kijk');
			return $result;
	}

	public static function getWords($array = []){
		$string = "";
		$i = 0;
		foreach ( $array as $value) {
			switch ($value){
				case "{sku_operator}" : $string = $string . self::SKU_OPERATORS; break;
				case "{title_none}" : $string = $string .self::TITLE_NONE; break;
				case "{title_small}" : $string = $string .self::TITLE_SMALL; break;
				case "{title_large}" : $string = $string .self::TITLE_LARGE; break;
				case "{title_keywords}" : $string = $string .self::TITLE_KEYWORDS; break;
				case "{desc_none}" : $string = $string .self::DESC_NONE; break;
				case "{desc_large}" : $string = $string .self::DESC_LARGE; break;
				case "{upc_none}" : $string = $string .self::UPC_NONE; break;
				case "{upc_length}" : $string = $string .self::UPC_LENGTH; break;
				case "{asin_none}" : $string = $string .self::ASIN_NONE; break;
				case "{asin_length}" : $string = $string .self::ASIN_LENGTH; break;
				case "{mpn_none}" : $string = $string .self::MPN_NONE; break;
				case "{mpn_large}" : $string = $string .self::MPN_LARGE; break;
			}
			$i ++;
		}
		return $string;
	}

	public static function addCommaNAnd($string = ""){
		$array = [];
		$matches = [];
		if(strlen($string)>0){
			preg_match_all('/{\\w+}/', $string, $matches);
			if(count($matches)>0){
				$array = $matches [0];
			}
			if(count($array)>0){
				$res = $array [0];
				$i = 1;
				while($i<count($array)-1) {
					$res = $res .", ". $array [$i];
					$i ++;
				}
				if($i == count($array)-1){
					$res = $res ." & ". $array [$i];
				}
			}
			$string = $res;
		}
		return $string;
	}
}
?>
