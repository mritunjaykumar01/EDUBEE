<?php require_once("./includes/db_connection.php"); ?>
<?php require_once("./includes/function.php"); ?>
<?php require_once("./includes/layouts/header.php"); ?>
<?php session_start();
  if(!isset($_SESSION['status'])){
    $_SESSION['status'] = 0;
  }
                  
                      $query  = "SELECT * FROM projectinfo";
                      $all_projects = mysqli_query($connection, $query);
                      confirm_query($all_projects);
                       $total_rows = mysqli_num_rows($all_projects);

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <title>Edubee - Project Catalog</title>
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
 <script language="JavaScript">
 
 </script>
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
    <?php $path = "project.php"; ?>
    <?php 
    $status = $_SESSION['status'];
    site_header($path,$status); ?>
    <!--=========== END HEADER SECTION ================-->
    
<!--=========== BEGIN OUR COURSES SECTION ================-->
    <section id="ourCourses">
      <div class="container">
       <!-- Our courses titile -->
        <div class="row">
          <div class="col-lg-12 col-md-12"> 
            <div class="title_area">
            <br>
            <br>
            <br>
            <br>
              <h2 class="title_two">Project Catalog</h2>
              <span></span> 
            </div>
            <b><?php if(mysqli_num_rows($all_projects) == 0) echo "No Project is Created yet"; ?></b>
          </div>
        </div>
        <!-- End Our courses titile -->
       
        <!-- Start Our courses content -->
        <?php while($total_rows !=0){ ?>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="ourCourse_content">
              <ul class="course_nav">
                <?php 
                  
                
                $temp=0;
                  if(mysqli_num_rows($all_projects) > 0){
                  while($projectdata = mysqli_fetch_array($all_projects)){
                        $temp++;
                        $total_rows--;
                        //$_SESSION['projectId'] = $projectdata['projectId'];
                 ?>
                <li>
                  <div class="single_course">
                    <div class="singCourse_imgarea">
                      <img src='<?php echo $projectdata['imgFile']; ?>' />
                      <div class="mask">                         
                        <a class="course_more" onclick="window.location='project.php?id='+'<?php echo $projectdata['projectId']; ?>';">View Project</a>
                      </div>
                    </div>
                    <div class="singCourse_content">
                    <h3 class="singCourse_title"style="margin-left:10px;"><a href="#"><?php echo $projectdata['name']; ?></a></h3>
                    <p style="margin-left:10px;">Description :<?php $description = $projectdata['description'];
                        if(strlen($description)>50)
                        echo substr($description,0,50).".....";
                      else
                        echo $description;
                       ?></p>
                    
                    <div class="singCourse_author">
                     <!--  <img src="img/author.jpg" alt="img"> -->
                      <p><strong>Owner : </strong><?php 
                      $data_of_user = find_userdata_by_username($projectdata['owner']);
                      echo $data_of_user['full_name'];
                       ?></p>
                    </div></div>
                  </div>
                </li>
                <?php 
                  if($temp ==3){
                    break;
                  }
                  }} ?>
                  
              </ul>
            </div>
          </div>
        </div>
        <?php } ?>
        <!-- End Our courses content -->

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