<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\integration\models\WalmartOrderImportError */

$this->title = 'Update Walmart Order Import Error: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Walmart Order Import Errors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="walmart-order-import-error-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
