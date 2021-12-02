<?php
include("header.php");
?>


    <!-- Page Content -->
    <!-- <div class="page-heading header-text" style="background-image: url(assets/uploads/<?php echo $about_banner; ?>);"> -->
    <div class="page-heading header-text" style="background-image: linear-gradient(45deg, #56ab2f, #a8e063);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1><?php echo $about_title; ?></h1>
            
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
                    
                    <h2><?php echo $about_title; ?></h2>
                    <p><?php echo $about_content; ?></p>
                    
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="team">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Our <em>Leadership</em></h2>
              
            </div>
          </div>
           <?php
                    $statement = $pdo->prepare("SELECT * FROM tbl_leadership");
                    $statement->execute();
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
                    foreach ($result as $row) {
                        ?>
          <div class="col-md-4">
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

    <div class="testimonials">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>What they say <em>about us</em></h2>
              <span>testimonials from our greatest clients</span>
            </div>
          </div>
          <div class="col-md-12">
            <div class="owl-testimonials owl-carousel">
              
              <div class="testimonial-item">
                <div class="inner-content">
                <img src="http://placehold.it/60x60" alt="">
                  <p>"Nulla ullamcorper, ipsum vel condimentum congue, mi odio vehicula tellus, sit amet malesuada justo sem sit amet quam. Pellentesque in sagittis lacus."</p>
                  <h4>George Walker</h4>
                  <span>Chief Financial Analyst</span>
                </div>
          
              </div>
              
              <div class="testimonial-item">
                <div class="inner-content">
                <img src="http://placehold.it/60x60" alt="">
                  <p>"In eget leo ante. Sed nibh leo, laoreet accumsan euismod quis, scelerisque a nunc. Mauris accumsan, arcu id ornare malesuada, est nulla luctus nisi."</p>
                  <h4>John Smith</h4>
                  <span>Market Specialist</span>
                </div>
            
              </div>
              
              <div class="testimonial-item">
                <div class="inner-content">
                <img src="http://placehold.it/60x60" alt="">
                  <p>"Ut ultricies maximus turpis, in sollicitudin ligula posuere vel. Donec finibus maximus neque, vitae egestas quam imperdiet nec. Proin nec mauris eu tortor consectetur tristique."</p>
                  <h4>David Wood</h4>
                  <span>Chief Accountant</span>
                </div>

              </div>
              
              <div class="testimonial-item">
                <div class="inner-content">
                <img src="http://placehold.it/60x60" alt="">
                  <p>"Curabitur sollicitudin, tortor at suscipit volutpat, nisi arcu aliquet dui, vitae semper sem turpis quis libero. Quisque vulputate lacinia nisl ac lobortis."</p>
                  <h4>Andrew Boom</h4>
                  <span>Marketing Head</span>
                </div>
            
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