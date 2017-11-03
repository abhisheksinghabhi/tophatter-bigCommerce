<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\integration\models\WalmartCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="walmart-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'merchant_id')->textInput() ?>

    <?= $form->field($model, 'category_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parent_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'level')->textInput() ?>

    <?= $form->field($model, 'attributes')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'attribute_values')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'walmart_attributes')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'walmart_attribute_values')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'attributes_order')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
