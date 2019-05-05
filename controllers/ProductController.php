<?php
/**
 * Created by PhpStorm.
 * User: Yana
 * Date: 03.05.2019
 * Time: 13:18
 */

namespace app\controllers;

use app\models\Product;
use app\models\Category;
use Yii;

class ProductController extends AppController
{


    public function actionView($id)
    {
        $id = Yii::$app->request->get('id');
        $product = Product::findOne($id);
//        $product=Product::find()->with('category')->where(['id'=>$id])->limit(1)->one() ;
        return $this->render('view', compact('product'));
    }
}
