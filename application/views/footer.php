
<footer class="ftco-footer ftco-section">
      <div class="container">
      	<div class="row">
      		
      	</div>
        <div class="row mb-5">
          <div class="col-xs-8 col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2"><a href="<?php echo base_url(); ?>" style="font-family: math; font-size:22px;">Patel Bhaji Wala</a></h2>
              <!-- <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p> -->
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <!-- <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li> -->
              </ul>
            </div>
          </div>
          <div class="col-xs-4 col-md" style="padding:0px;">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Menu</h2>
              <ul class="list-unstyled">
                <li><a href="shop.php" class="py-2 d-block">Shop</a></li>
                <li><a href="about.php" class="py-2 d-block">About</a></li>
                <li><a href="contact.php" class="py-2 d-block">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">Dahisar (E), Vaishali nagar, Nitin company, Mumbai 400068</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+91 916 7055 092</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">pavitrap768@gmail.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
  <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="<?php echo base_url(); ?>js/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?php echo base_url(); ?>js/customfile.js"></script>
  <script src="<?php echo base_url(); ?>js/popper.min.js"></script>
  <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>js/jquery.easing.1.3.js"></script>
  <script src="<?php echo base_url(); ?>js/jquery.waypoints.min.js"></script>
  <script src="<?php echo base_url(); ?>js/jquery.stellar.min.js"></script>
  <script src="<?php echo base_url(); ?>js/owl.carousel.min.js"></script>
  <script src="<?php echo base_url(); ?>js/jquery.magnific-popup.min.js"></script>
  <script src="<?php echo base_url(); ?>js/aos.js"></script>
  <script src="<?php echo base_url(); ?>js/jquery.animateNumber.min.js"></script>
  <script src="<?php echo base_url(); ?>js/bootstrap-datepicker.js"></script>
  <script src="<?php echo base_url(); ?>js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="<?php echo base_url(); ?>js/google-map.js"></script>
  <script src="<?php echo base_url(); ?>js/main.js"></script>

  <script>
   function signbtn(id){
       console.log(id);
        if(id=="logi"){
        var element = document.getElementById("signup");
        element.classList.remove("activesign");
        var element = document.getElementById("login");
          element.classList.add("activesign");
          document.getElementById("mainsignup").style.display = "none";
          document.getElementById("mainlogin").style.display = "block";
          
        }
        else{
          var element = document.getElementById("login");
        element.classList.remove("activesign");
        var element = document.getElementById("signup");
          element.classList.add("activesign"); 
          document.getElementById("mainsignup").style.display = "block";
          document.getElementById("mainlogin").style.display = "none";
        }
    }

$( "#autocomplete" ).autocomplete({ source: function( request, response ) {
   $.ajax({
    url: "http://localhost/vegefoods/searchbox-array",
    type: 'post',
    dataType: "json",
    data: {
     search: request.term
    },
    success: function( data ) {
      console.log(data);
     response( data.slice(0, 8) );
    }
   });
  },
  select: function (event, ui) {
    window.location.assign("http://localhost/vegefoods/product/"+ui.item.name);
  }
 });

 $("#autocomplete10" ).autocomplete({
  source: function( request, response ) {
   $.ajax({
    url: "http://localhost/vegefoods/searchbox-array",
    type: 'post',
    dataType: "json",
    data: {
     search: request.term
    },
    success: function( data ) {
      console.log(data);
     response( data.slice(0, 8) );
    }
   });
  },
  select: function (event, ui) {
    window.location.assign("http://localhost/vegefoods/product/"+ui.item.name);
  }
 });

 function myorder(){
  window.location.href = 'http://localhost/vegefoods/my-order';
 }

</script>

  </body>
</html>