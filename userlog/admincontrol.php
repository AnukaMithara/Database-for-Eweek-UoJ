<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_admin_login($con);

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Admin Control Panel</title>   
  </head>
  <body>
  <link rel="stylesheet" type="text/css" href="buttons.css">
    <div class="header">
         <h1>Admin Panel</h1>        
    </div>
  <div class="buttons">  
        <button onclick="document.location='addplayer.php'">Add Player Details</button>
        <button onclick="document.location='team.php'">Add Player to Team</button>
        <button onclick="document.location='addplayer.php'">Singing, Dancing...</button>
        <button onclick="document.location='addplayer.php'">Solo Sports</button>
        <button onclick="document.location='addplayer.php'">Team Sports</button>
        <button onclick="document.location='addplayer.php'">Athletics</button>
  </div>
  </body>
</html>