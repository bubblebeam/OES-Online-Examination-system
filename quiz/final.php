<?php session_start(); ?>

<?php
if(!isset($_SESSION['login']))
{
	header("location: login.php");
}
if(!isset($_SESSION['score']))
{
	header("location: home.php");
}
?>

<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8" />
	<title>FINAL</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body>
	<header>
		<div class="container">
			<h1>QUIZ</h1>
		</div>
	</header>
	<main>
		<div class="container">
			<h2>You're Done!</h2>
				<p>Congrats! You have completed the test</p>
				<p>Final Score: <?php echo $_SESSION['score']; ?></p>
				<a href="homepage.php" class="start">Return to home</a>
		</div>
	</main>
	<footer>
		<div class="container">
			Copyright &copy; 2017, OES
			<?php
				 unset($_SESSION['score']);
			?>
		</div>
	</footer>
</body>
</html>