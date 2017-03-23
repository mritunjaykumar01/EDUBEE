<?php require_once("./includes/function.php"); ?>
<?php require_once("./includes/layouts/header_course.php") ?>
<?php 
session_start();
$user = $_SESSION["user"];
//$check_user = find_user_by_username($user);
if($_SESSION['status']!=1){
  redirect_to("login.php");
}
?>
<!DOCTYPE html>

<?php
   define("DB_SERVER", "localhost");
   define("DB_USER", "hitesh.me14");
   define("DB_PASS", "hitesh@11tp");
   define("DB_NAME", "edubee");
   global $globCourseId;
   global $link;
   
   $link = @mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
   global $show;
   $globCourseId = $_GET['id'];
   $_SESSION['courseId'] = $globCourseId;
   $action = "course.php?id=".$globCourseId;
   if (!$link) {
       die("Database connection failed: " . @mysqli_error($link));
   }
   // if(isset($_SESSION['globCourseId'])){
	  //  	$globCourseId=$_SESSION['globCourseId'];
   // }else{
	  //  $globCourseId="CS201";
   // }

   
   if (($_SERVER['REQUEST_METHOD'] == 'POST')&& isset($_POST['submit'])):
           if (isset($_POST['sectionName'])&& $_POST['submit']=="Add+") {
                   $sectionName = $_POST['sectionName'];
   	   if (!empty($sectionName)) {
                   $query = "INSERT INTO course (section,courseId)
                               VALUES ('{$sectionName}','{$globCourseId}')";
                               if (mysqli_query($link, $query)) {
                                   echo '<strong>Successfully Session Stored to Database....</strong>';
                                   $sectionName=NULL;
                               } else
                                   echo '<strong>Try after some Time</strong>';
               }
               else {
                   echo '<strong>Please fill up all the boxes!</strong>';
               }
      $show='<script type="text/javascript">showedit();</script>';
           }
   		if (isset($_POST['section'])&&$_POST['submit']=="Delete") {
                   foreach ($_POST['section'] as $selectedOption){
   					$query = "DELETE FROM course WHERE courseId='$globCourseId' AND section='$selectedOption' LIMIT 1";
                                   if ($query_run = mysqli_query($link, $query)) {
                                       echo '<strong>Successfully Section Deleted!</strong>';
                                   } else {
                                       echo '<strong>Try after some Time</strong>';
                                   }
   				}		
   	$show='<script type="text/javascript">showedit();</script>';
   		}
   if (isset($_POST['title'])&&isset($_POST['section'])&& isset($_POST['link'])&& $_POST['submit']=="Add Videos") {
               $title=$_POST['title'];
      $linkVideo=$_POST['link'];
      $sectionName = $_POST['section'];
      if (!empty($title) && !empty($linkVideo)&&!empty($sectionName)) {
   	    $query = "INSERT INTO course (section,courseId,videoTitle,videoLink)
                               VALUES ('{$sectionName}','{$globCourseId}','{$title}','{$linkVideo}')";
                               if (mysqli_query($link, $query)) {
                                   echo '<strong>Successfully Video Added to Database....</strong>';
                                   $title=NULL;
   						$linkVideo=NULL;
   						$sectionName=NULL;
   					   
                               } else
                                   echo '<strong>Try after some Time</strong>';
      }
               else {
                   echo '<strong>Please fill up all the boxes!</strong>';
               }
      $show='<script type="text/javascript">showedit();showvideoedit();</script>';
   		}
   		if (isset($_POST['section'])&&$_POST['submit']=="DeleteVideo") {
                   foreach ($_POST['section'] as $selectedOption){
   					$query = "DELETE FROM course WHERE courseId='$globCourseId' AND videoTitle='$selectedOption' LIMIT 1";
                                   if ($query_run = mysqli_query($link, $query)) {
                                       echo '<strong>Successfully Videos Deleted!</strong>';
                                   } else {
                                       echo '<strong>Try after some Time</strong>';
                                   }
   				}		
   	 $show='<script type="text/javascript">showedit();showvideoedit();</script>';
   		}
   if (isset($_POST['title'])&&isset($_POST['section'])&& $_POST['submit']=="Add Material") {
               $title=$_POST['title'];
       $name= $_FILES['file']['name'];  
    $temp_name= $_FILES['file']['tmp_name'];  
    if(isset($name)){
        if(!empty($name)){      
            $location = "uploads/";      
            move_uploaded_file($temp_name, $location.$name);
        }       
    }  else {
        echo 'You should select a file to upload !!';
    }
   $sectionName = $_POST['section'];
      if (!empty($title) &&!empty($sectionName)) {
   	    $query = "INSERT INTO course (section,courseId,materialName,materialFileName)
                               VALUES ('{$sectionName}','{$globCourseId}','{$title}','{$name}')";
                               if (mysqli_query($link, $query)) {
                                   echo '<strong>File uploaded successfully!....</strong>';
                                   $title=NULL;
   						$name=NULL;
   						$temp_name=NULL;
   					   
                               } else
                                   echo '<strong>Try after some Time</strong>';
      }
               else {
                   echo '<strong>Please fill up all the boxes!</strong>';
               }
      $show='<script type="text/javascript">showedit();showfileedit();</script>';
   		}
		
		if (isset($_POST['section'])&&$_POST['submit']=="Delete Material") {
                   foreach ($_POST['section'] as $selectedOption){
   					$query = "DELETE FROM course WHERE courseId='$globCourseId' AND materialName='$selectedOption' LIMIT 1";
                                   if ($query_run = mysqli_query($link, $query)) {
                                       $location = "uploads/"; 
									   $query2 = "SELECT materialFileName FROM course WHERE courseId='{$globCourseId}' AND materialName='{$selectedOption}' ";
									if ($query_run2 = mysqli_query($link, $query2)) {										
									if (mysqli_num_rows($query_run2) >= 1) {
										                                   while ($row = mysqli_fetch_assoc($query_run2)) {
                                       $materialFileName = $row['materialFileName'];
									   echo '$location.$materialFileName';
									   unlink($location.$materialFileName);
                                   }
                               }                           
                           } else {
                               $output.='<p>Try After Sometime.</p><hr>';
                           }
									
									   echo '<strong>Successfully Material Deleted!</strong>';
                                   } else {
                                       echo '<strong>Try after some Time</strong>';
                                   }
   				}		
		$show='<script type="text/javascript">showedit();showfileedit();</script>';
   		}
		
		if (isset($_POST['title'])&&isset($_POST['lang'])&&isset($_POST['section'])&& $_POST['submit']=="Add Assignment") {
               $title=$_POST['title'];
       $name1= $_FILES['file1']['name'];  
       $name2= $_FILES['file2']['name'];  
       $name3= $_FILES['file3']['name'];  
	$temp_name1= $_FILES['file1']['tmp_name'];
	$temp_name2= $_FILES['file2']['tmp_name'];
	$temp_name3= $_FILES['file3']['tmp_name'];	
    if(isset($name1)&&isset($name2)&&isset($name3)){
        if(!empty($name1)&&!empty($name2)&&!empty($name3)){      
            $location = "Assignments/";
			$location.=$globCourseId."/".$title;
			if (!file_exists($location)) {
				mkdir($location, 0777, true);
			}
			$location.="/";
            move_uploaded_file($temp_name1, $location.$name1);
            move_uploaded_file($temp_name2, $location.$name2);
            move_uploaded_file($temp_name3, $location.$name3);
        }       
    }  else {
        echo 'You should select a file to upload !!';
    }
   $sectionName = $_POST['section'];
   $language = $_POST['lang'];
   
      if (!empty($title) &&!empty($sectionName)) {
   	    $query = "INSERT INTO assignment (sectionName,courseId,assignName,question,SIFile,SOFile,language)
                               VALUES ('{$sectionName}','{$globCourseId}','{$title}','{$name1}','{$name2}','{$name3}','{$language}')";
                               if (mysqli_query($link, $query)) {
                                   echo '<strong>Files uploaded successfully!....</strong>';
                                   $title=NULL;
   						$name1=NULL;
   						$temp_name1=NULL;
   						$name2=NULL;
   						$temp_name2=NULL;  
 						$name3=NULL;
   						$temp_name3=NULL;
						$language=NULL;
   					   
                               } else
                                   echo '<strong>Try after some Time</strong>';
      }
               else {
                   echo '<strong>Please fill up all the boxes!</strong>';
               }
      $show='<script type="text/javascript">showedit();showassignmentedit();</script>';
   		}
		
		if (isset($_POST['section'])&&$_POST['submit']=="Delete Assignmnets") {
                   foreach ($_POST['section'] as $selectedOption){
   					$query = "DELETE FROM assignment WHERE courseId='$globCourseId' AND assignName='$selectedOption' LIMIT 1";
                                   if ($query_run = mysqli_query($link, $query)) {
                                      $query2 = "SELECT * FROM assignment WHERE courseId='{$globCourseId}' AND assignName='{$selectedOption}' ";
									if ($query_run2 = mysqli_query($link, $query2)) {										
									if (mysqli_num_rows($query_run2) >= 1) {
									 while ($row = mysqli_fetch_assoc($query_run2)) {
                                       $questionFile = $row['question'];
									   $siFile = $row['SIFile'];
									   $SOFile = $row['SOFile'];									   
									   unlink($questionFile);
									   unlink($siFile);
									   unlink($SOFile);									   
                                   }
                               }                           
                           } else {
                               $output.='<p>Try After Sometime.</p><hr>';
                           }
									
									   echo '<strong>Successfully Assignment Deleted!</strong>';
                                   } else {
                                       echo '<strong>Try after some Time</strong>';
                                   }
   				}		
		$show='<script type="text/javascript">showedit();showassignmentedit();</script>';
   		}
       endif;
   ?>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>EduBee</title>
	  <link rel="icon" href="img/icon.jpg" type="image/x-icon">
      <!-- Bootstrap Core CSS -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom CSS -->
      <link href="css/simple-sidebar.css" rel="stylesheet">
	  <link href="style1.css" rel="stylesheet">
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <script type="text/javascript">
         function assign1()
         {
                 document.getElementById("videosec").style.display="inline";
                 document.getElementById("rm").style.display="none";
				 document.getElementById("ll").style.display="none";
                 document.getElementById("assignment").style.display="none";
         }
		 function assign2()
         {
                 document.getElementById("videosec").style.display="none";
                 document.getElementById("rm").style.display="inline";
				 document.getElementById("ll").style.display="none";
                 document.getElementById("assignment").style.display="none";
         }
		 function assign3()
         {
                 document.getElementById("videosec").style.display="none";
                 document.getElementById("rm").style.display="none";
				 document.getElementById("ll").style.display="inline";
                 document.getElementById("assignment").style.display="none";
         }
		 function assign4()
         {
                 document.getElementById("videosec").style.display="none";
                 document.getElementById("rm").style.display="none";
				 document.getElementById("ll").style.display="none";
                 document.getElementById("assignment").style.display="inline";
         }
         function extCheck()
                         {
                         var name=document.getElementById("fileToUpload").value;
                         
                         if(name.length==0)
                         alert("Please give a valid file path");
                         else if(name.substring(name.lastIndexOf('.')+1,name.length)!=document.getElementById("lang").value)
                         alert("Not a valid file of your language preference");
                         else
                         document.getElementById("submit1").click();
                         
                         }
                         function primCheck()
                         {
                         var href=window.location.href;
						 document.getElementById("infobutton1").click();
                         document.getElementById("vid").click();
                         
                         }
						 
      </script>
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
   </head>
