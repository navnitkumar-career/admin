<?php require_once('header.php'); ?>

<?php

if(isset($_POST['form_about'])) {
    
    $valid = 1;

    if(empty($_POST['about_title'])) {
        $valid = 0;
        $error_message .= 'Title can not be empty<br>';
    }

    if(empty($_POST['about_content'])) {
        $valid = 0;
        $error_message .= 'Content can not be empty<br>';
    }
    
    $path = $_FILES['about_banner']['name'];
    $path_tmp = $_FILES['about_banner']['tmp_name'];

    if($path != '') {
        $ext = pathinfo( $path, PATHINFO_EXTENSION );
        $file_name = basename( $path, '.' . $ext );
        if( $ext!='jpg' && $ext!='png' && $ext!='jpeg' && $ext!='gif' ) {
            $valid = 0;
            $error_message .= 'You must have to upload jpg, jpeg, gif or png file<br>';
        }
    }

    if($valid == 1) {

        if($path != '') {
            // removing the existing photo
            $statement = $pdo->prepare("SELECT * FROM tbl_page WHERE id=1");
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);                           
            foreach ($result as $row) {
                $about_banner = $row['about_banner'];
                unlink('../assets/uploads/'.$about_banner);
            }

            // updating the data
            $final_name = 'about-banner'.'.'.$ext;
            move_uploaded_file( $path_tmp, '../assets/uploads/'.$final_name );

            // updating the database
            $statement = $pdo->prepare("UPDATE tbl_page SET about_title=?,about_content=?,about_banner=?,about_meta_title=?,about_meta_keyword=?,about_meta_description=? WHERE id=1");
            $statement->execute(array($_POST['about_title'],$_POST['about_content'],$final_name,$_POST['about_meta_title'],$_POST['about_meta_keyword'],$_POST['about_meta_description']));
        } else {
            // updating the database
            $statement = $pdo->prepare("UPDATE tbl_page SET about_title=?,about_content=?,about_meta_title=?,about_meta_keyword=?,about_meta_description=? WHERE id=1");
            $statement->execute(array($_POST['about_title'],$_POST['about_content'],$_POST['about_meta_title'],$_POST['about_meta_keyword'],$_POST['about_meta_description']));
        }

        $success_message = 'About Page Information is updated successfully.';
        
    }
    
}
if(isset($_POST['form_privacy_policy'])) {
    
    $valid = 1;

    if(empty($_POST['privacy_policy_title'])) {
        $valid = 0;
        $error_message .= 'Title can not be empty<br>';
    }

    if(empty($_POST['privacy_policy_content'])) {
        $valid = 0;
        $error_message .= 'Content can not be empty<br>';
    }
    
    $path = $_FILES['privacy_policy_banner']['name'];
    $path_tmp = $_FILES['privacy_policy_banner']['tmp_name'];

    if($path != '') {
        $ext = pathinfo( $path, PATHINFO_EXTENSION );
        $file_name = basename( $path, '.' . $ext );
        if( $ext!='jpg' && $ext!='png' && $ext!='jpeg' && $ext!='gif' ) {
            $valid = 0;
            $error_message .= 'You must have to upload jpg, jpeg, gif or png file<br>';
        }
    }

    if($valid == 1) {

        if($path != '') {
            // removing the existing photo
            $statement = $pdo->prepare("SELECT * FROM tbl_page WHERE id=1");
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);                           
            foreach ($result as $row) {
                $privacy_policy_banner = $row['privacy_policy_banner'];
                unlink('../assets/uploads/'.$privacy_policy_banner);
            }

            // updating the data
            $final_name = 'privacy_policy-banner'.'.'.$ext;
            move_uploaded_file( $path_tmp, '../assets/uploads/'.$final_name );

            // updating the database
            $statement = $pdo->prepare("UPDATE tbl_page SET privacy_policy_title=?,privacy_policy_content=?,privacy_policy_banner=?,privacy_policy_meta_title=?,privacy_policy_meta_keyword=?,privacy_policy_meta_description=? WHERE id=1");
            $statement->execute(array($_POST['privacy_policy_title'],$_POST['privacy_policy_content'],$final_name,$_POST['privacy_policy_meta_title'],$_POST['privacy_policy_meta_keyword'],$_POST['privacy_policy_meta_description']));
        } else {
            // updating the database
            $statement = $pdo->prepare("UPDATE tbl_page SET privacy_policy_title=?,privacy_policy_content=?,privacy_policy_meta_title=?,privacy_policy_meta_keyword=?,privacy_policy_meta_description=? WHERE id=1");
            $statement->execute(array($_POST['privacy_policy_title'],$_POST['privacy_policy_content'],$_POST['privacy_policy_meta_title'],$_POST['privacy_policy_meta_keyword'],$_POST['privacy_policy_meta_description']));
        }

        $success_message = 'About Page Information is updated successfully.';
        
    }
    
}
if(isset($_POST['form_terms_n_conditions'])) {
    
    $valid = 1;

    if(empty($_POST['terms_n_conditions_title'])) {
        $valid = 0;
        $error_message .= 'Title can not be empty<br>';
    }

    if(empty($_POST['terms_n_conditions_content'])) {
        $valid = 0;
        $error_message .= 'Content can not be empty<br>';
    }
    
    $path = $_FILES['terms_n_conditions_banner']['name'];
    $path_tmp = $_FILES['terms_n_conditions_banner']['tmp_name'];

    if($path != '') {
        $ext = pathinfo( $path, PATHINFO_EXTENSION );
        $file_name = basename( $path, '.' . $ext );
        if( $ext!='jpg' && $ext!='png' && $ext!='jpeg' && $ext!='gif' ) {
            $valid = 0;
            $error_message .= 'You must have to upload jpg, jpeg, gif or png file<br>';
        }
    }

    if($valid == 1) {

        if($path != '') {
            // removing the existing photo
            $statement = $pdo->prepare("SELECT * FROM tbl_page WHERE id=1");
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);                           
            foreach ($result as $row) {
                $terms_n_conditions_banner = $row['terms_n_conditions_banner'];
                unlink('../assets/uploads/'.$terms_n_conditions_banner);
            }

            // updating the data
            $final_name = 'terms_n_conditions-banner'.'.'.$ext;
            move_uploaded_file( $path_tmp, '../assets/uploads/'.$final_name );

            // updating the database
            $statement = $pdo->prepare("UPDATE tbl_page SET terms_n_conditions_title=?,terms_n_conditions_content=?,terms_n_conditions_banner=?,terms_n_conditions_meta_title=?,terms_n_conditions_meta_keyword=?,terms_n_conditions_meta_description=? WHERE id=1");
            $statement->execute(array($_POST['terms_n_conditions_title'],$_POST['terms_n_conditions_content'],$final_name,$_POST['terms_n_conditions_meta_title'],$_POST['terms_n_conditions_meta_keyword'],$_POST['terms_n_conditions_meta_description']));
        } else {
            // updating the database
            $statement = $pdo->prepare("UPDATE tbl_page SET terms_n_conditions_title=?,terms_n_conditions_content=?,terms_n_conditions_meta_title=?,terms_n_conditions_meta_keyword=?,terms_n_conditions_meta_description=? WHERE id=1");
            $statement->execute(array($_POST['terms_n_conditions_title'],$_POST['terms_n_conditions_content'],$_POST['terms_n_conditions_meta_title'],$_POST['terms_n_conditions_meta_keyword'],$_POST['terms_n_conditions_meta_description']));
        }

        $success_message = 'About Page Information is updated successfully.';
        
    }
    
}

