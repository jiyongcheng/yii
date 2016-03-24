<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\AppAsset;
AppAsset::register($this);
use yii\widgets\ActiveForm;
?>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="#">店铺</a></li>
                <li><a href="#">商品</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 sidebar">
            <?= $this->render('_leftnav') ?>
        </div>
        <div class="col-sm-9 main">
            <div class="row">
                <div class="col-md-2">微页面</div>
                <div class="col-md-2">微页面草稿</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-2"><img src="https://img.yzcdn.cn/upload_files/shop2.png?imageView2/2/w/100/h/100/q/75/format/webp"> </div>
                <div class="col-md-2">店铺主页</div>
                <div class="col-md-6">
                    <a href="{{ url('product/shop-edit',{'alias':'product.shop.edit'}) }}">编辑</a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-2">
                    <a href="<?= Url::toRoute(['product/shop-page-template']); ?>">新建微页面</a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-1"><input type="checkbox"></div>
                <div class="col-md-2">标题</div>
                <div class="col-md-3">创建时间</div>
                <div class="col-md-1">商品数</div>
                <div class="col-md-1">序号</div>
                <div class="col-md-4">操作</div>
            </div>
            <?php foreach($pages as $page):?>
            <div class="row">
                <div class="col-md-1"><input type="checkbox"></div>
                <div class="col-md-2"><?= $page['title']?></div>
                <div class="col-md-3"><?= $page['create_time']?></div>
                <div class="col-md-1">0</div>
                <div class="col-md-1">0</div>
                <div class="col-md-4">
                    <a href="<?= Url::toRoute(['product/shop-edit', 'id' => $page['id']]); ?>">编辑</a>
                    <?php if(!$page['is_homepage']):?>
                        <a>删除</a>
                    <?php endif?>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</div>
