<?php
	include_once('../includes/dbConnect.php');
?>
<?php
	$status = $_GET['stat'];
	$article_id = $_GET['varid'];
	if($status == 'Y'){
		$query = "update article set status = 'N' where article_id = '$article_id'";
		mysqli_query($conn, $query);
		header("Location: managearticles.php");
	}else if($status == 'N'){
		$query = "update article set status = 'Y' where article_id = '$article_id'";
		mysqli_query($conn, $query);
		header("Location: managearticles.php");
	}
?>	

