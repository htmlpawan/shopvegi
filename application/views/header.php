    <html lang="en">

    <head>
    	<title>Patel Bhaji Wala</title>
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    	<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap"
    		rel="stylesheet">
    	<link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    	<link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">
    	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    	<link rel="stylesheet" href="<?php echo base_url(); ?>css/open-iconic-bootstrap.min.css">
    	<link rel="stylesheet" href="<?php echo base_url(); ?>css/animate.css">

    	<link rel="stylesheet" href="<?php echo base_url(); ?>css/owl.carousel.min.css">
    	<link rel="stylesheet" href="<?php echo base_url(); ?>css/owl.theme.default.min.css">
    	<link rel="stylesheet" href="<?php echo base_url(); ?>css/magnific-popup.css">

    	<link rel="stylesheet" href="<?php echo base_url(); ?>css/aos.css">

    	<link rel="stylesheet" href="<?php echo base_url(); ?>css/ionicons.min.css">

    	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-datepicker.css">
    	<link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.timepicker.css">


    	<link rel="stylesheet" href="<?php echo base_url(); ?>css/flaticon.css">
    	<link rel="stylesheet" href="<?php echo base_url(); ?>css/icomoon.css">
    	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
    	<link rel="stylesheet" href="<?php echo base_url(); ?>css/css/globle.css">
    	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap1.min.css">
    	<link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery-ui.css">

    	<style>
    		span.price-dc {
    			text-decoration: line-through;
    			color: #b3b3b3 !important;
    		}
    	</style>
    </head>

    <body class="goto-here">
    	<div class="py-1 bg-primary">
    		<div class="container">
    			<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
    				<div class="col-lg-12 d-block">
    					<div class="row d-flex">
    						<div class="col-md pr-4 d-flex topper align-items-center">
    							<div class="icon mr-2 d-flex justify-content-center align-items-center"><span
    									class="icon-phone2"></span></div>
    							<span class="text">+91 916 7055 092</span>
    						</div>
    						<div class="col-md pr-4 d-flex topper align-items-center">
    							<div class="icon mr-2 d-flex justify-content-center align-items-center"><span
    									class="icon-paper-plane"></span></div>
    							<span class="text">pavitrap768@gmail.com</span>
    						</div>
    						<div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
    							<span class="text">3-5 Business days delivery &amp; Free Returns</span>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    		<div class="container">
    			<a class="navbar-brand" href="<?php echo base_url(); ?>"
    				style="font-family: math; font-size:28px;">Bhaji Wala</a>
    			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
    				aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
    				<span class="oi oi-menu"></span> Menu
    			</button>

    			<div class="collapse navbar-collapse" id="ftco-nav">
    				<div class="searchtop desktop_view">
    					<input id="autocomplete" class="inputmain">
    					<label for="autocomplete" class="searchBox"><i class="fa fa-search"></i></label>
    				</div>
    				<ul class="navbar-nav ml-auto">
    					<li class="nav-item active"><a href="<?php echo base_url(); ?>" class="nav-link">Home</a></li>
    					<li class="nav-item"><a href="<?php echo base_url(); ?>shop" class="nav-link">Shop</a></li>
    					<!-- <li class="nav-item"><a href="<?php echo base_url(); ?>about" class="nav-link">About</a></li> -->

    					<!-- <li class="nav-item"><a href="<?php echo base_url(); ?>wishlist" class="nav-link">Wishlist</a></li> -->
    					<?php if(@$_SESSION['name']){ ?>
    					<li class="nav-item"><a href="<?php echo base_url(); ?>cart" class="nav-link">Cart</a></li>
    					<?php } ?>
    					<li class="nav-item"><a href="<?php echo base_url(); ?>contact" class="nav-link">Contact</a>
    					</li>

    					<?php if(@$_SESSION['logid']){ ?>
    					<li class="nav-item cta cta-colored desktop_view1"><a href="<?php echo base_url(); ?>cart"
    							class="nav-link"><span class="icon-shopping_cart"></span><span
    								id="cartCount">[0]</span></a></li>
    					<?php }else{ ?>
    					<li class="nav-item cta cta-colored desktop_view1" style='cursor:pointer;' data-toggle="modal"
    						data-target="#myModal"><a class="nav-link"><span class="icon-shopping_cart"></span><span
    								id="cartCount">[0]</span></a></li>
    					<?php } ?>

    					<?php if(@$_SESSION['logid']){ ?>
    					<li class="nav-item dropdown" style="cursor:pointer;">
    						<a class="nav-link dropdown-toggle" id="dropdown04" data-toggle="dropdown"
    							aria-haspopup="true" aria-expanded="false"><?php echo @$_SESSION['name']; ?></a>
    						<div class="dropdown-menu" aria-labelledby="dropdown04">
								<a class="dropdown-item" onclick="myorder()">My Order</a>
								<a class="dropdown-item" href="<?php echo base_url(); ?>my-profile">Profile</a>
    							<a class="dropdown-item" onclick="logout()">Log out</a>
    						</div>
    					</li>
    					<?php  }else { ?>
    					<li class="nav-item" style="cursor:pointer;" data-toggle="modal" data-target="#myModal"><a
    							class="nav-link">Log in <?php echo @$_SESSION['logid']; ?> </a></li>
    					<?php } ?>

    				</ul>
    			</div>
    			<div class="searchtop mobile_view">
    				<input id="autocomplete10" class="inputmain">
    				<label for="autocomplete" class="searchBox"><i class="fa fa-search"></i></label>
    			</div>
    			<span class="nav-item cta cta-colored mobile_view"><a href="<?php echo base_url(); ?>cart"
    					class="nav-link cartnew"><span class="icon-shopping_cart"></span><span
    						id="cartCount10">[]</span></a></span>
    		</div>
    	</nav>


    	<!-- ------------------------------------------------------modal start  -->
    	<!-- Modal -->
    	<div class="modal fade" id="myModal" role="dialog">
    		<div class="modal-dialog">
    			<!-- Modal content-->
    			<div class="modal-content">
    				<form>
    					<div class="modal-header">
    						<h4 style="margin-right: 10px;" class="modal-title btn unactives activesign" id="login"
    							onclick="signbtn('logi')">Log in</h4>
    						<h4 class="modal-title btn unactives" id="signup" onclick="signbtn('regi')">Sign up</h4>
    						<button type="button" class="close" data-dismiss="modal">&times;</button>
    					</div>
    					<div id="mainlogin">
    						<div class="modal-body" style="padding: 2rem; padding-bottom: 0;">
    							<div class="row">
    								<div class="col-md-1"></div>
    								<div class="col-md-10">
    									<div class="loginModal input-group">
    										<input class="loginModal" type="text" id="lusername" required>
    										<span class="loginModal highlight"></span>
    										<span class="loginModal bar"></span>
    										<label class="loginModal">Your email</label>
    										<span class="valid" id="lmess1">Please enter valid email-id</span>
    									</div>
    								</div>
    								<div class="col-md-1"></div>
    							</div>
    							<div class="row">
    								<div class="col-md-1"></div>
    								<div class="col-md-10">
    									<div class="loginModal input-group">
    										<input class="loginModal" type="password" id="lpassword" required>
    										<span class="loginModal highlight"></span>
    										<span class="loginModal bar"></span>
    										<label class="loginModal">Your password</label>
    										<span class="valid" id="lmess2">Please enter password</span>
    									</div>
    								</div>
    								<div class="col-md-1"></div><br>
    							</div>

    							<div class='passerror'>Username & password incorrect</div>
    						</div>
    						<div class="modal-footer">
    							<div class="log">
    								<input type="button" class="btn btn-success" value="Login" onclick="login()">
    							</div>
    						</div>
    					</div>
    					<div id="mainsignup">
    						<div class="modal-body" style="padding: 2rem;">
    							<div class="row">
    								<div class="col-md-1"></div>
    								<div class="col-md-10">
    									<div class="loginModal input-group">
    										<input class="loginModal" type="text" id="rname" required>
    										<span class="loginModal highlight"></span>
    										<span class="loginModal bar"></span>
    										<label class="loginModal"><i class="fa fa-user" aria-hidden="true"
    												class="icon"></i> Full Name</label>
    										<span class="valid" id="mess1">Please enter name</span>
    									</div>
    								</div>
    								<div class="col-md-1"></div>
    							</div>
    							<div class="row">
    								<div class="col-md-1"></div>
    								<div class="col-md-10">
    									<div class="loginModal input-group">
    										<input class="loginModal" type="number" id="rmobile"
    											onkeypress="return isNumber(event)" required>
    										<span class="loginModal highlight"></span>
    										<span class="loginModal bar"></span>
    										<label class="loginModal"><i class="fa fa-mobile" aria-hidden="true"></i>
    											Mobile No</label>
    										<span class="valid" id="mess2">Please enter valid mobile no</span>
    									</div>
    								</div>
    								<div class="col-md-1"></div>
    							</div>
    							<div class="row">
    								<div class="col-md-1"></div>
    								<div class="col-md-10">
    									<div class="loginModal input-group">
    										<input class="loginModal" type="text" id="remail" required>
    										<span class="loginModal highlight"></span>
    										<span class="loginModal bar"></span>
    										<label class="loginModal"><i class="fa fa-envelope" aria-hidden="true"></i>
    											Email ID</label>
    										<span class="valid" id="mess3">Please enter valid email-id</span>
    									</div>
    								</div>
    								<div class="col-md-1"></div>
    							</div>
    							<div class="row">
    								<div class="col-md-1"></div>
    								<div class="col-md-10">
    									<div class="loginModal input-group">
    										<input class="loginModal" type="password" id="rpassword" required>
    										<span class="loginModal highlight"></span>
    										<span class="loginModal bar"></span>
    										<label class="loginModal"><i class="fa fa-unlock-alt" aria-hidden="true">
    											</i> Password</label>
    										<span class="valid" id="mess4">Please enter password</span>
    									</div>
    								</div>
    								<div class="col-md-1"></div>
    							</div>
    							<div class="row">
    								<div class="col-md-1"></div>
    								<div class="col-md-10">
    									<div class="loginModal input-group">
    										<input class="loginModal" type="password" id="rcon_password" required>
    										<span class="loginModal highlight"></span>
    										<span class="loginModal bar"></span>
    										<label class="loginModal"><i class="fa fa-unlock-alt"
    												aria-hidden="true"></i> Confirm Password</label>
    										<span class="valid" id="mess5">Please enter confirm password</span>
    									</div>
    								</div>
    								<div class="col-md-1"></div>
    							</div>
								<div class='emailRerror'>Sorry...Email-id already registered</div>
								<div class='mobileRerror'>Sorry...Mobile already taken</div>
    						</div>

    						<div class="modal-footer">
    							<div class="log">
    								<input type="button" class="btn btn-success" value="Sign Up" onclick="register()">
    							</div>
    						</div>
    					</div>
    				</form>
    			</div>

    		</div>
    	</div>
    	</div>
    	<!-- ---------------------------------------------------------modal end  -->