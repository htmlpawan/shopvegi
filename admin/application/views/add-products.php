<!doctype html>
<html lang="en">

<head>
	<title>KT Export - Add Products</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
    <?php include("header.php"); ?>
	<style>
	.panel .panel-heading button{
    padding: 5px 18px !important;
	}
	.form-control {
		margin-bottom:20px;
	}
	</style>
</head>

<body>

   	<!-- WRAPPER -->
	<div id="wrapper">
	<!-- NAVBAR -->
		<?php include('menu.php'); ?>
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
				<div class="row">
				   <div class="col-md-4">
					<h3 class="page-title">Add Products</h3>
					</div>
				   <div class="col-md-6">
					<h3 class="page-title msgerror"><?php 
					echo $this->session->flashdata('messageadd');
						 ?></h3>
					</div>
				</div>	
					<div class="panel panel-headline">
						<div class="panel-body">
						<form class="form-auth-small" action="<?php echo base_url(); ?>products/validation_product" method="POST" enctype="multipart/form-data">

						<div>Title</div>
						<input type="text" class="form-control" name="title" id="title" placeholder="Enter Title" value="<?php echo @$row['title'];?>">
						
						<div>Price 1KG</div>
						<input type="number" class="form-control" name="price" id="price" placeholder="Enter Price" value="<?php echo @$row['price'];?>">

						<div>Discount Price 1KG</div>
						<input type="number" class="form-control" name="discount_price" id="discount-price" placeholder="Enter Discount-price" value="<?php echo @$row['discount_price'];?>">

						<div>Total Prodcut of KG</div>
						<input type="number" class="form-control" name="weight" id="weight" placeholder="Enter weight" value="<?php echo @$row['weight'];?>">

						<div hidden>Quantity</div>
						<input type="number" class="form-control" name="quantity" id="quantity" placeholder="Enter quantity" value="<?php echo @$row['quantity'];?>" style="display:none;">

						<div>Description</div>
						<input type="text" class="form-control" name="description" id="description" placeholder="Enter Description" value="<?php echo @$row['description'];?>">


						<div>Image</div>
						<input type="file" class="form-control" name="product_img"/>

						<input type="hidden" name="editid" value="<?php echo @$row['id'];?>">



						<button type="submit" class="btn btn-primary" name="submit">Submit</button>
						</form>
					</div>
						
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
	</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	 <?php include("footer.php"); ?>
	
	<script>
	var cate = "<?php echo @$row['category']; ?>";
	console.log(cate);
	if(cate){
	$("#category").val(cate);
	}
	
	 $(document).ready(function () {
	 $('#summernote').summernote({
		  placeholder: 'Enter Description',
		  height: 200,
		   followingToolbar: false
	 });	
	 
	 $('#keyfeatures').summernote({
		  placeholder: 'Enter key features',
		  height: 100,
		   followingToolbar: false
	 });
	 
	 $('#specification').summernote({
		  placeholder: 'Enter Specification',
		  height: 100,
		   followingToolbar: false
	 });
	 
	 $('#application').summernote({
		  placeholder: 'Enter application',
		  height: 100,
		   followingToolbar: false
	 });
	 
	setTimeout(function(){
		$(".message_error").fadeOut();
	},8000);
	});
	</script>
</body>

</html>