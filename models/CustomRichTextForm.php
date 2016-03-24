<?php

namespace app\models;

use Yii;
use yii\base\Model;

class CustomRichTextForm extends Model
{
    public $backgroundColor;
    public $fullScreen;
    public $content;
    public $id;


    public function  rules()
    {
        return [
        ];
    }

    public function setFullScreen($fullScreen)
    {
        $this->fullScreen = $fullScreen;
    }

    public function setBackgroundColor($backgroundColor)
    {
        $this->backgroundColor = $backgroundColor;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getFullScreen()
    {
        return $this->fullScreen;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getBackgroundColor()
    {
        return $this->backgroundColor;
    }

    public function getId()
    {
        return $this->id;
    }

}

?>