		<div calss="container-fluid">
			<nav class="navbar navbar-default navbar-fixed-top" style="background-color: #060606;">
			  <div class="container-fluid">
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a class="navbar-brand" href="<?php echo base_url().'home/'; ?>">SISystem</a>
			    </div>

			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      <ul class="nav navbar-nav navbar-right">
			        <li><a href="#" style="padding-top:8px;padding-bottom:8px;padding-right: 0;"><button class="btn btn-primary" type="button">Messages <span class="badge">4</span>
						</button><span class="sr-only">Messages</span></a></li>
			        <li><a href="#" style="padding-top:8px;padding-bottom:8px;"><button class="btn btn-primary" type="button">Requests <span class="badge">4</span>
						</button><span class="sr-only">Requests</span></a></li>
			        <!--<li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
			          <ul class="dropdown-menu">
			            <li><a href="#">Action</a></li>
			            <li><a href="#">Another action</a></li>
			            <li><a href="#">Something else here</a></li>
			            <li role="separator" class="divider"></li>
			            <li><a href="#">Separated link</a></li>
			            <li role="separator" class="divider"></li>
			            <li><a href="#">One more separated link</a></li>
			          </ul>
			        </li>-->
			      </ul>
			      <form class="navbar-form navbar-left">
			        <div class="form-group">
			          <input type="text" class="form-control" placeholder="Search">
			        </div>
			        <button type="submit" class="btn btn-default">Submit</button>
			      </form>
			      <ul class="nav navbar-nav navbar-right">
			        <li><a href="<?php echo base_url().'home/'; ?>">Home</a></li>
			        <li><a href="#">About</a></li>
			        <li><a href="#">Contact</a></li>
			        <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Settings<span class="caret"></span></a>
			          <ul class="dropdown-menu">
			            <li><a href="#">Profile</a></li>
			            <li><a href="#">Edit Profile</a></li>
			            <li><a href="#" id="privacy_policy">Privacy Policy</a></li>
			            <li role="separator" class="divider"></li>
			            <li><a href="#">Blog</a></li>
			            <li><a href="#">Invite Friends</a></li>
			            <li role="separator" class="divider"></li>
			            <li><a href="<?php echo base_url().'login/logout/'.$provider; ?>">Logout</a></li>
			          </ul>
			        </li>
			      </ul>
			    </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>
			<!--navbar ends completely -->
		</div>