<?php require_once("./includes/db_connection.php"); ?>
<?php require_once("./includes/function.php"); ?>
<?php session_start();
$projectId="{$_SESSION['projectId']}";
$about_project = getproject_data_by_projectid($projectId);
if($about_project["reqmentors"]==null)
{
	$updatedlist=$_SESSION['user'];
}
else
{
$updatedlist=$about_project["reqmentors"].",".$_SESSION['user'];
}
$q="UPDATE projectinfo SET reqmentors='".$updatedlist."' WHERE projectId='".$projectId."'";
		$result = $connection->query($q);
		if(! $result )
			{
				die('Could not update data: ' . $mysqli->error);
			}
		else
			header('location:project.php?id='.$projectId);
?>