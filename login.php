<?php
include("header.php");
?>
<?php
//fetching row banner login
$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
foreach ($result as $row) {
    $banner_login = $row['banner_login'];
}
?>

<?php
//login form
if(isset($_POST['form1'])) {
        
    if(empty($_POST['cust_email']) || empty($_POST['cust_password'])) {
        $error_message = LANG_VALUE_132.'<br>';
    } else {
        
        $cust_email = strip_tags($_POST['cust_email']);
        $cust_password = strip_tags($_POST['cust_password']);

        $statement = $pdo->prepare("SELECT * FROM tbl_customer WHERE cust_email=?");
        $statement->execute(array($cust_email));
        $total = $statement->rowCount();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $row) {
            $cust_status = $row['cust_status'];
            $row_password = $row['cust_password'];
        }

        if($total==0) {
            $error_message .= LANG_VALUE_133.'<br>';
        } else {
            //using MD5 form
            if( $row_password != md5($cust_password) ) {
                $error_message .= LANG_VALUE_139.'<br>';
            } else {
                if($cust_status == 0) {
                    $error_message .= LANG_VALUE_148.'<br>';
                } else {
                    $_SESSION['customer'] = $row;
                    header("location: ".BASE_URL."dashboard.php");
                }
            }
            
        }
    }
}
?>

    <!-- Page Content -->
    <!-- <div class="page-heading header-text" style="background-image: url(assets/uploads/<?php echo $banner_login;?>);"> -->
    <div class="page-heading header-text" style="background-image: linear-gradient(45deg, #96c93d, #00b09b);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1><?php echo LANG_VALUE_10; ?></h1>
            
          </div>
        </div>
      </div>
    </div>

  <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 page_content">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="assets/images/img-01.png" alt="IMG">
				</div>
                <div class="login100-pic">
                    <form action="" method="post" class="login100-form validate-form">
                    <?php $csrf->echoInputField(); ?>  
                        <span class="login100-form-title">
                            KEC User Login
                        </span>
                        <?php
                                    if($error_message != '') {
                                        echo "<div class='error' style='padding: 10px;background:#FF3333;margin-bottom:20px; border-radius: 8px;'>".$error_message."</div>";
                                    }
                                    if($success_message != '') {
                                        echo "<div class='success' style='padding: 10px;background:#00CC00;margin-bottom:20px;border-radius: 8px;'>".$success_message."</div>";
                                    }
                        ?>
                        
                        <div class="wrap-input100 validate-input" data-validate = "Valid <?php echo LANG_VALUE_94; ?> is required: ex@abc.xyz">
                            <input class="input100" type="email" name="cust_email" value="<?php if(isset($_POST['cust_email'])){echo $_POST['cust_email'];} ?>" placeholder="<?php echo LANG_VALUE_94; ?>" required>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate = "<?php echo LANG_VALUE_96; ?> is required">
                            <input class="input100" type="password" name="cust_password" placeholder="<?php echo LANG_VALUE_96; ?>" required>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>
                        
                        <div class="container-login100-form-btn">
                            <input type="submit" name="form1" value="<?php echo LANG_VALUE_4; ?>" class="login100-form-btn">
                        </div>

                        <div class="text-center p-t-12">
                            <span class="txt1">
                                Forgot
                            </span>
                            <a class="txt2" href="forget-password.php">
                                Username / Password?
                            </a>
                        </div>

                        <div class="text-center mt-80">
                            <a class="txt2" href="registration.php">
                                Create your Account
                                <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                            </a>
                        </div>
                    </form>
			    </div>
			</div>
		</div>
	</div>
	
    <!-- Footer Starts Here -->
<?php
 include("footer.php");
 ?>