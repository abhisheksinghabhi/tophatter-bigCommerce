<?php
namespace frontend\modules\tophatter\components;

use Yii;
use frontend\modules\tophatter\components\AttributeMap;
use frontend\modules\tophatter\models\TophatterAttributeMap;
use frontend\modules\tophatter\models\TophatterProduct as TophatterProductModel;

class TophatterProduct extends Tophatterapi
{
   
    const PUT_PRICE_SUB_URL = 'v3/price';
    const ALL_PRODUCT_UPLOAD_FILEPATH = '/frontend/modules/tophatter/filestorage/product/create/';
    const FEED_TYPE_ITEM = 'item';
    const PRICE_LIMIT = '500';
    const QTY_LIMIT = '500';

    const REQUIRED_ATTRIBUTE  = 'it_is_required';
    const NON_REQUIRED_ATTRIBUTE  = 'it_is_not_required';

    public static function getAllProductSku($merchant_id, $filterByStatus = null)
    {
        if (is_null($filterByStatus)) {
            $query = "SELECT `result`.* FROM ((SELECT `jp`.`sku` FROM `jet_product` `jp` INNER JOIN (SELECT `product_id`,`merchant_id`,`status` FROM `tophatter_product` WHERE `merchant_id`='{$merchant_id}') as `wp` ON `jp`.`bigproduct_id`=`wp`.`product_id` WHERE `jp`.`merchant_id`='{$merchant_id}') UNION (SELECT `option_sku` AS `sku` FROM `jet_product_variants` `jpv` INNER JOIN (SELECT `option_id`,`merchant_id`,`status` FROM `tophatter_product_variants` WHERE `merchant_id`='{$merchant_id}') as `wpv` ON `jpv`.`option_id`=`wpv`.`option_id` WHERE `jpv`.`merchant_id`='{$merchant_id}')) as `result`";

            /*$query = "SELECT `merged_data`.* FROM ((SELECT `variant_id` FROM `tophatter_product` INNER JOIN `jet_product` ON `tophatter_product`.`product_id`=`jet_product`.`id` WHERE `tophatter_product`.`merchant_id`=" . $merchant_id . " AND `jet_product`.`type`='simple' AND `tophatter_product`.`category` != '') UNION (SELECT `tophatter_product_variants`.`option_id` AS `variant_id` FROM `tophatter_product_variants` INNER JOIN `tophatter_product` ON `tophatter_product_variants`.`product_id` = `tophatter_product`.`product_id` INNER JOIN `jet_product_variants` ON `tophatter_product_variants`.`option_id`=`jet_product_variants`.`option_id` WHERE `tophatter_product_variants`.`merchant_id`=" . $merchant_id . " AND `tophatter_product`.`category` != '')) as `merged_data`";*/
        } else {
            $status = $filterByStatus;
            $query = "SELECT `result`.* FROM ((SELECT `jp`.`sku` FROM `jet_product` `jp` INNER JOIN (SELECT `product_id`,`merchant_id`,`status` FROM `tophatter_product` WHERE `merchant_id`='{$merchant_id}') as `wp` ON `jp`.`bigproduct_id`=`wp`.`product_id` WHERE `jp`.`merchant_id`='{$merchant_id}' AND `wp`.`status`='{$status}') UNION (SELECT `option_sku` AS `sku` FROM `jet_product_variants` `jpv` INNER JOIN (SELECT `option_id`,`merchant_id`,`status` FROM `tophatter_product_variants` WHERE `merchant_id`='{$merchant_id}') as `wpv` ON `jpv`.`option_id`=`wpv`.`option_id` WHERE `jpv`.`merchant_id`='{$merchant_id}' AND `wpv`.`status`='{$status}')) as `result`";
        }
        $result = Data::sqlRecords($query, 'column');

        return $result;
    }

