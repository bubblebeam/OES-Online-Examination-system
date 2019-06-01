<?php include 'database.php'; ?>
<?php session_start(); ?>
<?php 

//if(!isset($_SESSION['login']))
//{
	//header("location: login.php");
//}

?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8" />
	<title>Quiz</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<link rel="stylesheet" href="css/navbar.css" type="text/css" />

	<script type="text/javascript">
		function del()
		{
			return confirm("Are you sure you want to delete?");
		}
	</script>
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
        echo"<a class=\"active\" href="."home.php".">Tests</a>";
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

<?php
$query="SELECT * FROM `test`";
$tests= $mysqli->query($query) or die($mysqli->error.__LINE__);
?>

<br>
	<header>
		<div class="container">
			<h1>Test your knowledge</h1>
		</div>
	</header>
	<main>
		<form method="post" action="index.php">
		<div class="container">
			<?php
				
					$no=1;
					while($test=$tests->fetch_assoc())
					{
						echo "<p>";
						echo"<label><strong>Test ".$no.":</strong>".$test['name']."</label>";
						echo"&nbsp;";echo"&nbsp;";echo"&nbsp;";
						echo"<a href=\"index.php?t_id=".$test['test_id']."\"class=\"start\">Start</a>";
						echo"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
						if(isset($_SESSION['admin']))
						echo"<a onclick=\"return del()\" href=\"delete.php?t_id=".$test['test_id']."\"id=\"del\">Delete</a>";
						echo "</p>";
						$no++;
					}
				

				/*<p>
					<label>Test 2:Java </label>
					<a href="index.php?t_id=2" class="start">Start</a>
				</p>*/
			
			//</p>
			?>
		</div>
	</main>
	<footer>
		<div class="container">
			Copyright &copy; 2017, OES
		</div>
	</footer>
</body>
</html>