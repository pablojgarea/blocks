<?php  defined('C5_EXECUTE') or die("Access Denied.");
?>

<?php  if (!empty($field_1_textbox_text)): ?>
	<?php  echo htmlentities($field_1_textbox_text, ENT_QUOTES, APP_CHARSET); ?>
<?php  endif; ?>

<?php  if (!empty($field_2_date_value)): ?>
	<?php  echo date('F jS, Y', strtotime($field_2_date_value)); ?>
<?php  endif; ?>

<?php  if (!empty($field_3_date_value)): ?>
	<?php  echo date('F jS, Y', strtotime($field_3_date_value)); ?>
<?php  endif; ?>

<?php  if (!empty($field_4_textbox_text)): ?>
	<?php  echo htmlentities($field_4_textbox_text, ENT_QUOTES, APP_CHARSET); ?>
<?php  endif; ?>

<?php  if (!empty($field_5_textbox_text)): ?>
	<?php  echo htmlentities($field_5_textbox_text, ENT_QUOTES, APP_CHARSET); ?>
<?php  endif; ?>


