<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 22.04.2019
 * Time: 23:26
 */

namespace app\models;

use yii\db\ActiveRecord;

class Product extends ActiveRecord
{

    public static function tableName()
    {
        return 'category';
    }

    public function getCategory()
    {
        return $this->hasOne(Product::className(), ['id' => 'category_id' ]);
    }
}