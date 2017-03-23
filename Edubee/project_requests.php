<!DOCTYPE html>
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
?>

<?php
 
  $projectId=$_SESSION['projectId'];
 ?>
<?php
				
$sql = "SELECT * FROM projectinfo WHERE projectId='".$projectId."' LIMIT 1";
$result = $connection->query($sql);
$row = $result->fetch_assoc();
if($row==null)
	die("no result");

$about_project = getproject_data_by_projectid($projectId);
?>	
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edubee - <?php echo $row["name"];?></title>
<link rel="icon" href="img/icon.jpg" type="image/x-icon">
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
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
	<!-- preloader -->
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style type="text/css">
html {
        overflow: scroll;
}
</style>
<!-- Javascript Files
    ================================================== -->

    <!-- initialize jQuery Library -->
    <script src="js/jquery.min.js"></script>
    <!-- Preloader js file -->
    <!--<script src="js/queryloader2.min.js" type="text/javascript"></script>-->
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

	
</head>

<body style="font-family:candara;">
        
    <!--=========== BEGIN HEADER SECTION ================-->
    <?php $path = "project.php"; ?>
    <?php 
    $status = $_SESSION['status'];
    site_header($path,$status); ?>
    <!--=========== END HEADER SECTION ================--> 
<br><br>
<br><br>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper" style="font-family:candara;">
            <ul class="sidebar-nav">
                <li class="sidebar-brand" style="">
                    <a href='<?php echo "project.php?id={$_SESSION['projectId']}" ?>' style="color:#3FADC9;margin-top:37px;" >
                        <strong><?php echo $row["name"];?></strong>
                    </a>
                </li>
            </br></br></br>
                <li style="margin-top:-37px;">
                    <a href='project.php?id=<?php echo $_SESSION['projectId'];?>' >Project Info</a>
                </li>
                <li>
                    <a href="project_timeline.php">Project Timeline</a>
                </li>
                <li>
                    <a href="project_discussion.php">Discussion</a>
                </li>
				        <?php
						$mentors=explode(",",$about_project["mentors"]);
						$contributors=explode(",",$about_project["contributors"]);
				$reqmentors=explode(",",$about_project["reqmentors"]);
				$reqcontris=explode(",",$about_project["reqcontributors"]);
						if($about_project['owner'] == $_SESSION['user']) { ?>
                <li>
                    <a href="project_edit.php">Edit Content</a>
                </li>
				<li style="background-color:#3FADC9;">
                    <a href="project_request.php"><span style="color:#fff;">Pending Requests</span></a>
                </li>
						<?php }?>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        
                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Navigation</a> 
						<br><br>
						<div class="title_area">
              <h2 class="title_two">Mentorship Requests</h2>
              <span></span></div>
			  <form action="project_clearrequest.php" method="POST">
					Select from the list of requests (Hold dowm Ctrl for multiple selections):<br><br>
                     <?php
                           $mentors=explode(",",$row["reqmentors"]);
						   if($row["reqmentors"]==null)
							   $output="No further mentor requests received for the project!";
						   else{
						   $output="<select multiple name='section1[ ]'>";
                           //$query = "SELECT videoTitle FROM course WHERE courseId='{$courseName}' AND videoLink IS NOT NULL ORDER BY time_modified ";
                           	
							for($i=0;$i<sizeof($mentors);$i++)
								{
									if($mentors[$i]!=null)
									$output.="<option>".$mentors[$i]."</option>";
								}
                           $output.="</select><br><br><input type='submit' name='submit' value='Add as Mentor(s)'class='btn btn-default'/>";
                               
                           
                           }
                           
                           
				  
				  
				  echo $output;
				  ?>
				  </form><br><br>
				  <div class="title_area">
              <h2 class="title_two">Contribution Requests</h2>
              <span></span></div>
			  <form action="project_clearrequest.php" method="POST">
					Select from the list of requests (Hold dowm Ctrl for multiple selections):<br><br>
                     <?php
                           $contributors=explode(",",$row["reqcontributors"]);
						   if($row["reqcontributors"]==null)
							   $output="No further mcontribution requests received for the project!";
						   else{
						   $output="<select multiple name='section2[ ]'>";
                           //$query = "SELECT videoTitle FROM course WHERE courseId='{$courseName}' AND videoLink IS NOT NULL ORDER BY time_modified ";
                           	
							for($i=0;$i<sizeof($contributors);$i++)
								{
									if($contributors[$i]!=null)
									$output.="<option>".$contributors[$i]."</option>";
								}
                           $output.="</select><br><br><input type='submit' name='submit' value='Add as Contributor(s)'class='btn btn-default'/>";
                               
                           
                           }
                           
                           
				  
				  
				  echo $output;
				  ?>
				  </form>

        </div>
        <!-- /#page-content-wrapper -->
         
    </div>
	</div></div>
	
	
	
	
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

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
