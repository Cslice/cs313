<?php

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gender = $_POST["gender"];
    $yearInSchool = $_POST["yearInSchool"];
    $favoriteFood = $_POST["favoriteFood"];
    $favoriteSport = $_POST["favoriteSport"];
  }

  // Update json file with survey results
  $jsonFile = file_get_contents('surveyData.json');

  $data = json_decode($jsonFile, true);

  $data['gender'][$gender] += 1;
  $data['yearInSchool'][$yearInSchool] += 1;
  $data['favoriteFood'][$favoriteFood] += 1;
  $data['favoriteSport'][$favoriteSport] += 1;

  file_put_contents('surveyData.json', json_encode($data, JSON_PRETTY_PRINT));

  echo "<script type='text/javascript'>window.location.assign('results.php')</script>";
?>
