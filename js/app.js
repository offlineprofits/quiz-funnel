function toggle_question_type(){
	if($('#question_type').val() == 'mp' || $('#question_type').val() == 'ma'){
		$('#multiple_choice').show();
	}else{
		$('#multiple_choice').hide();
	}
}
