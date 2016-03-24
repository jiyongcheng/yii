<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<!DOCTYPE html>
<html>
<head>
    </head>
<body>

<?php foreach($template as $item):?>
    <a href="<?php echo Url::toRoute(['product/choose','templateId' => $item['id']]); ?>">
        <img src="<?php echo $item['image']?>" />
    </a>
<?php endforeach;?>
</body>
</html>

