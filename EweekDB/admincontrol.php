<?php
session_start();

include("connection.php");
include("functions.php");
$user_data = check_admin_login($con);
?>

<!DOCTYPE html>
<html>

<head>
  <title>Admin Control Page</title>
</head>

<body>
  <link rel="stylesheet" type="text/css" href="admincontrol.css">
  <div class="header">
    <h1>Admin Control</h1>
  </div>
  <div class="menu">
    <ul>
      <li><a href="index.php">Home Page</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </div>
  <div class="buttons">
    <button onclick="document.location='addplayer.php'">Add Player Details</button>
    <button onclick="document.location='addadmin.php'">Add Admin</button>
    <button onclick="document.location='deleteplayer.php'">Delete Player</button>
    <button onclick="document.location='changeplayer.php'">Change Player details</button>
    <button onclick="document.location='team.php'">Add Player to Team</button>
    <button onclick="document.location='aesthetic.php'">Aesthetic Activities</button>
    <button onclick="document.location='individualactivities.php'">Individual Sports</button>
    <button onclick="document.location='groupactivities.php'">Group Sports</button>
    <button onclick="document.location='athlatics.php'">Athletics</button>
  </div>
</body>

</html>