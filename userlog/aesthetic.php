
<?php  
session_start();
include("connection.php");
include("functions.php");
$user_data = check_admin_login($con);
if($_SERVER['REQUEST_METHOD'] == "POST")
{
      
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $reg_id = $_POST["reg_id"];
    $batch = $_POST["batch"];
    $health_iss = $_POST["health_iss"];
    $gender = $_POST["gender"];
    $points = 0;
    
    
    $player_id = getnextid($con, "playerid", "player");   

        //save data to database
        if(!empty($reg_id) && !is_numeric($reg_id))
        {                  
       
        if (isAvailable($con,$reg_id) == true) {
            echo "Email already exists!";
            
          }else{
            $query = "insert into player (playerid,firstname,lastname,registrationid,batch,gender,healthissues,points) values ('$player_id','$first_name','$last_name','$reg_id','$batch','$gender','$health_iss','$points')";
            mysqli_query($con, $query);
            header("Location: addplayer.php");
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
    <title>Add Player</title>
</head>
<body>
<link rel="stylesheet" type="text/css" href="formstyle.css">          <!--Link to the css file-->

        <div id = "box">
            <form method = "post">
                <div style = "color: #111; font-family: 'Helvetica Neue', sans-serif; font-size: 40px; 
                font-weight: bold; letter-spacing: -1px; line-height: 1; text-align: center;">Add Player</div><br>
                
                
                <input placeholder="First Name" type="text" class="input" required="" name = "first_name"> <br><br>        <!╌ creating a text box for the user to enter their name. Getting inputs for user_name -->
                <input placeholder="Last Name" type="text" class="input" required="" name = "last_name"> <br><br>        <!╌ creating a text box for the user to enter their name. Getting inputs for user_name -->
                <input placeholder="Registration number : 20**/E/***" type="text" class="input" required="" name = "reg_id"> <br><br>                <!╌ creating a text box for the user to enter their email. Getting inputs for email -->
                <input placeholder="Batch : E18,E19,E20,E21" type="text" class="input" required="" name = "batch"> <br><br>  
                <input placeholder="If you had any health issues" type="text" class="input"  name = "health_iss"> <br><br>          <!╌ creating a text box for the user to enter their password. Getting inputs for password -->   
                <input placeholder="Male or Female" type="text" class="input" required="" name = "gender"> <br><br><br> 
                <input id="button" type = "submit" value = "Add Player"><br><br>
                <a href = "admincontrol.php">Admin Control Page</a>
            </form>
            
        </div>
        
</body>
</html>