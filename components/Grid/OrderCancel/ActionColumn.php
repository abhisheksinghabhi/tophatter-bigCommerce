<?php
namespace frontend\modules\walmart\components\Grid\OrderCancel;

use Yii;
use Closure;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn as CoreActionColumn;

class ActionColumn extends CoreActionColumn
{

    public $template = '{view}{truck}{refund}{cancel}';/* {view} {update} {delete}';*/

    /**
     * Initializes the default button rendering callbacks.
     */
    protected function initDefaultButtons()
    {
        
        if (!isset($this->buttons['refund'])) {
            $this->buttons['cancel'] = function ($url, $model, $key) {
                $cancelUrl = \yii\helpers\Url::toRoute(['walmartorderimporterror/cancel-order','pid'=>$model->purchase_order_id]);
                    $options = array_merge([
                        'title' => Yii::t('yii', 'Cancel'),
                        'aria-label' => Yii::t('yii', 'Cancel'),
                        'onclick' => "confirm('Are you sure,Want to cancel order?')?window.location='{$cancelUrl}':''",
                        'data-pjax' => '1',
                    ], $this->buttonOptions);
                    $options['data-step']='3';
                $options['data-intro']="Cancel order from walmart.";
                $options['data-position']='left';
                    return Html::a('<span class="glyphicon glyphicon-remove-circle"></span>', 'javascript:void(0);', $options);
               
            };
        }
        parent::initDefaultButtons();
    }
}
