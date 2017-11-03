<?php 
namespace frontend\modules\walmart\components;

use Yii;
use yii\base\Component;
use frontend\modules\walmart\components\Data;
use frontend\modules\walmart\models\WalmartInstallation;
use frontend\modules\walmart\components\Dashboard\Setupprogress;

class Installation extends Component
{
    const INSTALLATION_STATUS_COMPLETE = 'complete';
    const INSTALLATION_STATUS_PENDING = 'pending';

    public static $steps = [
                            '1'=>[
                                    'name'=>'Registration',
                                    'template'=>'register.php'
                                 ],
                            '2'=>[
                                    'name'=>'Enter Walmart Api',
                                    'template'=>'walmart-api.php'
                                 ],
                            '3'=>[
                                    'name'=>'Import Products',
                                    'template'=>'import-products.php'
                                 ],
                            '4'=>[
                                    'name'=>'Category Mapping',
                                    'template'=>'category-map.php'
                                 ],
                            '5'=>[
                                    'name'=>'Attribute Mapping',
                                    'template'=>'attribute-map.php'
                                 ]
                           ];

    public static function isInstallationComplete($merchant_id)
    {
        if(is_numeric($merchant_id)) {
            $query = "SELECT `status`,`step` FROM `walmart_installation` WHERE `merchant_id`=".$merchant_id." LIMIT 0,1";
            $result = Data::sqlRecords($query,'one');
            if($result && isset($result['status'])) {
                return $result;
            } else {
                return false;
            }
        }
    }

    public static function getFirstStep()
    {
        return '1';
    }

    public static function getFinalStep()
    {
        return '5';
    }

    public static function getStepInfo($stepId)
    {
        if(isset(self::$steps[$stepId])) {
            $stepData = self::$steps[$stepId];
        } else {
            $stepData = ['error'=>'Invalid Step'];
        }    
        return $stepData;
    }

    public static function completeInstallationForOldMerchants($merchant_id)
    {
        $model = WalmartInstallation::find()->where(['merchant_id'=>$merchant_id])->one();
        if(is_null($model))
        {
            if(Setupprogress::getWalmartApiStatus($merchant_id) && Setupprogress::getCategoryMapStatus($merchant_id)) 
            {
                $model = new WalmartInstallation();
                $model->merchant_id = $merchant_id;                
                $model->status = Installation::INSTALLATION_STATUS_COMPLETE;
                $model->step = self::getFinalStep();
                $model->save();
            } 
            /*else 
            {
                $step = self::getCompletedStepId($merchant_id);

                if(is_null($model)) {
                    $model = new WalmartInstallation();
                    $model->merchant_id = $merchant_id;
                }
                
                if($step == Installation::getFinalStep())
                    $model->status = Installation::INSTALLATION_STATUS_COMPLETE;
                else 
                    $model->status = Installation::INSTALLATION_STATUS_PENDING;
                
                $model->step = $step;
                $model->save();
            }*/
        }
    }

    public static function getCompletedStepId($merchant_id)
    {
        $step = '1';
        /*$testApiStatus = false;
        if(Setupprogress::getTestApiStatus($merchant_id)) {
            $step = '2';
            $testApiStatus = true;
        }
        */
        $liveApiStatus = false;
        if(Setupprogress::getLiveApiStatus($merchant_id)) {
            $step = '3';
            $liveApiStatus = true;
        }

        $productImportStatus = false;
        if(Setupprogress::getProductImportStatus($merchant_id) && $liveApiStatus) {
            $step = '4';
            $productImportStatus = true;
        }

        $categoryMapStatus = false;
        if(Setupprogress::getCategoryMapStatus($merchant_id) && $productImportStatus) {
            $step = '5';
            $categoryMapStatus = true;
        }
        /*
        if(Setupprogress::getAttributeMapStatus($merchant_id) && $categoryMapStatus) {
            $step = '6';
        }*/
        return $step;
    }

    public static function showApiStep($merchant_id=null)
    {
        $merchant_id=333;
        if(is_null($merchant_id)) {
            $merchant_id = Yii::$app->user->identity->id;
        }

        $query = "SELECT `selling_on_walmart`,`approved_by_walmart` FROM `walmart_registration` WHERE `merchant_id`='{$merchant_id}'";
        $result = Data::sqlRecords($query, 'one');

        if($result)
        {
            if(isset($result['selling_on_walmart']) && $result['selling_on_walmart']=='yes') {
                return true;
            } elseif(isset($result['approved_by_walmart']) && $result['approved_by_walmart']=='yes') {
                return true;
            } else {
                return false;
            }
        }
        else {
            return false;
        }
    }
}
