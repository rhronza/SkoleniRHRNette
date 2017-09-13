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
//use Tracy\Debugger;
//use Tracy\Dumper;



/**
 * Description of Bootstrap4renderingPresenter
 *
 * @author Roman Hronza
 */
class Bootstrap4renderingPresenter extends \Nette\Application\UI\Presenter{
    
    function makeBootstrap4(Form $form)
    {
	$renderer = $form->getRenderer();
	$renderer->wrappers['controls']['container'] = null;
	$renderer->wrappers['pair']['container'] = 'div class="form-group row"';
	$renderer->wrappers['pair']['.error'] = 'has-danger';
	//$renderer->wrappers['control']['container'] = 'div class=col-sm-9';
	$renderer->wrappers['control']['container'] = 'div class=col-sm-9';
	$renderer->wrappers['label']['container'] = 'div class="col-sm-3 col-form-label"';
	$renderer->wrappers['control']['description'] = 'span class=form-text';
	$renderer->wrappers['control']['errorcontainer'] = 'span class=form-control-feedback';

	$form->onRender[] = function ($form) {
		foreach ($form->getControls() as $control) {
			$type = $control->getOption('type');
			if ($type === 'button') {
				$control->getControlPrototype()->addClass(empty($usedPrimary) ? 'btn btn-primary' : 'btn btn-secondary');
				$usedPrimary = true;

			} elseif (in_array($type, ['text', 'textarea', 'select'], true)) {
				$control->getControlPrototype()->addClass('form-control');

			} elseif ($type === 'file') {
				$control->getControlPrototype()->addClass('form-control-file');

			} elseif (in_array($type, ['checkbox', 'radio'], true)) {
				if ($control instanceof Nette\Forms\Controls\Checkbox) {
					$control->getLabelPrototype()->addClass('form-check-label');
				} else {
					$control->getItemLabelPrototype()->addClass('form-check-label');
				}
				$control->getControlPrototype()->addClass('form-check-input');
				$control->getSeparatorPrototype()->setName('div')->addClass('form-check');
			}
		}
	};
    }


    protected function createComponentBootstrap4rendering($name) {
        $form = new Form;
        $this->makeBootstrap4($form);

        $form->addGroup('Osobní data');
        $form->addText('name', 'Your name')
                ->setRequired('Enter your name');

        $form->addRadioList('gender', 'Your gender', [
                'male', 'female',
        ]);

        $form->addCheckboxList('colors', 'Favorite colors', [
                'red', 'green', 'blue',
        ]);

        $form->addSelect('country', 'Country', [
                'Buranda', 'Qumran', 'Saint Georges Island',
        ]);

        $form->addCheckbox('send', 'Ship to address');

        $form->addGroup('Your account');
        $form->addPassword('password', 'Choose password');
        $form->addUpload('avatar', 'Picture');
        $form->addTextArea('note', 'Comment');

        $form->addGroup();
        $form->addSubmit('submit', 'Send');
        $form->addSubmit('cancel', 'Cancel');

        // následující nebude fungoval nebot požívám jinou třídu - funguje při use Nette\Forms\Form, 
        //nefunguje při use Nette\Application\UI\Form
        /*
        if ($form->isSuccess()) {
                echo '<h2>Form was submitted and successfully validated</h2>';
                Dumper::dump($form->getValues());
                exit;
        }
         * 
         */
        
        return $form;
        
    }    
}
