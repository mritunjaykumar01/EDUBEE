<!DOCTYPE html>
<?php require_once("./includes/function.php"); ?>
<?php require_once("./includes/db_connection.php"); ?>
<?php require_once("./includes/layouts/header.php"); ?>
<?php session_start();
  if(!isset($_SESSION['status'])){
    $_SESSION['status'] = 0;
  }
  if($_SESSION['status'] == 0){
    redirect_to("login.php");
  }
?>
<?php
   if (($_SERVER['REQUEST_METHOD'] == 'POST')):
           if (isset($_POST['submit']) && $_POST['submit']=="Create" 
		   && isset($_POST['projectname'])&&isset($_POST['projectId'])&&isset($_POST['description'])
		   ) {
                $project = mysqli_real_escape_string($connection,$_POST['projectname']);
				$prid = mysqli_real_escape_string($connection,$_POST['projectId']);		
				$description = mysqli_real_escape_string($connection,$_POST['description']);
				$name= mysqli_real_escape_string($connection,$_FILES['file']['name']);  
    $temp_name= mysqli_real_escape_string($connection,$_FILES['file']['tmp_name']);  
    if(isset($name)){
        if(!empty($name)){      
            $location = "img/"; //for windows   $location = "img\\";
			if (!file_exists($location)) {
				mkdir($location, 0777, true);
			}			
			$location.="/";
			$finloc= $location.$name;
            move_uploaded_file($temp_name, $finloc);
        }       
    }  else {
        echo 'You should select a file to upload !!';
	}
       $query = "INSERT INTO projectinfo (name,projectId,owner,description,imgFile)
                               VALUES ('{$project}','{$prid}','{$_SESSION["user"]}','{$description}','{$finloc}')";
                               if (mysqli_query($connection, $query)) {
                                   //echo '<strong>Successfully Course Stored to Database....</strong>';
                                   $_SESSION['projectId'] = $prid;
                                   redirect_to("project.php?id={$prid}");
                                   $project = NULL;
				$author = NULL;
				$subtitle = NULL;
				$description = NULL;
				$duration = NULL;
				$name= NULL;  
    $temp_name= NULL;  
                               } else
                                   echo '<strong>Try after some Time</strong>';
               }
           
   	if (isset($_POST['sectionName'])&& $_POST['clear']=="Clear") {
		header("Refresh:0");		
	}
       endif;
   ?>
<html lang="en">
   <head>
      <!-- Basic Page Needs
         ================================================== -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Edubee - Create Course</title>
	  <link rel="icon" href="img/icon.jpg" type="image/x-icon">
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
	  <script>
function myFunction() {
    var txt;
    var r = confirm("created sucessfully");
    if (r == true) {
        window.open("editor.html");
    } else {
        txt = "You pressed Cancel!";
    }
    document.getElementById("demo").innerHTML = txt;
}
function primary()
{
    document.getElementById("menu-toggle").click();
    document.getElementById("menu-toggle").style.display="none";
}
</script>

   </head>
   <body style="font-family:candara;background-color:rgba(120, 173, 201,0.1);"  onload="primary();">

   <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"></a>
    <!-- END SCROLL TOP BUTTON -->
	<div style="font-family:candara;">
    <!--=========== BEGIN HEADER SECTION ================-->
    <?php $path = ""; ?>
     <?php site_header($path,$_SESSION['status']); ?>
    <!--=========== END HEADER SECTION ================--> 
	</div>
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
            </ul>
         </div>
         <!-- /#sidebar-wrapper --><!-- Page Content -->
         <br/><br/><br/><br/>
         <div id="page-content-wrapper">
            <div class="container-fluid">
               <div class="col-xs-9 col-sm-9">
                  <!-- Main component for a primary marketing message or call to action -->
                  <div class="jumbotron" style="margin-left:350px;background-color:#fff;border:solid #0077b3;border-width:1px;"><center>
                     <div class="title_area">
              <h2 class="title_two">Create Project</h2>
              <span></span> 
            </div><br/>
                     <div class="row">
         
           <div class="contact_form wow fadeInLeft">
              <form class="submitphoto_form" "<?=$_SERVER['PHP_SELF'];?>"  method="POST" enctype="multipart/form-data">
                <input type="text" class="wp-form-control wpcf7-text" name="projectname" placeholder="Project Name" style="border-radius:5px;border:solid #3FADC9;	border-width:1px;padding:5px;"required>
                <input type="text" class="wp-form-control wpcf7-text" name="projectId" placeholder="Desired Project ID" style="border-radius:5px;border:solid #3FADC9;	border-width:1px;padding:5px;"required>
				
                
                <textarea type="text" class="wp-form-control wpcf7-textarea" name="description" cols="30" rows="5" placeholder="Description" style="border-radius:5px;border:solid #3FADC9;	border-width:1px;padding:5px;"required ></textarea>
                </center>
                Choose Image File : <input type="file" name="file" id="file" style="position:absolute;margin-left:150px;margin-top:-21px;"/><br><br>
                <!--<a href="editor.html" class="wpcf7-submit" role="button">Create</a>-->
                <input type="submit" value="Create" name="submit" class="btn btn-primary">&nbsp;&nbsp;&nbsp;
				<input type="button" value="Clear" name="clear" class="btn btn-warning" onclick="window.location='createProject.php'">&nbsp;&nbsp;&nbsp;
				<input type="button" value="Cancel" name="cancel" class="btn btn-danger" onclick="window.location='dashboard.php'">
              </form>
           </div>
         
                        
                  </div>
               </div>
               <!-- /container -->
            </div>
         </div>
         <!-- /#page-content-wrapper -->
         <!-- Page Content -->
         
         <!-- /#page-content-wrapper -->
         <!--=========== BEGIN FOOTER SECTION ================-->
         
      </div>
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
      <!-- /#wrapper -->
      <!-- jQuery -->
      <script src="js/jquery.js"></script>
      <!-- initialize jQuery Library -->
      <script src="bootstrap-3.3.6/dist/js/jquery.min.js"></script>
      <!-- Preloader js file -->
      <!--<script src="js/queryloader2.min.js" type="text/javascript"></script>-->
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
