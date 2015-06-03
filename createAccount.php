<?php
	require("connectToDatabase.php");
	require 'password.php';

	// Calls insertUserData() funtion upon form submit
	if(isset($_POST['firstName']))
	{

		insertUserData();  // call to a function
	}

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

	function validateAndInsertNewGroup($group_name, &$group_id)
	{
		
		$db = loadDatabase();
		$valid_group = true;

		$group_list = $db->query('select group_name from user_group');

		foreach($group_list as $row)
		{
			//echo $row[group_name];
			if($row[group_name] == $group_name)
			{
				$valid_group = false;
			}
		}

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
			$statement->bindValue(':number_of_users', 1);
			$statement->execute();	

			$group_id = $db->lastInsertId();	
		}

		return $valid_group;
	}

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
	    	$password_hash = password_hash("$password", PASSWORD_DEFAULT);

	    	if($_POST["group_name_textbox"] === null || $_POST["group_name_textbox"] === ""
	    		|| strlen($_POST["group_name_textbox"]) == 0)
	    	{
	    		$group_name = $_POST["group_name_dropdown"];

	    		// Get group id for group user will be in
	    		$group_id_list =  $db->query("Select id from user_group 
	    									  where group_name = '$group_name'");

	    		// Access group id in query result array
	    		foreach($group_id_list as $row)
	    		{
	    			$group_id = $row[id];
	    			break;
	    		}
	    	}
	    	else
	    	{
	    		$group_name = $_POST["group_name_textbox"];
	    		$valid_group = validateAndInsertNewGroup($group_name, $group_id);
	    		//echo $valid_group ? 'true' : 'false';
	    	}

		  	if (validateUsername($username) && $valid_group)
		  	{
		  		//echo "valid";
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

				$statement->bindValue(':last_name', $last_name);
				$statement->bindValue(':first_name', $first_name);
				$statement->bindValue(':username', $username);
				$statement->bindValue(':password', $password_hash);
				$statement->bindValue(':group_id', $group_id);
				$statement->bindValue(':number_of_points', 0);
				$statement->bindValue(':admin', 0);

				$statement->execute();

				$user_id = $db->lastInsertId();

				session_start();
	  			$_SESSION["user_id"] = $user_id;
	  			$_SESSION["admin"] = 0;
	  			$_SESSION["group_id"] = $group_id;
	  			header('Location: menu.php');
			}
		}
	}
?>