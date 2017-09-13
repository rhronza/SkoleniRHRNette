<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Model;

/**
 * Description of Index0002VolaniHodnotouReferenci
 *
 * @author Roman Hronza
 */
class Index0002VolaniHodnotouReferenci {
    private $pozdrav="Ahoj";
    
    public  function getPozdrav() 
    {
	return $this->pozdrav;
    }

    public  function setPozdrav($pozdrav) 
    {
	$this->pozdrav = $pozdrav;
    }
}