if(isset($_POST['form_bio_cng'])) {
    
    $valid = 1;

    if(empty($_POST['bio_cng_title'])) {
        $valid = 0;
        $error_message .= 'Title can not be empty<br>';
    }

    if(empty($_POST['bio_cng_content'])) {
        $valid = 0;
        $error_message .= 'Content can not be empty<br>';
    }
    
    $path = $_FILES['bio_cng_banner']['name'];
	
    $path_tmp = $_FILES['bio_cng_banner']['tmp_name'];

    if($path != '') {
        $ext = pathinfo( $path, PATHINFO_EXTENSION );
        $file_name = basename( $path, '.' . $ext );
        if( $ext!='jpg' && $ext!='png' && $ext!='jpeg' && $ext!='gif' ) {
            $valid = 0;
            $error_message .= 'You must have to upload jpg, jpeg, gif or png file<br>';
        }
    }

    if($valid == 1) {

        if($path != '') {
            // removing the existing photo
            $statement = $pdo->prepare("SELECT * FROM tbl_page WHERE id=1");
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);                           
            foreach ($result as $row) {
                $bio_cng_banner = $row['bio_cng_banner'];
                unlink('../assets/uploads/'.$bio_cng_banner);
            }

            // updating the data
            $final_name = 'bio-cng-banner'.'.'.$ext;
            move_uploaded_file( $path_tmp, '../assets/uploads/'.$final_name );

            // updating the database
            $statement = $pdo->prepare("UPDATE tbl_page SET bio_cng_title=?,bio_cng_content=?,bio_cng_banner=?,bio_cng_meta_title=?,bio_cng_meta_keyword=?,bio_cng_meta_description=? WHERE id=1");
            $statement->execute(array($_POST['bio_cng_title'],$_POST['bio_cng_content'],$final_name,$_POST['bio_cng_meta_title'],$_POST['bio_cng_meta_keyword'],$_POST['bio_cng_meta_description']));
        } else {
            // updating the database
            $statement = $pdo->prepare("UPDATE tbl_page SET bio_cng_title=?,bio_cng_content=?,bio_cng_meta_title=?,bio_cng_meta_keyword=?,bio_cng_meta_description=? WHERE id=1");
            $statement->execute(array($_POST['bio_cng_title'],$_POST['bio_cng_content'],$_POST['bio_cng_meta_title'],$_POST['bio_cng_meta_keyword'],$_POST['bio_cng_meta_description']));
        }

        $success_message = 'BIO CNG Page Information is updated successfully.';
        
    }
    
}


