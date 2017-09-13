<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Presenters;

/**
 * Description of ArrayHash
 *
 * @author Roman Hronza
 */


class Index0001ArrayHashListPresenter extends BasePresenter{
    private $arrayHash;
    private $arrayList;
    
    
    public function __construct(\App\Model\Index0001ArrayHash $hash) 
    {
        $this->arrayHash=$hash;
	//druhá injekce - ještě pročíst jak se dělaá !!
	//$this->SetDepInjectArrayList($arrayList);
    }
    
    // vytvoření druhé DI, která funguje !!
    public function injectIndex0001ArrayList( \App\Model\Index0001ArrayList $arrayList) 
    {
	$this->arrayList=$arrayList;
    }
    
    public function renderFormular2() 
    {
	$aa=$this->arrayHash->getArrayHash();
	$bb=$this->arrayList->getArrayList();;
	
	$this->template->poleArray= $this->arrayHash->getArrayHash();
	$this->template->poleList= $this->arrayList->getArrayList();
		
	
	//$this->hash222->rhr='roman';
	//echo "počet po:".$this->hash222->pocetZzn()."<br/>";
	//echo "<br/>hash:<br/>";
        //var_dump($hash);
	
        //echo("<br/>".$this->hash222->bar);
	//die;
    }
     
}

