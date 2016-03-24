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
                        <span><?php echo $productDetails['clsInfo']['name'] ?></span>
                    </div>
                </div>

                <?php foreach($productDetails['proPicUrl'] as $img) :?>
                    <?php $image['name']=$img['remark'];?>
                    <?php $image['img']=$img['filE_PATH'];?>
                    <?php $images[] = $image;?>
                <?php endforeach;?>
                <?php echo $this->render('_slide', ['items' => $images,'carouselId'=>'product_details']); ?>
                <br/>
                <br/>
                <div class="row">
                    <div class="col-md-12">
                        <?php if(isset($productDetails['clsInfo']['collocationShoppingEndTime']) && $productDetails['clsInfo']['collocationShoppingEndTime']):?>
                        <?php
                            $diff = strtotime($productDetails['clsInfo']['collocationShoppingEndTime'])-time();
                            $hour     = date('h',$diff);
                            $min      = date('i',$diff);
                            $sec      = date('s',$diff);
                            echo '距离搭配购结束还有'.$hour.'小时'.$min.'分'.$sec.'秒';
                            ?>
                        <?php endif;?>

                    </div>
                </div>
                <br/>
                <br/>
                <div class="row">
                    <div class="col-md-10">
                        <span><?php echo $productDetails['clsInfo']['showName'] ?></span>
                    </div>
                    <div class="col-md-2">
                        <?php if(isset($productDetails['clsInfo']['collocationShoppingEndTime']) && $productDetails['clsInfo']['collocationShoppingEndTime']):?>
                            <img src="<?php echo $productDetails['clsInfo']['collocationShoppingIcon'] ?>" style="height: 20px; width:20px"/>
                        <?php endif;?>

                    </div>
                </div>
                <br/>
                <br/>
                <div class="row">
                    <div class="col-md-2">
                        <span><?php echo '¥'.number_format($productDetails['clsInfo']['sale_price'],0) ?></span>
                    </div>
                    <div class="col-md-2">
                        <span><?php echo number_format($productDetails['clsInfo']['marketPrice'],0) ?></span>
                    </div>
                </div>

<!--                <div class="row">-->
<!--                    <div class="col-md-2">-->
<!--                        <span>月销售量--><?php //echo $productDetails['commonCountTotal']['saleQty'] ?><!--件</span>-->
<!--                    </div>-->
<!--                    <div class="col-md-2">-->
<!--                        <span>好评度--><?php //echo $productDetails['commonCountTotal']['percent'] ?><!--</span>-->
<!--                    </div>-->
<!--                    <div class="col-md-2">-->
<!--                        <span>搜藏--><?php //echo $productDetails['commonCountTotal']['favoritCount'] ?><!--</span>-->
<!--                    </div>-->
<!--                </div>-->

                <br/>
                <br/>
                <?php foreach($productDetails['activity'] as $activity):?>
                    <div class="row">
                        <?php if($activity['type'] == '-1'):?>
                            <div class="col-md-6">
                                <span><img src="<?php echo $activity['url']?>"></span>
                                <span><?php echo $activity['name']?></span>
                            </div>
                        <?php endif;?>
                        <?php if($activity['type'] == '2'):?>
                            <div class="col-md-6">
                                <span><img src="<?php echo $activity['tag_img']?>"></span>
                                <span><?php echo $activity['name']?></span>
                            </div>
                        <?php endif;?>
                        <?php if($activity['type'] == '1'):?>
                            <div class="col-md-6">
                                <span><img src="<?php echo $activity['tag_img']?>"></span>
                                <span><?php echo $activity['name']?></span>
                            </div>
                        <?php endif;?>
                    </div>
                <?php endforeach;?>



                <br/>
                <br/>

                <div class="row">
                    <div class="col-md-2">
                        <span>7天无理由</span>
                    </div>
                    <div class="col-md-2">
                        <span>正品保证</span>
                    </div>

                    <div class="col-md-2">
                        <span>搭配折上折</span>
                    </div>
                    <?php if($productDetails['brandDispatchGoods']) :?>
                        <div class="col-md-2">
                            <span>商家发货</span>
                        </div>
                    <?php else:?>
                        <div class="col-md-2">
                            <span>有范发货</span>
                        </div>
                    <?php endif;?>

                </div>

                <br/>
                <br/>

                <div class="row">
                    <div class="col-md-2">
                        <span><img src="<?php echo $productDetails['clsInfo']['brandUrl']?>" height="20px" width="100px"></span>
                    </div>
                    <div class="col-md-2">
                        <span><?php echo $productDetails['clsInfo']['brand'] ?></span>
                    </div>
                    <div class="col-md-6">

                    </div>
                    <div class="col-md-2">
                        <a href="<?php echo Url::toRoute(['brand/index', 'brandCode' => 'addias']); ?>" title="">
                            进入品牌
                        </a>
                    </div>
                </div>

                <br/>