<!-- Bootstrap css file -->
<link href="style1.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/simple-sidebar.css" rel="stylesheet">
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
     <!-- Main structure css file -->
    <link href="style1.css" rel="stylesheet">
   
    <!-- Google fonts -->
    <link href='fonts/googlefont1' rel='stylesheet' type='text/css'>   
    <link href='fonts/googlefont2' rel='stylesheet' type='text/css'>  

   
  <body style="font-family:candara;" onload="primCheck();">
        
    <!--=========== BEGIN HEADER SECTION ================-->
	<div style="font-family:candara;">
    <?php $path = "course.php"; ?>
    <?php 
    $status = $_SESSION['status'];
    site_header($path,$status); ?>
	</div>
    <!--=========== END HEADER SECTION ================--> 
      
      <div id="wrapper" >
         <!-- Sidebar -->
         <div id="sidebar-wrapper" style="font-family:candara;">
            <ul class="sidebar-nav" style="margin-top:115px;font-family:candara;font-size:15px;">
               <li class="sidebar-brand" >
                  <a href="#" style="color:#3FADC9;font-size:24px;">
                  <strong><?php
                           $output="";
                           $query = "SELECT * FROM courseinfo WHERE courseId='{$globCourseId}' ";
                            if ($query_run = mysqli_query($link, $query)) {
                               if ((mysqli_num_rows($query_run) >= 1)) {
                                   while ($row = mysqli_fetch_assoc($query_run)) {
									   $name=$row['name'];
									   $output=$name;
                                   }
                               }else{
                           $output="<br><br><option>No Info Yet!</option><br>";
                           }                           
                           } else {
                               $output.='<p>Try After Sometime.</p><hr>';
                           }
                           echo $output;
                           ?></strong>
                  </a>
               </li>
               <li id="infobutton"  style="margin-top:25px;color:#fff">
                  <a  id="infobutton1"onclick="showintro();" >Course Info</a>
               </li>
               <li id="classbutton">
                  <a id="classbutton1"onclick="showclass();">Go to Class</a>
               </li>
               <li id="forumbutton">
                  <a id="forumbutton1"onclick="showforum();">Discussion</a>
               </li>
			   <li id="forumbutton">
                  <a id="forumbutton1" href="quizes_and_assignments.php">Assignments and Quizzes</a>
               </li>
			   <?php 
			   $query = "SELECT * FROM courseinfo WHERE courseId='{$globCourseId}' ";
			   $query_run = mysqli_query($link, $query);
			   $row = mysqli_fetch_assoc($query_run);
			   if($row["author"] == $_SESSION["user"]){
			   ?>
               <li id="editbutton">
                  <a id="editbutton1"onclick="showedit();">Edit Content</a>
               </li>
			   
               <li id="forumbutton">
                  <a id="forumbutton1" href="quiz_edit.php">Create Quiz</a>
               </li>
			   <?php } else {?>
			   <li id="editbutton">
                  <a id="editbutton1"onclick="showedit();" style="display:none">Edit Content</a>
               </li>
			   
               
			   <?php } ?>
            </ul>
         </div>
         <!-- /#sidebar-wrapper -->
         <!-- Page Content -->
		 <br><br><br><br>
         <div id="page-content-wrapper">
            <div class="container-fluid">
               <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"style="margin-bottom:10px;">Toggle Navigation</a>
               <br><br>
               <div class="row"id="sec1">
                 
                     <?php
                           $output="";
						  
                           $query = "SELECT * FROM courseinfo WHERE courseId='{$globCourseId}'";
                            if ($query_run = mysqli_query($link, $query)) {
                               if ((mysqli_num_rows($query_run) >= 1)) {
                                   while ($row = mysqli_fetch_assoc($query_run)) {
                                       $courseId = $row['courseId'];
									   $name=$row['name'];
                                      // global $author;
										$author = $row['author'];
                                       $subtitle = $row['subtitle'];
                                       $description = $row['description'];
                                       $duration = $row['duration'];
									   
									   $output.=" <div class=\"panel panel-primary\">
  <div class=\"panel-heading\"style=\"background-color:#3FADC9\">
    <h1 class=\"panel-title\">DESCRIPTION</h1>
								   </div><div class=\"panel-body\"><h1>{$name} </h1>";
									$output.="<h3>{$courseId}</h3>";
									$output.="<p><b>Duration : {$duration}</p>";
									$output.="<p><b>{$description}</p>";
                                   }
                           $output.="</div></div>";
                               }else{
                           $output="<br><br><option>No Info Yet!</option><br>";
                           }                           
                           } else {
                               $output.='<p>Try After Sometime.</p><hr>';
                           }
                           echo $output;
                           ?>
						   <div class="container-fluid text-center bg-grey">
  <div class="title_area">
              <h2 class="title_two">Tutor</h2>
              <span></span> 
            </div>
  <center><div class="row text-center">
  <?php
  $Authors=explode(",",$author);
  $f=0;
  for($i=0;$i<sizeof($Authors);$i++)
  {
	  if($Authors[$i]!=null){
		  $f=1;
	  echo "<div class='col-sm-3'>".
      "<div class='thumbnail' style='color:1a1a1a;padding-top:13px;'>".
        "<p><strong>$author</strong></p>".
        "</div>".
	  "</div>";}
  }
  if($f==0)
	  echo "No Authors added to the project<br><br>$author";
  ?>
  
