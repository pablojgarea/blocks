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

	<div class="noticias-portada">			
		<ul class="pgwSlider">
		<?php foreach ($lista_eventos as $evento): ?>
			<?php 
				$imagen = File::getByID($evento->miniatura);
                $ih = Loader::helper('image');
                $thumb = $ih->getThumbnail($imagen->getPath(), 150, 100, true);
                $slide = $ih->getThumbnail($imagen->getPath(), 600, 400, true);				
			?>
				<li>
					<img src="<?php echo $thumb->src ?>" alt="<?php echo $evento->titulo ?>" data-description="<?php echo $evento->descripcion ?>" data-large-src="<?php echo $slide->src ?>">
					<span><?php echo $evento->titulo; ?></span>
				</li>
		<?php endforeach; ?>
		</ul>

	</div>	



