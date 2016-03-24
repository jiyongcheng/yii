<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
$this->title = '';
?>
<div class="site-index">
    <div class="body-content">

        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading">
                        <img src=""/>
                        <?php if (Yii::$app->getSession()->get('user_id')) : ?>
                            <span><?php echo Yii::$app->getSession()->get('user_id') ?></span>
                        <?php else:?>
                            <span><?php $url = Html::a('登录', ['user/login']); echo urldecode($url) ?></span>
                        <?php endif;?>
                    </div>
                    <!-- List group -->
                    <ul class="list-group">
                        <li class="list-group-item">我的饭票</li>
                        <li class="list-group-item">我的收藏</li>
                        <li class="list-group-item">扫一扫</li>
                        <li class="list-group-item">我的订单</li>
                        <li class="list-group-item">联系客服</li>
                        <li class="list-group-item">设置</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
