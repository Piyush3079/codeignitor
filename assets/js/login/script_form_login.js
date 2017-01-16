$(function(){
	var err = '<span class="glyphicon glyphicon-warning-sign form-control-feedback" aria-hidden="true"></span><span id="inputWarning2Status" class="sr-only">(warning)</span>';
	var success = '<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span><span id="inputSuccess2Status" class="sr-only">(success)</span>';
	$("#email1").blur(function(){
		var email1 = $("#email1").val();
		if(email1==''){
			$("#email1").parent().parent().addClass('has-error');
			$("#email1").parent().parent().addClass('has-feedback');
			$("#email_login").append(err);
		}
		else{
			$("#email1").parent().parent().removeClass('has-error');
			$("#email_login").children("span").remove();
			$("#email1").parent().parent().addClass('has-feedback');
			$("#email_login").append(success);
		}
	});
	$("#pass1").blur(function(){
		var email1 = $("#pass1").val();
		if(email1==''){
			$("#pass1").parent().parent().addClass('has-error');
			$("#pass1").parent().parent().addClass('has-feedback');
			$("#pass_login").append(err);
		}
		else{
			$("#pass1").parent().parent().removeClass('has-error');
			$("#pass_login").children("span").remove();
			$("#pass1").parent().parent().addClass('has-feedback');
			$("#pass_login").append(success);
		}
	});
	$("#email1").focus(function(){
			$("#email1").parent().parent().removeClass('has-error');
			$("#email1").parent().parent().removeClass('has-feedback');
			$("#email_login").children("span").remove();
	});
	$("#pass1").focus(function(){
		$("#pass1").parent().parent().removeClass('has-error');
		$("#pass1").parent().parent().removeClass('has-feedback');
		$("#pass_login").children("span").remove();
	});
});