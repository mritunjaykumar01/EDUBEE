<?php require_once("./includes/db_connection.php"); ?>
<?php require_once("./includes/function.php"); ?>
<?php require_once("./includes/layouts/header.php"); ?>
<?php 
session_start();
?>
<?php 

  $flag=0;
  if(isset($_POST['submit'])){
    $flag=1;
    if(empty($_POST["username"])){
      $flag=0;
    }
    if(isset($_POST["username"])) {
      $username= mysqli_real_escape_string($connection,$_POST["username"]);
     // $_SESSION['user'] = $username;
    }
    else
      $username = "";

    $result = find_user_by_username($username);
    if($result === true){
    	$message = "Username is not registered";
     	//redirect_to("login.php");
    }else{
    	$user_data = find_userdata_by_username($username); 
    	$encrypt = md5($user_data['email']).$user_data['password'];
      //$time = md5(time());
    	$to = $user_data['email'];
    	$subject = "Forgot Password";
    	$from = "edubee.iitp@gmail.com";
    	$body = "<html><head></head><body>Hi,<br><br>Please click to this <a href='172.16.26.9/~hitesh.me14/edubee/reset.php?token=$encrypt&username=$username'> link </a> to reset password </body></html>";
    	$message = "mail will be send to ".$to;
    	$_SESSION['to'] = $to;
    	$_SESSION['subject'] = $subject;
    	$_SESSION['body'] = $body;
    	redirect_to("PHPMailer/mail.php");
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
     <title>Edubee : your online education partner</title>

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
  <body> 

<!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"></a>
    <!-- END SCROLL TOP BUTTON -->

    <!--=========== BEGIN HEADER SECTION ================-->
    <?php $path = "login.php"; ?>
    <?php site_header($path,$_SESSION['status']); ?>
    <!--=========== END HEADER SECTION ================-->  
     <!-- About Us Page
    ==========================================-->
    <hr>
    <hr>
    <hr>
    <hr>
    <div id="tf-signup" >
          <div class="container" style="margin: top:20px">
              <div class="row">
                <div class="col-md-6">
                      <img src="img/iitp/apple.png" class="img-responsive">
                  </div>
                  <div class="col-md-6">
                      <div class="about-text">
                            <div class="section-title">
                            <div class="row">
                       <div class="col-lg-8 col-md-8 col-sm-8">
                  

                   <div class="contact_form wow fadeInLeft">
                      <?php if($flag==0){ ?>

                      <form class="submitphoto_form" action="<?php echo $_SERVER['PHP_SELF']; ?>"  method="POST">
                      <h3><strong><u>Reset Password</u></strong></h3>
                    
                                          <input type="text" name="username" value="" class="wp-form-control wpcf7-text" placeholder="Username" style="border:solid #000;border-width:0.5px;" required>
                                               
                        <button type="button" class="btn btn-primary" style="margin-left:15px" onclick="document.getElementById('submitLogin').click();">Submit</button>
                              <input type="submit" name="submit" id="submitLogin" style="display:none;">
                        
                        <br>
                        <ul class="footer_widget_nav">

                        <br>
                      </ul>
                        <br>
                      </form><?php }else{ ?>

                      <?php echo $message; ?>
                      <?php } ?>
                      
                   </div>
                 </div>
                            </div>
                       
                      </div>
                  </div>
              </div>
          </div>
    </div>    
    <!--=========== BEGIN FOOTER SECTION ================-->
    <br>
    <br>
    <br>
    <br>
    <br>    
    <?php require_once("./includes/layouts/footer.php"); ?>
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
<?php require_once("./includes/db_connection_close.php"); ?>
