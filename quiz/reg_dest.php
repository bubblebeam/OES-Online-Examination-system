<?php include 'database.php'; ?>
<?php session_start(); ?>
<?php
if(isset($_POST['submit']))
{
		//Get post variables
		$firstname = $_POST['firstname'];
 		$lastname=$_POST['lastname'];
 		$email=$_POST['email'];
 		$password=$_POST['pswd2'];
 		$name=$firstname.$lastname;
 		$day=$_POST['day'];
 		$month=$_POST['month'];
 		$year=$_POST['year'];
 		$dob=$year.'/'.$month.'/'.$day;
 

 		$query = "INSERT INTO user(firstname,lastname,email,password,dob)
 			VALUES('$firstname','$lastname','$email','$password','$dob')";

 		$insert_row = $mysqli->query($query) or die("Error: User with Email ID: ".$email." already exists"); //die($mysqli->error.__LINE__);

 		if($insert_row)
 		{
			header("Location: home.php");
 		} 
 		else 
 		{
			die('Error : ('.$mysqli->errno . ') '. $mysqli->error);
				  
		}
}

 	?>
	 