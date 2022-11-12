<?php
session_start();
include("connection.php");
include("functions.php");
$user_data = check_login($con);
?>


<!DOCTYPE html>
<html>

<head>
    <title>View Registrants for Aesthetic Activities</title>
</head>

<body>
    <link rel="stylesheet" type="text/css" href="miniformstyle.css">
    <!--Link to the css file-->

    <div id="box">
        <form method="post">
            <div style="color: #111; font-family: 'Helvetica Neue', sans-serif; font-size: 40px; 
                font-weight: bold; letter-spacing: -1px; line-height: 1; text-align: center;">Details of Aesthetic Activities</div>
                <br><br><br>

            <label for="batch">Batch</label>
            <select name="batch" id="batch">
                <option value="0">Select event:</option>
                <option value="E18">E18</option>
                <option value="E19">E19</option>
                <option value="E20">E20</option>
                <option value="E21">E21</option>
            </select><br><br><br>

            <label for="game">Sport</label>
            <select name="sportsid" id="sportsid">
                <option value="0">Select event:</option>
                <option value="10">Singing</option>
                <option value="11">Drawing</option>
                <option value="12">Dancing</option>
                <option value="13">Poem writing</option>
            </select><br><br><br>

            <input id="button" type="submit" value="View Details"><br><br>

            <?php
            if ($_SERVER['REQUEST_METHOD'] == "POST") {

                $batch = $_POST["batch"];
                $sportsid = $_POST["sportsid"];

                if ($batch != 0 && $sportsid != 0) {
                    $query = "select count(*) as total from team where batch = '$batch' AND gameid = '$sportsid'";

                    $result = mysqli_query($con, $query);


                    $user_data = mysqli_fetch_assoc($result);
            ?>
                    <input placeholder="Players" type="text" class="input" value="Players Registered for <?= getGame($con, $sportsid); ?> from <?= $batch; ?> :  <?= $user_data['total']; ?> "> <br><br><br><br>
                <?php
                } else {
                ?><p style="color:red">Please enter some valid information!</p>
            <?php
                }
            }
            ?>
            <a href="usercontrol.php">User Control Page</a>
        </form>
    </div>
</body>

</html>