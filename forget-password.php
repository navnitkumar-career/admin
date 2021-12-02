<?php
include("header.php");
?>
<?php
$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
foreach ($result as $row) {
    $banner_forget_password = $row['banner_forget_password'];
}
?>

<?php
if(isset($_POST['form1'])) {

    $valid = 1;
        
    if(empty($_POST['cust_email'])) {
        $valid = 0;
        $error_message .= LANG_VALUE_131."\\n";
    } else {
        if (filter_var($_POST['cust_email'], FILTER_VALIDATE_EMAIL) === false) {
            $valid = 0;
            $error_message .= LANG_VALUE_134."\\n";
        } else {
            $statement = $pdo->prepare("SELECT * FROM tbl_customer WHERE cust_email=?");
            $statement->execute(array($_POST['cust_email']));
            $total = $statement->rowCount();                        
            if(!$total) {
                $valid = 0;
                $error_message .= LANG_VALUE_135."\\n";
            }
        }
    }

    if($valid == 1) {

        $statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);                           
        foreach ($result as $row) {
            $forget_password_message = $row['forget_password_message'];
        }

        $token = md5(rand());
        $now = time();

        $statement = $pdo->prepare("UPDATE tbl_customer SET cust_token=?,cust_timestamp=? WHERE cust_email=?");
        $statement->execute(array($token,$now,strip_tags($_POST['cust_email'])));
        
        $message = '<p>'.LANG_VALUE_142.'<br> <a href="'.BASE_URL.'reset-password.php?email='.$_POST['cust_email'].'&token='.$token.'">Click here</a>';
        
        $to      = $_POST['cust_email'];
        $subject = LANG_VALUE_143;
        $headers = "From: noreply@" . BASE_URL . "\r\n" .
                   "Reply-To: noreply@" . BASE_URL . "\r\n" .
                   "X-Mailer: PHP/" . phpversion() . "\r\n" . 
                   "MIME-Version: 1.0\r\n" . 
                   "Content-Type: text/html; charset=ISO-8859-1\r\n";

        mail($to, $subject, $message, $headers);

        $success_message = $forget_password_message;
    }
}
?>



    <!-- Page Content -->
    <!-- <div class="page-heading header-text" style="background-image: url(assets/uploads/<?php echo $banner_forget_password; ?>);"> -->
    <div class="page-heading header-text" style="background-image: linear-gradient(45deg, #0F2027, #2C5364);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1><?php echo LANG_VALUE_97; ?></h1>
            
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
                            KEC User Forgot Password
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

                        
                        
                        <div class="container-login100-form-btn">
                                <input type="submit" name="form1" value="<?php echo LANG_VALUE_4; ?>" class="login100-form-btn">
                        </div>

                        <div class="text-center mt-80">
                            <a class="txt2" href="login.php">
                            <i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>
                            Log into my Account
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