if(isset($_POST['form_KSK'])) {
    
    $valid = 1;

    if(empty($_POST['ksk_title'])) {
        $valid = 0;
        $error_message .= 'Title can not be empty<br>';
    }

    if(empty($_POST['ksk_content'])) {
        $valid = 0;
        $error_message .= 'Content can not be empty<br>';
    }
    
    $path = $_FILES['ksk_banner']['name'];
    $path_tmp = $_FILES['ksk_banner']['tmp_name'];

    if($path != '') {
        $ext = pathinfo( $path, PATHINFO_EXTENSION );
        $file_name = basename( $path, '.' . $ext );
        if( $ext!='jpg' && $ext!='png' && $ext!='jpeg' && $ext!='gif' ) {
            $valid = 0;
            $error_message .= 'You must have to upload jpg, jpeg, gif or png file<br>';
        }
    }

    if($valid == 1) {

        if($path != '') {
            // removing the existing photo
            $statement = $pdo->prepare("SELECT * FROM tbl_page WHERE id=1");
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);                           
            foreach ($result as $row) {
                $ksk_banner = $row['ksk_banner'];
                unlink('../assets/uploads/'.$ksk_banner);
            }

            // updating the data
            $final_name = 'ksk-banner'.'.'.$ext;
            move_uploaded_file( $path_tmp, '../assets/uploads/'.$final_name );

            // updating the database
            $statement = $pdo->prepare("UPDATE tbl_page SET ksk_title=?,ksk_content=?,ksk_banner=?,ksk_meta_title=?,ksk_meta_keyword=?,ksk_meta_description=? WHERE id=1");
            $statement->execute(array($_POST['ksk_title'],$_POST['ksk_content'],$final_name,$_POST['ksk_meta_title'],$_POST['ksk_meta_keyword'],$_POST['ksk_meta_description']));
        } else {
            // updating the database
            $statement = $pdo->prepare("UPDATE tbl_page SET ksk_title=?,ksk_content=?,ksk_meta_title=?,ksk_meta_keyword=?,ksk_meta_description=? WHERE id=1");
            $statement->execute(array($_POST['ksk_title'],$_POST['ksk_content'],$_POST['ksk_meta_title'],$_POST['ksk_meta_keyword'],$_POST['ksk_meta_description']));
        }

        $success_message = 'About KSK Information is updated successfully.';
        
    }
    
}


