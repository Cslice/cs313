<?php
  // Update json file with survey results
  $jsonFile = file_get_contents('surveyData.json');

  $surveyData = json_decode($jsonFile, true);

  $gender = $surveyData['gender'];
  $yearInSchool = $surveyData['yearInSchool'];
  $favoriteFood = $surveyData['favoriteFood'];
  $favoriteSport = $surveyData['favoriteSport'];



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
  </head>

  <body role="document">


    <div class="container theme-showcase" role="main">
      <div class="page-header">
        <h1>Results</h1>
      </div>
      <div class="row">
        <div class="col-md-6">
          <table class="table">
            <thead>
              <tr>
                <th><h3>Gender</h3></th>
              </tr>
            </thead>
            <thead>
              <tr>
                <th>Male</th>
                <th>Female</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><?php echo $gender['male'];?></td>
                <td><?php echo $gender['female'];?></td>
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
                <th>Freshman</th>
                <th>Sophomore</th>
                <th>Junior</th>
                <th>Senior</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><?php echo $yearInSchool['freshman'];?></td>
                <td><?php echo $yearInSchool['sophomore'];?></td>
                <td><?php echo $yearInSchool['junior'];?></td>
                <td><?php echo $yearInSchool['senior'];?></td>
              </tr>
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
                <th>American</th>
                <th>Mexican</th>
                <th>Italian</th>
                <th>chinese</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><?php echo $favoriteSport['football'];?></td>
                <td><?php echo $favoriteSport['basketball'];?></td>
                <td><?php echo $favoriteSport['baseball'];?></td>
                <td><?php echo $favoriteSport['hockey'];?></td>
              </tr>
            </tbody>
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
                <th>Football</th>
                <th>Basketball</th>
                <th>Baseball</th>
                <th>Hockey</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><?php echo $favoriteSport['football'];?></td>
                <td><?php echo $favoriteSport['basketball'];?></td>
                <td><?php echo $favoriteSport['baseball'];?></td>
                <td><?php echo $favoriteSport['hockey'];?></td>
              </tr>
            </tbody>

          </table>
          </table>
        </div>
      </div>
    </div> <!-- /container -->


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
