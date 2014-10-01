<?php  defined('C5_EXECUTE') or die("Access Denied.");
?>

<?php  if (!empty($field_1_textbox_text)): ?>
	<?php  echo htmlentities($field_1_textbox_text, ENT_QUOTES, APP_CHARSET); ?>
<?php  endif; ?>

<?php  if (!empty($field_2_textbox_text)): ?>
	<?php  echo htmlentities($field_2_textbox_text, ENT_QUOTES, APP_CHARSET); ?>
<?php  endif; ?>

<?php  if (!empty($field_3_textbox_text)): ?>
	<?php  echo htmlentities($field_3_textbox_text, ENT_QUOTES, APP_CHARSET); ?>
<?php  endif; ?>

<?php  if (!empty($field_4_textbox_text)): ?>
	<?php  echo nl2br(htmlentities($field_4_textbox_text, ENT_QUOTES, APP_CHARSET)); ?>
<?php  endif; ?>

<?php  if (!empty($field_5_textarea_text)): ?>
	<?php  echo nl2br(htmlentities($field_5_textarea_text, ENT_QUOTES, APP_CHARSET)); ?>
<?php  endif; ?>


<?php

$servidor=$field_1_textbox_text;
$usuario=$field_2_textbox_text;
$clave=$field_3_textbox_text;
$basedatos=$field_4_textbox_text;



/*
** Connect to database:
*/
 
// connect to the database
$con = mysql_connect($servidor, $usuario, $clave) 
    or die('Could not connect to the server!');
 
// select a database:
mysql_select_db($basedatos, $con) 
    or die('Could not select a database.');
 

$sql=nl2br(htmlentities($field_5_textarea_text, ENT_QUOTES, APP_CHARSET));

$result = mysql_query($sql, $con);

$numfields = mysql_num_fields($result);

echo "Columnas:".$numfields;

echo "<table class='consulta_sql'>";
echo "<thead>";
for ( $i = 0; $i < $numfields; $i++ ) {

    echo "<th>".mysql_field_name( $result, $i )."</th>";

}
        
echo "</thead>";

while ($row = mysql_fetch_row($result)) {
	     echo '<tr><td>'.implode($row,'</td><td>')."</td></tr>\n";
}

echo "</table>";


?>

