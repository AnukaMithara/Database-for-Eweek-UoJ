
<?php  
session_start();
include("connection.php");
include("functions.php");
$user_data = check_admin_login($con);
if($_SERVER['REQUEST_METHOD'] == "POST")
{
      
    $game_id = $_POST["game_id"];   
    $reg_id_1 = $_POST["reg_id_1"];
    $reg_id_2 = $_POST["reg_id_2"];        
    $points_p1 = $_POST["points_p1"];
    $points_p2 = $_POST["points_p2"];
    $comments = $_POST["comments"];
    $win = $_POST["win"];

    if($_POST["win"] == "player1"){
        $win = $reg_id_1;
    }else if($_POST["win"] == "player2"){
        $win = $reg_id_2;
    }
        
    $event_id = getnextid($con, "eventid", "groupspactivities");   

        //save data to database
        if($game_id!=0 && $win != 0)
        {  
            
            if (!isAvailableTeam($con,$reg_id_1) || !isAvailableTeam($con,$reg_id_2)) {
                echo "Team(s) not exists!, Please add Team(s) first!";                
              }else{
                $query = "insert into groupspactivities (eventid,gameid,team1id,team2id,win,team1_points,team2_points,comments) values ('$event_id','$game_id','$reg_id_1','$reg_id_2','$win','$points_p1','$points_p2','$comments')";
                 mysqli_query($con, $query);
                    header("Location: groupactivities.php");
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
    <title>Group Activities</title>
</head>
<body>
<link rel="stylesheet" type="text/css" href="formstyle.css">          <!--Link to the css file-->

<div id = "box">
            <form method = "post">
                <div style = "color: #111; font-family: 'Helvetica Neue', sans-serif; font-size: 30px; 
                font-weight: bold; letter-spacing: -1px; line-height: 1; text-align: center;">Add Group Sports Details</div><br>                
                                
                <label for="game">Sport</label>    
                <select name="game_id" id="game_id">
                    <option value="0">Select Sport:</option>
                    <option value="1">Cricket</option>
                    <option value="2">Volleyball</option>
                    <option value="3">Netball</option>
                    <option value="4">Elle</option>     
                    <option value="6">Table Tennis</option>
                    <option value="8">Badminton</option>                                  
                </select><br> 
                  
                <input placeholder="Team 1 ID " type="text" class="input" required="" name = "reg_id_1"> <br><br> 
                <input placeholder="Team 2 ID " type="text" class="input" required="" name = "reg_id_2"> <br><br> 
                
                <label for="win">Winner</label>    
                <select name="win" id="win">
                    <option value="0">Select Winner:</option>
                    <option value="player1">Team 1</option>
                    <option value="player2">Team 2</option>                                      
                </select><br>

                <input placeholder="Team 1 Points" type="text" class="input" required=""  name = "points_p1"> <br><br>  
                <input placeholder="Team 2 Points" type="text" class="input" required=""  name = "points_p2"> <br><br>         
                <input placeholder="Comments" type="text" class="input"  name = "comments"> <br><br>  

                <input id="button" type = "submit" value = "Add Activity"><br><br>
                <a href = "admincontrol.php">Admin Control Page</a>
            </form>
            
        </div>
        
</body>
</html>