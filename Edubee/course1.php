<!DOCTYPE html>
<?php
   define("DB_SERVER", "localhost");
   define("DB_USER", "root");
   define("DB_PASS", "edubee");
   define("DB_NAME", "edubee");
   global $courseName;
   global $link;
   $courseName = "c255";
   $link = @mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
   global $show;
   if (!$link) {
       die("Database connection failed: " . @mysqli_error($link));
   }
   if (($_SERVER['REQUEST_METHOD'] == 'POST')&& isset($_POST['submit'])):
           if (isset($_POST['sectionName'])&& $_POST['submit']=="Add+") {
               
                   $sectionName = $_POST['sectionName'];
   	   if (!empty($sectionName)) {
                   $query = "INSERT INTO course (section,courseId)
                               VALUES ('{$sectionName}','{$courseName}')";
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
   					$query = "DELETE FROM course WHERE courseId='$courseName' AND section='$selectedOption' LIMIT 1";
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
                               VALUES ('{$sectionName}','{$courseName}','{$title}','{$linkVideo}')";
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
   					$query = "DELETE FROM course WHERE courseId='$courseName' AND videoTitle='$selectedOption' LIMIT 1";
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
            $location = "C:\\xampp\\htdocs\\CS241\\alan\\uploads\\";      
            move_uploaded_file($temp_name, $location.$name);
        }       
    }  else {
        echo 'You should select a file to upload !!';
    }
   $sectionName = $_POST['section'];
      if (!empty($title) &&!empty($sectionName)) {
   	    $query = "INSERT INTO course (section,courseId,materialName,materialFileName)
                               VALUES ('{$sectionName}','{$courseName}','{$title}','{$name}')";
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
   					$query = "DELETE FROM course WHERE courseId='$courseName' AND materialName='$selectedOption' LIMIT 1";
                                   if ($query_run = mysqli_query($link, $query)) {
                                       $location = "C:\\xampp\\htdocs\\CS241\\alan\\uploads\\"; 
									   $query2 = "SELECT materialFileName FROM course WHERE courseId='{$courseName}' AND materialName='{$selectedOption}' ";
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
      <!-- Bootstrap Core CSS -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom CSS -->
      <link href="css/simple-sidebar.css" rel="stylesheet">
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <script type="text/javascript">
         function assign()
         {
                 document.getElementById("assignment").style.display="inline";
                 document.getElementById("videosec").style.display="none";
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
                         
                         if(href.indexOf('?')>=0)
                         {
                             var x=href.charAt(href.indexOf('?')+3);
                             
                             if(x=='1'){
                             alert("Your program ran successfully. Continue to next question or try it again");
                             document.getElementById('nextqn').style.display="inline";}
                             else if(x==0)
                             {
                                 alert("Your program didnt compile well");
                             }
                             else
                             {
                                 alert("Your solution is not matching with the test cases. Try again");
                             }
                         
                         }
                         }
      </script>
   </head>
   <body onload="primCheck();">
      <div style="width:100%;height:80px;background-color:#0f3942;">
      </div>
      <div id="wrapper">
         <!-- Sidebar -->
         <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
               <li class="sidebar-brand">
                  <a href="#">
                  Course Name
                  </a>
               </li>
               <li class="active">
                  <a onclick="showintro();">Course Info</a>
               </li>
               <li>
                  <a onclick="showclass();">Go to Class</a>
               </li>
               <li>
                  <a onclick="showforum();">Discussion</a>
               </li>
               <li>
                  <a onclick="showedit();">Edit Content</a>
               </li>
            </ul>
         </div>
         <!-- /#sidebar-wrapper -->
         <!-- Page Content -->
         <div id="page-content-wrapper">
            <div class="container-fluid">
               <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"style="margin-bottom:10px;">Hide Navigation</a>
               <br><br>
               <div class="row"id="sec1">
                  <div class="col-lg-12"  style="border:solid 2px;border-radius:20px;">
                     <h1>Introduction</h1>
                     <p><b>This is the section where details about the course will be displayed.</b><br>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras diam metus, sodales vel tellus et, ultricies aliquet orci. Vivamus id sollicitudin eros, vel egestas leo. Phasellus porttitor dictum viverra. Etiam ac semper orci, ut dapibus enim. Duis ut libero augue. Nam varius consectetur porttitor. Duis cursus dolor nulla, semper blandit lacus hendrerit vitae. Ut scelerisque, enim at faucibus tempus, ligula sapien aliquet erat, ut elementum felis augue sit amet urna. Suspendisse potenti. Nullam sit amet maximus turpis, et laoreet velit. 
                     </p>
                  </div>
                  <div class="col-lg-12" style="border:solid 2px;border-radius:20px;margin-top:10px;">
                     <h1>Instructor</h1>
                     <p><b>This is the section where details about the instructor will be displayed.</b><br>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras diam metus, sodales vel tellus et, ultricies aliquet orci. Vivamus id sollicitudin eros, vel egestas leo. Phasellus porttitor dictum viverra. Etiam ac semper orci, ut dapibus enim. Duis ut libero augue. Nam varius consectetur porttitor. Duis cursus dolor nulla, semper blandit lacus hendrerit vitae. Ut scelerisque, enim at faucibus tempus, ligula sapien aliquet erat, ut elementum felis augue sit amet urna. Suspendisse potenti. Nullam sit amet maximus turpis, et laoreet velit. 
                     </p>
                  </div>
               </div>
               <div class="row" id="sec2" style="position:absolute;display:none;">
                  <div class="col-lg-12"style="">
                     <nav class="navbar navbar-default">
                        <div class="container-fluid">
                           <ul class="nav navbar-nav">
                              <li class="active"><a href="#">Videos</a></li>
                              <li><a href="#">Reading Materials</a></li>
                              <li><a href="#">Live Lecture</a></li>
                              <li><a href="#" onclick="assign();">Assignments</a></li>
                           </ul>
                        </div>
                     </nav>
                     <div class="col-lg-12" id="videosec" style="">
                        <h1 style="margin-bottom:20px;"><u>Week 1</u></h1>
                        <video width="240" height="140" controls>
                           <source id="testvideo"src="test.mp4" type="video/mp4">
                           Test Video 
                           Your browser does not support the video tag.
                        </video>
                        <br>
                        <label for="testvideo">Test Video</label>
                     </div>
                     <div id="assignment" class="col-lg-12"  style="display:none;">
                        <h1>Assignment 1</h1>
                        <p>
                           Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras diam metus, sodales vel tellus et, ultricies aliquet orci. Vivamus id sollicitudin eros, vel egestas leo. Phasellus porttitor dictum viverra. Etiam ac semper orci, ut dapibus enim. Duis ut libero augue. Nam varius consectetur porttitor. Duis cursus dolor nulla, semper blandit lacus hendrerit vitae. Ut scelerisque, enim at faucibus tempus, ligula sapien aliquet erat, ut elementum felis augue sit amet urna. Suspendisse potenti. Nullam sit amet maximus turpis, et laoreet velit. 
                        </p>
                        <br>
                        <h2>Sample Input</h2>
                        <div id="inputs" style="background-color:#cfcccc;padding:3px;border-radius:3px;">
                           <code>2<br>2 3<br>7 0</code>
                        </div>
                        <h2>Sample Output</h2>
                        <div id="inputs" style="background-color:#cfcccc;padding:3px;border-radius:3px;">
                           <code>5 <br>7</code>
                        </div>
                        <br>
                        Select Language : &nbsp;&nbsp;&nbsp;&nbsp;
                        <select id="lang" required>
                           <option value="c" >C</option>
                           <option value="cpp" >C++</option>
                           <option value="java" >Java</option>
                        </select>
                        <br><br>
                        <form action="upload.php" method="post" enctype="multipart/form-data">
                           Select file containing solution : &nbsp;&nbsp;&nbsp;&nbsp;
                           <input type="file" name="fileToUpload" id="fileToUpload" required><br><br>
                           <input type="button" onclick="extCheck();" value="Submit Solution"/>
                           <input type="submit" id="submit1" style="display:none;">
                        </form>
                        <input type="button" id="nextqn"style="display:none" value="Next Qn->"/>
                     </div>
                  </div>
               </div>
               <div class="row" id="sec3" style="position:absolute;display:none;">
                  <h1 style="margin-bottom:20px;"><u>Discussion Board</u></h1>
                  <textarea rows="6" cols="150">Post your opinion here....
</textarea>
                  <button class="button btn-default" style="margin-left:20px;">Post</button>
                  <div class="col-lg-8" style="border:solid 2px;border-radius:20px;margin-top:10px;">
                     <p><b>Alan posted on 18th Feb </b><br>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras diam metus, sodales vel tellus et, ultricies aliquet orci. Vivamus id sollicitudin eros, vel egestas leo. Phasellus porttitor dictum viverra. Etiam ac semper orci, ut dapibus enim. Duis ut libero augue. Nam varius consectetur porttitor. Duis cursus dolor nulla, semper blandit lacus hendrerit vitae. Ut scelerisque, enim at faucibus tempus, ligula sapien aliquet erat, ut elementum felis augue sit amet urna. Suspendisse potenti. Nullam sit amet maximus turpis, et laoreet velit. 
                     </p>
                  </div>
               </div>
               <div class="row" id="sec4" style="position:absolute;display:none;">
                  <input class="btn btn-default"type="button" value="Section"onclick="showsectionedit();"/>
                  <input class="btn btn-default"type="button" value="Video"onclick="showvideoedit();"/>
                  <input class="btn btn-default"type="button" value="Reading Materials"onclick="showfileedit();"/>
                  <div id="edit1">
                     <h2 style="margin-bottom:20px;">Edit Sections</h2>
                     <hr>
                     <h3>Add Section</h3>
                     <form action="<?=$_SERVER['PHP_SELF'];?>" method="POST">
                        Name of the new section :&nbsp;&nbsp;&nbsp;<input name="sectionName" type="text"/>&nbsp;&nbsp;
                        <input type="submit" name="submit" value="Add+"class="btn btn-default"/>
                     </form>
                     <hr>
                     <h3>Delete Section</h3>
                     <form action="<?=$_SERVER['PHP_SELF'];?>" method="POST">
                        Select from the list of sections(Hold dowm Ctrl for multiple selections):<br><br>
                        <?php
                           $output="<select multiple name='section[ ]'>";
                           $query = "SELECT section FROM course WHERE courseId='{$courseName}' AND videoLink IS NULL AND materialName IS NULL ORDER BY time_modified ";
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
                     <h2 style="margin-bottom:20px;">Edit Videos</h2>
                     <hr>
                     <h3>Add Video</h3>
                     <form action="<?=$_SERVER['PHP_SELF'];?>" method="POST">
                        Title of the new video :&nbsp;&nbsp;&nbsp;<input name="title" type="text"/><br><br>
                        Select the section to which it belongs:&nbsp;&nbsp;&nbsp;
                        <?php
                           $output="<select name='section'>";
                           $query = "SELECT section FROM course WHERE courseId='{$courseName}' AND videoLink IS NULL ORDER BY time_modified ";
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
                        Enter Video Link to upload : <input type="text" name="link" /><br><br>
                        <input type="submit" name="submit" value="Add Videos"class="btn btn-default"/>
                     </form>
                     <hr>
                     <h3>Delete Videos</h3>
                     <form action="<?=$_SERVER['PHP_SELF'];?>" method="POST">
                        Select from the list of Videos(Hold dowm Ctrl for multiple selections):<br><br>
                        <?php
                           $output="<select multiple name='section[ ]'>";
                           $query = "SELECT videoTitle FROM course WHERE courseId='{$courseName}' AND videoLink IS NOT NULL ORDER BY time_modified ";
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
                        <input type="submit" name="submit" value="DeleteVideo"class="btn btn-default"/>
                     </form>
                  </div>
                  <div id="edit3">
                     <h2 style="margin-bottom:20px;">Edit Reading Materials</h2>
                     <hr>
                     <h3>Add Material</h3>
                     <form action="<?=$_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
                        Title of the new file :&nbsp;&nbsp;&nbsp;<input name="title" type="text"/><br><br>
                        Select the section to which it belongs:&nbsp;&nbsp;&nbsp;
                        <?php
                           $output="<select name='section'>";
                           $query = "SELECT section FROM course WHERE courseId='{$courseName}' AND videoLink IS NULL ORDER BY time_modified ";
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
                     <form action="<?=$_SERVER['PHP_SELF'];?>" method="POST">
                        Select from the list of Materials(Hold dowm Ctrl for multiple selections):<br><br>
                        <?php
                           $output="<select multiple name='section[ ]'>";
                           $query = "SELECT materialName FROM course WHERE courseId='{$courseName}' AND videoLink IS NULL AND materialName IS NOT NULL ORDER BY time_modified ";
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
                        <input type="submit" name="submit" value="Delete Material"class="btn btn-default"/>
                     </form>
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
             if(document.getElementById("menu-toggle").innerHTML=="Hide Navigation")
             document.getElementById("menu-toggle").innerHTML="Show Navigation";
             else
                 document.getElementById("menu-toggle").innerHTML="Hide Navigation";
         
         });
         function showintro()
         {
             document.getElementById("sec1").style.display="inline";
             document.getElementById("sec2").style.display="none";
             document.getElementById("sec3").style.display="none";
         document.getElementById("sec4").style.display="none";
         }
         function showclass()
         {
             document.getElementById("sec2").style.display="inline";
             document.getElementById("sec1").style.display="none";
             document.getElementById("sec3").style.display="none";
         document.getElementById("sec4").style.display="none";
         }
         function showforum()
         {
              document.getElementById("sec2").style.display="none";
             document.getElementById("sec1").style.display="none";
             document.getElementById("sec3").style.display="inline";
         document.getElementById("sec4").style.display="none";
         }
         function showedit()
         {
              document.getElementById("sec3").style.display="none";
             document.getElementById("sec1").style.display="none";
             document.getElementById("sec4").style.display="inline";
         document.getElementById("sec2").style.display="none";
         }
         function showsectionedit()
         {
             document.getElementById("edit1").style.display="inline";
             document.getElementById("edit2").style.display="none";
             document.getElementById("edit3").style.display="none";
         
         }
         function showvideoedit()
         {
             document.getElementById("edit2").style.display="inline";
             document.getElementById("edit1").style.display="none";
             document.getElementById("edit3").style.display="none";
         }
         function showfileedit()
         {
              document.getElementById("edit2").style.display="none";
             document.getElementById("edit1").style.display="none";
             document.getElementById("edit3").style.display="inline";
         }
      </script>
      <script language="JavaScript">showsectionedit();</script>
      <?php
         echo $show;
               ?>
   </body>
</html>