function addData(){
	var input_board = $('#input_board').val();
	var formdata	= $('#add_form').serialize();

	$.ajax({
  		method: "POST",
  		beforeSend: function() {
			$('body').waitMe({effect : 'pulse', text : '', bg : "rgba(255,255,255,0.3)", color : "#fff"});
  		},
  		url: "adm-action.php?action=addinfo&input_board="+input_board,
		dataType:'json',
  		data: formdata
	})
  	.done(function(data) {
		$('body').waitMe('hide');
		$('#message').html(data.msg);
		$('#message').show().delay(5000).fadeOut();
		console.log(data.msg);
  	});	
	
	return false;
}

function getdata(){
	var input_board = $('#input_board').val();
	//var formdata	= $('#add_form').serialize();
	$.ajax({
		method: "POST",
		beforeSend: function( xhr ) {
			$('body').waitMe({effect : 'pulse', text : '', bg : "rgba(255,255,255,0.3)", color : "#fff"});
		},
		url: "adm-action.php?action=getinfo",
		data: { "input_board": input_board}
	})
	.done(function(data) {
		$('#formbody').html(data);
		if(input_board == 2 || input_board == 4){
			$('.non_special').hide();
		}else{
			$('.non_special').show();
		}
		$('.header').html($('#input_board option:selected').text()+' Input Board');
		$('body').waitMe('hide');
	});		
}
$(document).ready(function(){
	$('#input_board').change(function(){
		getdata();
	})
	getdata();
	
	$('#save_data').click(function(){alert('asas');
		console.log($(this));
		addData();
	});
});