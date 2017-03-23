<?php require_once("./includes/db_connection.php"); ?>
<?php require_once("./includes/function.php"); ?>
<?php require_once("./includes/layouts/header.php"); ?>
<?php session_start();
  if(!isset($_SESSION['status'])){
    $_SESSION['status'] = 0;
  }

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <title>Edubee </title>
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
	window.smoothScroll = function(target) {
    var scrollContainer = target;
    do { //find scroll container
        scrollContainer = scrollContainer.parentNode;
        if (!scrollContainer) return;
        scrollContainer.scrollTop += 1;
    } while (scrollContainer.scrollTop == 0);

    var targetY = 0;
    do { //find the top of target relatively to the container
        if (target == scrollContainer) break;
        targetY += target.offsetTop;
    } while (target = target.offsetParent);

    scroll = function(c, a, b, i) {
        i++; if (i > 30) return;
        c.scrollTop = a + (b - a) / 30 * i;
        setTimeout(function(){ scroll(c, a, b, i); }, 20);
    }
    // start scrolling
    scroll(scrollContainer, scrollContainer.scrollTop, targetY, 0);
}
	</script>
	<style type="text/css">
body {
        overflow: auto;
}
</style>

  </head>
  <body>    

    <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"></a>
    <!-- END SCROLL TOP BUTTON -->

    <!--=========== BEGIN HEADER SECTION ================-->
	<div style="font-family:candara;">
    <?php $path = "index.php"; ?>
    <?php 
    $status = $_SESSION['status'];
    site_header($path,$status); ?>
	</div>
    <!--=========== END HEADER SECTION ================--> 

    <!--=========== BEGIN SLIDER SECTION ================-->
    <section id="slider">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="slider_area">
            <!-- Start super slider -->
            <div id="slides">
              <ul class="slides-container">                          
                <li>
                  <img src="img/iitp/iitp-2.jpg" alt="img">
                   <div class="slider_caption">
                    <h2>Your Online  Education Partner</h2>
                    <p>Bringing education to users in much more interactive way as well as engaging prospective users in learning as well as practical sense by including collaborative projects</p>
                    <a class="slider_btn" onclick="window.smoothScroll(whyUs);">Know More</a>
                  </div>
                  </li>
                <!-- Start single slider-->
                <li>
                  <img src="img/iitp/iitp-3.jpg" alt="img">
                   <div class="slider_caption slider_right_caption">
                    <h2>Better Education Environment</h2>
                    <p>We provide you the coding background at the same time .
                          <br> 
                            It also helps if you surround yourself in a group of passionate programmers</p>
                    <a class="slider_btn" style="cursor:pointer;"onclick="window.smoothScroll(whyUs);">Know More</a>
                  </div>
                </li>
                <!-- Start single slider-->
                <li>
                  <img src="img/iitp/iitp-1.jpg" alt="img">
                   <div class="slider_caption">
                    <h2>Find out you in better way</h2>
                    <p>There are numerous e-learning platforms in world wide web like Coursera, edX etc.We borrows some good & unique practices  with features of our own</p>
                    <a class="slider_btn"  onclick="window.smoothScroll(whyUs);">Know More</a>
                  </div>
                </li>
              </ul>
              <nav class="slides-navigation">
                <a href="#" class="next"></a>
                <a href="#" class="prev"></a>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--=========== END SLIDER SECTION ================-->
	<?php

?>
<!--=========== BEGIN OUR COURSES SECTION ================-->
    <section id="ourCourses">
      <div class="container">
       <!-- Our courses titile -->
        <div class="row">
          <div class="col-lg-12 col-md-12"> 
            <div class="title_area">
              <h2 class="title_two">Recent Courses</h2>
              <span></span> 
            </div>
          </div>
        </div>
        <!-- End Our courses titile -->
        <!-- Start Our courses content -->
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="ourCourse_content">
              <ul class="course_nav">
			  
				<?php
				