    /**
     * Bulk Update Price On tophatter via Csv
     * @param [] $products
     * @return bool
     */
    public  function updatePriceviaCsv($products = [])
    {
        $merchant_id = Yii::$app->user->identity->id;
        $count = 0;
        $timeStamp = (string)time();
        $priceArray = [
            'PriceFeed' => [
                '_attribute' => [
                    'xmlns:gmp' => "http://tophatter.com/",
                ],
                '_value' => [
                    0 => [
                        'PriceHeader' => [
                            'version' => '1.5',
                        ],
                    ],
                ]
            ]
        ];

        $isPriceFeed = 1;

        if (is_array($products) && count($products) > 0) {
            foreach ($products as $product) {

                $price = $product['price'];

                $priceArray['PriceFeed']['_value'][$isPriceFeed] = [
                    'Price' => [
                        'itemIdentifier' => [
                            'sku' => $product['sku']
                        ],
                        'pricingList' => [
                            'pricing' => [
                                'currentPrice' => [
                                    'value' => [
                                        '_attribute' => [
                                            'currency' => $product['currency'],
                                            'amount' => $price
                                        ],
                                        '_value' => [

                                        ]
                                    ]
                                ],
                                'currentPriceType' => 'BASE',
                                'comparisonPrice' => [
                                    'value' => [
                                        '_attribute' => [
                                            'currency' => $product['currency'],
                                            'amount' => $price
                                        ],
                                        '_value' => [

                                        ]
                                    ]
                                ],
                            ]
                        ]
                    ]
                ];

                $isPriceFeed++;
            }
        }

        if ($isPriceFeed > 1) {
            /*$customGenerator = new Generator();
            $customGenerator->arrayToXml($priceArray);

            $str = preg_replace('/(\<\?xml\ version\=\"1\.0\"\?\>)/', '<?xml version="1.0" encoding="UTF-8"?>',
                $customGenerator->__toString());
            $params['data'] = $str;

            var_dump($str);die("xml file");
            $response = $this->postRequest(self::GET_FEEDS_PRICE_SUB_URL, $params);*/

            if (!$merchant_id)
                $path = 'tophatter/product/update/' . date('d-m-Y') . '/' . MERCHANT_ID . '/csv/inventory';
            else
                $path = 'tophatter/product/update/' . date('d-m-Y') . '/' . $merchant_id . '/csv/inventory';
            $dir = \Yii::getAlias('@webroot') . '/var/' . $path;
            $logFile = $path . '/update.log';
            if (!file_exists($dir)) {
                mkdir($dir, 0775, true);
            }
            $xml = new Generator();
            $file = $dir . '/MPProduct-' . time() . '.xml';

            $xml->arrayToXml($priceArray)->save($file);
            /*$response = $this->postRequest(self::GET_FEEDS_PRICE_SUB_URL, ['file' => $file]);*/
            $response = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?><ns2:FeedAcknowledgement xmlns:ns2="http://tophatter.com/"><ns2:feedId>EA0BEDA5AD084E628E459110814676AE@AQkBAQA</ns2:feedId></ns2:FeedAcknowledgement>';
            $responseArray = self::xmlToArray($response);

            if (isset($responseArray['FeedAcknowledgement'])) {

                foreach ($products as $productsvalue) {

                    if ($productsvalue['type'] == "No Variants") {
                        $query = "update `tophatter_product` set product_price ='" . $productsvalue['price'] . "' where merchant_id='" . $merchant_id . "' AND product_id='" . $productsvalue['id'] . "'";
                        Data::sqlRecords($query, null, "update");
                    } else {

                        if($productsvalue['type']== 'Parent'){
                            $query = "update `tophatter_product` set product_price ='" . $productsvalue['price'] . "' where merchant_id='" . $merchant_id . "' AND product_id='" . $productsvalue['id'] . "'";
                            Data::sqlRecords($query, null, "update");
                        }
                        $query = "update `tophatter_product_variants` set option_prices ='" . $productsvalue['price'] . "' where merchant_id='" . $merchant_id . "' AND option_id='" . $productsvalue['option_id'] . "'";
                        Data::sqlRecords($query, null, "update");
                    }
                    $count++;

                }

                /*$results = $this->getFeeds($responseArray['FeedAcknowledgement']['feedId']);
                if (isset($results['results'][0], $results['results'][0]['itemsSucceeded']) && $results['results'][0]['itemsSucceeded'] == 1) {
                    return ['feedId' => $responseArray['FeedAcknowledgement']['feedId'], 'count' => $count];
                }*/
                if (isset($responseArray['FeedAcknowledgement']['feedId'])) {
                    $result = $this->getFeeds($responseArray['FeedAcknowledgement']['feedId']);
                    return ['feedId' => $responseArray['FeedAcknowledgement']['feedId'], 'count' => $count];
                }
            } elseif (isset($responseArray['errors'])) {
                return ['errors' => $responseArray['errors']];
            } else {
                return ['errors' => $responseArray];
            }
        } else {
            return ['errors' => "No products found for price update."];
        }
    }

    /**
     * Bulk Inventory Update On tophatter via Csv
     * @param [] $products
     * @return bool
     */
    public  function updateInventoryViaCsv($products = [])
    {
        $merchant_id = Yii::$app->user->identity->id;
        $timeStamp = (string)time();
        $count1 = 0;
        $inventoryArray = [
            'InventoryFeed' => [
                '_attribute' => [
                    'xmlns' => "http://tophatter.com/",
                ],
                '_value' => [
                    0 => ['InventoryHeader' => [
                        'version' => '1.4',
                    ],
                    ],
                ]
            ]
        ];

        $count = 1;

        if (is_array($products) && count($products) > 0) {
            foreach ($products as $product) {
                $inventory = $product['qty'];

                $inventoryArray['InventoryFeed']['_value'][$count] = [
                    'inventory' => [
                        'sku' => $product['sku'],
                        'quantity' => [
                            'unit' => 'EACH',
                            'amount' => $inventory,
                        ],
                        'fulfillmentLagTime' => isset($product['fulfillment_lag_time']) ? $product['fulfillment_lag_time'] : '1',
                    ]
                ];

                $count++;
            }
        }

        if ($count > 1) {
            /*$customGenerator = new Generator();
            $customGenerator->arrayToXml($inventoryArray);

            $str = preg_replace('/(\<\?xml\ version\=\"1\.0\"\?\>)/', '<?xml version="1.0" encoding="UTF-8"?>',
                $customGenerator->__toString());

            $params['data'] = $str;
            print_r($str);
            $response = $this->postRequest(self::GET_FEEDS_INVENTORY_SUB_URL, $str);
            $responseArray = self::xmlToArray($response);*/
            if (!$merchant_id)
                $path = 'tophatter/product/update/' . date('d-m-Y') . '/' . MERCHANT_ID . '/csv/inventory';
            else
                $path = 'tophatter/product/update/' . date('d-m-Y') . '/' . $merchant_id . '/csv/inventory';
            $dir = \Yii::getAlias('@webroot') . '/var/' . $path;
            $path1 = 'product/update/' . date('d-m-Y') . '/' . $merchant_id . '/csv/inventory';

            $logFile = $path1 . '/update.log';
            if (!file_exists($dir)) {
                mkdir($dir, 0775, true);
            }
            $file = $dir . '/MPProduct-' . time() . '.xml';
            $xml = new Generator();
            $xml->arrayToXml($inventoryArray)->save($file);

            Data::createLog('calling Post Request function : ', $logFile);
            $response = $this->postRequest(self::GET_FEEDS_INVENTORY_SUB_URL, ['file' => $file]);
            /*$response = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?><ns2:FeedAcknowledgement xmlns:ns2="http://tophatter.com/"><ns2:feedId>94DE794559664F8A8FD414FA38756EA1@AQkBAAA</ns2:feedId></ns2:FeedAcknowledgement>';*/
            Data::createLog("inventory response: " . PHP_EOL . $response . PHP_EOL, $logFile);

            $responseArray = self::xmlToArray($response);
            if (isset($responseArray['FeedAcknowledgement'])) {
                foreach ($products as $productsvalue) {
                    if ($productsvalue['type'] == "No Variants") {

                        /*$query ="UPDATE `jet_product` SET qty ='" . $productsvalue['qty'] . "' WHERE merchant_id='" . $merchant_id . "' AND id='" . $productsvalue['id'] . "'";*/
                        $query = "UPDATE `jet_product` SET `qty`='" . $productsvalue['qty'] . "' WHERE `merchant_id`='" . $merchant_id . "' AND `id`='" . $productsvalue['id'] . "'";
                        Data::sqlRecords($query, null, "update");
                        Data::createLog("inventory jet_product query: " . PHP_EOL . $query . PHP_EOL, $logFile);

                    } else {
                        if($productsvalue['type']== 'Parent'){
                            $query = "update `tophatter_product` set product_price ='" . $productsvalue['price'] . "' where merchant_id='" . $merchant_id . "' AND id='" . $productsvalue['id'] . "'";
                            Data::sqlRecords($query, null, "update");
                        }

                        /*$query = "UPDATE `jet_product_variants` SET option_qty ='" . $productsvalue['qty'] . "' WHERE merchant_id='" . $merchant_id . "' AND option_id='" . $productsvalue['option_id'] . "'";*/
                        $query = "UPDATE `jet_product_variants` SET `option_qty`='" . $productsvalue['qty'] . "' WHERE `merchant_id`='" . $merchant_id . "' AND `option_id`='" . $productsvalue['option_id'] . "'";

                        $res = Data::sqlRecords($query, null, "update");
                        Data::createLog("inventory jet_product_variants query: " . PHP_EOL . $query . PHP_EOL, $logFile);

                    }
                    $count1++;

                }
                $result = $this->getFeeds($responseArray['FeedAcknowledgement']['feedId']);

                Data::createLog("inventory response: " . PHP_EOL . json_encode($result) . PHP_EOL, $logFile);

                if (isset($responseArray['FeedAcknowledgement']['feedId'])) {
                    $result = $this->getFeeds($responseArray['FeedAcknowledgement']['feedId']);
                    return ['feedId' => $responseArray['FeedAcknowledgement']['feedId'], 'count' => $count1];
                }
            } elseif (isset($responseArray['errors'])) {
                return ['errors' => $responseArray['errors']];
            } else {
                return ['errors' => $responseArray];
            }
        } else {
            return ['errors' => "No products found for inventory update."];
        }
    }

