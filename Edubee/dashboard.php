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
  $userdata = find_userdata_by_username($username); //all data of user

 ?>

<?php 

    $query  = "SELECT * ";
    $query .= "FROM courseinfo ";
    $query .= "WHERE author = '{$username}'";
    $courses_taught_by_user = mysqli_query($connection, $query);
    confirm_query($courses_taught_by_user);

    $query1  = "SELECT * ";
    $query1.= "FROM profile ";
    $query1 .= "WHERE username = '{$username}'";
    $courses_taken_by_user = mysqli_query($connection, $query1);
    confirm_query($courses_taken_by_user);
    $courses_taken = mysqli_fetch_assoc($courses_taken_by_user);

    $all_courses = $courses_taken['courses_taken']; ///all courses is string of all courses taken by perticular user seperated by ,


    $query2  = "SELECT * ";
    $query2 .= "FROM projectinfo ";
    $query2 .= "WHERE owner = '{$username}'";
    $projects_taught_by_user = mysqli_query($connection, $query2);
    confirm_query($projects_taught_by_user);

    $query3  = "SELECT * ";
    $query3.= "FROM profile ";
    $query3 .= "WHERE username = '{$username}'";
    $projects_taken_by_user = mysqli_query($connection, $query3);
    confirm_query($projects_taken_by_user);
    $projects_taken = mysqli_fetch_assoc($projects_taken_by_user);

    $all_projects = $projects_taken['projects_taken']; ///all courses is string of all courses taken by perticular user seperated by ,




 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <title>Edubee - Dashboard</title>
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
 #option1:hover
 {
	 background-color:#d7eef4;
 }
 #option2:hover
 {
	 color:#000;
 }
 </style>
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
          <button type="button" class="btn btn-success btn-sm" onclick="window.location.href='createCourse.php';">Create Your Own Course</button><br><br>
          <button type="button" class="btn btn-success btn-sm" onclick="window.location.href='createProject.php';">Create Your Own  Project</button>
        </div>
        <!-- END SIDEBAR BUTTONS -->
        <!-- SIDEBAR MENU -->
        <div  style="margin-top: 30px;">
          <ul class="nav">
            <li id="option1" style="background-color:#3FADC9;width:320px;margin-left:-30px;" >
              <a href="dashboard.php" ><span style="color:#fff;">
              <i class="glyphicon glyphicon-home"></i>
              Overview </span></a>
            </li>
            <li style="width:320px;margin-left:-30px;">
              <a href="dashboard-accountsetting.php" style="color:#999">
              <i class="glyphicon glyphicon-user"></i>
              Account Settings </a>
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
                                                            <!--=========== BEGIN OUR COURSES SECTION ================-->
    
    <section id="ourCourses">
      <div class="container">
       <!-- Our courses titile -->
        <div class="row">
          <div class="col-lg-12 col-md-12"> 
            <div class="title_area">
            <!-- <br>
            <br>
            <br>
            <br> -->
              <h2 class="title_two" style="margin-left:-100px"> <div class="title_area">
              <h2 class="title_two">Course Taught</h2>
              <span></span> 
            </div></h2>
             <!--  <span></span>  -->
            </div>
          </div>
        </div>
        <!-- End Our courses titile -->
       
        <!-- Start Our courses content -->
        <div class="row">
          <div class="col-lg-8 col-md-8 col-sm-8"  style="margin-left:140px;">
            <div class="ourCourse_content">
              <ul class="course_nav">
                <?php 
                if(mysqli_num_rows($courses_taught_by_user) > 0){
                while ($courses_taught = mysqli_fetch_assoc($courses_taught_by_user)){ 

                 ?>
                <li>
                  <div class="single_course">
                    <div class="singCourse_imgarea">
                      <img src='<?php echo $courses_taught['imgFile']; ?>' />
                      <div class="mask">
			<?php $link = "course.php?id=".$courses_taught['courseId'];?>                         
                        <a href='<?php echo $link ?>' class="course_more">View Course</a>
                      </div>
                    </div>
                    <div class="singCourse_content">
                    <h3 class="singCourse_title"><a href="#"><?php echo $courses_taught['name']; ?></a></h3>
                    <p>Duration :<?php echo $courses_taught['duration']; ?></p>
                    </div>
                    <div class="singCourse_author">
                     <!--  <img src="img/author.jpg" alt="img"> -->
                       <p><strong><?php echo $userdata['full_name']; ?></strong></p>
                    </div>
                  </div>
                </li>                  

                <?php }}else{
                    echo "<strong>No Course is created by you</strong>";
                  } ?>
                  
              </ul>
            </div>
          </div>
        </div>
        <!-- End Our courses content -->
      </div>
    </section>


    <section id="ourCourses">
      <div class="container">
       <!-- Our courses titile -->
        <div class="row">
          <div class="col-lg-12 col-md-12"> 
            <div class="title_area">
            <!-- <br>
            <br>
            <br>
            <br> -->
              <h2 class="title_two" style="margin-left:-100px"> <div class="title_area">
              <h2 class="title_two">Projects Created By You</h2>
              <span></span> 
            </div></h2>
             <!--  <span></span>  -->
            </div>
          </div>
        </div>
        <!-- End Our courses titile -->
       
        <!-- Start Our courses content -->
        <div class="row">
          <div class="col-lg-8 col-md-8 col-sm-8"  style="margin-left:140px;">
            <div class="ourCourse_content">
              <ul class="course_nav">
                <?php 
                if(mysqli_num_rows($projects_taught_by_user) > 0){
                while ($projects_taught = mysqli_fetch_assoc($projects_taught_by_user)){ 
                  //$about_project = getproject_data_by_projectid($projectId); // about course contain all info of 
                 ?>
                <li>
                  <div class="single_course">
                    <div class="singCourse_imgarea">
                      <img src= '<?php echo $projects_taught['imgFile']; ?>' />
                      <div class="mask">                         
                        <a href='<?php echo "project.php?id=".$projects_taught['projectId']; ?>' class="course_more">View Project</a>
                      </div>
                    </div>
                    <div class="singCourse_content">
                    <h3 class="singCourse_title"><a href="#"><?php echo $projects_taught['name']; ?></a></h3>
                    <p>Description :<?php $description = $projects_taught['description'];
                        if(strlen($description)>50)
                        echo substr($description,0,50).".....";
                      else
                        echo $description; ?></p>
                    </div>
                    <div class="singCourse_author">
                     <!--  <img src="img/author.jpg" alt="img"> -->
                       <p><strong><?php echo $userdata['full_name']; ?></strong></p>
                    </div>
                  </div>
                </li>                  

                <?php }}else{
                    echo "<strong>No Project is created by you</strong>";
                  } ?>
                  
              </ul>
            </div>
          </div>
        </div>
        <!-- End Our courses content -->
      </div>
    </section>
    <!--=========== END OUR COURSES SECTION ================--> 
            </div>
    </div>
  </div>
</div>





    <!--=========== BEGIN FOOTER SECTION ================-->
	<?php  require_once("./includes/layouts/footer.php"); ?>
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
