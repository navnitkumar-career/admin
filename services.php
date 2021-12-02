<?php
include("header.php");
?>
    <!-- Page Content -->
    <!-- <div class="page-heading header-text" style="background-image: url(assets/images/page-heading-bg.jpg);"> -->
    <div class="page-heading header-text" style="background-image: linear-gradient(45deg, #96c93d, #00b09b);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1>Our Services</h1>
            <span>We deliver wide range of services.</span>
          </div>
        </div>
      </div>
    </div>

    <div class="single-services">
      <div class="container">
        <div class="row page_content" id="tabs">
          <div class="col-md-4">
            <ul class="">
			<?php
                    $statement = $pdo->prepare("SELECT * FROM tbl_service");
                    $statement->execute();
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);   
                    $i=1;					
                    foreach ($result as $row) {
                        ?>
              <li><a href='#tabs-<?php echo $i;?>'><?php echo $row['title'];?><i class="fa fa-angle-right"></i></a></li>
					<?php $i+=1;} ?>
            </ul>
          </div>
          <div class="col-md-8">
            <section class='tabs-content'>
			<?php
                    $statement = $pdo->prepare("SELECT * FROM tbl_service");
                    $statement->execute();
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);   
                    $i=1;					
                    foreach ($result as $row) {
                        ?>
			
             <article id='tabs-<?php echo $i;?>'>
                <img src="assets/uploads/<?php echo $row['photo'];?>" alt="<?php echo $row['title'];?>">
                <h4><?php echo $row['title'];?></h4>
                <p><?php echo $row['content'];?></p>
              </article>
			  <?php $i+=1;} ?>
			  
            </section>
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