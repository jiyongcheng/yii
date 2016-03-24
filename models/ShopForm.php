<?php

namespace app\models;

use Yii;
use yii\base\Model;

class ShopForm extends Model
{
    public $title;
    public $description;
    public $category;
    public $backgroundColor;


    public function  rules()
    {
        return [
            [['title'],'required']
        ];
    }
}

?>