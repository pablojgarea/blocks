<?php  defined('C5_EXECUTE') or die("Access Denied.");

class FormulariosEnviadosBlockController extends BlockController {
	
	protected $btName = 'Formularios Enviados';
	protected $btDescription = '';
	protected $btTable = 'btDCFormulariosEnviados';
	
	protected $btInterfaceWidth = "700";
	protected $btInterfaceHeight = "450";
	
	protected $btCacheBlockRecord = true;
	protected $btCacheBlockOutput = true;
	protected $btCacheBlockOutputOnPost = true;
	protected $btCacheBlockOutputForRegisteredUsers = false;
	protected $btCacheBlockOutputLifetime = CACHE_LIFETIME;
	
	public function getSearchableContent() {
		return $this->field_1_textbox_text;
	}








}
