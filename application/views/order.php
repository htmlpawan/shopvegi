
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
         <div class="thank" style="font-size: 32px; font-weight: 600; text-align: center;">My Order</div>
         <?php if($data){ foreach($data as $row){ ?>
         <div class="maino">
         <div class="col-md-2 col-xs-3" style="padding:0" onclick="orderlist(<?php echo $row['order_id']; ?>)">
          <img src="<?php echo base_admin."products/".$row['image'];?>" style="width: 100%;">
         </div>
         <div class="col-md-4 col-xs-7" onclick="orderlist(<?php echo $row['order_id']; ?>)">
           <div class="coloro1">Basket - <?php echo $row['itemno']; ?> Items</div>
           <div class="delio"><?php echo $row['itemno']; ?> Delivered</div>
           <div class="delio">Seller: Patel Bhaji Wala</div>
         </div>
         <div class="col-md-2 col-xs-2 coloro1" onclick="orderlist(<?php echo $row['order_id']; ?>)">₹<?php echo $row['total']; ?></div>
         <div class="col-md-4 col-xs-12 text-center">
         
        <?php if($row['order_status']==0){ ?>
         <div class="coloro"><span class="status orderc"></span> Delivery expected by <?php echo date_format(date_create($row['insert_time']),"M d"); ?>  </div>
         <div style="font-size: 12px;">Your Order has been placed.</div>
         <div class="cencelitem" onclick="cancelItem(<?php echo $row['order_id']; ?>)"><i class="fa fa-times-circle" aria-hidden="true" style="font-size: 18px;margin-right: 5px;"></i>Cancel Item</div>
         <?php } else if($row['order_status']==2){  ?>
          <div class="coloro"><span class="status success1"></span> Delivered on <?php echo date_format(date_create($row['insert_time']),"M d, Y"); ?></div>
           <div style="font-size: 12px;">Your item has been delivered</div>
         <?php }else{ ?>
          <div class="coloro"><span class="status cancel1"></span> Cancelled <?php echo date_format(date_create($row['insert_time']),"M d, Y"); ?></div>
           <div>Your item has been cancelled</div>
         <?php } ?> 

         </div>
        </div>
        <?php } }else{ ?>
          <div class="maino text-center">Your Order Is Currently Empty!</div>
        <?php }?>
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

  
    </section>

     <?php include('footer.php'); ?>
    
  

  