
<?php  
session_start();
include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
      
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $reg_id = $_POST["reg_id"];
    $batch = $_POST["batch"];
    $health_iss = $_POST["health_iss"];
    $gender = $_POST["gender"];
    $points = 0;
    
    if(is_null($health_iss))
    {
        $health_iss = "No";
    }
   
    if(!empty($first_name) && !empty($last_name)  && !empty($reg_id) && !empty($batch) && !empty($gender) && !is_numeric($reg_id))
    {
        //save data to database
        $player_id = getnextid($con, "playerid", "player");           
       
        if (isAvailable($con,$reg_id) == true) {
            echo "Email already exists!";
            
          }else{
            $query = "insert into userlog (playerid,firstname,lastname,registrationid,batch,gender,healthissues,points) values ('$player_id','$first_name','$last_name','$reg_id','$batch','$gender','$health_iss','$points')";
            mysqli_query($con, $query);
            header("Location: login.php");
            die;
          }  
          
        }else
        {
            echo "Please enter some valid information!";
        }
                        
}

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
     <link rel="stylesheet" href="formstyle.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">Registration</div>
    <div class="content">
      <form action="#">
        <div class="user-details">
          <div class="input-box">
            <span class="details">First Name</span>
            <input type="text" placeholder="Enter your first name" required="" name = "first_name">
          </div>
          <div class="input-box">
            <span class="details">Last Name</span>
            <input type="text" placeholder="Enter your username" required="" name = "last_name  ">
          </div>
          <div class="input-box">
            <span class="details">Registration ID</span>
            <input type="text" placeholder="20**/E/***" required="" name = "reg_id">
          </div>
          <div class="input-box">
            <span class="details">Batch</span>
            <input type="text" placeholder="E21,E20,E19,E18" required="" name = "batch">
          </div>
          <div class="input-box">
            <span class="details">Health Issues</span>
            <input type="text" placeholder="Any health issues" name = "health_iss">
          </div>          
        </div>
        <div class="gender-details">
          <input type="radio" name="gender" id="dot-1" value="Male">
          <input type="radio" name="gender" id="dot-2"value="Female">
          
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Male</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Female</span>
          </label>          
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Register">
        </div>
      </form>
    </div>
  </div>

</body>
</html>