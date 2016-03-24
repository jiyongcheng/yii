<?php

namespace app\models;

use Yii;
use yii\base\Model;

class CustomProductForm extends Model
{
    public $product;
    public $listStyle;
    public $id;


    public function  rules()
    {
        return [
        ];
    }

    public function setProduct($product)
    {
        $this->product = $product;
    }

    public function setListStyle($listStyle)
    {
        $this->listStyle = $listStyle;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getProduct()
    {
        return $this->product;
    }

    public function getListStyle()
    {
        return $this->listStyle;
    }

    public function getId()
    {
        return $this->id;
    }

}

?>