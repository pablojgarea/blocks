<?php  defined('C5_EXECUTE') or die("Access Denied.");

class MapaCorunaBlockController extends BlockController {
	
	protected $btName = 'Mapa Coruña';
	protected $btDescription = '';
	protected $btTable = 'btDCMapaCoruna';
	
	protected $btInterfaceWidth = "700";
	protected $btInterfaceHeight = "450";
	
	protected $btCacheBlockRecord = true;
	protected $btCacheBlockOutput = true;
	protected $btCacheBlockOutputOnPost = true;
	protected $btCacheBlockOutputForRegisteredUsers = false;
	protected $btCacheBlockOutputLifetime = CACHE_LIFETIME;
	




	public function save($args) {
		$args['field_1_link_cID'] = empty($args['field_1_link_cID']) ? 0 : $args['field_1_link_cID'];
		parent::save($args);
	}

    public function on_page_view() {
      $html = Loader::helper('html');
	  $bv = new BlockView();
      $bv->setBlockObject($this->getBlockObject());
      $this->addHeaderItem($html->javascript('http://www.concellosdacoruna.es/system/modules/tgs.dipacoruna.general/resources/js/map.js'));
      $this->addHeaderItem($html->javascript($bv->getBlockURL() . '/js/jquery.qtip.min.js'));
      $this->addHeaderItem($html->css($bv->getBlockURL() . '/js/jquery.qtip.css'));
 //     $this->addHeaderItem($html->javascript('http://www.concellosdacoruna.es/system/modules/tgs.dipacoruna.general/resources/js/js.js'));
	}

}
