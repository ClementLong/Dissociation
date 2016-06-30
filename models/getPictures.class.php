<?php

namespace Model;

class getPictures {


    function getPictures()
    {
        $directory = '../web/image/uploads/';
        $files = glob($directory . '*.jpg');

        return $files;
    }
}