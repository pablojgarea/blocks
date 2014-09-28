<?php 
	defined('C5_EXECUTE') or die("Access Denied.");
	class AutonavBlockController extends Concrete5_Controller_Block_Autonav { 


		public function on_page_view() {
			   $html = Loader::helper('html');
			   $this->addHeaderItem($html->css('/webc5/css/font-awesome-4.2.0/css/font-awesome.min.css'));
			   $this->addHeaderItem($html->css('/webc5/css/flaticon/flaticon.css'));
		}
	}
	class AutonavBlockItem extends Concrete5_Controller_Block_AutonavItem { }