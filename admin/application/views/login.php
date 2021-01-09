<!doctype html>
<html lang="en" class="fullscreen-bg">
<head>
	<title>KT Export - Admin Login</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css">
	
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	
	<style>
	.auth-box .right .overlay{
    background: rgba(99, 156, 185, 0.52) !important;
	}
	</style>
</head>

<body>
<?php 
 /* session_start();
 if(isset($_GET['logout']))
	 session_destroy();*/
 ?>

	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><img src="<?php echo base_url(); ?>images/kt-logo.jpg" alt=""></div>
								<p class="lead">Login to your account</p>
							</div>
							<form class="form-auth-small" action="<?php echo base_url(); ?>login/validation_login" method="POST">
								<div class="form-group">
									<label for="signin-email" class="control-label sr-only">Email</label>
									<input type="text" name="email" class="form-control" id="emailId" placeholder="Email">
								</div>
								<div class="form-group">
									<label for="signin-password" class="control-label sr-only">Password</label>
									<input type="password" class="form-control" name="password" id="pass"  placeholder="Password">
								</div>
								
								<button type="submit"  class="btn btn-primary btn-lg btn-block" name="login">LOGIN</button>
					
								<div class="bottom">
									<?php if($this->session->flashdata('incorrect'))
									{?>
								<div class="alert alert-danger alert-dismissible">
								  <strong><?php echo $this->session->flashdata('incorrect'); ?> </strong>
								</div>
									<?php
									}?>
								</div>
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<!--<h1 class="heading">Free Bootstrap dashboard template</h1>
							<p>by The Develovers</p>-->
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
	<?php
	/*if(isset($_POST['login'])){
		$email =  mysqli_real_escape_string($con, $_POST['email']);
		$password = mysqli_real_escape_string($con, $_POST['password']);
		echo $sql = "SELECT * FROM `admin_user` WHERE `name`='".($email)."' and `password`='".($password)."'";
		$run = mysqli_query($con, $sql);
		echo
		$no = mysqli_num_rows($run);
		if($no===1){
			$_SESSION['login']="login successfully";	
			echo '<script>window.location.href="dashboard.php";</script>';
			}
		else{
			$_SESSION['error']="error";	
			echo '<script>window.location.href="index.php";</script>';
		  }
	}*/
		
	?>
<script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>	
  <script src="<?php echo base_url(); ?>https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script>
  setTimeout(function(){
	  $(".alert").fadeOut();
  },10000);
 var reg=/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/; var exmp='everextest<?php echo @$nameotp; ?>'; function validateForm(){if(!reg.test($("#emailId").val())){alert("Please Enter Valid Email-id"); return false;}else if(!($("#pass").val())){alert("Please Enter Password."); return false;}else{$("#loadersubscribe").fadeIn();}}
  </script>
</body>
</html>