    /**
     * Get all products info
     *
     * @param $product_ids (comma seperated product ids)
     * @return []
     */
    public static function getProductInfo($product_ids)
    {

        $merchant_id = Yii::$app->user->identity->id;

        $jet_columns = ['`jp`.`title`', '`jp`.`sku`', '`jp`.`type`', '`jp`.`product_type`', '`jp`.`price`,`jp`.`upc`'/*, '`jp`.``'*/];
        $tophatter_columns = ['`wp`.`status`', '`wp`.`product_title`', '`wp`.`product_price`', '`wp`.`product_id`'/*, '`wp`.``'*/];
        $query = "SELECT " . implode(',', $jet_columns) . "," . implode(',', $tophatter_columns) . " ,`wpr`.* FROM `jet_product` `jp` INNER JOIN (SELECT * FROM `tophatter_product` WHERE `merchant_id`='{$merchant_id}' AND `product_id` IN ({$product_ids})) AS `wp` ON `jp`.`bigproduct_id`=`wp`.`product_id` RIGHT JOIN (SELECT * FROM `tophatter_product_repricing` WHERE `merchant_id`='{$merchant_id}' AND `product_id` IN ({$product_ids})) AS `wpr` ON `wpr`.`product_id`=`wp`.`product_id` where jp.merchant_id='{$merchant_id}'";
        
        $result = Data::sqlRecords($query,'all','select');


        return $result;
    }


    /**
     * Get all variant products info
     *
     * @param $product_ids (comma seperated product ids)
     * @return []
     */
    public static function getVariantsProductInfo($product_ids)
    {
        $merchant_id = Yii::$app->user->identity->id;

        $jet_columns = ['`jpv`.`option_title`', '`jpv`.`option_sku`', '`jpv`.`option_image`', '`jpv`.`option_price`'];
        $tophatter_columns = ['`wpv`.`status`', '`wpv`.`option_prices`', '`wpv`.`option_id`'];

        $query = "SELECT " . implode(',', $jet_columns) . "," . implode(',', $tophatter_columns) . " FROM `jet_product_variants` `jpv` INNER JOIN (SELECT * FROM `tophatter_product_variants` WHERE `merchant_id`='{$merchant_id}' AND `product_id` IN ({$product_ids})) AS `wpv` ON `jpv`.`option_id`=`wpv`.`option_id`";
        $result = Data::sqlRecords($query, 'all', 'select');

        return $result;
    }

    /**
     * Get all variant products info
     *
     * @param $product_ids (comma seperated product ids)
     * @return []
     */
    public static function getVariantsProduct($product_ids)
    {
        $merchant_id = Yii::$app->user->identity->id;

        $jet_columns = ['`jpv`.`option_title`', '`jpv`.`option_sku`', '`jpv`.`option_image`', '`jpv`.`option_price`'];
        $tophatter_columns = ['`wpv`.`status`', '`wpv`.`option_prices`', '`wpv`.`option_id`'];
        $query = "SELECT " . implode(',', $jet_columns) . "," . implode(',', $tophatter_columns) . ",`wpr`.* FROM `jet_product_variants` `jpv` INNER JOIN (SELECT * FROM `tophatter_product_variants` WHERE `merchant_id`='{$merchant_id}' AND `option_id` ='{$product_ids}') AS `wpv` ON `jpv`.`option_id`=`wpv`.`option_id` RIGHT JOIN (SELECT * FROM `tophatter_product_repricing` WHERE `merchant_id`='{$merchant_id}' AND `option_id` ='{$product_ids}') AS `wpr` ON `wpr`.`option_id`=`wpv`.`option_id`";
        $result = Data::sqlRecords($query,'all','select');


        return $result;
    }

