<?php
	include_once('../includes/dbConnect.php');	
	session_start();
	$user = $_SESSION['userid'];
	if($_SESSION['userid'] != null){
?>
<!DOCTYPE HTML>
<html>
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" href="../style.css"/>
  </head>
  <body class = 'background'>
<!-- Heading -->
<?php include_once('header.php'); ?>

<!-- Menu -->
<?php include_once('menu.php'); ?>
<?php
	$myQuery = "SELECT * FROM writer WHERE user_id = '$user'";
	$result = mysqli_query($conn, $myQuery);
	$row = mysqli_fetch_array($result, MYSQLI_BOTH);
	$name = $row[1];
	$username = $row[2];
	$emailid = $row[3]
?>
<?php 
	}else{
		header("location: ../login.php");
	} 
?>	
<div class='profile'>
	<table>
		<tr>
			<td>Name: </td>
			<td><?php echo $name; ?></td>
		</tr>
		<tr>
			<td>Username: </td>
			<td><?php echo $username; ?></td>
		</tr>
		<tr>
			<td>Email: </td>
			<td><?php echo $emailid; ?></td>
		</tr>
	</table>
</div>

<!-- Footer -->
<?php include_once('footer.php'); ?>
