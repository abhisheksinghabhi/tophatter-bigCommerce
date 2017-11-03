<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use dosamigos\datepicker\DatePicker;
/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\integration\models\WalmartOrderImportErrorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Walmart Order Import Errors';
$this->params['breadcrumbs'][] = $this->title;

?>
<style>
.ui-corner-all
{
  display:none;
}
</style>
<div class="walmart-order-import-error-index">
  <div class="content-section">
    <div class="form new-section">
      <div class="jet-pages-heading">
        <h3 class="Jet_Products_style"><?= Html::encode($this->title) ?></h3>
      </div>
      <?php Pjax::begin(['timeout' => 5000, 'clientOptions' => ['container' => 'pjax-container']]); ?>
      <?= GridView::widget([
          'dataProvider' => $dataProvider,
          'filterModel' => $searchModel,
          'columns' => [
              //['class' => 'yii\grid\SerialColumn'],

              'id',
              'purchase_order_id',
              //'merchant_id',
              'reason:ntext',
              'created_at',

              ['class' => 'frontend\modules\walmart\components\Grid\OrderCancel\ActionColumn'],
              /*[
                     'attribute' => 'created_at',
                     'headerOptions' => ['data-toggle' => 'tooltip', 'title' => 'Created At'],
                     'filter'=>DatePicker::widget([
                               'model' => $searchModel,
                               'attribute' => 'created_at',
                               'clientOptions' => [
                                  'autoclose' => true,
                                  'format' => 'dd-mm-yyyy'
                              ]
                     ])
                 ],*/
              
          ],
      ]); ?>
      <?php Pjax::end(); ?>
    </div>
  </div>
</div>
