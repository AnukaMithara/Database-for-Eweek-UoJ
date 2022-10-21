
<?php  
session_start();
include("connection.php");
include("functions.php");
$user_data = check_admin_login($con);
if($_SERVER['REQUEST_METHOD'] == "POST")
{
      
    $game_id = $_POST["game_id"];   
    $reg_id = $_POST["reg_id"];
    $rank = $_POST["rank"];
    $points = $_POST["points"];
    
    
    $event_id = getnextid($con, "eventid", "creativeactivities");   

        //save data to database
        if($game_id!=0)
        {  
            
            if (isAvailablePlayer($con,$reg_id) == false) {
                echo "Player not exists!, Please add player first!";                
              }else{
                $query = "insert into creativeactivities (eventid,gameid,playerid,points,rank) values ('$event_id','$game_id','$reg_id','$points','$rank')";
                 mysqli_query($con, $query);

                 addPoints($con, $reg_id,$points);
                    header("Location: aesthetic.php");
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
    <title>Aesthetic Activities</title>
</head>
<body>
<link rel="stylesheet" type="text/css" href="formstyle.css">          <!--Link to the css file-->

<div id = "box">
            <form method = "post">
                <div style = "color: #111; font-family: 'Helvetica Neue', sans-serif; font-size: 30px; 
                font-weight: bold; letter-spacing: -1px; line-height: 1; text-align: center;">Add Aesthetic Activity Details</div><br><br><br>                 
                                
                <label for="game">Event</label>    
                <select name="game_id" id="game_id">
                    <option value="0">Select event:</option>
                    <option value="10">Singing</option>
                    <option value="11">Drawing</option>
                    <option value="12">Dancing</option>
                    <option value="13">Poem writing</option>
                </select><br><br>  
                  
                <input placeholder="Player Registration ID " type="text" class="input" required="" name = "reg_id"> <br><br> 
                <input placeholder="Rank" type="text" class="input" required=""  name = "rank"> <br><br>         
                <input placeholder="Points" type="text" class="input" required=""  name = "points"> <br><br>         

                <input id="button" type = "submit" value = "Add Activity"><br><br>
                <a href = "admincontrol.php">Admin Control Page</a>
            </form>
            
        </div>
        
</body>
</html>