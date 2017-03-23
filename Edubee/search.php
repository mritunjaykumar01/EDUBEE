<?php require_once("./includes/db_connection.php"); ?>
<?php require_once("./includes/function.php"); ?>
<?php require_once("./includes/layouts/header.php"); ?>
<?php session_start();
  if(!isset($_SESSION['status'])){
    $_SESSION['status'] = 0;
  }

 ?>
 <?php 

 		$string_to_be_searched= $_POST['search'];
		  $query  = "SELECT * FROM courseinfo";
                      $all_courses = mysqli_query($connection, $query);
                      confirm_query($all_courses);
                       $total_courses = mysqli_num_rows($all_courses);

          $query1  = "SELECT * FROM projectinfo";
                      $all_projects = mysqli_query($connection, $query1);
                      confirm_query($all_projects);
                       $total_projects = mysqli_num_rows($all_projects);

            $list_of_courses = array();
          	while($name = mysqli_fetch_array($all_courses)){
       			$temp = array("{$name['name']}",0,"{$name['courseId']}");
       			array_push($list_of_courses,$temp);
          	}

          	$list_of_projects = array();
          	while($name = mysqli_fetch_array($all_projects)){
       			$temp = array("{$name['name']}",0,"{$name['projectId']}");
       			array_push($list_of_projects,$temp);
          	}           

      //     	echo "<pre>";
   			// print_r($list_of_courses);          
   			// echo "</pre>";
   			// echo "<pre>";
   			// print_r($list_of_projects);          
   			// echo "</pre>";
 ?>

 

// 
<?php 

function clean($string) {
   $string = str_replace(' ', '-', $string); 

   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

$words_to_be_removed= "a an the is was but as in on ";

// $list_of_courses = array
//   (
//   array("Introduction to c",0),
//   array("BMW",0),
//   array("Saab",0),
//   array("Land Rover",0)
//   );


$num_courses= count($list_of_courses);
$num_projects= count($list_of_projects);
$string_to_be_searched= clean($string_to_be_searched);
$search= explode("-", $string_to_be_searched);
$set = 1;
if($string_to_be_searched == ""){
	$set = 0;
}
if($set == 1){
foreach ($search as $word) {

	if(stristr($words_to_be_removed, $word) == FALSE)
	{
		foreach ($list_of_courses as &$course) {
			if(stristr($course[0], $word)!= FALSE)
			{
				$course[1]++;
				echo $word."asddhalfh;la";
				
			}
		
		}
		foreach ($list_of_projects as &$course1) {
			if(stristr($course1[0], $word)!= FALSE)
			{
				$course1[1]++;
				
			}
		
		}
	}
}







function bubbleSort(array $arr)
{
    $n = count($arr);    
    for ($i = 1; $i < $n; $i++) {
        $flag = false;
        for ($j = $n - 1; $j >= $i; $j--) {
            if($arr[$j-1][1] < $arr[$j][1]) {
                $tmp = $arr[$j - 1];
                $arr[$j - 1] = $arr[$j];
                $arr[$j] = $tmp;
                $flag = true;
            }
        }
        if (!$flag) {
            break;
        }
    }
     
    return $arr;
}

$list_of_courses= bubbleSort($list_of_courses);
$list_of_projects= bubbleSort($list_of_projects);

}

// foreach($list_of_courses as $course)
// {
// 	echo "$course[0] $course[1] </br>";
// }
// echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
// echo "</br> <h4>The courses found: </h4></br>";

$num_courses_found=0;
$num_projects_found=0;

$course_message = "";
$project_message = "";



// echo "</br> <h4>The projects found:</h4> </br>";

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
      
        <!-- Start Our courses content -->
                <?php 
                // echo "<pre>";
                // print_r($list_of_courses);
                // print_r($list_of_projects);
                // echo "</pre>"; ?>

<div class="container-fluid">
                <div class="row">
                <div class="col-lg-12 col-md-12"> 
            <div class="title_area">
         <br><br><br><br><br>
              <h2 class="title_two">Search Results</h2>
              <span></span> 
            </div>
                  <div class="col-sm-9 col-md-6 col-lg-6" style="background-color:white;padding: 15px 50px 15px 50px">
                    <div class="contact_form wow fadeInLeft">
              <form class="submitphoto_form" "<?=$_SERVER['PHP_SELF'];?>"  method="POST" enctype="multipart/form-data">
              <h2><strong>Courses</strong></h2>
              <div class="single_footer_widget">
                <ul class="footer_widget_nav">
                <hr>
                	<?php 
					for($i=0; $i< $num_courses; $i++)
					{
						if($list_of_courses[$i][1]==0)
						{
							break;
						}
						else
						{
							$id = $list_of_courses[$i][2];
							$course_name = $list_of_courses[$i][0];
							$link = "course.php?id=".$id;
							?> <li><a href='<?php echo $link; ?>'><?php echo "<b>{$course_name}</b><br><br>"; ?></a></li><?php
							$num_courses_found++;
						}
					}
                	if($num_courses_found == 0){
                		echo "<b> No Course Found</b>";
                	}

                	 ?>
                </ul>
                <hr>
              </div>
              </form>   
           </div>
                  </div>
                  <div class="col-sm-9 col-md-6 col-lg-6" style="background-color:white; padding: 15px 50px 15px 50px">
                  
                <h2>Projects</h2>
                	 <div class="single_footer_widget">
                <ul class="footer_widget_nav">
                <hr>
                <?php 

				for($i=0; $i< $num_projects; $i++)
					{
						if($list_of_projects[$i][1]==0)
						{
							break;
						}
						else
						{
							$id = $list_of_projects[$i][2];
							$project_name = $list_of_projects[$i][0];
							$link = "project.php?id=".$id;
							?> <li><a href='<?php echo $link; ?>'><?php echo "<b>{$project_name}</b><br><br>"; ?></a></li><?php
							$num_projects_found++;
						}
					}
                	if($num_projects_found == 0){
                		echo "<b> No Projects Found</b>";
                	}


                 ?>	
         
                </ul>
                <hr>
              </div>
                  </div>
                </div>
        </div>

      </div>


                <!-- End Our courses content -->

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