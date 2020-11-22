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
                        <td><?= $item['name']?></td>
                        <td><?= $item['qty']?></td>
                        <td><?= $item['price']?></td>
                        <td><span data-id="<?= $id?>" class="glyphicon glyphicon-remove danger del-item"></span></td>
                    </tr>
                <?php endforeach;?>
                    <tr>
                        <td>Ітогово:</td>
                        <td><?= $session['cart.qty'] ?> </td>
                    </tr>
                    <tr>
                        <td>Сума:</td>
                        <td><?= $session['cart.sum'] ?> </td>
                    </tr>
            </tbody>
        </table>
    </div>
<?php else:?>
    <h3>Корзина пуста</h3>
<?php endif;?>
