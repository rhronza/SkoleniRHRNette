<?php
// source: C:\Users\Roman Hronza\OneDrive\Php\htdocs\SkoleniNette\app\presenters/templates/Index0004RetezeniMetod/formular.latte

use Latte\Runtime as LR;

class Template5c5bcbad6c extends Latte\Runtime\Template
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
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
<div style="margin-top: 100px; margin-left: 20px">
    <?php echo LR\Filters::escapeHtmlText($retez) /* line 5 */ ?>

</div>

<?php
	}

}
