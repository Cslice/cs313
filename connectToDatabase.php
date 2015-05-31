<?php
function loadDatabase()
{
     $dbHost = "";
     $dbPort = "";
     $dbUser = "";
     $dbPassword = "";
     $dbName = "nba_predictor_app";
     $openShiftVar = getenv('OPENSHIFT_MYSQL_DB_HOST');

     try
     {
          if ($openShiftVar === null || $openShiftVar == "")
          {
               // Not in the openshift environment
               $dbHost = "localhost";
               $dbUser = 'root';
               $dbPassword = 'root';
     
               // Create the PDO connection
               $db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword);
          }
          else
          {
               // In the openshift environment
               $dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
               $dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT');
               $dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
               $dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');

                // Create the PDO connection
               $db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser,    $dbPassword);
          }
     } 
     catch (PDOException $e) 
     {
         print "Error!: " . $e->getMessage() . "<br/>";
         die();
     }

     // this line makes PDO give us an exception when there are problems, and can be very helpful in debugging!
     $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

     return $db;
}
?>