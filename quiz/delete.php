<?php include 'database.php'; ?>
<?php session_start(); ?>

    <?php 
    $test_id = (int)$_GET['t_id'];
    if(!isset($_SESSION['admin']))
    {
        header("location:homepage.php");
    } 

/*
    if(!isset($test_id))
    {
        header("location:homepage.php");
    } */

    else
{    	    	

    	$query1 = "DELETE FROM `test` where test_id='".$test_id."'";
    	$query2 = "DELETE FROM `questions` where test_id='".$test_id."'";
    	$query3 = "DELETE FROM `choices` where test_id='".$test_id."'";

		//Get result
		$results1 = $mysqli->query($query1) or die($mysqli->error.__LINE__);
		$results2 = $mysqli->query($query2) or die($mysqli->error.__LINE__);
		$results3 = $mysqli->query($query3) or die($mysqli->error.__LINE__);

		header("location:home.php");
}
   ?>
