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
                <div class="col-md-4">
                    <h1><span>店铺主页</span></h1>
                </div>
                <div class="col-md-8">
                    <?php $form = ActiveForm::begin(['id'=>'shop-edit-from']) ?>

                    <?php foreach($models as $pluginName=>$model):?>
                        <?php if($pluginName == 'CustomShopHeader'):?>
                            <?= $form->field($model,'title')->label('页面名称')->textInput(array('placeholder'=>'店铺主页')) ?>
                            <?= $form->field($model,'description')->label('页面描述')->textInput(array('placeholder'=>'用户通过微信分享给朋友时，会自动显示页面描述')) ?>
                            <?= $form->field($model,'category')->label('分类')->dropDownList($category,array('prompt'=>'select category'))?>
                            <?= $form->field($model,'backgroundColor')->label('背景颜色')->textInput(array('type'=>'color'))->hint('背景颜色只在手机端显示。')?>
                            <?= $form->field($model,'id')->hiddenInput()->label('')?>
                        <?php elseif($pluginName == 'CustomRichText'):?>
                            <?= $form->field($model,'backgroundColor')->label('背景颜色')->textInput(array('type'=>'color'))?>
                            <?= $form->field($model,'fullScreen')->checkbox([],false)->label('全屏显示')->label('是否全屏') ?>
                            <?= $form->field($model,'content')->label('内容')->textarea(['rows'=>3]) ?>
                            <?= $form->field($model,'id')->hiddenInput()->label('')?>
                        <?php elseif($pluginName == 'CustomProduct'):?>
                            <?= $form->field($model,'product')->label('选择商品')->dropDownList($products,array('prompt'=>'选择商品'))?>
                            <?= $form->field($model,'listStyle')->checkbox([],false)->label('全屏显示')->label('列表样式') ?>
                            <?= $form->field($model,'id')->hiddenInput()->label('')?>
                        <?php endif?>
                    <?php endforeach;?>
                    <?= Html::submitButton('Submit', ['class'=> 'btn btn-primary']); ?>
                    <?php ActiveForm::end() ?>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>