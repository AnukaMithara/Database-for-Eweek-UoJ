<?php
session_start();
include("connection.php");
include("functions.php");
$user_data = check_login($con);

?>


<!DOCTYPE html>
<html>

<head>
    <title>View Register count for event</title>
</head>

<body>
    <link rel="stylesheet" type="text/css" href="formstyle.css">
    <!--Link to the css file-->

    <div id="box">
        <form method="post">
            <div style="color: #111; font-family: 'Helvetica Neue', sans-serif; font-size: 40px; 
                font-weight: bold; letter-spacing: -1px; line-height: 1; text-align: center;">Count of Group Sports</div><br>
            <input placeholder="Batch" type="text" class="input" required="" name="batch"> <br><br><br>

            <label for="game">Sport</label>
            <select name="sportsid" id="sportsid">
                <option value="0">Select Sport:</option>
                <option value="1">Cricket</option>
                <option value="2">Volleyball</option>
                <option value="3">Netball</option>
                <option value="4">Elle</option>
                <option value="6">Table Tennis</option>
                <option value="8">Badminton</option>
            </select><br><br><br>

            <input id="button" type="submit" value="View Details"><br><br>

            <?php
            if ($_SERVER['REQUEST_METHOD'] == "POST") {

                $batch = $_POST["batch"];
                $sportsid = $_POST["sportsid"];


                $query = "select count(*) as total from team where batch = '$batch' AND gameid = '$sportsid'";

                $result = mysqli_query($con, $query);

                if ($result && mysqli_num_rows($result) > 0) {
                    $user_data = mysqli_fetch_assoc($result);
            ?>

                    <input placeholder="Players" type="text" class="input" value="Players Registered for <?= getGame($con, $sportsid); ?> from <?= $batch; ?> :  <?= $user_data['total']; ?> " <br><br><br><br>

            <?php
                } else {
                    echo "Player not available";
                }
            }
            ?>
            <a href="usercontrol.php">User Control Page</a>
        </form>
    </div>
</body>

</html>