<!DOCTYPE html>
<?php
    if (!isset($_COOKIE("takenSurvey")))
    {
    //  setcookie("takenSurvey", "true", 9999999999);
      session_start();
      $_SESSION["takenSurvey"] = "true";
    }
    else
    {
      echo "cookie is set";

    }



  echo "You have been here $visits times<br />";
?>
<html>
  <head>
  <link rel="stylesheet" type="text/css" href="phpSurveyStyles.css">
  <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script type = "text/javaScript">
    function validate()
    {
      gender = validateGender();
      yearInSchool = validateYearInSchool();

      return (gender && yearInSchool);
    }

    /********
    *
    ********/
    function validateGender()
    {
      valid = false;

      if (!$("input[name='gender']").is(':checked'))
      {
        document.getElementById("genderError").innerHTML = "Please select a gender";
      }
      else
      {
        document.getElementById("genderError").innerHTML = "";
        valid = true;
      }

      return valid;
    }

    /********
    *
    ********/
    function validateYearInSchool()
    {
      valid = false;

      if (!$("input[name='yearInSchool']").is(':checked'))
      {
        document.getElementById("yearInSchoolError").innerHTML = "Please select a year in school";
      }
      else
      {
        document.getElementById("yearInSchoolError").innerHTML = "";
        valid = true;
      }

      return valid;

    }
  </script>

  </head>

  <body>
                                          <!-- this sends the info via post back to itself -->
  <form name="phpInformationForm" onsubmit="return validate()" method="post" action="processForm.php">
    Select Gender:  <br />
     <input type="radio" name="gender" value="male"/>Male <br />
     <input type="radio" name="gender" value="female"/>Female<br />
     <label id="genderError" class="errorText"></label><br /><br />

    Year in school:  <br />
     <input type="radio" name="yearInSchool" value="freshman"/>Freshman<br />
     <input type="radio" name="yearInSchool" value="sophomore"/>Sophomore<br />
     <input type="radio" name="yearInSchool" value="junior"/>Junior<br />
     <input type="radio" name="yearInSchool" value="senior"/>Senior<br />
     <label id="yearInSchoolError" class="errorText"></label> <br /> <br />

     Select which food you like best:  <br />
     <select name="favoriteFood">
      <option value="american">American</option>
      <option value="mexican">Mexican</option>
      <option value="italian">Italian</option>
      <option value="chinese">Chinese</option>
     </select>

     <br />
     <br />
     <br />

     Select the sport you like best: <br />
     <select name="favoriteSport">
      <option value="basketball">Basketball</option>
      <option value="football">Football</option>
      <option value="baseball">Baseball</option>
      <option value="hockey">Hockey</option>
     </select>

     <br />
     <br />
     <input type="submit" name="submit" onsubmit="return validate()" value="Submit"> <br />
   </form>

  <?php/*

    // Don't forget to initialize variables
    $name = $email = $major = $comments = "";

    $visited[] = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $name = $_POST["name"];
      $email = $_POST["email"];
      $major = $_POST["major"];
      $visited = $_POST["visited"];
      $comments = $_POST["comments"];
    }
      echo "My name is $name and my email is $email and I'm studying $major <br />";
      echo "I've been to: <br/>";
      foreach ($visited as $temp ) {
      echo "$temp <br />";
      }
      echo "$comments";
    */  ?>



  </body>
</html>
