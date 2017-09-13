<?php
// source: C:\Users\Roman Hronza\OneDrive\Php\htdocs\SkoleniNette\app\presenters/templates/Bootstrap4rendering/formular.latte

use Latte\Runtime as LR;

class Templateb7c3788e29 extends Latte\Runtime\Template
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
    <link rel="stylesheet" href="http://v4-alpha.getbootstrap.com/dist/css/bootstrap.min.css">
     <table style="margin: 0px auto; padding: 0px;" >
        <tr><td>
<?php
		/* line 7 */ $_tmp = $this->global->uiControl->getComponent("bootstrap4rendering");
		if ($_tmp instanceof Nette\Application\UI\IRenderable) $_tmp->redrawControl(null, false);
		$_tmp->render();
?>
        </td></td>
        <tr><td>
            <div style ="text-align: center"><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:default")) ?>"> Návrat do hlavního menu</a></div>
        <td></tr>   
     </table>
<?php
	}

}
