<?php 
include('header.php'); 
?>
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

<?php
if (isset($_POST['form1'])) {

    $valid = 1;

    if( empty($_POST['cust_password']) || empty($_POST['cust_re_password']) ) {
        $valid = 0;
        $error_message .= LANG_VALUE_138."<br>";
    }

    if( !empty($_POST['cust_password']) && !empty($_POST['cust_re_password']) ) {
        if($_POST['cust_password'] != $_POST['cust_re_password']) {
            $valid = 0;
            $error_message .= LANG_VALUE_139."<br>";
        }
    }
    
    if($valid == 1) {

        // update data into the database

        $password = strip_tags($_POST['cust_password']);
        
        $statement = $pdo->prepare("UPDATE tbl_customer SET cust_password=? WHERE cust_id=?");
        $statement->execute(array(md5($password),$_SESSION['customer']['cust_id']));
        
        $_SESSION['customer']['cust_password'] = md5($password);        

        $success_message = LANG_VALUE_141;
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
  <a href="dashboard.php"><?php echo LANG_VALUE_89; ?></a>
  <a href="customer-profile-update.php"><?php echo LANG_VALUE_117; ?></a>
  <a href="customer-billing-shipping-update.php"><?php echo LANG_VALUE_88; ?></a>
  <a href="customer-password-update.php"  class="active"><?php echo LANG_VALUE_99; ?></a>
  <a href="customer-order.php"><?php echo LANG_VALUE_24; ?></a>
  <a href="logout.php"><?php echo LANG_VALUE_14; ?></a>
</div>
		  </div>
          <div class="col-md-8">
               <div class="user-content">
                    <h3>
                        <?php echo LANG_VALUE_99; ?>
                    </h3>
					<br>
                    <form action="" method="post">
                        <?php $csrf->echoInputField(); ?>
                        <div class="row">
                            
                            <div class="col-md-6">
                               <?php
                    if($error_message != '') {
                        echo "<div class='error' style='padding: 10px;background:#E06666;margin-bottom:20px;'>".$error_message."</div>";
                    }
                    if($success_message != '') {
                        echo "<div class='success' style='padding: 10px;background:#00CC00;margin-bottom:20px;'>".$success_message."</div>";
                    }
                    ?>
                                <div class="form-group">
                                    <label for=""><?php echo LANG_VALUE_100; ?> *</label>
                                    <input type="password" class="form-control" name="cust_password">
                                </div>
                                <div class="form-group">
                                    <label for=""><?php echo LANG_VALUE_101; ?> *</label>
                                    <input type="password" class="form-control" name="cust_re_password">
                                </div>
                                <input type="submit" class="btn btn-primary" value="<?php echo LANG_VALUE_5; ?>" name="form1">
                            </div>
                        </div>
                        
                    </form>
                </div>                
             
		  </div>
        </div>
      </div>
    </div>
<BR>
<?php require_once('footer.php'); ?>