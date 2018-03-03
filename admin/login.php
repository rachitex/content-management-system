<?php 
	include_once('../includes/dbConnect.php');
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
<?php include_once('header.php'); ?>

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
</div>

<!-- Footer -->
<?php include_once('footer.php'); ?>
<?php
	if(isset($_POST['btnLogin'])){
		$error = "Sorry! Incorrect Username or Password!";
		$username = mysqli_real_escape_string($conn, $_POST['txtUsername']);
		$password = mysqli_real_escape_string($conn, $_POST['txtPassword']);

		$myQuery = "SELECT * FROM admin";
		$result = mysqli_query($conn, $myQuery);
		while($row = mysqli_fetch_row($result)){
			if($username == $row[1] && $password == $row[2]){
				$_SESSION['adminid'] = $row[0];
				header("location: manageusers.php");
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
