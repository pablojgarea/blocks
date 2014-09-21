<?php 
defined('C5_EXECUTE') or die("Access Denied.");
$rssUrl = $showRss ? $controller->getRssUrl($b) : '';
$th = Loader::helper('text');
//$ih = Loader::helper('image'); //<--uncomment this line if displaying image attributes (see below)
//$dh = Loader::helper('date'); //<--uncomment this line if displaying dates (see below)
//Note that $nh (navigation helper) is already loaded for us by the controller (for legacy reasons)
?>



<div class="lista-cuadros-capas  row row-centered">

	<?php  foreach ($pages as $page):

		// Prepare data for each page being listed...
		$title = $th->entities($page->getCollectionName());
		$url = $nh->getLinkToCollection($page);
		$target = ($page->getCollectionPointerExternalLink() != '' && $page->openCollectionPointerExternalLinkInNewWindow()) ? '_blank' : $page->getAttribute('nav_target');
		$target = empty($target) ? '_self' : $target;
		$description = $page->getCollectionDescription();
		$description = $controller->truncateSummaries ? $th->shorten($description, $controller->truncateChars) : $description;
		$description = $th->entities($description);	

		if (trim($description)==''){
			$description='<i class="fa fa-link fa-4x"></i>';
		}
		

		?>
		<div class="item-listado-cuadros-capas col-xs-6 col-sm-6 col-md-4 col-lg-3 col-centered ">
				<a href="<?php  echo $url ?>" target="<?php  echo $target ?>"><?php  echo $title ?></a>;
				<div class="flecha-pie"><i class="fa fa-chevron-circle-up fa-2x"></i></div>
				<div class="item-cuadro-capa-transparente">
					<div class="flecha-abajo"><i class="fa fa-chevron-circle-down fa-2x"></i></div>
					<a href="<?php  echo $url ?>" target="<?php  echo $target ?>" ><?php  echo $description ?></a>;
				</div>
		</div>
	<?php  endforeach; ?>
 

</div>
<?php  if ($showPagination): ?>
	<div id="pagination">
		<div class="ccm-spacer"></div>
		<div class="ccm-pagination">
			<span class="ccm-page-left"><?php  echo $paginator->getPrevious('<i class="fa fa-chevron-circle-left"></i> ') ?></span>
			<?php  echo $paginator->getPages() ?>
			<span class="ccm-page-right"><?php  echo $paginator->getNext('<i class="fa fa-chevron-circle-right"></i>') ?></span>
		</div>
	</div>
<?php  endif; ?>

