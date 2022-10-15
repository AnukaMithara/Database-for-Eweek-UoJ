<?php
session_start();
include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //something was posted
    $user_email = $_POST['user_email'];   
    $password = $_POST['password'];
    
    

    if(!empty($user_email) && !empty($password)  && !is_numeric($user_email))
    {

        //read from database
        $query = "select * from userlog where useremail = '$user_email' limit 1"; 
        
        $result = mysqli_query($con, $query);  

        if($result)
        {
            if($result && mysqli_num_rows($result) > 0)
            {

                $user_data = mysqli_fetch_assoc($result);
                
                if($user_data['userpassword'] === $password)
                {

                    $_SESSION['user_id'] = $user_data['userid'];
                    header("Location: index.php");
                    die;
                }
            }
        }
        echo "Wrong useremail or password!";
    
    }else
    {
        echo "Wrong useremail or password!";
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
                <div style = "font-size: 20px; margin: 10px; color: white;">Login</div>
                
                <input id="text" type = "user_email" name = "user_email"> <br><br>
                <input id="text" type = "password" name = "password"> <br><br>

                <input id="button" type = "submit" value = "Login"><br><br>
                <a href = "signup.php">Click to Signup</a>
            </form>
        </div>
</body>
</html>