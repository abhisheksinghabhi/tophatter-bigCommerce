<?php 
namespace frontend\modules\tophatter\components\Dashboard;

use Yii;
use yii\base\Component;
use frontend\modules\tophatter\components\Data;
use frontend\modules\tophatter\models\TophatterProduct;


class Productinfo extends Component
{
    public static $_totalProducts = null;
    public static $_publishedProducts = null;
    public static $_unpublishedProducts = null;
    public static $_stageProducts = null;
    public static $_notUploadedProducts = null;
    public static $_processingProducts = null;

    /**
     * get Total Products Count
     * @param string $merchant_id
     * @return int
     */
    public static function getTotalProducts($merchant_id)
    {
        if (is_null(self::$_totalProducts)) {
            self::$_totalProducts = 0;

            if (is_numeric($merchant_id)) {
                /*$query = "SELECT COUNT(*) as `count` FROM `tophatter_product` LEFT JOIN `tophatter_product_variants` ON `tophatter_product`.`product_id`=`tophatter_product_variants`.`product_id` WHERE `tophatter_product`.`merchant_id`=".$merchant_id." LIMIT 0,1";*/

                /*$query = "select count(*) as `count` from (SELECT * from `tophatter_product` where `merchant_id`=".$merchant_id." AND `tophatter_product`.`category` != '' ) as `walproduct` LEFT JOIN (select * from `tophatter_product_variants` where `merchant_id`=".$merchant_id." ) as `walvariantprod` ON `walproduct`.`product_id` = `walvariantprod`.`product_id` LIMIT 0,1";*/

                $query = "SELECT count(*) as `count` FROM ((SELECT `variant_id` FROM `tophatter_product` INNER JOIN `jet_product` ON `tophatter_product`.`product_id`=`jet_product`.`bigproduct_id` WHERE `tophatter_product`.`merchant_id`=" . $merchant_id ." AND `jet_product`.`merchant_id`=" . $merchant_id ." AND `jet_product`.`type`='simple' AND `tophatter_product`.`category` != '') UNION (SELECT `tophatter_product_variants`.`option_id` AS `variant_id` FROM `tophatter_product_variants` INNER JOIN `tophatter_product` ON `tophatter_product_variants`.`product_id` = `tophatter_product`.`product_id` INNER JOIN `jet_product_variants` ON `tophatter_product_variants`.`option_id`=`jet_product_variants`.`option_id` WHERE `tophatter_product_variants`.`merchant_id`=" . $merchant_id . " AND `tophatter_product`.`category` != '')) as `merged_data`";

                $result = Data::sqlRecords($query, 'one');
                if (isset($result['count']) && $result['count']) {
                    self::$_totalProducts = $result['count'];
                }
            }
        }
        return self::$_totalProducts;
    }

    /**
     * get Published Products Count
     * @param string $merchant_id
     * @return int
     */
    public static function getPublishedProducts($merchant_id)
    {
         if (is_null(self::$_publishedProducts)) {
            self::$_publishedProducts = 0;

            if (is_numeric($merchant_id)) {
                /*$query = "SELECT COUNT(*) as `count` FROM `tophatter_product` LEFT JOIN `tophatter_product_variants` ON `tophatter_product`.`product_id`=`tophatter_product_variants`.`product_id` WHERE `tophatter_product`.`merchant_id`=".$merchant_id." AND `tophatter_product`.`status`='".tophatterProduct::PRODUCT_STATUS_UPLOADED."' AND `tophatter_product_variants`.`status`='".tophatterProduct::PRODUCT_STATUS_UPLOADED."'"." LIMIT 0,1";
            */

                /* $query = "SELECT COUNT(*) as `count` FROM `tophatter_product` LEFT JOIN `tophatter_product_variants` ON `tophatter_product`.`product_id`=`tophatter_product_variants`.`product_id` INNER JOIN `jet_product` ON `jet_product`.`id` = `tophatter_product`.`product_id` WHERE `tophatter_product`.`merchant_id`=".$merchant_id." AND ((`tophatter_product`.`status`='".tophatterProduct::PRODUCT_STATUS_UPLOADED."' AND `jet_product`.`type` = 'simple') OR ( `jet_product`.`type` = 'variants' AND `tophatter_product_variants`.`status`='".tophatterProduct::PRODUCT_STATUS_UPLOADED."'))";*/

                $query = "SELECT count(*) as `count` FROM ((SELECT `variant_id` FROM `tophatter_product` INNER JOIN `jet_product` ON `tophatter_product`.`product_id`=`jet_product`.`bigproduct_id` WHERE `tophatter_product`.`merchant_id`=" . $merchant_id . " AND `jet_product`.`merchant_id`=".$merchant_id." AND `tophatter_product`.`status`='" . TophatterProduct::PRODUCT_STATUS_UPLOADED . "' AND `jet_product`.`type`='simple' AND `tophatter_product`.`category` != '') UNION (SELECT `tophatter_product_variants`.`option_id` AS `variant_id` FROM `tophatter_product_variants` INNER JOIN `tophatter_product` ON `tophatter_product_variants`.`product_id` = `tophatter_product`.`product_id` INNER JOIN `jet_product_variants` ON `tophatter_product_variants`.`option_id`=`jet_product_variants`.`option_id` WHERE `tophatter_product_variants`.`merchant_id`=" . $merchant_id . " AND `tophatter_product_variants`.`status`='" . TophatterProduct::PRODUCT_STATUS_UPLOADED . "' AND `tophatter_product`.`category` != '')) as `merged_data`";

                $result = Data::sqlRecords($query, 'one');

                if (isset($result['count']) && $result['count']) {
                    self::$_publishedProducts = $result['count'];
                }
            }
        }
        return self::$_publishedProducts;
    }

