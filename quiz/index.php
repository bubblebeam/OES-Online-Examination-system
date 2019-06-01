<?php include 'database.php'; ?>
<?php session_start(); ?>
<?php

if(!isset($_SESSION['login']))
	{
		header("location: login.php");
	}


$t_id = (int) $_GET['t_id'];
$test_id=$t_id;
$_SESSION['t_id'] = $test_id;
/*
 *	Get Total Questions
 */

 $query ="SELECT * FROM questions where test_id='".$test_id."'";
 //Get results
 $results = $mysqli->query($query) or die($mysqli->error.__LINE__);
 $total = $results->num_rows;
?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8" />
	<title>QUIZ</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<link rel="stylesheet" href="css/navbar.css" type="text/css" />
</head>
<body>
		<div class="contain">
			<img src="logonew.png" alt="logo" />
			<h1>OES</h1>
			<h3>Online Exam System<h3>
		</div>
<ul id="ul">
  <li id="list"><a href="homepage.php">Home</a></li>
  <li id="list">
    <?php 
    if(!isset($_SESSION['login']))
    {
        echo"<a class=\"active\" href="."login.php".">Login</a>";
    } 
   ?>
  </li>
  <li id="list">
    <?php 
        echo"<a href="."home.php".">Tests</a>";
   ?>
 </li>
 <li id="list">
    <?php 
    if(isset($_SESSION['admin']))
    {
        echo"<a href="."addT.php".">Manage Tests</a>";
    } 
   ?>
 </li>
 <li id="list">
   <?php 
    if(!isset($_SESSION['login']))
    {
        echo"<a href="."register.php".">Sign Up</a>";
    } 
   ?>
 </li>
  <li id="list">
     <?php 
  	if(isset($_SESSION['login']))
  	{
   		echo"<a href="."logout.php".">Logout</a>";
	} 
   ?>
 </li>
<li id="list1">
  <?php 
  	if(isset($_SESSION['login']))
  	{
   		echo"<a class=\"blend\" >Welcome <strong> ".$_SESSION['user']['firstname']."</strong></a>";
	} 
   ?>
 </li>
</ul>
<br>
<br>
	<main>
		<div class="container">
			<h2>Test Your Knowledge</h2>
			<ul>
				<li><strong>Number of Questions: </strong><?php echo $total; ?></li>
				<li><strong>Type: </strong>Multiple Choice</li>
				<li><strong>Total Marks: </strong><?php echo $total; ?> Marks</li>
			</ul>
			<a href="question.php?n=1" class="start">Start Quiz</a>
		</div>
	</main>
	<footer>
		<div class="container">
			Copyright &copy; 2017, OES
		</div>
	</footer>
</body>
</html>