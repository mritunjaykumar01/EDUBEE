<?php require_once("./includes/db_connection.php"); ?>
<?php require_once("./includes/function.php"); ?>
<?php require_once("./includes/layouts/header.php"); ?>
<?php 
session_start();
?>
<?php 
        $full_nameErr ="";
        $usernameErr = "";
        $emailErr ="";
        $passwordErr ="";
        $flag=1;
        $_SESSION['status'] = 0;
        //echo "hello";
    if(isset($_POST["signup_submit"])){
        if(empty($_POST["full_name"])){
            $full_nameErr = "please fill name</br>";
            $flag=0;}
        else if(isset($_POST["full_name"])){
          $full_name = trim(mysqli_real_escape_string($connection,$_POST["full_name"]));
            if (!preg_match("/^[a-zA-Z ]*$/",$full_name)) {
              $full_nameErr = "Only letters and white space allowed for name";
              $flag=0;
          }  
        } 
        else
            $full_name = "";

        if(empty($_POST["username"])){
            $usernameErr = "please fill name</br>";
            $flag=0;}
        else if(isset($_POST["username"])){
          $username = trim(mysqli_real_escape_string($connection,$_POST["username"]));  
          $check_username = find_user_by_username($username);
          if($check_username === false){
            $usernameErr = "username is not unique";
            $flag = 0;
          }
        } 
        else
            $username = "";

        if(empty($_POST["email"])){
            $emailErr = "please fill email</br>";
            $flag=0;}
        else if(isset($_POST["email"])) {
        $email = trim(mysqli_real_escape_string($connection,$_POST["email"]));
        $check_email = find_user_by_email($email);
        if($check_email === false){
          $emailErr = "this email is already registered";
          $flag=0;
        }
         if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
        $flag = 0;
    }
      }
        else
            $email = "";

         if(empty($_POST["password"])){
            $passwordErr = "please fill password</br>";
            $flag=0;}
        else if(isset($_POST["password"])) {
            $password = mysqli_real_escape_string($connection,$_POST["password"]);
             $confirm_password = mysqli_real_escape_string($connection,$_POST["confirm_password"]);
             if($password === $confirm_password && strlen($password) >= 8){
                $password = password_encrypt($password);
             }else{
              $passwordErr = "password does not match or password should contain 8 chars";
              $flag=0;
             }
            
        }
        
        else
        $password="";
 
        //$username,$full_name,$email,$password
        if($flag==1){
            $query1="INSERT INTO signup (username,full_name,email,password)
        VALUES ('{$username}','{$full_name}','{$email}','{$password}')";
        $result1=mysqli_query($connection,$query1); 
        
        if($result1){
          $new_location = "login.php";
          //$_SESSION["user"] = $username;
          //$_SESSION['status'] = 1;
          redirect_to($new_location);

        }else{
            die("database query field ".mysqli_error($connection));
        }
    
        }
        else{
            ?>To Sign Up again <a href="signup.php">"click here"</a> <?php
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
              <h2 class="title_two">SignUp with Edubee</h2>
              <span></span> 
            </div>
                      <form class="submitphoto_form" action="signup.php"  method="POST">
                     
                        <input type="text" name="full_name" value="" class="wp-form-control wpcf7-text" placeholder="Your full name" style="border-radius:5px;border:solid #3FADC9;	border-width:1px;padding:5px;"required>
                        
                                          <input type="text" name="username" value="" class="wp-form-control wpcf7-text" placeholder="Desired Username" style="border-radius:5px;border:solid #3FADC9;	border-width:1px;padding:5px;" required>
                                          <?php if($flag === 0) echo "<span style='color:rgb(255,0,0);font-size:10px;'>$usernameErr</span><br>";
                                          else {} ?>
                        <input type="mail" name="email" value="" class="wp-form-control wpcf7-email" placeholder="Email address" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="please enter  a valid email address like jitendra@gmail.com" style="border-radius:5px;border:solid #3FADC9;	border-width:1px;padding:5px;" required>
                        <?php if($flag === 0) echo "<span style='color:rgb(255,0,0);font-size:10px;'>$emailErr</span><br>";
                        else{} ?>
                              
                        <input type="password" name="password" class="wp-form-control wpcf7-text" id="pass1"placeholder="Set your password" minlength="8" style="border-radius:5px;border:solid #3FADC9;	border-width:1px;padding:5px;" required>
                        
                        <input type="password" name="confirm_password" class="wp-form-control wpcf7-text" id="pass2"placeholder="Confirm  password" minlength="8" style="border-radius:5px;border:solid #3FADC9;	border-width:1px;padding:5px;" required>
                        
                        <center><button type="button" class="btn btn-primary" style="margin-left:0px" onclick="checksignup();">Sign Up</button></center>
                              <input type="submit" name="signup_submit" id="submitSignup" style="display:none;">
                        <hr>
                        <hr>
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
