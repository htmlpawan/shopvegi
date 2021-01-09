<!DOCTYPE html>
<html lang="en">
  <head>

		<?php include('header.php'); ?>
<style>
	.ftco-cart button{
		width:54px !important;
	}
	.btn:focus, .btn.focus{
		box-shadow: 0 0 0 0.2rem rgb(130 174 70);
	}
</style>
    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
            <h1 class="mb-0 bread">My Cart</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-cart">
			<div class="container desktop_view">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list" style="overflow: hidden;">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>&nbsp;</th>
										<th>Product name</th>
										<th>Weight</th>
						        <th>Price</th>
						        <th style="text-align: left;">Quantity</th>
						        <th>Total</th>
						      </tr>
						    </thead>
						    <tbody>
                            <?php $i= 1; foreach($data as $row){ ?>
						      <tr class="text-center" id="closeid<?php echo $row['id']; ?>">
						        <td class="product-remove"  onclick="removeCartitem(<?php echo $row['id']; ?>)"><a style="cursor:pointer;"><span  class="ion-ios-close"></span></a></td>
						        
						        <td class="image-prod"><div class="img" style="background-image:url(<?php echo base_admin."products/".$row['img'];?>);"></div></td>
						        
						        <td class="product-name">
						        	<h3><?php echo $row['pro_name']; ?></h3>
						        </td>
										
							<td><?php echo ($row['weight']==1) ? '1kg' : 1000/$row['weight'].'g'; ?></td>

						        <td class="price">&#8377; <?php echo $row['price']; ?></td>
						        
						        <td class="quantity">
								<div class="input-group mb-3">
									<span class="input-group-btn mr-2">
										<button onclick="quantityMinus(<?php echo $row['id']; ?>)" type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
									<i class="ion-ios-remove"></i>
										</button>
										</span>
									<input type="text" id="quantity<?php echo $row['id']; ?>" name="quantity" class="form-control input-number" value="<?php echo $row['quantity']; ?>" min="1" max="10" readonly>
									<span class="input-group-btn ml-2">
										<button onclick="quantityPlus(<?php echo $row['id']; ?>)" type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
										<i class="ion-ios-add"></i>
									</button>
									</span>
								</div>
						        	<!-- <div class="input-group mb-3">
					             	<input realonly type="text" name="quantity" class="quantity form-control input-number" value="1" min="1" max="10">
					          	</div> -->
					          </td>
						        <td id="totalrow<?php echo $row['id']; ?>">&#8377; <?php echo $row['price']*$row['quantity']; ?></td>
						      </tr><!-- END TR-->
							<?php } ?>
						    </tbody>
						  </table>
					  </div>
    			</div>
			</div>
		</div>
           <div class="container mobile_view">
		   <?php $i= 1; foreach($data as $row){ ?>
			<div class="row" id="closeid<?php echo $row['id']; ?>" style="border-bottom: solid 0.5px #ccc; padding: 7px 7px 12px 7px; font-family: sans-serif;">
				<div class="col-xs-4" style="align-items: center;display: flex;">
				<img class="img-fluid" src="<?php echo base_admin."products/".$row['img'];?>">
				</div>
				<div class="col-xs-8" style="padding: 0;">
				<div style="display: flex;">
				<div style="width: 85%;"><?php echo $row['pro_name']; ?></div><div onclick="removeCartitem(<?php echo $row['id']; ?>)" style="color: red;"><i class="fa fa-trash" aria-hidden="true"></i></div>
				</div>
				<div><?php echo ($row['weight']==1) ? '1kg' : 1000/$row['weight'].'g'; ?> &#8377; <?php echo $row['price']; ?> </div>
				    <div style="display: flex;align-items: center; margin-top: 15px;">
						<div class="input-group" style="width: 80%;">
							<span class="input-group-btn mr-2">
								<button onclick="quantityMinus(<?php echo $row['id']; ?>)" type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
							<i class="ion-ios-remove"></i>
								</button>
							</span>
							<input type="text" id="quantity<?php echo $row['id']; ?>" name="quantity" class="form-control input-number" value="<?php echo $row['quantity']; ?>" min="1" max="10" readonly>
							<span class="input-group-btn ml-2">
							<button onclick="quantityPlus(<?php echo $row['id']; ?>)" type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
								<i class="ion-ios-add"></i>
							</button>
							</span>
						   </div>
						   <div id="totalrow<?php echo $row['id']; ?>" style="font-size: 18px;font-weight: 500;">&#8377; <?php echo $row['price']*$row['quantity']; ?>
							</div>
						</div>
				</div>
			</div>
			<?php } ?>
			</div>

    		<div class="container row justify-content-end mobileView">
    			<div class="col-lg-4 cart-wrap ftco-animate" id="cart-wrap">
    				<div class="cart-total mb-3">
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
    				</div>
    				<p style="text-align:center;"><a style="width: 80%;" href="<?php echo base_url(); ?>checkout" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
    			</div>
    		</div>

	</section>

		 <?php include('footer.php'); ?>
		 
		 <script>
		  reload();
		  
			var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
			if(width <768){
				$(".desktop_view").remove();
			}

		var quantitiy=1;
		   function quantityPlus(id){
		        
		        // Get the field name
		        var quantity = parseInt($('#quantity'+id).val());
		        
				// If is not undefined
		            if(quantity<5){
					$('#quantity'+id).val(quantity + 1);
						$.ajax({
							url: "http://localhost/vegefoods/quantity-update",
							type: "post",
							data: {cartid:id, quantity:quantity+1},
							success: function(d) {
								d = JSON.parse(d);
							console.log(d);
							document.getElementById("totalrow"+id).innerHTML = "&#8377; "+d.quantityrow;
							document.getElementById("subtotal").innerHTML = "&#8377; "+d.subtotal;
							document.getElementById("deliveryCh").innerHTML = "&#8377; "+d.delivery;
							document.getElementById("total").innerHTML = "&#8377; "+d.total;
							}
						});
					}

		          
		            // Increment
		        
		    }

		     function quantityMinus(id){
		        // Stop acting like a button
		        // Get the field name
		        var quantity = parseInt($('#quantity'+id).val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>1){
					$('#quantity'+id).val(quantity - 1);
					$.ajax({
							url: "http://localhost/vegefoods/quantity-update",
							type: "post",
							data: {cartid:id, quantity:quantity-1},
							success: function(d) {
							d = JSON.parse(d);
							console.log(d);
							document.getElementById("totalrow"+id).innerHTML = "&#8377; "+d.quantityrow;
							document.getElementById("subtotal").innerHTML = "&#8377; "+d.subtotal;
							document.getElementById("deliveryCh").innerHTML = "&#8377; "+d.delivery;
							document.getElementById("total").innerHTML = "&#8377; "+d.total;
							}
						});
		            }
			}
			
			function reload(){
				var total = "<?php echo $subtotal; ?>";
				if(total==0){
                   $("#cart-wrap").hide();
				}

				var de=0; 
				if(total<150){
					de = 40; 
					}else{
						de = 0;
					}
					document.getElementById("subtotal").innerHTML = "&#8377; "+total;
					document.getElementById("deliveryCh").innerHTML = "&#8377; "+de;
					document.getElementById("total").innerHTML = "&#8377; "+ (parseInt(total)+parseInt(de));
			}

		    
	
	</script>
    
  