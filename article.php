<?php 
	include_once('includes/dbConnect.php');
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

<?php
	if(isset($_GET['articleid'])){
				$edit_id = $_GET['articleid'];
				$edit_query = "select * from article where article_id = '$edit_id'";
				$run_edit = mysqli_query($conn, $edit_query);
				while ($edit_row = mysqli_fetch_array($run_edit)){
					$article_id = $edit_row['article_id'];
					$title = $edit_row['title'];
					//$summary = $edit_row['summary'];
					$content = $edit_row['content'];
					$keyword = $edit_row['keyword'];
?>
<div style="background-color: white;">
	<h2><?php echo $title; ?></h2><br />
	<p><?php echo $content; ?></p><br />
	<p><?php echo $keyword; ?></p><br />
</div>
<?php }} ?>
<!-- Footer -->
<?php include_once('includes/footer.php'); ?>
