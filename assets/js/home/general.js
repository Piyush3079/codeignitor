$(function(){
		$(".name_model").click(function(){
			$("#myModal").modal('show');
			var name = $(this).parent().attr('id');
			$("#myModalLabel").text('Add your '+name);
			$("#profile_info_label").text(name);
			$("#formSubmit").click(function(){
				var name_get = $("#email1").val();
				if(name_get == ''){
					alert("Piyush");
				}
				else{
					var uid = $("#unique_id").val();
					$.ajax({
						type:'get',
						url:'http://localhost/Project/profile/add_details/'+uid,
						data:({name:name,value:name_get}),
						success:function(data){
							console.log(data);
							$("#data").text(data);
							$("#myForm")[0].reset();
						},
						error:function(){
							success = false;
						}
					});	
				}
			});
		})
	});