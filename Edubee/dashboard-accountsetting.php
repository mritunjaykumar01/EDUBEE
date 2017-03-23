<?php require_once("./includes/db_connection.php"); ?>
<?php require_once("./includes/function.php"); ?>
<?php require_once("./includes/layouts/header.php"); ?>
<?php session_start();
  if(!isset($_SESSION['status'])){
    $_SESSION['status'] = 0;
  }
  if($_SESSION['status'] == 0){
    redirect_to("login.php");
  }
  $username = $_SESSION['user'];
  $userdata = find_userdata_by_username($username); 

 ?>
 <?php 
  $flag=1;
  $set=0;
  $message ="";
  if(isset($_POST['submit'])){
    
    if(empty($_POST["current_password"])){
      $flag=0;
    }
    if(isset($_POST["current_password"])) {
      $current_password = mysqli_real_escape_string($connection,$_POST["current_password"]);
    }
    else
      $current_password = "";

    if(empty($_POST["new_password"])){
      $flag=0;
    }
    if(isset($_POST["new_password"])) {
      $new_password = mysqli_real_escape_string($connection,$_POST["new_password"]);
    }
    else
      $new_password = "";

    if(empty($_POST["confirm_new_password"])){
      $flag=0;
    }
    if(isset($_POST["confirm_new_password"])) {
      $confirm_new_password = mysqli_real_escape_string($connection,$_POST["confirm_new_password"]);
    }
    else
      $confirm_new_password= "";

    // echo $current_password."<br>";

    // echo $new_password."<br>";

    // echo $confirm_new_password."<br>";    
    //checking with current password;

    if($new_password != $confirm_new_password){
      $flag=0;
      $message = "<div class='alert alert-danger'>".
			"<strong>Edubee : </strong> Password mismatch".
			"</div>";
    }
    if($flag == 1){
    if(password_check($current_password, $userdata['password']) === true){
      $password = password_encrypt($new_password);
    }
    else{
      $message = "<div class='alert alert-danger'>".
			"<strong>Edubee : </strong> Password mismatch".
			"</div>";
      $flag=0;    
    }
    }

    if($flag==1){
        $query1="UPDATE signup SET password='{$password}' WHERE username='{$username}'";
        $result1=mysqli_query($connection,$query1); 
        if($result1){
         $message ="<div class='alert alert-success'>".
			"<strong>Edubee : </strong>Password updated successfully".
			"</div>";
          $set=1;
        }else{
            echo "<div class='alert alert-danger'>".
			"<strong>Edubee : </strong> Database query failed - ".mysqli_error($connection).
			"</div>";
			die();
        }
    
        }
        else{
          $message = "<div class='alert alert-danger'>".
			"<strong>Edubee : </strong> Something went wrong. Try again.".
			"</div>";
        }

  }






  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <title>Edubee - Account Settings</title>
<link rel="icon" href="img/icon.jpg" type="image/x-icon">
    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- CSS
    ================================================== -->       
    <!-- Bootstrap css file-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Font awesome css file-->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- Superslide css file-->
    <link rel="stylesheet" href="css/superslides.css">
    <!-- Slick slider css file -->
    <link href="css/slick.css" rel="stylesheet"> 
    <!-- Circle counter cdn css file -->
    <link rel='stylesheet prefetch' href='css/jquery.circliful.css'>  
    <!-- smooth animate css file -->
    <link rel="stylesheet" href="css/animate.css"> 
    <!-- preloader -->
    <link rel="stylesheet" href="css/queryLoader.css" type="text/css" />
    <!-- gallery slider css -->
    <link type="text/css" media="all" rel="stylesheet" href="css/jquery.tosrus.all.css" />    
    <!-- Default Theme css file -->
    <link id="switcher" href="css/themes/default-theme.css" rel="stylesheet">
    <!-- Main structure css file -->
    <link href="style.css" rel="stylesheet">
   
    <!-- Google fonts -->
    <link href='fonts/googlefont1' rel='stylesheet' type='text/css'>   
    <link href='fonts/googlefont2' rel='stylesheet' type='text/css'>    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
 
  </head>
  <body style="font-family:candara;background-color:#313338">

   <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"></a>
    <!-- END SCROLL TOP BUTTON -->
	<div style="font-family:candara;">
    <!--=========== BEGIN HEADER SECTION ================-->
    <?php $path = "dashboard.php"; ?>
     <?php site_header($path,$_SESSION['status']); ?>
    <!--=========== END HEADER SECTION ================--> 
	</div>



