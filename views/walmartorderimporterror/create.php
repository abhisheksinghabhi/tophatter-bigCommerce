<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\integration\models\WalmartOrderImportError */

$this->title = 'Create Walmart Order Import Error';
$this->params['breadcrumbs'][] = ['label' => 'Walmart Order Import Errors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="walmart-order-import-error-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