    /**
     * get Unpublished Products Count
     * @param string $merchant_id
     * @return int
     */
    public static function getUnpublishedProducts($merchant_id)
    {
       if (is_null(self::$_unpublishedProducts)) {
            self::$_unpublishedProducts = 0;

            if (is_numeric($merchant_id)) {
                $query = "SELECT count(*) as `count` FROM ((SELECT `variant_id` FROM `tophatter_product` INNER JOIN `jet_product` ON `tophatter_product`.`product_id`=`jet_product`.`bigproduct_id` WHERE `tophatter_product`.`merchant_id`=" . $merchant_id . " AND `jet_product`.`merchant_id`=".$merchant_id." AND `tophatter_product`.`status`='" . TophatterProduct::PRODUCT_STATUS_UNPUBLISHED . "' AND `jet_product`.`type`='simple' AND `tophatter_product`.`category` != '') UNION (SELECT `tophatter_product_variants`.`option_id` AS `variant_id` FROM `tophatter_product_variants` INNER JOIN `tophatter_product` ON `tophatter_product_variants`.`product_id` = `tophatter_product`.`product_id` INNER JOIN `jet_product_variants` ON `tophatter_product_variants`.`option_id`=`jet_product_variants`.`option_id` WHERE `tophatter_product_variants`.`merchant_id`=" . $merchant_id . " AND `tophatter_product_variants`.`status`='" . TophatterProduct::PRODUCT_STATUS_UNPUBLISHED . "' AND `tophatter_product`.`category` != '')) as `merged_data`";

                /*$query = "SELECT COUNT(*) as `count` FROM `tophatter_product` LEFT JOIN `tophatter_product_variants` ON `tophatter_product`.`product_id`=`tophatter_product_variants`.`product_id` INNER JOIN `jet_product` ON `jet_product`.`id` = `tophatter_product`.`product_id` WHERE `tophatter_product`.`merchant_id`=".$merchant_id." AND ((`tophatter_product`.`status`='".tophatterProduct::PRODUCT_STATUS_UNPUBLISHED."' AND `jet_product`.`type` = 'simple') OR ( `jet_product`.`type` = 'variants' AND `tophatter_product_variants`.`status`='".tophatterProduct::PRODUCT_STATUS_UNPUBLISHED."'))";*/
                $result = Data::sqlRecords($query, 'one');

                if (isset($result['count']) && $result['count']) {
                    self::$_unpublishedProducts = $result['count'];
                }
            }
        }
        return self::$_unpublishedProducts;
    }