<div class="container">


    <div class="row profile" style="margin: 30px 0;">
    <div class="col-md-2">
                 <br>
                <br>
                <br>
                <br>
    <div class="col-lg-3 col-md-3 col-sm-3" >
                  <div class="single_whyus_top wow fadeInUp">
                    <div class="whyus_icon" style="margin-left: -60px">
                      <span class="fa fa-user" ></span>
                      <br>
                      <br>
                    </div>
                  </div>
                </div>

      <div class="profile-sidebar" style="margin-left:-92px;">
        <!-- SIDEBAR USERPIC -->
        
    
        <div class="profile-usertitle"  style="margin-top: 170px;"><center>
          <div class="profile-usertitle-name" style="color: #999999;
                                                                                      font-size: 20px;
                                                                                      
                                                                                      margin-bottom: 7px;" ><b>
                                                                                        <?php echo $userdata['full_name']; ?></b>    
          </div>
          <div class="profile-usertitle-job"  style="text-transform: lowercase;
                                                                                    color: #5b9bd1;
                                                                                    font-size: 12px;
                                                                                    font-weight: 600;
                                                                                    margin-bottom: 15px;">
                                                                                  <?php echo $userdata['email']; ?>
          </div></center>
        </div>
        <!-- END SIDEBAR USER TITLE -->
        <!-- SIDEBAR BUTTONS -->
        <div class="profile-userbuttons"   style="text-align: center;   margin-top: 10px;">
          <button type="button" class="btn btn-success btn-sm" onclick="window.location.href='createCourse.php';">Create your own Course</button><br><br>
          <button type="button" class="btn btn-success btn-sm" onclick="window.location.href='createProject.php';">Create your own Project</button>
        </div>
        <!-- END SIDEBAR BUTTONS -->
        <!-- SIDEBAR MENU -->
        <div  style="margin-top: 30px;">
          <ul class="nav">
            
            <li style="width:320px;margin-left:-30px;">
              <a href="dashboard.php" style="color:#999">
              <i class="glyphicon glyphicon-user"></i>
              Overview </a>
            </li>
			<li id="option1" style="background-color:#3FADC9;width:320px;margin-left:-30px;" >
              <a href="" ><span style="color:#fff;">
              <i class="glyphicon glyphicon-home"></i>
              Account Settings </span></a>
            </li>
          </ul>
        </div>
		
        <!-- END MENU -->
      </div>
    </div>
    <div class="col-md-10">
            <div class="profile-content" style=" margin-left:0px;width:120%;
                                                                              background: #fff;
                                                                              min-height: 460px;" >
                                     <div class="row">
                                          <div class="col-lg-8 col-md-8 col-sm-8" style="padding-left:250px;"><center>                                                    
										  <div class="contact_form wow fadeInLeft">
                                          <?php if($set==0){ ?>
                                          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="submitphoto_form">
                                                                              <br>
                                                                              <br>
                                                                              <br>
                                                                              <br>
                                                                            
                                          <h2 class="title_two" style=""> <div class="title_area">
              <h2 class="title_two">Reset Password</h2>
              <span></span> 
            </div></h2>
                                       <input type="password" name="current_password" value="" class="wp-form-control wpcf7-text" placeholder="Enter current password" style="border-radius:5px;border:solid #3FADC9;	border-width:1px;padding:5px;" required>
                                 <input type="password" name="new_password" value="" class="wp-form-control wpcf7-text" placeholder="Enter  your new password" style="border-radius:5px;border:solid #3FADC9;	border-width:1px;padding:5px;" required>
                                       <input type="password" name="confirm_new_password" value="" class="wp-form-control wpcf7-text" placeholder="Re-enter  your new password" style="border-radius:5px;border:solid #3FADC9;	border-width:1px;padding:5px;" required>
                                       <?php echo $message."<br>";
                                       //echo $current_password."abcd"."<br>";echo $new_password."<br>";echo $confirm_new_password."<br>";
                                        ?>
                                                  <input type="submit" name="submit" value="Reset Password" class="btn btn-primary">
                                                                              </form><br><br><br><br><br><br><br><br>
                                          <?php }else{ echo "<br><br><br><br><br><br><br><br>".$message; }?>

                                                                           </div>
                                                                      </center>   </div>
            </div>
    </div>
  </div>
