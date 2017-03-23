<?php require_once("./includes/db_connection.php"); ?>
<?php require_once("./includes/function.php"); ?>
<?php require_once("./includes/layouts/header.php"); ?>
<?php session_start();
  if(!isset($_SESSION['status'])){
    $_SESSION['status'] = 0;
  }
        
        $courseId = $_SESSION['courseId'];
        $query = "SELECT quiz_name from quiz_mcq where courseId='{$courseId}'";
        $quiz_names = mysqli_query($connection,$query);
        $query1 = "SELECT assignName from assignment  where courseId='{$courseId}'";
        $assignment_names = mysqli_query($connection,$query1);              

 ?>
<!DOCTYPE html>
<html>
<head>
<head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <title>Edubee -List-of-quizes-and-assignments</title>
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
 <style>
      hr{
        height: 12px;
          border: 0;
          box-shadow: inset 0 12px 12px -12px rgba(0, 0, 0, 0.5);
      }
    </style></head>
<body style="font-family:candara;">
	<!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"></a>
    <!-- END SCROLL TOP BUTTON -->
	<div style="font-family:candara;">
    <!--=========== BEGIN HEADER SECTION ================-->
    <?php $path = "course.php"; ?>
    <?php site_header($path,$_SESSION['status']); ?>
    <!--=========== END HEADER SECTION ================--> 
</div>	
<div class="container-fluid">
                <div class="row">
                <div class="col-lg-12 col-md-12"> 
            <div class="title_area">
         <br><br><br><br><br>
              <h2 class="title_two">List of Assignments and quizes</h2>


              <span></span> <br>  
		 
		<?php $link = "course.php?id=".$_SESSION['courseId']; ?>
		<a href='<?php echo $link; ?>' style="margin-left: -1100px"><strong>Go to course</strong></a>
            </div>
		
                  <div class="col-sm-9 col-md-6 col-lg-6" style="background-color:white;padding: 15px 50px 15px 50px">
                    <div class="contact_form wow fadeInLeft">
              <form class="submitphoto_form" "<?=$_SERVER['PHP_SELF'];?>"  method="POST" enctype="multipart/form-data">
              <h2><strong>Assignments</strong></h2>
              <div class="single_footer_widget">
                <ul class="footer_widget_nav">
                <hr>
                <?php 
				$num = mysqli_num_rows($assignment_names);
                if($num>0){
                  while($row=mysqli_fetch_array($assignment_names)){?>
                  <?php $assignmentname = $row['assignName']; ?>
                  <li><a href='<?php echo "assignment_display.php?id=$courseId&name=$assignmentname"; ?>' target="_blank" ><?php echo $row['assignName']; ?></a></li>
                  <?php }}else{
                    echo "No assignments are added yet";
                    } ?>
                </ul>
                <hr>
              </div>
              </form>   
           </div>
                  </div>
                  <div class="col-sm-9 col-md-6 col-lg-6" style="background-color:white; padding: 15px 50px 15px 50px">
                  
                <h2>Quizes </h2>
                	 <div class="single_footer_widget">
                <ul class="footer_widget_nav">
                <hr>
                <?php 
		$quiz_num = mysqli_num_rows($quiz_names);
		if($quiz_num>0){
      		while($row = mysqli_fetch_array($quiz_names)){ ?>
                    <?php $name = $row['quiz_name']; ?>
                  <li><a href='<?php echo "quiz_display.php?id=$courseId&name=$name"; ?>' target="_blank" ><?php echo $row['quiz_name']; ?></a></li>
                <?php }}else{
                  echo "No quiz is added in course";
                  } ?>
                </ul>
                <hr>
              </div>
              
                  </div>
                </div>
        </div>

      </div>
    </section>
    <!--=========== END OUR COURSES SECTION ================--> 
    
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
