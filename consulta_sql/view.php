<?php  defined('C5_EXECUTE') or die("Access Denied.");
?>

<?php  if (!empty($field_1_textarea_text)): ?>
	<?php  echo nl2br(htmlentities($field_1_textarea_text, ENT_QUOTES, APP_CHARSET)); ?>
<?php  endif; ?>


<?php
// $db = Loader::db();
// $sql=nl2br(htmlentities($field_1_textarea_text, ENT_QUOTES, APP_CHARSET));
// $db->SetFetchMode(ADODB_FETCH_NUM);
// $filas = $db->Execute($sql);
// $db->SetFetchMode(ADODB_FETCH_ASSOC); 
// $columnas = $db->Execute($sql);

//           if (!empty($filas)) {
//           	echo "<table class='consulta_sql'>";
//           		echo "<thead><tr>";
//           		foreach ($columnas->fields as $columna  => $c) {
//           				echo "<th>".$columna."</th>";
//           			}	
//           		//	echo "<th>1</th><th>2</th><th>1</th><th>2</th><th>3</th>";
//           		echo "</tr></thead>";
//                foreach ($filas as $fila) {
//                	 echo "<tr>";
//                	 foreach ($fila as $column) {
//                	 	echo "<td>".$column."</td>";
//                	 }
//                	 echo "</tr>";
//                }
//             echo "</table>";
               
//           }

$IE7 = (ereg('MSIE 7',$_SERVER['HTTP_USER_AGENT'])) ? true : false;
$IE8 = (ereg('MSIE 8',$_SERVER['HTTP_USER_AGENT'])) ? true : false;


//elegir plantilla
//$plantilla = $_GET['plantilla'];
/*
if ($IE7 || $IE8){
  $bvt = new BlockViewTemplate($b); 
  $bvt->setBlockCustomRender( "templates/arbol" );
  include($bvt->getTemplate());
} else {
  $bvt = new BlockViewTemplate($b); 
  $bvt->setBlockCustomRender( "templates/arbol-D3" );
  include($bvt->getTemplate());
};
*/
?>



<!-- 
<script type="text/javascript">
$(document).ready(function(){
    $('.consulta_sql').DataTable();
});
</script> -->