    /**
     * Bulk Update Price On tophatter via Csv
     * @param [] $products
     * @return bool
     */
    public  function updateSinglePrice($product = null)
    {
        $timeStamp = (string)time();
        /*$priceArray = [
            'PriceFeed' => [
                '_attribute' => [
                    'xmlns:gmp' => "http://tophatter.com/",
                ],
                '_value' => [
                    0 => [
                        'PriceHeader' => [
                            'version' => '1.5',
                        ],
                    ],
                ]
            ]
        ];*/

        $isPriceFeed = 1;

        if (!is_null($product)) {
            //foreach ($products as $product) {
            $price = $product['price'];

            //$priceArray['PriceFeed']['_value'][$isPriceFeed] = [
            $priceArray = [
                'Price' => [
                    'itemIdentifier' => [
                        'sku' => $product['sku']
                    ],
                    'pricingList' => [
                        'pricing' => [
                            'currentPrice' => [
                                'value' => [
                                    '_attribute' => [
                                        'currency' => $product['currency'],
                                        'amount' => $price
                                    ],
                                    '_value' => [

                                    ]
                                ]
                            ],
                            'currentPriceType' => 'BASE',
                            'comparisonPrice' => [
                                'value' => [
                                    '_attribute' => [
                                        'currency' => $product['currency'],
                                        'amount' => $price
                                    ],
                                    '_value' => [

                                    ]
                                ]
                            ],
                        ]
                    ]
                ]
            ];

            $isPriceFeed++;
            //}
        }

        if ($isPriceFeed > 1) {
            $customGenerator = new Generator();
            $customGenerator->arrayToXml($priceArray);

            $str = preg_replace('/(\<\?xml\ version\=\"1\.0\"\?\>)/', '<?xml version="1.0" encoding="UTF-8"?>',
                $customGenerator->__toString());
            $params['data'] = $str;

            //var_dump($str);die("xml file");
            $response = $this->putRequest(self::PUT_PRICE_SUB_URL, $params);

            $responseArray = self::xmlToArray($response);
            if (isset($responseArray['FeedAcknowledgement'])) {
                $result = $this->getFeeds($responseArray['FeedAcknowledgement']['feedId']);
                if (isset($results['results'][0], $results['results'][0]['itemsSucceeded']) && $results['results'][0]['itemsSucceeded'] == 1) {
                    return ['feedId' => $responseArray['FeedAcknowledgement']['feedId']];
                }
            } elseif (isset($responseArray['errors'])) {
                return ['errors' => $responseArray['errors']];
            } else {
                return $responseArray;
            }
        } else {
            return ['errors' => "No products found for price update."];
        }
    }

    public  function uploadFeedOnTophatter($feed_file)
    {
        if (file_exists($feed_file)) {

            $response = $this->postRequest(self::GET_FEEDS_ITEMS_SUB_URL, ['file' => $feed_file]);
            $response = str_replace('ns2:', "", $response);

            $responseArray = [];
            $responseArray = self::xmlToArray($response);

            if (isset($responseArray['FeedAcknowledgement'])) {
                echo "<div style='background-color: #dff0d8; color: #3c763d;'>Feed Uploaded Successfully.</div>";
                print_r($responseArray);
                die;
            } elseif ($responseArray['errors']) {
                echo "<div style='background-color: #f2dede; color: #a94442;'>Error from Tophatter.</div>";
                print_r($responseArray);
                die;
            }
        } else {
            echo "<div style='background-color: #f2dede; color: #a94442;'>File Not found.</div>";
        }
    }

