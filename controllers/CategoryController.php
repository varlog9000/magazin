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
use yii\data\Pagination;


class CategoryController extends AppController
{

    public function actionIndex()
    {
        $hits = Product::find()->where(['hit' => '1'])->limit(6)->all();
        $this->setMeta("E Shopper");
        return $this->render('index', compact('hits'));


    }

    public function actionView($id)
    {
        $id = Yii::$app->request->get('id');
//        debug($id, 'id');
//        $products = Product::find()->where(['category_id'=>$id])->all();
        $productsCount = Product::find()->where(['category_id' => $id]);
        $pages = new Pagination(['totalCount' => $productsCount->count(), 'pageSize' => 3, 'forcePageParam'=>false, 'pageSizeParam' => false]);
        $products = $productsCount->offset($pages->offset)->limit($pages->limit)->all();
        $category = Category::findOne($id);
        $this->setMeta("E Shopper | " . $category->name, $category->keywords, $category->description);
        return $this->render('view', compact('products', 'pages', 'category'));
    }
}