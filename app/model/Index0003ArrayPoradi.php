<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Model;

/**
 * Description of Index0002ArrayPoradi
 *
 * @author Roman Hronza
 */
class Index0003ArrayPoradi {
    private $pole1=array(1,34);

    private function pridatDoPole() {
	$this->pole1[]=45;
    }
    
    public  function get_pole1() {
	$this->pridatDoPole();
	return $this->pole1;
    }


   
}
