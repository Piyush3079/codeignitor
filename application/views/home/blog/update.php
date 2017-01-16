<!DOCTYPE html>
<html>
	<head>
		<title>Create Post</title>
		<?php $this->load->view('template/head'); ?>
		<script src="http://cdn.ckeditor.com/4.6.0/standard/ckeditor.js"></script>
	</head>
	<body>
		<?php $this->load->view('template/header_main'); ?>
		<br><br><br>
		<div class="container">
			<h2><?= $title; ?></h2>
			<?php echo validation_errors(); ?>
			<?php echo form_open('posts/edit/'); ?>
				<input type="hidden" name="id" value="<?php echo $post['id']; ?>">
				<div>
					<label>Title</label>
					<input type="text" class="form-control" name="title" placeholder="Title" value="<?php echo $post['title']; ?>">
				</div>
				<div>
					<label>Body</label>
					<textarea id="edit_post" style="height:40vh;" class="form-control" name="body" placeholder="Add Body"><?php echo $post['body']; ?></textarea>
				</div>
				<br><br>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
		<script>CKEDITOR.replace('edit_post')</script>
		<?php $this->load->view('template/footer_main'); ?>
	</body>
</html>