<?php include('header.php'); ?>

<div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checkout</span></p>
				<h1 class="mb-0 bread">Checkout</h1>
			</div>
		</div>
	</div>
</div>

<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-xl-7 ftco-animate">
				<div  class="billing-form">
					<h3 class="mb-4 billing-heading">Billing Details</h3>
					<div class="row form-group" style='margin-bottom: 0;'>
					<form id="billId">
					<?php foreach($address as $add){ ?>
						<div class="col-md-6">
							<div class="radio">  
								<label style='display: flex; align-items: baseline;'><input type="radio" name="billadd" class="mr-2" value="<?php echo $add['id']; ?>" checked>
								<div><b><?php echo $add['name']; ?></b><br>
								Address: <?php echo $add['address']; ?>, Mumbai-400068 (Maharashtra)<br>
								Mobile: <?php echo $add['mobile']; ?></div>
							   </label>
							   <div class='btn btn-info' style="margin-bottom: 20px;" onclick="edit('<?php echo $add['name']; ?>','<?php echo $add['address']; ?>','<?php echo $add['mobile']; ?>','<?php echo $add['id']; ?>')">Edit Address</div>
							</div>
						</div>
					<?php } ?>
					</form>
					</div>

					<div class="row align-items-end" id='add_address'>
						<div class="col-md-6">
							<div class="form-group">
								<label for="firstname">Name<span style='color:red;'>*</spna></label>
								<input type="text" class="form-control" placeholder="First name" id="bil_name"
									value='<?php echo @$_SESSION['loname']; ?>'>
							</div>
							<span class="valid" id="bil_mess1">Please enter name</span>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="phone">Mobile<span style='color:red;'>*</spna></label>
								<input type="number" onkeypress="return isNumber1(event)" class="form-control" id="bil_mobile" placeholder="Mobile"
									value='<?php echo @$_SESSION['lomobile']; ?>'>
							</div>
							<span class="valid" id="bil_mess4">Please enter mobile no</span>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="streetaddress">Address<span style='color:red;'>*</spna></label>
								<input type="text" class="form-control" placeholder="House number and street name and Appartment, suite, unit etc"
									id="bil_address">
							</div>
							<span class="valid" id="bil_mess3">Please enter address</span>
						</div>
						<!-- <div class="col-md-6">
							<div class="form-group">
								<input type="text" class="form-control" id="bil_address2"
									placeholder="Appartment, suite, unit etc: (optional)">
							</div>
							<span class="valid" id="bil_mess35">&nbsp;</span>
						</div> -->
						<div class="w-100"></div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="towncity">Town / City</label>
								<input type="text" class="form-control" id="bil_city" placeholder="" value="Mumbai"
									readonly>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="postcodezip">Postcode / ZIP</label>
								<input type="text" class="form-control" id="bil_postcode" placeholder="" value="400068" readonly>
								<input type="hidden" id="bil_editid">
							</div>
						</div>
						<div class='btn btn-primary' onclick="saveAddress()">Save Address</div>
						<div class="w-100"></div>

					</div>
					
					</div><!-- END -->
			</div>
			<div class="col-xl-5">
				<div class="row mt-5 pt-3">
					<div class="col-md-12 d-flex mb-5">
						<div class="cart-detail cart-total p-3 p-md-4">
							<h3 class="billing-heading mb-4">Cart Total</h3>
							<p class="d-flex">
								<span>Subtotal</span>
								<span id="subtotal"></span>
							</p>
							<p class="d-flex">
								<span>Delivery</span>
								<span id="deliveryCh"></span>
							</p>
							<!-- <p class="d-flex">
		    						<span>Discount</span>
		    						<span>$3.00</span>
		    					</p> -->
							<hr>
							<p class="d-flex total-price">
								<span>Total</span>
								<span id="total"></span>
							</p>

							<!-- <div class="cart-total mb-3">
									<h3>Cart Totals</h3>
									<p class="d-flex">
										<span>Subtotal</span>
										<span id="subtotal"></span>
									</p>
									<p class="d-flex">
										<span>Delivery</span>
										<span id="deliveryCh"></span>
									</p>
									<hr>
									<p class="d-flex total-price">
										<span>Total</span>
										<span id="total"></span>
									</p>
								</div> -->
						</div>
					</div>
					<div class="col-md-12">
						<div class="cart-detail p-3 p-md-4">
							<div class="billing-heading">Payment Method</div>
							<form id="methodpay">
							<div class="form-group" style='margin-bottom: 0;'>
								<div class="col-md-12">
									<div class="radio">
										<label><input type="radio" name="optradio" value="cash" class="mr-2" checked>Cash Payment</label>
									</div>
								</div>
							</div>
							<div class="form-group" style='margin-bottom: 0;'>
								<div class="col-md-12">
									<div class="radio">
										<label><input type="radio" name="optradio" class="mr-2" value="upi"> Direct Google pay or UPI</label>
									</div>
								</div>
							</div>
					</form>

							<div>&nbsp;</div>
							<div class="btn btn-primary py-3 px-4" onclick="order()">Place an order</div>
						</div>
					</div>
				</div>
			</div> <!-- .col-md-8 -->
		</div>
	</div>
</section> <!-- .section -->
<script>
	reload();



	function reload() {
		var count = "<?php echo count($address); ?>";
		console.log(count);
		setTimeout(() => {
			if(parseInt(count)>0){
			$('#add_address').hide();
			}
		}, 500);
		

		var total = "<?php echo $subtotal; ?>";
		if (total == 0) {
			$("#cart-wrap").hide();
		}

		var de = 0;
		if (total < 150) {
			de = 40;
		} else {
			de = 0;
		}
		document.getElementById("subtotal").innerHTML = "&#8377; " + total;
		document.getElementById("deliveryCh").innerHTML = "&#8377; " + de;
		document.getElementById("total").innerHTML = "&#8377; " + (parseInt(total) + parseInt(de));
	}
	function edit(name, address, mobile, id){
		$('#add_address').show();
		document.getElementById("bil_name").value = name;
	    document.getElementById("bil_address").value = address;
		document.getElementById("bil_mobile").value = mobile;
		document.getElementById("bil_editid").value = id;
	}

</script>


<?php include('footer.php'); ?>
