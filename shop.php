<?php require_once('header.php'); ?>
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
<!-- Page Content -->
    <div class="page-heading header-text" style="background-image: url(assets/images/page-heading-bg.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2><?php echo "KEC USER'S DASHBOARD"; ?></h2>
          </div>
        </div>
      </div>
    </div>

    <div class="single-services">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
		   <div class="vertical-menu">
		   <?php for($i=1;$i<9;$i+=1){ ?>
                 <a href="#"><?php echo "Product-".$i; ?></a>
		   <?php } ?>
</div>
		  </div>
          <div class="col-md-8">
          
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h4><?php echo $featured_product_title; ?></h4>
              <span><?php echo $featured_product_subtitle; ?></span>
            </div>
          </div>
		  <?php
                    $statement = $pdo->prepare("SELECT * FROM tbl_product WHERE p_is_active=? ");
                    $statement->execute(array(1));
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
      </div>
    </div>
<BR>
<?php require_once('footer.php'); ?>