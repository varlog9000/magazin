<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 22.04.2019
 * Time: 23:36
 */

namespace app\widgets;

use yii\base\Widget;
use app\models\Category;

class MenuWidget extends Widget
{
    public $tpl;
    public $data;
    public $tree;
    public $menuHtml;

    public function init()
    {
        parent::init();
        if ($this->tpl === null) {
            $this->tpl = 'select';
        }
        $this->tpl .= '.php';
    }

    public function run()
    {
        $this->data = Category::find()->indexBy('id')->asArray()->all();
        $this->tree = $this->getTree();
        $this->menuHtml=$this->getMenuHtml($this->tree);
//        debug($this->tree, 'tree');
        return $this->menuHtml;
    }

    protected function getTree()
    {
        $tree = [];
        foreach ($this->data as $id => &$node) {
            if (!$node['parent_id'])
                $tree[$id] = &$node;
            else
                $this->data[$node['parent_id']]['childs'][$node['id']] = &$node;
        }
        return $tree;
    }

    protected function getMenuHtml($tree)
    {
        $str = '';
        foreach ($tree as $category) {
            $str .= $this->catToTemplate($category);
        }
        return $str;
    }

    protected function catToTemplate($category)
    {
        ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }
}