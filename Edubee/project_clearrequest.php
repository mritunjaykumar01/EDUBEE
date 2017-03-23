<?php require_once("./includes/db_connection.php"); ?>
<?php require_once("./includes/function.php"); ?>



<?php
session_start();
if($_SESSION['status'] == 0){
    redirect_to("login.php");
  }
$proId=$_SESSION['projectId'];
echo $proId;
if (isset($_POST['section1'])&& $_POST['submit']=="Add as Mentor(s)")
	{
		
				
				$sql = "SELECT * FROM projectinfo WHERE projectId='".$proId."' LIMIT 1";
				$result = $connection->query($sql);
				$row = $result->fetch_assoc();
				if($row==null)
					die("no result");
				$x=$row["reqmentors"];
				$y=$row["mentors"];
				echo $y;
				$reqmentors=explode(",",$row["reqmentors"]);
				foreach ($_POST['section1'] as $selectedOption){
   					$key=array_search($selectedOption,$reqmentors);
					if($key>=0)
					{
						$reqmentors[$key]=null;
					}
					$y=$y.",".$selectedOption;
					
   				}	
				foreach($reqmentors as $reqmentor)
				{
					if($reqmentor==null)
					{}
					else
					{
						$requpdatedlist.=$reqmentor.",";
					}
				}
				$requpdatedlist=substr($requpdatedlist,0,(strlen($requpdatedlist)-1));
				

		$q="UPDATE projectinfo SET reqmentors='".$requpdatedlist."',mentors='".$y."' WHERE projectId='".$proId."'";
		$result = $connection->query($q);
		if(! $result )
			{
				die('Could not update data: ' . $mysqli->error);
			}
		else{
			header('location:project_requests.php');
			die("");
		}
	}
	else if (isset($_POST['section2'])&& $_POST['submit']=="Add as Contributor(s)")
	{
		
				
				$sql = "SELECT * FROM projectinfo WHERE projectId='".$proId."' LIMIT 1";
				$result = $connection->query($sql);
				$row = $result->fetch_assoc();
				if($row==null)
					die("no result");
				$x=$row["reqcontributors"];
				$y=$row["contributors"];
				echo $y;
				$reqcontributors=explode(",",$row["reqcontributors"]);
				foreach ($_POST['section2'] as $selectedOption){
   					$key=array_search($selectedOption,$reqcontributors);
					if($key>=0)
					{
						$reqcontributors[$key]=null;
					}
					$y=$y.",".$selectedOption;
					
   				}	
				foreach($reqcontributors as $reqcontributor)
				{
					if($reqcontributor==null)
					{}
					else
					{
						$requpdatedlist.=$reqcontributor.",";
					}
				}
				$requpdatedlist=substr($requpdatedlist,0,(strlen($requpdatedlist)-1));
				

		$q="UPDATE projectinfo SET reqcontributors='".$requpdatedlist."',contributors='".$y."' WHERE projectId='".$proId."'";
		$result = $connection->query($q);
		if(! $result )
			{
				die('Could not update data: ' . $mysqli->error);
			}
		else{
			header('location:project_requests.php');
			die("");
		}
	}

?>