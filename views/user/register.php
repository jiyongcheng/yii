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
            <?= Html::beginForm(['user/register'], 'post',[
                'id' => 'register-form',
                'class' => 'form-horizontal'
            ]) ?>

            <div class="form-group required">
                <?= Html::label('手机号码', 'mobile',['class'=>'col-lg-1 control-label','for'=>'mobile']) ?>
                <div class="col-lg-3">
                    <?= Html::input('text', 'mobile','',['class'=>'form-control','id'=>'mobile']) ?>
                </div>
            </div>
            <div class="form-group required">
                <?= Html::label('昵称', 'nickname',['class'=>'col-lg-1 control-label','for'=>'nickname']) ?>
                <div class="col-lg-3">
                    <?= Html::input('text', 'nickname','',['class'=>'form-control','id'=>'nickname']) ?>
                </div>
            </div>
            <div class="form-group required">
                <?= Html::label('设置密码', 'password',['class'=>'col-lg-1 control-label','for'=>'password']) ?>
                <div class="col-lg-3">
                    <?= Html::passwordInput( 'password','',['class'=>'form-control','id'=>'password']) ?>
                </div>
            </div>
            <div class="form-group required">
                <?= Html::label('验证码', 'code',['class'=>'col-lg-1 control-label','for'=>'code']) ?>
                <div class="col-lg-3">
                    <?= Html::input('text', 'code','',['class'=>'form-control','id'=>'code']) ?>
                    <?php echo Html::button('获取验证码', ['class'=>'btn btn-default','id'=>'getcode']); ?>
                </div>
            </div>
            <div class="form-group required">
                <?= Html::label('好友邀请码', 'invite_code',['class'=>'col-lg-1 control-label','for'=>'invite_code']) ?>
                <div class="col-lg-3">
                    <?= Html::input('text', 'invite_code','',['class'=>'form-control','id'=>'invite_code']) ?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-offset-1 col-lg-11">
                    <?= Html::submitButton('注册', ['class' => 'btn btn-primary', 'name' => 'register-button']) ?>
                </div>
            </div>
            <?= Html::endForm() ?>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){

        $('#getcode').click(function(){
            var account = $('#mobile').val();
            console.info('get code' + account);
            $.ajax({
                type: "post",
                url: "http://10.100.28.2/mbfun_server_new/index.php?m=User&a=getcode",
                data: {'account':account,'from':'1'},
                success: function(data, textStatus){
                    console.info(textStatus);
                    console.info(data);
//            $(".ajax.ajaxResult").html("");
//            $("item",data).each(function(i, domEle){
//                $(".ajax.ajaxResult").append("<li>"+$(domEle).children("title").text()+"</li>");
//            });
                },
                error: function(){
                    //请求出错处理
                }
            });
        });

    });

</script>