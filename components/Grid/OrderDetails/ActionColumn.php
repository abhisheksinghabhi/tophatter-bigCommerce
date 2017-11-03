<?php
namespace frontend\modules\walmart\components\Grid\OrderDetails;

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
        $this->buttons['view'] = function ($url, $model, $key) {
                 $options = array_merge([
                        'title' => Yii::t('yii', 'view'),
                        'aria-label' => Yii::t('yii', 'view'),
                        'onclick' => "checkorderstatus('{$model->purchase_order_id}');",
                        'data-pjax' => '1',
                    ], $this->buttonOptions);
                    return Html::a('<span class="fa fa-eye"></span>', 'javascript:void(0);', $options);
        };
        if (!isset($this->buttons['refund'])) {
            
            $this->buttons['refund'] = function ($url, $model, $key) {
                if( $model->status =='shipped' && $model->status !='refunded' && $model->status!='canceled'){
                    $options = array_merge([
                        'title' => Yii::t('yii', 'Refund'),
                        'aria-label' => Yii::t('yii', 'Refund'),
                        'onclick' => "openRefundPopup('{$model->id}');",
                        'data-pjax' => '1',
                    ], $this->buttonOptions);
                    return Html::a('<span class="fa fa-exchange"></span>', 'javascript:void(0);', $options);
              }
            }; 

           
            $this->buttons['cancel'] = function ($url, $model, $key) {
                $cancelUrl = \yii\helpers\Url::toRoute(['walmartorderdetail/cancel-order','pid'=>$model->purchase_order_id]);
                 if( $model->status !='shipped'){
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
                }
               
            };
            $this->buttons['truck'] = function ($url, $model, $key) {
                if($model->ship_request!='' && $model->ship_request!='[]' && $model->status!='canceled' && $model->status!='shipped' && $model->status !='refunded' && $model->status !='completed'){
                    $options = array_merge([
                        'title' => Yii::t('yii', 'Ship'),
                        'aria-label' => Yii::t('yii', 'Ship'),
                        'onclick' => "openShippingPopup({$model->ship_request});",
                        'data-pjax' => '1',
                    ], $this->buttonOptions);
                    $options['data-step']='5';
                    $options['data-intro']="Shipped order from walmart";
                    $options['data-position']='left';
                    return Html::a('<span class="fa fa-truck"></span>', 'javascript:void(0);', $options);
                }
                else
                {
                    return '';
                }
            };
            
        }
        parent::initDefaultButtons();
    }

}
