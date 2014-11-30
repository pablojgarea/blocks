ccmValidateBlockForm = function() {
	
	if ($('#field_2_textbox_text').val() == '') {
		ccm_addError('Missing required text: Título');
	}

	if ($('#field_4_file_fID-fm-value').val() == '' || $('#field_4_file_fID-fm-value').val() == 0) {
		ccm_addError('Missing required file: Fichero');
	}


	return false;
}
