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
			<h2 style="text-align: center;"><?= $title; ?></h2>
			<?php echo validation_errors(); ?>
			<?php echo form_open('posts/create'); ?>
				<div>
					<label>Title</label>

					<input type="text" class="form-control" name="title" placeholder="Title">
				</div>
				<div>
					<label>Body</label>
					<textarea id="edit_post" class="form-control" name="body" placeholder="Add Body"></textarea>
				</div>
				<br><br>
				<div><button type="submit" class="btn btn-primary">Submit</button><sapn style="padding-right: 20px;padding-left: 20px;color: #626669">OR</sapn><button class="btn btn-success"><a href="<?= base_url()?>" style="color:antiquewhite;">Go to home</a></button></div>
			</form>
		</div>
		<script>CKEDITOR.replace('edit_post')</script>
		<?php $this->load->view('template/footer_main'); ?>
	</body>
</html>