if(isset($_POST['form_home'])) {
    
    $valid = 1;

    if(empty($_POST['home_title'])) {
        $valid = 0;
        $error_message .= 'Title can not be empty<br>';
    }

    $path = $_FILES['home_banner']['name'];
    $path_tmp = $_FILES['home_banner']['tmp_name'];

    if($path != '') {
        $ext = pathinfo( $path, PATHINFO_EXTENSION );
        $file_name = basename( $path, '.' . $ext );
        if( $ext!='jpg' && $ext!='png' && $ext!='jpeg' && $ext!='gif' ) {
            $valid = 0;
            $error_message .= 'You must have to upload jpg, jpeg, gif or png file<br>';
        }
    }

    if($valid == 1) {

        if($path != '') {
            // removing the existing photo
            $statement = $pdo->prepare("SELECT * FROM tbl_page WHERE id=1");
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);                           
            foreach ($result as $row) {
                $home_banner = $row['home_banner'];
                unlink('../assets/uploads/'.$home_banner);
            }

            // updating the data
            $final_name = 'faq-banner'.'.'.$ext;
            move_uploaded_file( $path_tmp, '../assets/uploads/'.$final_name );

            // updating the database
            $statement = $pdo->prepare("UPDATE tbl_page SET home_title=?,home_banner=?,home_meta_title=?,home_meta_keyword=?,home_meta_description=? WHERE id=1");
            $statement->execute(array($_POST['home_title'],$final_name,$_POST['home_meta_title'],$_POST['home_meta_keyword'],$_POST['home_meta_description']));
        } else {
            // updating the database
            $statement = $pdo->prepare("UPDATE tbl_page SET home_title=?,home_meta_title=?,home_meta_keyword=?,home_meta_description=? WHERE id=1");
            $statement->execute(array($_POST['home_title'],$_POST['home_meta_title'],$_POST['home_meta_keyword'],$_POST['home_meta_description']));
        }

        $success_message = 'Home Page Information is updated successfully.';
        
    }
    
}



