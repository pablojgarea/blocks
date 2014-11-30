<?php  defined('C5_EXECUTE') or die("Access Denied.");

class NoticiasBlockController extends BlockController {
	
	protected $btName = 'Noticias';
	protected $btDescription = 'Listado de noticias';
	protected $btTable = 'btDCNoticias';
	
	protected $btInterfaceWidth = "700";
	protected $btInterfaceHeight = "450";
	
	protected $btCacheBlockRecord = true;
	protected $btCacheBlockOutput = true;
	protected $btCacheBlockOutputOnPost = true;
	protected $btCacheBlockOutputForRegisteredUsers = false;
	protected $btCacheBlockOutputLifetime = CACHE_LIFETIME;
	
	public function getSearchableContent() {
		$content = array();
		$content[] = $this->field_1_textbox_text;
		$content[] = date('F jS, Y', $this->field_2_date_value);
		$content[] = date('F jS, Y', $this->field_3_date_value);
		$content[] = $this->field_4_textbox_text;
		$content[] = $this->field_5_textbox_text;
		return implode(' - ', $content);
	}


	public function add() {
		//Set default values for new blocks
		$this->set('field_2_date_value', date('Y-m-d'));
		$this->set('field_3_date_value', date('Y-m-d'));
	}


	public function save($args) {
		$args['field_2_date_value'] = empty($args['field_2_date_value']) ? null : Loader::helper('form/date_time')->translate('field_2_date_value', $args);
		$args['field_3_date_value'] = empty($args['field_3_date_value']) ? null : Loader::helper('form/date_time')->translate('field_3_date_value', $args);
		parent::save($args);
	}




}
