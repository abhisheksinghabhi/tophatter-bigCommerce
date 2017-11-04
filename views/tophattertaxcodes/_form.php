<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\integration\models\WalmartTaxCodes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="walmart-tax-codes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tax_code')->textInput() ?>

    <?= $form->field($model, 'cat_desc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'sub_cat_desc')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
