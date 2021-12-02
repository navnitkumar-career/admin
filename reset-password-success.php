<?php require_once('header.php'); ?>

<?php
$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);                           
foreach ($result as $row) {
    $banner_forget_password = $row['banner_forget_password'];
}
?>


<div class="page-heading header-text" style="background-image: url(assets/uploads/<?php echo $banner_forget_password; ?>);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1><?php echo LANG_VALUE_149; ?></h1>
            
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
                  <div class="right-content">
                    
                    <h3> <span style="color:green;"><?php echo LANG_VALUE_146; ?></span></h3><br><br>
                     <h3> <a href="<?php echo BASE_URL; ?>login.php" style="font-weight:bold;"><?php echo LANG_VALUE_11; ?><i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i></a></h3><br><br>
                    
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


<?php require_once('footer.php'); ?>