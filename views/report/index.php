<?php
/**
 * Created by PhpStorm.
 * User: cedcoss
 * Date: 13/4/17
 * Time: 1:56 PM
 */

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'Walmart Report';
$this->params['breadcrumbs'][] = $this->title;
?>
<div>
    <div class="form new-section">
        <div class="walmart-tax-codes-index">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
    </div>
</div>
<div >
    <div class="form new-section">
        <div class="walmart-tax-codes-index">
            <div class="cards-wrapper">
                <div class="cards">

                    <h2><?= Html::encode('Sales By SKU') ?></h2>
                    <?php Pjax::begin(['timeout' => 30000, 'clientOptions' => ['container' => 'pjax-container']]); ?>

                    <?= GridView::widget([
                        'dataProvider' => new \yii\data\ArrayDataProvider([
                            'allModels' => $items,
                            'sort' => [
                                'attributes' => $searchAttributes,
                            ],
                        ]),
                        'filterModel' => $searchModel,
                        /*'columns' => $searchColumns,*/
                        'columns' => [
                            [
                                'attribute' => 'ID',
                                'label' => 'ID',
                                'value' => 'ID',
                                'filter' => '<input class="form-control" name="ID" value="'. $searchModel['ID'] .'" type="text">'
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
                                'filter' => '<input class="form-control" name="PRODUCT TITLE" value="'. $searchModel['PRODUCT TITLE'] .'" type="text">'
                            ],
                            [
                                'attribute' => 'SKU',
                                'label' => 'SKU',
                                'value' => 'SKU',
                                'filter' => '<input class="form-control" name="SKU" value="'. $searchModel['SKU'] .'" type="text">'
                            ],
                            [
                                'attribute' => 'TYPE',
                                'label' => 'TYPE',
                                'value' => 'TYPE',
                                'filter' => '<input class="form-control" name="TYPE" value="'. $searchModel['TYPE'] .'" type="text">'
                            ],
                            [
                                'attribute' => 'QTY',
                                'label' => 'QTY',
                                'value' => 'QTY',
                                'filter' => '<input class="form-control" name="QTY" value="'. $searchModel['QTY'] .'" type="text">'

                            ],
                            [
                                'attribute' => 'VARIANT QTY',
                                'label' => 'VARIANT QTY',
                                'value' => 'VARIANT QTY',
                                'filter' => '<input class="form-control" name="VARIANT QTY" value="'. $searchModel['VARIANT QTY'] .'" type="text">'

                            ],
                            [
                                'attribute' => 'VARIANT SKU',
                                'label' => 'VARIANT SKU',
                                'value' => 'VARIANT SKU',
                                'filter' => '<input class="form-control" name="VARIANT SKU" value="'. $searchModel['VARIANT SKU'] .'" type="text">'

                            ],

                        ],
                    ]);
                    ?>
                    <?php Pjax::end(); ?>
                </div>

            </div>
        </div>
    </div>

    <div class="form new-section">
        <div class="walmart-tax-codes-index">
            <div class="cards-wrapper">
                <div class="cards">
                    <h2><?= Html::encode('Low Stock Report') ?></h2>

                    <?php Pjax::begin(['timeout' => 30000, 'clientOptions' => ['container' => 'pjax-container']]); ?>

                    <?= GridView::widget([
                        'dataProvider' => new \yii\data\ArrayDataProvider([
                            'allModels' => $order,
                            'sort' => [
                                'attributes' => $searchOrderAttributes,
                            ],
                        ]),
                        'filterModel' => $searchOrderModel,
                        'columns' => $searchOrderColumns,
                    ]); ?>
                    <?php Pjax::end(); ?>
                </div>
            </div>

        </div>
    </div>
</div>

<style type="text/css">
    .cards-wrapper .cards {
        background-color: #fff;
        box-shadow: 0 1px 16px #ccc;
        margin: 20px auto;
        padding: 15px;
        min-height: 200px;
        width: 70%;
    }

    #warning-icon {
        color: #FFA500 !important;
        font-size: 16px !important;
    }

    .row-count {
        background: #242424 none repeat scroll 0 0;
        border-radius: 2px;
        color: #fff;
        display: block;
        margin: 0 auto;
        padding: 5px 0;
        text-align: center;
        width: 200px;
    }

    .cards-wrapper .cards .label {
        color: #000;
        display: inline-block;
        font-size: 13px;
        font-weight: normal;
        min-width: 140px;
        text-align: left;
        text-transform: uppercase;
    }

    .cards .pro-info {
        margin-top: 10px;
    }

    .pro-info .incorrect-info {
        background-color: #d22525;
        border-radius: 2px;
        color: #fff !important;
        padding: 2px 15px;
        margin-left: 10px;
    }

    .pro-info .warning-info {
        background-color: #FFA500;
        border-radius: 2px;
        color: #fff !important;
        padding: 2px 15px;
        margin-left: 10px;
    }

    .label1 {
        width: 115px;
    }

    .cards .pro-info i {
        color: #D22525;
        font-size: 16px;
    }

    .pro-info.variant-label .label1 p {
        background: #292836 none repeat scroll 0 0 !important;
        border-radius: 1px;
        color: #fff;
        font-size: 15px;
        margin: 15px 0;
        padding: 5px;
    }

    .pro-info.variant-label .label p {
        background: #292836 none repeat scroll 0 0 !important;
        border-radius: 1px;
        color: #fff;
        font-size: 15px;
        margin: 15px 0;
        padding: 5px;
    }

    .pro-info .label1 > a {
        float: left;
    }

    .variant-label .label {
        width: 100%;
    }

    .pro-info .label1 p {
        background: #e5eaed none repeat scroll 0 0;
        border-radius: 25px;
        padding: 4px 0;
    }
</style>