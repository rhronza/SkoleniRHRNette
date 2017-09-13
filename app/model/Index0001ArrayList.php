<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Model;

/**
 * Description of Index0001ArrayHash
 *
 * @author Roman Hronza
 */

use Nette\Utils\ArrayList;

class Index0001ArrayList
{
    private $arrayList;
    
    public function __construct() 
    {
	$this->arrayList = new ArrayList;
	$this->aplikacniLogika();
    }

    private function aplikacniLogika ()
    {
        $this->arrayList[] = ['Jmeno'=>'Roman'];
        $this->arrayList[] = ['Jmeno'=>'LAdislav'];
        $this->arrayList[] = ['Jmeno'=>'Karel'];
    }

    public  function getArrayList() 
    {
	return $this->arrayList;
    }
    
    
    public function pocetZzn() {
	$pocetzazn = $this->arrayList->count();
	return $pocetzazn;
    }


}
