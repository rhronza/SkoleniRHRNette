<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Model;

/**
 * Description of Index0004RetezeniMetod
 *
 * @author Roman Hronza
 */
class Index0004RetezeniMetod {
    private $str;
    function __construct()
    {
        $this->str = "";
    }

    function addA()
    {
        $this->str .= "a";
        return $this;
    }

    function addB()
    {
        $this->str .= "b";
        return $this;
    }

    function getStr()
    {
        return $this->str;
    }
}
