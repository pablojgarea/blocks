<?php  defined('C5_EXECUTE') or die("Access Denied.");
?>

<div class=" caja-fichero">

<div class="miniatura col-md-2">
 	<?php  if (!empty($field_1_image)){?>
			<?php 
				$ih = Loader::helper('image');
//				$thumb = $ih->getThumbnail($field_1_image, 64, 64,false);

			?>
 			<img src="<?php  echo $field_1_image->src; ?>" width="64px" alt="" />
	<?php  }else{
			//obtener miniatura
			$fv = $field_4_file;
			$url = $fv->getURL();
			$withoutExt = preg_replace('/\\.[^.\\s]{2,4}$/', '', $url);
			$miniatura = $withoutExt."_miniatura.jpg";
	} 
	?> 	
	<img src="<?php  echo $miniatura; ?>" width="64px" alt="" />
	<div class="preview">
		<img src="<?php  echo $miniatura; ?>" alt="" />
	</div>
</div>	
<div class="col-md-10">
	<?php  if (!empty($field_4_file)):
		$link_url = View::url('/download_file', $field_4_file_fID, Page::getCurrentPage()->getCollectionID());
		$link_class = 'file-'.$field_4_file->getExtension();
		$link_text = empty($field_4_file_linkText) ? $field_4_file->getFileName() : htmlentities($field_4_file_linkText, ENT_QUOTES, APP_CHARSET);
		?>
		<div class="titulo"><a href="<?php  echo $link_url; ?>" class="<?php  echo $link_class; ?>"><?php  echo $link_text; ?></a></div>
	<?php  endif; ?>

	<?php  if (!empty($field_3_wysiwyg_content)): ?>
		<div class="descripcion"><?php  echo $field_3_wysiwyg_content; ?></div>
	<?php  endif; ?>
</div>
</div>
