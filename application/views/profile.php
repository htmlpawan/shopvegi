
    <?php include('header.php'); ?>
    
    <style>
@media(min-width: 768px) {

.myModal1.modal {
	text-align: center;
	padding: 0 !important;
}

.myModal1.modal:before {
	content: '';
	display: inline-block;
	height: 100%;
	vertical-align: middle;
	margin-right: -4px;
}

.myModal1 .modal-dialog {
	display: inline-block;
	text-align: left;
	vertical-align: middle;
}
}

@media(max-width: 768px) {
.myModal1 {
	/* top: unset !important; */
  position:absolute;
  top: 50%;
}
}
</style>

    <section class="ftco-section contact-section bg-light">
      <div class="container" style="padding: 20px 0;">
         <div class="thank" style="font-size: 32px; font-weight: 600; text-align: center;">My Profile</div>
         <div class="maino1">
         <button type="button" class="btn edit_btn" onclick="editprofile(<?php echo $data['password']; ?>)">Edit</button>
         <div class="mainp">
             <div class="headp">Name</div>
             <div class="titlep"><?php echo $data['name']; ?></div>
         </div>
         <div class="mainp">
             <div class="headp">Mobile No</div>
             <div class="titlep"><?php echo $data['mobile']; ?></div>
         </div>
         <div class="mainp">
             <div class="headp">Email ID</div>
             <div class="titlep"><?php echo $data['email']; ?></div>
         </div>
         <div class="mainp">
             <div class="headp">Password</div>
             <div class="titlep" id="profilepass">12345662</div>
         </div>
        </div>
        <?php if($address){ ?>
        <div class="thank" style="font-size: 32px; font-weight: 600; text-align: center;">Address</div>
        <div class="maino1">
        <button type="button" class="btn edit_btn" onclick="editpr()">Edit</button>
         <div class="mainp">
             <div class="headp">Name</div>
             <div class="titlep"><?php echo $address[0]['name']; ?></div>
         </div>
         <div class="mainp">
             <div class="headp">Mobile No</div>
             <div class="titlep"><?php echo $address[0]['mobile']; ?></div>
         </div>
         <div class="mainp">
             <div class="headp">Address</div>
             <div class="titlep"><?php echo $address[0]['address']; ?></div>
         </div>
         <div class="mainp">
             <div class="headp">City</div>
             <div class="titlep"><?php echo $address[0]['city']; ?></div>
         </div>
         <div class="mainp">
             <div class="headp">Pincode</div>
             <div class="titlep"><?php echo $address[0]['pin_code']; ?></div>
         </div>
        </div>
        <?php } ?>
         <!-- Modal -->
	<div class="myModal1 modal fade" id="myModal1" role="dialog" data-keyboard="false" data-backdrop="static">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">

				<div class="modal-body">
					<h3 style="font-weight: 550;margin: 0 0 10px;color: #d9534f; font-size: 1.5rem;">Cancel Request </h3>
					<p style="color: rgb(0 0 0 / 91%);">Are you sure you want to cancel your order?</p>

					<div class="text-right">
						<button type="button" class="btn" style="background-color: transparent; color: #636566;"
							data-dismiss="modal">Not Now</button>
						<button type="button" class="btn" style="color: #1f5a99!important; background: transparent;"
							onclick="confirm()">Confirm</button>
					</div>
				</div>
			</div>

		</div>
	</div>

     </div>

  <!-- ------------------------------------------------------modal start  -->
    	<!-- Modal -->
    	<div class="modal fade" id="editmyModal" role="dialog">
    		<div class="modal-dialog">
    			<!-- Modal content-->
    			<div class="modal-content">
    				<form>
    					<div class="modal-header">
    						<h4 style="margin-right: 10px;">Edit Profile</h4>
    						<button type="button" class="close" data-dismiss="modal">&times;</button>
    					</div>
    					<div>
    						<div class="modal-body" style="padding: 2rem;">
    							<div class="row">
    								<div class="col-md-1"></div>
    								<div class="col-md-10">
    									<div class="loginModal input-group">
    										<input class="loginModal" type="text" id="ername" required>
    										<span class="loginModal highlight"></span>
    										<span class="loginModal bar"></span>
    										<label class="loginModal"><i class="fa fa-user" aria-hidden="true"
    												class="icon"></i> Full Name (optional)</label>
    										<span class="valid" id="emess1">Please enter name</span>
    									</div>
    								</div>
    								<div class="col-md-1"></div>
    							</div>
    							<div class="row">
    								<div class="col-md-1"></div>
    								<div class="col-md-10">
    									<div class="loginModal input-group">
    										<input class="loginModal" type="number" id="ermobile"
    											onkeypress="return isNumber(event)" required>
    										<span class="loginModal highlight"></span>
    										<span class="loginModal bar"></span>
    										<label class="loginModal"><i class="fa fa-mobile" aria-hidden="true"></i>
    											Mobile No (optional)</label>
    										<span class="valid" id="emess2">Please enter valid mobile no</span>
    									</div>
    								</div>
    								<div class="col-md-1"></div>
    							</div>
    							<div class="row">
    								<div class="col-md-1"></div>
    								<div class="col-md-10">
    									<div class="loginModal input-group">
    										<input class="loginModal" type="text" id="eremail" required>
    										<span class="loginModal highlight"></span>
    										<span class="loginModal bar"></span>
    										<label class="loginModal"><i class="fa fa-envelope" aria-hidden="true"></i>
    											Email ID (optional)</label>
    										<span class="valid" id="emess3">Please enter valid email-id</span>
    									</div>
    								</div>
    								<div class="col-md-1"></div>
    							</div>
    							<div class="row">
    								<div class="col-md-1"></div>
    								<div class="col-md-10">
    									<div class="loginModal input-group">
    										<input class="loginModal" type="password" id="erpassword" required>
    										<span class="loginModal highlight"></span>
    										<span class="loginModal bar"></span>
    										<label class="loginModal"><i class="fa fa-unlock-alt" aria-hidden="true">
    											</i> Old Password <span style="color:red;">*</spna></label>
    										<span class="valid" id="emess4">Please enter Old password</span>
    									</div>
    								</div>
    								<div class="col-md-1"></div>
    							</div>
    							<div class="row">
    								<div class="col-md-1"></div>
    								<div class="col-md-10">
    									<div class="loginModal input-group">
    										<input class="loginModal" type="password" id="ercon_password" required>
    										<span class="loginModal highlight"></span>
    										<span class="loginModal bar"></span>
    										<label class="loginModal"><i class="fa fa-unlock-alt"
    												aria-hidden="true"></i> New Password (optional)</label>
    										<span class="valid" id="emess5">Please enter New password optional</span>
    									</div>
    								</div>
    								<div class="col-md-1"></div>
    							</div>
								<div class='eemailRerror'>Sorry...Email-id already registered</div>
								<div class='emobileRerror'>Sorry...Mobile already taken</div>
    						</div>

    						<div class="modal-footer">
    							<div class="log">
    								<input type="button" class="btn btn-success" value="Update" onclick="editRegister()">
    							</div>
    						</div>
    					</div>
    				</form>
    			</div>

    		</div>
    	</div>
    	</div>
    	<!-- ---------------------------------------------------------modal end  -->
    </section>
  <script>
      var pass= '<?php echo $data['password']; ?>';
      var pass1 = pass.replace(/^(.)(.*)(..*)$/,(_, a, b, c) => a + b.replace(/./g, '*') + c);
      console.log(pass1);
      document.getElementById('profilepass').innerHTML= pass1;
      </script>
     <?php include('footer.php'); ?>
    
  

  