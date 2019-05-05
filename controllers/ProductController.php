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
use yii\web\HttpException;

class ProductController extends AppController
{


    public function actionView($id)
    {
//        $id = Yii::$app->request->get('id');
        $product = Product::findOne($id);
        if (empty($product))
            throw new HttpException(404,'Нет такого товара ');
        $this->setMeta("E Shopper | {$product->category->name} | {$product->name}", $product->keywords, $product->description);
        $hits = Product::find()->where(['hit' => '1'])->limit(9)->all();
//        $product=Product::find()->with('category')->where(['id'=>$id])->limit(1)->one() ;
        return $this->render('view', compact('product', 'hits'));
    }
}
