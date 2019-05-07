<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 05.05.2019
 * Time: 18:01
 */

namespace app\controllers;

use app\models\Product;
use app\models\Cart;
use Yii;


class CartController extends AppController
{
    public function actionAdd($id, $qty)
    {
//        $id = Yii::$app->request->get('id');
//        $product = Product::findOne($id);
        $qty = isset($qty) ? (int)$qty : 1;
        $product = Product::findOne($id);
        if (empty($product)) {
            return false;
        }
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->addToCart($product, $qty);
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));


//        return $product;
//        return print_r($product);
    }

    public function actionClear()
    {
        $session = Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.qty');
        $session->remove('cart.sum');
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }

    public function actionDelItem($id)
    {
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->delFromCart($id);
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }

    public function actionShow()
    {
        $session = Yii::$app->session;
        $session->open();
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }
}