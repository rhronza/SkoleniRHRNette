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

use Nette\Utils\ArrayHash;

class Index0001ArrayHash 
{
    private $hash;

    public function __construct() 
    {
        $this->hash = new ArrayHash;
	$this->aplikacniLogika();
    }

    private function aplikacniLogika ()
    {
        $this->hash['foo'] = 123;
        $this->hash->bar = 456; // zároveň funguje i objektový zápis
        $this->hash['login']=['user'=>'roman', 'passw'=>'hronza'];
	/*
        echo '<br/>'.$this->hash->foo; // 123    
        echo '<br/>'.('hash:'.$this->hash['foo']); // hash:123
        echo '<br/>'.('hash:'.$this->hash['bar']); // hash:456
	echo '<br/>'.('hash:'.$this->hash->login['user']); // hash:roman 
	echo '<br/>---------------<br/>';
	echo "počet před:".$this->pocetZzn()."<br/>";
	var_dump($this->hash);
	echo '<br/>---------------<br/>';
	 * 
	 */
    }

    public function getArrayHash() {
        return $this->hash;
    }
    
    public function pocetZzn() {
	$pocetzazn = $this->hash->count();
	return $pocetzazn;
    }


}
