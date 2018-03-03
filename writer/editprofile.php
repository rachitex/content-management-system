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
	
<div class='profile'>
	<form method='POST' action='<?php echo $_SERVER['PHP_SELF']; ?>' enctype="multipart/form-data">
		<table>
			<tr>
				<td>Name: </td>
				<td><input type='text' name='txtName' value='<?php echo $name; ?>' /></td>
			</tr>
			<tr>
				<td>Username: </td>
				<td><input type='text' name='txtUsername' value='<?php echo $username; ?>' /></td>
			</tr>
			<tr>
				<td>Email: </td>
				<td><input type='text' name='txtEmail' value='<?php echo $emailid; ?>' /></td>
			</tr>
			<tr>
				<td><input type='submit' value='Edit' name='btnEdit' /></td>
			</tr>
		</table>
	</form>
</div>


<!-- Footer -->
<?php include_once('footer.php'); ?>
<?php
	if(isset($_POST['btnEdit'])){
		$newname = ($_POST['txtName']);
		$newusername = ($_POST['txtUsername']);
		$newemail = ($_POST['txtEmail']);
		
		$updateQuery = "UPDATE writer SET name='".$newname."', username='".$newusername."', email_id='".$newemail."' WHERE user_id='$user'";
		$resultUpdate = mysqli_query($conn, $updateQuery);
		header("location: profile.php");
		echo "Update Successful"; 
	}
?>
<?php 
	}else{
		header("location: ../login.php");
	} 
?>

