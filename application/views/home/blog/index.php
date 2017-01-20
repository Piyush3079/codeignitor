<?php
	error_reporting(0);
    ini_set('display_errors', 0);
	if($this->session->userdata('oauth_uid') && $this->session->userdata('identity')){
		$uid = $this->session->userdata('oauth_uid');
		$provider = $this->session->userdata('oauth_provider');
	}
	else{
		redirect('');
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>HOME</title>
		<?php $this->load->view('template/head'); ?>
	</head>
	<body>
		<?php $this->load->view('template/header_main'); ?>
		<div class="container" style="margin-top:70px;">
			<div>
				<?php $this->load->view('template/home_div_left_me'); ?>
				<div class="col-md-8 scrollbar" id="style-4" " style="background: #ebe2e2;height:784px;width:61.6666677%;margin-left: 21px;margin-right: 21px;border-radius: 5px;">
				<a style="float:right;margin-top: 15px;margin-right: 10px;" href="<?php echo base_url()?>posts/create">Create Post</a>
					<div style="margin-top: 55px;">
					<?php 
					if($var == 1){
						foreach($posts as $post){
							echo '<div style="background: #c7c0c0;padding-top: 1px;padding-bottom: 5px;padding-left: 10px;padding-right: 10px;overflow: scroll;"><h3 style="margin-bottom:0;">'.$post['title'].'</h3>';
							echo '<small class="post-date">Posted On: '.$post['created at'].'</small> by <a href="home/me/'.$post['oauth_uid'].'">'.$post['name'].'</a><br>';
							echo '<span>'.substr($post['body'], 0, 450).'...</sapn><br>';
							


							/************************/
							$likes = explode('|', $post['likes']);
							$total_like_array = array();
							foreach($likes as $key => $like){
								$total_like_array_child = explode('*', $like);
								$liker_id = $total_like_array_child[0];
								$liker_name = $total_like_array_child[1];
								$initial_like = array('id' => $liker_id,
														'name' => $liker_name
														);
								array_push($total_like_array, $initial_like);
								if($uid == $total_like_array_child[0]){
									$like_status = 1;
									echo '<a href="#" class="like" style="position:relative">Liked';
								}
							}
							if(!isset($like_status)){
								echo '<a href="#" class="like" data-popover-like="true" data-html=true data-content="<a>click me, not to disappear</a>">Liked by';
							}
							$total_likes = count($total_like_array);
							echo '</a><span style="margin-left:5px;">'.($total_likes-1).'</span>';
							echo '<div class="arrow_box">Piyush Vijay</div>';
							echo '<div style="display:none;" class="likes_main">'.json_encode($total_like_array).'</div>';
							unset($like_status);
							/****************************/


							/********************************/
							$comments = explode('|', $post['comments']);
							$total_comment_array = array();
							foreach ($comments as $key => $comment) {
								$total_comment_array_child = explode('*', $comment);
								$commenter_id = $total_comment_array_child[0];
								$commenter_name = $total_comment_array_child[1];
								$commenter_comment = $total_comment_array_child[2];
								$initial_comment = array(
														'id' => $commenter_id,
														'name' => $commenter_name,
														'comment' => $commenter_comment);
								array_push($total_comment_array, $initial_comment);
								if($uid == $total_comment_array_child[0]){
									$comment_status = 1;
									echo '<a href="#" style="margin-left:20px;" class="comment">Commented';
								}
							}
							if(!isset($comment_status)){
								echo '<a href="#" style="margin-left:30px;" class="comment">Commented by';
							}
							$total_comment = count($total_comment_array);
							echo '</a><span style="margin-left:5px;">'.($total_comment-1).'</span>';
							echo '<div style="display:none;" class="comments_main">'.json_encode($total_comment_array).'</div>';
							unset($comment_status);
							/*********************************/
							echo '<p><a href="'.site_url('/posts/'.$post['slug']).'">Read More</a></p>';
							echo '</div><br>';
						}
					}
					elseif($var == 2){
						//print_r($posts);
						//foreach($posts as $post){
							echo '<div><h3 style="text-align:center;font-size:32px;font-weight:600;padding-bottom:7px;border-bottom:1px solid #4c4949">'.$posts['title'].'</h3><br>';
							echo '<small class="post-date">Posted On: <b>'.$posts['created at'].'</b></small> by <a href="../home/me/'.$posts['oauth_uid'].'">'.$posts['name'].'</a><br><br>';
							echo '<span>'.$posts['body'].'</sapn><br><br>';
							if($uid == $posts['oauth_uid']){
								echo '<a href="'.base_url().'posts/update/'.$posts['slug'].'" id="update">Edit your Post</a>';
								echo '<a href="'.base_url().'posts/delete/'.$posts['id'].'?id='.$posts['oauth_uid'].'" style="margin-left:30px;" id="delete_post">Delete post</a>';


								/************************/
								$likes = explode('|', $posts['likes']);
								$total_like_array = array();
								$like_status = 1;
								echo '<a href="#" style="margin-left:30px;" class="like">Likes';
								foreach($likes as $key => $like){
									$total_like_array_child = explode('*', $like);
									$liker_id = $total_like_array_child[0];
									$liker_name = $total_like_array_child[1];
									$initial_like = array(
														'id' => $liker_id,
														'name' => $liker_name);
									array_push($total_like_array, $initial_like);
									//do{
										
									//}while($uid == $total_like_array_child[0]);
								}
								$total_likes = count($total_like_array);
								echo '<span style="margin-left:5px;">'.($total_likes-1).'</span></a>';
								echo '<div style="display:none;" class="likes_main">'.json_encode($total_like_array).'</div>';
								//json_encode($total_like_array);
								/****************************/


								/********************************/
								$comments = explode('|', $posts['comments']);
								$total_comment_array = array();
								$comment_status = 1;
								echo '<a href="#" style="margin-left:30px;" class="comment">Comments';
								foreach($comments as $key => $comment){
									$total_comment_array_child = explode('*', $comment);
									$commenter_id = $total_comment_array_child[0];
									$commenter_name = $total_comment_array_child[1];
									$commenter_comment = $total_comment_array_child[2];
									$initial_comment = array(
															'id' => $commenter_id,
															'name' => $commenter_name,
															'comment' => $commenter_comment);
									array_push($total_comment_array, $initial_comment);
									//if($uid != $total_comment_array_child[0]){
										
									//}
								}
								$total_comment = count($total_comment_array);
								echo '<span style="margin-left:5px;">'.($total_comment-1).'</span></a>';
								echo '<div style="display:none;" class="comments_main">'.json_encode($total_comment_array).'</div>';
								//json_encode($total_comment_array);
								/*********************************/
							}
							else{
								/************************/
								$likes = explode('|', $posts['likes']);
								$total_like_array = array();
								foreach($likes as $key => $like){

									$total_like_array_child = explode('*', $like);
									$liker_id = $total_like_array_child[0];
									$liker_name = $total_like_array_child[1];
									$initial_like = array(
														'id' => $liker_id,
														'name' => $liker_name);
									array_push($total_like_array, $initial_like);
									if($uid == $total_like_array_child[0]){
										$like_status = 1;
										echo '<a href="#" class="like">Liked';
									}
								}
								if(!isset($like_status)){
									echo '<a href="#" class="like">Liked by';
								}
								$total_likes = count($total_like_array);
								echo '<span style="margin-left:5px;">'.($total_likes-1).'</span></a>';
								echo '<div style="display:none;" class="likes_main">'.json_encode($total_like_array).'</div>';
								//json_encode($total_like_array);
								unset($like_status);
								/****************************/


								/********************************/
								$comments = explode('|', $posts['comments']);
								$total_comment_array = array();
								foreach($comments as $key => $comment){
									$total_comment_array_child = explode('*', $comment);
									$commenter_id = $total_comment_array_child[0];
									$commenter_name = $total_comment_array_child[1];
									$commenter_comment = $total_comment_array_child[2];
									$initial_comment = array(
															'id' => $commenter_id,
															'name' => $commenter_name,
															'comment' => $commenter_comment);
									array_push($total_comment_array, $initial_comment);
									if($uid == $total_comment_array_child[0]){
										$comment_status = 1;
										echo '<a href="#" style="margin-left:20px;" class="comment">Commented';
									}
								}
								if(!isset($comment_status)){
									echo '<a href="#" style="margin-left:30px;" class="comment">Commented by';
								}
								$total_comment = count($total_comment_array);
								echo '<span style="margin-left:5px;">'.($total_comment-1).'</span></a>';
								echo '<div style="display:none;" class="comments_main">'.json_encode($total_comment_array).'</div>';
								//echo json_encode($total_comment_array);
								unset($comment_status);
								/*********************************/
							}
						echo '</div>';
						//}
					}
					?></div>
				</div>
				<div class="col-md-2" style="background: #ebe2e2;height:250px;border-radius:5px;">
				</div>
			</div>
		</div>
		<?php $this->load->view('template/footer_main');?>
	</body>
<script>
	$(function(){
	$("#delete_post").click(function(event){
		var data = confirm('are you sure you want to contiue');
		if(data == false){
			event.preventDefault();
		}
		else{
			return true;
		}
	});
	});
	$(function(){
		$(".likes_main").each(function(){
			var comments_main = $(this).text();
			var comment_main = JSON.parse(comments_main);
			comment_main.forEach(function(obj){
				console.log($(this).parent().children('.arrow_box').html());
			});
		})
		$(".comments_main").each(function(){
			var comments_main = $(this).text();
			var comment_main = JSON.parse(comments_main);
			comment_main.forEach(function(obj){
				if(obj.name != null){
					console.log(obj.id);
					console.log(obj.name);
					console.log(obj.comment);
				}
			});
		});
		$('.like').mouseenter(function(){
			$(this).parent().children('.arrow_box').css('display', 'block');
		});
		$('.like').mouseleave(function(){
			$(this).parent().children('.arrow_box').css('display', 'none');
		});
		$(".comment").hover(function(){
			
		});
		$(".like").click(function(){
			var current = $(this);
			var text = current.text();
			alert("You can like after clicking Read More.");
		});
	});

</script>
</html>