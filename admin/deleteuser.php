<?php 
include("../includes/dbConnect.php");


if(isset($_GET['del']))
{
	$delete_id = $_GET['del'];
	
	$delete_query = "delete from writer where user_id='$delete_id'";
	
	if(mysqli_query($conn, $delete_query))
	{
		echo "<script>alert('User Has Been Deleted')</script>";
		echo "<script>window.open('manageusers.php','_self')</script>";
	}
}
?>
