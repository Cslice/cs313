<?php


require("connectToDatabase.php");

  $db = loadDatabase();


$rounds = $db->query('Select * from playoff_bracket');
$teams = $db->query('Select name from team;');
$roundsArray = array();
$teamsArray = array();
foreach($rounds as $row)
{
  array_push($roundsArray, $row); 
}

foreach($teams as $row)
{
  array_push($teamsArray, $row[name]); 

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
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
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


<style type="text/css">
<!--
table {
 border-collapse: collapse;
  border: none;
  font: small arial, helvetica, sans-serif;
}
td {
  vertical-align: middle;
  width: 10em;
  margin: 10;
  padding: 0;
}
td p {
 // border-bottom: solid 1px black;
  margin: 0;
  padding: 20px;
}
-->
</style>





  </head>

  <body role="document">

   
    <div class="container theme-showcase" role="main">

      <br/>
      <br/>
      <br/>
      <br/>


      <table summary="Tournament Bracket">
       <tr>
        <td><p><?php echo $teamsArray[$roundsArray[0][team_1]-1]?></p></td>
        <td rowspan="2"><p><?php echo $teamsArray[$roundsArray[2][team_1]-1]?></p></td>
        <td rowspan="4"><p><?php echo $teamsArray[$roundsArray[4][team_1]-1]?></p></td>
        <td rowspan="8"><p><?php echo $teamsArray[$roundsArray[6][team_1]-1]?></p></td>
        <td rowspan="8"><p><?php echo $teamsArray[$roundsArray[6][team_2]-1]?></p></td>
        <td rowspan="4"><p><?php echo $teamsArray[$roundsArray[5][team_1]-1]?></p></td>
        <td rowspan="2"><p><?php echo $teamsArray[$roundsArray[3][team_1]-1]?></p></td>
        <td><p><?php echo $teamsArray[$roundsArray[1][team_1]-1]?></p></td>
       </tr>
       <tr>
        <td><p><?php echo $teamsArray[$roundsArray[0][team_2]-1]?></p></td>
        <td><p><?php echo $teamsArray[$roundsArray[1][team_2]-1]?></p></td>
       </tr>
       <tr>
        <td><p><?php echo $teamsArray[$roundsArray[0][team_3]-1]?></p></td>
        <td rowspan="2"><p><?php echo $teamsArray[$roundsArray[2][team_2]-1]?></p></td>    
        <td rowspan="2"><p><?php echo $teamsArray[$roundsArray[3][team_2]-1]?></p></td>
        <td><p><?php echo $teamsArray[$roundsArray[1][team_3]-1]?></p></td>
       </tr>
       <tr>
        <td><p><?php echo $teamsArray[$roundsArray[0][team_4]-1]?></p></td>
        <td><p><?php echo $teamsArray[$roundsArray[1][team_4]-1]?></p></td>
       </tr>
       <tr>
        <td><p><?php echo $teamsArray[$roundsArray[0][team_5]-1]?></p></td>
        <td rowspan="2"><p><?php echo $teamsArray[$roundsArray[2][team_3]-1]?></p></td>
        <td rowspan="4"><p><?php echo $teamsArray[$roundsArray[4][team_2]-1]?></p></td>
        <td rowspan="4"><p><?php echo $teamsArray[$roundsArray[5][team_2]-1]?></p></td>
        <td rowspan="2"><p><?php echo $teamsArray[$roundsArray[3][team_3]-1]?></p></td>
        <td><p><?php echo $teamsArray[$roundsArray[1][team_5]-1]?></p></td>
       </tr>
       <tr>
        <td><p><?php echo $teamsArray[$roundsArray[0][team_6]-1]?></p></td>
        <td><p><?php echo $teamsArray[$roundsArray[1][team_6]-1]?></p></td>
       </tr>
       <tr>
        <td><p><?php echo $teamsArray[$roundsArray[0][team_7]-1]?></p></td>
        <td rowspan="2"><p><?php echo $teamsArray[$roundsArray[2][team_4]-1]?></p></td>
        <td rowspan="2"><p><?php echo $teamsArray[$roundsArray[3][team_4]-1]?></p></td>
        <td><p><?php echo $teamsArray[$roundsArray[1][team_7]-1]?></p></td>
       </tr>
       <tr>
        <td><p><?php echo $teamsArray[$roundsArray[0][team_8]-1]?></p></td>
        <td><p><?php echo $teamsArray[$roundsArray[1][team_8]-1]?></p></td>
       </tr>
      </table>



      <br/>
      <br/>
      <br/>
      <br/>


     

      </table>



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
