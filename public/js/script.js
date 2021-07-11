$(document).ready(function(){
	let checkBox = $('#checkBox');
	let imgFile = $('#file');
	// Disabled register button on load
	checkBox.prop('checked', false);
	// Enabling or disabling register button by checkbox
	checkBox.change(function(){
		if (this.checked) {
			$('#button').prop('disabled', false);
			$('#button').removeClass('btn-disable');
		}
		else{
			$('#button').prop('disabled', true);
			$('#button').addClass('btn-disable');
		}
	});
	// Get preview of uploaded image
	imgFile.change(function(input){
		let file = input.target.files;
		let reader = new FileReader();
		reader.onload = function(e){
			$('#img-box').attr('src',e.target.result);
			imgFile.parent().attr('style', 'margin : auto 0;');
		}
		reader.readAsDataURL(file[0]);
	});
});