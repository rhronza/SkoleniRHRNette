<?php
// source: C:\Users\Roman Hronza\OneDrive\Php\htdocs\SkoleniNette\app\presenters/templates/@layout.latte

use Latte\Runtime as LR;

class Templatef637bf6311 extends Latte\Runtime\Template
{
	public $blocks = [
		'head' => 'blockHead',
		'scripts' => 'blockScripts',
	];

	public $blockTypes = [
		'head' => 'html',
		'scripts' => 'html',
	];


	function main()
	{
		extract($this->params);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title><?php
		if (isset($this->blockQueue["title"])) {
			$this->renderBlock('title', $this->params, function ($s, $type) {
				$_fi = new LR\FilterInfo($type);
				return LR\Filters::convertTo($_fi, 'html', $this->filters->filterContent('striphtml', $_fi, $s));
			});
			?> | <?php
		}
?>Nette Sandbox</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 13 */ ?>/css/style.css">
    	<?php
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('head', get_defined_vars());
?>
</head>

<body>
        <nav>
            <table style="top:0px; height: 75px; width: 100%;margin:0px auto; padding: 0px; position: fixed; background-color: #006AEB; 
                          border-bottom-left-radius: 30px; border-bottom-right-radius: 30px">
                <tr><td style=" vertical-align: middle; text-align: center; padding: 0px; margin: 0px">
        

                    <ul style='text-align: center; font-size: 0.7em; margin: 0px; color: white'>
                       <li class="volbaMenu"><a style="color: white" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Basicexample:formular")) ?>">BasicExample</a></li>
                       <li class="volbaMenu"><a style="color: white" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Bootstrap2rendering:formular")) ?>">Bootstrap2-Rendering</a></li>
                       <li class="volbaMenu"><a style="color: white" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Bootstrap3rendering:formular")) ?>">Bootstrap3-Rendering</a></li>
                       <li class="volbaMenu"><a style="color: white" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Bootstrap4rendering:formular")) ?>">Bootstrap4-Rendering</a></li>
                       <li class="volbaMenu"><a style="color: white" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Containers:formular")) ?>">Containers</a></li>
                       <li class="volbaMenu"><a style="color: white" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Sign:in")) ?>">Přihlašovací formulář</a></li>
                       <li class="volbaMenu"><a	    style="color: white" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Index0001ArrayHashList:formular2")) ?>">Index0001ArrayHashList</a></li>
		       <li class="volbaMenu"><a style="color: white" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Index0002VolaniHodnotouReferenci:pozdravuj")) ?>">Index0002VolaniHodnotouReferenci</a></li>
		       <li class="volbaMenu"><a style="color: white" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Index0003ArrayPoradi:formular")) ?>">Index0003ArrayPoradi</a></li>
		       <li class="volbaMenu"><a style="color: white" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Index0004RetezeniMetod:formular")) ?>">Index0004RetezeniMetod</a></li>
                    </ul>
                </td></tr>
            </table>
        </nav>

        

        
        <?php
		$this->renderBlock('content', $this->params, 'html');
?> 
<?php
		$this->renderBlock('scripts', get_defined_vars());
?>

        </body>
</html>
<?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockHead($_args)
	{
		
	}


	function blockScripts($_args)
	{
		extract($_args);
?>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="https://nette.github.io/resources/js/netteForms.min.js"></script>
        <script src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 53 */ ?>/js/main.js"></script>
<?php
	}

}
