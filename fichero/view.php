<?php  defined('C5_EXECUTE') or die("Access Denied.");
?>

<?php  if (!empty($field_1_image)): ?>
	<img src="<?php  echo $field_1_image->src; ?>" width="<?php  echo $field_1_image->width; ?>" height="<?php  echo $field_1_image->height; ?>" alt="" />
<?php  endif; ?>

<?php  if (!empty($field_2_textbox_text)): ?>
	<?php  echo htmlentities($field_2_textbox_text, ENT_QUOTES, APP_CHARSET); ?>
<?php  endif; ?>

<?php  if (!empty($field_3_wysiwyg_content)): ?>
	<?php  echo $field_3_wysiwyg_content; ?>
<?php  endif; ?>

<?php  if (!empty($field_4_file)):
	$link_url = View::url('/download_file', $field_4_file_fID, Page::getCurrentPage()->getCollectionID());
	$link_class = 'file-'.$field_4_file->getExtension();
	$link_text = empty($field_4_file_linkText) ? $field_4_file->getFileName() : htmlentities($field_4_file_linkText, ENT_QUOTES, APP_CHARSET);
	?>
	<a href="<?php  echo $link_url; ?>" class="<?php  echo $link_class; ?>"><?php  echo $link_text; ?></a>
<?php  endif; ?>

<?php  if (!empty($field_5_image)): ?>
	<img src="<?php  echo $field_5_image->src; ?>" width="<?php  echo $field_5_image->width; ?>" height="<?php  echo $field_5_image->height; ?>" alt="" />
<?php  endif; ?>


