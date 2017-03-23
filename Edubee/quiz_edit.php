<?php require_once("./includes/db_connection.php"); ?>
<?php require_once("./includes/function.php"); ?>
<?php require_once("./includes/layouts/header.php"); ?>
<?php session_start();
  if(!isset($_SESSION['status'])){
    $_SESSION['status'] = 0;
  }

  $courseId = $_SESSION['courseId'];
  if(!empty($_POST['submit_name'])){
    $quiz_name = mysqli_real_escape_string($connection,$_POST['quiz_name']);
    $query = "INSERT INTO quiz_mcq (courseId,quiz_name)
              VALUES ('{$courseId}','{$quiz_name}')";
        $result=mysqli_query($connection,$query);
    $query4 = "INSERT INTO quiz_fill (courseId,quiz_name)
              VALUES ('{$courseId}','{$quiz_name}')";
        $result4=mysqli_query($connection,$query4);    
  }

  $query1 = "SELECT quiz_name from quiz_mcq where courseId='{$courseId}'";
  $quiz_names = mysqli_query($connection,$query1);
$quiz_names_delete = mysqli_query($connection,$query1);
  $query10 = "SELECT quiz_name from quiz_fill where courseId='{$courseId}'";
  $quiz_names_fill = mysqli_query($connection,$query10);


  if(!empty($_POST['submit_question'])){
    $edit_quiz_name = mysqli_real_escape_string($connection,$_POST['edit_quiz_name']);
    $question_mcq = mysqli_real_escape_string($connection,$_POST['question_mcq']);
    $ans_mcq = mysqli_real_escape_string($connection,$_POST['correct_option']);
    $option_a = mysqli_real_escape_string($connection,$_POST['option_a']);
    $option_b = mysqli_real_escape_string($connection,$_POST['option_b']);
    $option_c = mysqli_real_escape_string($connection,$_POST['option_c']);
    $option_d = mysqli_real_escape_string($connection,$_POST['option_d']);

    
    $quiz_data = getquizdata_by_name($edit_quiz_name,$courseId);
    $current_question = $quiz_data['question'];
    if($current_question == ""){
      $current_question = $question_mcq;
    }else{
      $current_question .= "*1137*".$question_mcq;
    }

    $current_option_a = $quiz_data['option_a'];
    if($current_option_a == ""){
      $current_option_a = $option_a;
    }else{
      $current_option_a .= "*1137*".$option_a;
    }

    $current_option_b = $quiz_data['option_b'];
    if($current_option_b == ""){
      $current_option_b = $option_b;
    }else{
      $current_option_b .= "*1137*".$option_b;
    }

    $current_option_c = $quiz_data['option_c'];
    if($current_option_c == ""){
      $current_option_c = $option_c;
    }else{
      $current_option_c .= "*1137*".$option_c;
    }

    $current_option_d = $quiz_data['option_a'];
    if($current_option_d == ""){
      $current_option_d = $option_d;
    }else{
      $current_option_d .= "*1137*".$option_d;
    }

    $current_ans = $quiz_data['ans'];
    if($current_ans == ""){
      $current_ans = $ans_mcq;
    }else{
      $current_ans .= "*1137*".$ans_mcq;
    }    

    $query2 = "UPDATE quiz_mcq SET question='{$current_question}',option_a='{$current_option_a}',option_b='{$current_option_b}',option_c='{$current_option_c}',option_d='{$current_option_d}',ans='{$current_ans}' where (quiz_name='{$edit_quiz_name}' and courseId='{$courseId}')";



    $result1 = mysqli_query($connection,$query2);

  }
   

   if(!empty($_POST['submit_question_fill'])){
    $edit_quiz_name_fill = mysqli_real_escape_string($connection,$_POST['edit_quiz_fill_name']);
    $question_fill = mysqli_real_escape_string($connection,$_POST['question_fill']);
    $ans_fill = mysqli_real_escape_string($connection,$_POST['ans_fill']);
    
    $quiz_data_fill = getquizdata_fill_by_name($edit_quiz_name_fill,$courseId);
    $current_question_fill = $quiz_data_fill['question'];
    if($current_question_fill == ""){
      $current_question_fill = $question_fill;
    }else{
      $current_question_fill .= "*1137*".$question_fill;
    }

    $current_ans_fill = $quiz_data_fill['ans'];
    if($current_ans_fill == ""){
      $current_ans_fill = $ans_fill;
    }else{
      $current_ans_fill .= "*1137*".$ans_fill;
    }    

    $query3 = "UPDATE quiz_fill SET question='{$current_question_fill}',ans='{$current_ans_fill}' where (quiz_name='{$edit_quiz_name_fill}' and courseId='{$courseId}')";

    $result3 = mysqli_query($connection,$query3);

  }
   


  if(!empty($_POST['delete_quiz'])){
    $delete_quiz_name = mysqli_real_escape_string($connection,$_POST['delete_quiz_name']);    
  
    $query6 = "DELETE from quiz_mcq where (quiz_name='{$delete_quiz_name}' and courseId='{$courseId}')";

    $result6 = mysqli_query($connection,$query6);

    $query7 = "DELETE from quiz_fill where (quiz_name='{$delete_quiz_name}' and courseId='{$courseId}')";

    $result7 = mysqli_query($connection,$query7);


  }
                      
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <title>Edubee - Course Catalog</title>
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
	<div style="font-family:candara;">
    <!--=========== BEGIN HEADER SECTION ================-->
    <?php $path = "course.php"; ?>
    <?php site_header($path,$_SESSION['status']); ?>
    <!--=========== END HEADER SECTION ================--> 
