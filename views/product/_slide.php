<div id="carousel-<?php echo $carouselId?>" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <?php foreach($items as $k=>$v) :?>
            <li data-target="#carousel-example-generic" data-slide-to="<?php echo $k?>" class="<?php if($k == 0) { echo 'active';}?>"></li>
        <?php endforeach;?>
    </ol>

    <?php if(!isset($nameKey)) { $nameKey='name';}?>
    <?php if(!isset($imgKey)) { $imgKey='img';}?>
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <?php foreach($items as $k=>$v) :?>
            <div class="item <?php if($k == 0) { echo 'active';}?>">
                <img src="<?php echo $v[$imgKey]?>" alt="<?php echo $v[$nameKey]?>">
                <div class="carousel-caption">
                </div>
            </div>
        <?php endforeach;?>
    </div>
    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-<?php echo $carouselId?>" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-<?php echo $carouselId?>" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>