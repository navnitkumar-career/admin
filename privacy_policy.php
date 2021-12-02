<?php
include("header.php");
?>


    <!-- Page Content -->
    <!-- <div class="page-heading header-text" style="background-image: url(assets/uploads/<?php echo $privacy_policy_banner; ?>);"> -->
    <div class="page-heading header-text" style="background-image: linear-gradient(45deg, #1D976C, #93F9B9);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1><?php echo $privacy_policy_title; ?></h1>
            
          </div>
        </div>
      </div>
    </div>

    <div class="more-info about-info">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="more-info-content">
              <div class="row">
                <div class="col-md-12 align-self-center">
                  <div class="right-content page_content">
                    
                    <h2><?php echo $privacy_policy_title; ?></h2>
                    <p><?php echo $privacy_policy_content; ?></p>
                    
                  </div>
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
  
    <!-- Footer Starts Here -->
<?php
 include("footer.php");
 ?>