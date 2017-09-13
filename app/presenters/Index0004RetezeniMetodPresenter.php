<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Presenters;

/**
 * Description of Index0004RetezeniMetodPresenter
 *
 * @author Roman Hronza
 */
class Index0004RetezeniMetodPresenter extends BasePresenter{
    private $retezeni;
    public function __construct(\App\Model\Index0004RetezeniMetod $retezeni) {
        parent::__construct();
        $this->retezeni=$retezeni;
    }
    
    public function renderFormular(){
        $this->template->retez = $this->retezeni->addA()->addB()->getStr();
     }
}
