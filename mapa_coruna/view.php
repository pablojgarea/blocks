<?php  defined('C5_EXECUTE') or die("Access Denied.");
$nh = Loader::helper('navigation');
?>

<?php  if (!empty($field_1_link_cID)):
	$link_url = $nh->getLinkToCollection(Page::getByID($field_1_link_cID), true);
	$link_text = empty($field_1_link_text) ? $link_url : htmlentities($field_1_link_text, ENT_QUOTES, APP_CHARSET);
	?>
	<a href="<?php  echo $link_url; ?>"><?php  echo $link_text; ?></a>
<?php  endif; ?>


