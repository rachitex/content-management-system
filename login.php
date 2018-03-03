<?php 
	include_once('includes/dbConnect.php');
	session_start(); 
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
<?php include_once('includes/header.php'); ?>

<!-- Menu -->
<?php include_once('includes/menu.php'); ?>

<div class = 'login'>
		<h2>Login</h2>
		<form method='post' action='<?php echo $_SERVER['PHP_SELF']; ?>' enctype="multipart/form-data">
			<table>
				<tr>
					<td>Username: </td>
					<td><input type='text' name='txtUsername'></td>
				</tr>
				<tr>
					<td>Password: </td>
					<td><input type='password' name='txtPassword'></td>
				</tr>
				<tr>
					<td><input type='submit' name='btnLogin' value='Login'></td>
					<td><input type='reset' value='Reset' /></td>
				</tr>
			</table>
		</form>
		<h2>New User? <a href="registration.php">Register here!</a></h2>
</div>

<!-- Footer -->
<?php include_once('includes/footer.php'); ?>
<?php
	if(isset($_POST['btnLogin'])){
		$error = "Sorry! Incorrect Username or Password!";
		$username = mysqli_real_escape_string($conn, $_POST['txtUsername']);
		$password = mysqli_real_escape_string($conn, $_POST['txtPassword']);

		$myQuery = "SELECT * FROM writer";
		$result = mysqli_query($conn, $myQuery);
		while($row = mysqli_fetch_row($result)){
			if($username == $row[2] && $password == $row[4]){
				$_SESSION['userid'] = $row[0];
				header("location: writer/profile.php");
			}else{
				//echo $error;
			}
		}		
		//$count = mysqli_num_rows($result);
		/*if($count == 1) {
			 session_register("username");
			 $_SESSION['login_user'] = $username;
			 header("location: index.php");
		}else {
			 $error = "Your Login Name or Password is invalid";
		}*/
		
	}
?>
