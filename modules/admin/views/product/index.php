<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
//            'category_id',
            'name',
        [
                'attribute' => 'category_id',
                'value' => function($data){
                    return $data->category->name;
                }
        ],
//            'content',
            'price',
            //'keyword',
            //'description',
            //'img',
//            'hit:boolean',
            [
                'attribute' => 'hit',
                'value' => function($data){
                    return $data->hit ? '<span class="btn-success">Так</span>' :
                        '<span class="btn-danger">Ні</span>';
                },
                'format' => 'html'
            ],
//            'new:boolean',
            [
                'attribute' => 'new',
                'value' => function($data){
                    return $data->new ? '<span class="btn-success">Так</span>' :
                        '<span class="btn-danger">Ні</span>';
                },
                'format' => 'html'
            ],
//            'sale:boolean',
            [
                'attribute' => 'sale',
                'value' => function($data){
                    return $data->sale ? '<span class="btn-success">Так</span>' :
                        '<span class="btn-danger">Ні</span>';
                },
                'format' => 'html'
            ],
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
