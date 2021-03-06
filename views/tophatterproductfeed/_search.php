<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\tophatter\models\tophatterProductFeedSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tophatter-product-feed-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'merchant_id') ?>

    <?= $form->field($model, 'feed_id') ?>

    <?= $form->field($model, 'product_ids') ?>

    <?= $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
