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
               $db = new PDO("mysql:host=$dbHost;dbname=$dbname", $dbUser, $dbPassword);
          }
          else
          {
               // In the openshift environment
               $dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
               $dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT');
               $dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
               $dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
               echo "host:$dbHost:$dbPort dbName:$dbName user:$dbUser password:$dbPassword<br />\n";
               $db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser,    $dbPassword);
          }
     } 
     catch (PDOException $e) 
     {
         print "Error!: " . $e->getMessage() . "<br/>";
         die();
     }

     return $db;
}
?>