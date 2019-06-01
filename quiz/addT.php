<?php include 'database.php'; ?>
<?php session_start(); ?>
<?php
		
	if(!isset($_SESSION['admin']))
	{
		header("location: home.php");
	}
	
	$query = "SELECT * FROM `test`";
	//Get The Results
	$testno = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$total = $testno->num_rows;
	$next = $total+1;
	$test_id=$next;
	$_SESSION['test_id'] = $test_id;

	if(isset($_POST['submit']))
   {
		//Get post variables
		$test_id = $_POST['test_id'];
		$test_name = $_POST['test_name'];
		$_SESSION['test_id'] = $test_id;

		$query = "INSERT INTO `test`(test_id,name)
					VALUES('$test_id','$test_name')";
					
		//Run query
		$insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);

		if($insert_row)
		{
			$_SESSION['addT']=1;
			header("location:add.php");
		}
		else
		{
			die('Error : ('.$mysqli->errno . ') '. $mysqli->error);
    	}
    }

	
?>

<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8" />
	<title>QUESTION</title>
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
        echo"<a href="."login.php".">Login</a>";
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
        echo"<a class=\"active\" href="."addT.php".">Manage Tests</a>";
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

	<header>
		<div class="container">
			<h1>QUIZ</h1>
		</div>
	</header>
	<main>
		<div class="container">
			<h2>Add Test</h1>
			
			<form method="post" action="addT.php">

				<p>
					<label>Test Number: </label>
					<input readonly type="number" name="test_id" value="<?php echo $next; ?>" name="test_id"  />
				</p>
				<p>
					<label>Test name: </label>
					<input type="text" name="test_name" required />
				</p>
				<p>
					<input type="submit" name="submit" value="Add Test" />
				</p>
			</form>
		</div>
	</main>
	<footer>
		<div class="container">
			Copyright &copy; 2017, OES
		</div>
	</footer>
</body>
</html>