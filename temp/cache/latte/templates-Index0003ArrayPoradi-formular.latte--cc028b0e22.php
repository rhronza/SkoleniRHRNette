<?php
// source: C:\Users\Roman Hronza\OneDrive\Php\htdocs\SkoleniNette\app\presenters/templates/Index0003ArrayPoradi/formular.latte

use Latte\Runtime as LR;

class Templatecc028b0e22 extends Latte\Runtime\Template
{
	public $blocks = [
		'content' => 'blockContent',
	];

	public $blockTypes = [
		'content' => 'html',
	];


	function main()
	{
		extract($this->params);
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('content', get_defined_vars());
?>

<?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['item'])) trigger_error('Variable $item overwritten in foreach on line 5');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
<div style="margin: 100px 0px 0px 100px">
Výpis pole<br>
<?php
		$iterations = 0;
		foreach ($pole as $item) {
			?>    prvek pole:<?php echo LR\Filters::escapeHtmlText($item) /* line 6 */ ?><br>
<?php
			$iterations++;
		}
?>
</div>
<?php
	}

}
