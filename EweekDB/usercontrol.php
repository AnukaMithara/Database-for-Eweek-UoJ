<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
  <head>
    <title>User Control</title>   
  </head>
  <body>
  <link rel="stylesheet" type="text/css" href="admincontrol.css">
    <div class="header">
         <h1>User Control</h1>        
    </div>
            <div class ="menu">
                    <ul>
                        <li><a href="index.php">Home Page</a></li>               
                        <li><a href="logout.php">Logout</a></li>                      
                    </ul>
                </div>
  <div class="buttons">  
        <button onclick="document.location='viewplayerdetails.php'">View Player Details</button>
        <button onclick="document.location='registeredTeams.php'">Register count for Group Sports</button>
        <button onclick="document.location='registeredTeams.php'">Register count for Aesthetic events</button>
        <button onclick="document.location='registeredTeams.php'">Register count for Solo events</button>
        <button onclick="document.location='registeredTeams.php'">Register count for Athletic events</button>

  </div>
  </body>
</html>