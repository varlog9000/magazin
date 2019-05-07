<?php

use app\models\OrderItems;
use app\models\Order;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>
<div class="container">
    <?php if (!empty($session['cart'])) : ?>
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                <th>Фото</th>
                <th>Наименование</th>
                <th>Количество</th>
                <th>Цена</th>
                <th>Сумма</th>
                <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
                </thead>
                <tbody>
                <?php foreach ($session['cart'] as $id => $item) : ?>
                    <tr>
                        <td>
                            <a href="<?= Url::to(['product/view', 'id' => $id]) ?>"><?= \yii\helpers\Html::img("@web/images/product/{$item['img']}", ['alt' => $item['name'], 'style' => 'max-width: 50px; max-height: 50px;']) ?></a>
                        </td>
                        <td><a href="<?= Url::to(['product/view', 'id' => $id]) ?>"><?= $item['name'] ?></a></td>
                        <td><?= $item['qty'] ?></td>
                        <td><?= $item['price'] ?></td>
                        <td><?= $item['qty'] * $item['price'] ?></td>
                        <td><span class="glyphicon glyphicon-remove text-danger del-item" data-id="<?= $id ?>"
                                  aria-hidden="true"></span></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="4">Итого:</td>
                    <td colspan="2"><?= $session['cart.qty'] ?></td>
                </tr>
                <tr>
                    <td colspan="4">Сумма:</td>
                    <td colspan="2"><?= $session['cart.sum'] ?></td>
                </tr>
                </tbody>
            </table>
        </div>
        <hr>
        <?php $form = ActiveForm::begin() ?>
        <?= $form->field($order, 'name') ?>
        <?= $form->field($order, 'email') ?>
        <?= $form->field($order, 'phone') ?>
        <?= $form->field($order, 'address') ?>
        <?= Html::submitButton('Заказать', ['class' => 'btn btn-success']) ?>
        <?php ActiveForm::end() ?>
    <?php else : ?>
        <h3>Корзина пуста!</h3>
    <?php endif; ?>
</div>
