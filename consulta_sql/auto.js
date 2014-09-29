ccmValidateBlockForm = function() {
	
	if ($('#field_1_textarea_text').val() == '') {
		ccm_addError('Missing required text: Consulta SQL');
	}


	return false;
}
