<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\integration\models\WalmartOrderDetail */

$this->title = 'Update Walmart Order Detail: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Walmart Order Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="walmart-order-detail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
