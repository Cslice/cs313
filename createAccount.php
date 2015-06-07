<?php
	require("connectToDatabase.php");

	// Program needed for hashing passwords
	require 'password.php';

	// Calls insertUserData() funtion upon form submit
	if(isset($_POST['firstName']))
	{
		insertUserData();  
	}

	/***********************************************************
	* Validate that user name is not alread being used by
	* another user.
	************************************************************/
	function validateUsername($username)
	{	
		$db = loadDatabase();
		$valid_username = true;

		$group_list = $db->query('select username from user');

		foreach($group_list as $row)
		{
			if($username == $row[username])
			{
				$valid_username = false;
			}
		}

		return $valid_username;
	}

	/***********************************************************
	* Validate that group name is not already being used by
	* another user.
	************************************************************/
	function validateAndInsertNewGroup($group_name, &$group_id)
	{
		
		$db = loadDatabase();
		$valid_group = true;

		$group_list = $db->query('select group_name from user_group');

		// Check if new group name is already in use
		foreach($group_list as $row)
		{
			if($row[group_name] == $group_name)
			{
				$valid_group = false;
			}
		}

		// Insert new group if name is valid
		if($valid_group)
		{
			$query = 'INSERT INTO user_group 
			(
			group_name                               ,  
			number_of_users                                                                              
			)								  
			VALUES
			(
			:group_name							     ,
			:number_of_users																	
			)';
			
			$statement = $db->prepare($query);
			$statement->bindValue(':group_name', $group_name);
			$statement->bindValue(':number_of_users', 0);
			$statement->execute();	

			$group_id = $db->lastInsertId();	
		}

		return $valid_group;
	}

	/***********************************************************
	* Create new user in the database.
	************************************************************/
	function insertUserData()
	{

		$db = loadDatabase();
		$group_id = 1;
		$valid_group = true;
  
		if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{
	    	$first_name = $_POST["firstName"];
	    	$last_name = $_POST["lastName"];
	    	$username = $_POST["username"];
	    	$password = $_POST["password"];

	    	// Create secure password to store in database
	    	$password_hash = password_hash("$password", PASSWORD_DEFAULT);

	    	// User existing group
	    	if($_POST["group_name_textbox"] === null || $_POST["group_name_textbox"] === ""
	    		|| strlen($_POST["group_name_textbox"]) == 0)
	    	{
	    		// Get user name form drop on user page
	    		$group_name = $_POST["group_name_dropdown"];

	    		// Get group id for group user will be in
	    		$group_id_list =  $db->query("Select id from user_group 
	    									  where group_name = '$group_name'");
	    		$group_id = $group_id_list -> fetch();
	    		$group_id = $group_id[id];
	    		//echo $group_id;
	    	}

	    	// Create new group
	    	else
	    	{
	    		$group_name = $_POST["group_name_textbox"];
	    		$valid_group = validateAndInsertNewGroup($group_name, $group_id);
	    		//echo $group_name;
	    	}

	    	// Insert new user
		  	if (validateUsername($username) && $valid_group)
		  	{
			  	$query = 'INSERT INTO user 
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
				:last_name							    ,
				:first_name								, 
				:username								, 
				:password								, 
				:group_id								, 
				:number_of_points                       ,
				:admin										
				)';

				$statement = $db->prepare($query);

				// Insert values into insert statement
				$statement->bindValue(':last_name', $last_name);
				$statement->bindValue(':first_name', $first_name);
				$statement->bindValue(':username', $username);
				$statement->bindValue(':password', $password_hash);
				$statement->bindValue(':group_id', $group_id);
				$statement->bindValue(':number_of_points', 0);
				$statement->bindValue(':admin', 0);
				$statement->execute();

				// Get user id of new user
				$user_id = $db->lastInsertId();

				// Add 1 to group member count user
				$query = "UPDATE user_group
			    SET number_of_users = (number_of_users + 1)
				WHERE id = $group_id";
				$statement = $db->prepare($query);
				$statement->execute();

				// Create new seesion
				session_start();
	  			$_SESSION["user_id"] = $user_id;
	  			$_SESSION["admin"] = 0;
	  			$_SESSION["group_id"] = $group_id;

	  			// Take user back to homepage of NBA Predictor App
	  			header('Location: menu.php');
			}
		}
	}
?>