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
            <ul>
                <?php foreach($templates as $template):?>
                    <li>
                       <a href="<?= Url::toRoute(['product/shop-page-new', 'template_id' => $template['id']]);?>"><?= $template['name']?></a>
                    </li>
                <?php endforeach;?>
            </ul>

        </div>
    </div>
</div>