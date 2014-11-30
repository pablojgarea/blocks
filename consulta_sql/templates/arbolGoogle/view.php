<?php  defined('C5_EXECUTE') or die("Access Denied.");
?>
<?php  if (!empty($field_1_textarea_text)): ?>
	<?php  echo nl2br(htmlentities($field_1_textarea_text, ENT_QUOTES, APP_CHARSET)); ?>
<?php  endif; ?>
<?php
	$db = Loader::db();
	$sql=nl2br(htmlentities($field_1_textarea_text, ENT_QUOTES, APP_CHARSET));
	$filas = $db->Execute($sql);

	$elemento_raiz = $db->Execute("select id_elemento, id_padre, te_nombre_g, te_nombre, co_visible_org from elemento
	where id_jrrqa = 1
	  and co_visible = 'S'
	  and te_tipo = 'D'
	  and id_elemento = 1");

	$descendientes = $this->descendientes(1);
	$padres = $this->raiz();
?>


<div class="oc">
    <script type='text/javascript' src='https://www.google.com/jsapi'></script>
    <script type='text/javascript'>
      var chart, data;
      google.load('visualization', '1', {packages:['orgchart']});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        data = new google.visualization.DataTable();
        data.addColumn('string', 'Name');
        data.addColumn('string', 'Manager');
        data.addColumn('string', 'ToolTip');
        data.addRows([
			<?php 
				while($padre = mysql_fetch_assoc($padres)){             
	              echo "[{v:'".$padre['id_elemento']."',f: '".utf8_decode($padre['te_nombre_g'])."'},'','']";
          		}
          	?>
        	<?php  
	        	while($descendiente = mysql_fetch_assoc($descendientes)){             
			        echo ",[{v:'".$descendiente['id_elemento']."',f: '".utf8_decode($descendiente['te_nombre_g'])."'},'".$descendiente['id_padre']."','']". PHP_EOL;            
			    }
			?>
        ]);

        chart = new google.visualization.OrgChart(document.getElementById('ochart'));
        chart.draw(data, {
            allowHtml:true,
            allowCollapse: true,
            size: (data.getNumberOfColumns() < 10) ? 'medium' : 'small'}
        );
      }
    </script>

<div id="ochart">
</div>
</div>
