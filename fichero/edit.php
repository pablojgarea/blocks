<?php  defined('C5_EXECUTE') or die("Access Denied.");
$al = Loader::helper('concrete/asset_library');
Loader::element('editor_config');
?>

<style type="text/css" media="screen">
	.ccm-block-field-group h2 { margin-bottom: 5px; }
	.ccm-block-field-group td { vertical-align: middle; }
</style>

<div class="ccm-block-field-group">
	<h2>Miniatura</h2>
	<?php  echo $al->image('field_1_image_fID', 'field_1_image_fID', 'Choose Image', $field_1_image); ?>
</div>

<div class="ccm-block-field-group">
	<h2>Título</h2>
	<?php  echo $form->text('field_2_textbox_text', $field_2_textbox_text, array('style' => 'width: 95%;')); ?>
</div>

<div class="ccm-block-field-group">
	<h2>Descripción</h2>
	<?php  Loader::element('editor_controls'); ?>
	<textarea id="field_3_wysiwyg_content" name="field_3_wysiwyg_content" class="ccm-advanced-editor"><?php  echo $field_3_wysiwyg_content; ?></textarea>
</div>

<div class="ccm-block-field-group">
	<h2>Fichero</h2>
	<?php  echo $al->file('field_4_file_fID', 'field_4_file_fID', 'Choose File', $field_4_file); ?>
	<table border="0" cellspacing="3" cellpadding="0" style="width: 95%; margin-top: 5px;">
		<tr>
			<td align="right" nowrap="nowrap"><label for="field_4_file_linkText">Link Text (or leave blank to use file name):</label>&nbsp;</td>
			<td align="left" style="width: 100%;"><?php  echo $form->text('field_4_file_linkText', $field_4_file_linkText, array('style' => 'width: 100%;')); ?></td>
		</tr>
	</table>
</div>

<div class="ccm-block-field-group">
	<h2>Previsualización</h2>
	<?php  echo $al->image('field_5_image_fID', 'field_5_image_fID', 'Choose Image', $field_5_image); ?>
</div>


