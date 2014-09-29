<?php  defined('C5_EXECUTE') or die("Access Denied.");
?>

<?php  if (!empty($field_1_textarea_text)): ?>
	<?php  echo nl2br(htmlentities($field_1_textarea_text, ENT_QUOTES, APP_CHARSET)); ?>
<?php  endif; ?>


<?php
$db = Loader::db();
$sql=nl2br(htmlentities($field_1_textarea_text, ENT_QUOTES, APP_CHARSET));
$db->SetFetchMode(ADODB_FETCH_NUM);
$filas = $db->Execute($sql);
$db->SetFetchMode(ADODB_FETCH_ASSOC); 
$columnas = $db->Execute($sql);

          if (!empty($filas)) {
          	echo "<table class='consulta_sql'>";
          		echo "<thead><tr>";
          		foreach ($columnas->fields as $columna  => $c) {
          				echo "<th>".$columna."</th>";
          			}	
          		//	echo "<th>1</th><th>2</th><th>1</th><th>2</th><th>3</th>";
          		echo "</tr></thead>";
               foreach ($filas as $fila) {
               	 echo "<tr>";
               	 foreach ($fila as $column) {
               	 	echo "<td>".$column."</td>";
               	 }
               	 echo "</tr>";
               }
            echo "</table>";
               
          }
?>
<script type="text/javascript">
$(document).ready(function(){
    $('.consulta_sql').DataTable();
});
</script>