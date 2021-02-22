<?php include('header.php'); ?>
    

    <section class="ftco-section ftco-cart">
    <div class="thank" style="padding: 20px 0; font-size: 32px; font-weight: 600; text-align: center;">Basket Items</div>
			<div class="container desktop_view">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list" style="overflow: hidden;">
	    				<table class="table mybastItem">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
										<th>Product name</th>
										<th>Weight</th>
						        <th>Price</th>
						        <th style="text-align: center;">Quantity</th>
						        <th>Total</th>
						      </tr>
						    </thead>
						    <tbody>
                            <?php $i= 1; foreach($data as $row){ ?>
						      <tr class="text-center" id="closeid<?php echo $row['id']; ?>">
						        
						        <td class="image-prod"><div class="img" style="background-image:url(<?php echo base_admin."products/".$row['img'];?>);"></div></td>
						        
						        <td class="product-name">
						        	<h3><?php echo $row['pro_name']; ?></h3>
						        </td>
										
							<td><?php echo ($row['weight']==1) ? '1kg' : 1000/$row['weight'].'g'; ?></td>

						        <td class="price">&#8377; <?php echo $row['price']; ?></td>
						        
						        <td>
                                <?php echo $row['quantity']; ?>
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
				<div style="width: 85%;"><?php echo $row['pro_name']; ?></div><div>&nbsp; </div>
				</div>
				<div><?php echo ($row['weight']==1) ? '1kg' : 1000/$row['weight'].'g'; ?> &#8377; <?php echo $row['price']; ?> </div>
				    <div style="display: flex;align-items: center; margin-top: 15px;">
						<div class="input-group" style="width: 80%;">
                        Quantity: <?php echo $row['quantity']; ?>
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
    
  