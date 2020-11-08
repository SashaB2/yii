<?php if(!empty($session)): ?>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <tr>Фото</tr>
                <tr>Найменування</tr>
                <tr>Кількість</tr>
                <tr>Ціна</tr>
                <tr><span class="glyphicon glyphicon-remove"></span></tr>
            </thead>
            <tbody>
                <?php foreach ($session['cart'] as $id => $item): ?>
                    <tr>
                        <td><?= $item['img']?></td>
                        <td><?= $item['name']?></td>
                        <td><?= $item['qty']?></td>
                        <td><?= $item['price']?></td>
                        <td><span class="glyphicon glyphicon-remove danger del-item"></span></td>
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