    public static function uploadAllProductsOnTophatter($ids, $merchant_id)
    {
        if (count($ids) > 0) {
            $productsToBeUploadedInSingleFeed = 5000;

            $dir = Yii::getAlias('@webroot') . self::ALL_PRODUCT_UPLOAD_FILEPATH;
            $filePath = $dir . $merchant_id . '.php';

            $connection = Yii::$app->getDb();

            $error = [];
            $returnArr = [];
            $uploadProductIds = [];

            if (file_exists($filePath)) {
                $storedData = require $filePath;

                $productToUpload = $storedData;

                $count = count($productToUpload['MPItemFeed']['_value']);
                $successXmlCreate = $count - 1;

                end($productToUpload['MPItemFeed']['_value']);
                $key = key($productToUpload['MPItemFeed']['_value']) + 1;
            } else {
                $timeStamp = (string)time();
                $productToUpload = [
                    'MPItemFeed' => [
                        '_attribute' => [
                            'xmlns' => 'http://tophatter.com/',
                            'xmlns:xsi' => 'http://www.w3.org/2001/XMLSchema-instance',
                            'xsi:schemaLocation' => 'http://tophatter.com/ MPItem.xsd',
                        ],
                        '_value' => [
                            0 => [
                                'MPItemFeedHeader' => [
                                    'version' => '2.1',
                                    'requestId' => $timeStamp,
                                    'requestBatchId' => $timeStamp,
                                ],
                            ]

                        ],
                    ]
                ];

                $successXmlCreate = 0;
                $key = 1;
            }

            foreach ($ids as $id) {
                //$not_uploaded_status = tophatterProductModel::PRODUCT_STATUS_NOT_UPLOADED;
                $query = "SELECT product_id,variant_id,title,sku,type,wal.product_type,wal.status,description,image,qty,price,weight,vendor,upc,tophatter_attributes,category,tax_code,short_description,self_description,common_attributes,attr_ids,sku_override,product_id_override,`wal`.`tophatter_optional_attributes`,`wal`.`shipping_exceptions` FROM (SELECT * FROM `tophatter_product` WHERE `merchant_id`=" . $merchant_id . ") as wal INNER JOIN (SELECT * FROM `jet_product` WHERE `merchant_id`='" . $merchant_id . "') as `jet` ON jet.id=wal.product_id WHERE wal.product_id='" . $id['product_id'] . "' LIMIT 1";
                $productArray = Data::sqlRecords($query, "one", "select");

                if ($productArray) {
                    $validateResponse = self::validateProduct($productArray, $connection);

                    if (isset($validateResponse['error'])) {
                        $error[$productArray['sku']] = $validateResponse['error'];
                        continue;
                    } else {
                        $catCollection = TophatterCategory::getTophatterCategory($productArray['category']);
                        if (!$catCollection) {
                            $error[$productArray['sku']] = "Invalid Category Selected for Product having sku :'" . $productArray['sku'] . "'";
                            continue;
                        }

                        $image = trim($productArray['image']);
                        $imageArr = explode(',', $image);

                        $variantGroupId = (string)time();

                        $description = $productArray['description'];

                        $originalmessage = '';

                        //remove <![CDATA[ ]]> from description
                        $description = str_replace('<![CDATA[', '', $description);
                        $description = str_replace(']]>', '', $description);

                        //trim product description more than 4000 characters
                        if (strlen($description) > 3500) {
                            $description = Data::trimString($description, 3500);
                        }

                        $short_description = $description;
                        if (strlen($description) > 800) {
                            $short_description = Data::trimString($description, 800);
                        }

                        $tax_code = trim(Data::GetTaxCode($productArray, MERCHANT_ID));

                        if ($productArray['type'] == "simple") {
                            //update custom price on tophatter
                            /*$updatePrice = Data::getCustomPrice($productArray['price'],$merchant_id);
                            if($updatePrice)
                                $productArray['price'] = $updatePrice;*/
                            $productArray['price'] = TophatterRepricing::getProductPrice($productArray['price'], $productArray['type'], $productArray['product_id'], $merchant_id);

                            $requiredCategoryAttributes = AttributeMap::getTophatterCategoryAttributes($productArray['category']);

                            $tophatter_attributes = '[]';
                            if ($productArray['tophatter_attributes'] != '') {
                                $tophatter_attributes = $productArray['tophatter_attributes'];
                            }

                            //else 
                            //{
                            $simpleProductOptions = json_decode($productArray['attr_ids'], true) ?: [];
                            if ($productArray['category'] != '') {
                                //if ($requiredCategoryAttributes) {
                                $commonAttrVals = [];
                                $attrMapValues = AttributeMap::getAttributeMapValues($productArray['product_type']);
                                foreach ($attrMapValues as $walAttrCode => $walAttrValue) {
                                    if ($walAttrValue['type'] == TophatterAttributeMap::VALUE_TYPE_SHOPIFY) {
                                        if (isset($simpleProductOptions[$walAttrValue['value']])) {
                                            $commonAttrVals[$walAttrCode] = $simpleProductOptions[$walAttrValue['value']];
                                        }
                                    } elseif ($walAttrValue['type'] == TophatterAttributeMap::VALUE_TYPE_TEXT ||
                                        $walAttrValue['type'] == TophatterAttributeMap::VALUE_TYPE_TOPHATTER
                                    ) {
                                        $commonAttrVals[$walAttrCode] = $walAttrValue['value'];
                                    }
                                }

                                $commonAttrVals = array_merge(
                                    json_decode($productArray['common_attributes'], true) ?: [],
                                    $commonAttrVals
                                );
                                $productArray['common_attributes'] = json_encode($commonAttrVals);

                                //}
                            }
                            //}

                            if (isset($error[$productArray['sku']]) && count($error[$productArray['sku']]) > 0)
                                continue;

                            $tophatter_optional_attributes = [];
                            if (!is_null($productArray['tophatter_optional_attributes'])) {
                                $tophatter_optional_attributes = json_decode($productArray['tophatter_optional_attributes'], true);
                            }


                            $Catdata = [];
                            //Check if Required Attributes are available in the Uploading Category
                            if ($requiredCategoryAttributes && count($requiredCategoryAttributes['attributes'])) {
                                $brand = Data::getBrand($productArray['vendor']);
                                $Catdata = self::getCategoryArray($productArray['sku'], null, $productArray['category'], $tophatter_attributes, null, $brand, $productArray['type'], $connection, $productArray['common_attributes'], $variantGroupId, $tophatter_optional_attributes);
                                if (count($requiredCategoryAttributes['required_attrs']) && (!is_array($Catdata) || (is_array($Catdata) && (!isset($Catdata['category_id']) || !isset($Catdata['attributes']))))) {
                                    $error[$productArray['sku']] = "Please Fill the Required Attributes for Product having sku :'" . $productArray['sku'] . "'";
                                    continue;
                                }
                            }

                            $type = Jetproductinfo::checkUpcType($productArray['upc']);

                            $uploadType = 'MPItem';
                            if (isset($validateResponse['success'][$productArray['sku']]) && $validateResponse['success'][$productArray['sku']] == "") {
                                if (!$productArray['sku_override'] && !$productArray['product_id_override'])
                                    $uploadType = 'MPItemUpdate';
                            }


                            if (!is_array($Catdata) || (is_array($Catdata) && !count($Catdata))) {
                                $brand = Data::getBrand($productArray['vendor']);
                                if (!is_null($catCollection['parent_id']) && $catCollection['parent_id'] != '0') {
                                    $Catdata['category_id'] = $catCollection['parent_id'];

                                    $allCatAttrs = Data::getCombinedAttributes($productArray['category'], $catCollection['parent_id']);
                                    if (array_key_exists('brand', $allCatAttrs)) {
                                        $Catdata['attributes'] = ['brand' => $brand, $productArray['category'] => []];
                                    } else {
                                        $Catdata['attributes'] = [$productArray['category'] => []];
                                    }
                                } else {
                                    $allCatAttrs = Data::getCombinedAttributes($productArray['category']);

                                    $Catdata['category_id'] = $productArray['category'];
                                    if (array_key_exists('brand', $allCatAttrs)) {
                                        $Catdata['attributes'] = ['brand' => $brand];
                                    } else {
                                        $Catdata['attributes'] = [];
                                    }
                                }
                            }

                            // tophatter product title
                            $title = Data::getTophatterTitle($productArray['product_id'], $merchant_id);

                            if (isset($title['product_title']) && !empty($title)) {
                                $productArray['title'] = $title['product_title'];
                            }

                            //tophatter product price
                            $price = Data::getTophatterPrice($productArray['product_id'], $merchant_id);

                            if (isset($price['product_price']) && !empty($price)) {
                                $productArray['price'] = $price['product_price'];
                                $custom_price = Data::getCustomPrice($productArray['price'], $merchant_id);
                                if (isset($custom_price) && !empty($custom_price)) {
                                    $productArray['price'] = $custom_price;
                                }

                            }

                            $product = [
                                'sku' => $productArray['sku'],
                                'name' => Data::getName($productArray['title']),
                                'product_id' => $productArray['product_id'],
                                'variant_id' => $productArray['variant_id'],
                                'description' => $description,
                                'shelfDescription' => $productArray['title'],
                                'shortDescription' => $short_description,
                                'identifier_type' => $type,
                                'upc' => $productArray['upc'],
                                'price' => (string)$productArray['price'],
                                'weight' => (string)$productArray['weight'],
                                'category' => $productArray['category'],
                                'sku_override' => $productArray['sku_override'],
                                'id_override' => $productArray['product_id_override'],
                                'shipping_exceptions' => $productArray['shipping_exceptions'],
                            ];

                            $productData = self::prepareProductData($merchant_id, $product, $imageArr, $tax_code, $Catdata, $requiredCategoryAttributes);

                            if (isset($productData['success'])) {
                                $productToUpload['MPItemFeed']['_value'][$key][$uploadType] = $productData['data'];
                                $successXmlCreate++;
                                if (!in_array($id['product_id'], $uploadProductIds)) {
                                    $uploadProductIds[] = $id['product_id'];
                                }

                                if ($successXmlCreate == $productsToBeUploadedInSingleFeed) {
                                    self::submitAllItemFeed($productToUpload, $filePath);
                                    if (isset($feedResponse['feedId'])) {
                                        $returnArr['feedId'] = $feedResponse['feedId'];
                                        $returnArr['feed_file'] = $feedResponse['feed_file'];

                                        $key = 1;
                                        $successXmlCreate = 0;

                                        if (!self::canSendItemFeed($merchant_id)) {
                                            $check_point = $id['id'];
                                            self::saveLastCheckPoint($merchant_id, $check_point);

                                            return ['threshold_error' => "Threshold Limit Exceeded. Please try again after 1 Hour."];
                                            break;
                                        }
                                    } elseif (isset($feedResponse['feedError'])) {
                                        $error['feedError'] = $feedResponse['feedError'];
                                    }
                                }

                            } elseif (isset($productData['error'])) {
                                $error[$productArray['sku']] = $productData['message'];
                                $originalmessage = isset($productData['originalmessage']) ? $productData['originalmessage'] : '';
                            }

                            $key += 1;
                        } else {
                            $productVarArray = [];
                            $duplicateSkus = [];
                            $requiredCategoryAttributes = AttributeMap::getTophatterCategoryAttributes($productArray['category']);

                            //$query = 'SELECT jet.option_id,option_title,option_sku,wal.tophatter_option_attributes,option_image,option_qty,option_price,option_weight,option_unique_id,`wal`.`tophatter_optional_attributes` FROM `tophatter_product_variants` wal INNER JOIN `jet_product_variants` jet ON jet.option_id=wal.option_id WHERE wal.product_id="' . $id . '"';
                            $query = "SELECT jet.option_id,option_title,option_sku,wal.tophatter_option_attributes,option_image,option_qty,option_price ,option_weight,option_unique_id,`wal`.`tophatter_optional_attributes` FROM (SELECT * FROM `tophatter_product_variants` WHERE `merchant_id`='" . $merchant_id . "') as wal INNER JOIN (SELECT * FROM `jet_product_variants` WHERE `merchant_id`='" . $merchant_id . "') as jet ON jet.option_id=wal.option_id WHERE wal.product_id='" . $id['product_id'] . "'";

                            $productVarArray = Data::sqlRecords($query, "all", "select");

                            if ($productVarArray) {
                                foreach ($productVarArray as $value) {
                                    //update custom price on tophatter
                                    /*$updatePrice = Data::getCustomPrice($value['option_price'],$merchant_id);
                                    if($updatePrice)
                                        $value['option_price']=$updatePrice;*/
                                    $value['option_price'] = TophatterRepricing::getProductPrice($value['option_price'], $productArray['type'], $value['option_id'], $merchant_id);

                                    if (in_array($value['option_sku'], $duplicateSkus)) {
                                        $error[$productArray['sku']] = "Sku : '" . $value['option_sku'] . "' is duplicate.";
                                        continue;
                                    } else
                                        $duplicateSkus[] = $value['option_sku'];

                                    if (strlen($value['option_sku']) > Data::MAX_LENGTH_SKU) {
                                        $error[$productArray['sku']] = "Child SKU : " . $value['option_sku'] . " must be fewer than 50 characters.";
                                        continue;
                                    }

                                    $tophatter_optional_attributes = [];
                                    if (!is_null($value['tophatter_optional_attributes'])) {
                                        $tophatter_optional_attributes = json_decode($value['tophatter_optional_attributes'], true);
                                    }

                                    $Catdata = [];
                                    $isParent = 0;
                                    if ($value['option_sku'] == $productArray['sku'])
                                        $isParent = 1;

                                    $mappedData = [];
                                    if ($productArray['tophatter_attributes'] == '') {
                                        $mappedData = AttributeMap::getMappedTophatterAttributes($productArray['product_type'], $value['option_id']);
                                        $productArray['tophatter_attributes'] = $mappedData['mapped_attributes'];
                                    }
                                    if ($value['tophatter_option_attributes'] == '') {
                                        if (!count($mappedData))
                                            $mappedData = AttributeMap::getMappedTophatterAttributes($productArray['product_type'], $value['option_id']);

                                        $value['tophatter_option_attributes'] = $mappedData['attribute_values'];
                                    }
                                    if ($productArray['common_attributes'] == '') {
                                        if (!count($mappedData))
                                            $mappedData = AttributeMap::getMappedTophatterAttributes($productArray['product_type'], $value['option_id']);

                                        $productArray['common_attributes'] = $mappedData['common_attributes'];
                                    }

                                    $Catdata = [];
                                    if ($requiredCategoryAttributes && count($requiredCategoryAttributes['attributes'])) {
                                        $brand = Data::getBrand($productArray['vendor']);
                                        $Catdata = self::getCategoryArray($productArray['sku'], $isParent, $productArray['category'], $productArray['tophatter_attributes'], $value['tophatter_option_attributes'], $brand, $productArray['type'], $connection, $productArray['common_attributes'], $variantGroupId, $tophatter_optional_attributes);
                                        if (count($requiredCategoryAttributes['required_attrs']) && (!is_array($Catdata) || (is_array($Catdata) && (!isset($Catdata['category_id']) || !isset($Catdata['attributes']))))) {
                                            $error[$productArray['sku']] = "Please Fill the Required Attributes for Product having sku :'" . $productArray['sku'] . "'";
                                            continue;
                                        }
                                    }

                                    $type = Jetproductinfo::checkUpcType($value['option_unique_id']);

                                    $uploadType = 'MPItem';
                                    if (isset($validateResponse['success'][$value['option_sku']]) && $validateResponse['success'][$value['option_sku']] == "") {
                                        if (!$productArray['sku_override'] && !$productArray['product_id_override'])
                                            $uploadType = 'MPItemUpdate';
                                    }

                                    if (!is_array($Catdata) || (is_array($Catdata) && !count($Catdata))) {
                                        $brand = Data::getBrand($productArray['vendor']);
                                        if (!is_null($catCollection['parent_id']) && $catCollection['parent_id'] != '0') {
                                            $Catdata['category_id'] = $catCollection['parent_id'];

                                            $allCatAttrs = Data::getCombinedAttributes($productArray['category'], $catCollection['parent_id']);
                                            if (array_key_exists('brand', $allCatAttrs)) {
                                                $Catdata['attributes'] = ['brand' => $brand, $productArray['category'] => []];
                                            } else {
                                                $Catdata['attributes'] = [$productArray['category'] => []];
                                            }
                                        } else {
                                            $Catdata['category_id'] = $productArray['category'];

                                            $allCatAttrs = Data::getCombinedAttributes($productArray['category']);
                                            if (array_key_exists('brand', $allCatAttrs)) {
                                                $Catdata['attributes'] = ['brand' => $brand];
                                            } else {
                                                $Catdata['attributes'] = [];
                                            }
                                        }
                                    }


                                    // tophatter variant product title
                                    $title = Data::getTophatterTitle($productArray['product_id'], $merchant_id);

                                    if (isset($title['product_title']) && !empty($title)) {
                                        $productArray['title'] = $title['product_title'];
                                    }

                                    //tophatter product price
                                    $price = Data::getTophatterPrice($value['option_id'], $merchant_id);

                                    if (isset($price['option_prices']) && !empty($price)) {
                                        $value['option_price'] = $price['option_prices'];
                                        $custom_price = Data::getCustomPrice($value['option_price'], $merchant_id);
                                        if (isset($custom_price) && !empty($custom_price)) {
                                            $value['option_price'] = $custom_price;
                                        }
                                    }

                                    $product = [
                                        'sku' => $value['option_sku'],
                                        //'name' => Data::getName($productArray['title'] . '~' . $value['option_title']),
                                        'name' => Data::getName($productArray['title']),
                                        'product_id' => $productArray['product_id'],
                                        'variant_id' => $value['option_id'],
                                        'description' => $description,
                                        'shelfDescription' => $productArray['title'],
                                        'shortDescription' => $short_description,
                                        'identifier_type' => $type,
                                        'upc' => (string)$value['option_unique_id'],
                                        'price' => (string)$value['option_price'],
                                        'weight' => (string)$value['option_weight'],
                                        'category' => $productArray['category'],
                                        'sku_override' => $productArray['sku_override'],
                                        'id_override' => $productArray['product_id_override'],
                                        'shipping_exceptions' => $productArray['shipping_exceptions'],
                                    ];

                                    //variant name should be same as parent for this client
                                    if ($merchant_id == '678') {
                                        $product['name'] = Data::getName($productArray['title']);
                                    }

                                    $productData = self::prepareProductData($merchant_id, $product, $imageArr, $tax_code, $Catdata, $requiredCategoryAttributes);
                                    //print_r($productData);die;

                                    if (isset($productData['success'])) {
                                        $productToUpload['MPItemFeed']['_value'][$key][$uploadType] = $productData['data'];
                                        $successXmlCreate++;
                                        if (!in_array($id['product_id'], $uploadProductIds)) {
                                            $uploadProductIds[] = $id['product_id'];
                                        }

                                        if ($successXmlCreate == $productsToBeUploadedInSingleFeed) {
                                            $feedResponse = self::submitAllItemFeed($productToUpload, $filePath);
                                            if (isset($feedResponse['feedId'])) {
                                                $returnArr['feedId'] = $feedResponse['feedId'];
                                                $returnArr['feed_file'] = $feedResponse['feed_file'];

                                                $key = 1;
                                                $successXmlCreate = 0;

                                                if (!self::canSendItemFeed($merchant_id)) {
                                                    $check_point = $id['id'];
                                                    self::saveLastCheckPoint($merchant_id, $check_point);

                                                    return ['threshold_error' => "Threshold Limit Exceeded. Please try again after 1 Hour."];
                                                    break;
                                                }
                                            } elseif (isset($feedResponse['feedError'])) {
                                                $error['feedError'] = $feedResponse['feedError'];
                                            }
                                        }

                                        //set status to 'Item Processing'
                                        Jetproductinfo::chnageUploadingProductStatus($value['option_id']);
                                    } elseif (isset($productData['error'])) {
                                        $error[$productArray['sku']] = $productData['message'];
                                        $originalmessage = isset($productData['originalmessage']) ? $productData['originalmessage'] : '';
                                    }

                                    $key += 1;
                                }
                            }
                        }
                    }
                } else {
                    $error[$id['product_id']] = "Product Id : " . $id['product_id'] . " is already uploaded.";
                    continue;
                }
            }

            $index = intval(Yii::$app->request->post('index', false));
            $total = intval(Yii::$app->request->post('total_pages', false));

            if (($total - 1) == $index) {
                $feedResponse = self::submitAllItemFeed($productToUpload, $filePath);
                if (isset($feedResponse['feedId'])) {
                    $returnArr['feedId'] = $feedResponse['feedId'];
                    $returnArr['feed_file'] = $feedResponse['feed_file'];
                } elseif (isset($feedResponse['feedError'])) {
                    $error['feedError'] = $feedResponse['feedError'];
                }
            } elseif ($successXmlCreate) {
                self::saveFeedData($dir, $filePath, $productToUpload);
            }

            if (count($uploadProductIds)) {
                $returnArr['uploadIds'] = $uploadProductIds;
            }

            if (count($error) > 0) {
                $returnArr['errors'] = $error;
                $returnArr['originalmessage'] = '';
            }
            return $returnArr;
        }
    }

