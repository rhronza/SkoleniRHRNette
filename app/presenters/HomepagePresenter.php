<?php

namespace App\Presenters;

//use Nette\Forms\Form;
use Nette;
use Nette\Application\UI\Form;

use Nette\Utils\Html;
//use Tracy\Debugger;
//use Tracy\Dumper;

class HomepagePresenter extends Nette\Application\UI\Presenter
{
    public function renderDefault()
    {
            /*$this->template->anyVariable = 'any value';*/
    }

    protected function createComponentBasicExample222() {;
               $form = new Form;

    // group Personal data
    $form->addGroup('Personal data')
            ->setOption('description', 'We value your privacy and we ensure that the information you give to us will not be shared to other entities.');

    $form->addText('name', 'Your name:')
            ->setRequired('Enter your name')
            ->setAttribute('style',"margin-right:50px");

    $form->addText('age', 'Your age:')
            ->setRequired('Enter your age')
            ->addRule($form::INTEGER, 'Age must be numeric value')
            ->addRule($form::RANGE, 'Age must be in range from %d to %d', [10, 100])
            ->setAttribute('style',"margin-right:50px");

    $form->addRadioList('gender', 'Your gender:', [
            'm' => 'male',
            'f' => 'female',
    ])->setAttribute('display','block');

    $form->addCheckboxList('colors', 'Favorite colors:', [
            'r' => 'red',
            'g' => 'green',
            'b' => 'blue',
    ]);
   
    $form->addEmail('email', 'Email:')
            ->setEmptyValue('@');


    // group Shipping address
    $form->addGroup('Shipping address')
            ->setOption('embedNext', true);


    $form->addCheckbox('send', 'Ship to address')
            ->addCondition($form::FILLED) // conditional rule: if is checkbox checked...
                    ->toggle('sendBox'); // toggle div #sendBox


    // subgroup
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


    // group Your account
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

    $form->addTextArea('note', 'Comment:');

    // group for buttons
    $form->addGroup();

    $form->addSubmit('submit', 'Send');
    $form->addSubmit('cancel', 'Cancel')->setValidationScope(FALSE);


    $form->setDefaults([
            'name' => 'John Doe',
            'age'=> 21,
            'userid' => 231,
    ]);

/*
    if ($form->isSuccess()) {
            echo '<h2>Form was potvrzen and successfully validated</h2>';
            Dumper::dump($form->getValues(), [Dumper::COLLAPSE => FALSE]);
            exit;
    }
 * 
 */
    // link na call back - je jednodušší napsat anonymní funkci přímo 
    // do presenteru (funguje v ní i přesměrování)
    //$form->onSuccess[]=[$this,'basicExampleSucceeded'];
    

    $form->onSuccess[]= function (Form $form, \stdClass $val){
        if ($form['cancel']->isSubmittedBy()){
            $this->redirect('default');
        }
        echo '<h2>Form was potvrzen and successfully validated</h2>';
        //Dumper::dump($form->getValues(), [Dumper::COLLAPSE => FALSE]);
        var_dump($val);
        exit();
    };
 

    
    return $form;
}

public function basicExampleSucceeded($form, $val) {
    if ($form['cancel']->isSubmittedBy()){
        $this->redirect("Containers:formular");
    }
    echo '<h2>Form was potvrzen and successfully validated</h2>';
    Dumper::dump($form->getValues(), [Dumper::COLLAPSE => FALSE]);
    exit();
    
}
    
        
    protected function createComponentBootstrap2Rendering() 
    {
        $form = new Form;
        $this->makeBootstrap2($form);

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

        
}
