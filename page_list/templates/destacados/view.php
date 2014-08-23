<?php 
defined('C5_EXECUTE') or die("Access Denied.");
$rssUrl = $showRss ? $controller->getRssUrl($b) : '';
$th = Loader::helper('text');
//$ih = Loader::helper('image'); //<--uncomment this line if displaying image attributes (see below)
//$dh = Loader::helper('date'); //<--uncomment this line if displaying dates (see below)
//Note that $nh (navigation helper) is already loaded for us by the controller (for legacy reasons)
?>



<div id="destacados" class="row">

	<?php  foreach ($pages as $page):

		// Prepare data for each page being listed...
		$title = $th->entities($page->getCollectionName());
		$url = $nh->getLinkToCollection($page);
		$target = ($page->getCollectionPointerExternalLink() != '' && $page->openCollectionPointerExternalLinkInNewWindow()) ? '_blank' : $page->getAttribute('nav_target');
		$target = empty($target) ? '_self' : $target;
		$description = $page->getCollectionDescription();
		$description = $controller->truncateSummaries ? $th->shorten($description, $controller->truncateChars) : $description;
		$description = $th->entities($description);	
		
		//Other useful page data...
		
		//$date = $dh->date(DATE_APP_GENERIC_MDY_FULL, strtotime($page->getCollectionDatePublic()));
		//If you use the date also uncomment the "$dh = Loader::helper('date');" line on top 
		
		//$last_edited_by = $page->getVersionObject()->getVersionAuthorUserName();
		
		//$original_author = Page::getByID($page->getCollectionID(), 1)->getVersionObject()->getVersionAuthorUserName();
		
		/* CUSTOM ATTRIBUTE EXAMPLES:
		 * $example_value = $page->getAttribute('example_attribute_handle');
		 *
		 * HOW TO USE IMAGE ATTRIBUTES:
		 * 1) Uncomment the "$ih = Loader::helper('image');" line up top.
		 * 2) Put in some code here like the following 2 lines:
		 *      $img = $page->getAttribute('example_image_attribute_handle');
		 *      $thumb = $ih->getThumbnail($img, 64, 9999, false);
		 *    (Replace "64" with max width, "9999" with max height. The "9999" effectively means "no maximum size" for that particular dimension.)
		 *    (Change the last argument from false to true if you want thumbnails cropped.)
		 * 3) Output the image tag below like this:
		 *		<img src="<?php  echo $thumb->src ?>" width="<?php  echo $thumb->width ?>" height="<?php  echo $thumb->height ?>" alt="" />
		 *
		 * ~OR~ IF YOU DO NOT WANT IMAGES TO BE RESIZED:
		 * 1) Put in some code here like the following 2 lines:
		 * 	    $img_src = $img->getRelativePath();
		 * 	    list($img_width, $img_height) = getimagesize($img->getPath());
		 * 2) Output the image tag below like this:
		 * 	    <img src="<?php  echo $img_src ?>" width="<?php  echo $img_width ?>" height="<?php  echo $img_height ?>" alt="" />
		 */
		
		/* End data preparation. */

		/* The HTML from here through "endforeach" is repeated for every item in the list... */ ?>

		<div class="item-listado panel panel-default col-md-12">
			<div class="contenido-item">
				<div class="titulo"><a href="<?php  echo $url ?>" target="<?php  echo $target ?>"><?php  echo $title ?></a></div>
				<div class="descripcion"><a href="<?php  echo $url ?>" target="<?php  echo $target ?>"><?php if (!(empty($description))){ echo $description; }else{ echo $title; } ?></a></div>
			</div>
		</div>
		
	<?php  endforeach; ?>
 
 
</div><!-- end .ccm-page-list -->