<!--                <div class="row">-->
<!--                    <div class="col-md-2">-->
<!--                        <span>尺码参数</span>-->
<!--                    </div>-->
<!---->
<!--                </div>-->
<!--                <div class="row">-->
<!--                    <div class="col-md-12">-->
<!--                        <table class="table table-striped">-->
<!--                            <thead>-->
<!--                            <tr>-->
<!--                                <th>基本型号</th>-->
<!--                                <th>尺寸</th>-->
<!--                            </tr>-->
<!--                            </thead>-->
<!--                            <tbody>-->
<!--                            --><?php //foreach($productDetails['specList'] as $sepc):?>
<!--                                <tr>-->
<!--                                    <td>--><?php //echo $sepc['name']?><!--</td>-->
<!--                                    <td>--><?php //echo $sepc['code']?><!--</td>-->
<!--                                </tr>-->
<!--                            --><?php //endforeach;?>
<!--                            </tbody>-->
<!--                        </table>-->
<!--                    </div>-->
<!--                </div>-->

<!--                <div class="row">-->
<!--                    评价(--><?php //echo $productDetails['commonCountTotal']['commentCount']?><!--)-->
<!--                </div>-->
                <br/>
                <br/>
                <br/>
<!--                商品详情-->
<!--                <div class="row">-->
<!--                    <div class="col-md-12">-->
<!---->
<!--                        编辑推荐-->
<!--                    </div>-->
<!--                </div>-->
<!---->
<!--                <div class="row">-->
<!--                    <div class="col-md-12">-->
<!---->
<!--                        <p>--><?php //echo $productDetails['clsInfo']['description'] ?><!--</p>-->
<!--                    </div>-->
<!--                </div>-->

<!--                <div class="row">-->
<!--                    <div class="col-md-12">-->
<!---->
<!--                        商品信息-->
<!--                    </div>-->
<!--                </div>-->
<!---->
<!--                <div class="row">-->
<!--                    <div class="col-md-12">-->
<!---->
<!--                        <span>品牌：--><?php //echo $productDetails['clsInfo']['brand'] ?><!--</span>-->
<!--                        <span>款名：--><?php //echo $productDetails['clsInfo']['name'] ?><!--</span>-->
<!--                        <span>款号：--><?php //echo $productDetails['clsInfo']['code'] ?><!--</span>-->
<!--                    </div>-->
<!--                </div>-->

                <?php foreach($productDetails['clsPicUrl'] as $picture):?>
                <div class="row">
                    <div class="col-md-12">
                        <img src="<?php echo $picture['filE_PATH']?>" height="auto" width="80%"/>
                    </div>
                </div>
                <?php endforeach;?>



                <?php foreach($productDetails['addPicUrl'] as $pa):?>
                    <div class="row">
                        <div class="col-md-12">
                            <img src="<?php echo $pa['image_url']?>" height="auto" width="80%"/>
                        </div>
                    </div>
                    <?php if($pa['type'] == 2):?>
                        <div class="row">
                            <div class="col-md-12">
                                <?php echo $productDetails['sizeTable'];?>
                            </div>
                        </div>
                    <?php endif;?>
                <?php endforeach;?>


                <br/>
                相关推荐
            </div>
            <div class="col-md-1">

            </div>
        </div>

    </div>
</div>

<script type="text/javascript">
</script>
