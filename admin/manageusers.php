<?php 
	include_once('../includes/dbConnect.php');
	session_start(); 
	$adminid = $_SESSION['adminid'];
	if($_SESSION['adminid'] != null){
?>
<!DOCTYPE HTML>
<html>
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" href="style.css"/>
  </head>
  <body class = 'background'>
<!-- Heading -->
<?php include_once('header.php'); ?>

<!-- Menu -->
<?php include_once('menu.php'); ?>
	
<div style="background-color: white;">
	<table border=1>
		<tr>
			<th>User ID</th>		
			<th>Name</th>
			<th>Username</th>
			<th>Delete</th>
		</tr>
	<?php
		$query = "select * from writer order by 1 DESC";
		$run = mysqli_query($conn, $query);
		while($row = mysqli_fetch_array($run)){
			$user_id = $row['user_id'];
			$name = $row['name'];
			$username = $row['username'];
	?>	
		<tr>
			<td><?php echo $user_id; ?></td>
			<td><?php echo $name; ?></td>
			<td><?php echo $username; ?></td>
			<td><a href="deleteuser.php?del=<?php echo $user_id; ?>">Delete</a></td>
		</tr>
<?php } ?>
	</table>
</div>

<!-- Footer -->
<?php include_once('footer.php'); ?>

<?php 
	}else{
		header("location: login.php");
	} 
?>
