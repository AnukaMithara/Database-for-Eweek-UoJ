<?php
session_start();
include("connection.php");
include("functions.php");
?>

<!DOCTYPE html>
<html>

<head>
    <title>User Signup</title>
</head>

<body>
    <link rel="stylesheet" type="text/css" href="style.css">
    <!--Link to the css file-->

    <div id="box">
        <form method="post">
            <div style="color: #111; font-family: 'Helvetica Neue', sans-serif; font-size: 40px; 
                font-weight: bold; letter-spacing: -1px; line-height: 1; text-align: center;">User Signup</div><br>


            <input placeholder="First Name" type="text" class="input" required="" name="first_name"> <br><br>
            <!╌ creating a text box for the user to enter their name. Getting inputs for user_name -->
                <input placeholder="Last Name" type="text" class="input" required="" name="last_name"> <br><br>
                <!╌ creating a text box for the user to enter their name. Getting inputs for user_name -->
                    <input placeholder="Email" type="text" class="input" required="" name="email"> <br><br>
                    <!╌ creating a text box for the user to enter their email. Getting inputs for email -->
                        <input placeholder="Password" type="password" class="input" required="" name="password"> <br><br>
                        <!╌ creating a text box for the user to enter their password. Getting inputs for password -->

                            <input id="button" type="submit" value="Signup"><br><br>
                            <a href="login.php">Click to Login</a><br><br>

                            <?php


                            if ($_SERVER['REQUEST_METHOD'] == "POST") {

                                $user_name = $_POST["first_name"] . ' ' . $_POST["last_name"];

                                $email = $_POST['email'];
                                $password = $_POST['password'];

                                if (!empty($user_name) && !empty($password)  && !empty($email) && !is_numeric($user_name)) {

                                    //save data to database
                                    $user_id = getnextid($con, "userid", "userlog");

                                    if (isAvailable($con, $email) == true) {
                            ?><p style="color:red">User email already exists!</p>
                                    <?php

                                    } else {
                                        $query = "insert into userlog (userid,username,useremail,userpassword) values ('$user_id','$user_name','$email','$password')";
                                        mysqli_query($con, $query);
                                        header("Location: login.php");
                                        die;
                                    }
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