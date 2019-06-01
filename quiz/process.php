<?php include 'database.php'; ?>
<?php session_start(); ?>
<?php
	$test_id=$_SESSION['t_id'];
	//Check to see if score is set_error_handler
	if(!isset($_SESSION['score'])){
		$_SESSION['score'] = 0;
	}
	
	if($_POST){
		$number = $_POST['number'];
		$selected_choice = $_POST['choice'];
		$next = $number+1;
		
		/*
		*	Get total questions
		*/
		$query = "SELECT * FROM `questions`where test_id='".$test_id."'";
		//Get result
		$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
		$total = $results->num_rows;
		
		
		/*
		*	Get correct choice
		*/
		
		$query = "SELECT * FROM `choices`
					WHERE question_number = $number  and test_id='".$test_id."' AND is_correct = 1";
					
		//Get result
		$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
		
		//Get row
		$row = $result->fetch_assoc();
		
		//Set correct choice
		$correct_choice = $row['id'];
		
		//Compare
		if($correct_choice == $selected_choice){
			//Answer is correct
			$_SESSION['score']++;
		}

		//Check if last question
		if($number == $total){
			header("Location: final.php");
			exit();
		} else {
			header("Location: question.php?n=".$next);
		}
	}