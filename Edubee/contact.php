<?php require_once("./includes/db_connection.php"); ?>
<?php require_once("./includes/function.php"); ?>
<?php require_once("./includes/layouts/header.php"); ?>
<?php session_start(); ?>

<?php 
    $flag=1;
    $set_message = 0;
    if(isset($_POST["submit"])){
        if(empty($_POST["full_name"])){
            $flag=0;
          }
        else if(isset($_POST["full_name"])){
          $full_name = trim(mysqli_real_escape_string($connection,$_POST["full_name"])); 
        } 
        else
            $full_name = "";

        if(empty($_POST["email"])){
            $flag=0;
          }
        else if(isset($_POST["email"])) {
        $email = trim(mysqli_real_escape_string($connection,$_POST["email"]));
       }
      
        else
            $email = "";

        
        if(empty($_POST["subject"])){
            $flag=0;
          }
        else if(isset($_POST["subject"])){
          $subject = trim(mysqli_real_escape_string($connection,$_POST["subject"])); 
        } 
        else
            $subject = "";

        if(empty($_POST["text"])){
            $flag=0;
          }
        else if(isset($_POST["text"])){
          $text = trim(mysqli_real_escape_string($connection,$_POST["text"])); 
        } 
        else
            $text = "";          

        //$full_name,$email,$subject,$text
        if($flag==1){
            $query1="INSERT INTO contact_us (full_name,email,subject,text)
        VALUES ('{$full_name}','{$email}','{$subject}','{$text}')";
        $result1=mysqli_query($connection,$query1); 
        
        if($result1){
            $set_message = 1;  
            $message ="<div class='alert alert-success'>".
			"<strong>Edubee : </strong>Your response is successfully submited".
			"</div>";
        }else{
			$message ="<div class='alert alert-danger'>".
			"<strong>Edubee : </strong> Database query failed - ".mysqli_error($connection).
			"</div>";
            die();
        }
    
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
     <title>Edubee - Contact Us</title>
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
 <style type="text/css">

input {
	border-radius:5px;border:solid #3FADC9;	border-width:1px;padding:3px;
}
input:focus,textarea:focus {
	outline:none;
}

</style>
  </head>
   <body style="font-family:candara;">

   <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"></a>
    <!-- END SCROLL TOP BUTTON -->
	<div style="font-family:candara;">
    <!--=========== BEGIN HEADER SECTION ================-->
    <?php $path = "contact.php"; ?>
     <?php site_header($path,$_SESSION['status']); ?>
    <!--=========== END HEADER SECTION ================--> 
	</div>

    <!--=========== BEGIN COURSE BANNER SECTION ================-->
    <section id="imgBanner"  src="img/iitp/3.jpg">
      <h2><span><u>Contact US</u></span></h2>
    </section>
    <!--=========== END COURSE BANNER SECTION ================-->
    
    <!--=========== BEGIN CONTACT SECTION ================-->
    <section id="contact">
      <div class="container">
       <div class="row">
          <div class="col-lg-12 col-md-12"> 
            <div class="title_area">
              <h2 class="title_two" > <div class="title_area">
              <h2 class="title_two">SEND US YOUR QUERIES</h2>
              <span></span> 
            </div></h2>
              <p>You just need to fill following form subjecting to your queries. We are always active to resolve your queries.
                <br>
                  Your  suggestions for any improvement in the website  are always welcomed .
              </p>
            </div>
          </div>
       </div>
       <?php if($set_message == 1) echo $message; ?>
       <div class="row">
         <div class="col-lg-8 col-md-8 col-sm-8">
           <div class="contact_form wow fadeInLeft">
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="submitphoto_form">
                <input type="text" name="full_name" pattern="[A-Za-z\s]{1,300}" value="" class="wp-form-control wpcf7-text" placeholder="Your name" style="border-radius:5px;border:solid #3FADC9;	border-width:1px;padding:5px;"required>
                <input type="mail" name="email" value="" class="wp-form-control wpcf7-email" placeholder="Email address" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="please enter  a valid email address like jitendra@gmail.com" style="border-radius:5px;border:solid #3FADC9;	border-width:1px;padding:5px;"required>          
                <input type="text" name="subject" value="" class="wp-form-control wpcf7-text" placeholder="Subject" style="border-radius:5px;border:solid #3FADC9;	border-width:1px;padding:5px;" required>
                <textarea name="text" value="" class="wp-form-control wpcf7-textarea" cols="30" rows="10" placeholder="What would you like to tell us" style="border-radius:5px;border:solid #3FADC9;	border-width:1px;padding:5px;" required></textarea>
                <input type="submit" name="submit" value="Submit" class="btn btn-primary">
              </form>
           </div>
         </div>
         <div class="col-lg-4 col-md-4 col-sm-4">
           <div class="contact_address wow fadeInRight">
             <h3><strong><u>Address</u></strong></h3>
             <div class="address_group">
               <p><strong>Indian Institute of Technology , Patna</strong></p>
               <p>Phone: ##########</p>
               <p>Email:edubee.iitp@gmail.com</p>
             </div>
             <div class="address_group">
              <ul class="footer_social">
                <li><a href="#" class="soc_tooltip" title="" data-placement="top" data-toggle="tooltip" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#" class="soc_tooltip" title="" data-placement="top" data-toggle="tooltip" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#" class="soc_tooltip" title="" data-placement="top" data-toggle="tooltip" data-original-title="Google+"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#" class="soc_tooltip" title="" data-placement="top" data-toggle="tooltip" data-original-title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#" class="soc_tooltip" title="" data-placement="top" data-toggle="tooltip" data-original-title="Youtube"><i class="fa fa-youtube"></i></a></li>
                </ul>
             </div>
           </div>
         </div>
       </div>
      </div>
    </section>
    <!--=========== END CONTACT SECTION ================-->
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
