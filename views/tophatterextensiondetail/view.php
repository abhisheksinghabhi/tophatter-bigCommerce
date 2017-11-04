<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\integration\models\TophatterExtensionDetail */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tophatter Extension Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tophatter-extension-detail-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'merchant_id',
            'install_date',
            'date',
            'expire_date',
            'status',
        ],
    ]) ?>

</div>
