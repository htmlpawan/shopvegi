<?php include('header.php'); ?>

<div class="hero-wrap hero-bread" style="background-image: url('<?php echo base_url(); ?>images/bg_1.jpg');">
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span class="mr-2"><a
							href="index.html">Product</a></span> <span>Product Single</span></p>
				<h1 class="mb-0 bread">Product Single</h1>
			</div>
		</div>
	</div>
</div>

<section class="ftco-section">
	<div class="container">
		<div class="row" style="padding-top:50px;">
			<div class="col-lg-6 mb-5 ftco-animate">
				<a href="<?php echo base_admin."products/".$data['image'];?>" class="image-popup"><img
						src="<?php echo base_admin."products/".$data['image'];?>" class="img-fluid"
						alt="Colorlib Template"></a>
			</div>
			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
				<h3><?php echo $data['title']; ?></h3>

				<p class="price">
					<?php if($data['discount_price'] != 0){ ?>
					<span class="mr-2 price-dc">&#8377;<span class="mr-2 price-dc"
							id="desc00"><?php echo $data['price']/4; ?></span></span>
					<span class="price-sale">&#8377;<span
							id="price00"><?php echo $data['discount_price']/4; ?></span></span>
					<?php } else { ?>
					<span class="price-sale">&#8377;<span id="price00"><?php echo $data['price']/4; ?></span></span>
					<?php } ?>
				</p>

				<div class="row mt-4">
					<div class="col-md-6">
						<div class="form-group d-flex">
							<div class="select-wrap">
								<div class="icon"><span class="ion-ios-arrow-down"></span></div>
								<select name="" class="form-control" id="weight00" class="selectbox"
									onchange="selectWeightSingle(<?php echo $data['id']; ?>)">
									<option value="4">250gm</option>
									<option value="2">500gm</option>
									<option value="1">1 Kg</option>
								</select>
							</div>
						</div>
					</div>
					<div class="w-100"></div>
					<div class="input-group col-md-6 d-flex mb-3">
						<span class="input-group-btn mr-2">
							<button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
								<i class="ion-ios-remove"></i>
							</button>
						</span>
						<input type="number" id="quantity00" name="quantity" class="form-control input-number" value="1"
							min="1" max="10" readonly>
						<span class="input-group-btn ml-2">
							<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
								<i class="ion-ios-add"></i>
							</button>
						</span>
					</div>
					<div class="w-100"></div>
					<div class="col-md-12">
						<!-- <p style="color: #000;">600 kg available</p> -->
						<!-- <p style="color: red;">Not available</p> -->
					</div>
				</div>
				<p>

				<?php if(@$_SESSION['logid']){ ?>
				<a onclick="addinner(<?php echo $data['id']; ?>)" class="btn btn-black py-3 px-5">Add to Cart</a>
				<?php }else{ ?>
				<a data-toggle="modal" data-target="#myModal" class="btn btn-black py-3 px-5">Add to Cart</a>
				<?php } ?>
				</p>

			</div>
		</div>
	</div>
</section>

<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center mb-3 pb-3">
			<div class="col-md-12 heading-section text-center ftco-animate">

				<h2 class="mb-4">Related Products</h2>
				<!-- <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p> -->
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<?php $i= 1; foreach($data1 as $row){ ?>
			<div class="col-xs-6 col-sm-4 col-md-6 col-lg-3 ftco-animate">
				<div class="product">
					<a href="<?php echo $row['slug_url']; ?>">
						<div class="img-prod"><img class="img-fluid"
								src="<?php echo base_admin."products/".$row['image'];?>" alt="Colorlib Template">
							<div class="overlay"></div>
						</div>
					</a>
					<div class="text py-3 pb-4 px-3 text-center">
						<a href="<?php echo $row['slug_url']; ?>">
							<h3><?php echo $row['title']; ?></h3>
						</a>
						<div class="d-flex">
							<div class="pricing">
								<p class="price">
									<?php if($row['discount_price'] != 0){ ?>
									<span class="mr-2 price-dc">&#8377;<span
											id="desc<?php echo $i; ?>"><?php echo $row['price']/4; ?></span></span>
									<span class="price-sale">&#8377;<span
											id="price<?php echo $i; ?>"><?php echo $row['discount_price']/4; ?></span></span>
									<?php } else { ?>
									<span class="price-sale">&#8377;<span
											id="price<?php echo $i; ?>"><?php echo $row['price']/4; ?></span></span>
									<?php } ?> <span class="select-wrap">
										<select name="weight" id="weight<?php echo $i; ?>" class="selectbox"
											onchange="selectWeight(<?php echo $i; ?>, <?php echo $row['id']; ?>)">
											<option value="4">250gm</option>
											<option value="2">500gm</option>
											<option value="1">1 Kg</option>
										</select>
									</span>

									<?php if(@$_SESSION['logid']){ ?>
									<div class="addCart"><button
											onclick="addmin(<?php echo $i; ?>, <?php echo $row['id']; ?>)"
											class="btn btn-primary">Add</button></div>
									<?php }else{ ?>
									<div class="addCart"><button data-toggle="modal" data-target="#myModal"
											class="btn btn-primary">Add</button></div>
									<?php } ?>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php $i++; } ?>
		</div>
</section>



<?php include('footer.php'); ?>

<script>
	$(document).ready(function () {

		var quantitiy = 1;
		$('.quantity-right-plus').click(function (e) {

			// Stop acting like a button
			e.preventDefault();
			// Get the field name
			var quantity = parseInt($('#quantity00').val());

			// If is not undefined
			if (quantity < 5) {
				$('#quantity00').val(quantity + 1);
			}


			// Increment

		});

		$('.quantity-left-minus').click(function (e) {
			// Stop acting like a button
			e.preventDefault();
			// Get the field name
			var quantity = parseInt($('#quantity00').val());

			// If is not undefined

			// Increment
			if (quantity > 1) {
				$('#quantity00').val(quantity - 1);
			}
		});

	});

</script>
