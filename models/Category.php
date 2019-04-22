<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 22.04.2019
 * Time: 23:26
 */

namespace app\models;

use yii\db\ActiveRecord;

class Category extends ActiveRecord
{

    public static function tableName()
    {
        return 'category';
    }

    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['category_id' => 'id']);
    }
}