<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Presenters;

//use Nette\Forms\Form;
use Nette;
use Nette\Application\UI\Form;

//use Tracy\Debugger;
//use Tracy\Dumper;

use Nette\Utils\Html; // ????

/**
 * Description of Bootstrap2rendering
 *
 * @author Roman Hronza
 */
class Bootstrap2renderingPresenter extends \Nette\Application\UI\Presenter{
    
    public function renderFormular() {
        
    }

    private function makeBootstrap2(Form $form)
    {
	$renderer = $form->getRenderer();
	$renderer->wrappers['controls']['container'] = null;
	$renderer->wrappers['pair']['container'] = 'div class=control-group';
	$renderer->wrappers['pair']['.error'] = 'error';
	$renderer->wrappers['control']['container'] = 'div class=controls';
	$renderer->wrappers['label']['container'] = 'div class=control-label';
	$renderer->wrappers['control']['description'] = 'span class=help-inline';
	$renderer->wrappers['control']['errorcontainer'] = 'span class=help-inline';
	$form->getElementPrototype()->class('form-horizontal');

	$form->onRender[] = function ($form) {
		foreach ($form->getControls() as $control) {
			$type = $control->getOption('type');
			if ($type === 'button') {
				$control->getControlPrototype()->addClass(empty($usedPrimary) ? 'btn btn-primary' : 'btn');
				$usedPrimary = true;

			} elseif (in_array($type, ['checkbox', 'radio'], true)) {
				$control->getSeparatorPrototype()->setName('div')->addClass($type);
			}
		}
	};
    }
    
    protected function createComponentBootstrap2Rendering() {
        $form = new Form;
        $this->makeBootstrap2($form);

        $form->addGroup('Osobní data');
        $form->addText('name', 'Your name')
                ->setRequired('Enter your name');

        $form->addRadioList('gender', 'Your gender', [
                'male', 'female',
        ]);

        $form->addCheckboxList('colors', 'Favorite colors', [
                'red', 'green', 'blue',
        ]);

        $form->addSelect('countryZeme', 'Země', [
                'Buranda', 'Qumran', 'Saint Georges Island','Czech republic'
        ]);

        $form->addGroup('Zasílací adresa')
                ->setOption('embedNext', true);
        
        /***************************************************/
        $form->addCheckbox('send', 'Vložit zasílací adresu')
                /***** od tud vloženo pro fungování zasílací adresy: */
                ->addCondition($form::FILLED) // conditional rule: if is checkbox checked...
                        ->toggle('sendBox'); // toggle div #sendBox;
        
        $form->addGroup()
                ->setOption('container', Html::el('div')->id('sendBox'));

        $form->addText('street', 'Street:');

        $form->addText('city', 'City:')
                ->addConditionOn($form['send'], $form::FILLED)
                        ->setRequired('Enter your shipping address');

        $countries =[
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
        /*************************************************/

        $form->addGroup('Your account');
        $form->addPassword('password', 'Choose password');
        $form->addUpload('avatar', 'Picture');
        $form->addTextArea('note', 'Comment')->setAttribute('cols', 50)->setAttribute('rows', 4);

        $form->addGroup();
        $form->addSubmit('submit', 'Send')->setAttribute('margin-right',20);
        $form->addSubmit('cancel', 'Zrušit')->setValidationScope(FALSE);
        
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
    
    

}
