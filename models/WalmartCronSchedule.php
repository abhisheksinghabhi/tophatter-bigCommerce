<?php

namespace frontend\modules\walmart\models;

use Yii;

/**
 * This is the model class for table "walmart_cron_schedule".
 *
 * @property integer $id
 * @property string $cron_name
 * @property string $cron_data
 */
class WalmartCronSchedule extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'walmart_cron_schedule';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cron_name', 'cron_data'], 'required'],
            [['cron_data'], 'string'],
            [['cron_name'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cron_name' => 'Cron Name',
            'cron_data' => 'Cron Data',
        ];
    }
}
