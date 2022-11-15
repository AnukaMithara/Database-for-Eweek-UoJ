<?php
session_start();
include("connection.php");
include("functions.php");
$user_data = check_login($con);
?>


<!DOCTYPE html>
<html>

<head>
    <title>View Registrants for Group Sports</title>
</head>

<body>
    <link rel="stylesheet" type="text/css" href="miniformstyle.css">
    <!--Link to the css file-->

    <div id="box">
        <form method="post">
            <div style="color: #111; font-family: 'Helvetica Neue', sans-serif; font-size: 40px; 
                font-weight: bold; letter-spacing: -1px; line-height: 1; text-align: center;">Details of Group Sports</div>
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

                if ($batch != 0 && $sportsid != 0) {
                    
                    $_SESSION['batch'] = $batch;
                    $_SESSION['sportsid'] = $sportsid;
                    header("Location: groupactivitiestable.php");
                    die;
              
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