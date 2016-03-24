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
                    <div class="col-md-2"><span><?php $url = Html::a('侧边栏', ['side/index']); echo urldecode($url) ?></span></div>
                    <div class="col-md-8" style="text-align: center;">有范</div>
                    <div class="col-md-2"><span>购物袋</span></div>
                </div>
                <?php echo $this->render('_seperate'); ?>
                <?php foreach($configList as $item): ?>
                    <?php $type = $item['type'];?>
                    <?php //echo $type;?>
                    <!-- 发现5个图标-->
                    <?php if($type == 7): ?>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <?php foreach($tops as $top): ?>
                                <div class="col-md-2">
                                    <img src="<?php echo $top['img']?>" />
                                    <p><?php echo $top['name']?></p>
                                </div>
                            <?php endforeach;?>
                            <div class="col-md-1"></div>
                        </div>
                        <?php echo $this->render('_seperate'); ?>
                        <!--长条广告1-->
                    <?php elseif($type ==8):?>
                        <?php foreach($item['config'] as $v) :?>
                            <div class="row">
                                <div class="col-md-12">
                                    <img src="<?php echo $v['img']?>" />
                                </div>
                            </div>
                            <?php echo $this->render('_seperate'); ?>
                        <?php endforeach;?>
                        <!--首页滚动-->
                    <?php elseif($type ==9):?>
                        <?php echo $this->render('_slide', ['items' => $item['config'],'carouselId'=>$type]); ?>
                        <?php echo $this->render('_seperate'); ?>
                        <!--小块banner模块-->
                    <?php elseif($type ==16):?>
                        <div class="row">
                            <div class="col-md-2"><span><?php echo $item['name']?></span></div>
                            <div class="col-md-8"></div>
                            <div class="col-md-2"><span><?php echo $item['title']?></span></div>
                        </div>
                        <?php echo $this->render('_slide', ['items' => $item['config'],'carouselId'=>$type]); ?>
                        <?php echo $this->render('_seperate'); ?>
                        <!--大块滚动banner模块-->
                    <?php elseif($type ==17):?>
                        <div class="row">
                            <div class="col-md-3"><span><?php echo $item['name']?></span></div>
                            <div class="col-md-7"></div>
                            <div class="col-md-2"><span><?php echo $item['title']?></span></div>
                        </div>
                        <?php echo $this->render('_slide', ['items' => $item['config'],'carouselId'=>$type]); ?>

                        <?php echo $this->render('_seperate'); ?>
                        <!--运动品牌-->
                    <?php elseif($type ==201):?>
                        <div class="row">
                            <div class="col-md-2"><span><?php echo $item['name']?></span></div>
                            <div class="col-md-8"></div>
                            <div class="col-md-2"><span><?php echo '更多'?></span></div>
                        </div>
                        <?php echo $this->render('_slide', ['items' => $item['banner_list'],'carouselId'=>$type]); ?>
                        <?php $products = $item['config'][0]['config'];?>
                        <div class="row">
                            <div class="col-md-6">
                                <p><?php echo $products[0]['name']?></p>
                                <p><?php echo $products[0]['info']?></p>
                                <img src="<?php echo $products[0]['big_img']?>"/>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><?php echo $products[1]['name']?></p>
                                        <p><?php echo $products[1]['info']?></p>
                                        <a href="<?php Url::toRoute(['brand/index', 'brandCode' => 'addias']); ?>" title="">
                                            <img src="<?php echo $products[1]['big_img']?>"/>
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo $products[2]['name']?></p>
                                        <p><?php echo $products[2]['info']?></p>
                                        <img src="<?php echo $products[2]['big_img']?>"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><?php echo $products[3]['name']?></p>
                                        <p><?php echo $products[3]['info']?></p>
                                        <img src="<?php echo $products[3]['big_img']?>"/>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo $products[4]['name']?></p>
                                        <p><?php echo $products[4]['info']?></p>
                                        <img src="<?php echo $products[4]['big_img']?>"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo $this->render('_seperate'); ?>
                        <!--淑女系列-->
                    <?php elseif($type ==202):?>
                        <?php echo $this->render('_slide', ['items' => $item['banner_list'],'carouselId'=>$type]); ?>
                        <?php $products = $item['config'][0]['config'];?>
                        <div class="row">
                            <div class="col-md-6">
                                <p><?php echo $products[0]['name']?></p>
                                <p><?php echo $products[0]['info']?></p>
                                <img src="<?php echo $products[0]['small_img']?>"/>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><?php echo $products[1]['name']?></p>
                                        <p><?php echo $products[1]['info']?></p>
                                        <img src="<?php echo $products[1]['small_img']?>"/>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo $products[2]['name']?></p>
                                        <p><?php echo $products[2]['info']?></p>
                                        <img src="<?php echo $products[2]['small_img']?>"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><?php echo $products[3]['name']?></p>
                                        <p><?php echo $products[3]['info']?></p>
                                        <img src="<?php echo $products[3]['small_img']?>"/>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo $products[4]['name']?></p>
                                        <p><?php echo $products[4]['info']?></p>
                                        <img src="<?php echo $products[4]['small_img']?>"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo $this->render('_seperate'); ?>
                        <!--时尚潮牌-->
                    <?php elseif($type ==4):?>
                        <?php echo $this->render('_slide', ['items' => $item['banner_list'],'carouselId'=>$type]); ?>
                        <?php echo $this->render('_seperate'); ?>
                    <?php endif;?>

                <?php endforeach;?>
            </div>
            <div class="col-md-1">

            </div>
        </div>

    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){

        console.info('ready');
        $.ajax({
            type: "get",
            url: "http://10.100.28.205/mbfun_server_new/index.php?getAppLayoutInfoV2",
            data: {'m':'Home','a':'getAppLayoutInfoV2','id':'1','cid':'0','deviceCode':'4444444'}
            beforeSend: function(XMLHttpRequest){
                //ShowLoading();
            },
            success: function(data, textStatus){
                console.info(data);
//            $(".ajax.ajaxResult").html("");
//            $("item",data).each(function(i, domEle){
//                $(".ajax.ajaxResult").append("<li>"+$(domEle).children("title").text()+"</li>");
//            });
            },
            complete: function(XMLHttpRequest, textStatus){
                //HideLoading();
            },
            error: function(){
                //请求出错处理
            }
        });
    });

</script>
