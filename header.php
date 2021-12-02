<!-- This is main configuration File -->
<?php
  ob_start();
  session_start();
  include("admin/inc/config.php");
  include("admin/inc/functions.php");
  include("admin/inc/CSRF_Protect.php");
  $csrf = new CSRF_Protect();
  $error_message = '';
  $success_message = '';
  $error_message1 = '';
  $success_message1 = '';	
  
  // Getting all language variables into array as global variable
  $i=1;
  $statement = $pdo->prepare("SELECT * FROM tbl_language");
  $statement->execute();
  $result = $statement->fetchAll(PDO::FETCH_ASSOC);							
  foreach ($result as $row) {
  	define('LANG_VALUE_'.$i,$row['lang_value']);
  	$i++;
  }
  
  $statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
  $statement->execute();
  $result = $statement->fetchAll(PDO::FETCH_ASSOC);
  foreach ($result as $row)
  {
  	$logo = $row['logo'];
  	$favicon = $row['favicon'];
  	$contact_email = $row['contact_email'];
  	$contact_phone = $row['contact_phone'];
  	$meta_title_home = $row['meta_title_home'];
      $meta_keyword_home = $row['meta_keyword_home'];
      $meta_description_home = $row['meta_description_home'];
      $before_head = $row['before_head'];
      $after_body = $row['after_body'];
  }
  
  // Checking the order table and removing the pending transaction that are 24 hours+ old. Very important
  $current_date_time = date('Y-m-d H:i:s');
  $statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE payment_status=?");
  $statement->execute(array('Pending'));
  $result = $statement->fetchAll(PDO::FETCH_ASSOC);							
  foreach ($result as $row) {
  	$ts1 = strtotime($row['payment_date']);
  	$ts2 = strtotime($current_date_time);     
  	$diff = $ts2 - $ts1;
  	$time = $diff/(3600);
  	if($time>24) {
  
  		// Return back the stock amount
  		$statement1 = $pdo->prepare("SELECT * FROM tbl_order WHERE payment_id=?");
  		$statement1->execute(array($row['payment_id']));
  		$result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
  		foreach ($result1 as $row1) {
  			$statement2 = $pdo->prepare("SELECT * FROM tbl_product WHERE p_id=?");
  			$statement2->execute(array($row1['product_id']));
  			$result2 = $statement2->fetchAll(PDO::FETCH_ASSOC);							
  			foreach ($result2 as $row2) {
  				$p_qty = $row2['p_qty'];
  			}
  			$final = $p_qty+$row1['quantity'];
  
  			$statement = $pdo->prepare("UPDATE tbl_product SET p_qty=? WHERE p_id=?");
  			$statement->execute(array($final,$row1[' product_id']));
  		}
  		
  		// Deleting data from table
  		$statement1 = $pdo->prepare("DELETE FROM tbl_order WHERE payment_id=?");
  		$statement1->execute(array($row['payment_id']));
  
  		$statement1 = $pdo->prepare("DELETE FROM tbl_payment WHERE id=?");
  		$statement1->execute(array($row['id']));
  	}
  }
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <title>KEC | KISAN EXPERIENCE CENTER</title>
    <!-- Bootstrap core CSS -->
    <!-- <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">
      <link rel="stylesheet" type="text/css" href="assets/css/util.css">
      <link rel="stylesheet" type="text/css" href="assets/css/main.css">
      	<link rel="stylesheet" type="text/css" href="assets/main_old.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->	
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <!-- custom navbar -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <style>
    </style>
    <?php
      $statement = $pdo->prepare("SELECT * FROM tbl_page WHERE id=1");
      $statement->execute();
      $result = $statement->fetchAll(PDO::FETCH_ASSOC);							
      foreach ($result as $row) {
      	$about_title = $row['about_title'];
         $about_content = $row['about_content'];
         $about_banner = $row['about_banner'];
         $about_meta_title = $row['about_meta_title'];
         $about_meta_keyword = $row['about_meta_keyword'];
         $about_meta_description = $row['about_meta_description'];
      
      $privacy_policy_title = $row['privacy_policy_title'];
         $privacy_policy_content = $row['privacy_policy_content'];
         $privacy_policy_banner = $row['privacy_policy_banner'];
         $privacy_policy_meta_title = $row['privacy_policy_meta_title'];
         $privacy_policy_meta_keyword = $row['privacy_policy_meta_keyword'];
         $privacy_policy_meta_description = $row['privacy_policy_meta_description'];
      
      $terms_n_conditions_title = $row['terms_n_conditions_title'];
         $terms_n_conditions_content = $row['terms_n_conditions_content'];
         $terms_n_conditions_banner = $row['terms_n_conditions_banner'];
         $terms_n_conditions_meta_title = $row['terms_n_conditions_meta_title'];
         $terms_n_conditions_meta_keyword = $row['terms_n_conditions_meta_keyword'];
         $terms_n_conditions_meta_description = $row['terms_n_conditions_meta_description'];
      
      $ksk_title = $row['ksk_title'];
         $ksk_content = $row['ksk_content'];
         $ksk_banner = $row['ksk_banner'];
         $ksk_meta_title = $row['ksk_meta_title'];
         $ksk_meta_keyword = $row['ksk_meta_keyword'];
         $ksk_meta_description = $row['ksk_meta_description'];
      
      $bio_cng_title = $row['bio_cng_title'];
         $bio_cng_content = $row['bio_cng_content'];
         $bio_cng_banner = $row['bio_cng_banner'];
         $bio_cng_meta_title = $row['bio_cng_meta_title'];
         $bio_cng_meta_keyword = $row['bio_cng_meta_keyword'];
         $bio_cng_meta_description = $row['bio_cng_meta_description'];
      
         $home_title = $row['home_title'];
         $home_banner = $row['home_banner'];
         $home_meta_title = $row['home_meta_title'];
         $home_meta_keyword = $row['home_meta_keyword'];
         $home_meta_description = $row['home_meta_description'];
         $contact_title = $row['contact_title'];
         $contact_banner = $row['contact_banner'];
         $contact_meta_title = $row['contact_meta_title'];
         $contact_meta_keyword = $row['contact_meta_keyword'];
         $contact_meta_description = $row['contact_meta_description'];
      }
      
      $cur_page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
      
      if($cur_page == 'index.php' || $cur_page == 'login.php' || $cur_page == 'registration.php' || $cur_page == 'cart.php' || $cur_page == 'checkout.php' || $cur_page == 'forget-password.php' || $cur_page == 'reset-password.php' || $cur_page == 'product-category.php' || $cur_page == 'product.php') {
      	?>
    <title><?php echo $meta_title_home; ?></title>
    <meta name="keywords" content="<?php echo $meta_keyword_home; ?>">
    <meta name="description" content="<?php echo $meta_description_home; ?>">
    <?php
      }
      
      if($cur_page == 'about.php') {
      	?>
    <title><?php echo $about_meta_title; ?></title>
    <meta name="keywords" content="<?php echo $about_meta_keyword; ?>">
    <meta name="description" content="<?php echo $about_meta_description; ?>">
    <?php
      }
      if($cur_page == 'privacy_policy.php') {
      	?>
    <title><?php echo $privacy_policy_meta_title; ?></title>
    <meta name="keywords" content="<?php echo $privacy_policy_meta_keyword; ?>">
    <meta name="description" content="<?php echo $privacy_policy_meta_description; ?>">
    <?php
      }
      if($cur_page == 'terms_n_conditions.php') {
      	?>
    <title><?php echo $terms_n_conditions_meta_title; ?></title>
    <meta name="keywords" content="<?php echo $terms_n_conditions_meta_keyword; ?>">
    <meta name="description" content="<?php echo $terms_n_conditions_meta_description; ?>">
    <?php
      }
      if($cur_page == 'bio_cng.php') {
      	?>
    <title><?php echo $bio_cng_meta_title; ?></title>
    <meta name="keywords" content="<?php echo $bio_cng_meta_keyword; ?>">
    <meta name="description" content="<?php echo $bio_cng_meta_description; ?>">
    <?php
      }
      if($cur_page == 'home.php') {
      	?>
    <title><?php echo $home_meta_title; ?></title>
    <meta name="keywords" content="<?php echo $home_meta_keyword; ?>">
    <meta name="description" content="<?php echo $home_meta_description; ?>">
    <?php
      }
      if($cur_page == 'contact.php') {
      	?>
    <title><?php echo $contact_meta_title; ?></title>
    <meta name="keywords" content="<?php echo $contact_meta_keyword; ?>">
    <meta name="description" content="<?php echo $contact_meta_description; ?>">
    <?php
      }
      if($cur_page == 'product.php')
      {
      	$statement = $pdo->prepare("SELECT * FROM tbl_product WHERE p_id=?");
      	$statement->execute(array($_REQUEST['id']));
      	$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
      	foreach ($result as $row) 
      	{
      	    $og_photo = $row['p_featured_photo'];
      	    $og_title = $row['p_name'];
      	    $og_slug = 'product.php?id='.$_REQUEST['id'];
      		$og_description = substr(strip_tags($row['p_description']),0,200).'...';
      	}
      }
      
      if($cur_page == 'dashboard.php') {
      	?>
    <title>Dashboard - <?php echo $meta_title_home; ?></title>
    <meta name="keywords" content="<?php echo $meta_keyword_home; ?>">
    <meta name="description" content="<?php echo $meta_description_home; ?>">
    <?php
      }
      if($cur_page == 'customer-profile-update.php') {
      	?>
    <title>Update Profile - <?php echo $meta_title_home; ?></title>
    <meta name="keywords" content="<?php echo $meta_keyword_home; ?>">
    <meta name="description" content="<?php echo $meta_description_home; ?>">
    <?php
      }
      if($cur_page == 'customer-billing-shipping-update.php') {
      	?>
    <title>Update Billing and Shipping Info - <?php echo $meta_title_home; ?></title>
    <meta name="keywords" content="<?php echo $meta_keyword_home; ?>">
    <meta name="description" content="<?php echo $meta_description_home; ?>">
    <?php
      }
      if($cur_page == 'customer-password-update.php') {
      	?>
    <title>Update Password - <?php echo $meta_title_home; ?></title>
    <meta name="keywords" content="<?php echo $meta_keyword_home; ?>">
    <meta name="description" content="<?php echo $meta_description_home; ?>">
    <?php
      }
      if($cur_page == 'customer-order.php') {
      	?>
    <title>Orders - <?php echo $meta_title_home; ?></title>
    <meta name="keywords" content="<?php echo $meta_keyword_home; ?>">
    <meta name="description" content="<?php echo $meta_description_home; ?>">
    <?php
      }
      ?>
    <?php if($cur_page == 'blog-single.php'): ?>
    <meta property="og:title" content="<?php echo $og_title; ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo BASE_URL.$og_slug; ?>">
    <meta property="og:description" content="<?php echo $og_description; ?>">
    <meta property="og:image" content="assets/uploads/<?php echo $og_photo; ?>">
    <?php endif; ?>
    <?php if($cur_page == 'product.php'): ?>
    <meta property="og:title" content="<?php echo $og_title; ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo BASE_URL.$og_slug; ?>">
    <meta property="og:description" content="<?php echo $og_description; ?>">
    <meta property="og:image" content="assets/uploads/<?php echo $og_photo; ?>">
    <?php endif; ?>
    <?php echo $before_head; ?>
  </head>
  <body>
    <?php echo $after_body; ?>
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
      <div class="jumper">
        <div></div>
        <div></div>
        <div></div>
      </div>
    </div>
    <!-- ***** Preloader End ***** -->
    <!-- Header -->
    <!-- <div class="sub-header">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-xs-12">
            <ul class="left-info">
              <li><a href="#"><i class="fa fa-mail"></i><?php echo $contact_email; ?></a></li>
              <li><a href="#"><i class="fa fa-phone"></i><?php echo $contact_phone; ?></a></li>
            </ul>
          </div>
          <div class="col-md-4">
            <ul class="right-icons">
              <li><a href="cart.php"><i class="fa fa-shopping-cart"></i>&nbsp;Cart</a></li>
              <?php
                $statement = $pdo->prepare("SELECT * FROM tbl_social");
                $statement->execute();
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                foreach ($result as $row) {
                	?>
              <?php if($row['social_url'] != ''): ?>
              <li><a href="<?php echo $row['social_url']; ?>"><i class="<?php echo $row['social_icon']; ?>"></i></a></li>
              <?php endif; ?>
              <?php
                }
                ?>
            </ul>
          </div>
        </div>
      </div>
    </div> -->
    <header>
      <nav id="main-navbar" class="navbar navbar-default navbar-fixed-top">
        <div class="container navbar-container">
            <div class="navbar_custom">            
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">
                    <img src="assets/uploads/<?php echo $logo; ?>" alt="logo image">
                    </a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav  ml-auto navbar-right">
                    <li class="nav-item <?php echo strpos($_SERVER['PHP_SELF'], "index.php")?'active':''; ?>">
                        <a class="nav-link" href="index.php">Home
                        <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown" >
                        <a class="nav-link dropdown-toggle" href="#"role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Shop <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <?php 
                            $statement = $pdo->prepare("SELECT * FROM tbl_top_category");
                            $statement->execute();
                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
                            foreach ($result as $row) {
                            ?>
                        <a class="dropdown-item" href="product-category.php?id=<?php echo $row['tcat_id'];?>&type=top-category"> <?php echo $row['tcat_name']; ?></a>
                        <?php } ?>         
                        </div>
                    </li>
                    <li class="nav-item <?php echo strpos($_SERVER['PHP_SELF'], "about.php")?'active':''; ?>">
                        <a class="nav-link" href="about.php">About Us</a>
                    </li>
                    <li class="nav-item <?php echo strpos($_SERVER['PHP_SELF'], "bio-cng.php")?'active':''; ?>">
                        <a class="nav-link" href="bio-cng.php">BIO CNG</a>
                    </li>
                    <li class="nav-item <?php echo strpos($_SERVER['PHP_SELF'], "services.php")?'active':''; ?>">
                        <a class="nav-link" href="services.php">Our Services</a>
                    </li>
                    <li class="nav-item <?php echo strpos($_SERVER['PHP_SELF'], "contact.php")?'active':''; ?>">
                        <a class="nav-link" href="contact.php">Contact Us</a>
                    </li>
                    <?php
                        if(isset($_SESSION['customer'])) {
                        ?>
                    <li class="nav-item dropdown" >
                        <a class="nav-link dropdown-toggle" href="#"role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user"></i> <?php echo $_SESSION['customer']['cust_name']; ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="dashboard.php"> <?php echo LANG_VALUE_89; ?></a>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                    </li>
                    <?php } else { ?>
                    <li class="nav-item <?php echo strpos($_SERVER['PHP_SELF'], "login.php")?'active':''; ?>">
                        <a class="nav-link" href="login.php">Login/Register</a>
                    </li>
                    <?php } ?>
                    </ul>
                </div>
                <div class="top-social">
                    <ul class="left-info" id="top-social-menu">
                        <li><a href="#"><i class="fa fa-mail"></i><?php echo $contact_email; ?></a></li>
                        <li><a href="#"><i class="fa fa-phone"></i><?php echo $contact_phone; ?></a></li>
                    </ul>
                    <ul id="top-social-menu" class="right-icons">
                        <li><a href="cart.php"><i class="fa fa-shopping-cart"></i>&nbsp;Cart</a></li>
                        <?php
                        $statement = $pdo->prepare("SELECT * FROM tbl_social");
                        $statement->execute();
                        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($result as $row) {
                            ?>
                        <?php if($row['social_url'] != ''): ?>
                        <li><a href="<?php echo $row['social_url']; ?>"><i class="<?php echo $row['social_icon']; ?>"></i></a></li>
                        <?php endif; ?>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
      </nav>
    </header>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script id="rendered-js">
      $(window).scroll(function () {
        var sc = $(window).scrollTop();
        if (sc > 150) {
          $("#main-navbar").addClass("navbar-scroll");
        } else
        {
          $("#main-navbar").removeClass("navbar-scroll");
        }
      });
      //# sourceURL=pen.js
          
    </script>