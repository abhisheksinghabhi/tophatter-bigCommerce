<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\integration\models\WalmartTaxCodes */

$this->title = 'Create Walmart Tax Codes';
$this->params['breadcrumbs'][] = ['label' => 'Walmart Tax Codes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="walmart-tax-codes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
