<?php
session_start();
include("connection.php");
include("functions.php");
$user_data = check_admin_login($con);
if($_SERVER['REQUEST_METHOD'] == "POST")
{
      
    $admin_name = $_POST["first_name"] . ' ' . $_POST["last_name"];
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    

    if(!empty($admin_name) && !empty($password)  && !empty($email) && !is_numeric($admin_name))
    {

        //save data to database
        $admin_id = getnextid($con, "adminid", "adminlog");           
       
        if (isAvailableAdmin($con,$email) == true) {
            echo "Email already exists!";
            
          }else{
            $query = "insert into adminlog (adminid,adminname,adminemail,adminpassword) values ('$admin_id','$admin_name','$email','$password')";
            mysqli_query($con, $query);
            header("Location: admincontrol.php");
            die;
          }  
            
    
    }else
    {
        echo "Please enter some valid information!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Admin</title>
</head>
<body>
<link rel="stylesheet" type="text/css" href="style.css">          <!--Link to the css file-->

        <div id = "box">
            <form method = "post">
                <div style = "color: #111; font-family: 'Helvetica Neue', sans-serif; font-size: 40px; 
                font-weight: bold; letter-spacing: -1px; line-height: 1; text-align: center;">Add Admin</div><br>
                
                
                <input placeholder="First Name" type="text" class="input" required="" name = "first_name"> <br><br>        <!╌ creating a text box for the user to enter their name. Getting inputs for user_name -->
                <input placeholder="Last Name" type="text" class="input" required="" name = "last_name"> <br><br>        <!╌ creating a text box for the user to enter their name. Getting inputs for user_name -->
                <input placeholder="Email" type="text" class="input" required="" name = "email"> <br><br>                <!╌ creating a text box for the user to enter their email. Getting inputs for email -->
                <input placeholder="Password" type="password" class="input" required="" name = "password"> <br><br>          <!╌ creating a text box for the user to enter their password. Getting inputs for password -->   

                <input id="button" type = "submit" value = "Add Admin"><br><br>
                <a href="admincontrol.php">Click to go back</a><br><br>
            </form>
            
        </div>
        
</body>
</html>