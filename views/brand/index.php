<?php

/* @var $this yii\web\View */

$this->title = '';
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="site-index">
    <div class="body-content">
        <div class="row">
            <div class="alert-danger">
                <span><?php echo Yii::$app->getSession()->getFlash('error');?></span>
            </div>
            <div class="alert-success">
                <span><?php echo Yii::$app->getSession()->getFlash('success');?></span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1">

            </div>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-2">
                        <span><?php $url = Html::a('首页', ['site/index']); echo urldecode($url) ?></span>
                    </div>
                    <div class="col-md-10" style="text-align: center;">
                        <span><?php echo $data['ename'] ?></span>
                    </div>
                </div>
                <?php echo $this->render('_seperate'); ?>

                <img src="<?php echo $data['item_img']['img']?>" height="<?php echo $data['item_img']['height']?>" width="<?php echo $data['item_img']['width']?>"/>

                <div class="row">
                    <div class="col-md-2">
                        <img src="<?php echo $data['logo_img']?>" height="50px" width="150px"/>

                    </div>
                    <div class="col-md-4">

                        <?php echo $data['ename'].'品牌馆' ?>
                        <p>已有<?php echo $data['love_count'] ?>人搜藏</p>
                    </div>
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-2">

                        <?php if(isset($data['is_love']) && $data['is_love']):?>
                            已搜藏
                        <?php else:?>
                            <a href="<?php echo Url::toRoute(['brand/index', 'brandCode' => 'addias']); ?>" title="">
                                搜藏
                            </a>
                        <?php endif;?>

                    </div>
                </div>


                <?php for($i=0;$i<count($products);$i++):?>
                    <?php $p1 = $products[$i]; $p2 = $products[$i+1];$i++;?>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="<?php echo Url::toRoute(['product/detail', 'IDS' => $p1['clsInfo']['code']]); ?>" title="">
                                <img src="<?php echo $p1['clsInfo']['mainImage']?>" width="50%" height="200px"/>
                            </a>
                            <p><?php echo $p1['clsInfo']['brand']?></p>
                            <p><?php echo $p1['clsInfo']['name']?></p>
                            <p><?php echo $p1['clsInfo']['sale_price']?></p>
                            <?php if(isset($p1['prodClsTag']['tagUrl'])):?>
                                <p><img src="<?php echo $p1['prodClsTag']['tagUrl']?>" width="50%" height="20px"/></p>
                            <?php endif?>
                        </div>
                        <div class="col-md-6">
                            <a href="<?php echo Url::toRoute(['product/detail', 'IDS' => $p2['clsInfo']['code']]); ?>" title="">
                                <img src="<?php echo $p2['clsInfo']['mainImage']?>" width="50%" height="200px"/>
                            </a>
                            <p><?php echo $p2['clsInfo']['brand']?></p>
                            <p><?php echo $p2['clsInfo']['name']?></p>
                            <p><?php echo $p2['clsInfo']['sale_price']?></p>
                            <?php if(isset($p2['prodClsTag']['tagUrl'])):?>
                                <p><img src="<?php echo $p2['prodClsTag']['tagUrl']?>" width="50%" height="20px"/></p>
                            <?php endif?>
                        </div>
                    </div>
                <?php endfor;?>
            </div>
            <div class="col-md-1">

            </div>
        </div>

    </div>
</div>

<script type="text/javascript">
</script>
