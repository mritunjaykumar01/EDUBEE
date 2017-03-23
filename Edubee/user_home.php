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
      <title>Edubee : your online education partner</title>
      <!-- Mobile Specific Metas
         ================================================== -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- CSS
         ================================================== -->       
      <!-- Bootstrap css file-->
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom CSS -->
      <link href="css/simple-sidebar.css" rel="stylesheet">
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
      <!-- Navigation -->
      <!-- SCROLL TOP BUTTON -->
      <a class="scrollToTop" href="#"></a>
      <!-- END SCROLL TOP BUTTON -->
      <!--=========== BEGIN HEADER SECTION ================-->
      
       <?php //$path = "course.php"; ?>
    <?php 
    $status = $_SESSION['status'];
    site_header($path,$status); ?>
      <!--=========== END HEADER SECTION ================--> 
      <div id="wrapper">
         <!-- Sidebar -->
         <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
               <li class="sidebar-brand">
                  <a href="courses.html">
                  <b>EDUBEE</b>
                  </a>
               </li>
               </br></br>
               </br>
               <a href="#menu-toggle" class="btn btn-default" style= "position: absolute; right: 0px; "id="menu-toggle"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> </a>
               </br></br></br>
               <li>
                  <a href="../jitendra/index.html">Home</a>
               </li>
               <li>
                  <a href="../alan/course.html">Course</a>
               </li>
               <li>
                  <a href="#">Info</a>
               </li>
               <li>
                  <a href="#">Discussion</a>
               </li>
               <br/>
               <div class="dropdown">
                  <li class="dropdown-toggle" type="button" style="color: #fff" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                     <a href="groups.html">Section1</a>
                  </li>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                     <li><a href="#">Sesson 1</a></li>
                     <li><a href="#">Session 2</a></li>
                     <li><a href="#">Session 3</a></li>
                     <li role="separator" class="divider"></li>
                     <li><a href="#">Further Info</a></li>
                  </ul>
               </div>
               <div class="dropdown">
                  <li class="dropdown-toggle" type="button" style="color: #fff" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                     <a href="groups.html">Section2</a>
                  </li>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                     <li><a href="#">Sesson 5</a></li>
                     <li><a href="#">Session 6</a></li>
                     <li><a href="#">Session 7</a></li>
                     <li role="separator" class="divider"></li>
                     <li><a href="#">Further Info</a></li>
                  </ul>
               </div>
               <div class="dropdown">
                  <li class="dropdown-toggle" type="button" style="color: #fff" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                     <a href="groups.html">Section3</a>
                  </li>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                     <li><a href="#">Sesson 8</a></li>
                     <li><a href="#">Session 9</a></li>
                     <li><a href="#">Session 10</a></li>
                     <li role="separator" class="divider"></li>
                     <li><a href="#">Further Info</a></li>
                  </ul>
               </div>
            </ul>
         </div>
         <!-- /#sidebar-wrapper -->
         <!-- Page Content -->
         <br/><br/><br/><br/><br/><br/><br/>
         <div id="page-content-wrapper">
            <div class="container-fluid">
               <div class="col-xs-6 col-sm-7">
                  <!-- Main component for a primary marketing message or call to action -->
                  <div class="jumbotron">
                     <h3>Current course Name</h3>
                     <br/>
                     <p/><b/>
                     <p/>
                     <p/>
                     <p/>
                     <p/>
                     <p/>
                     <p/><b/><b/><b/>
                     <p/>
                  </div>
               </div>
               <!-- /container -->
            </div>
         </div>
         <!-- /#page-content-wrapper -->
         <!-- Page Content -->
         <div id="page-content-wrapper">
            <div class="container-fluid">
               <div class="col-xs-6 col-sm-7">
                  <!-- Main component for a primary marketing message or call to action -->
                  <div class="jumbotron">
                     <h3>Current course Name</h3>
                     <br/>
                     <p/><b/>
                     <p/>
                     <p/>
                     <p/>
                     <p/>
                     <p/>
                     <p/><b/><b/><b/>
                     <p/>
                  </div>
               </div>
               <!-- /container -->
            </div>
         </div>
         <!-- /#page-content-wrapper -->
         <!-- Page Content -->
         <div id="page-content-wrapper">
            <div class="container-fluid">
               <div class="col-xs-6 col-sm-7">
                  <!-- Main component for a primary marketing message or call to action -->
                  <div class="jumbotron">
                     <h3>course Name</h3>
                  </div>
               </div>
               <!-- /container -->
            </div>
         </div>
         <!-- /#page-content-wrapper -->
         <!-- /#page-content-wrapper -->
         <!-- Page Content -->
         <div id="page-content-wrapper">
            <div class="container-fluid">
               <div class="col-xs-6 col-sm-7">
                  <!-- Main component for a primary marketing message or call to action -->
                  <div class="jumbotron">
                     <h3>course Name</h3>
                  </div>
               </div>
               <!-- /container -->
            </div>
         </div>
         <!-- /#page-content-wrapper -->
         <!-- /#page-content-wrapper -->
         <!-- Page Content -->
         <div id="page-content-wrapper">
            <div class="container-fluid">
               <div class="col-xs-6 col-sm-7">
                  <!-- Main component for a primary marketing message or call to action -->
                  <div class="jumbotron">
                     <h3>course Name</h3>
                  </div>
               </div>
               <!-- /container -->
            </div>
         </div>
         <!-- /#page-content-wrapper -->
         <!--=========== BEGIN FOOTER SECTION ================-->
         <footer id="footer">
            
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
      </div>
      <!-- /#wrapper -->
      <!-- jQuery -->
      <script src="js/jquery.js"></script>
      <!-- initialize jQuery Library -->
      <script src="bootstrap-3.3.6/dist/js/jquery.min.js"></script>
      <!-- Preloader js file -->
      <script src="js/queryloader2.min.js" type="text/javascript"></script>
      <!-- For smooth animatin  -->
      <script src="js/wow.min.js"></script>  
      <!-- Bootstrap js -->
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
      <!-- Bootstrap Core JavaScript -->
      <script src="js/bootstrap.min.js"></script>
      <!-- Menu Toggle Script -->
      <script>
         $("#menu-toggle").click(function(e) {
             e.preventDefault();
             $("#wrapper").toggleClass("toggled");
         });
      </script>
   </body>
</html>