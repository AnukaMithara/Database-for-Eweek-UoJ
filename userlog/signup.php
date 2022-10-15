<?php
session_start();
include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //something was posted
    
    $user_name = $_POST["first_name"] . ' ' . $_POST["last_name"];
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    

    if(!empty($user_name) && !empty($password)  && !empty($email) && !is_numeric($user_name))
    {

        //save data to database
        $user_id = random_num(10);
        $query = "insert into userlog (userid,username,useremail,userpassword) values ('$user_id','$user_name','$email','$password')";
        mysqli_query($con, $query);  

        header("Location: login.php");
        die;
    
    }else
    {
        echo "Please enter some valid information!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
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
                <div style = "font-size: 20px; margin: 10px; color: white;">Signup</div>
                
                
                <input id="text" type = "first_name" name = "first_name"> <br><br>        <!╌ creating a text box for the user to enter their name. Getting inputs for user_name -->
                <input id="text" type = "last_name" name = "last_name"> <br><br>        <!╌ creating a text box for the user to enter their name. Getting inputs for user_name -->
                <input id="text" type = "email" name = "email"> <br><br>                <!╌ creating a text box for the user to enter their email. Getting inputs for email -->
                <input id="text" type = "password" name = "password"> <br><br>          <!╌ creating a text box for the user to enter their password. Getting inputs for password -->   

                <input id="button" type = "submit" value = "Signup"><br><br>
                <a href = "login.php">Click to Login</a>
            </form>
        </div>
</body>
</html>