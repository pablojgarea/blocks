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
		$icon = $page->getCollectionAttributeValue('icono');

		if (trim($description)==''){
			$description='<i class="fa fa-link fa-4x"></i>';
		}
		

		?>
		<div class="item-listado-cuadros-capas col-xs-6 col-sm-6 col-md-4 col-lg-3 col-centered ">
				
				<div class="titulo-apartado">
					<a href="<?php  echo $url ?>" target="<?php  echo $target ?>"><?php  echo $title ?>
					<?php 
						if(!empty($icon)){ echo '<div class="icono"><i class="'.$icon.'"></i></div>'; } 
					?>
					</a>
				</div>
				<div class="flecha-pie"><i class="flaticon-arrow103"></i></div>
				<div class="item-cuadro-capa-transparente">
					<div class="flecha-abajo"><i class="flaticon-down4"></i></div>
					<div class="descripcion-apartado"><a href="<?php  echo $url ?>" target="<?php  echo $target ?>" ><?php  echo $description ?></a></div>;
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