</div></center>
                    </div>
               </div>

               <div class="row" id="sec2" style="position:absolute;display:none;">
                  <div class="col-lg-12"style="">
                     <nav class="navbar navbar-default">
                        <div class="container-fluid">
                           <ul class="nav navbar-nav">
                              <li id="vid" onclick="assign1();"><a href="#">Videos</a></li>
                              <li  onclick="assign2();" ><a href="#">Reading Materials</a></li>
                           </ul>
                        </div>
                     </nav>
					 
					 <div id="videosec" class="col-lg-12"  style="display:none;">
                        <div class="title_area">
              <h2 class="title_two"><b>Videos</b></h2>
              <span></span> 
            </div></br></br></br></br></br></br>
                       <?php
                           $output="";	
                           $query = "SELECT * FROM course WHERE courseId='{$globCourseId}' AND section IS NOT NULL AND videoTitle IS NOT NULL AND videoLink IS NOT NULL AND materialName IS NULL AND materialFileName IS NULL ORDER BY section";
                           	if ($query_run = mysqli_query($link, $query)) {
                               if ((mysqli_num_rows($query_run) >= 1)) {
								   
                                   while ($row = mysqli_fetch_assoc($query_run)) {
                                       $section	 = $row['section'];
                                       $videoTitle	 = $row['videoTitle'];
                                       $videoLink	 = $row['videoLink'];
	$output.=" <div class=\"panel panel-primary\">
  <div class=\"panel-heading\"style=\"background-color:#3FADC9\">
    <h1 class=\"panel-title\">{$section} : {$videoTitle}</h1>
  </div><div class=\"panel-body\">";								
						$output.="<iframe width=\"420\" height=\"345\"
src=\"{$videoLink}\">{$videoTitle}
</iframe>";
						
								$output.="<br>
                        </div></div>";
                                   }
                               }else{
                           $output="No Videos Yet!<br><br>";
                           } 
                           
                           } else {
                               $output.='<p>Try After Sometime.</p><hr>';
                           }
                           echo $output;
                           ?>
                        
                     </div>
					 
					 
					 
					 <div id="rm" class="col-lg-12"  style="display:none;">
                        <div class="title_area">
              <h2 class="title_two"><b>Reading Materials</b></h2>
              <span></span> 
            </div>
            </br></br></br></br></br></br>
                       <?php
                           $output="";
                           $query = "SELECT * FROM course WHERE courseId='{$globCourseId}' AND section IS NOT NULL AND videoTitle IS NULL AND videoLink IS NULL AND materialName IS NOT NULL AND materialFileName IS NOT NULL ORDER BY section";
                           	if ($query_run = mysqli_query($link, $query)) {
                               if ((mysqli_num_rows($query_run) >= 1)) {
                                  while ($row = mysqli_fetch_assoc($query_run)) {
                                       $section	 = $row['section'];
                                       $materialName	 = $row['materialName'];
                                       $materialFileName	 = $row['materialFileName'];
										$location = "http://172.16.26.9/~hitesh.me14/edubee/uploads/".$materialFileName;
$output.=" <div class=\"panel panel-primary\">
  <div class=\"panel-heading\"style=\"background-color:#3FADC9\">
    <h1 class=\"panel-title\">{$section}</h1>
  </div><div class=\"panel-body\">";								
						$output.="<a href=\"{$location}\" target=_new >{$materialName}</a>";
						
								$output.="<br></div></div>";
                                   }
								$output.="<br>";
                               }else{
                           $output="No Materials Yet!<br><br>";
                           } 
                           
                           } else {
                               $output.='<p>Try After Sometime.</p><hr>';
                           }
                           echo $output;
                           ?>
                        
                     </div>
                  </div>
                </div>
               

               <div class="row" id="sec3" style="position:absolute;display:none;width:96%;font-family:candara"><center>
                  <div class="title_area">
              <h2 class="title_two"><b>Discussion Board</b></h2>
              <span></span> 
            </div>
                        <div id="disqus_thread"></div>
