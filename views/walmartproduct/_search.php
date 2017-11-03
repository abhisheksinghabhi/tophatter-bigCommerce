<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\WalmartProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="walmart-product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'product_id') ?>

    <?= $form->field($model, 'merchant_id') ?>

    <?= $form->field($model, 'walmart_attributes') ?>

    <?= $form->field($model, 'category') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'error') ?>

    <?php // echo $form->field($model, 'tax_code') ?>

    <?php // echo $form->field($model, 'min_price') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
