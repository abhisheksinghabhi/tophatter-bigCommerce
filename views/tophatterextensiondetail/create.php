<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\integration\models\WalmartExtensionDetail */

$this->title = 'Create Tophatter Extension Detail';
$this->params['breadcrumbs'][] = ['label' => 'Tophatter Extension Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tophatter-extension-detail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
