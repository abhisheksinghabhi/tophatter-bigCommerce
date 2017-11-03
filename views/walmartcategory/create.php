<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\integration\models\WalmartCategory */

$this->title = 'Create Walmart Category';
$this->params['breadcrumbs'][] = ['label' => 'Walmart Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="walmart-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