</div>	
    
<!--=========== BEGIN OUR COURSES SECTION ================-->
    <section id="ourCourses">
      <div class="container">
       <!-- Our courses titile -->
        <!-- <div class="row">
          <div class="col-lg-12 col-md-12"> 
            <div class="title_area">
            <br>
            <br>
            <br>
            <br>
              <h2 class="title_two">Quiz Edit Section</h2>
              <span></span> 
            </div>
          </div> -->
        </div>
        <!-- End Our courses titile -->
        <div class="container-fluid">
                <div class="row">
                <div class="col-lg-12 col-md-12"> 
            <div class="title_area">
            <br>
            <br>
            <br>
            <br>
              <h2 class="title_two">Quiz Edit Section</h2>
              <span></span>
		</br>
		 <?php $link = "course.php?id=".$_SESSION['courseId']; ?>
                <a href='<?php echo $link; ?>' style="margin-left: -1100px"><strong>Go to course</strong></a>

 
            </div>
                  <!-- <div class="col-sm-3 col-md-6 col-lg-2" style="background-color:white;">
                  </div> -->
                  <div class="col-sm-9 col-md-6 col-lg-6" style="background-color:white;padding: 15px 50px 15px 50px">
                    <div class="contact_form wow fadeInLeft">
              <form class="submitphoto_form" action='<?php echo $_SERVER['PHP_SELF']; ?>'  method="POST" enctype="multipart/form-data">
              <h3><strong>Add Quiz : </strong></h3>
              <h4>Name</h4>
                <input type="text" name="quiz_name" class="wp-form-control wpcf7-text" name="projectname" placeholder="Give a name to your  quiz" style="border-radius:5px;border:solid #3FADC9;  border-width:1px;padding:5px;"required>
                <input type="submit" name="submit_name" value="Add quiz" class="btn btn-info"></submit>
                <hr>
              </form>
              <form action='<?php echo $_SERVER['PHP_SELF']; ?>' method="POST">
                 <h3>Add question: Single correct type</h3>
                                        <h4>Quiz name: </h4>
                            <select name="edit_quiz_name">
                            <?php 
    if(mysqli_num_rows($quiz_names)>0){
      while($row = mysqli_fetch_array($quiz_names)){
     ?>
                             <option value='<?php echo $row['quiz_name']; ?>'><?php echo $row['quiz_name']; ?></option>
      <?php }}
      else{ ?>
        <option value="q1"><?php echo "NO QUIZ IN database"; ?></option>
       <?php } ?>
                          </select>
                                           <h4>Question :</h4> 
                                            <textarea type="text" class="wp-form-control wpcf7-textarea" name="question_mcq" cols="30" rows="2" placeholder="enter the question" style="border-radius:5px;border:solid #3FADC9; border-width:1px;padding:5px;"required ></textarea>
                                            <h4>Options: </h4>
                                            Option1: <input type="text" name="option_a"><br>
                                            Option2: <input type="text" name="option_b"><br>
                                            Option3: <input type="text" name="option_c"><br>
                                            Option4: <input type="text" name="option_d">
                                            <h4>Correct option:  </h4>
                                            <select name="correct option">
                                                <option value="A">Option A</option>
                                                <option value="B">Option B</option>
                                                <option value="C">Option C</option>
                                                <option value="D">Option D</option>
                                            </select>
                                            <input type="submit" name="submit_question" value="Add question" class="btn btn-info" style="float: right;"></submit>
                                            <br><br><br><br><br>
                                            <hr>
              </form>
              
           </div>
                  </div>
                  <div class="col-sm-9 col-md-6 col-lg-6" style="background-color:white; padding: 15px 50px 15px 50px">
                  <form class="submitphoto_form"  action='<?php echo $_SERVER['PHP_SELF']; ?>' method="POST" enctype="multipart/form-data">
                <h3>Delete quiz : </h3>

                            <select name="delete_quiz_name">
                             <?php 
    if(mysqli_num_rows($quiz_names_delete)>0){
      while($row = mysqli_fetch_array($quiz_names_delete)){
     ?>
                             <option value='<?php echo $row['quiz_name']; ?>'><?php echo $row['quiz_name']; ?></option>
      <?php }}
      else{ ?>
        <option value="q1"><?php echo "NO QUIZ IN database"; ?></option>
       <?php } ?>
                            </select><br><br>
                             <input type="submit" name="delete_quiz" value="Delete" class="btn btn-info"></submit>
                             <br>
                             <br>
                             <br>
                             <hr>
                <!-- <textarea type="text" class="wp-form-control wpcf7-textarea" name="description" cols="30" rows="5" placeholder="Description" style="border-radius:5px;border:solid #3FADC9; border-width:1px;padding:5px;"required ></textarea> -->
                </center>
                <!--<a href="editor.html" class="wpcf7-submit" role="button">Create</a>-->
              </form>
                  <form action='<?php echo $_SERVER['PHP_SELF']; ?>' method="POST">
                                      <h3>Add question: Fill in the blanks type</h3>
                                        <h4>Quiz name: </h4>
                                        <select name="edit_quiz_fill_name">
                                          <?php 
    if(mysqli_num_rows($quiz_names_fill)>0){
      while($row = mysqli_fetch_array($quiz_names_fill)){
     ?>
                             <option value='<?php echo $row['quiz_name']; ?>'><?php echo $row['quiz_name']; ?></option>
      <?php }}
      else{ ?>
        <option value="q1"><?php echo "NO QUIZ IN database"; ?></option>
       <?php } ?>

                                      </select>
                                        <h4>Question:</h4> 
                                        <textarea type="text" class="wp-form-control wpcf7-textarea" name="question_fill" cols="30" rows="2" placeholder="enter the question" style="border-radius:5px;border:solid #3FADC9; border-width:1px;padding:5px;"required ></textarea>
                                        <br>
                                        ( eg. Neil Armstrong is the ........... person to go to the moon.)
                                        <h4>Answer: (case-insensitive)</h4>
                                        <input type="text" name="ans_fill" >
                                        <input type="submit" name="submit_question_fill" value="Add question" class="btn btn-info" style="float: right;"></submit>
                                        <br>
                                        <hr>
              </form>
                  </div>
                </div>
        </div>

      </div>
    </section>
    <!--=========== END OUR COURSES SECTION ================--> 
    
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
