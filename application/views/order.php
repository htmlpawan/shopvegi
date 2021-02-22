
    <?php include('header.php'); ?>
    
    <!-- <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Contact us</span></p>
            <h1 class="mb-0 bread">Contact us</h1>
          </div>
        </div>
      </div>
    </div> -->

    <section class="ftco-section contact-section bg-light">
      <div class="container" style="padding: 20px 0;">
         <div class="thank" style="font-size: 32px; font-weight: 600; text-align: center;">My Order</div>
         <?php foreach($data as $row){ ?>
         <div class="maino">
         <div class="col-md-2 col-xs-3" style="padding:0">
          <img src="<?php echo base_admin."products/".$row['image'];?>" style="width: 100%;">
         </div>
         <div class="col-md-4 col-xs-7">
           <div class="coloro1">Basket - <?php echo $row['itemno']; ?> Items</div>
           <div class="delio"><?php echo $row['itemno']; ?> Delivered</div>
           <div class="delio">Seller: Patel Bhaji Wala</div>
         </div>
         <div class="col-md-2 col-xs-2 coloro1">₹<?php echo $row['total']; ?></div>
         <div class="col-md-4 col-xs-12 text-center">
         
        <?php if($row['order_status']==0){ ?>
         <div class="coloro"><span class="status orderc"></span> Delivery expected by <?php echo date_format(date_create($row['insert_time']),"M d"); ?>  </div>
         <div style="font-size: 12px;">Your Order has been placed.</div>
         <div class="cencelitem"><i class="fa fa-times-circle" aria-hidden="true" style="font-size: 18px;margin-right: 5px;"></i>Cancel Item</div>
         <?php } else if($row['order_status']==2){  ?>
          <div class="coloro"><span class="status success1"></span> Delivered on <?php echo date_format(date_create($row['insert_time']),"M d, Y"); ?></div>
           <div style="font-size: 12px;">Your item has been delivered</div>
         <?php }else{ ?>
          <div class="coloro"><span class="status cancel1"></span> Cancelled</div>
           <div>Your item has been cancelled</div>
         <?php } ?> 

           <!-- 

           <div class="coloro"><span class="status return"></span> Return requested</div>
           <div style="font-size: 12px;">Shipment is cancelled</div>

           <div class="coloro"><span class="status cancel1"></span> Cancelled</div>
           <div>Your item has been cancelled</div> -->

         </div>
        </div>
        <?php } ?>

     </div>
    </section>

     <?php include('footer.php'); ?>
    
  

  