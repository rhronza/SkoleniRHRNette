<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Presenters;

/**
 * Description of Index0002VolaniHodnotouReferenci
 *
 * @author Roman Hronza
 */
class Index0002VolaniHodnotouReferenciPresenter extends BasePresenter{
    private $clovek1;
    private $clovek2;
    
    public function __construct( \App\Model\Index0002VolaniHodnotouReferenci $clovek) {
	$this->clovek1=$clovek;
	//$this->clovek2=$clovek;
    }
    
    public function renderPozdravuj() {
	//echo'<br/>';
	//echo 'Clovek1:'.$this->clovek1->getPozdrav();
	//echo'<br/>';
	$this->clovek2= $this->clovek1; // obě instance změní pozdravy na Dobrý den
	$this->clovek1->setPozdrav("Dobrý den");
	//echo 'Clovek1 po zněně:'.$this->clovek1->getPozdrav();
	//echo'<br/>';
	//echo 'Clovek2'.$this->clovek2->getPozdrav();
	$this->zmenaPozdravu($this->clovek1); // obě instance změní pozdravy na: ČágoBeloŠílenci
	//echo'<br/>';
	//echo'<br/>Změna voláním metody';
	//echo 'Clovek1 po zněně:'.$this->clovek1->getPozdrav();
	//echo'<br/>';
	//echo 'Clovek2'.$this->clovek2->getPozdrav();

	//die;
	$this->template->pozdrav1= $this->clovek1->getPozdrav();
	$this->template->pozdrav2= $this->clovek2->getPozdrav();
	
								
    }
    
    public function zmenaPozdravu(\App\Model\Index0002VolaniHodnotouReferenci $clovek55) {
		$clovek55->setPozdrav("ČágoBeloŠílenci");
    }
    
}
