<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Order */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="order-view">

    <h1>Замовлення <?= $model->id ?></h1>

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
            'qty',
            'sum',
            [
                'attribute' => 'status',
                'format' => 'html',
                'value' => !$model->status ? '<span class="text-danger">Активний</span>' : '<span class="text-success">Завершений</span>'
            ],
            'name',
            'email:email',
            'phone',
            'address',
            'created_at',
            'updated_at',
        ],
    ]) ?>

    <?php $items = $model->orderItems ?>

    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <tr>
                <th>Фото</th>
                <th>Найменування</th>
                <th>Кількість</th>
                <th>Ціна</th>
            </tr>
            <tbody>
            <?php foreach ($items as $item): ?>
                <tr>
                    <td>
                        <a href="<?= \yii\helpers\Url::to(['/product/view', 'id' => $item->product_id]) ?>"><?= $item['name'] ?></a>
                    </td>
                    <td><?= $item['qty_item'] ?></td>
                    <td><?= $item['price'] ?></td>
                    <td><?= $item['sum_item'] ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>
