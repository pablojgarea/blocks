<?php 
	defined('C5_EXECUTE') or die("Access Denied.");
	class AutonavBlockController extends Concrete5_Controller_Block_Autonav { 

		public function on_page_view(){
		    $blockObject = $this->getBlockObject();
		    if (is_object($blockObject)) {
				$bvt = new BlockViewTemplate($blockObject);
	          	$bvt->setBlockCustomTemplate('circle');
		    }
		}
	    
	}
	class AutonavBlockItem extends Concrete5_Controller_Block_AutonavItem { }