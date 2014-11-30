<?php  defined('C5_EXECUTE') or die("Access Denied.");

class ConsultaSqlBlockController extends BlockController {
	
	protected $btName = 'Consulta SQL';
	protected $btDescription = '';
	protected $btTable = 'btDCConsultaSql';
	
	protected $btInterfaceWidth = "700";
	protected $btInterfaceHeight = "450";
	
	protected $btCacheBlockRecord = true;
	protected $btCacheBlockOutput = true;
	protected $btCacheBlockOutputOnPost = true;
	protected $btCacheBlockOutputForRegisteredUsers = false;
	protected $btCacheBlockOutputLifetime = CACHE_LIFETIME;

	public function view(){

		$bv = new BlockView();
	    $bv->setController($this);
	    $bv->setBlockObject($this->getBlockObject());
	 
	    // build path to less file
	    $blockPath = $bv->getBlockPath();

		$IE7 = (ereg('MSIE 7',$_SERVER['HTTP_USER_AGENT'])) ? true : false;
		$IE8 = (ereg('MSIE 8',$_SERVER['HTTP_USER_AGENT'])) ? true : false;


		//elegir plantilla
		//$plantilla = $_GET['plantilla'];

		if ($IE7 || $IE8){
		  $this->render( "templates/arbol");
		} else {
		  $script_tag = '<script type="text/javascript" src="'.$blockPath .'/templates/arbol-D3/js/d3.v3.min.js'.'"></script>';
		  $this->addHeaderItem($script_tag);
		  $script_tag = '<script type="text/javascript" src="'.$blockPath .'/templates/arbol-D3/view.js'.'"></script>';
		  $this->addHeaderItem($script_tag);		  
		  $this->render("templates/arbol-D3/view");
		};

	}
	
	public function getSearchableContent() {
		return $this->field_1_textarea_text;
	}








}
