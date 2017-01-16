/*$(function(){
	$("#button").click(function(){
		alert("piyush");
		var email = $("#email1").val();
		var token = $("#token").val();
		if(email == ''){
			$("#email1").parent().parent().addClass("has-error");
		}
		$.ajax({
			type:'post',
			url:'http://localhost/Project/login/pwdre',
			//data:({eamil:email,csrf_token:token}),
			success:function(data){
				/*var load = JSON.parse(data);
				if(!load.success){
					$("#button").attr("id", "button-1");
					$(".alert-success").html('Employee added successfully...').fadeIn().delay(4000).fadeOut('slow');
				}*/
				/*$("#myForm")[0].reset()
				$(".alert-success").html(data).fadeIn().delay(4000).fadeOut('slow');
			},
			error:function(){
				success = false;
			}
		});
	});
});*/