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
        debug($id);
    }
}