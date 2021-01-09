<?php include('header.php'); ?>

<div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Products</span></p>
				<h1 class="mb-0 bread">Products</h1>
			</div>
		</div>
	</div>
</div>

<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center">
			<!-- <div class="col-md-10 mb-5 text-center">
    				<ul class="product-category">
    					<li><a href="#" class="active">All</a></li>
    					<li><a href="#">Vegetables</a></li>
    					<li><a href="#">Fruits</a></li>
    					<li><a href="#">Juice</a></li>
    					<li><a href="#">Dried</a></li>
    				</ul>
				</div> -->

		</div>
		<div class="row" style="padding-top:30px;">
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
		<div class="row mt-5">
			<div class="col text-center">
				<div class="block-27">
					<ul>
						<li><a href="#">&lt;</a></li>
						<li class="active"><span>1</span></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
						<li><a href="#">&gt;</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>

<?php include('footer.php'); ?>
