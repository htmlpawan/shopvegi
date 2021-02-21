<!-- start header -->
<?php include('header.php') ?>
<!-- end header -->
<section id="home-section" class="hero">
	<div class="home-slider owl-carousel" style="height: 0px !important;">
		<div class="slider-item" style="background-image: url(images/bg_1.jpg);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

					<!-- <div class="col-md-12 ftco-animate text-center">
						<h1 class="mb-2">We serve Fresh Vegestables &amp; Fruits</h1>
						<h2 class="subheading mb-4">We deliver organic vegetables &amp; fruits</h2>
						<p><a href="#" class="btn btn-primary">View Details</a></p>
					</div> -->

				</div>
			</div>
		</div>

		<div class="slider-item" style="background-image: url(images/bg_2.jpg);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

					<div class="col-sm-12 ftco-animate text-center">
						<h1 class="mb-2">100% Fresh &amp; Organic Foods</h1>
						<h2 class="subheading mb-4">We deliver organic vegetables &amp; fruits</h2>
						<p><a href="#" class="btn btn-primary">View Details</a></p>
					</div>

				</div>
			</div>
		</div>
	</div>
</section>


<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center mb-3 pb-3">
			<div class="col-md-12 heading-section text-center ftco-animate">
				<h2 class="mb-4" style="padding-top:30px;">Our Products</h2>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<?php $i= 1; foreach($data as $row){ ?>
			<div class="col-xs-6 col-sm-4 col-md-6 col-lg-3 ftco-animate">
				<div class="product">
					<a href="product/<?php echo $row['slug_url']; ?>">
						<div class="img-prod"><img class="img-fluid"
								src="<?php echo base_admin."products/".$row['image'];?>" alt="Colorlib Template">
							<div class="overlay"></div>
						</div>
					</a>
					<div class="text py-3 pb-4 px-3 text-center">
						<a href="product/<?php echo $row['slug_url']; ?>">
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
											<option value="4">250g</option>
											<option value="2">500g</option>
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
	</div>
</section>

<!-- <section class="ftco-section img" style="background-image: url(images/bg_3.jpg);">
	<div class="container">
		<div class="row justify-content-end">
			<div class="col-md-6 heading-section ftco-animate deal-of-the-day ftco-animate">
				<span class="subheading">Best Price For You</span>
				<h2 class="mb-4">Deal of the day</h2>
				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
				<h3><a href="#">Spinach</a></h3>
				<span class="price">$10 <a href="#">now $5 only</a></span>
				<div id="timer" class="d-flex mt-5">
					<div class="time" id="days"></div>
					<div class="time pl-3" id="hours"></div>
					<div class="time pl-3" id="minutes"></div>
					<div class="time pl-3" id="seconds"></div>
				</div>
			</div>
		</div>
	</div>
</section> -->

<hr>
<!-- start footer -->
<?php include('footer.php') ?>
<!-- end footer