    public static function saveFeedData($dir, $filePath, $preparedData)
    {
        if (!file_exists($dir)) {
            mkdir($dir, 0775, true);
        }

        file_put_contents($filePath, '<?php return $arr = ' . var_export($preparedData, true) . ';');
    }

    public function submitAllItemFeed(&$productToUpload, $filePath)
    {
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        if (isset($productToUpload['MPItemFeed']['_value']) && count($productToUpload['MPItemFeed']['_value']) > 1) {
            print_r($productToUpload);
            die("before product upload");
            if (!file_exists(\Yii::getAlias('@webroot') . '/var/product/xml/' . MERCHANT_ID)) {
                mkdir(\Yii::getAlias('@webroot') . '/var/product/xml/' . MERCHANT_ID, 0775, true);
            }
            $file = Yii::getAlias('@webroot') . '/var/product/xml/' . MERCHANT_ID . '/MPProduct-' . time() . '.xml';
            $xml = new Generator();
            $xml->arrayToXml($productToUpload)->save($file);
            self::unEscapeData($file);

            $response = $this->postRequest(self::GET_FEEDS_ITEMS_SUB_URL, ['file' => $file]);
            $response = str_replace('ns2:', "", $response);

            $responseArray = [];
            $responseArray = self::xmlToArray($response);

            if (isset($responseArray['FeedAcknowledgement'])) {
                $timeStamp = (string)time();
                $productToUpload = [
                    'MPItemFeed' => [
                        '_attribute' => [
                            'xmlns' => 'http://tophatter.com/',
                            'xmlns:xsi' => 'http://www.w3.org/2001/XMLSchema-instance',
                            'xsi:schemaLocation' => 'http://tophatter.com/ MPItem.xsd',
                        ],
                        '_value' => [
                            0 => [
                                'MPItemFeedHeader' => [
                                    'version' => '2.1',
                                    'requestId' => $timeStamp,
                                    'requestBatchId' => $timeStamp,
                                ],
                            ]

                        ],
                    ]
                ];

                $feedId = isset($responseArray['FeedAcknowledgement']['feedId']) ? $responseArray['FeedAcknowledgement']['feedId'] : '';
                return ['feedId' => $feedId, 'feed_file' => $file];
            } elseif ($responseArray['errors']) {
                return ['feedError' => $responseArray['errors']];
            }
        }
    }

