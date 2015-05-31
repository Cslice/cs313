<?php
	require("connectToDatabase.php");
    $db = loadDatabase();

	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		$valid = false;	
		$username_and_password = $db->query('select username, password, 
											 id, group_id, admin from user');

		foreach($username_and_password as $row)
		{
			if($_POST["username"] == $row[username]
			 && $_POST["input_password"] == $row[password])
			{
				$valid = true;	
  				$user_id = $row[id];
  				$admin = $row[admin];
  				$group_id = $row[group_id];
				break;
			}
		}

		if($valid)
		{
  			session_start();
  			$_SESSION["user_id"] = $user_id;
  			$_SESSION["admin"] = $admin;
  			$_SESSION["group_id"] = $group_id;
			header('Location: menu.php');
		}
		else
		{
			header('Location: signInPage.php');
			return $valid;
		}
	}
?>