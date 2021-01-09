<!doctype html>
<html lang="en">

<head>
	<title>KT Export - Products List</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
   <?php include("header.php"); ?>
	<style>
	.product_image img{width:100%; height:auto;}
	.danger {
  border:none;
  color: #dc3545;
  margin:15px 95px;
  background:#ffffff;
}

.danger:hover {
  background: #f44336;
  color: #FFFFFF;
}
.proImg img{
    height: 195px;
	border: solid 1px #ccc;
    padding: 2px;
	-webkit-transform: scale(1);
	transform: scale(1);
	-webkit-transition: .3s ease-in-out;
	transition: .3s ease-in-out;
	}
	
.proImg:hover img {
	-webkit-transform: scale(1.3);
	transform: scale(1.05);
}
.imgstyle{
	width: 200px;
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
					<h3 class="page-title">Products List</h3>
					</div>
				   <div class="col-md-6">
						<h3 class="page-title msgerror"><?php 
					 echo $this->session->flashdata('messageadd');
						 ?></h3>
					</div>
					<div class="col-md-2">
					<div class="add-product">
					<a href="<?php echo base_url(); ?>products"><button type="submit" class="btn btn-info" name="submit" title="Add products"><i class='fa fa-plus'></i></button></a>
					</div>
					</div>
				</div>	
					<div class="panel panel-headline">
						<div class="panel-body">
						 <table class="table table-striped table-bordered" id="productList">
										<thead>
											<tr>
												<th>No.</th>
												<th>Title</th>
												<th>Price KG</th>
												<th>Discount KG</th>
												<th>Weight KG</th>
												<th>Image</th>
												<th>Edit</th>
												<th>Delete</th>
											</tr>
										</thead>
										<tbody>
										<?php
										$no=1;
										foreach($alldata as $row)
										{
											echo "<tr><td>".$no++."</td><td>".$row['title']."</td><td>".$row['price']."</td><td>".$row['discount_price']."</td><td>".$row['weight']."</td><td><img class='imgstyle' src=".base_url()."/uploads/products/".$row['image']."></td><td><a href='editproduct/".$row['id']."' class='btn btn-success'><i class='fa fa-pencil-square-o'></i></a></td>
											<td><button onclick='productdelete(".$row['id'].")' class='btn btn-danger'><i class='fa fa-trash-o'></i></button></td></tr>";
										} 
										?>
										</tbody>
										</table>
</div>
            </div>
        </div>
    </div>
    
</div>
<!-- The Modal -->
 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Alert</h4>
		  <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p>Are you sure delete you want to delete ?</p>
          <div class="text-center">
          <a class="btn btn-success" id="yes" name="yes">Yes</a>
          <button type="button" class="btn btn-danger" name="no" data-dismiss="modal">No</button>
        </div>
        </div>
      </div>
    </div>
  </div>
<!--Show image model-->
<div class="modal fade" id="imageModal" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
	  <h4 class="modal-title" style="float: left;">Product Images</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body product_image">
	 
      </div>
</div>
</div>
<!--Delete Image model-->
<div class="modal fade" id="deleteImg" role="dialog">
  <div class="modal-dialog alertBg">
    <div class="modal-content alertBg">
	 <!-- Modal Header -->
      <div class="modal-header" style="border-bottom: 1px solid #9c9d9f;">
	  <h4 class="modal-title">Alert</h4>
	  <button type="button" class="close deleteImg1">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
	 <p>Are you sure you want to Delete Image?</p>
	 <div class="text-center">
          <a class="btn btn-success" id="yes1" name="yes1">Yes</a>
          <button type="button" class="btn btn-danger deleteImg1" name="no">No</button>
        </div>
      </div>
  </div>
</div>
</div>

	<!-- Javascript -->
	 <?php include("footer.php"); ?>
	<script>
	function productdelete(id)
	{
		console.log(id);
		$("#yes").attr('href','deleteproduct/'+id);
		$("#myModal").modal('show');
	}
	
	function deleteImg(id)
	{
		$("#yes1").attr('href','deleteImage/'+id);
		$("#deleteImg").modal('show');
		
	}
	function showImage(id)
	{
		//console.log(id);
		$.ajax({
                url: "<?php echo base_url('products/showImage'); ?>",
                type: "post",
                data: {productid: id},
                success: function(data) {
					data  = JSON.parse(data);
					console.log(data);
					if(data)
					{
						var data1 ='<div class="row">';
						$(data['dataphoto']).each(function(i){
							data1 += '<div class="col-md-4 text-center" style="margin-bottom: 20px;"><div class="proImg"><img src="<?php echo base_url(); ?>uploads/products/'+data['dataphoto'][i]['image']+'"></div><button onclick="deleteImg('+data['dataphoto'][i]['id']+')" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button></div>';
						});
						data1 +="</div>";
						//console.log(data1);
						$(".product_image").html(data1);
						$("#imageModal").modal('show');
					}
					else{
                    alert("Image not found.");
					}		
		       
				}
            });
	}
	</script>
	<script>
	$(document).ready(function() {
    $('#productList').DataTable();
	
	setTimeout(function(){
		$(".message_error").fadeOut();
	},8000);
	});
	
	$(".deleteImg1").click(function(){
		$('#deleteImg').modal('hide');

	});
	
</script>
</body>

</html>
