<?php
//session_start();
if(!$this->session->userdata('password'))	
redirect(base_url());

?>
<style>
li:hover .fa {
    transform: rotate(360deg);
    transition-duration: 0.8s;
}
</style>
<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="dashboard.php"><img src="<?php echo base_url(); ?>images/kt-logo.jpg" alt="KT Export" class="img-responsive logo img-fluid"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?php echo base_url(); ?>assets/img/user.png" class="img-circle" alt="Avatar"> <span>Admin</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo base_url(); ?>/login/logout"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							</ul>
						</li>					
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<?php $urlName = @end( explode( "/",$_SERVER['PHP_SELF'])); ?>
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
					   <?php $active = ($urlName=="dashboard") ? 'active' : '';?>
						<li><a href="<?php echo base_url(); ?>dashboard" class="<?php echo $active; ?>"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
						
					   <?php $active = ($urlName=="products") ? 'active' : '';?>
						<li><a href="<?php echo base_url(); ?>products" class="<?php echo $active; ?>"><i class="fa fa-cubes"></i><span>Add Products</span></a></li>
						
					   <?php $active = ($urlName=="productlist") ? 'active' : '';?>
						<li><a href="<?php echo base_url(); ?>products/productlist" class="<?php echo $active; ?>"><i class="fa fa-list"></i><span>Products List</span></a></li>
						
					   
					</ul>
				</nav>
			</div>
		</div>	
		
		
