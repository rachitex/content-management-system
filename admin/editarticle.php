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
<?php
	if(isset($_GET['edit'])){
				$edit_id = $_GET['edit'];
				$edit_query = "select * from article where article_id = '$edit_id'";
				$run_edit = mysqli_query($conn, $edit_query);
				while ($edit_row = mysqli_fetch_array($run_edit)){
					$article_id = $edit_row['article_id'];
					$title = $edit_row['title'];
					$summary = $edit_row['summary'];
					$content = $edit_row['content'];
					$keyword = $edit_row['keyword'];
?>
<div>
	<h1>Edit Article</h1>
	<form method='POST' action='editarticle.php?edit_form=<?php echo $article_id; ?>' enctype="multipart/form-data">
		<table>
			<tr>
				<td>Title</td>
				<td><textarea rows="2" name="txtTitle"><?php echo $title; ?></textarea></td>
			</tr>
			<tr>
				<td>Summary</td>
				<td><textarea rows="3" name="txtSummary"><?php echo $summary; ?></textarea></td>
			</tr>
			<tr>
				<td>Content</td>
				<td><textarea rows="9" name="txtContent"><?php echo $content; ?></textarea></td>
			</tr>
			<tr>
				<td>Keyword</td>
				<td><input type='text' name='txtKeyword' value='<?php echo $keyword; ?>'/></td>
			</tr>
			<tr>
				<td><input type='submit' name='btnEdit' value="Edit" /></td>
				<td><input type='reset' name='Reset' /></td>
			</tr>
		</table>
	</form>
</div>
<?php } } ?>	
<!-- Footer -->
<?php include_once('footer.php'); ?>
<?php
	if(isset($_POST['btnEdit'])){
		$update_id = $_GET['edit_form'];
		$updateTitle = $_POST['txtTitle'];
		$updateSummary = $_POST['txtSummary'];
		$updateContent = $_POST['txtContent'];
		$updateKeyword = $_POST['txtKeyword'];

		if($updateTitle == '' or $updateSummary == '' or $updateContent == '' or $updateKeyword == ''){
			echo "<script>alert('No Value can be empty!')</script>";
			exit();
		}else{
			$updateQuery = "UPDATE article SET
				title = '$updateTitle',
				summary = '$updateSummary',
				content = '$updateContent',
				keyword = '$updateKeyword'
				WHERE article_id = '$update_id'			
			";
			if(mysqli_query($conn, $updateQuery))
						{
							echo "<script>alert('Article has been updated')</script>";
							echo "<script>window.open('managearticles.php','_self')</script>";
						}
		}
	}
?>
<?php 
	}else{
		header("location: login.php");
	} 
?>
