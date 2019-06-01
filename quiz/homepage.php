<?php include 'database.php'; ?>
<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<style>
	body{
	background-color: #333;
}

</style>
<title>Home Page</title>

<link rel="stylesheet" href="css/navbar.css" type="text/css" />
<link rel="stylesheet" href="css/style.css" type="text/css" />


</head>
<body>

		<div class="contain">
			<img src="logonew.png" alt="logo" />
			<h1>OES</h1>
			<h3>Online Exam System<h3>
		</div>

<ul id="ul">
  <li id="list"><a class="active" href="homepage.php">Home</a></li>
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
<img src="banner1.jpg" alt="display_img"  height="60%" width="100%"  >
<br>
<div class="hometest">
<h2>TESTS AVAILABLE:</h2>
<?php
$query="SELECT * FROM `test`";
$tests= $mysqli->query($query) or die($mysqli->error.__LINE__);
?>

<?php
$no=1;
while($test=$tests->fetch_assoc())
					{
						echo "<p>";
						//echo"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
						echo "<li>";
						echo"<label class=\"test\"><strong>Test ".$no.":</strong>".$test['name']."</label>";
						echo "</li>";
						echo "</p>";
						$no++;
					}
?>	
</div>			
<div class="rules">
<h2>RULES:</h2>
<ul><li>Students desirous of giving the test must be registered with us through our website.</li>
<li>All participating students should have computer and Internet 
connectivity with a minimum speed of 512 KBPS (non-shared ).</li>
</ul>
</div>

<div class="technical">
<h2>TECHNICAL REQUIREMENTS:</h2>
<ul><li>Access to a computer with internet connectivity which in addition has to have a functioning 
keyboard and mouse.</li>
<li>All applications such as OS , Browser etc should be of latest version.</li>
<li>Image and Video display must be enabled for browser.</li>
</ul>
</div>

<footer>
		<div class="container">
			Copyright &copy; 2017, OES
		</div>
	</footer>
</body>
</html>
