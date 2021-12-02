<?php
include("header.php");
?>
<?php
$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
foreach ($result as $row) {
    $banner_registration = $row['banner_registration'];
}
?>

<?php
if (isset($_POST['form1'])) {

    $valid = 1;

    if(empty($_POST['cust_name'])) {
        $valid = 0;
        $error_message .= LANG_VALUE_123."<br>";
    }

    if(empty($_POST['cust_email'])) {
        $valid = 0;
        $error_message .= LANG_VALUE_131."<br>";
    } else {
        if (filter_var($_POST['cust_email'], FILTER_VALIDATE_EMAIL) === false) {
            $valid = 0;
            $error_message .= LANG_VALUE_134."<br>";
        } else {
            $statement = $pdo->prepare("SELECT * FROM tbl_customer WHERE cust_email=?");
            $statement->execute(array($_POST['cust_email']));
            $total = $statement->rowCount();                            
            if($total) {
                $valid = 0;
                $error_message .= LANG_VALUE_147."<br>";
            }
        }
    }

    if(empty($_POST['cust_phone'])) {
        $valid = 0;
        $error_message .= LANG_VALUE_124."<br>";
    }

    
   
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

        $token = md5(time());
        $cust_datetime = date('Y-m-d h:i:s');
        $cust_timestamp = time();

        // saving into the database
        $statement = $pdo->prepare("INSERT INTO tbl_customer (
                                        cust_name,
                                        cust_cname,
                                        cust_email,
                                        cust_phone,
                                        cust_country,
                                        cust_address,
                                        cust_city,
                                        cust_state,
                                        cust_zip,
                                        cust_b_name,
                                        cust_b_cname,
                                        cust_b_phone,
                                        cust_b_country,
                                        cust_b_address,
                                        cust_b_city,
                                        cust_b_state,
                                        cust_b_zip,
                                        cust_s_name,
                                        cust_s_cname,
                                        cust_s_phone,
                                        cust_s_country,
                                        cust_s_address,
                                        cust_s_city,
                                        cust_s_state,
                                        cust_s_zip,
                                        cust_password,
                                        cust_token,
                                        cust_datetime,
                                        cust_timestamp,
                                        cust_status
                                    ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $statement->execute(array(
                                        strip_tags($_POST['cust_name']),
                                        '',
                                        strip_tags($_POST['cust_email']),
                                        strip_tags($_POST['cust_phone']),
                                        '',
                                        '',
                                        '',
                                        '',
                                        '',
                                        '',
                                        '',
                                        '',
                                        '',
                                        '',
                                        '',
                                        '',
                                        '',
                                        '',
                                        '',
                                        '',
                                        '',
                                        '',
                                        '',
                                        '',
                                        '',
                                        md5($_POST['cust_password']),
                                        $token,
                                        $cust_datetime,
                                        $cust_timestamp,
                                        0
                                    ));

        // Send email for confirmation of the account
        $to = $_POST['cust_email'];
        
        $subject = LANG_VALUE_150;
        $verify_link = BASE_URL.'verify.php?email='.$to.'&token='.$token;
        $message = '
'.LANG_VALUE_151.'<br><br>

<a href="'.$verify_link.'">'.$verify_link.'</a>';

        $headers = "From: noreply@" . BASE_URL . "\r\n" .
                   "Reply-To: noreply@" . BASE_URL . "\r\n" .
                   "X-Mailer: PHP/" . phpversion() . "\r\n" . 
                   "MIME-Version: 1.0\r\n" . 
                   "Content-Type: text/html; charset=ISO-8859-1\r\n";
        
        // Sending Email
        mail($to, $subject, $message, $headers);

        unset($_POST['cust_name']);
        unset($_POST['cust_email']);
        unset($_POST['cust_phone']);
  

        $success_message = LANG_VALUE_152;
    }
}
?>

    <!-- Page Content -->
    <!-- <div class="page-heading header-text" style="background-image: url(assets/uploads/<?php echo $banner_registration; ?>);"> -->
    <div class="page-heading header-text" style="background-image: linear-gradient(45deg, #4e54c8, #8f94fb);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1><?php echo LANG_VALUE_16; ?></h1>
            
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
                            KEC User Registration
                        </span>
                        <?php
                                    if($error_message != '') {
                                        echo "<div class='error' style='padding: 10px;background:#FF3333;margin-bottom:20px; border-radius: 8px;'>".$error_message."</div>";
                                    }
                                    if($success_message != '') {
                                        echo "<div class='success' style='padding: 10px;background:#00CC00;margin-bottom:20px;border-radius: 8px;'>".$success_message."</div>";
                                    }
                        ?>
                        
                        
                        <div class="wrap-input100 validate-input" data-validate = "Valid <?php echo LANG_VALUE_102; ?> is required: Ram Kumar">
                            <input class="input100" type="text" name="cust_name" value="<?php if(isset($_POST['cust_name'])){echo $_POST['cust_name'];} ?>" placeholder="<?php echo LANG_VALUE_102; ?>" required>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </span>
                        </div>
                    
                        <div class="wrap-input100 validate-input" data-validate = "Valid <?php echo LANG_VALUE_94; ?> is required: ex@abc.xyz">
                            <input class="input100" type="email" name="cust_email" value="<?php if(isset($_POST['cust_email'])){echo $_POST['cust_email'];} ?>" placeholder="<?php echo LANG_VALUE_94; ?>" required>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                        </div>
                        
                        <div class="wrap-input100">
                            <input class="input100" type="number" name="cust_phone" value="<?php if(isset($_POST['cust_phone'])){echo $_POST['cust_phone'];} ?>" placeholder="<?php echo LANG_VALUE_104; ?>" required>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-mobile" aria-hidden="true"></i>
                            </span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate = "<?php echo LANG_VALUE_96; ?> is required">
                            <input class="input100" type="password" name="cust_password" placeholder="<?php echo LANG_VALUE_96; ?>" required>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>
                        
                        <div class="wrap-input100 validate-input" data-validate = "<?php echo LANG_VALUE_98; ?>  is required">
                            <input class="input100" type="password" name="cust_re_password" placeholder="<?php echo LANG_VALUE_98; ?>" required>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>
                        
                        <div class="container-login100-form-btn">
                            <input type="submit" name="form1" value="Register" class="login100-form-btn">
                            
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
                            <a class="txt2" href="login.php">
                            <i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>
                            Registered KEC User?
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