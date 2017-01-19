<?php
	if($this->session->userdata('oauth_uid') && $this->session->userdata('identity') && $this->session->userdata('status') == 1){
		$uid = $this->session->userdata('oauth_uid');
		$provider = $this->session->userdata('oauth_provider');
	}
	else{
		redirect('/');
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>HOME</title>
		<?php $this->load->view('template/head'); ?>
	</head>
	<body>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add New Employee</h4>
      </div>
      <div class="modal-body">
        	<form class="form-horizontal" id="myForm" action="" method="post">
        		<div calss="form-group">
        			<label class="label-control col-md-4">Name</label>
        			<div class="col-md-8"><input name="name" id="name" type="text" class="form-control"></div>
        		</div>
        	</form>
      </div><br><br>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="formSubmit">Add</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
		<?php $this->load->view('template/header_main'); ?>
		<div class="container" style="margin-top:70px;">
			<div>
				<?php $this->load->view('template/home_div_left_me'); ?>
				<div class="col-md-8" style="background: #ebe2e2;height:784px;width:61.6666677%;margin-left: 21px;margin-right: 21px;border-radius: 5px;">
				</div>
				<div class="col-md-2" style="background: #ebe2e2;height:250px;border-radius:5px;">
				</div>
			</div>
		</div>
		<?php $this->load->view('template/footer_main'); ?>
	</body>
</html>








<div id="data"></div>