    public static function canSendItemFeed($merchant_id)
    {
        $query = "SELECT count(*) as `feed_count` FROM `tophatter_product_feed` WHERE `created_at`>= DATE_SUB(NOW(),INTERVAL 1 HOUR) AND `merchant_id`={$merchant_id} LIMIT 0,1";
        $result = Data::sqlRecords($query, 'one');

        if (isset($result['feed_count']) && intval($result['feed_count']) < 10) {
            return true;
        } else {
            return false;
        }
    }

    public static function saveLastCheckPoint($merchant_id, $last_send_index)
    {
        $feed_type = self::FEED_TYPE_ITEM;

        $query = "INSERT INTO `tophatter_feed_stats` (`merchant_id`, `feed_type`, `last_send_index`) VALUES ({$merchant_id}, '{$feed_type}', '{$last_send_index}')";

        Data::sqlRecords($query, null, 'insert');
    }

    public static function getMPItemStructure()
    {
        $structure = [
                        'processMode' => self::NON_REQUIRED_ATTRIBUTE,
                        'feedDate' => self::NON_REQUIRED_ATTRIBUTE,
                        'sku' => self::REQUIRED_ATTRIBUTE,
                        'productIdentifiers' => self::REQUIRED_ATTRIBUTE,
                        'MPProduct' => self::REQUIRED_ATTRIBUTE,
                        'MPOffer' => self::NON_REQUIRED_ATTRIBUTE,
                    ];

        return $structure;
    }
    
