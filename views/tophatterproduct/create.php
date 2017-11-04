<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\WalmartProduct */

$this->title = 'Create Walmart Product';
$this->params['breadcrumbs'][] = ['label' => 'Walmart Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="walmart-product-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
