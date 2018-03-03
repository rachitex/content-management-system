<?php include_once('includes/dbConnect.php'); ?>
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

<div class = 'registration'>
	<h1>Registration</h1>
	<form method='post' action='<?php echo $_SERVER['PHP_SELF']; ?>' enctype="multipart/form-data">
		<table>
			
			<tr>
				<td>Name: </td>
				<td><input type='text' name='txtName' required /></td>
			</tr>
			<tr>
				<td>Email: </td>
				<td><input type='text' name='txtEmail' required /></td>
			</tr>
			<tr>
				<td>Username: </td>
				<td><input type='text' name='txtUsername' required /></td>
			</tr>
			<tr>
				<td>Password: </td>
				<td><input type='password' name='txtPassword' required /></td>
			</tr>
			<tr>
				<td><input type='submit' name='btnRegister' value='Register'></td>
				<td><input type='reset' value='Reset' /></td>
			</tr>
		</table>
	</form>
</div>

<!-- Footer -->
<?php include_once('includes/footer.php'); ?>

<?php
	if(isset($_POST['btnRegister'])){
		$name = ($_POST['txtName']);
		$email = ($_POST['txtEmail']);
		$username = ($_POST['txtUsername']);
		$password = ($_POST['txtPassword']);
		//$password1 = hash('sha512',$password);

		$insertQuery = "INSERT INTO writer(name, username, email_id, password) VALUES
			(
				'$name',
				'$username',
				'$email',
				'$password'		
			)";
		$a=mysqli_query($conn, $insertQuery);
		if (!$a) {
		        printf("Error: %s\n", mysqli_error($conn));
		        exit();
            	}
		header("location:login.php");
	} 
?>
