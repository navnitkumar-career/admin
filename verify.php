<?php require_once('header.php'); ?>

<?php
if ( (!isset($_REQUEST['email'])) || (isset($_REQUEST['token'])) )
{
    $var = 1;

    // check if the token is correct and match with database.
    $statement = $pdo->prepare("SELECT * FROM tbl_customer WHERE cust_email=?");
    $statement->execute(array($_REQUEST['email']));
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);                           
    foreach ($result as $row) {
        if($_REQUEST['token'] != $row['cust_token']) {
            header('location: '.BASE_URL);
            exit;
        }
    }

    // everything is correct. now activate the user removing token value from database.
    if($var != 0)
    {
        $statement = $pdo->prepare("UPDATE tbl_customer SET cust_token=?, cust_status=? WHERE cust_email=?");
        $statement->execute(array('',1,$_GET['email']));

        $success_message = '<span style="color:green;">Your email is verified successfully. You can now login to our website.</span><br><a href="'.BASE_URL.'login.php" style="color:#167ac6;font-weight:bold;">Click here to login<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i></a><br><br>';     
    }
}
?>

<div class="more-info about-info">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="more-info-content">
              <div class="row">
                <div class="col-md-12 align-self-center">
                  <div class="right-content">
                    <BR><BR>
                    <h3><?php 
                        echo $error_message;
                       ?></h3>
                    <h3><?php echo $success_message; ?></h3>
                    
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


<?php require_once('footer.php'); ?>