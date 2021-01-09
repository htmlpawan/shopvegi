<!doctype html>
<html lang="en">

<head>
	<title>KT Export - Slider List</title>
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
					<h3 class="page-title">Slider List</h3>
					</div>
				   <div class="col-md-6">
						<h3 class="page-title msgerror"><?php 
					 echo $this->session->flashdata('messageadd');
						 ?></h3>
					</div>
					<div class="col-md-2">
					<div class="add-product">
					<a href="<?php echo base_url(); ?>products/slider"><button type="submit" class="btn btn-info" name="submit" title="Add products"><i class='fa fa-plus'></i></button></a>
					</div>
					</div>
				</div>	
					<div class="panel panel-headline ">
						<div class="panel-body">
						 <table class="table table-striped table-bordered" id="productList">
										<thead>
											<tr>
												<th>No.</th>
												<th>Title</th>
												<th>Image</th>
												<th>Status</th>
												<th>Delete</th>
											</tr>
										</thead>
										<tbody>
										<?php
										$no=1;
										foreach($alldata as $row)
										{
											echo "<tr><td>".$no++."</td><td>".$row['title']."</td><td style='width: 20%;'><img style='width: 50%;' src='".base_url()."uploads/banner/".$row['image']."'></td><td>";
											if($row['status']==1)
											echo"<label class='switch'><input type='checkbox' value=".$row['id']." name='status' class='status' checked><span class='slider round'></span></label>";
											else
											echo"<label class='switch'><input type='checkbox' value=".$row['id']." name='status' class='status'><span class='slider round'></span></label>";	
										
											echo "<td><button onclick='productdelete(".$row['id'].")' class='btn btn-danger'><i class='fa fa-trash-o'></i></button></td></tr>";
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

<!--Delete Image model-->


	<!-- Javascript -->
	 <?php include("footer.php"); ?>
	<script>
	function productdelete(id)
	{
		console.log(id);
		$("#yes").attr('href','deleteslider/'+id);
		$("#myModal").modal('show');
	}
	</script>
	<script>
	$(document).ready(function() {
    $('#productList').DataTable();
	
	setTimeout(function(){
		$(".msgerror").fadeOut();
	},8000);
	
	
		$(".status").change(function () {
		    var a = $(this).is(':checked');
			var stid = $(this).val(); 
			console.log(stid);
			console.log(a);
			
			 if(a==true)
	           var status = 1;
	          else
			  var status = 0;
		  
		  $.ajax({
                url: "<?php echo base_url('products/setStatus'); ?>",
                type: "post",
                data: {id: stid, status: status},
                success: function(data) {
					console.log(data);
					if(data)
					alert("Status updated successfully");
				    else
					alert("server error");
				}
				});
		    });
	});
	
	$(".deleteImg1").click(function(){
		$('#deleteImg').modal('hide');

	});
	
</script>
</body>

</html>
