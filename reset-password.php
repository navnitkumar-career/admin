<?php require_once('header.php'); ?>

<?php
$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
foreach ($result as $row) {
    $banner_reset_password = $row['banner_reset_password'];
}
?>

<?php
if( !isset($_GET['email']) || !isset($_GET['token']) )
{
    header('location: '.BASE_URL.'login.php');
    exit;
}

$statement = $pdo->prepare("SELECT * FROM tbl_customer WHERE cust_email=? AND cust_token=?");
$statement->execute(array($_GET['email'],$_GET['token']));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
$tot = $statement->rowCount();
if($tot == 0)
{
    header('location: '.BASE_URL.'login.php');
    exit;
}
foreach ($result as $row) {
    $saved_time = $row['cust_timestamp'];
}

$error_message2 = '';
if(time() - $saved_time > 86400)
{
    $error_message2 = LANG_VALUE_144;
}

if(isset($_POST['form1'])) {

    $valid = 1;
    
    if( empty($_POST['cust_new_password']) || empty($_POST['cust_re_password']) )
    {
        $valid = 0;
        $error_message .= LANG_VALUE_140.'\\n';
    }
    else
    {
        if($_POST['cust_new_password'] != $_POST['cust_re_password'])
        {
            $valid = 0;
            $error_message .= LANG_VALUE_139.'\\n';
        }
    }   

    if($valid == 1) {

        $cust_new_password = strip_tags($_POST['cust_new_password']);
        $statement = $pdo->prepare("UPDATE tbl_customer SET cust_password=?, cust_token=?, cust_timestamp=? WHERE cust_email=?");
        $statement->execute(array(md5($cust_new_password),'','',$_GET['email']));
        
        header('location: '.BASE_URL.'reset-password-success.php');
    }

    
}
?>
<div class="page-heading header-text" style="background-image: url(assets/uploads/<?php echo $banner_reset_password;?>));">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1><?php echo LANG_VALUE_149; ?></h1>
            
          </div>
        </div>
      </div>

 <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="assets/images/img-01.png" alt="IMG">
				</div>
				
				<?php
                    if($error_message != '') {
                        echo "<script>alert('".$error_message."')</script>";
                    }
                    ?>
                    <?php if($error_message2 != ''): ?>
                        <div class="error"><?php echo $error_message2; ?></div>
                    <?php else: ?>
					
                <form action="" method="post" class="login100-form validate-form">
                   <?php $csrf->echoInputField(); ?>
			        <span class="login100-form-title">
						KEC User Reset Password
					</span>
                   
					<div class="wrap-input100 validate-input" data-validate = "<?php echo LANG_VALUE_100; ?>  is required">
						<input class="input100" type="password" name="cust_new_password" placeholder="<?php echo LANG_VALUE_100; ?>" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate = "<?php echo LANG_VALUE_101; ?>  is required">
						<input class="input100" type="password" name="cust_re_password" placeholder="<?php echo LANG_VALUE_101; ?>" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					
					
					<div class="container-login100-form-btn">
							<input type="submit" name="form1" value="<?php echo LANG_VALUE_149; ?>" class="login100-form-btn">
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="login.php">
						<i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>
						Log into my Account
						</a>
					</div>
				</form>
				 <?php endif; ?>
			</div>
		</div>
	</div>


<?php require_once('footer.php'); ?>