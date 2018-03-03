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

<div style="background-color: white;">
	<table border=1>
		<tr>
			<th>Article ID</th>		
			<th>Title</th>
			<th>Summary</th>
			<th>Content</th>
			<th>Keyword</th>
			<th>Edit</th>
		</tr>
	<?php
		$query = "select * from article where u_id = '$user' order by 1 DESC";
		$run = mysqli_query($conn, $query);
		while($row = mysqli_fetch_array($run)){
			$article_id = $row['article_id'];
			$title = $row['title'];
			$summary = $row['summary'];
			$content = $row['content'];
			$keyword = $row['keyword'];
	?>	
		<tr>
			<td><?php echo $article_id; ?></td>
			<td><?php echo $title; ?></td>
			<td><?php echo $summary; ?></td>
			<td><?php echo $content; ?></td>	
			<td><?php echo $keyword; ?></td>
			<td><a href="edit.php?edit=<?php echo $article_id; ?>">Edit</a></td>
		</tr>
	<?php } ?>
	</table>
</div>
<!-- Footer -->
<?php include_once('footer.php'); ?>	
<?php 
	}else{
		header("location: ../login.php");
	} 
?>
