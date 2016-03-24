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
        </div>
        <div class="row">
            <div class="alert-danger">
                <span><?php echo Yii::$app->getSession()->getFlash('error');?></span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= Html::beginForm(['user/login'], 'post',[
                    'id' => 'login-form',
                    'class' => 'form-horizontal'
                ]) ?>

                <div class="form-group required">
                    <?= Html::label('User name', 'username',['class'=>'col-lg-1 control-label','for'=>'username']) ?>
                    <div class="col-lg-3">
                        <?= Html::input('text', 'username','',['class'=>'form-control','id'=>'username']) ?>
                    </div>
                </div>

                <div class="form-group required">
                    <?= Html::label('Password', 'password',['class'=>'col-lg-1 control-label','for'=>'password']) ?>
                    <div class="col-lg-3">
                        <?= Html::passwordInput( 'password','',['class'=>'form-control','id'=>'password']) ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-offset-1 col-lg-11">
                        <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    </div>
                </div>
                <?= Html::endForm() ?>
            </div>
        </div>
        <div class="row" style="margin-top: 50px">
            <div class="col-md-2">
                <?php $url = Html::a('快速注册', ['user/register']); echo urldecode($url) ?>
            </div>
            <div class="col-md-2">
                <?php $url = Html::a('忘记密码', ['user/findpassword']); echo urldecode($url) ?>
            </div>
        </div>
        <div class="row" style="margin-top: 50px">
            <p class="bg-info">其他登录方式</p>
        </div>
        <div class="row">
            <div class="col-md-2">
                <a href="" class="btn btn-primary btn-lg active">QQ</a>
            </div>
            <div class="col-md-2">
                <a href="" class="btn btn-primary btn-lg active">微信</a>
            </div>
        </div>
    </div>
</div>
