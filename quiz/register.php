<?php include 'database.php'; ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>FORM</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" />
<link rel="stylesheet" href="css/navbar.css" type="text/css" />
<script>

/*Global variables for regexp*/
var re1 = /^[a-zA-Z ]*$/;
var re2 = /^[a-zA-Z]+$/;
//var re3 = /^[a-zA-Z0-9]+$/;


function strength()
{
var x = document.getElementById("pswd1").value;
var y = document.getElementById("pswd2").value;
if(x!=y)
{
	document.getElementById("str2").style.color = "red";
	document.getElementById("str2").innerHTML= "Passwords Don't match";
}
	
else if(x.length < 6)
{
	document.getElementById("str2").style.color = "red";
	document.getElementById("str2").innerHTML= "password strength:poor (minimium 6 characters required)";
}
else
{
document.getElementById("str2").style.color = "green";
document.getElementById("str1").style.color = "green";
document.getElementById("str1").innerHTML= " &#9989;";
document.getElementById("str2").innerHTML= " &#9989;";
}
}

function validName()
{
	var x = document.getElementById("firstname").value;
	
	if(x.length>=2 && re1.test(x))
	{
		document.getElementById("fn").style.color = "green";
		document.getElementById("fn").innerHTML= "&#9989;";
	}
	else
	{
		document.getElementById("fn").style.color = "red";
		document.getElementById("fn").innerHTML= "Invalid entry";
	}
	
}

function validLastname()
{
	var x=document.getElementById("lastname").value;

	if(re2.test(x))
	{
		document.getElementById("ln").style.color = "green";
		document.getElementById("ln").innerHTML= " &#9989;";
	}
	
	else
	{
		document.getElementById("ln").style.color = "red";
		document.getElementById("ln").innerHTML= "Invalid entry";
	}
}

/*function validUsername()
{
	
	var x=document.getElementById("username").value;

	if(re3.test(x))
	document.getElementById("un").innerHTML= " &#9989;";
	else
	{
		document.getElementById("un").style.color = "red";
		document.getElementById("un").innerHTML= "Invalid entry";
	}
}*/


function onSubmit()
{
	var x = document.getElementById("firstname").value;
	var y = document.getElementById("lastname").value;
	var z = document.getElementById("pswd1").value;
	var w = document.getElementById("pswd2").value;
	//var u = document.getElementById("username").value;
	
	if(re1.test(x)==false || re2.test(y)==false /*|| re3.test(u)==false*/)
	{
		alert("One or more invalid entries!");
		return false;
	}
		
	else if(z!=w)
	{
		alert("Passwords don't match!");
		return false;
	}
		
	else if(x.length<2 || z.length<6 )
	{
		alert("One or more invalid entries!");
		return false;
	}

	else
	{
		return confirm("NO CHANGES CAN BE MADE FURTHUR.DO YOU WISH TO CONTINUE?");
		
	}
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
  <li id="list"><a class="active" href="register.php">Sign Up</a></li>
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
<form id="form1" method="post" action="reg_dest.php" onsubmit="return onSubmit();">
  <label><b>First Name:<b></label>
  <input type="text" name="firstname" id="firstname" onblur="validName();" required><br><span id="fn">&nbsp;</span>
  <br><br>
  <label><b>Last Name:<b></label>
  <input type="text" name="lastname" id="lastname" onblur="validLastname();" required><br><span id="ln">&nbsp;</span>
  <br><br>
 <label><b>Date Of Birth:<b></label><br>
  <input type="number" name="day" min="1" max="31" value="1" placeholder="dd" width="2">
  <input type="number" name="month" min="1" max="12" value="1" placeholder="mm">
  <input type="number" name="year" min="1990" max="2018" value="1990" placeholder="yyyy">
  <br><br><br>
   <label><b>Email ID:<b></label><br>
  <input type="email" name="email" placeholder="eg:abc@xyz.com" id="email" required>
  <br><br>
 <label><b>Password:<b></label><br>
  <input type="password" name="pswd1" id="pswd1" placeholder="*********" required><span id="str1">&nbsp;<br></span>
 <br><br>
<label><b>Confirm Password:<b></label><br>
  <input type="password" name="pswd2" id="pswd2" placeholder="*********" onblur="strength();" required><br><span id="str2">&nbsp;</span>
 <br><br>
<br><br>
<input type="submit" value=" Register " name="submit"/><br />
</form> 
</div>
<footer>
		<div class="container">
			Copyright &copy; 2017, OES
		</div>
	</footer>
</body>
</html>

