<?php require_once("./includes/db_connection.php"); ?>
<?php require_once("./includes/function.php"); ?>
<?php require_once("./includes/layouts/header.php"); ?>
<?php
session_start();
if($_SESSION['status'] == 0){
    redirect_to("login.php");
  }
$proId="{$_SESSION['projectId']}";
if (($_SERVER['REQUEST_METHOD'] == 'POST')&& isset($_POST['submit']))
{
	if (isset($_POST['proName'])&& $_POST['submit']=="Change")
	{
		$q="UPDATE projectinfo SET name='".$_POST['proName']."' WHERE projectId='".$proId."'";
		$result = $connection->query($q);
		if(! $result )
			{
				die('Could not update data: ' . $mysqli->error);
			}
		else
			header('location:project.php?id='.$proId);
		
	}
	else if (isset($_POST['desc'])&& $_POST['submit']=="Change")
	{
		$q="UPDATE projectinfo SET description='".$_POST['desc']."' WHERE projectId='".$proId."'";
		$result = $connection->query($q);
		if(! $result )
			{
				die('Could not update data: ' . $mysqli->error);
			}
		else
			header('location:project.php?id='.$proId);
		
	}
	else if (isset($_POST['newmentor'])&& $_POST['submit']=="Add+")
	{
		
				
				$sql = "SELECT * FROM projectinfo WHERE projectId='".$proId."' LIMIT 1";
				$result = $connection->query($sql);
				$row = $result->fetch_assoc();
				if($row==null)
					die("no result");
				$x=$row["mentors"];
				$mentors=explode(",",$row["mentors"]);
				
				$sql = "SELECT * FROM signup WHERE username='".$_POST['newmentor']."' LIMIT 1";
				$result = $connection->query($sql);
				$row = $result->fetch_assoc();
				if($row==null){
				header('location:project_edit.php?q=210');die("");}
				
				else if(in_array($row["full_name"],$mentors)){
				header('location:project_edit.php?q=211');die("");}
				else{}
				
				$updatedlist=$x.",".$row["full_name"];

		$q="UPDATE projectinfo SET mentors='".$updatedlist."' WHERE projectId='".$proId."'";
		$result = $connection->query($q);
		if(! $result )
			{
				die('Could not update data: ' . $mysqli->error);
			}
		else{
			header('location:project.php?id='.$proId);
			die("");
		}
	}
	else if (isset($_POST['section1'])&& $_POST['submit']=="Remove Mentors")
	{
		
				
				$sql = "SELECT * FROM projectinfo WHERE projectId='".$proId."' LIMIT 1";
				$result = $connection->query($sql);
				$row = $result->fetch_assoc();
				if($row==null)
					die("no result");
				$x=$row["mentors"];
				$mentors=explode(",",$row["mentors"]);
				foreach ($_POST['section1'] as $selectedOption){
   					$key=array_search($selectedOption,$mentors);
					if($key>=0)
					{
						$mentors[$key]=null;
					}
					
   				}	
				foreach($mentors as $mentor)
				{
					if($mentor==null)
					{}
					else
					{
						$updatedlist.=$mentor.",";
					}
				}
				$updatedlist=substr($updatedlist,0,(strlen($updatedlist)-1));

		$q="UPDATE projectinfo SET mentors='".$updatedlist."' WHERE projectId='".$proId."'";
		$result = $connection->query($q);
		if(! $result )
			{
				die('Could not update data: ' . $mysqli->error);
			}
		else{
			header('location:project.php?id='.$proId);
			die("");
		}
	}
	else if (isset($_POST['newcontrib'])&& $_POST['submit']=="Add+")
	{
		
				
				$sql = "SELECT * FROM projectinfo WHERE projectId='".$proId."' LIMIT 1";
				$result = $connection->query($sql);
				$row = $result->fetch_assoc();
				if($row==null)
					die("no result");
				$x=$row["contributors"];
				$contributors=explode(",",$row["contributors"]);
				
				$sql = "SELECT * FROM signup WHERE username='".$_POST['newcontrib']."' LIMIT 1";
				$result = $connection->query($sql);
				$row = $result->fetch_assoc();
				if($row==null){
				header('location:project_edit.php?q=310');die("");}
				
				else if(in_array($row["full_name"],$contributors)){
				header('location:project_edit.php?q=311');die("");}
				else{}
				
				$updatedlist=$x.",".$row["full_name"];

		$q="UPDATE projectinfo SET contributors='".$updatedlist."' WHERE projectId='".$proId."'";
		$result = $connection->query($q);
		if(! $result )
			{
				die('Could not update data: ' . $mysqli->error);
			}
		else{
			header('location:project.php?id='.$proId);
			die("");
		}
	}
	else if (isset($_POST['section2'])&& $_POST['submit']=="Remove Contributors")
	{
		
				
				$sql = "SELECT * FROM projectinfo WHERE projectId='".$proId."' LIMIT 1";
				$result = $connection->query($sql);
				$row = $result->fetch_assoc();
				if($row==null)
					die("no result");
				$x=$row["contributors"];
				$contributors=explode(",",$row["contributors"]);
				foreach ($_POST['section2'] as $selectedOption){
   					$key=array_search($selectedOption,$contributors);
					if($key>=0)
					{
						$contributors[$key]=null;
					}
					else{}
					
   				}	
				foreach($contributors as $contributor)
				{
					if($contributor==null)
					{}
					else
					{
						$updatedlist.=$contributor.",";
					}
				}
				$updatedlist=substr($updatedlist,0,(strlen($updatedlist)-1));

		$q="UPDATE projectinfo SET contributors='".$updatedlist."' WHERE projectId='".$proId."'";
		$result = $connection->query($q);
		if(! $result )
			{
				die('Could not update data: ' . $mysqli->error);
			}
		else{
			header('location:project.php?id='.$proId);
			die("");
			
		}
	}
	else if (isset($_POST['newtask'])&&isset($_POST['start'])&&isset($_POST['end'])&& $_POST['submit']=="Add+")
	{
		
				
				$sql = "SELECT * FROM projectinfo WHERE projectId='".$proId."' LIMIT 1";
				$result = $connection->query($sql);
				$row = $result->fetch_assoc();
				if($row==null)
					die("no result");
				$x=$row["milestones"];
			
				$milestones=explode(",",$row["milestones"]);
				if(in_array($_POST['newtask'],$milestones)){
				header('location:project_edit.php?q=411');die("");}
				else{}
				
				$updatedtasklist=$x.",".$_POST['newtask'];
				$updatedstartlist=$row["startDates"].",".$_POST['start'];
				$updatedendlist=$row["endDates"].",".$_POST['end'];
		$q="UPDATE projectinfo SET milestones='".$updatedtasklist."' , startDates='".$updatedstartlist."' , endDates='".$updatedendlist."'  WHERE projectId='".$proId."'";
		$result = $connection->query($q);
		if(! $result )
			{
				die('Could not update data: ' . $mysqli->error);
			}
		else{
			header('location:project_timeline.php');
			die("");
		}
	}
	else if (isset($_POST['section3'])&& $_POST['submit']=="Remove Milestones")
	{
		
				
				$sql = "SELECT * FROM projectinfo WHERE projectId='".$proId."' LIMIT 1";
				$result = $connection->query($sql);
				$row = $result->fetch_assoc();
				if($row==null)
					die("no result");
				$x=$row["milestones"];
				$milestones=explode(",",$row["milestones"]);
				$starts=explode(",",$row["startDates"]);
				$ends=explode(",",$row["endDates"]);
				foreach ($_POST['section3'] as $selectedOption){
   					$key=array_search($selectedOption,$milestones);
					if($key>=0)
					{
						$milestones[$key]=null;
						$starts[$key]=null;
						$ends[$key]=null;
					}
					else{}
					
   				}	
				foreach($milestones as $milestone)
				{
					if($milestone==null)
					{}
					else
					{
						$updatedtasklist.=$milestone.",";
					}
				}
				foreach($starts as $startt)
				{
					if($startt==null)
					{}
					else
					{
						$updatedstartlist.=$startt.",";
					}
				}
				foreach($ends as $endd)
				{
					if($endd==null)
					{}
					else
					{
						$updatedendlist.=$endd.",";
					}
				}
				$updatedtasklist=substr($updatedtasklist,0,(strlen($updatedtasklist)-1));
				$updatedstartlist=substr($updatedstartlist,0,(strlen($updatedstartlist)-1));
				$updatedendlist=substr($updatedendlist,0,(strlen($updatedendlist)-1));

		$q="UPDATE projectinfo SET milestones='".$updatedtasklist."' , startDates='".$updatedstartlist."' , endDates='".$updatedendlist."'  WHERE projectId='".$proId."'";
		$result = $connection->query($q);
		if(! $result )
			{
				die('Could not update data: ' . $mysqli->error);
			}
		else{
			header('location:project_timeline.php');
			die("");
			
		}
	}
	else
		header('location:project_edit.php?rdr');
			die("");
	
	
	
}


?>