    /**
     * get Staged Products Count
     * @param string $merchant_id
     * @return int
     */
    public static function getStagedProducts($merchant_id)
    {
         if (is_null(self::$_stageProducts)) {
            self::$_stageProducts = 0;

            if (is_numeric($merchant_id)) {
                $query = "SELECT count(*) as `count` FROM ((SELECT `variant_id` FROM `tophatter_product` INNER JOIN `jet_product` ON `tophatter_product`.`product_id`=`jet_product`.`bigproduct_id` WHERE `tophatter_product`.`merchant_id`=" . $merchant_id . " AND `jet_product`.`merchant_id`=".$merchant_id." AND `tophatter_product`.`status`='" . TophatterProduct::PRODUCT_STATUS_STAGE . "' AND `jet_product`.`type`='simple' AND `tophatter_product`.`category` != '') UNION (SELECT `tophatter_product_variants`.`option_id` AS `variant_id` FROM `tophatter_product_variants` INNER JOIN `tophatter_product` ON `tophatter_product_variants`.`product_id` = `tophatter_product`.`product_id` INNER JOIN `jet_product_variants` ON `tophatter_product_variants`.`option_id`=`jet_product_variants`.`option_id` WHERE `tophatter_product_variants`.`merchant_id`=" . $merchant_id . " AND `tophatter_product_variants`.`status`='" . TophatterProduct::PRODUCT_STATUS_STAGE . "' AND `tophatter_product`.`category` != '')) as `merged_data`";

                /*$query = "SELECT COUNT(*) as `count` FROM `tophatter_product` LEFT JOIN `tophatter_product_variants` ON `tophatter_product`.`product_id`=`tophatter_product_variants`.`product_id` INNER JOIN `jet_product` ON `jet_product`.`id` = `tophatter_product`.`product_id` WHERE `tophatter_product`.`merchant_id`=".$merchant_id." AND ((`tophatter_product`.`status`='".tophatterProduct::PRODUCT_STATUS_STAGE."' AND `jet_product`.`type` = 'simple') OR ( `jet_product`.`type` = 'variants' AND `tophatter_product_variants`.`status`='".tophatterProduct::PRODUCT_STATUS_STAGE."'))";*/
                $result = Data::sqlRecords($query, 'one');

                if (isset($result['count']) && $result['count']) {
                    self::$_stageProducts = $result['count'];
                }
            }
        }
        return self::$_stageProducts;
    }

    /**
     * get Not Uploaded Products Count
     * @param string $merchant_id
     * @return int
     */
    public static function getNotUploadedProducts($merchant_id)
    {
        if (is_null(self::$_notUploadedProducts)) {
            self::$_notUploadedProducts = 0;

            if (is_numeric($merchant_id)) {
                $query = "SELECT count(*) as `count` FROM ((SELECT `variant_id` FROM `tophatter_product` INNER JOIN `jet_product` ON `tophatter_product`.`product_id`=`jet_product`.`bigproduct_id` WHERE `tophatter_product`.`merchant_id`=" . $merchant_id . " AND `jet_product`.`merchant_id`=".$merchant_id." AND `tophatter_product`.`status`='" . TophatterProduct::PRODUCT_STATUS_NOT_UPLOADED . "' AND `jet_product`.`type`='simple' AND `tophatter_product`.`category` != '') UNION (SELECT `tophatter_product_variants`.`option_id` AS `variant_id` FROM `tophatter_product_variants` INNER JOIN `tophatter_product` ON `tophatter_product_variants`.`product_id` = `tophatter_product`.`product_id` INNER JOIN `jet_product_variants` ON `tophatter_product_variants`.`option_id`=`jet_product_variants`.`option_id` WHERE `tophatter_product_variants`.`merchant_id`=" . $merchant_id . " AND `tophatter_product_variants`.`status`='" . TophatterProduct::PRODUCT_STATUS_NOT_UPLOADED . "' AND `tophatter_product`.`category` != '')) as `merged_data`";

                /*$query = "SELECT COUNT(*) as `count` FROM `tophatter_product` LEFT JOIN `tophatter_product_variants` ON `tophatter_product`.`product_id`=`tophatter_product_variants`.`product_id` INNER JOIN `jet_product` ON `jet_product`.`id` = `tophatter_product`.`product_id` WHERE `tophatter_product`.`merchant_id`=".$merchant_id." AND ((`tophatter_product`.`status`='".tophatterProduct::PRODUCT_STATUS_NOT_UPLOADED."' AND `jet_product`.`type` = 'simple') OR ( `jet_product`.`type` = 'variants' AND `tophatter_product_variants`.`status`='".tophatterProduct::PRODUCT_STATUS_NOT_UPLOADED."'))";*/
                $result = Data::sqlRecords($query, 'one');

                if (isset($result['count']) && $result['count']) {
                    self::$_notUploadedProducts = $result['count'];
                }
            }
        }
        return self::$_notUploadedProducts;
    }

