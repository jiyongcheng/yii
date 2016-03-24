<?php

namespace app\models;

use Yii;
use yii\base\Model;

class CustomShopHeaderForm extends Model
{
    public $title;
    public $description;
    public $category;
    public $backgroundColor;
    public $id;

    public function  rules()
    {
        return [
            [['title'],'required']
        ];
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function setBackgroundColor($backgroundColor)
    {
        $this->backgroundColor = $backgroundColor;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function getBackgroundColor()
    {
        return $this->backgroundColor;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId($id)
    {
        return $this->id;
    }
}

?>