if(isset($_POST['form_contact'])) {
    
    $valid = 1;

    if(empty($_POST['contact_title'])) {
        $valid = 0;
        $error_message .= 'Title can not be empty<br>';
    }

    $path = $_FILES['contact_banner']['name'];
    $path_tmp = $_FILES['contact_banner']['tmp_name'];

    if($path != '') {
        $ext = pathinfo( $path, PATHINFO_EXTENSION );
        $file_name = basename( $path, '.' . $ext );
        if( $ext!='jpg' && $ext!='png' && $ext!='jpeg' && $ext!='gif' ) {
            $valid = 0;
            $error_message .= 'You must have to upload jpg, jpeg, gif or png file<br>';
        }
    }

    if($valid == 1) {

        if($path != '') {
            // removing the existing photo
            $statement = $pdo->prepare("SELECT * FROM tbl_page WHERE id=1");
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);                           
            foreach ($result as $row) {
                $contact_banner = $row['contact_banner'];
                unlink('../assets/uploads/'.$contact_banner);
            }

            // updating the data
            $final_name = 'contact-banner'.'.'.$ext;
            move_uploaded_file( $path_tmp, '../assets/uploads/'.$final_name );

            // updating the database
            $statement = $pdo->prepare("UPDATE tbl_page SET contact_title=?,contact_banner=?,contact_meta_title=?,contact_meta_keyword=?,contact_meta_description=? WHERE id=1");
            $statement->execute(array($_POST['contact_title'],$final_name,$_POST['contact_meta_title'],$_POST['contact_meta_keyword'],$_POST['contact_meta_description']));
        } else {
            // updating the database
            $statement = $pdo->prepare("UPDATE tbl_page SET contact_title=?,contact_meta_title=?,contact_meta_keyword=?,contact_meta_description=? WHERE id=1");
            $statement->execute(array($_POST['contact_title'],$_POST['contact_meta_title'],$_POST['contact_meta_keyword'],$_POST['contact_meta_description']));
        }

        $success_message = 'Contact Page Information is updated successfully.';
        
    }
    
}


?>

<section class="content-header">
    <div class="content-header-left">
        <h1>Page Settings</h1>
    </div>
</section>

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
?>


