<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\integration\models\tophatterConfiguration */

$this->title = 'Update Tophatter Configuration: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tophatter Configurations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tophatter-configuration-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
