<?php
include("header.php");
?>
    <!-- Page Content -->
    <!-- <div class="page-heading header-text" style="background-image: url(assets/images/page-heading-bg.jpg);"> -->
    <div class="page-heading header-text" style="background-image: linear-gradient(45deg, #3CA55C, #B5AC49);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1>Contact Us</h1>
            <span>feel free to send us a message now!</span>
          </div>
        </div>
      </div>
    </div>

    <div class="contact-information m-0 ">
      <div class="container">
        <div class="row">
          <div class="col-md-12 page_content">
            <div class="row">
              <div class="col-md-4">
                <div class="contact-item">
                  <i class="fa fa-phone"></i>
                  <h4>Phone</h4>
                  <p>Vivamus ut tellus mi. Nulla nec cursus elit, id vulputate nec cursus augue.</p>
                  <a href="#">090-080-0760</a>
                </div>
              </div>
              <div class="col-md-4">
                <div class="contact-item">
                  <i class="fa fa-envelope"></i>
                  <h4>Email</h4>
                  <p>Vivamus ut tellus mi. Nulla nec cursus elit, id vulputate nec cursus augue.</p>
                  <a href="#">info@company.com</a>
                </div>
              </div>
              <div class="col-md-4">
                <div class="contact-item">
                  <i class="fa fa-map-marker"></i>
                  <h4>Location</h4>
                  <p>1020 New Mountain Street<br>Forest Park, FP 11220</p>
                  <a href="#">View on Google Maps</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
 
    <?php
	include("inquire_form.php");
	?>
    
    <div id="map">
<!-- How to change your own map point
	1. Go to Google Maps
	2. Click on your location point
	3. Click "Share" and choose "Embed map" tab
	4. Copy only URL and paste it within the src="" field below
-->

	 
    </div>

    <div class="partners contact-partners">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="owl-partners owl-carousel">
              <div class="partner-item">
                <img src="assets/images/client-01.png" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- Footer Starts Here -->
 <?php
 include("footer.php");
 ?>