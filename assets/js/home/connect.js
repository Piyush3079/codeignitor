$(function(){
	$(".button_connect").click(function(){
		var uid_other = $(this).children("input").val();
		var uid_mine = $("#connect_my_uid").val();
		var div = $(this).parent().parent().parent().parent();
		if(uid_other == '' || uid_mine == ''){
			window.location.replace("connect");
		}
		else{
			$.ajax({
				type:'get',
				url:'http://localhost/Project/friends/connection_request',
				data:({uid_mine:uid_mine, uid_other:uid_other}),
				success: function(data){
					console.log(data);
					var data_new = JSON.parse(data)
					if(data_new.success){
						if(data_new.data == 1){
							div.text("Request send successfully");
							div.fadeOut(3000, function(){
								$(this).remove();
							});
						}
						else{
							alert("Unable to send request. Try again later...");
							window.location.replace("connect");
						}
					}
					else{
						alert("You have already sent friend request to this user.");
						window.location.replace("connect");
					}
				},
				error: function(){
					success = false;
				}
			});
		}
	});
});