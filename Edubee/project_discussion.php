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
</style>

</head>

<body style="font-family:candara;">
        
    <!--=========== BEGIN HEADER SECTION ================-->
	<div style="font-family:candara;">
    <?php $path = ""; ?>
    <?php 
    $status = $_SESSION['status'];
    site_header($path,$status); ?>
	</div>
    <!--=========== END HEADER SECTION ================--> 
<br><br>
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
                <li style="margin-top:-37px;" >
                    <a href='<?php echo "project.php?id={$_SESSION['projectId']}" ?>' >Project Info</a>
                </li>
                <li>
                    <a href="project_timeline.php">Project Timeline</a>
                </li>
                <li style="background-color:#3FADC9;>
                    <a href="project_discussion.php><span style="color:#fff;">Discussion</span></a>
                </li>
				<?php if($about_project['owner'] == $_SESSION['user']) { ?>
                <li>
                    <a href="project_edit.php">Edit Content</a>
                </li><?php } ?>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
					<a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Navigation</a> <br><br>
					<div class="title_area">
              <h2 class="title_two">Discussion Board</h2>
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
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
        <br><br><br><br>
         
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
<script id="dsq-count-scr" src="//edubee-iitp.disqus.com/count.js" async></script>
</body>

</html>
