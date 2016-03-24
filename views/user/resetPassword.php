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
            <?= Html::beginForm(['user/resetPassword'], 'post',[
                'id' => 'login-form',
                'class' => 'form-horizontal'
            ]) ?>

            <div class="form-group required">
                <?= Html::label('旧密码', 'oldPasswordHash',['class'=>'col-lg-1 control-label','for'=>'oldPasswordHash']) ?>
                <div class="col-lg-3">
                    <?= Html::input('text', 'oldPasswordHash','',['class'=>'form-control','id'=>'oldPasswordHash']) ?>
                </div>
            </div>

            <div class="form-group required">
                <?= Html::label('新密码', 'passwordHash',['class'=>'col-lg-1 control-label','for'=>'passwordHash']) ?>
                <div class="col-lg-3">
                    <?= Html::input('text', 'passwordHash','',['class'=>'form-control','id'=>'passwordHash']) ?>
                </div>
            </div>

            <div class="form-group required">
                <?= Html::label('重复新密码', 'repeatPasswordHash',['class'=>'col-lg-1 control-label','for'=>'repeatPasswordHash']) ?>
                <div class="col-lg-3">
                    <?= Html::input('text', 'repeatPasswordHash','',['class'=>'form-control','id'=>'repeatPasswordHash']) ?>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-offset-1 col-lg-11">
                    <?= Html::submitButton('重置密码', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            </div>
            <?= Html::endForm() ?>
                </div>
        </div>
    </div>
</div>
