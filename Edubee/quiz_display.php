<?php require_once("./includes/db_connection.php"); ?>
<?php require_once("./includes/function.php"); ?>
<?php require_once("./includes/layouts/header.php"); ?>
<?php session_start();
  if(!isset($_SESSION['status'])){
    $_SESSION['status'] = 0;
  }
                  
                      $quiz_name = $_GET['name'];
                      $courseId = $_GET['id'];
                      $quiz_data = getquizdata_by_name($quiz_name,$courseId);
                      $quiz_data_fill = getquizdata_fill_by_name($quiz_name,$courseId);
                      //$question_mcq = array();
                      $i=0;

                      foreach (explode('*1137*',$quiz_data['question']) as $value) {
                      	$question_mcq[$i] = $value;
                      	$i++;
                      }
                     
                      $i=0;

                      foreach (explode('*1137*',$quiz_data_fill['question']) as $value) {
                        $question_fill[$i] = $value;
                        $i++;
                      }
                     // $option_a = array();
                      $i=0;

                      foreach (explode('*1137*',$quiz_data['option_a']) as $value) {
                      	$option_a[$i] = $value;
                      	$i++;
                      }

                      //$option_b = array();
                      $i=0;

                      foreach (explode('*1137*',$quiz_data['option_b']) as $value) {
                      	$option_b[$i] = $value;
                      	$i++;
                      }

                      //$option_c = array();
                      $i=0;

                      foreach (explode('*1137*',$quiz_data['option_c']) as $value) {
                      	$option_c[$i] = $value;
                      	$i++;
                      }

                      //$option_d = array();
                      $i=0;

                      foreach (explode('*1137*',$quiz_data['option_d']) as $value) {
                      	$option_d[$i] = $value;
                      	$i++;
                      }

                      //$ans_mcq = array();
                      $i=0;

                      foreach (explode('*1137*',$quiz_data['ans']) as $value) {
                      	$ans_mcq[$i] = $value;
                      	$i++;
                      }
                      $i=0;

                      foreach (explode('*1137*',$quiz_data_fill['ans']) as $value) {
                        $ans_fill[$i] = $value;
                        $i++;
                      }



                      
                      if(isset($_POST['submit'])){
                        $final_ans = array();
                        $i=0;

                        for($i=0;$i<sizeof($question_mcq);$i++){
                          $final_ans[$i] = $_POST['q'.($i+1)];
                        }

                        $ans_status_1 = array();
                        $i=0;
                        foreach ($final_ans as $value) {
                          # code...
                          if($value == $ans_mcq[$i]){
                            $ans_status_1[$i] = 1;
                          }else{
                            $ans_status_1[$i] = 0;
                          }
                          $i++;
                        }

                        $i=0;
                        $j=sizeof($question_mcq)+1;
                        for($i=0;$i<sizeof($question_fill);$i++){
                          $final_ans_fill[$i] = $_POST['q'.$j];
                          $j++;
                        }

                        $i=0;
                        $ans_status_2 = array();
                        foreach ($final_ans_fill as $value) {
                          # code...
                          if($value == $ans_fill[$i]){
                            $ans_status_2[$i] = 1;
                          }else{
                            $ans_status_2[$i] = 0;
                          }
                          $i++;
                        }

                        $result="";
                        for($i=0;$i<sizeof($question_mcq);$i++){
                          $result .="{$ans_status_1[$i]}";
                        }
                        for($i=0;$i<sizeof($question_fill);$i++){
                          $result .= "{$ans_status_2[$i]}";
                        }
                        $_SESSION['result'] = $result;
                        redirect_to("quiz_result.php");
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
        <!-- End Our courses titile -->
        <div class="container-fluid">
                <div class="row">
                <div class="col-lg-12 col-md-12"> 
            <div class="title_area">
            <br>
            <br>
            <br>
            <br>
            
          
              <!-- <h2 class="title_two" style="background-color: ">Take  your  quiz</h2> -->
              <h2>Quiz:- <?php echo $quiz_name; ?> </h2>
              <span></span> 
		<a href="quizes_and_assignments.php" style="margin-left: -1100px"><strong>Go to list of quizes and assignments</strong></a>
            </div>
                  <div class="col-sm-9 col-md-6 col-lg-6" style="background-color:white;padding: 15px 50px 15px 50px">
                  <?php $url = "quiz_display.php?id={$courseId}&name={$quiz_name}";  ?>
                  <form action='<?php echo $url; ?>' method="POST" >
                    <div class="contact_form wow fadeInLeft">
                               
                                <?php 
                                $i=0;
                                $temp = 1;
                                if($quiz_data['question'] != NULL){
                                foreach ($question_mcq as $value) {
			//	echo sizeof($question_mcq);
                                 ?>
                                <h4>
                                	<?php echo "Q".($i+1).".".$value ?>
                                </h4>
                                <?php //$user_ans[$i] = "Q".($i+1); ?>
                                  <input type="radio" name='<?php echo "q".($i+1);//$user_ans[$i]; ?>' value="A"/><?php echo $option_a[$i]; ?></br>
                                  <input type="radio" name='<?php echo "q".($i+1);//$user_ans[$i]; ?>' value="B"/><?php echo $option_b[$i]; ?><br>
                                  <input type="radio" name='<?php echo "q".($i+1);//$user_ans[$i]; ?>' value="C"/> <?php echo $option_c[$i]; ?> <br>
                                  <input type="radio" name='<?php echo "q".($i+1);//$user_ans[$i]; ?>' value="D"/><?php echo $option_d[$i]; ?> 
                                  <hr>  
                              
                              <?php $i++;
                          }}else{
                            echo "No MCQ question in this quiz";
                          }
                               ?>
                               
           </div>
                                  <?php $j = $i+1;
                                  
                                    if($quiz_data_fill['question'] != NULL){
                                foreach ($question_fill as $value) {
                                  // echo sizeof($question_fill);
					?>
                                  <div>
                                  <h4><?php echo "Q".($j).".".$value ?></h4><br>
                                  <input type="text" name='<?php echo 'q'.$j; ?>' placeholder="your answer">
                                  <?php $j++;
                          }}else{
                            echo "No Fill in the blank type question in this quiz";
                          } ?>
                                  <br><br><br>
                                  <input type="submit" name="submit" value="Submit" class="btn btn-info"></submit>
                                </div>
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
