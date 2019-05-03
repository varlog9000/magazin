<?php
/**
 * Created by PhpStorm.
 * User: Yana
 * Date: 27.04.2019
 * Time: 23:00
 */

namespace app\controllers;


use yii\web\Controller;

class AppController extends Controller
{
    protected function setMeta($title = null, $keywords = null, $description = null)
    {
        $this->view->title = $title;
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => "$keywords"]);
        $this->view->registerMetaTag(['description' => 'keywords', 'content' => "$description"]);
    }
}