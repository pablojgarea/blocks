<?php  defined('C5_EXECUTE') or die("Access Denied.");
?>
<?php  if (!empty($field_1_textarea_text)): ?>
	<?php  echo nl2br(htmlentities($field_1_textarea_text, ENT_QUOTES, APP_CHARSET)); ?>
<?php  endif; ?>
<?php
$db = Loader::db();
$sql=nl2br(htmlentities($field_1_textarea_text, ENT_QUOTES, APP_CHARSET));
$filas = $db->Execute($sql);
?>

TABLA:<div id="arbol_resultado"></div>

<div id="arbol_ordenado"></div>


<div class="content">
  <h1>Responsive Organization Chart</h1>
<figure class="org-chart cf">
</figure>
</div>
<script type="text/javascript">
$( document ).ready(function() {

		var sqlquery = [<?php  
			    foreach ($filas as $fila) {             
			        echo '{"id": '.$fila['id'].', "parentid": '.$fila['id_padre'].', "name": "'.utf8_decode($fila['te_nombre']).'"},' . PHP_EOL;            
			    }
			?>];
		var resultado;
		resultado = _queryTreeSort({q: sqlquery});
		$('#arbol_resultado').html(JSON.stringify(sqlquery, true, 2));

		var tree;
		tree = _makeTree({q: resultado});

		var html_arbol = _renderTree(tree);
		$('#arbol_ordenado').html(JSON.stringify(tree, true, 2));

		$('.org-chart').html(html_arbol);

});
</script>