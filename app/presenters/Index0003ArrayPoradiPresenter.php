<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Presenters;

/**
 * Description of Index0002ArrayPoradi
 *
 * @author Roman Hronza
 */
class Index0003ArrayPoradiPresenter extends BasePresenter{
    private $pole;
    public function __construct(\App\Model\Index0003ArrayPoradi $pole) 
    {
	parent::__construct();
	$this->pole=$pole;
    }
    
    public function renderFormular() {
	$aaa=$this->pole->get_pole1();
	$this->template->pole= $aaa;
//	var_dump($aaa);
//	die();
    }
}
