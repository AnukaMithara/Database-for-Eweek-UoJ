<?php
session_start();
include("connection.php");
include("functions.php");
$user_data = check_admin_login($con);
?>


<!DOCTYPE html>
<html>

<head>
    <title>Delete Player</title>
</head>

<body>
    <link rel="stylesheet" type="text/css" href="miniformstyle.css">
    <!--Link to the css file-->

    <div id="box">
        <form method="post">
            <div style="color: #111; font-family: 'Helvetica Neue', sans-serif; font-size: 40px; 
                font-weight: bold; letter-spacing: -1px; line-height: 1; text-align: center;">Delete Player</div><br> <br>
            <input placeholder="Player Registration number : 20**/E/***" type="text" class="input" required="" name="reg_id"> <br><br>
            <input id="button" type="submit" value="Delete Player"><br><br>
            <br>
            <a href="admincontrol.php">Admin Control Page</a> <br><br>

            <?php
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $reg_id = $_POST["reg_id"];

                if (isAvailablePlayer($con, $reg_id)) {
                    $query1 = "DELETE FROM team where playerid = '$reg_id' limit 1";
                    $query = "DELETE FROM player where registrationid = '$reg_id' limit 1";
                    $result1 = mysqli_query($con, $query1);
                    $result = mysqli_query($con, $query);
                ?><p style="color:green">Successfully deleted</p>
                <?php

                } else {
                ?><p style="color:red">Player not available</p>
                <?php

                }
            }
                ?>
        </form>

    </div>

</body>

</html>