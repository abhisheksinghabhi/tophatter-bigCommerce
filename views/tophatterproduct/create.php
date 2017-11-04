<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\tophatterProduct */

$this->title = 'Create Tophatter Product';
$this->params['breadcrumbs'][] = ['label' => 'Tophatter Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tophatter-product-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
