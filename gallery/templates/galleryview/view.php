<?php   defined('C5_EXECUTE') or die(_("Access Denied.")); ?>
<?php   
	$ih = Loader::helper('image'); 
	$thumbfak = false;
	if ($thumbnailAttributeKeyID > 0) {
		Loader::model('attribute/categories/file');
		$thumbfak = FileAttributeKey::getByID($thumbnailAttributeKeyID);
	}
?>	

<ul id="myGallery">
			<?php   for($i=0;$i<count($images);$i++){ ?>
			    Foto: <?=$i?><br>
				<?php   
				$imgInfo = $images[$i]; 
				$f = File::getByID($imgInfo['fID']); 
				$thumbf = false;
				$caption = array_key_exists('caption', $imgInfo) ? $imgInfo['caption'] : $f->getTitle();
				$fv = $f->getApprovedVersion(); 
				//$imgInfo['caption'].='<br>';
				
				//load caption attributes
				$shownData=array();	
				if($type=='FILESET'){ 
					$shownAttributesArray=explode(',',$shownAttributes);
				}else{
					if( strlen(trim($imgInfo['caption'])) ) $shownData[]=$imgInfo['caption'];	
					$shownAttributesArray=explode(',',$imgInfo['shownAttributes']);
				}
				if( count($shownAttributesArray) ){									
					if( in_array('title',$shownAttributesArray) ) 
						$shownData[]=$fv->getTitle();					
					if( in_array('filename',$shownAttributesArray) ) 
						$shownData[]=$fv->getFileName();	
					if( in_array('description',$shownAttributesArray) ) 
						$shownData[]=htmlspecialchars($fv->getDescription());	
					if( in_array('tags',$shownAttributesArray) ) 
						$shownData[]=$fv->getTags();
					if( in_array('date',$shownAttributesArray) ) 
						$shownData[]=date('M d, Y g:ia', strtotime($f->getDateAdded()));																									
					foreach($shownAttributesArray as $attr){
						if( substr($attr,0,4)=='fak_' ){ 
							$fakID=intval(substr($attr,4));							
							$fak=FileAttributeKey::get($fakID);
							if( strlen($fak->akHandle) ){ 
								$attVal=$fv->getAttribute( $fak->akHandle ,true );
								if( strlen($attVal) ) $shownData[]=$attVal;
							}
						}
					}
					
					$shownDataTmp = $shownData;
					$shownData = array();
					$txh = Loader::helper('text');
					foreach($shownDataTmp as $shd) {
						$shownData[] = htmlentities($shd, ENT_COMPAT, APP_CHARSET);
					}
					$imgInfo['caption']=join('<br>',$shownData);
				}
				
				if (is_object($thumbfak)) {
					$thumbf = $f->getAttribute($thumbfak->getAttributeKeyHandle());
				}
				
				if (!is_object($thumbf)) {
					$thumbf = $f;
				}
				
				if( intval($maxThumbs)>0 && $i >= $maxThumbs ){ 
				
					ob_start();
					?>
					
					<li><img src="<?=$f->getRelativePath()?>"/></li>

					<?php  
					$postTableHiddenImgs.=ob_get_contents();
					ob_end_clean();
				
				}else{
				
					if($i % $thumbnailPerRow == 0) {  ?>
						</tr><tr>
					<?php   } ?>		
					
					<li><img src="<?=$f->getRelativePath()?>"/></li>
	
			<?php   
				}
			} ?>

</ul>
<?php echo $postTableHiddenImgs ?>


<script type="text/javascript">
	$(function(){
		$('#myGallery').galleryView();
	});
</script>

