<?php
      session_start();
?>
<?php
      $visits = 0;
      $countKey = 'pageCount';

      if (isset($_SESSION[$countKey]))
      {
           $visits = $_SESSION[$countKey];
      }

      $visits++;

      $_SESSION[$countKey] = $visits;



      if($visits != 1)
      {
        echo "<script type='text/javascript'>window.location.assign('results.php')</script>";
      }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Theme Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <!-- Bootstrap theme -->
    <link href="../../dist/css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="theme.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

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
  </head>

  <form name="phpInformationForm" onsubmit="return validate()" method="post" action="processForm.php">

  <body role="document">
    <div class="container theme-showcase" role="main">
      <div class="page-header">
        <h1>Please Fill Out The Survey</h1>
      </div>

      <div class="row">
        <div class="col-md-6">
          <table class="table">
            <thead>
              <tr>
                <th><h3>Select Gender</h3></th>
              </tr>
            </thead>
            <thead>
              <tr>
                <th><input type="radio" name="gender" value="male"/> Male</th>
                <th>  <input type="radio" name="gender" value="female"/> Female</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><label id="genderError" class="errorText"></label><br /><br /></td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="col-md-6">
          <table class="table">
            <thead>
              <tr>
                <th><h3>Year in School</h3></th>
              </tr>
            </thead>
            <thead>
              <tr>
                <th><input type="radio" name="yearInSchool" value="freshman"/> Freshman</th>
                <th><input type="radio" name="yearInSchool" value="sophomore"/> Sophomore</th>
                <th><input type="radio" name="yearInSchool" value="junior"/> Junior</th>
                <th><input type="radio" name="yearInSchool" value="senior"/> Senior</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><label id="yearInSchoolError" class="errorText"></label></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <table class="table">
            <thead>
              <tr>
                <th><h3>Favorite Food</h3></th>
              </tr>
            </thead>
            <thead>
              <tr>
                <th>
                  <select name="favoriteFood">
                  <option value="american">American</option>
                  <option value="mexican">Mexican</option>
                  <option value="italian">Italian</option>
                  <option value="chinese">Chinese</option>
                  </select>
                </th>
              </tr>
            </thead>
          </table>
        </div>
        <div class="col-md-6">
          <table class="table">
            <thead>
              <tr>
                <th><h3>Favorite Sport</h3></th>
              </tr>
            </thead>
            <thead>
              <tr>
                <th>
                  <select name="favoriteSport">
                  <option value="basketball">Basketball</option>
                  <option value="football">Football</option>
                  <option value="baseball">Baseball</option>
                  <option value="hockey">Hockey</option>
                  </select>
                </th>
              </tr>
            </thead>
          </table>
          </table>
        </div>
      </div>

      <input type="submit" name="submit" onsubmit="return validate()" value="Submit"> <br />

    </div> <!-- /container -->
  </form>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
