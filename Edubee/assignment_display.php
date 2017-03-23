<?php require_once("./includes/db_connection.php"); ?>
<?php require_once("./includes/function.php"); ?>
<?php require_once("./includes/layouts/header.php"); ?>
<?php session_start();
  if(!isset($_SESSION['status'])){
    $_SESSION['status'] = 0;
  }
                  
                  $courseId = $_GET['id'];
                  $assignment_name=$_GET['name'];
                  $_SESSION['assignment_name'] = $assignment_name; 

                        $query = "SELECT * from assignment where courseId='{$courseId}' and assignName='{$assignment_name}' limit 1";
                        $data = mysqli_query($connection, $query);
                        confirm_query($data);
                        $row = mysqli_fetch_array($data);
 ?>
 <!DOCTYPE html>
 <html>
 <head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <title>Edubee -List-of-quizes-and-assignments</title>
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
      hr{
        height: 12px;
          border: 0;
          box-shadow: inset 0 12px 12px -12px rgba(0, 0, 0, 0.5);
      }
    </style>
    </head>
 <body style="font-family:candara;">
 <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"></a>
    <!-- END SCROLL TOP BUTTON -->
  <!--=========== BEGIN HEADER SECTION ================-->
    <?php $path = "course.php"; ?>
    <?php site_header($path,$_SESSION['status']); ?>
    <!--=========== END HEADER SECTION ================--> 
</div>	

<div class="container-fluid">
                <div class="row">
                <div class="col-lg-12 col-md-12"> 
            <div class="title_area">
         <br><br><br><br><br>
              <h2 class="title_two">Assignment : &nbsp; <?php echo $assignment_name; ?> </h2>
              <span></span> 
            </div>
            <div class="col-sm-9 col-md-6 col-lg-2" style="background-color:white;padding: 15px 50px 15px 50px">
            </div>
                  <div class="col-sm-9 col-md-6 col-lg-8" style="background-color:white;padding: 15px 50px 15px 50px">
                    <div class="contact_form wow fadeInLeft">
              
              <h2><strong>Question</strong></h2>
              <p> 
              <?php 

                  $question_link = "./Assignments/".$courseId."/".$assignment_name."/".$row['question'];
                  $myfile = fopen("$question_link", 'r') or die("Unable to open file!");
                            // Output one line until end-of-file
                             $question = "";
                            while(!feof($myfile)) {
                              $question .= fgets($myfile) . "<br>";
                            }
                            fclose($myfile);
                            echo $question;
                 ?>

              </p>
             <hr>
              <h2><strong>Sample Inputs</strong></h2>
              <div id="inputs" style="background-color:#cfcccc;padding:3px;border-radius:3px;">
                        <?php 
                            $input_link = "./Assignments/".$courseId."/".$assignment_name."/".$row['SIFile'];
                             $myfile = fopen("$input_link", 'r') or die("Unable to open file!");
                            // Output one line until end-of-file
                             $input = "";
                            while(!feof($myfile)) {
                                $sample_input = fgets($myfile);
                                if($sample_input == "next\n")
                                    break;
                                else

                                    $input .= $sample_input . "<br>";
                            }
                            fclose($myfile);



                        echo $input; ?>
                        </div>
             <hr>
              <h2><strong>Sample output</strong></h2>

              <div id="inputs" style="background-color:#cfcccc;padding:3px;border-radius:3px;">
                        <?php                       

                            
                            $output_link = "./Assignments/".$courseId."/".$assignment_name."/".$row['SOFile'];
  
                             $myfile = fopen("$output_link", 'r') or die("Unable to open file!");
                            // Output one line until end-of-file
                             $output = "";
                            while(!feof($myfile)) {
                                $sample_output = fgets($myfile);
                                if($sample_output == "next\n")
                                    break;
                                else
                                    $output .=  $sample_output. "<br>";
                            }
                            fclose($myfile);
                            echo $output;
                            ?>
                        </div>

             <hr>
               <h4>Select Language  &nbsp;&nbsp;&nbsp;&nbsp;
		
                              <select id="lang" required>
                            <option value="c" >C</option>
                            <option value="cpp" >C++</option>
                            <option value="java" >Java</option>
                        </select></h4>
                          <br><br>

                        <form action="upload1.php" method="post" enctype="multipart/form-data">
                        <h4>Select file containing solution : &nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="file" name="fileToUpload" id="fileToUpload" required><br>
                        <!-- <input type="button" onclick="extCheck();" value="Submit Solution"/>
                        <input type="submit" id="submit1" style="display:none;"> -->
                        <input type="submit" name="submit_file" value="submit the  file" class="btn btn-info" style="float: left;"></submit>
                        </h4>
                        <br><hr>
              </form> 
           </div>
                  </div>
                  <div class="col-sm-9 col-md-6 col-lg-2" style="background-color:white;padding: 15px 50px 15px 50px">
            </div>
                </div>
        </div>

      </div>
    </section>

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
