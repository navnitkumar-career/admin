<?php
include("header.php");
?>
  <?php
$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row)
{
    $cta_title = $row['cta_title'];
    $cta_content = $row['cta_content'];
    $cta_read_more_text = $row['cta_read_more_text'];
    $cta_read_more_url = $row['cta_read_more_url'];
    $cta_photo = $row['cta_photo'];
    $featured_product_title = $row['featured_product_title'];
    $featured_product_subtitle = $row['featured_product_subtitle'];
    $latest_product_title = $row['latest_product_title'];
    $latest_product_subtitle = $row['latest_product_subtitle'];
    $popular_product_title = $row['popular_product_title'];
    $popular_product_subtitle = $row['popular_product_subtitle'];
    $total_featured_product_home = $row['total_featured_product_home'];
    $total_latest_product_home = $row['total_latest_product_home'];
    $total_popular_product_home = $row['total_popular_product_home'];
    $home_service_on_off = $row['home_service_on_off'];
    $home_welcome_on_off = $row['home_welcome_on_off'];
    $home_featured_product_on_off = $row['home_featured_product_on_off'];
    $home_latest_product_on_off = $row['home_latest_product_on_off'];
    $home_popular_product_on_off = $row['home_popular_product_on_off'];

}


?>

    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/7.3.1/swiper-bundle.min.css">

    <!-- Page Content -->
    <!-- Banner Starts Here -->
	
    <div class="swiper">
	<!-- Additional required wrapper -->
	<div class="swiper-wrapper">
		<!-- Slides -->
    <?php
        $i=0;
        $statement = $pdo->prepare("SELECT * FROM tbl_slider");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
        foreach ($result as $row) {            
        ?>

            <div class="swiper-slide">
              <div class="swiper-image" style="background-image:url(assets/uploads/<?php echo $row['photo']; ?>)"></div>
              <div class="overlay"></div>
              <div class="content-wrapper">
                <div class="content">
                  <h1><?php echo $row['heading']; ?></h1>
                  <p><?php echo nl2br($row['content']); ?></p>
                  <a href="<?php echo $row['button_url']; ?>" target="_blank" class="filled-button"><?php echo $row['button_text']; ?></a>
                </div>
              </div>
            </div>
        
          <?php
          $i++;
          }
          ?> 
            </div>
			<!-- <div class="swiper-image" style="background: url('https://www.specialized.com/medias/03-ROAD-3212-Hero-2800x1620.jpg?context=bWFzdGVyfGltYWdlc3w2OTkyMTN8aW1hZ2UvanBlZ3xpbWFnZXMvaGJhL2g5Yi85MTMxMDkzODUyMTkwLmpwZ3xjMDI3ZWM3OGVhMzZmMjY3NDcxYzg4OTQxNmM5YTFhMDU3OGY5MmQxOWRkMTcyMWQzZjYxNjFmMmI5NTdjOGU4') no-repeat right bottom; background-size:cover;"></div>
			<div class="overlay"></div>
			<div class="content-wrapper">
				<div class="content">
					<h1>THE ULTIMATE GETAWAY VEHICLE</h1>
					<p>With speed, control, and confidence on any terrain, Diverge is the most capable gravel bike ever made. Switching from Midwest gravel at Mach 5 to rutted single track with ease, nothing helps you escape faster than Diverge.</p>
					<a href="" class="button">Learn More</a>
				</div>
			</div>
		</div>
		<div class="swiper-slide">
			<div class="swiper-image" style="background: url('https://www.specialized.com/medias/07-ROAD-3300-TarmacStory-Hero-Handling-2800x1620.jpg?context=bWFzdGVyfGltYWdlc3w3MTc5NDN8aW1hZ2UvanBlZ3xpbWFnZXMvaDBmL2g4Yi85MTc1MzM1NTAxODU0LmpwZ3w0MDc5MjI3Y2QyMGFkMjVmN2NjMzVkN2U1YzJkNmE3N2Y0YWQ0ODIxNjVkYjhjODg1OGFjMjUzNGQxYjQ3ZTg2') no-repeat center center; background-size:cover;"></div>
			<div class="overlay"></div>
			<div class="content-wrapper content-right">
				<div class="content">
					<h1>ONE BIKE TO RULE THEM ALL</h1>
					<p>Morph Sagan’s superhuman speed with Alaphilippe’s climbing power and you’ve got the Tarmac SL7. The bike that knows no compromise. Climb on the lightest bike the rules allow, sprint on the fastest – all with legendary Tarmac handling. The only choice you need to make is when to attack.</p>
					<a href="" class="button">Learn More</a>
				</div>
			</div>
     </div>	 -->


	<!-- If we need pagination -->
	<div class="swiper-pagination"></div>
	<!-- If we need navigation buttons -->
	<div class="swiper-nav-wrapper">
		<div class="swiper-button-prev"></div>
		<div class="swiper-button-next"></div>
	</div>

	<!-- If we need scrollbar -->
	<div class="swiper-scrollbar"></div>