<section class="content" style="min-height:auto;margin-bottom: -30px;">
    <div class="row">
        <div class="col-md-12">
            <?php if($error_message): ?>
            <div class="callout callout-danger">
            
            <p>
            <?php echo $error_message; ?>
            </p>
            </div>
            <?php endif; ?>

            <?php if($success_message): ?>
            <div class="callout callout-success">
            
            <p><?php echo $success_message; ?></p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="content">

    <div class="row">
        <div class="col-md-12">
                            
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
					    <li><a href="#tab_2" data-toggle="tab">Home</a></li>
                        <li class="active"><a href="#tab_1" data-toggle="tab">About Us</a></li>
                       <li><a href="#tab_3" data-toggle="tab">About KSK</a></li>
					   <li><a href="#tab_5" data-toggle="tab">Bio CNG</a></li>
                        <li><a href="#tab_4" data-toggle="tab">Contact</a></li>
                        <li><a href="#tab_6" data-toggle="tab">Privacy Policy</a></li>
						<li><a href="#tab_7" data-toggle="tab">Terms and Conditions</a></li>
                    </ul>

                    

                    <div class="tab-content">
					<!-- About us Page Content -->
                        <div class="tab-pane active" id="tab_1">
                            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <div class="box box-info">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Page Title * </label>
                                        <div class="col-sm-5">
                                            <input class="form-control" type="text" name="about_title" value="<?php echo $about_title; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Page Content * </label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" name="about_content" id="editor1"><?php echo $about_content; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Existing Banner Photo</label>
                                        <div class="col-sm-6" style="padding-top:6px;">
                                            <img src="../assets/uploads/<?php echo $about_banner; ?>" class="existing-photo" style="height:80px;">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">New Banner Photo</label>
                                        <div class="col-sm-6" style="padding-top:6px;">
                                            <input type="file" name="about_banner">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Meta Title</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" name="about_meta_title" value="<?php echo $about_meta_title; ?>">
                                        </div>
                                    </div>             
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Meta Keyword </label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" name="about_meta_keyword" style="height:100px;"><?php echo $about_meta_keyword; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Meta Description </label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" name="about_meta_description" style="height:100px;"><?php echo $about_meta_description; ?></textarea>
                                        </div>
                                    </div>                                    
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label"></label>
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-success pull-left" name="form_about">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    <!--End of About us Page Content -->
        <!-- Home Page Content -->

                        <div class="tab-pane" id="tab_2">
                            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <div class="box box-info">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Page Title * </label>
                                        <div class="col-sm-5">
                                            <input class="form-control" type="text" name="home_title" value="<?php echo $home_title; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Existing Banner Photo</label>
                                        <div class="col-sm-6" style="padding-top:6px;">
                                            <img src="../assets/uploads/<?php echo $home_banner; ?>" class="existing-photo" style="height:80px;">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">New Banner Photo</label>
                                        <div class="col-sm-6" style="padding-top:6px;">
                                            <input type="file" name="home_banner">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Meta Title</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" name="home_meta_title" value="<?php echo $home_meta_title; ?>">
                                        </div>
                                    </div>             
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Meta Keyword </label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" name="home_meta_keyword" style="height:100px;"><?php echo $home_meta_keyword; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Meta Description </label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" name="home_meta_description" style="height:100px;"><?php echo $home_meta_description; ?></textarea>
                                        </div>
                                    </div>                                    
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label"></label>
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-success pull-left" name="form_home">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>

                        <!-- End of Home Page Content -->

                        <!-- Start of Contact Page Content -->
                        <div class="tab-pane" id="tab_4">
                            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <div class="box box-info">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Page Title * </label>
                                        <div class="col-sm-5">
                                            <input class="form-control" type="text" name="contact_title" value="<?php echo $contact_title; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Existing Banner Photo</label>
                                        <div class="col-sm-6" style="padding-top:6px;">
                                            <img src="../assets/uploads/<?php echo $contact_banner; ?>" class="existing-photo" style="height:80px;">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">New Banner Photo</label>
                                        <div class="col-sm-6" style="padding-top:6px;">
                                            <input type="file" name="contact_banner">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Meta Title</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" name="contact_meta_title" value="<?php echo $contact_meta_title; ?>">
                                        </div>
                                    </div>             
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Meta Keyword </label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" name="contact_meta_keyword" style="height:100px;"><?php echo $contact_meta_keyword; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Meta Description </label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" name="contact_meta_description" style="height:100px;"><?php echo $contact_meta_description; ?></textarea>
                                        </div>
                                    </div>                                    
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label"></label>
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-success pull-left" name="form_contact">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                        <!-- End of Contact Page Content -->
						
						<!-- Start of About KSK Page Content -->
                         <div class="tab-pane" id="tab_3">
                            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <div class="box box-info">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Page Title * </label>
                                        <div class="col-sm-5">
                                            <input class="form-control" type="text" name="ksk_title" value="<?php echo $ksk_title; ?>">
                                        </div>
                                    </div>
									<div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Page Content * </label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" name="ksk_content" id="editor6"><?php echo $ksk_content; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Existing Banner Photo</label>
                                        <div class="col-sm-6" style="padding-top:6px;">
                                            <img src="../assets/uploads/<?php echo $ksk_banner; ?>" class="existing-photo" style="height:80px;">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">New Banner Photo</label>
                                        <div class="col-sm-6" style="padding-top:6px;">
                                            <input type="file" name="ksk_banner">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Meta Title</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" name="ksk_meta_title" value="<?php echo $ksk_meta_title; ?>">
                                        </div>
                                    </div>             
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Meta Keyword </label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" name="ksk_meta_keyword" style="height:100px;"><?php echo $ksk_meta_keyword; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Meta Description </label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" name="ksk_meta_description" style="height:100px;"><?php echo $ksk_meta_description; ?></textarea>
                                        </div>
                                    </div>                                    
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label"></label>
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-success pull-left" name="form_KSK">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div> 
                        <!-- End of About KSK  Content -->
                
				<!-- Start of BIO CNG Page Content -->
                         <div class="tab-pane" id="tab_5">
                            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <div class="box box-info">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Page Title * </label>
                                        <div class="col-sm-5">
                                            <input class="form-control" type="text" name="bio_cng_title" value="<?php echo $bio_cng_title; ?>">
                                        </div>
                                    </div>
									<div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Page Content * </label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" name="bio_cng_content" id="editor7"><?php echo $bio_cng_content; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Existing Banner Photo</label>
                                        <div class="col-sm-6" style="padding-top:6px;">
                                            <img src="../assets/uploads/<?php echo $bio_cng_banner; ?>" class="existing-photo" style="height:80px;">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">New Banner Photo</label>
                                        <div class="col-sm-6" style="padding-top:6px;">
                                            <input type="file" name="bio_cng_banner">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Meta Title</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" name="bio_cng_meta_title" value="<?php echo $bio_cng_meta_title; ?>">
                                        </div>
                                    </div>             
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Meta Keyword </label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" name="bio_cng_meta_keyword" style="height:100px;"><?php echo $bio_cng_meta_keyword; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Meta Description </label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" name="bio_cng_meta_description" style="height:100px;"><?php echo $bio_cng_meta_description; ?></textarea>
                                        </div>
                                    </div>                                    
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label"></label>
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-success pull-left" name="form_bio_cng">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div> 
                        <!-- End of BIO CNG  Content -->
                <!-- Privacy Policy Page Content -->
                        <div class="tab-pane active" id="tab_6">
                            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <div class="box box-info">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Page Title * </label>
                                        <div class="col-sm-5">
                                            <input class="form-control" type="text" name="privacy_policy_title" value="<?php echo $privacy_policy_title; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Page Content * </label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" name="privacy_policy_content" id="editor8"><?php echo $privacy_policy_content; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Existing Banner Photo</label>
                                        <div class="col-sm-6" style="padding-top:6px;">
                                            <img src="../assets/uploads/<?php echo $privacy_policy_banner; ?>" class="existing-photo" style="height:80px;">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">New Banner Photo</label>
                                        <div class="col-sm-6" style="padding-top:6px;">
                                            <input type="file" name="privacy_policy_banner">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Meta Title</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" name="privacy_policy_meta_title" value="<?php echo $privacy_policy_meta_title; ?>">
                                        </div>
                                    </div>             
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Meta Keyword </label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" name="privacy_policy_meta_keyword" style="height:100px;"><?php echo $privacy_policy_meta_keyword; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Meta Description </label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" name="privacy_policy_meta_description" style="height:100px;"><?php echo $privacy_policy_meta_description; ?></textarea>
                                        </div>
                                    </div>                                    
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label"></label>
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-success pull-left" name="form_privacy_policy">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    <!--End of Privacy Policy Page Content -->
					
					<!-- Terms and Conditions Page Content -->
                        <div class="tab-pane active" id="tab_7">
                            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <div class="box box-info">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Page Title * </label>
                                        <div class="col-sm-5">
                                            <input class="form-control" type="text" name="terms_n_conditions_title" value="<?php echo $terms_n_conditions_title; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Page Content * </label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" name="terms_n_conditions_content" id="editor9"><?php echo $terms_n_conditions_content; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Existing Banner Photo</label>
                                        <div class="col-sm-6" style="padding-top:6px;">
                                            <img src="../assets/uploads/<?php echo $terms_n_conditions_banner; ?>" class="existing-photo" style="height:80px;">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">New Banner Photo</label>
                                        <div class="col-sm-6" style="padding-top:6px;">
                                            <input type="file" name="terms_n_conditions_banner">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Meta Title</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" name="terms_n_conditions_meta_title" value="<?php echo $terms_n_conditions_meta_title; ?>">
                                        </div>
                                    </div>             
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Meta Keyword </label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" name="terms_n_conditions_meta_keyword" style="height:100px;"><?php echo $terms_n_conditions_meta_keyword; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Meta Description </label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" name="terms_n_conditions_meta_description" style="height:100px;"><?php echo $terms_n_conditions_meta_description; ?></textarea>
                                        </div>
                                    </div>                                    
                                    <div class="form-group"> 
                                        <label for="" class="col-sm-3 control-label"></label>
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-success pull-left" name="form_terms_n_conditions">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    <!--End of Terms and Conditions  Content -->

            </form>
        </div>
    </div>

</section>

<?php require_once('footer.php'); ?>
