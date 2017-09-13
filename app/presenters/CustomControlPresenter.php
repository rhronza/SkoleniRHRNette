<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Presenters;

use Nette\Forms\Form;
use Nette\Forms\Helpers;
use Nette\Utils\Html;

/**
 * Description of CustomControlPresenter
 *
 * @author Roman Hronza
 */
class CustomControlPresenter extends BasePresenter{
    	/** @var string */
	private $day = '';
	private $month = '';
	private $year = '';

        public function __construct($label = null)
	{
		parent::__construct($label);
		$this->setRequired(false)
			->addRule([__CLASS__, 'validateDate'], 'Date is invalid.');
	}        
        
        public function setValue($value)
	{
		if ($value === null) {
			$this->day = $this->month = $this->year = '';
		} else {
			$date = Nette\Utils\DateTime::from($value);
			$this->day = $date->format('j');
			$this->month = $date->format('n');
			$this->year = $date->format('Y');
		}
		return $this;
	}
        
        /**
	 * @return DateTimeImmutable|null
	 */
	public function getValue()
	{
		return self::validateDate($this)
			? (new DateTimeImmutable)->setDate((int) $this->year, (int) $this->month, (int) $this->day)->setTime(0, 0)
			: null;
	}
        
        /**
	 * @return bool
	 */
	public function isFilled()
	{
		return $this->day !== '' || $this->year !== '';
	}
        
        public function loadHttpData()
	{
		$this->day = $this->getHttpData(Form::DATA_LINE, '[day]');
		$this->month = $this->getHttpData(Form::DATA_LINE, '[month]');
		$this->year = $this->getHttpData(Form::DATA_LINE, '[year]');
	}
        
        /**
	 * Generates control's HTML element.
	 */
	public function getControl()
	{
		$name = $this->getHtmlName();
		return Html::el('input', [
				'name' => $name . '[day]',
				'id' => $this->getHtmlId(),
				'value' => $this->day,
				'type' => 'number',
				'min' => 1,
				'max' => 31,
				'data-nette-rules' => Helpers::exportRules($this->getRules()) ?: null,
			])

			. Helpers::createSelectBox(
					[1 => 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
					[],
					$this->month
				)->name($name . '[month]')

			. Html::el('input', [
				'name' => $name . '[year]',
				'value' => $this->year,
				'type' => 'number',
			]);
	}
        
        public static function validateDate(Nette\Forms\IControl $control)
	{
		return ctype_digit($control->day)
			&& ctype_digit($control->month)
			&& ctype_digit($control->year)
			&& checkdate((int) $control->month, (int) $control->day, (int) $control->year);
	}
        
        protected function createComponentCustomControl() {
            $form = new Form;

            $form['date'] = new DateInput('Date:');
            $form['date']->setDefaultValue(new DateTime);

            $form->addSubmit('submit', 'Send');


            if ($form->isSuccess()) {
                    echo '<h2>Form was submitted and successfully validated</h2>';
                    Tracy\Dumper::dump($form->getValues());
                    exit;
            }
            
            return $form;
        }

}