</div>

   <!-- If we need scrollbar -->
   <div class="swiper-scrollbar"></div>
        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
    </div>

    <!-- <div class="main-banner header-text" id="top">
        <div class="Modern-Slider">
        
		<?php
        $i=0;
        $statement = $pdo->prepare("SELECT * FROM tbl_slider");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
        foreach ($result as $row) {            
        ?>
          <div class="item">
            <div class="img-fill" style="background-image:url(assets/uploads/<?php echo $row['photo']; ?>);">
			   <div class="text-content">
                 
                  <h4><?php echo $row['heading']; ?></h4>
                  <p><?php echo nl2br($row['content']); ?></p>
                  <a href="<?php echo $row['button_url']; ?>" target="_blank" class="filled-button"><?php echo $row['button_text']; ?></a>
                </div>
            </div>
          </div>
		     <?php
            $i++;
        }
        ?>
		  
       
        </div>
    </div> -->
    <!-- Banner Ends Here -->

    <div class="request-form">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
              <h4>KISAN EXPERIENCE CENTER</h4>
            <span>Get in touch. We'd love to hear from you.</span>
          </div>
          <div class="col-md-4">
            <a href="contact.php" class="border-button">Contact Us</a>
          </div>
        </div>
      </div>
    </div>
    
	 <div class="more-info mt-80">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="more-info-content">
              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="left-image">
                    <img src="assets/images/more-info.jpg" alt="">
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 align-self-center">
                  <div class="right-content">
                    <span><?php echo $ksk_title;?></span>
                   
                    <p><?php echo substr($ksk_content,0,600); ?></p>
                    <a href="contact.php" class="filled-button">Apply Now</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
	
	 <div class="fun-facts">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="left-content">
              
              <h2><em><?php echo $bio_cng_title;?></em></h2>
              <p><?php echo substr($bio_cng_content,0,360)."..."; ?></p>
              <a href="bio-cng.php" class="filled-button">Read More</a>
            </div>
          </div>
          <div class="col-md-6 align-self-center">
            <div class="row">
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-12 col-sm-6 col-xs-12">
                    <div class="count-area-content">
                      <div class="count-digit">1945</div>
                      <div class="count-title">Total Clients</div>
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-6 col-xs-12">
                    <div class="count-area-content">
                      <div class="count-digit">1280</div>
                      <div class="count-title">Great Reviews</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 counter_section">
                <div class="row">
                  <div class="col-md-12 col-sm-6 col-xs-12">
                    <div class="count-area-content">
                      <div class="count-digit">578</div>
                      <div class="count-title">Projects Done</div>
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-6 col-xs-12">
                    <div class="count-area-content">
                      <div class="count-digit">26</div>
                      <div class="count-title">Ongoing Projects</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

   
	
<?php if($home_service_on_off == 1): ?>
    <div class="services">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h4>OUR SERVICES</h4>
              
            </div>
          </div>
		  <?php
                    $statement = $pdo->prepare("SELECT * FROM tbl_service limit 3");
                    $statement->execute();
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
                    foreach ($result as $row) {
                        ?>
          <div class="col-md-4">
            <div class="service-item">
              <img src="assets/uploads/<?php echo $row['photo'];?>" alt="<?php echo $row['title'];?>" height="256">
              <div class="down-content">
                <h4><?php echo $row['title'];?></h4>
                <p><?php echo substr($row['content'],0,220)."...";?></p>
                <a href="services.php" class="filled-button">Read More</a>
              </div>
            </div>
          </div>
					<?php } ?>
        </div>
      </div>
    </div>
<?php endif; ?>

<?php if($home_featured_product_on_off == 1): ?>
<div class="services">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h4><?php echo $featured_product_title; ?></h4>
              <span><?php echo $featured_product_subtitle; ?></span>
            </div>
          </div>
		  <?php
                    $statement = $pdo->prepare("SELECT * FROM tbl_product WHERE p_is_featured=? AND p_is_active=? LIMIT ".$total_featured_product_home);
                    $statement->execute(array(1,1));
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
                    foreach ($result as $row) {
                        ?>
          <div class="col-md-4">
            <div class="service-item">
              <img src="assets/uploads/<?php echo $row['p_featured_photo']; ?>" alt="" height="256">
              <div class="down-content">
                <h4><?php echo $row['p_name']; ?></h4>	
                <p><?php echo $row['p_short_description']; ?></p>
                <a href="shop.php" class="filled-button">View More</a>
              </div>
            </div>
          </div>
					<?php } ?>
        </div>
      </div>
    </div>
<?php endif; ?>

<div class="team">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Kisan -<em>Krishak talks</em></h2>
              
            </div>
          </div>
		
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="team-item">
			<iframe src="https://www.youtube.com/embed/gTcmABwnVGw" ></iframe>
            </div>
          </div>
		  
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="team-item">
			<iframe src="https://www.youtube.com/embed/sczRYq7u078"></iframe>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="team-item">
			<iframe src="https://www.youtube.com/embed/fCoyswzyTSE"></iframe>
            </div>
          </div>

		
        </div>
      </div>
    </div>

<div class="team mt-80">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Our <em>Leadership</em></h2>
              
            </div>
          </div>
           <?php
                    $statement = $pdo->prepare("SELECT * FROM tbl_leadership limit 3");
                    $statement->execute();
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
                    foreach ($result as $row) {
                        ?>
         <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="team-item">
              <img src="assets/uploads/<?php echo $row['photo'];?>" alt="<?php echo $row['title'];?>">
              <div class="down-content">
                <h4><?php echo $row['title'];?></h4>
                <span><?php echo $row['position'];?></span>
                <p><?php echo $row['content'];?></p>
              </div>
            </div>
          </div>
					<?php } ?>
		  
        </div>
      </div>
    </div>

   

     
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/7.3.1/swiper-bundle.min.js"></script>
        <script id="rendered-js">
            const swiper = new Swiper(".swiper", {
                // Optional parameters
                direction: "horizontal",
                loop: true,
                effect: "fade",
                fadeEffect: {
                crossFade: true },
                speed: 400,
                navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev" }
  
  
    // And if we need scrollbar
    /*scrollbar: {
       el: '.swiper-scrollbar',
     },*/ });
  //# sourceURL=pen.js
      </script>
  


    <?php
	include("inquire_form.php");
	?>
<!-- Footer Starts Here -->
 <?php
 include("footer.php");
 ?>

 