<li class="panel-title panel panel-default">
    <a href="<?= \yii\helpers\Url::to(['/category/view', 'id' => $category['id']]) ?>" class="dcjq-parent">
        <?= $category['name'] ?>
        <?php if (isset($category['childs'])) : ?>
            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
        <?php endif ?>
    </a>
    <?php if (isset($category['childs'])) : ?>
        <ul class="panel-body">
            <?= $this->getMenuHtml($category['childs']) ?>
        </ul>
    <?php endif ?>
</li>
<?php ?>
