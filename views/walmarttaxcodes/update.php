<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\integration\models\WalmartTaxCodes */

$this->title = 'Update Walmart Tax Codes: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Walmart Tax Codes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="walmart-tax-codes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
