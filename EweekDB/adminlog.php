<?php
session_start();
include("connection.php");
include("functions.php");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Login</title>
</head>

<body>
    <link rel="stylesheet" type="text/css" href="style.css">
    <!--Link to the css file-->

    <div id="box">
        <form method="post">
            <div style="color: #111; font-family: 'Helvetica Neue', sans-serif; font-size: 40px; 
                font-weight: bold; letter-spacing: -1px; line-height: 1; text-align: center;">Admin Login</div><br><br><br>

            <input placeholder="Username" type="text" class="input" required="" name="admin_email"> <br><br>
            <input placeholder="Password" type="password" class="input" required="" name="password"> <br><br>

            <input id="button" type="submit" value="Login"><br><br>
            <a href="signup.php">Signup</a><br><br>
            <a href="login.php">User Login</a><br><br>

            <?php
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                //something was posted
                $admin_email = $_POST['admin_email'];
                $password = $_POST['password'];

                if (!empty($admin_email) && !empty($password)  && !is_numeric($admin_email)) {

                    //read from database
                    $query = "select * from adminlog where adminemail = '$admin_email' limit 1";

                    $result = mysqli_query($con, $query);

                    if ($result) {
                        if ($result && mysqli_num_rows($result) > 0) {

                            $admin_data = mysqli_fetch_assoc($result);

                            if ($admin_data['adminpassword'] === $password) {

                                $_SESSION['admin_id'] = $admin_data['adminid'];
                                header("Location: admincontrol.php");
                                die;
                            }
                        }
                    }
            ?><p style="color:red">Wrong useremail or password!</p>
                <?php

                } else {
                ?><p style="color:red">Wrong useremail or password!</p>
            <?php
                }
            }
            ?>

        </form>
    </div>
</body>

</html>