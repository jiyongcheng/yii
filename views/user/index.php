<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
$this->title = '';
?>
<div class="site-index">
    <div class="body-content">

        <div class="row">
            <div class="col-md-2">
                <span><?php $url = Html::a('首页', ['site/index']); echo urldecode($url) ?></span>
            </div>
            <div class="col-md-10" style="text-align: center;">
                <span><?php $url = Html::a('账号登陆', ['user/login']); echo urldecode($url) ?></span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
快速注册
            </div>
            <div class="col-md-2">
                忘记密码
            </div>
        </div>
        <div class="row">
<p>其他登录方式</p>
        </div>
        <div class="row">
            <div class="col-md-2">
qq
            </div>
            <div class="col-md-2">
微信
            </div>
        </div>
    </div>
</div>
