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


<div>
	<h1>Create Article</h1>
	<form method='POST' action='<?php echo $_SERVER['PHP_SELF']; ?>' enctype="multipart/form-data">
		<table>
			<tr>
				<td>Title</td>
				<td><textarea rows="2" name="txtTitle"></textarea></td>
			</tr>
			<tr>
				<td>Summary</td>
				<td><textarea rows="3" name="txtSummary"></textarea></td>
			</tr>
			<tr>
				<td>Content</td>
				<td><textarea rows="9" name="txtContent"></textarea></td>
			</tr>
			<tr>
				<td>Keyword</td>
				<td><input type='text' name='txtKeyword' /></td>
			</tr>
			<tr>
				<td><input type='submit' name='btnCreate' value="Submit for Review" /></td>
				<td><input type='reset' name='Reset' /></td>
			</tr>
		</table>
	</form>
<?php
	if(isset($_POST['btnCreate'])){
		$title = ($_POST['txtTitle']);
		$summary = ($_POST['txtSummary']);
		$content = ($_POST['txtContent']);
		$keyword = ($_POST['txtKeyword']);

		$myQuery = "INSERT INTO article(title, summary, content, keyword, u_id) values
		(
			'$title', '$summary', '$content', '$keyword', '$user'
		)";
		$result = mysqli_query($conn, $myQuery);
		echo "Successful";
	}
?>
</div>

<!-- Footer -->
<?php include_once('footer.php'); ?>
	
<?php 
	}else{
		header("location: ../login.php");
	} 
?>
