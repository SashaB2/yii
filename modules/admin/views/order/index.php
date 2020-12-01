<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Order', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'qty',
            'sum',
            [
                'attribute' => 'status',
                'format' => 'html',
                'value' => function($data){
                    return !$data->status ? '<span class="text-danger">Активний</span>'
                        :'<span class="text-success">Завершений</span>';
                }
            ],
//            'status:boolean',
            'name',
            //'email:email',
            //'phone',
            //'address',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
