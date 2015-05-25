<?php

require("connectToDatabase.php");

  $db = loadDatabase();
  


	if ($_SERVER["REQUEST_METHOD"] == "POST") {
    	$firstName = $_POST["firstName"];
    	$lastName = $_POST["lastname"];
    	$username = $_POST["username"];
    	$password = $_POST["password"];
    	$groupID = $_POST["groupID"];

  	}
  	echo $firstName;

  	$stmt = $db->prepare("INSERT INTO user 
	(
	last_name                               ,  
	first_name                              ,
	username                                , 
	password                                , 
	group_id                                ,
	number_of_points                        , 
	admin
	)								  
	VALUES
	(
	':lastName'							    ,
	':firstName'							, 
	':username'								, 
	':password'								, 
	:groupID								, 
	0										, 
	1
	);");

	$stmt->bindParam(':lastName', $lastName);
	$stmt->bindParam(':firstName', $firstName);
	$stmt->bindParam(':username', $username);
	$stmt->bindParam(':password', $password);
	$stmt->bindParam(':groupID', intval($groupID));

	$stmt->execute();
	
	/*session_start();

	$visits = 0;
    $countKey = 'pageCount';

    if (isset($_SESSION[$countKey]))
    {
         $visits = $_SESSION[$countKey];
    }

    $visits++;

    $_SESSION[$countKey] = $visits;*/

?>