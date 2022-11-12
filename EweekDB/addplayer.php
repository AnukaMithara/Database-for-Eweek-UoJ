<?php
session_start();
include("connection.php");
include("functions.php");
$user_data = check_admin_login($con);
?>


<!DOCTYPE html>
<html>

<head>
    <title>Add Player</title>
</head>

<body>
    <link rel="stylesheet" type="text/css" href="formstyle.css">
    <!--Link to the css file-->

    <div id="box">
        <form method="post">
            <div style="color: #111; font-family: 'Helvetica Neue', sans-serif; font-size: 40px; 
                font-weight: bold; letter-spacing: -1px; line-height: 1; text-align: center;">Add Player Details</div><br>
            <input placeholder="First Name" type="text" class="input" required="" name="first_name"> <br><br>
            <!╌ creating a text box for the user to enter their name. Getting inputs for user_name -->
                <input placeholder="Last Name" type="text" class="input" required="" name="last_name"> <br><br>
                <input placeholder="Player Registration number : 20**/E/***" type="text" class="input" required="" name="reg_id"> <br><br>
                <!╌ creating a text box for the user to enter their email. Getting inputs for email -->
                    <label for="batch">Playing Batch</label>
                    <select name="batch" id="batch">
                        <option value="0">Batch:</option>
                        <option value="E18">E18</option>
                        <option value="E19">E19</option>
                        <option value="E20">E20</option>
                        <option value="E21">E21</option>
                    </select><br><br><br>

                    <label for="gender">Gender</label>
                    <select name="gender" id="gender">
                        <option value="0">Select Gender:</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select> <br> <br>
                    <input placeholder="If player had any health issues" type="text" class="input" name="health_iss"> <br><br>
                    <input id="button" type="submit" value="Add Player"><br><br>
                    <a href="admincontrol.php">Admin Control Page</a>
                    

                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == "POST") {

                        $first_name = $_POST["first_name"];
                        $last_name = $_POST["last_name"];
                        $reg_id = $_POST["reg_id"];
                        $batch = $_POST["batch"];
                        $health_iss = $_POST["health_iss"];
                        $gender = $_POST["gender"];
                        $points = 0;

                        $player_id = getnextid($con, "playerid", "player");

                        //save data to database
                        if (!empty($reg_id) && !is_numeric($reg_id)) {

                            if (isAvailablePlayer($con, $reg_id) == true) {

                    ?><p style="color:red">Player already exists!</p>
                            <?php

                            } else {
                                $query = "insert into player (playerid,firstname,lastname,registrationid,batch,gender,healthissues,points) values ('$player_id','$first_name','$last_name','$reg_id','$batch','$gender','$health_iss','$points')";
                                mysqli_query($con, $query);
                            ?><p style="color:green">Successfully added</p>
                            <?php
                                die;
                            }
                        } else {
                            ?><p style="color:red">Please enter valid information!</p>
                    <?php
                        }
                    }
                    ?>
        </form>
    </div>
</body>

</html>