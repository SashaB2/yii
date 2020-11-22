<div class="container">
    <?php if(Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success alert-dismissable" role="alert">
            <button type="button" class="close" data-dismiss="alert"
                    aria-label="Close"><span aria-hidden="true">&times</span></button>
            <?php echo Yii::$app->session->getFlash('success');?>
        </div>
    <?php endif;?>
    <?php if(Yii::$app->session->hasFlash('error')): ?>
        <div class="alert alert-danger alert-dismissable" role="alert">
            <button type="button" class="close" data-dismiss="alert"
                    aria-label="Close"><span aria-hidden="true">&times</span></button>
            <?php echo Yii::$app->session->getFlash('error');?>
        </div>
    <?php endif;?>
    <?php if(!empty($session->get('cart')) &&
        !empty($session->get('cart.qty')) &&
        !empty($session->get('cart.sum'))
    ): ?>

        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <tr>
                    <th>Фото</th>
                    <th>Найменування</th>
                    <th>Кількість</th>
                    <th>Ціна</th>
                    <th><span class="glyphicon glyphicon-remove"></span></th>
                </tr>
                <tbody>
                <?php foreach ($session['cart'] as $id => $item): ?>
                    <tr>
                        <td><?= \yii\helpers\Html::img("@web/images/products/{$item['img']}", ['alt' => $item['name'], 'height' => '50px'])?></td>
                        <td><a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $id])?>"><?= $item['name']?></a></td>
                        <td><?= $item['qty']?></td>
                        <td><?= $item['price']?></td>
                        <td><?= $item['qty'] * $item['price']?></td>
                        <td><span data-id="<?= $id?>" class="glyphicon glyphicon-remove danger del-item"></span></td>
                    </tr>
                <?php endforeach;?>
                <tr>
                    <td colspan="5">Підсумок:</td>
                    <td><?= $session['cart.qty'] ?> </td>
                </tr>
                <tr>
                    <td colspan="5">Сума:</td>
                    <td><?= $session['cart.sum'] ?> </td>
                </tr>
                </tbody>
            </table>
        </div>
    </hr>
    <?php $form = \yii\widgets\ActiveForm::begin() ?>
        <?= $form->field($order,'name') ?>
        <?= $form->field($order,'email') ?>
        <?= $form->field($order,'phone') ?>
        <?= $form->field($order,'address') ?>
        <?= \yii\helpers\Html::submitButton('Заказати', ['class' => 'btn btn-success']) ?>
    <?php \yii\widgets\ActiveForm::end() ?>
    <?php else:?>
        <h3>Корзина пуста</h3>
    <?php endif;?>
</div>