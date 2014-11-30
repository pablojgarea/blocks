<?php  defined('C5_EXECUTE') or die("Access Denied.");
$dt = Loader::helper('form/date_time');
?>

<style type="text/css" media="screen">
	.ccm-block-field-group h2 { margin-bottom: 5px; }
	.ccm-block-field-group td { vertical-align: middle; }
</style>

<div class="ccm-block-field-group">
	<h2>Texto</h2>
	<?php  echo $form->text('field_1_textbox_text', $field_1_textbox_text, array('style' => 'width: 95%;')); ?>
</div>

<div class="ccm-block-field-group">
	<h2>Fecha Inicio</h2>
	<?php  echo $dt->date('field_2_date_value', $field_2_date_value); ?>
</div>

<div class="ccm-block-field-group">
	<h2>Fecha Fin</h2>
	<?php  echo $dt->date('field_3_date_value', $field_3_date_value); ?>
</div>

<div class="ccm-block-field-group">
	<h2>Localización</h2>
	<?php  echo $form->text('field_4_textbox_text', $field_4_textbox_text, array('style' => 'width: 95%;')); ?>
</div>

<div class="ccm-block-field-group">
	<h2>Número de noticias</h2>
	<?php  echo $form->text('field_5_textbox_text', $field_5_textbox_text, array('style' => 'width: 95%;')); ?>
</div>


