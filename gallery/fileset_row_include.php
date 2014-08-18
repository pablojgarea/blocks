<?php   defined('C5_EXECUTE') or die(_("Access Denied.")); ?> 
<div id="ccm-galleryBlock-fsRow" class="ccm-galleryBlock-fsRow" >

	<div class="backgroundRow" style="padding-left: 100px">
		<table class="setOptionsGrid">
		<tr>
		<td>
		<strong><?php  echo t('File Set') ?>:</strong>
		</td>
		<td>
		<span class="ccm-file-set-pick-cb"><?php  echo $form->select('fsID', $fsInfo['fileSets'], $fsInfo['fsID'])?></span><br/><br/>
		</td>
<!-- 	
		<?php  echo t('Duration')?>: <input type="text" name="duration[]" value="<?php  echo intval($fsInfo['duration'])?>" style="vertical-align: middle; width: 30px" />
		&nbsp;
		<?php  echo t('Fade Duration')?>: <input type="text" name="fadeDuration[]" value="<?php  echo intval($fsInfo['fadeDuration'])?>" style="vertical-align: middle; width: 30px" />
 -->	
 		</tr>
		<tr>
		<td>
			<strong><?php  echo t('Also Display')?>:</strong> 
		</td>
		<td>
			<?php  $selectedCaptionFields=explode(',',$fsInfo['shownAttributes']) ?>
			<select name="captionFields[]" multiple="multiple" size="5">
				<option value="title" <?php echo ( in_array('title',$selectedCaptionFields) )?'selected':''?> >Title</option>
				<option value="description" <?php echo ( in_array('description',$selectedCaptionFields) )?'selected':''?> >Description</option>
				<option value="date" <?php echo ( in_array('date',$selectedCaptionFields) )?'selected':''?> >Date Posted</option>
				<option value="filename" <?php echo ( in_array('filename',$selectedCaptionFields) )?'selected':''?> >File Name</option>
				<?php  
				Loader::model('file_attributes'); 
				$fileAttributes = FileAttributeKey::getList(); 
				foreach($fileAttributes as $ak){ 
					$akID=$ak->getAttributeKeyID();
					?>
					<option value="fak_<?php echo $akID ?>"
						<?php echo  ( in_array('fak_'.$akID,$selectedCaptionFields) ) ? 'selected':''?> >
						<?php echo  $ak->getAttributeKeyName() ?> 
					</option>
				<?php  } ?> 
			</select>	
		</td>
		</tr>
		</table> 
	</div>
</div>
