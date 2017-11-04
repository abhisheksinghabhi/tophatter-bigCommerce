<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\integration\models\tophatterCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'tophatter Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tophatter-category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create tophatter Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'merchant_id',
            'category_id',
            'title',
            'parent_id',
            // 'level',
            // 'attributes:ntext',
            // 'attribute_values:ntext',
            // 'tophatter_attributes:ntext',
            // 'tophatter_attribute_values:ntext',
            // 'attributes_order:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
