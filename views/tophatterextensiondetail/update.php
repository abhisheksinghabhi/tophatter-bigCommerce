<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\integration\models\TophatterExtensionDetail */

$this->title = 'Update Tophatter Extension Detail: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tophatter Extension Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tophatter-extension-detail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
