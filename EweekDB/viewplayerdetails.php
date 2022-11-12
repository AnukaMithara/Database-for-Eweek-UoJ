<?php
session_start();
include("connection.php");
include("functions.php");
$user_data = check_login($con);
?>


<!DOCTYPE html>
<html>
<head>
    <title>View Player Details</title>
</head>

<body>
    <link rel="stylesheet" type="text/css" href="formstyle.css">
     <div id="box">
        <form method="post">
            <div style="color: #111; font-family: 'Helvetica Neue', sans-serif; font-size: 40px; 
                font-weight: bold; letter-spacing: -1px; line-height: 1; text-align: center;">View Player Details</div><br>
            <input placeholder="Player Registration number : 20**/E/***" type="text" class="input" required="" name="reg_id"> <br><br>
            <input id="button" type="submit" value="View Details"><br><br>

            <?php
            if ($_SERVER['REQUEST_METHOD'] == "POST") {

                $reg_id = $_POST["reg_id"];


                $query = "select * from player where registrationid = '$reg_id' limit 1";

                $result = mysqli_query($con, $query);

                if ($result && mysqli_num_rows($result) > 0) {
                    $user_data = mysqli_fetch_assoc($result);
            ?>

                    <input placeholder="First Name " type="text" class="input" value="First Name :  <?= $user_data['firstname']; ?>" name="reg_id"> <br>
                    <input placeholder="Last Name " type="text" class="input" value="Last Name :  <?= $user_data['lastname']; ?>" name="reg_id"> <br>
                    <input placeholder="Bacth " type="text" class="input" value="Batch :  <?= $user_data['batch']; ?>" name="reg_id"> <br>
                    <input placeholder="Gender " type="text" class="input" value="Gender :  <?= $user_data['gender']; ?>" name="reg_id"> <br>
                    <input placeholder="Points " type="text" class="input" value="Points :  <?= $user_data['points']; ?>" name="points"> <br>
                    <input placeholder="Health issues " type="text" class="input" value="Health issues :  <?= $user_data['healthissues']; ?>" name="reg_id"> <br><br>

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