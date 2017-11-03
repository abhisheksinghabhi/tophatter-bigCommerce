<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\integration\models\WalmartConfiguration */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="walmart-configuration-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'merchant_id')->textInput() ?>

    <?= $form->field($model, 'api_user')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'api_password')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'consumer_channel_type_id')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'merchant_email')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
