<?php session_start(); ?>
<?php
if(isset($_SESSION['login']))
{
    header("location:home.php");
}

if(isset($_POST["submit"]))
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    //Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $email = mysqli_real_escape_string($conn, $_POST['email']); 
    $newPassword = mysqli_real_escape_string($conn, $_POST['password']);  

    $result = $conn->query("SELECT * FROM user WHERE email ='$email' AND password='$newPassword'");

    //to get name of logged in user
    $temp = $conn->query("SELECT firstname FROM user WHERE email ='$email' AND password='$newPassword'");
    $user = $temp->fetch_assoc();


    if (mysqli_num_rows($result))
    {
             //echo "login successfull";
             $_SESSION['login']=1;
             $_SESSION['user']=$user;
             if($email=="Admin@gmail.com")
                $_SESSION['admin']=1;
             unset($_SESSION['failed']); 
             header("Location: home.php");   
    } 
    else
    {
        $_SESSION['failed']=1;
        header("Location: login.php");     
    }

    //$conn->close();
}

?>
<!DOCTYPE html>
<html>
<head>
<!--<meta charset="utf-8" />-->
<title>Login</title>
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

<div id="main">
	<form action="" method="post">
	<label><b>Email ID :<b></label><br>
	<input type="email" name="email" id="name" placeholder="eg:abc@xyz.com" required/><br /><br />
	<br />
	<label><b>Password  :<b></label><br>
	<input type="password" name="password" id="password" placeholder="**********" required/><br/><br />
    <?php
    if(isset($_SESSION['failed']))
    {
        echo "<div id=\"nmsg\">";
        echo "Login Unsuccessful...Please Try Again";
		echo"</div>";
    }

    ?>
	<input type="submit" value=" Login " name="submit"/><br />
	</form>
</div>
<footer>
    <div class="container">
      Copyright &copy; 2017, OES
    </div>
  </footer>
</body>
</html>


