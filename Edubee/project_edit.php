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
<?php $projectId="{$_SESSION['projectId']}";?>
<?php
				
$sql = "SELECT * FROM projectinfo WHERE projectId='".$projectId."' LIMIT 1";
$result = $connection->query($sql);
$row = $result->fetch_assoc();
if($row==null)
	die("no result");
$about_project = getproject_data_by_projectid($projectId);
if($about_project['owner'] != $_SESSION['user']){
    redirect_to("404.html");
}
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
input {
	border-radius:5px;
	border:solid #3FADC9;
	border-width:1px;
	padding:3px;
}
input:focus,textarea:focus {
	outline:none;
}
textarea {
	border-radius:5px;
	border:solid #3FADC9;
	border-width:1px;
}
select {
	border-radius:5px;
	border:solid #3FADC9;
	border-width:1px;
	min-width:150px;
	padding:5px;
}
</style>
<script language="JavaScript">
function urlcheck(){
	var url=document.URL;
	var status=url.substring(url.length-3);
	
	if(status=="210")
	{
		alert("No such username exist");
		showmentorsedit();
	}
	else if(status=="211")
	{
		alert("Mentor is already in the mentors list");
		showmentorsedit();
	}
	else if(status=="310")
	{
		alert("No such username exist");
		showcontrbedit();
	}
	else if(status=="211")
	{
		alert("Contributor is already in the contributors list");
		showcontrbedit();
	}
	else if(status=="rdr")
	{
		alert("Required fields are not set correctly");
	}
}

</script>
</head>

<body style="font-family:candara;" onload="urlcheck();">
        
    <?php $path = ""; ?>
    <?php 
    $status = $_SESSION['status'];
    site_header($path,$status); ?>
    <br>
    <br>