    public static function getMPProductStructure()
    {
        $structure = [
                        'SkuUpdate' => self::NON_REQUIRED_ATTRIBUTE,
                        'msrp' => self::NON_REQUIRED_ATTRIBUTE,
                        'productName' => self::REQUIRED_ATTRIBUTE,
                        'additionalProductAttributes' => self::NON_REQUIRED_ATTRIBUTE,
                        'ProductIdUpdate' => self::NON_REQUIRED_ATTRIBUTE,
                        'category' => self::REQUIRED_ATTRIBUTE,
                    ];

        return $structure;
    }

    public static function getMPOfferStructure()
    {
        $structure = [
                        'price' => self::REQUIRED_ATTRIBUTE,
                        'MinimumAdvertisedPrice' => self::NON_REQUIRED_ATTRIBUTE,
                        'StartDate' => self::NON_REQUIRED_ATTRIBUTE,
                        'EndDate' => self::NON_REQUIRED_ATTRIBUTE,
                        'MustShipAlone' => self::NON_REQUIRED_ATTRIBUTE,
                        'ShippingWeight' => self::REQUIRED_ATTRIBUTE,
                        'ProductTaxCode' => self::REQUIRED_ATTRIBUTE,
                        'shipsInOriginalPackaging' => self::NON_REQUIRED_ATTRIBUTE,
                        'additionalOfferAttributes' => self::NON_REQUIRED_ATTRIBUTE,
                        'ShippingOverrides' => self::NON_REQUIRED_ATTRIBUTE,
                    ];

        return $structure;
    }

     /**
     * get the value of product identifiers for payload
     * @param [] $identifiers 
     *           For Example : $identifiers = [['identifier_type'=>'XXXX', 'identifier_value'=>'XXXX'], [], ...]
     *
     * @return array
     */
    public static function getProductIdentifiersValue($identifiers)
    {
        $productIdentifiers = [];
        $formattedIdentifiers = [];
        $allowedIdentifiers = ["UPC", "GTIN", "ISBN", "EAN"];

        if(count($identifiers))
        {
            foreach ($identifiers as $identifier) {
                if(in_array($type=$identifier['identifier_type'], $allowedIdentifiers)) {
                    $value = $identifier['identifier_value'];
                    $formattedIdentifiers[] = [
                                            'productIdentifier' => ['productIdType'=>$type, 'productId'=>$value]
                                          ];
                }
            }

            if(count($formattedIdentifiers))
            {
                $productIdentifiers['_attribute'] = [];
                $productIdentifiers['_value'] = $formattedIdentifiers;
            }
        }

        return $productIdentifiers;
    }

    public static function validateStructure(&$structure)
    {
        foreach ($structure as $attr_key => $attr_value) 
        {
            if($attr_value == self::REQUIRED_ATTRIBUTE) {
                return ['status' => false, 'error' => $attr_key." is Required."];
                break;
            } elseif($attr_value == self::NON_REQUIRED_ATTRIBUTE) {
                unset($structure[$attr_key]);
            }
        }
        return ['status' => true];
    }

    
}