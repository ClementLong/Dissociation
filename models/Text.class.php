<?php

namespace Model;

class Text
{
    public $language;

    function __construct($language)
    {
        if($language[0] == "f" && $language[1] == "r")
            $this->language = 'FR';
        else
            $this->language = 'EN';
    }

    function getText()
    {
        $UI = json_decode(file_get_contents(__DIR__ . '/../editor/UI.json'), -1);
        return $UI[$this->language];
    }
}