<?php
session_start();
include("connection.php");
include("functions.php");
$user_data = check_admin_login($con);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Add Player to Team</title>
</head>

<body>
    <link rel="stylesheet" type="text/css" href="formstyle.css">
    <!--Link to the css file-->

    <div id="box">
        <form method="post">
            <div style="color: #111; font-family: 'Helvetica Neue', sans-serif; font-size: 30px; 
                font-weight: bold; letter-spacing: -1px; line-height: 1; text-align: center;">Add Player to Team</div><br>

            <input placeholder="Team ID" type="text" class="input" required="" name="team_id"> <br><br>

            <label for="game">Sport</label>
            <select name="gameid" id="gameid">
                <option value="0">Select Sport:</option>
                <option value="1">Cricket</option>
                <option value="2">Volleyball</option>
                <option value="3">Netball</option>
                <option value="4">Elle</option>
                <option value="6">Table tennis</option>
                <option value="8">Badminton</option>
            </select>

            <input placeholder="Player Registration ID " type="text" class="input" required="" name="reg_id"> <br><br>

            <label for="batch">Batch</label>
            <select name="batch" id="batch">
                <option value=" ">Select Batch:</option>
                <option value="E18">E18</option>
                <option value="E19">E19</option>
                <option value="E20">E20</option>
                <option value="E21">E21</option>
            </select>

            <input placeholder="Jersey number" type="text" class="input" name="jersey_num"> <br><br>

            <input id="button" type="submit" value="Add to Team"><br><br>
            <a href="admincontrol.php">Admin Control Page</a>

            <?php

            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $team_id = $_POST["team_id"];
                $game_id = $_POST["gameid"];
                $reg_id = $_POST["reg_id"];
                $batch = $_POST["batch"];
                $jersey_num = $_POST["jersey_num"];


                if (isAvailablePlayer($con, $reg_id) == false) {

            ?><p style="color:red">Please add the player details first!</p>
                <?php

                } elseif (isAvailablePlayerinTeam($con, $reg_id, $team_id)) {

                ?><p style="color:red">Player already in team!</p>
                <?php

                } elseif ($game_id != 0 && $batch != 0) {
                    $query = "insert into team (teamid,gameid,playerid,batch,jerseynum) values ('$team_id','$game_id','$reg_id','$batch','$jersey_num')";
                    mysqli_query($con, $query);
                ?><p style="color:green">Successfully Added</p>
                <?php
                    die;
                } else {
                ?><p style="color:red">Please enter some valid information!</p>
            <?php
                }
            }
            ?>



        </form>
    </div>
</body>

</html>