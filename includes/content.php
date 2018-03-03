<?php
	include_once('dbConnect.php');
?>

<!-- Heading -->
<?php include_once('header.php'); ?>

<!-- Menu -->
<?php include_once('menu.php'); ?>
<div class = 'content'>
<?php
		$query = "select a.*, w.name from article a, writer w where a.u_id = w.user_id AND a.status = 'Y' order by 1 DESC";
		$run = mysqli_query($conn, $query);
		while($row = mysqli_fetch_array($run)){
			$article_id = $row['article_id'];
			$title = $row['title'];
			$summary = $row['summary'];
			$user = $row['name'];
?>
		<h2><?php echo $title; ?></h2><br />
		<p><?php echo $summary; ?></p><br />
		<p><?php echo $user; ?></p><br />
		<a href="article.php?articleid=<?php echo $article_id; ?>">Read more</a>
		<hr />

<?php } ?>
</div>
<!-- Footer -->
<?php include_once('footer.php'); ?>
