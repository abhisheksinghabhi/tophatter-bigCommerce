<?php 
namespace frontend\modules\tophatter\components\Dashboard;

use Yii;
use yii\base\Component;
use frontend\components\Data;

class Setupprogress extends Component
{
    public static $_tophatterApiStatus = null;
    public static $_productImportStatus = null;
    public static $_categoryMapStatus = null;
    public static $_attributeMapStatus = null;

    /**
     * To check if tophatter APi is activated or not
     * @param string $merchant_id
     * @return bool
     */
    public static function getTophatterApiStatus($merchant_id)
    {
        if(is_null(self::$_tophatterApiStatus))
        {
            self::$_tophatterApiStatus = false;
            if(is_numeric($merchant_id)) {
                $query = "SELECT COUNT(*) as `count` FROM `tophatter_configuration` WHERE `merchant_id`=".$merchant_id." LIMIT 0,1";
                $result = Data::sqlRecords($query, 'one');

                if(isset($result['count']) && $result['count']) {
                    self::$_tophatterApiStatus = true;
                    return true;
                }
            }
            return false;
        }
        else
        {
            return self::$_tophatterApiStatus;
        }
    }

    /**
     * To check if Products are imported or not
     * @param string $merchant_id
     * @return bool
     */
    public static function getProductImportStatus($merchant_id)
    {
        if(is_null(self::$_productImportStatus))
        {
            if(is_numeric($merchant_id)) {
                $query = "SELECT COUNT(*) as `count` FROM `tophatter_product` INNER JOIN `jet_product` ON `tophatter_product`.`product_id`=`jet_product`.`id` WHERE `tophatter_product`.`merchant_id`=".$merchantId." LIMIT 0,1";
                $result = Data::sqlRecords($query, 'one');
                if(isset($result['count']) && $result['count']) {

                    self::$_productImportStatus = true;
                    return true;
                }
            }
            return false;
        }
        else
        {
            return self::$_productImportStatus;
        }
    }

    /**
     * To check if Categories are Mapped or not
     * @param string $merchant_id
     * @return bool
     */
    public static function getCategoryMapStatus($merchant_id)
    {
        if(is_null(self::$_categoryMapStatus))
        {
            if(is_numeric($merchant_id)) {
                $query = "SELECT COUNT(*) as `count` FROM `tophatter_category_map` WHERE `merchant_id`=".$merchant_id." AND  `category_id` != '' AND `category_id` IS NOT NULL LIMIT 0,1";
                $result = Data::sqlRecords($query, 'one');
                if(isset($result['count']) && $result['count']) {

                    self::$_categoryMapStatus = true;
                    return true;
                }
            }
            return false;
        }
        else
        {
            return self::$_categoryMapStatus;
        }
    }

    /**
     * To check if Attributes are Mapped or not
     * @param string $merchant_id
     * @return bool
     */
    public static function getAttributeMapStatus($merchant_id)
    {
        if(is_null(self::$_attributeMapStatus))
        {
            if(is_numeric($merchant_id)) {
                $query = "SELECT COUNT(*) as `count` FROM `tophatter_attribute_map` WHERE `merchant_id`=".$merchant_id." LIMIT 0,1";
                $result = Data::sqlRecords($query, 'one');
                if(isset($result['count']) && $result['count']) {

                    self::$_attributeMapStatus = true;
                    return true;
                }
            }
            return false;
        }
        else
        {
            return self::$_attributeMapStatus;
        }
    }

    /**
     * To get Progress status of Profile
     * @param string $merchant_id
     * @return int
     */
    public static function getProfileProgress($merchant_id)
    {
        $count = 0;
        if(self::getTophatterApiStatus($merchant_id))
            $count++;
        if(self::getProductImportStatus($merchant_id))
            $count++;
        if(self::getCategoryMapStatus($merchant_id))
            $count++;
        if(self::getAttributeMapStatus($merchant_id))
            $count++;

        $progress  = ($count*100)/4;
        return $progress;
    }
}
?>
