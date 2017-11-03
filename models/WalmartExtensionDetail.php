<?php
namespace frontend\modules\walmart\models;

use Yii;

/**
 * This is the model class for table "walmart_extension_detail".
 *
 * @property integer $id
 * @property integer $merchant_id
 * @property string $install_date
 * @property string $date
 * @property string $expire_date
 * @property string $status
 * @property integer $order_id
 * @property string $app_status
 * @property string $uninstall_date
 * @property string $payment_plan
 */
class WalmartExtensionDetail extends \yii\db\ActiveRecord
{
    const STATUS_TRIAL_EXPIRED = 'Trial Expired';
    const STATUS_LICENSE_EXPIRED = 'License Expired';
    const STATUS_NOT_PURCHASED = 'Not Purchase';
    const STATUS_PURCHASED = 'Purchased';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'walmart_extension_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['merchant_id'], 'required'],
            [['merchant_id', 'order_id'], 'integer'],
            [['install_date', 'date', 'expire_date', 'uninstall_date'], 'safe'],
            [['payment_plan'], 'string'],
            [['status', 'app_status'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'merchant_id' => 'Merchant ID',
            'install_date' => 'Install Date',
            'date' => 'Date',
            'expire_date' => 'Expire Date',
            'status' => 'Status',
            'order_id' => 'Order ID',
            'app_status' => 'App Status',
            'uninstall_date' => 'Uninstall Date',
            'payment_plan' => 'Payment Plan',
        ];
    }
}
