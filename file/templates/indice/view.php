<?php   defined('C5_EXECUTE') or die("Access Denied.");
	$f = $controller->getFileObject();
	$fp = new Permissions($f);
	if ($fp->canViewFile()) { 
		$c = Page::getCurrentPage();
		if($c instanceof Page) {
			$cID = $c->getCollectionID();
		}
?>
<a href="<?php echo  View::url('/download_file', $controller->getFileID(),$cID) ?>"><span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span><?php echo  stripslashes($controller->getLinkText()) ?></a>
 
<?php 
}
/*
$fo = $this->controller->getFileObject();?>
<a href="<?php echo $fo->getRelativePath()?>"><?php echo  stripslashes($controller->getLinkText()) ?></a>
*/ 
?>