<div id="disqus_thread"></div>

<script>
/**
* RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
* LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables
*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL; // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');

s.src = '//edubee-iitp.disqus.com/embed.js';

s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
                      </center>  
               </div>


               <div class="row" id="sec4" style="position:absolute;display:none;width:97%;"><center>
                  <input id="bt1" class="btn btn-default"type="button" value="Section"onclick="showsectionedit();"style="margin-left:15px;margin-right:15px;"/>
                  <input id="bt2"class="btn btn-default"type="button" value="Video"onclick="showvideoedit();"style="margin-left:15px;margin-right:15px;"/>
                  <input id="bt3"class="btn btn-default"type="button" value="Reading Materials"onclick="showfileedit();"style="margin-left:15px;margin-right:15px;"/>
                  <input id="bt4"class="btn btn-default"type="button" value="Assignments"onclick="showassignmentedit();"style="margin-left:15px;margin-right:15px;"/></center><bR><br>
                  <div id="edit1">
                     <div class="title_area">
              <h2 class="title_two"><b>Edit Sections</b></h2>
              <span></span> 
            </div>
                     <hr>
                     <h3>Add Section</h3>
                     <form action='<?php echo $action; ?>' method="POST">
                        Name of the new section :&nbsp;&nbsp;&nbsp;<input name="sectionName" type="text"/>&nbsp;&nbsp;
                        <input type="submit" name="submit" value="Add+"class="btn btn-default"/>
                     </form>
                     <hr>
                     <h3>Delete Section</h3>
                     <form action='<?php echo $action; ?>' method="POST">
                        Select from the list of sections(Hold dowm Ctrl for multiple selections):<br><br>
                        <?php
                           $output="<select multiple name='section[ ]'>";
                           $query = "SELECT section FROM course WHERE courseId='{$globCourseId}' AND videoLink IS NULL AND materialName IS NULL ORDER BY time_modified ";
                           	if ($query_run = mysqli_query($link, $query)) {
                               if ((mysqli_num_rows($query_run) >= 1)) {
                                   while ($row = mysqli_fetch_assoc($query_run)) {
                                       $sectionName = $row['section'];
                                       $output.="<option>{$sectionName}</option>";
                                   }
                           $output.="</select><br><br>";
                               }else{
                           $output="<option>No Sections Yet!</option><br><br>";
                           } 
                           
                           } else {
                               $output.='<p>Try After Sometime.</p><hr>';
                           }
                           echo $output;
                           ?>
                        <input type="submit" name="submit" value="Delete"class="btn btn-default"/>
                     </form>
                  </div>



                  <div id="edit2">
                     <div class="title_area">
              <h2 class="title_two"><b>Edit Videos</b></h2>
              <span></span> 
            </div>
                     <hr>
                     <h3>Add Video</h3>
                     <form action='<?php echo $action; ?>' method="POST">
                        Title of the new video :&nbsp;&nbsp;&nbsp;<input name="title" type="text"/><br><br>
                        Select the section to which it belongs:&nbsp;&nbsp;&nbsp;
                        <?php
                           $output="<select name='section'>";
                           $query = "SELECT section FROM course WHERE courseId='{$globCourseId}' AND videoLink IS NULL ORDER BY time_modified ";
                           	if ($query_run = mysqli_query($link, $query)) {
                               if ((mysqli_num_rows($query_run) >= 1)) {
                                   while ($row = mysqli_fetch_assoc($query_run)) {
                                       $sectionName = $row['section'];
                                       $output.="<option>{$sectionName}</option>";
                                   }
                           $output.="</select><br><br>";
                               }else{
                           $output="<br><br><option>No Sections Yet!</option><br>";
                           } 
                           
                           } else {
                               $output.='<p>Try After Sometime.</p><hr>';
                           }
                           echo $output;
                           ?>
                        Enter Video Link to upload : <input type="text" size="35" placeholder="http://www.youtube.com/embed/85sdsax" name="link" /><br><br>
                        <input type="submit" name="submit" value="Add Videos"class="btn btn-default"/>
                     </form>
                     <hr>
                     <h3>Delete Videos</h3>
                     <form action='<?php echo $action; ?>' method="POST">
                        Select from the list of Videos(Hold dowm Ctrl for multiple selections):<br><br>
                        <?php
                           $output="<select multiple name='section[ ]'>";
                           $query = "SELECT videoTitle FROM course WHERE courseId='{$globCourseId}' AND videoLink IS NOT NULL ORDER BY time_modified ";
                           	if ($query_run = mysqli_query($link, $query)) {
                               if ((mysqli_num_rows($query_run) >= 1)) {
                                   while ($row = mysqli_fetch_assoc($query_run)) {
                                       $videoTitle = $row['videoTitle'];
                                       $output.="<option>{$videoTitle}</option>";
                                   }
                           $output.="</select><br><br>";
                               }else{
                           $output="<option>No Videos Yet!</option><br><br>";
                           } 
                           
                           } else {
                               $output.='<p>Try After Sometime.</p><hr>';
                           }
                           echo $output;
                           ?>
                        <input type="submit" name="submit" value="Delete Video(s)"class="btn btn-default"/>
                     </form>
                  </div>

                  <div id="edit3">
                     <div class="title_area">
              <h2 class="title_two"><b>Edit Reading materials</b></h2>
              <span></span> 
            </div>
                     <hr>
                     <h3>Add Material</h3>
                     <form action='<?php echo $action; ?>' method="POST" enctype="multipart/form-data">
                        Title of the new file :&nbsp;&nbsp;&nbsp;<input name="title" type="text"/><br><br>
                        Select the section to which it belongs:&nbsp;&nbsp;&nbsp;
                        <?php
                           $output="<select name='section'>";
                           $query = "SELECT section FROM course WHERE courseId='{$globCourseId}' AND videoLink IS NULL ORDER BY time_modified ";
                           	if ($query_run = mysqli_query($link, $query)) {
                               if ((mysqli_num_rows($query_run) >= 1)) {
                                   while ($row = mysqli_fetch_assoc($query_run)) {
                                       $sectionName = $row['section'];
                                       $output.="<option>{$sectionName}</option>";
                                   }
                           $output.="</select><br><br>";
                               }else{
                           $output="<br><br><option>No Sections Yet!</option><br>";
                           } 
                           
                           } else {
                               $output.='<p>Try After Sometime.</p><hr>';
                           }
                           echo $output;
                           ?>
                        Choose File to upload : <input type="file" name="file" id="file"/><br><br>
                        <input type="submit" name="submit" value="Add Material"class="btn btn-default"/>
                     </form>
                     <hr>
                     <h3>Delete Materials</h3>
                     <form action='<?php echo $action; ?>' method="POST">
                        Select from the list of Materials(Hold dowm Ctrl for multiple selections):<br><br>
                        <?php
                           $output="<select multiple name='section[ ]'>";
                           $query = "SELECT materialName FROM course WHERE courseId='{$globCourseId}' AND videoLink IS NULL AND materialName IS NOT NULL ORDER BY time_modified ";
                           	if ($query_run = mysqli_query($link, $query)) {
                               if ((mysqli_num_rows($query_run) >= 1)) {
                                   while ($row = mysqli_fetch_assoc($query_run)) {
                                       $materialName = $row['materialName'];
                                       $output.="<option>{$materialName}</option>";
                                   }
                           $output.="</select><br><br>";
                               }else{
                           $output="<option>No Materials Yet!</option><br><br>";
                           } 
                           
                           } else {
                               $output.='<p>Try After Sometime.</p><hr>';
                           }
                           echo $output;
                           ?>
                        <input type="submit" name="submit" value="Delete Material(s)"class="btn btn-default"/>
                     </form>
                  </div>

                  <div id="edit4">
                     <div class="title_area">
              <h2 class="title_two"><b>Edit Assignments</b></h2>
              <span></span> 
            </div>
                     <hr>
                     <h3>Add Assignments</h3>
                     <form action='<?php echo $action; ?>' method="POST" enctype="multipart/form-data">
                        Title of the new file :&nbsp;&nbsp;&nbsp;<input name="title" type="text"/><br><br>
                        Select the section to which it belongs:&nbsp;&nbsp;&nbsp;
                        <?php
                           $output="<select name='section'>";
                           $query = "SELECT section FROM course WHERE courseId='{$globCourseId}' AND videoLink IS NULL ORDER BY time_modified ";
                            if ($query_run = mysqli_query($link, $query)) {
                               if ((mysqli_num_rows($query_run) >= 1)) {
                                   while ($row = mysqli_fetch_assoc($query_run)) {
                                       $sectionName = $row['section'];
                                       $output.="<option>{$sectionName}</option>";
                                   }
                           $output.="</select><br><br>";
                               }else{
                           $output="<br><br><option>No Sections Yet!</option><br>";
                           } 
                           
                           } else {
                               $output.='<p>Try After Sometime.</p><hr>';
                           }
                           echo $output;
                           ?>
                        Choose Sample Question File : <input type="file" name="file1" id="file1"/><br><br>

                        Choose Sample Input File : <input type="file" name="file2" id="file2"/><br><br>

                        Choose Sample output File : <input type="file" name="file3" id="file3"/><br><br>
                        Select Language : &nbsp;&nbsp;&nbsp;&nbsp;
                        <select id="lang" name="lang" required>
                           <option value="c" >C</option>
                           <option value="cpp" >C++</option>
                           <option value="java" >Java</option>
                        </select>
                        <br><br>
                        <input type="submit" name="submit" value="Add Assignment"class="btn btn-default"/>                                                
                     </form>
                     <hr>
                     <h3>Delete Assignment</h3>
                     <form action='<?php echo $action; ?>' method="POST">
                        Select from the list of Assignments(Hold dowm Ctrl for multiple selections):<br><br>
                        <?php
                           $output="<select multiple name='section[ ]'>";
                           $query = "SELECT assignName FROM assignment WHERE courseId='{$globCourseId}' ";
                           	if ($query_run = mysqli_query($link, $query)) {
                               if ((mysqli_num_rows($query_run) >= 1)) {
                                   while ($row = mysqli_fetch_assoc($query_run)) {
                                       $assignName	 = $row['assignName'];
                                       $output.="<option>{$assignName}</option>";
                                   }
                           $output.="</select><br><br>";
                               }else{
                           $output="<option>No Assignments Yet!</option><br><br>";
                           } 
                           
                           } else {
                               $output.='<p>Try After Sometime.</p><hr>';
                           }
                           echo $output;
                           ?>
                        <input type="submit" name="submit" value="Delete Assignments"class="btn btn-default" style="margin-top:70px;margin-left:-150px;"/>
                     </form>
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
             if(document.getElementById("menu-toggle").innerHTML=="Show Navigation")
             document.getElementById("menu-toggle").innerHTML="Hide Navigation";
             else
                 document.getElementById("menu-toggle").innerHTML="Show Navigation";
         
         });
         function showintro()
         {
             document.getElementById("sec1").style.display="inline";
             document.getElementById("sec2").style.display="none";
             document.getElementById("sec3").style.display="none";
         document.getElementById("sec4").style.display="none";
		 document.getElementById("infobutton").style.backgroundColor="#3FADC9";
		 document.getElementById("classbutton").style.backgroundColor="#313338";
		 document.getElementById("forumbutton").style.backgroundColor="#313338";
		 document.getElementById("editbutton").style.backgroundColor="#313338";
		 document.getElementById("infobutton1").style.color="#fff";
		 document.getElementById("classbutton1").style.color="#999992";
		 document.getElementById("forumbutton1").style.color="#999992";
		 document.getElementById("editbutton1").style.color="#999992";
		 
         }
         function showclass()
         {
             document.getElementById("sec2").style.display="inline";
             document.getElementById("sec1").style.display="none";
             document.getElementById("sec3").style.display="none";
         document.getElementById("sec4").style.display="none";
		 document.getElementById("classbutton").style.backgroundColor="#3FADC9";
		 document.getElementById("infobutton").style.backgroundColor="#313338";
		 document.getElementById("forumbutton").style.backgroundColor="#313338";
		 document.getElementById("editbutton").style.backgroundColor="#313338";
		 document.getElementById("classbutton1").style.color="#fff";
		 document.getElementById("infobutton1").style.color="#999992";
		 document.getElementById("forumbutton1").style.color="#999992";
		 document.getElementById("editbutton1").style.color="#999992";
         }
         function showforum()
         {
              document.getElementById("sec2").style.display="none";
             document.getElementById("sec1").style.display="none";
             document.getElementById("sec3").style.display="inline";
         document.getElementById("sec4").style.display="none";
		 document.getElementById("forumbutton").style.backgroundColor="#3FADC9";
		 document.getElementById("classbutton").style.backgroundColor="#313338";
		 document.getElementById("infobutton").style.backgroundColor="#313338";
		 document.getElementById("editbutton").style.backgroundColor="#313338";
		 document.getElementById("forumbutton1").style.color="#fff";
		 document.getElementById("classbutton1").style.color="#999992";
		 document.getElementById("infobutton1").style.color="#999992";
		 document.getElementById("editbutton1").style.color="#999992";
         }
         function showedit()
         {
              document.getElementById("sec3").style.display="none";
             document.getElementById("sec1").style.display="none";
             document.getElementById("sec4").style.display="inline";
         document.getElementById("sec2").style.display="none";
		 document.getElementById("editbutton").style.backgroundColor="#3FADC9";
		 document.getElementById("classbutton").style.backgroundColor="#313338";
		 document.getElementById("forumbutton").style.backgroundColor="#313338";
		 document.getElementById("infobutton").style.backgroundColor="#313338";
		 document.getElementById("editbutton1").style.color="#fff";
		 document.getElementById("classbutton1").style.color="#999992";
		 document.getElementById("forumbutton1").style.color="#999992";
		 document.getElementById("infobutton1").style.color="#999992";
         }
         function showsectionedit()
         {
             document.getElementById("edit1").style.display="inline";
             document.getElementById("edit2").style.display="none";
             document.getElementById("edit3").style.display="none";
            document.getElementById("edit4").style.display="none";
			document.getElementById("bt1").className="btn btn-primary";
			 document.getElementById("bt2").className="btn btn-default";
			 document.getElementById("bt3").className="btn btn-default";
			 document.getElementById("bt4").className="btn btn-default";
         }
         function showvideoedit()
         {
             document.getElementById("edit2").style.display="inline";
             document.getElementById("edit1").style.display="none";
             document.getElementById("edit3").style.display="none";
             document.getElementById("edit4").style.display="none";
			 document.getElementById("bt2").className="btn btn-primary";
			 document.getElementById("bt1").className="btn btn-default";
			 document.getElementById("bt3").className="btn btn-default";
			 document.getElementById("bt4").className="btn btn-default";
         }
         function showfileedit()
         {
              document.getElementById("edit2").style.display="none";
             document.getElementById("edit1").style.display="none";
             document.getElementById("edit3").style.display="inline";
             document.getElementById("edit4").style.display="none";
			 document.getElementById("bt3").className="btn btn-primary";
			 document.getElementById("bt2").className="btn btn-default";
			 document.getElementById("bt1").className="btn btn-default";
			 document.getElementById("bt4").className="btn btn-default";
         }
         function showassignmentedit()
         {
             document.getElementById("edit2").style.display="none";
             document.getElementById("edit1").style.display="none";
             document.getElementById("edit3").style.display="none";
             document.getElementById("edit4").style.display="inline";
				document.getElementById("bt4").className="btn btn-primary";
			 document.getElementById("bt2").className="btn btn-default";
			 document.getElementById("bt3").className="btn btn-default";
			 document.getElementById("bt1").className="btn btn-default";
         }
      </script>
      <script language="JavaScript">showsectionedit();</script>
      <?php
         echo $show;
               ?>
   </body>
</html>
