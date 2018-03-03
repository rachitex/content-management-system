<?php 
include("../includes/dbConnect.php");


if(isset($_GET['del']))
{
	$delete_id = $_GET['del'];
	
	$delete_query = "delete from article where article_id='$delete_id'";
	
	if(mysqli_query($conn, $delete_query))
	{
		echo "<script>alert('Article Has Been Deleted')</script>";
		echo "<script>window.open('managearticles.php','_self')</script>";
	}
}
?>
