<?php

function loadDatabase()
{
     $dbHost = "";
     $dbPort = "";
     $dbUser = "";
     $dbPassword = "";

     $openShiftVar = getenv('OPENSHIFT_MYSQL_DB_HOST');
     $dbname = "nba_predictor_app";

     if ($openShiftVar === null || $openShiftVar == "")
     {
          // Not in the openshift environment
          $dbHost = "localhost";
          $server = '127.0.0.1';
          $database = 'nba_predictor_app';
          $username = 'root';
          $password = 'root';

          $db = new PDO("mysql:host=$server; dbname=$database", $username, $password);

     }
     else
     {
          // In the openshift environment
          $dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
          $dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT');
          $dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
          $dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
          $dbname = "nba_predictor_app";
          $db = new PDO("mysql:host=$dbHost:$dbPort;dbname=$dbName", $dbUser, $dbPassword);
     }

     return $db;
}
?>