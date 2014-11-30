<?php  defined('C5_EXECUTE') or die("Access Denied.");
?>

<?php


	$parametros_busqueda = array();

	if (!empty($field_1_textbox_text)): 
		$parametros_busqueda['texto']=$field_1_textbox_text; 
	endif;

	if (!empty($field_2_date_value)):
		$parametros_busqueda['fecha_inicio']=$field_2_date_value;
	endif;

	if (!empty($field_3_date_value)):
		$parametros_busqueda['fecha_fin']=$field_3_date_value;
	endif;

	if (!empty($field_4_textbox_text)): 
		$parametros_busqueda['localizacion']=$field_4_textbox_text; 
	endif;

	if (!empty($field_5_textbox_text)): 
		$parametros_busqueda['numero_noticias']=$field_5_textbox_text; 
	endif;

		Loader::model('evento','evento');

		$evento_busqueda = new Evento();

		$lista_eventos = $evento_busqueda->search($parametros_busqueda);

?>

<div class="news-holder cf row">

    <ul class="col-md-3 col-md-push-9 news-headlines">
    	<?php 
	    	$first = true; 
	    	foreach ($lista_eventos as $evento) {
    	?>
				<li <?php if ($first){ echo 'class="selected"'; } ?>>
					<?php echo $evento->titulo; ?>
				</li>
		<?php
				$first = false; 
			} 
		?>
      <!-- li.highlight gets inserted here -->
    </ul>

    <div class="col-md-9 col-md-pull-3 news-preview">
		<?php foreach ($lista_eventos as $evento): ?>
			<div class="news-content top-content">
				<?php 
					$imagen = File::getByID($evento->miniatura);
	                $ih = Loader::helper('image');
	                $slide = $ih->getThumbnail($imagen->getPath(), 600, 400, true);				
				?>
				<img src="<?php echo $slide->src ?>" alt="<?php echo $evento->titulo ?>">
				<div class="titulo-noticia"><?php echo $evento->titulo; ?></div>
				<div class="descripcion-noticia"><?php echo $evento->descripcion; ?></div>
			</div>
		<?php endforeach; ?>
	</div>

</div><!-- .news-holder -->
