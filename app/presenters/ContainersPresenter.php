<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Presenters;

use Nette\Forms\Form;
use Tracy\Debugger;
use Tracy\Dumper;

/**
 * Description of ContainersPresenter
 *
 * @author Roman Hronza
 */
class ContainersPresenter extends \Nette\Application\UI\Presenter {
    
    protected function createComponentContainers($name) 
    {
        $form = new Form;

        // group First person
        $form->addGroup('First person');

        $first = $form->addContainer('first');
        $first->addText('name', 'Your name:');
        $first->addText('email', 'Email:');
        $first->addText('street', 'Street:');
        $first->addText('city', 'City:');

        // group Second person
        $form->addGroup('Second person');

        $second = $form->addContainer('second');
        $second->addText('name', 'Your name:');
        $second->addText('email', 'Email:');
        $second->addText('street', 'Street:');
        $second->addText('city', 'City:');

        // group for button
        $form->addGroup();

        $form->addSubmit('submit', 'Send');


        if ($form->isSuccess()) {
                echo '<h2>Form was submitted and successfully validated</h2>';
                Dumper::dump($form->getValues());
                exit;
        }
        return $form;
        
    }
    
}
