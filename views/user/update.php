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
            <?= Html::beginForm(['user/update'], 'post',[
                'id' => 'register-form',
                'class' => 'form-horizontal'
            ]) ?>


            <div class="form-group required">
                <?= Html::label('昵称', 'nickname',['class'=>'col-lg-1 control-label','for'=>'nickname']) ?>
                <div class="col-lg-3">
                    <?= Html::input('text', 'nickname','',['class'=>'form-control','id'=>'nickname']) ?>
                </div>
            </div>

            <div class="form-group required">
                <?= Html::label('用户签名', 'signature',['class'=>'col-lg-1 control-label','for'=>'signature']) ?>
                <div class="col-lg-3">
                    <?= Html::input('text', 'signature','',['class'=>'form-control','id'=>'signature']) ?>
                </div>
            </div>

            <div class="form-group required">
                <?= Html::label('头像', 'head_portrait',['class'=>'col-lg-1 control-label','for'=>'head_portrait']) ?>
                <div class="col-lg-3">
                    <?= Html::input('text', 'head_portrait','',['class'=>'form-control','id'=>'head_portrait']) ?>
                </div>
            </div>
            <div class="form-group required">
                <?= Html::label('生日', 'birthday',['class'=>'col-lg-1 control-label','for'=>'birthday']) ?>
                <div class="col-lg-3">
                    <?= Html::input('text', 'birthday','',['class'=>'form-control','id'=>'birthday']) ?>
                </div>
            </div>

            <div class="form-group required">
                <?= Html::label('性别', 'gender',['class'=>'col-lg-1 control-label','for'=>'gender']) ?>
                <div class="col-lg-3">
                    <?= Html::input('text', 'gender','',['class'=>'form-control','id'=>'gender']) ?>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-offset-1 col-lg-11">
                    <?= Html::submitButton('更新用户', ['class' => 'btn btn-primary', 'name' => 'register-button']) ?>
                </div>
            </div>
            <?= Html::endForm() ?>
                </div>
        </div>
    </div>
</div>
