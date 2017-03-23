<?php require_once("./includes/db_connection.php"); ?>
<?php require_once("./includes/function.php"); ?>
<?php require_once("./includes/layouts/header.php"); ?>
<?php 
session_start();
?>
<?php 
  $flag=1;
  $message=10;
  $_SESSION['status'] = 0;
  if(isset($_POST["submit"])){
    if(empty($_POST["username"])){
      $flag=0;
    }
    if(isset($_POST["username"])) {
      $username= mysqli_real_escape_string($connection,$_POST["username"]);
     // $_SESSION['user'] = $username;
    }
    else
      $username = "";
    
    if(empty($_POST["password"])){
      $flag=0;
    }
    if(isset($_POST["password"])) {
      $password = mysqli_real_escape_string($connection,$_POST["password"]);
    }
    else
      $password = "";
    
    if($flag == 1){
    $result=find_password_by_username($username);
    if(password_check($password, $result['password']) === true){
      $message=0;
      $_SESSION['user'] = $username;
      $_SESSION['status'] = 1;
    }
    else{
      $message=1;
      $_SESSION['status'] = 0;     

    }

    }
  }
    
  
  ?>
  <?php if($message == 0) redirect_to("dashboard.php"); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <title>Edubee - LogIn</title>
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
 <body style="font-family:candara;"> 

<!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"></a>
    <!-- END SCROLL TOP BUTTON -->
	<div style="font-family:candara;">
    <!--=========== BEGIN HEADER SECTION ================-->
    <?php $path = "login.php"; ?>
    <?php site_header($path,$_SESSION['status']); ?>
    <!--=========== END HEADER SECTION ================--> 
</div>	
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
                  
<div>
<?php if($message == 1){ $em="<div class='alert alert-danger'>".
			"<strong>Edubee : </strong> Username or Password is incorrect ".
			"</div>"; ?>   
<?php echo $em;}?>
</div>	
                   <div class="contact_form wow fadeInLeft">
						<div class="title_area">
              <h2 class="title_two">LogIn TO edubee </h2>
              <span></span> 
            </div>	
		
			 
                      <form class="submitphoto_form" action="login.php"  method="POST">
                      		
										 
                                          <input type="text" name="username" value="" class="wp-form-control wpcf7-text" placeholder="Username" style="border-radius:5px;border:solid #3FADC9;	border-width:1px;padding:5px;"required>
                                          <?php if($flag === 0) echo "<span style='color:rgb(255,0,0);font-size:10px;'>Username not unique</span><br>";
                                          else {} ?>


                              
                        <input type="password" name="password" class="wp-form-control wpcf7-text" id="pass1"placeholder="Password" minlength="8" style="border-radius:5px;border:solid #3FADC9;	border-width:1px;padding:5px;" required>
                        
                        <?php if($message == 1) $em="<div class='alert alert-danger'>".
			"<strong>Edubee : </strong> Username or Password is incorrect ".
			"</div>"; ?>      
                        <center><button type="button" class="btn btn-primary" style="margin-left:0px" onclick="document.getElementById('submitLogin').click();">Login</button></center>
                              <input type="submit" name="submit" id="submitLogin" style="display:none;">
                        
                        <br>
                        <ul class="footer_widget_nav">
                        <br>
                              <li><a href="signup.php">Dont have account? Sign Up here<br></a></li>
                              <li><a href="forget_password.php">Forget Password? Reset Here!</a></li>

                                </ul>
                        <br>
                      </form>

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
