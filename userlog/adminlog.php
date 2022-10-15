<?php
session_start();
include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //something was posted
    $admin_email = $_POST['admin_email'];   
    $password = $_POST['password'];
    
    

    if(!empty($admin_email) && !empty($password)  && !is_numeric($admin_email))
    {

        //read from database
        $query = "select * from adminlog where adminemail = '$admin_email' limit 1"; 
        
        $result = mysqli_query($con, $query);  

        if($result)
        {
            if($result && mysqli_num_rows($result) > 0)
            {

                $admin_data = mysqli_fetch_assoc($result);
                
                if($admin_data['adminpassword'] === $password)
                {

                    $_SESSION['admin_id'] = $admin_data['adminid'];
                    header("Location: index.php");
                    die;
                }
            }
        }
        echo "Wrong adminemail or password!";
    
    }else
    {
        echo "Wrong adminemail or password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <style type =  "text/css">
        #text {
            height: 25px;
            border-radius: 5px;
            padding: 4px;
            border: solid thin #aaa;
            width: 100%;
        }

        #button {
            padding: 10px;
            width: 100px;
            color: white;
            background-color: lightblue;
            border: none;
        }

        #box {
            background-color: grey;
            margin: auto;
            width: 300px;
            padding: 20px;
        }
        </style>

        <div id = "box">
            <form method = "post">
                <div style = "font-size: 20px; margin: 10px; color: white;">Admin Login</div>
                
                <input id="text" type = "admin_email" name = "admin_email"> <br><br>
                <input id="text" type = "password" name = "password"> <br><br>

                <input id="button" type = "submit" value = "Login"><br><br>
                <a href = "signup.php">Signup</a>
                <a href = "login.php">User Login</a>


            </form>
        </div>
</body>
</html>