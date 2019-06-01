<?php include 'database.php'; ?>
<?php session_start(); ?>
<?php

	if(!isset($_SESSION['admin']))
	{
		header("location: home.php");
	}

	if(!isset($_SESSION['addT']))
	{
		header("location: home.php");
	} 


	if(isset($_POST['submit'])){
		//Get post variables
		$question_number = $_POST['question_number'];
		$question_text = $_POST['question_text'];
		$correct_choice = $_POST['correct_choice'];
		$test_id = $_POST['test_id'];
		//Choices array
		$choices = array();
		$choices[1] = $_POST['choice1'];
		$choices[2] = $_POST['choice2'];
		$choices[3] = $_POST['choice3'];
		$choices[4] = $_POST['choice4'];
		
		//Question query
		$query = "INSERT INTO  `questions`(question_number,test_id, text)
					VALUES('$question_number','$test_id','$question_text')";
					
		//Run query
		$insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);
		
		//Validate insert
		if($insert_row){
			foreach($choices as $choice => $value){
				if($value != ''){
					if($correct_choice == $choice){
						$is_correct = 1;
					} else {
						$is_correct = 0;
					}
					//Choice query
					$query = "INSERT INTO `choices` (question_number,test_id, is_correct, text)
							VALUES ('$question_number','$test_id','$is_correct','$value')";
							
					//Run query
					$insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);
					
					//Validate insert
					if($insert_row){
						continue;
					} else {
						die('Error : ('.$mysqli->errno . ') '. $mysqli->error);
					}
				}
			}
			$msg = 'Question has been added';
		}
	}
	
	/*
 	* Get total questions
	*/
	$query = "SELECT * FROM `questions` where test_id='".$_SESSION['test_id']."'";
	$query2 = "SELECT * FROM `test`";
	//Get The Results
	$test= $mysqli->query($query2) or die($mysqli->error.__LINE__);
	$testTotal= $test->num_rows;
	$questions = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$total = $questions->num_rows;
	$next = $total+1;
?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8" />
	<title>TEST</title>
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
  <li id="list"><a href="home.php">Home</a></li>
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
<br>
<br>

	<header>
		<div class="container">
			<h1>QUIZ</h1>
		</div>
	</header>
	<main>
		<div class="container">
			<h2>Add A Question</h1>
			<?php
				if(isset($msg)){
					echo "<p id=\"pmsg\">$msg</p>";			
				}
			?>
			<form method="post" action="add.php">

				<p>
					<label>Test Number: </label>
					<input readonly type="number" value="<?php echo $_SESSION['test_id']; ?>" name="test_id" />
				</p>

				<p>
					<label>Question Number: </label>
					<input readonly type="number" value="<?php echo $next; ?>" name="question_number" />
				</p>
				<p>
					<label>Question Text: </label>
					<input type="text" name="question_text" required />
				</p>
				<p>
					<label>Choice #1: </label>
					<input type="text" name="choice1" required />
				</p>
				<p>
					<label>Choice #2: </label>
					<input type="text" name="choice2" required />
				</p>
				<p>
					<label>Choice #3: </label>
					<input type="text" name="choice3" />
				</p>
				<p>
					<label>Choice #4: </label>
					<input type="text" name="choice4" />
				</p>
				
				<p>
					<label>Correct Choice Number: </label>
					<input type="number" min="1" max="4" name="correct_choice" required />
				</p>
				<p>
					<input type="submit" name="submit" value="Submit" />
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