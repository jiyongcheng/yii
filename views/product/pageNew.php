<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>


<?= $this->render('_topnav') ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 sidebar">
            <?= $this->render('_leftnav') ?>
        </div>
        <div class="col-sm-9 main">
                <?php foreach($pluginData as $item):?>

                    <div class="row">
                        <div class="col-md-2">
                            <?= $item['pluginId']?>
                        </div>
                        <div class="col-md-2">
                            <?= $item['pluginName']?>
                        </div>
                        <div class="col-md-2">
                            <?php print_r($item['attr'])?>
                        </div>
                    </div>
                <?php endforeach;?>

            <div class="row">
                <div class="col-md-12">
                    <?php $form = ActiveForm::begin(['id'=>'shop-page-new-from']) ?>

                    <?= $form->field($model,'title')->label('页面名称')->textInput(array('placeholder'=>'店铺主页')) ?>
                    <?= $form->field($model,'description')->label('页面描述')->textInput(array('placeholder'=>'用户通过微信分享给朋友时，会自动显示页面描述')) ?>
                    <?= $form->field($model,'category')->label('分类')->dropDownList($category,array('prompt'=>'select category'))?>
                    <?= $form->field($model,'backgroundColor')->label('背景颜色')->textInput(array('type'=>'color','value'=>'#f9f9f9'))->hint('背景颜色只在手机端显示。')?>

                    <?= Html::submitButton('Submit', ['class'=> 'btn btn-primary']); ?>
                    <?php ActiveForm::end() ?>
                </div>
            </div>

        </div>
    </div>
</div>