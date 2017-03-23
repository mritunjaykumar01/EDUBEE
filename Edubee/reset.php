<?php require_once("./includes/db_connection.php"); ?>
<?php require_once("./includes/function.php"); ?>
<?php require_once("./includes/layouts/header.php"); ?>
<?php 
session_start();
?>
<?php 

        $message = "";
        $flag=1;
        $set=0;
        $username = $_GET['username'];
        $encrypt = $_GET['token'];
        $link = "reset.php?token=".$encrypt."&username=".$username;
        $user_data = find_userdata_by_username($username);
        $real_encrypt = md5($user_data['email']).$user_data['password'];
        if($encrypt != $real_encrypt){
          die();
        } 
        if(isset($_POST['submit'])){
        
        if(empty($_POST["password"])){
          $flag=0;
       }
        if(isset($_POST["password"])) {
         $password = mysqli_real_escape_string($connection,$_POST["password"]);
      }
      else
        $password = "";


    if(empty($_POST["confirm_password"])){
      $flag=0;
    }
    if(isset($_POST["confirm_password"])){
      $confirm_password = mysqli_real_escape_string($connection,$_POST["confirm_password"]);
    }
    else
      $confirm_password= "";


    if($flag==1){
      
        $password = password_encrypt($password);
        
        $query1="UPDATE signup SET password='{$password}' WHERE username='{$username}'";
        $result1=mysqli_query($connection,$query1); 
        if($result1){
         $message ="password updated successfully";
          $set=1;
        }else{
          $message = "Database query faild";
            die();
        }
    
        }
        else{
          $message = "something goes wrong do it again";
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
     <title>Edubee - SignUp</title>
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
    <script type="text/javascript">
      function checksignup()
      {
          var p1=document.getElementById("pass1").value;
          var p2=document.getElementById("pass2").value;
          if(p1.localeCompare(p2)!=0){
            document.getElementById("pass2").style.borderColor="red";
          
          alert("Password didnt match");}
          else
          {
            document.getElementById("submitSignup").click();
          }

      }

    </script>
 
  </head>
  <body style="font-family:candara;"> 

<!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"></a>
    <!-- END SCROLL TOP BUTTON -->
	<div style="font-family:candara;">
    <!--=========== BEGIN HEADER SECTION ================-->
    <?php $path = "signup.php"; ?>
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
                  
				
                   <div class="contact_form wow fadeInLeft">
					<div class="title_area">
              <h2 class="title_two">Reset password Here</h2>
              <span></span> 
            </div>
                      <?php if($set == 0){ ?>
                      <form class="submitphoto_form" action='<?php echo $link; ?>'  method="POST">
                        
                        <input type="password" name="password" class="wp-form-control wpcf7-text" id="pass1"placeholder="Set your password" minlength="8" style="border-radius:5px;border:solid #3FADC9;	border-width:1px;padding:5px;" required>
                        
                        <input type="password" name="confirm_password" class="wp-form-control wpcf7-text" id="pass2"placeholder="Confirm  password" minlength="8" style="border-radius:5px;border:solid #3FADC9;	border-width:1px;padding:5px;" required>
                        
                        <center><button type="button" class="btn btn-primary" style="margin-left:0px" onclick="checksignup();">Sign Up</button></center>
                              <input type="submit" name="submit" id="submitSignup" style="display:none;">
                        
                      </form>
                      <?php }else{
                        echo $message."<br>";
                         ?>
                         <a href="login.php">Click here to login</a>
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
