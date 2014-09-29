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
	
	public function getSearchableContent() {
		return $this->field_1_textarea_text;
	}








}
