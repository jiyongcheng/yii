<?php

/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Url;
?>
<ul class="nav nav-sidebar">
    <li>
        <a href="<?= Url::toRoute('product/page')?>" title="">
            微页面／杂志
        </a>
    <li><a href="<?= Url::toRoute('product/pagecategory')?>">微页面分类</a></li>
    <li><a href="<?= Url::toRoute('product/member')?>">会员主页</a></li>
    <li><a href="<?= Url::toRoute('product/shop')?>">店铺导航</a></li>
</ul>