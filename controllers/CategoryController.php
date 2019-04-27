<?php
/**
 * Created by PhpStorm.
 * User: Yana
 * Date: 27.04.2019
 * Time: 23:00
 */

namespace app\controllers;

use app\models\Category;
use app\models\Product;
use Yii;


class CategoryController extends AppContraller
{

    public function actionIndex()
    {
        $hits = Product::find()->where(['hit' => '1'])->limit(6)->all();
        return $this->render('index', compact('hits'));

    }

    public function actionView($id)
    {
        $id = Yii::$app->request->get('id');
//        debug($id, 'id');
        $products = Product::find()->where(['category_id'=>$id])->all();
        return $this->render('view', compact('products'));
    }
}