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
    public function actionAdd($id)
    {
//        $id = Yii::$app->request->get('id');
//        $product = Product::findOne($id);
        $product = Product::findOne($id);
        if (empty($product)) {
            return false;
        }
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->addToCart($product);
        $this->layout=false;
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
        $this->layout=false;
        return $this->render('cart-modal', compact('session'));
    }
}