$i=0;
$sql = "SELECT * FROM courseinfo ORDER BY Id DESC";
$result = $connection->query($sql);
						
					while($row = $result->fetch_assoc()) {
						
					if($i>=7)
						break;
                echo "<li>".
                  "<div class='single_course'>".
                    "<div class='singCourse_imgarea'>".
                      "<img src='".$row["imgFile"]."' />".
                      "<div class='mask'>".                         
                        "<a href='course.php?id=".$row["courseId"]."' class='course_more'>View Course</a>".
                      "</div>".
                    "</div>".
                    "<div class='singCourse_content'>".
                    "<h3 class='singCourse_title'>".$row["name"]."</h3>".
                    "<p class='singCourse_price'><span>".'$Free'."</span> </p>".
                    "<p>Duration : ".$row["duration"]."</p>".
                    "</div>".
                    "<div class='singCourse_author'>".
                      "<p>Tutor : <strong>".$row["author"]."</strong></p>".
                    "</div>".
                  "</div>".
                "</li>";
				$i++;
				
							
					}
					
				?>
                               
              </ul>
            </div>
          </div>
        </div>
        <!-- End Our courses content -->
      </div>
    </section>
    <!--=========== END OUR COURSES SECTION ================--> 
    <!--=========== BEGIN OUR PROJECTS SECTION ================-->
    <section id="ourCourses">
      <div class="container">
       <!-- Our courses titile -->
        <div class="row">
          <div class="col-lg-12 col-md-12"> 
            <div class="title_area">
              <h2 class="title_two">Recent Projects</h2>
              <span></span> 
            </div>
          </div>
        </div>
        <!-- End Our courses titile -->
        <!-- Start Our courses content -->
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="ourCourse_content">
              <ul class="course_nav">
                <?php
				
