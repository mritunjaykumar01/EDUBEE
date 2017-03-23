<html>
<head>
<?php require_once("./includes/db_connection.php"); ?>
 //include function.php later 
<?php require_once("./includes/layouts/header.php"); ?>
<?php require_once("./includes/session.php"); ?>
<?php require_once("./includes/functions.php"); ?>
<?php ini_set('max_execution_time',6); ?>
<?php session_start();
  if(!isset($_SESSION['status'])){
    $_SESSION['status'] = 0;
  }
                    $courseId = $_SESSION['courseId'];
                    $assignment_name = $_SESSION['assignment_name'];
                    $query = "SELECT * from assignment where courseId='{$courseId}' and assignName='{$assignment_name}' limit 1";
                        $data = mysqli_query($connection, $query);
                        confirm_query($data);
                        $row = mysqli_fetch_array($data);


?>
<?php $projectId="pr104";?>





    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edubee - Result</title>
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
</style>
<script language="JavaScript">
function primary()
{
    document.getElementById("menu-toggle").click();
    document.getElementById("menu-toggle").style.display="none";
}
</script>
</head>

    
<body style="font-family:candara;" onload="primary();">

    <div>    
    

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="project.php" style="color:#3FADC9;margin-top:37px;font-size:24px;">
                        <strong></strong>
                    </a>
                </li>
            </br></br></br>
                <li style="margin-top:-37px;">
                    <a href="project.php">Project Info</a>
                </li>
                <li style="background-color:#3FADC9";>
                    <a href="#" ><span style="color:#fff";>Project Timeline</span></a>
                </li>
                <li>
                    <a href="project_discussion.php">Discussion</a>
                </li>
                <li>
                    <a href="project_edit.php">Edit Content</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        
                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Navigation</a> <br>
                        <!--timeline-->
                        <div class="row">

                        <div class="col-md-16">
                            <section class="panel">
                              <header class="panel-heading">
                                 <div class="title_area">
                                    <h2 class="title_two">Assignment Analytics</h2>
                                        <span></span> 
                                    </div>
                            </header>
                            <?php $path = "course.php"; ?>
    <?php 
    $status = $_SESSION['status'];
    site_header($path,$status); ?>
    <br>
    <br>
