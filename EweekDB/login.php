<?php
session_start();
include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //something was posted
    $user_email = $_POST['user_email'];
    $password = $_POST['password'];

    if (!empty($user_email) && !empty($password)  && !is_numeric($user_email)) {

        //read from database
        $query = "select * from userlog where useremail = '$user_email' limit 1";

        $result = mysqli_query($con, $query);

        if ($result) {
            if ($result && mysqli_num_rows($result) > 0) {

                $user_data = mysqli_fetch_assoc($result);

                if ($user_data['userpassword'] === $password) {

                    $_SESSION['user_id'] = $user_data['userid'];
                    header("Location: usercontrol.php");
                    die;
                }
            }
        }
        echo "Wrong useremail or password!";
    } else {
        echo "Wrong useremail or password!";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>User Login</title>
</head>

<body>
    <link rel="stylesheet" type="text/css" href="style.css">
    <!--Link to the css file-->

    <div id="box">
        <form method="post">
            <div style="color: #111; font-family: 'Helvetica Neue', sans-serif; font-size: 40px; 
                font-weight: bold; letter-spacing: -1px; line-height: 1; text-align: center;">User Login</div><br><br><br>

            <input placeholder="Email" type="text" class="input" required="" name="user_email"> <br><br>
            <input placeholder="Password" type="password" class="input" required="" name="password"> <br><br>

            <input id="button" type="submit" value="Login"><br><br>
            <a href="signup.php">Click to Signup</a><br><br>
            <a href="adminlog.php">Login as Admin</a>
        </form>
    </div>
</body>

</html>