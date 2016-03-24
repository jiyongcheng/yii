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
            <?= Html::beginForm(['user/findpassword'], 'post',[
                'id' => 'login-form',
                'class' => 'form-horizontal'
            ]) ?>

            <div class="form-group required">
                <?= Html::label('用户手机', 'account',['class'=>'col-lg-1 control-label','for'=>'account']) ?>
                <div class="col-lg-3">
                    <?= Html::input('text', 'account','',['class'=>'form-control','id'=>'account']) ?>
                </div>
            </div>

            <div class="form-group required">
                <?= Html::label('验证码', 'code',['class'=>'col-lg-1 control-label','for'=>'code']) ?>
                <div class="col-lg-3">
                    <?= Html::input('text', 'code','',['class'=>'form-control','id'=>'code']) ?>
                    <?php echo Html::a('获取验证码', ['user/getcode'],['class'=>'btn btn-default']); ?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-offset-1 col-lg-11">
                    <?= Html::submitButton('取回密码', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            </div>
            <?= Html::endForm() ?>
                </div>
        </div>
    </div>
</div>
