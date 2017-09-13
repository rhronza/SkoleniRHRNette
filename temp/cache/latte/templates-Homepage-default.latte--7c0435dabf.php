<?php
// source: C:\Users\Roman Hronza\OneDrive\Php\htdocs\SkoleniNette\app\presenters/templates/Homepage/default.latte

use Latte\Runtime as LR;

class Template7c0435dabf extends Latte\Runtime\Template
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
    <div style="top:0px; margin-top: 70px; margin-left: 20px">Hlavní menu (Homepage:default)
    
    <?php
		/* line 4 */
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin($form = $_form = $this->global->formsStack[] = $this->global->uiControl["basicExample222"], []);
?>

        <table>
            <tr>
                <td>
                    <?php
		if ($_label = end($this->global->formsStack)["name"]->getLabel()) echo $_label;
		echo end($this->global->formsStack)["name"]->getControl() /* line 8 */;
		if ($_label = end($this->global->formsStack)["age"]->getLabel()) echo $_label;
		echo end($this->global->formsStack)["age"]->getControl() /* line 8 */ ?>

                </td>
                <td>
                    <?php if ($_label = end($this->global->formsStack)["gender"]->getLabel()) echo $_label ?>

                </td>
                <td>
                    <?php echo end($this->global->formsStack)["gender"]->getControl() /* line 14 */ ?>

                </td>
                <td>
                    <?php if ($_label = end($this->global->formsStack)["gender"]->getLabel()) echo $_label ?>

                </td>
                <td>
                    <?php echo end($this->global->formsStack)["colors"]->getControl() /* line 20 */ ?>

                </td>
            </tr>
            <tr>
                <td>
                    <?php
		if ($_label = end($this->global->formsStack)["email"]->getLabel()) echo $_label;
		echo end($this->global->formsStack)["email"]->getControl() /* line 25 */ ?>

                </td>    
                <td>
                    <?php
		if ($_label = end($this->global->formsStack)["send"]->getLabel()) echo $_label;
		echo end($this->global->formsStack)["send"]->getControl() /* line 28 */ ?>

                </td>    
            </tr>
                    
                  
            </tr>
        </table>
    <?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack));
?>

    </div>
    ----------------------------------------------------------------------
<?php
		/* line 38 */ $_tmp = $this->global->uiControl->getComponent("basicExample222");
		if ($_tmp instanceof Nette\Application\UI\IRenderable) $_tmp->redrawControl(null, false);
		$_tmp->render();
		
	}

}
