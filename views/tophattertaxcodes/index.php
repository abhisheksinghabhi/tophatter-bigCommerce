<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\integration\models\WalmartTaxCodesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tophatter Tax Codes';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
/*.ced-survey {
    background-color: #3a1169;
    display: inline-block;
    width: 60%;
    color: #fff;
    font-size: 12px;
    padding: 1px 10px;
    margin-left: 15px;
}*/
.pagination-dont-show ul{
  display :none;
}
.pagination-dont-show select.form-control{
  display: inline-block;
}
.pagination-show select.form-control{
  display :none;
}

.list-page {
    width:24%;
    float:right; 
    text-align:right;
}
/*.ced-survey a{
    float: right;
  color: #fff;
  text-decoration: underline;
}*/
.left-div{
  width: 75%;
  float: left;
  margin-top: 2px;
}
.table.table-striped.table-bordered tr th {
    font-size: 14px;
    /*font-weight: 600;*/
}
.jet-product-index .jet_notice{
  font-weight: normal !important;
}
.jet-product-index .jet_notice .fa-bell {
  color: #B11600;
}
.jet-product-index .no-data{
  display: none;
}
    .jet-product-index .no_product_error{
        background-color: #f2dede;
        border-color: #ebccd1;
        color: #a94442;
    }
   .jet_config_popup .product-import,.jet_config_popup .welcome_message{
      background: #fff none repeat scroll 0 0;
      border-radius: 5px !important;
      margin: 5% auto 3%;
      overflow: hidden;
      position: relative;
      width: 50%;
      margin-top: 11%;
    }

  .jet-product-index .jet_notice {
      background-color: #f5f5f5;
      border-color: #d6e9c6;
      border-radius: 4px;
      color: #333;
      font-size: 14px;
      font-weight: bold;
      line-height: 19px;
      margin-bottom: 0;
      padding: 4px 8px;
  }
  .import_popup.jet_config_popup.jet_config_popup_error {
    box-shadow: 0 0 6px 3px #000000;
    left: 0;
    top: 0%;
    width: 100%;
}
.table.table-bordered tr td a span{
    color: #3A1169;
}
.table.table-bordered tr td a span.upload-error{
    color: #F16935;
    font-size: 1.5em;
    padding: 5px;
}
.table.table-bordered tr.danger td{
  background-color: #cfd8dc;
}
</style>
<div class="jet-product-index content-section">
<div class="form new-section">
<div class="walmart-tax-codes-index">

    <div class="jet-pages-heading">
        <h3 class="Jet_Products_style"><?= Html::encode($this->title) ?></h3>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= GridView::widget([
        'options' => ['class'=>'grid-view table-responsive'],
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            'tax_code',
            'cat_desc:ntext',
            'sub_cat_desc:ntext',
        ],
    ]); ?>

</div>
</div>
</div>