<br><br>
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href='<?php echo "project.php?id={$_SESSION['projectId']}" ?>' style="color:#3FADC9;margin-top:37px;font-size:24px;">
                        <strong><?php echo $row["name"];?></strong>
                    </a>
                </li>
            </br></br></br>
                <li style="margin-top:-37px;">
                    <a href='<?php echo "project.php?id={$_SESSION['projectId']}" ?>'>Project Info</a>
                </li>
                <li>
                    <a href="project_timeline.php">Project Timeline</a>
                </li>
                <li>
                    <a href='<?php echo "project_discussion.php?id=".$projectId; ?>'>Discussion</a>
                </li>
				<li style="background-color:#3FADC9;>
                    <a href="# ><span style="color:#fff;">Edit Content</span></a>
                </li>
                <li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper" style="background-color:#fffcff">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        
                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Navigation</a> <br><br>
						<div class="row" id="sec4"><center>
                  <input id="bt1"class="btn btn-default"type="button" value="Details"onclick="showinfoedit();" style="margin-left:15px;margin-right:15px;"/>
                  <input id="bt2"class="btn btn-default"type="button" value="Mentors"onclick="showmentorsedit();"style="margin-left:15px;margin-right:15px;"/>
                  <input id="bt3"class="btn btn-default"type="button" value="Contributors"onclick="showcontrbedit();"style="margin-left:15px;margin-right:15px;"/>
                  <input id="bt4"class="btn btn-default"type="button" value="Milestones"onclick="showmilesedit();"style="margin-left:15px;margin-right:15px;"/></center>
				  <br><br>
				  <div id="edit1">
				  <div class="title_area">
              <h2 class="title_two">Project Info</h2>
              <span></span> 
            </div>
                     <hr>
                     <h3>Change Project Name</h3>
                     <form action="projecteditfunctions.php" method="POST">
                        New name for the project :&nbsp;&nbsp;&nbsp;<input name="proName" type="text" required/>&nbsp;&nbsp;
                        <input type="submit" name="submit" value="Change"class="btn btn-default"/>
                     </form>
                     <hr>
					<h3>Change Project Description</h3>
                     <form action="projecteditfunctions.php" method="POST">
                        New Description for the project :<br><br><textarea name="desc"cols="140"><?php echo $row["description"];?>
						</textarea><br><br>
                        <input type="submit" name="submit" value="Change" class="btn btn-default"/>
                     </form>
				  
				  </div>
				  <div id="edit2">
				  <div class="title_area">
              <h2 class="title_two">Edit Mentors</h2>
              <span></span> 
            </div>
                     <hr>
                     <h3>Add Mentors</h3>
                     <form action="projecteditfunctions.php" method="POST">
                        Username of new mentor to be added :&nbsp;&nbsp;&nbsp;<input name="newmentor"type="text" required/>&nbsp;&nbsp;
                        <input type="submit" name="submit" value="Add+"class="btn btn-default"/>
                     </form>
                     <hr>
					<h3>Remove Mentors</h3>
					<form action="projecteditfunctions.php" method="POST">
					Select from the list of Mentors(Hold dowm Ctrl for multiple selections):<br><br>
                     <?php
                           $mentors=explode(",",$row["mentors"]);
						   if($row["mentors"]==null)
							   $output="No mentors added to project";
						   else{
						   $output="<select multiple name='section1[ ]'>";
                           //$query = "SELECT videoTitle FROM course WHERE courseId='{$courseName}' AND videoLink IS NOT NULL ORDER BY time_modified ";
                           	
							for($i=0;$i<sizeof($mentors);$i++)
								{
									if($mentors[$i]!=null)
									$output.="<option>".$mentors[$i]."</option>";
								}
                           $output.="</select><br><br><input type='submit' name='submit' value='Remove Mentors'class='btn btn-default'/>";
                               
                           
                           }
                           
                           
				  
				  
				  echo $output;
				  ?>
				  </form>
				  </div>
				  <div id="edit3">
				  <div class="title_area">
              <h2 class="title_two">Edit Contributors</h2>
              <span></span> 
            </div>
                     <hr>
                     <h3>Add Contributors</h3>
                     <form action="projecteditfunctions.php" method="POST">
                        Username of new contributor to be added :&nbsp;&nbsp;&nbsp;<input name="newcontrib"type="text" required />&nbsp;&nbsp;
                        <input type="submit" name="submit" value="Add+"class="btn btn-default"/>
                     </form>
                     <hr>
					<h3>Remove Contributors</h3>
					<form action="projecteditfunctions.php" method="POST">
					Select from the list of Contributors(Hold dowm Ctrl for multiple selections):<br><br>
                     <?php
                           $contributors=explode(",",$row["contributors"]);
						   if($row["contributors"]==null)
							   $output="No Contributors to display";
						   else{
						   $output="<select multiple name='section2[ ]'>";
                           //$query = "SELECT videoTitle FROM course WHERE courseId='{$courseName}' AND videoLink IS NOT NULL ORDER BY time_modified ";
                           	
							for($i=0;$i<sizeof($contributors);$i++)
								{
									if($contributors[$i]!=null)
									$output.="<option>".$contributors[$i]."</option>";
								}
                           $output.="</select><br><br><input type='submit' name='submit' value='Remove Contributors'class='btn btn-default'/>";
						   }
                           
                           
                           echo $output;
                           ?>
				  
				  
				  
				  </form>
				  </div>
				  <div id="edit4">
				  <div class="title_area">
              <h2 class="title_two">Edit Milestones</h2>
              <span></span> 
            </div>
                     <hr>
                     <h3>Add Milestone</h3>
                     <form action="projecteditfunctions.php" method="POST">
                        Task related to new milestone to be added :&nbsp;&nbsp;&nbsp;<input name="newtask"type="text" required/><br><br>
						Start date (mm/dd/yyyy) related to new milestone to be added :&nbsp;&nbsp;&nbsp;<input name="start"type="text" required/><br><br>
						End date (mm/dd/yyyy) related to new milestone to be added :&nbsp;&nbsp;&nbsp;<input name="end"type="text" required/><br><br>
						
                        <input type="submit" name="submit" value="Add+"class="btn btn-default"/>
                     </form>
                     <hr>
					<h3>Remove Milestones</h3>
					<form action="projecteditfunctions.php" method="POST">
					Select from the list of Milestones(Hold dowm Ctrl for multiple selections):<br><br>
                     <?php
                           $milestones=explode(",",$row["milestones"]);
						   if($row["milestones"]==null)
							   $output="No milestones avaliable for display";
						   else{
						   $output="<select multiple name='section3[ ] required'>";
                           //$query = "SELECT videoTitle FROM course WHERE courseId='{$courseName}' AND videoLink IS NOT NULL ORDER BY time_modified ";
                           	
							for($i=0;$i<sizeof($milestones);$i++)
								{
									if($milestones[$i]!=null)
									$output.="<option>".$milestones[$i]."</option>";
								}
                           $output.="</select><br><br><input type='submit' name='submit' value='Remove Milestones'class='btn btn-default'/>";
						   }
                           
                           
                           echo $output;
                           ?>
				  
				  
				  
				  </form>
				  
				  
				  </div>
				  </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
        
    </div>
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
	<script language="JavaScript">
	function showinfoedit()
         {
             document.getElementById("bt1").className="btn btn-primary";
			 document.getElementById("bt2").className="btn btn-default";
			 document.getElementById("bt3").className="btn btn-default";
			 document.getElementById("bt4").className="btn btn-default";
			 document.getElementById("edit1").style.display="inline";
             document.getElementById("edit2").style.display="none";
             document.getElementById("edit3").style.display="none";
            document.getElementById("edit4").style.display="none";
         }
         function showmentorsedit()
         {
             document.getElementById("bt2").className="btn btn-primary";
			 document.getElementById("bt1").className="btn btn-default";
			 document.getElementById("bt3").className="btn btn-default";
			 document.getElementById("bt4").className="btn btn-default";
			 document.getElementById("edit2").style.display="inline";
             document.getElementById("edit1").style.display="none";
             document.getElementById("edit3").style.display="none";
             document.getElementById("edit4").style.display="none";
         }
         function showcontrbedit()
         {
             document.getElementById("bt3").className="btn btn-primary";
			 document.getElementById("bt2").className="btn btn-default";
			 document.getElementById("bt1").className="btn btn-default";
			 document.getElementById("bt4").className="btn btn-default";
			 document.getElementById("edit2").style.display="none";
             document.getElementById("edit1").style.display="none";
             document.getElementById("edit3").style.display="inline";
             document.getElementById("edit4").style.display="none";
         }
         function showmilesedit()
         {
             document.getElementById("bt4").className="btn btn-primary";
			 document.getElementById("bt2").className="btn btn-default";
			 document.getElementById("bt3").className="btn btn-default";
			 document.getElementById("bt1").className="btn btn-default";
			 document.getElementById("edit2").style.display="none";
             document.getElementById("edit1").style.display="none";
             document.getElementById("edit3").style.display="none";
             document.getElementById("edit4").style.display="inline";             
         }
      </script>
	</script>
	<script language="JavaScript">showinfoedit();</script>

</body>

</html>