    /**
     * get Processing Products Count
     * @param string $merchant_id
     * @return int
     */
    public static function getProcessingProducts($merchant_id)
    {
        if (is_null(self::$_processingProducts)) {
            self::$_processingProducts = 0;

            if (is_numeric($merchant_id)) {
                $query = "SELECT count(*) as `count` FROM ((SELECT `variant_id` FROM `tophatter_product` INNER JOIN `jet_product` ON `tophatter_product`.`product_id`=`jet_product`.`bigproduct_id` WHERE `tophatter_product`.`merchant_id`=" . $merchant_id . " AND `jet_product`.`merchant_id`=".$merchant_id." AND `tophatter_product`.`status`='" . TophatterProduct::PRODUCT_STATUS_PROCESSING . "' AND `jet_product`.`type`='simple' AND `tophatter_product`.`category` != '') UNION (SELECT `tophatter_product_variants`.`option_id` AS `variant_id` FROM `tophatter_product_variants` INNER JOIN `tophatter_product` ON `tophatter_product_variants`.`product_id` = `tophatter_product`.`product_id` INNER JOIN `jet_product_variants` ON `tophatter_product_variants`.`option_id`=`jet_product_variants`.`option_id` WHERE `tophatter_product_variants`.`merchant_id`=" . $merchant_id . " AND `tophatter_product_variants`.`status`='" . TophatterProduct::PRODUCT_STATUS_PROCESSING . "' AND `tophatter_product`.`category` != '')) as `merged_data`";

                /*$query = "SELECT COUNT(*) as `count` FROM `tophatter_product` LEFT JOIN `tophatter_product_variants` ON `tophatter_product`.`product_id`=`tophatter_product_variants`.`product_id` INNER JOIN `jet_product` ON `jet_product`.`id` = `tophatter_product`.`product_id` WHERE `tophatter_product`.`merchant_id`=".$merchant_id." AND ((`tophatter_product`.`status`='".tophatterProduct::PRODUCT_STATUS_PROCESSING."' AND `jet_product`.`type` = 'simple') OR ( `jet_product`.`type` = 'variants' AND `tophatter_product_variants`.`status`='".tophatterProduct::PRODUCT_STATUS_PROCESSING."'))";*/
                $result = Data::sqlRecords($query, 'one');

                if (isset($result['count']) && $result['count']) {
                    self::$_processingProducts = $result['count'];
                }
            }
        }
        return self::$_processingProducts;
    }

    public static function getProductsCountUpdatedToday($merchantId){
       
        if (is_numeric($merchantId)) {
            $result = [];
            $dateTimeFrom = date('Y-m-d 00:00:00');
            $dateTimeTo = date('Y-m-d 23:59:59');
            $query = "SELECT COUNT(*) as `count` FROM `jet_product` WHERE `merchant_id`=" . $merchantId . " AND `updated_at` between '" . $dateTimeFrom . "' AND '" . $dateTimeTo . "'";
            $result = Data::sqlRecords($query, 'one');
            return isset($result['count']) ? $result['count'] : 0;
        }


    }

    public static function getTempProductsCount($merchantId, $detail = false){
        if (is_numeric($merchantId) && !$detail) {
            $result = [];
            $query = "SELECT COUNT(*) as `count` FROM `jet_product_tmp` WHERE `merchant_id`=" . $merchantId;
            $result = Data::sqlRecords($query, 'one');
            return isset($result['count']) ? $result['count'] : 0;
        } elseif (is_numeric($merchantId)) {
            $result = [];
            $tmpProductIds = [];
            $query = "SELECT  `product_id` FROM `jet_product_tmp` WHERE `merchant_id`=" . $merchantId;
            $result = Data::sqlRecords($query, 'all');
            if (is_array($result) && count($result) > 0) {
                $tmpProductIds = array_column($result, 'product_id');
            }
            return is_array($tmpProductIds) ? $tmpProductIds : [];
        }
    }

    
}
?>