<!--PHP script to check for compilation error-->
<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = filesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo  "\n";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// // Check if file already exists
// if (file_exists($target_file)) {
//     echo "Sorry, file already exists.";
//     $uploadOk = 0;
// }
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "c" && $imageFileType != "java" && $imageFileType != "py") {
    echo "Sorry, only C,java & python  files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        
    


//End of compilation error check-->

// PHP script to analse test caes-->

    ini_set('max_execution_time', 2);
   if($imageFileType === "c"){
    //$testcases = {2,2,3,7,0};
    exec("cd /uploads");
                            $link = "./Assignments/".$courseId."/".$assignment_name."/".$row['SIFile'];
                            $time = array();
    
                            $myfile = fopen("$link", 'r') or die("Unable to open file!");
                            // Output one line until end-of-file
                             $input = "";
                             $count=0;
                             $test_case = array();
                             $i=0;
                             $j=0;
                            while(!feof($myfile)) {
                              $sample_input = fgets($myfile);
                              //echo $sample_input . "<br>";
                              if($sample_input == "next\n" || $sample_input =="next"){
                                //echo $input."<br>";
                                exec('gcc '.$target_file.' -o question 2>error.txt',$out,$var);
                                //print_r($out);
                                if($var == 1){
                                    //header('location:http://localhost/cs241/alan/course.html?q=0');
                                    //echo "compilation error";

                                    $link = "error.txt";
                                    //$link = get_output();
                                    $result = "";
                                    //$output = array();
                                    //$i=0;
                                    // while ($row = $link->fetch_assoc()) {
                                    //     $result .= $row['SOFile'];
                                    // }
                                     $myfile = fopen("$link", 'r') or die("Unable to open file!");
                                    // Output one line until end-of-file
                                    $error="";
                                    while(!feof($myfile)) {
                                        $error.=fgets($myfile);
                                    }
                                    echo "<div class='alert alert-danger'>".
                                    "<strong>Compilation error : </strong> <br> $error".
                                    "</div>";
                                    fclose($myfile);
                                    die("");

                                }else{
                                    $count++;
                                    $k=0;
                                    $value = "";
                                    while($input[$k] != " "){
                                        //$test_case[$i] .= $input[$k];
                                        $value .= $input[$k];
                                        $k++;
                                    }
                                    $test_case[$i] = $value;
                                    $i++;  
                                    $start = microtime(true);
                                    exec("echo '$input' | ./question",$ans,$var1);
                                    $end = microtime(true);
                                    $time[$j] = $end - $start;
                                    $j++;
                                }
                                $input = "";
                                continue;
                              }else

                                $input .= $sample_input. " ";
                            }
                            
                            fclose($myfile);
                            $link = "./Assignments/".$courseId."/".$assignment_name."/".$row['SOFile'];
                           
                            $output = array();
                            $i=0;
                            
                             $myfile = fopen("$link", 'r') or die("Unable to open file!");
                            // Output one line until end-of-file
                             $output = "";
                            while(!feof($myfile)) {
                                $sample_output = fgets($myfile);
                                if($sample_output == "next\n")
                                    continue;
                                else{

                                    $output[$i]= $sample_output;
                                    $i++;
                                }
                            }
                            fclose($myfile);
                            $flag = array();
                            $wrong_index = array();
                            $j=0;
                            $output = array_map('trim',$output);
                            $ans = array_map('trim',$ans);
                            for($i=0;$i<sizeof($output);$i++,$j++){
                                if($ans[$i] === $output[$i]){
                                    $wrong_index[$j] = 0;
                                }else{
                                    $wrong_index[$j] = 1;
                                    //$j++;
                                }
                            }
                            $wrong_index = array_map('trim',$wrong_index);
                            $test_case = array_map('trim',$test_case);
                            // echo $count;
                            // echo "<br>";
                            // print_r($ans);
                            // echo "<br>";
                            // print_r($output);
                            // echo "<br>";
                            // print_r($test_case);
                            // echo "<br>";
                            // print_r($wrong_index);
                            // echo "<br>";
                            $j=0;$i=0;
                            $sum = 0;
                            for($i=0;$i<sizeof($test_case);$i++){
                                $check = 0;
                                $sum = $sum + $test_case[$i];
                                for(;$j<$sum;){
                                    if($wrong_index[$j] == 0){
                                        $j++;
                                    }else{
                                        $check = 1;
                                        $j=$sum;
                                        break;
                                    }
                                }
                                if($check == 0){
                                    $flag[$i] = 1;    
                                }else{
                                    $flag[$i] = 0;
                                }                                
                            }
                            //print_r($flag);
    }
 ?> 
 <!-- End of Analysis of testcases-->
                            
                            
                            
                            <div class="panel-body table-responsive">
                                <table class="table table-hover">
                                  <thead>
                                    <tr>
                                      <th>#</th>
                                      <th><h3>Testcase ID </h3></th>
                                      <th><h3>Execution Time</h3></th>
                                      <!-- <th>Client</th> -->
                                      
                                      <!-- <th>Price</th> -->
                                      <th><h3>Status</h3></th>
                                      
                                  </tr>
                              </thead>
                              <tbody>
                              <?php
                                
                                
                                for($i=0;$i<sizeof($flag);$i++)
                                {
                                    
                                    if($flag[$i]==0)
                                        $st="danger'>Wrong";
                                    else
                                        $st="success'>Passed";
                                    
                                    echo "<tr>".
                                  "<td>".($i+1)."</td>".
                                  "<td>TC".($i+1)."</td>".
                                  "<td>".$time[$i]."</td>".
                                  
                                  "<td><h4><span class='label label-".$st."</span></h4></td>".
                                  
                                  "</tr>";
                                }
                                ?>
                          </tbody>
                      </table>
                  </div>
                  <?php
    }
    else
    {
                  ?>
                  <div class="alert alert-danger">
                        <strong>Error : </strong> File couldnot be uploaded. Please try again.
                    </div>
                  
                  <?php
}}
                  ?>
                        
                        <!--timeline ends-->
                    </div>
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
</div>
</body>

</html>