$i=0;
$sql = "SELECT * FROM projectinfo ORDER BY Id DESC";
$result = $connection->query($sql);
						
					while($row = $result->fetch_assoc()) {
						
					if($i>=7)
						break;
					$description = $row["description"];
					if(strlen($description)>50)
                        $description = substr($description,0,50).".....";
                     $p= find_userdata_by_username($row["owner"]);
                echo "<li>".
                  "<div class='single_course'>".
                    "<div class='singCourse_imgarea'>".
                      "<img src='".$row["imgFile"]."' />".
                      "<div class='mask'>".                         
                        "<a href='project.php?id=".$row["projectId"]."' class='course_more'>View Course</a>".
                      "</div>".
                    "</div>".
                    "<div class='singCourse_content'>".
                    "<h3 class='singCourse_title'>".$row["name"]."</h3>".
                    "<p>Description : ".$description."</p>".
                    "</div>".
                    "<div class='singCourse_author'>".
                      "<p>Owner : <strong>".$p["full_name"]."</strong></p>".
                    "</div>".
                  "</div>".
                "</li>";
				$i++;
				
							
					}
					?>
				                
              </ul>
            </div>
          </div>
        </div>
        <!-- End Our courses content -->
      </div>
    </section>
    <!--=========== END OUR PROJECTS SECTION ================-->  
	<div id="scro"></div>
      <!--=========== BEGIN WHY US SECTION ================-->
    <section id="whyUs">
      <!-- Start why us top -->
      <div class="row">        
        <div class="col-lg-12 col-sm-12">
          <div class="whyus_top">
            <div class="container">
              <!-- Why us top titile -->
              <div class="row">
                <div class="col-lg-12 col-md-12"> 
                  <div class="title_area">
                    <h2 class="title_two" id="WhyUs1">Why Us</h2>
                    <span></span> 
                  </div>
                </div>
              </div>
              <!-- End Why us top titile -->
              <!-- Start Why us top content  -->
              <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3">
                  <div class="single_whyus_top wow fadeInUp">
                    <div class="whyus_icon">
                      <span class="fa fa-desktop"></span>
                    </div>
                    <h3>Best available courses</h3>
                    <p>We  provide  you with best  and easily available courses to be learned. 
                      <br>
                      A student can view course material of the courses that the particular student is a part of.
                      
                    </p>
                  </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                  <div class="single_whyus_top wow fadeInUp">
                    <div class="whyus_icon">
                      <span class="fa fa-keyboard-o"></span>
                    </div>
                    <h3>Design course</h3>
                    <p>You can design and customize course  structure constrained in a basic layout. 
                            <br>
                            Enroll, Deroll as mentor of projects.  
                            <br>
                            Add assignments, quizzes etc. 
                            <br>
                            Recommend a student in his/her attributed skills.</p>
                  </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                  <div class="single_whyus_top wow fadeInUp">
                    <div class="whyus_icon">
                      <span class="fa fa-users"></span>
                    </div>
                    <h3>Project Collaboration</h3>
                    <p>Initiate a project and tag clubs, mentors related to it. Mentors and clubs have  privilege to deny or accept it.
                         <br>
                         Start conversation in the forum and tag students, tutors,groups or include  external links.
                    </p>
                  </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                  <div class="single_whyus_top wow fadeInUp">
                    <div class="whyus_icon">
                      <span class="fa fa-support"></span>
                    </div>
                    <h3> Supportive platform</h3>
                    <p>
                          We also provide the online code submission and evaluation , so as  to help you improve your coding skills 
                      <br>
			   This all helps  you find a  better world of  competative coding environment.
                    </p>
                  </div>
                </div>
              </div>
              <!-- End Why us top content  -->
            </div>
          </div>
        </div>        
      </div>
      <!-- End why us top -->

      <!-- Start why us bottom -->
      <div class="row">        
        <div class="col-lg-12 col-sm-12">
          <div class="whyus_bottom">            
            <div class="slider_overlay"></div>
            <div class="container">               
              <div class="skills">                
                <!-- START SINGLE SKILL-->
                <div class="col-lg-3 col-md-3 col-sm-3">
                 <div class="single_skill wow fadeInUp">
                   <div id="myStat" data-dimension="150" data-text="35%" data-info="" data-width="10" data-fontsize="25" data-percent="35" data-fgcolor="blue" data-bgcolor="#fff"  data-icon="fa-task"></div>
                    <h4>Repeate Learners</h4>                      
                  </div>
                </div>
                <!-- START SINGLE SKILL-->
                <div class="col-lg-3 col-md-3 col-sm-3">
                  <div class="single_skill wow fadeInUp">
                    <div id="myStathalf2" data-dimension="150" data-text="90%" data-info="" data-width="10" data-fontsize="25" data-percent="90" data-fgcolor="blue" data-bgcolor="#fff"  data-icon="fa-task"></div>
                    <h4>Success Rate</h4>
                  </div>
                </div>
                <!-- START SINGLE SKILL-->
                <div class="col-lg-3 col-md-3 col-sm-3">                 
                  <div class="single_skill wow fadeInUp">
                    <div id="myStat2" data-dimension="150" data-text="100%" data-info="" data-width="10" data-fontsize="25" data-percent="100" data-fgcolor="blue" data-bgcolor="#fff"  data-icon="fa-task"></div>
                    <h4>Student Engagement</h4>
                  </div>
                </div>
                <!-- START SINGLE SKILL-->
                <div class="col-lg-3 col-md-3 col-sm-3">                 
                  <div class="single_skill wow fadeInUp">
                    <div id="myStat3" data-dimension="150" data-text="65%" data-info="" data-width="10" data-fontsize="25" data-percent="65" data-fgcolor="blue" data-bgcolor="#fff"  data-icon="fa-task"></div>
                    <h4>Certified Courses</h4>
                  </div>
                </div>
              </div>
            </div>            
          </div>
        </div>        
      </div>
      <!-- End why us bottom -->
    </section>
    <!--=========== END WHY US SECTION ================-->
    <!--=========== BEGIN OUR TEAM SECTION ================-->
    <section id="ourTutors">
      <div class="container">
       <!-- Our courses titile -->
        <div class="row">
          <div class="col-lg-12 col-md-12"> 
            <div class="title_area">
              <h2 class="title_two">Devoloper Team</h2>
              <span></span> 
            </div>
          </div>
        </div>
        <!-- End Our courses titile -->

        <!-- Start Our courses content -->
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="ourTutors_content">
              <!-- Start Tutors nav -->
              <ul class="tutors_nav">
                <li>
                  <div class="single_tutors">
                    <div class="tutors_thumb">
                      <img src="img/alan.jpg" />                      
                    </div>
                    <div class="singTutors_content">
                      <h3 class="tutors_name">Alan Aipe</h3>
                      <span>1401CS50</span>
                      <p><strong><u>alan.me14@iitp.ac.in</u></strong></p>
                      <p>Computer Science and engineering , IIT Patna </p>
                    </div>
                    <div class="singTutors_social">
                      <ul class="tutors_socnav">
                        <li><a class="fa fa-facebook" href="https://www.facebook.com/imAlanAipe" target="_blank" ></a></li>
                        <li><a class="fa fa-twitter" href="#"></a></li>
                        <li><a class="fa fa-instagram" href="https://www.instagram.com/alanaipe/" target="_blank"></a></li>
                        <li><a class="fa fa-google-plus" href="#"></a></li>
                      </ul>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="single_tutors">
                    <div class="tutors_thumb">
                      <img src="img/jitu.jpg" />                      
                    </div>
                    <div class="singTutors_content">
                      <h3 class="tutors_name">Jitendra Kumar</h3>
                       <span>1401CS19</span>
                       <p><strong><u>jitendra.cs14@iitp.ac.in</u></strong></p>
                      <p>Computer Science and engineering , IIT Patna </p>
                    </div>
                    <div class="singTutors_social">
                      <ul class="tutors_socnav">
                        <li><a class="fa fa-facebook" href="https://www.facebook.com/JITUIITP" target="_blank"></a></li>
                        <li><a class="fa fa-twitter" href="https://twitter.com/jitendra_iitp"target="_blank"></a></li>
                        <li><a class="fa fa-instagram" href="https://www.instagram.com/jitu_iitp/"target="_blank"></a></li>
                        <li><a class="fa fa-google-plus" href="https://plus.google.com/u/0/103656921799963701629" target="_blank"></a></li>
                      </ul>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="single_tutors">
                    <div class="tutors_thumb">
                      <img src="img/dny.jpg" />                      
                    </div>
                    <div class="singTutors_content">
                      <h3 class="tutors_name">Dnyaneshwar Shendurwadkar</h3>
                      <span>1401CS43</span>
                      <p><strong><u>shendurwadkar.cs14@iitp.ac.in</u></strong></p>
                      <p>Computer Science and engineering, IIT Patna </p>
                    </div>
                    <div class="singTutors_social">
                      <ul class="tutors_socnav">
                        <li><a class="fa fa-facebook" href="https://www.facebook.com/dnyaneshwar.shendurwadkar?fref=ts"target="_blank"></a></li>
                        <li><a class="fa fa-twitter" href="https://twitter.com/dnysdk"target="_blank"></a></li>
                        <li><a class="fa fa-instagram" href="https://www.instagram.com/dnysdk/"target="_blank"></a></li>
                        <li><a class="fa fa-google-plus" href="https://plus.google.com/112574556847504488668"target="_blank"></a></li>
                      </ul>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="single_tutors">
                    <div class="tutors_thumb">
                      <img src="img/hitesh.jpg" />                      
                    </div>
                    <div class="singTutors_content">
                      <h3 class="tutors_name">Hitesh golchha</h3>
                       <span>1401CS56</span>
                       <p><strong><u>hitesh.me14@iitp.ac.in</u></strong></p>
                      <p>Computer Science and engineering , IIT Patna </p>
                    </div>
                    <div class="singTutors_social">
                      <ul class="tutors_socnav">
                        <li><a class="fa fa-facebook" href="https://www.facebook.com/hitesh.golchha.35?fref=ts" target="_blank"></a></li>
                        <li><a class="fa fa-twitter" href="#"target="_blank"></a></li>
                        <li><a class="fa fa-instagram" href="https://www.instagram.com/hitesh.golchha/"target="_blank"></a></li>
                        <li><a class="fa fa-google-plus" href="https://plus.google.com/110397329724131153769"target="_blank"></a></li>
                      </ul>
                    </div>
                  </div>
                </li>
                
                <li>
                  <div class="single_tutors">
                    <div class="tutors_thumb">
                      <img src="img/anupam.jpg" />                      
                    </div>
                    <div class="singTutors_content">
                      <h3 class="tutors_name">Anupam Das</h3>
                      <span>1401CS52</span>
                      <p><strong><u>anupam.ee14@iitp.ac.in</u></strong></p>
                      <p>Computer Science and engineering , IIT Patna </p>
                    </div>
                    <div class="singTutors_social">
                      <ul class="tutors_socnav">
                        <li><a class="fa fa-facebook" href="https://www.facebook.com/anupam.das.713101?fref=ts" target="_blank"></a></li>
                        <li><a class="fa fa-twitter" href=""></a></li>
                        <li><a class="fa fa-instagram" href="#"></a></li>
                        <li><a class="fa fa-google-plus" href="#"></a></li>
                      </ul>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="single_tutors">
                    <div class="tutors_thumb">
                      <img src="img/mritunjay.jpg" />                      
                    </div>
                    <div class="singTutors_content">
                      <h3 class="tutors_name">Mritunjay Kumar</h3>
                       <span>1401CS27</span>
                       <p><strong><u>mritunjay.cs14@iitp.ac.in</u></strong></p>
                      <p>Computer Science and engineering,IIT Patna</p>
                    </div>
                    <div class="singTutors_social">
                      <ul class="tutors_socnav">
                        <li><a class="fa fa-facebook" href="https://www.facebook.com/mritunjay.kumar.14224?fref=ts"target="_blank"></a></li>
                        <li><a class="fa fa-twitter" href="#"></a></li>
                        <li><a class="fa fa-instagram" href="#"></a></li>
                        <li><a class="fa fa-google-plus" href="#"></a></li>
                      </ul>
                    </div>
                  </div>
                </li>                                             
              </ul>
            </div>
          </div>
        </div>
        <!-- End Our courses content -->
      </div>
    </section>
    <!--=========== END OUR TEAM SECTION ================-->
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