</div>





    <!--=========== BEGIN FOOTER SECTION ================-->
    <footer id="footer">
      <!-- Start footer top area -->
      <div class="footer_top">
        <div class="container">
          <div class="row">
            <div class="col-ld-3  col-md-3 col-sm-3">
              <div class="single_footer_widget">
                <h3>About Us</h3>
                <p><strong>We are  intended to address the problems related bringing education to  users in much more interactive way as well as engaging prospective users in learning as well as practical sense by including collaborative projects.</strong></p>
              </div>
            </div>
            <div class="col-ld-3  col-md-3 col-sm-3">
              <div class="single_footer_widget">
                <h3>Community</h3>
                <ul class="footer_widget_nav">
                  <li><a href="#ourTutors" class="page-scroll">Devoloper team</a></li>
                  <li><a href="#">Our enrolled students</a></li>
                  <li><a href="#">Our Teaching Team</a></li>
                  <li><a href="#"> Discussion forum</a></li>
                  <li><a href="#">News &amp; Media</a></li>
                </ul>
              </div>
            </div>
            <div class="col-ld-3  col-md-3 col-sm-3">
              <div class="single_footer_widget">
                <h3>Others</h3>
                <ul class="footer_widget_nav">
                  <li><a href="#">Link 1</a></li>
                  <li><a href="#">Link 2</a></li>
                  <li><a href="#">Link 3</a></li>
                  <li><a href="#">Link 4</a></li>
                  <li><a href="#">Link 5</a></li>
                </ul>
              </div>
            </div>
            <div class="col-ld-3  col-md-3 col-sm-3">
              <div class="single_footer_widget">
                <h3>FOLLOW US HERE</h3>
                <ul class="footer_social">
                  <li><a data-toggle="tooltip" data-placement="top" title="Facebook" class="soc_tooltip" href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a data-toggle="tooltip" data-placement="top" title="Twitter" class="soc_tooltip"  href="#"><i class="fa fa-twitter"></i></a></li>
                  <li><a data-toggle="tooltip" data-placement="top" title="Google+" class="soc_tooltip"  href="#"><i class="fa fa-google-plus"></i></a></li>
                  <li><a data-toggle="tooltip" data-placement="top" title="Linkedin" class="soc_tooltip"  href="#"><i class="fa fa-linkedin"></i></a></li>
                  <li><a data-toggle="tooltip" data-placement="top" title="Youtube" class="soc_tooltip"  href="#"><i class="fa fa-youtube"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End footer top area -->

      <!-- Start footer bottom area -->
      <div class="footer_bottom">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="footer_bootomLeft">
                <p><strong>Copyright &copy; 2016 . All Rights Reserved</strong></p>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="footer_bootomcentre">
                <p><strong>Designed by </strong><a href="https://www.facebook.com/groups/iitptna/" rel="nofollow"><u><strong>IIT Patna</strong></u></a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End footer bottom area -->
    </footer>
    <!--=========== END FOOTER SECTION ================--> 
    <!-- Javascript Files
    ================================================== -->

    <!-- initialize jQuery Library -->
    <script src="js/jquery.min.js"></script>
    <!-- Preloader js file -->
    <script src="js/queryloader2.min.js" type="text/javascript"></script>
    <!-- For smooth animatin  -->
    <script src="js/wow.min.js"></script>  
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- slick slider -->
    <script src="js/slick.min.js"></script>
    <!-- superslides slider -->
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.animate-enhanced.min.js"></script>
    <script src="js/jquery.superslides.min.js" type="text/javascript" charset="utf-8"></script>   
    <!-- for circle counter -->
    <script src='js/jquery.circliful.min.js'></script>
    <!-- Gallery slider -->
    <script type="text/javascript" language="javascript" src="js/jquery.tosrus.min.all.js"></script>   
   
    <!-- Custom js-->
    <script src="js/custom.js"></script>
  </body>
</html>