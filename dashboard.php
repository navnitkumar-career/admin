<?php require_once('header.php'); ?>

<?php
// Check if the customer is logged in or not
if(!isset($_SESSION['customer'])) {
    header('location: '.BASE_URL.'logout.php');
    exit;
} else {
    // If customer is logged in, but admin make him inactive, then force logout this user.
    $statement = $pdo->prepare("SELECT * FROM tbl_customer WHERE cust_id=? AND cust_status=?");
    $statement->execute(array($_SESSION['customer']['cust_id'],0));
    $total = $statement->rowCount();
    if($total) {
        header('location: '.BASE_URL.'logout.php');
        exit;
    }
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
  <a href="dashboard.php" class="active"><?php echo LANG_VALUE_89; ?></a>
  <a href="customer-profile-update.php"><?php echo LANG_VALUE_117; ?></a>
  <a href="customer-billing-shipping-update.php"><?php echo LANG_VALUE_88; ?></a>
  <a href="customer-password-update.php"><?php echo LANG_VALUE_99; ?></a>
  <a href="customer-order.php"><?php echo LANG_VALUE_24; ?></a>
  <a href="logout.php"><?php echo LANG_VALUE_14; ?></a>
</div>
		  </div>
          <div class="col-md-8">
           <div class="jumbotron">
              <h3><?php echo "Hi ".$_SESSION['customer']['cust_name']."," ?></h3>
              <p>Welcome to the Dashboard.</p>
           </div>
		  </div>
        </div>
      </div>
    </div>
<BR>
<?php require_once('footer.php'); ?>