<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Presenters;

use Nette;
//use Nette\Forms\Form;

use Nette\Application\UI\Form;

use Nette\Utils\Html;
use Tracy\Debugger;
use Tracy\Dumper;


/**
 * Description of BasicexamplePresenter
 *
 * @author Roman Hronza
 */
class BasicexamplePresenter extends \Nette\Application\UI\Presenter
{
    public function renderFormular()
    {} /*prázný render - fungovalo by i bez něj*/
    protected function createComponentBasicExample() 
    {       
        $form = new Form;    
        // group Personal data ***********************************************
        $form->addGroup('Osobní data')
                ->setOption('description', 'RHR:We value your privacy and we ensure that the information you give to us will not be shared to other entities.');
        $form->addText('name', 'Vaše jméno:')
                ->setRequired('Zadejte své jméno');
        $form->addText('age', 'Your age:')
                ->setRequired('Enter your age')
                ->addRule($form::INTEGER, 'Age must be numeric value')
                ->addRule($form::RANGE, 'Age must be in range from %d to %d', [10, 100]);
        $form->addRadioList('gender', 'Your gender:', [
                'm' => 'male',
                'f' => 'female',
        ]);
        $form->addCheckboxList('colors', 'Favorite colors:', [
                'r' => 'red',
                'g' => 'green',
                'b' => 'blue',
        ]);
        $form->addEmail('email', 'Email:')
                ->setEmptyValue('@')->setDisabled()->setDefaultValue('romam.hronza@gmail.com')->setAttribute('size', 50);

        // group Shipping address *********************************************
        $form->addGroup('Shipping address')
                ->setOption('embedNext', true);

        $form->addCheckbox('send', 'Ship to address')
                ->addCondition($form::FILLED) // conditional rule: if is checkbox checked...
                        ->toggle('sendBox'); // toggle div #sendBox


        // subgroup ---------------------------------------------------
        $form->addGroup()
                ->setOption('container', Html::el('div')->id('sendBox'));

        $form->addText('street', 'Street:');

        $form->addText('city', 'City:')
                ->addConditionOn($form['send'], $form::FILLED)
                        ->setRequired('Enter your shipping address');

        $countries = [
                'World' => [
                        'bu' => 'Buranda',
                        'qu' => 'Qumran',
                        'st' => 'Saint Georges Island',
                ],
                '?' => 'other',
        ];
        $form->addSelect('country', 'Country:', $countries)
                ->setPrompt('Select your country')
                ->addConditionOn($form['send'], $form::FILLED)
                        ->setRequired('Select your country');


        // group Your account ********************************************
        $form->addGroup('Your account');
        $form->addPassword('password', 'Choose password:')
                ->setRequired('Choose your password')
                ->addRule($form::MIN_LENGTH, 'The password is too short: it must be at least %d characters', 3);
        $form->addPassword('password2', 'Reenter password:')
                ->setRequired('Reenter your password')
                ->addRule($form::EQUAL, 'Passwords do not match', $form['password']);
        $form->addUpload('avatar', 'Picture:')
                ->setRequired(false)
                ->addRule($form::IMAGE, 'Uploaded file is not image');
        $form->addHidden('userid');
        $form->addTextArea('note', 'Comment:')->setAttribute('cols', 50)->setAttribute('rows', 5);
        // group for buttons
        $form->addGroup();
        
        $form->addSubmit('submit', 'Submit')->setAttribute('style','padding: 30px; margin-right: 170px');
        $form->addSubmit('cancel', 'Cancel')->setValidationScope(FALSE);
        
        
        //$form->addSubmit('submit', ' OK ')
        //     ->onClick[]=[$this, 'basicExampleSucceeded']   ;
        //$form->addSubmit('cancel', 'Zrušit')->setValidationScope(FALSE);
        

        /*
        if ($form->isSuccess()) {
                echo '<h2>Form was potvrzen and successfully validated</h2>';
                Dumper::dump($form->getValues(), [Dumper::COLLAPSE => FALSE]);
                exit;
        }
         * 
         */
        
        /*--------------------------------------------------------------------*/
        /*
        $form->setDefaults([
                'name' => 'John Doe',
                'userid' => 231,
                'age'=>20,
        ]);
         * 
         */
        /*--------------------------------------------------------------------*/
             
        $form->onSuccess[]= function (Form $form, \stdClass $val){
            if ($form['cancel']->isSubmittedBy()){
                $this->redirect('formular');
            }
            echo '<h2>Form was potvrzen and successfully validated</h2>';
            //Dumper::dump($form->getValues(), [Dumper::COLLAPSE => FALSE]);
            var_dump($val);
            exit();
        };
        
        return $form;
    }
    

    public function basicExampleSucceeded99 ($frm, $val) {
        echo "<script type='text/javascript'>alert('call back');</script> ";
        if ($frm['cancel']->isSubmittedBy()){
           echo "<script type='text/javascript'>alert('přesměrování');</script> ";
           $this->redirect("Homepage", "default222");
        }
        echo '<h2>Form was potvrzen and successfully validated</h2>';
        //Dumper::dump($frm->getValues(), [Dumper::COLLAPSE => FALSE]);
        echo $frm->getValue();
        exit;
        
    }
    
    protected function createComponentBasicExample2() {
    
        $form = new Form;    
        // group Personal data ***********************************************
        $form->addGroup('Osobní data data')
                ->setOption('description', 'Respektujeme your privacy and we ensure that the information you give to us will not be shared to other entities.');
        $form->addText('name', 'Your name:')
                ->setRequired('Enter your name');
        $form->addText('age', 'Your age:')
                ->setRequired('Enter your age')
                ->addRule($form::INTEGER, 'Age must be numeric value')
                ->addRule($form::RANGE, 'Age must be in range from %d to %d', [10, 100]);
        $form->addRadioList('gender', 'Your gender:', [
                'm' => 'male',
                'f' => 'female',
        ]);
        $form->addCheckboxList('colors', 'Favorite colors:', [
                'r' => 'red',
                'g' => 'green',
                'b' => 'blue',
        ]);
         $form->addSubmit('submit', ' OK ');
        if ($form->isSuccess()) {
                echo '<h2>Form was potvrzen and successfully validated</h2>';
                Dumper::dump($form->getValues(), [Dumper::COLLAPSE => FALSE]);
                exit;
        }
        return $form;
    }

}
