<?php
/**
 * Created by PhpStorm.
 * User: cedcoss
 * Date: 14/4/17
 * Time: 11:48 AM
 */
?>
<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/*$this->title = 'Walmart Report';
$this->params['breadcrumbs'][] = $this->title;*/
?>
<div class="content-section">
    <div class="form new-section">
        <div class="jet-pages-heading">
            <div class="title-need-help">
                <h3 class="Jet_Products_style">Walmart Report</h3>
            </div>
        </div>
        <div>
            <section class="cd-faq">

                <div class="cd-faq-items">
                    <ul id="basics" class="cd-faq-group">
                        <?php /*foreach ($data as $row) { */ ?>
                        <li>
                            <a class="cd-faq-trigger" href="#0"><?= 'Low Stock Report' ?></a>
                            <div class="cd-faq-content">
                                <!--<p><? /*= $row['description'] */ ?></p>-->

                                <?php Pjax::begin(['timeout' => 30000, 'clientOptions' => ['container' => 'pjax-container']]); ?>

                                <?= GridView::widget([
                                    'dataProvider' => new \yii\data\ArrayDataProvider([
                                        'allModels' => $items,
                                        'sort' => [
                                            'attributes' => $searchAttributes,
                                        ],
                                    ]),
                                    'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
                                    'filterModel' => $searchModel,
                                    /*'columns' => $searchColumns,*/
                                    'columns' => [
                                        [
                                            'attribute' => 'ID',
                                            'label' => 'ID',
                                            'value' => 'ID',
                                            'filter' => '<input class="form-control" name="ID" value="' . $searchModel['ID'] . '" type="text">'
                                        ],
                                        [
                                            'attribute' => 'PRODUCT TITLE',
                                            'label' => 'PRODUCT TITLE',
                                            /*'value' => 'PRODUCT TITLE',*/
                                            'value' => function ($items) {
                                                if (!empty($items['PRODUCT TITLE ON WALMART'])) {
                                                    return $items['PRODUCT TITLE ON WALMART'];
                                                } else {
                                                    return $items['PRODUCT TITLE'];
                                                }
                                            },
                                            'filter' => '<input class="form-control" name="PRODUCT TITLE" value="' . $searchModel['PRODUCT TITLE'] . '" type="text">'
                                        ],
                                        [
                                            'attribute' => 'SKU',
                                            'label' => 'SKU',
                                            'value' => 'SKU',
                                            'filter' => '<input class="form-control" name="SKU" value="' . $searchModel['SKU'] . '" type="text">'
                                        ],
                                        [
                                            'attribute' => 'TYPE',
                                            'label' => 'TYPE',
                                            'value' => 'TYPE',
                                            'filter' => '<input class="form-control" name="TYPE" value="' . $searchModel['TYPE'] . '" type="text">'
                                        ],
                                        [
                                            'attribute' => 'QTY',
                                            'label' => 'QTY',
                                            'value' => 'QTY',
                                            'filter' => '<input class="form-control" name="QTY" value="' . $searchModel['QTY'] . '" type="text">'

                                        ],
                                        [
                                            'attribute' => 'VARIANT QTY',
                                            'label' => 'VARIANT QTY',
                                            'value' => 'VARIANT QTY',
                                            'filter' => '<input class="form-control" name="VARIANT QTY" value="' . $searchModel['VARIANT QTY'] . '" type="text">'

                                        ],
                                        [
                                            'attribute' => 'VARIANT SKU',
                                            'label' => 'VARIANT SKU',
                                            'value' => 'VARIANT SKU',
                                            'filter' => '<input class="form-control" name="VARIANT SKU" value="' . $searchModel['VARIANT SKU'] . '" type="text">'

                                        ],

                                    ],
                                ]);
                                ?>
                                <?php Pjax::end(); ?>

                            </div> <!-- cd-faq-content -->
                        </li>
                        <li>
                            <a class="cd-faq-trigger" href="#0"><?= 'Sales By SKU' ?></a>
                            <div class="cd-faq-content">
                                <!--<p><? /*= $row['description'] */ ?></p>-->
                                <?= Html::beginForm(['report/index'], 'post', ['id' => 'jet_bulk_product']);//Html::beginForm(['walmartproduct/bulk'],'post');      ?>

                                <?php
                                $bulkActionSelect = Html::dropDownList('action', $action, ['' => '-- select bulk action --', 'yearly' => 'Yearly', 'monthly' => 'Monthly', 'weekly' => 'Weekly', 'today' => 'today'], ['id' => 'jet_product_select', 'class' => 'form-control']);
                                $bulkActionSubmit = Html::Button('submit', ['class' => 'btn btn-primary', 'onclick' => 'validateBulkAction()']);

                                ?>
                                <?php Pjax::begin(['timeout' => 30000, 'clientOptions' => ['container' => 'pjax-container']]); ?>
                                <!--                                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">-->
                                <div class="report-bulk-action-wrapper col-lg-offset-8">
                                    <?= $bulkActionSelect . $bulkActionSubmit ?>
                                </div>
                                <!--                                </div>-->
                                <?= GridView::widget([
                                    'dataProvider' => new \yii\data\ArrayDataProvider([
                                        'allModels' => $order,
                                        'sort' => [
                                            'attributes' => $searchOrderAttributes,
                                        ],
                                    ]),
                                    'filterModel' => $searchOrderModel,
                                    'summary' => '<div class="summary clearfix"><div class="col-lg-5 col-md-5 col-sm-5 col-xs-12"><span class="show-items">Showing <b>{begin}-{end}</b> of <b>{totalCount}</b> items.</span></div></div>',
                                    'columns' => $searchOrderColumns,
                                ]); ?>
                                <?php Pjax::end(); ?>
                                <?= Html::endForm() ?>

                            </div> <!-- cd-faq-content -->
                        </li>
                        <?php /*} */ ?>

                    </ul> <!-- cd-faq-group -->

                </div> <!-- cd-faq-items -->
                <a href="#0" class="cd-close-panel">Close</a>
            </section> <!-- cd-faq -->
        </div>
    </div>
</div>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?= Yii::$app->getUrlManager()->getBaseUrl(); ?>/css/faqreset.css"> <!-- CSS reset -->
<link rel="stylesheet" href="<?= Yii::$app->getUrlManager()->getBaseUrl(); ?>/css/faqstyle.css"> <!-- Resource style -->
<script type="text/javascript" src="<?= Yii::$app->getUrlManager()->getBaseUrl(); ?>/js/modernizr.js"></script>
<script type="text/javascript" src="<?= Yii::$app->getUrlManager()->getBaseUrl(); ?>/js/jquery-2.1.1.js"></script>
<script type="text/javascript"
        src="<?= Yii::$app->getUrlManager()->getBaseUrl(); ?>/js/jquery.mobile.custom.min.js"></script>
<script type="text/javascript" src="<?= Yii::$app->getUrlManager()->getBaseUrl(); ?>/js/main.js"></script>
<script>
    function validateBulkAction() {
        var action = $('#jet_product_select').val();

        $("#jet_bulk_product").submit();
    }
</script>
<style>
    #jet_product_select {
        display: inline-block;
        width: 76%;
    }

    .report-bulk-action-wrapper {
        width: 35%;
    }
</style>