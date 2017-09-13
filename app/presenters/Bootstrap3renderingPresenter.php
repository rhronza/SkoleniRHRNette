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
 * Description of Bootstrap3renderingPresenter
 *
 * @author Roman Hronza
 */
class Bootstrap3renderingPresenter extends \Nette\Application\UI\Presenter{
    
    private function makeBootstrap3(Form $form)
    {
        $renderer = $form->getRenderer();
        $renderer->wrappers['controls']['container'] = null;
        $renderer->wrappers['pair']['container'] = 'div class=form-group';
        $renderer->wrappers['pair']['.error'] = 'has-error';
        $renderer->wrappers['control']['container'] = 'div class=col-sm-9';
        $renderer->wrappers['label']['container'] = 'div class="col-sm-3 control-label"';
        $renderer->wrappers['control']['description'] = 'span class=help-block';
        $renderer->wrappers['control']['errorcontainer'] = 'span class=help-block';
        $form->getElementPrototype()->class('form-horizontal');

        $form->onRender[] = function ($form) {
                foreach ($form->getControls() as $control) {
                        $type = $control->getOption('type');
                        if ($type === 'button') {
                                $control->getControlPrototype()->addClass(empty($usedPrimary) ? 'btn btn-primary' : 'btn btn-default');
                                $usedPrimary = true;

                        } elseif (in_array($type, ['text', 'textarea', 'select'], true)) {
                                $control->getControlPrototype()->addClass('form-control');

                        } elseif (in_array($type, ['checkbox', 'radio'], true)) {
                                $control->getSeparatorPrototype()->setName('div')->addClass($type);
                        }
                }
        };
    }

    protected function createComponentBootstrap3rendering() {
        $form = new Form;
        $this->makeBootstrap3($form);

        $form->addGroup('Personal data');
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


        if ($form->isSuccess()) {
                echo '<h2>Form was submitted and successfully validated</h2>';
                Dumper::dump($form->getValues());
                exit;
        }
        return $form;
    }
   
}
