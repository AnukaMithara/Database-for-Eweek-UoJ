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
        
    $event_id = getnextid($con, "eventid", "individualspactivities");   

        //save data to database
        if($game_id!=0 && $win != 0)
        {  
            
            if (!isAvailablePlayer($con,$reg_id_1) || !isAvailablePlayer($con,$reg_id_2)) {
                echo "Player(s) not exists!, Please add player(s) first!";                
              }else{
                $query = "insert into individualspactivities (eventid,gameid,player1id,player2id,win,player1_points,player2_points,comments) values ('$event_id','$game_id','$reg_id_1','$reg_id_2','$win','$points_p1','$points_p2','$comments')";
                 mysqli_query($con, $query);
                 
                 addPoints($con, $reg_id_1,$points_p1);
                 addPoints($con, $reg_id_2,$points_p2);

                    header("Location: individualactivities.php");
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
    <title>Individual Activities</title>
</head>
<body>
<link rel="stylesheet" type="text/css" href="formstyle.css">          <!--Link to the css file-->

<div id = "box">
            <form method = "post">
                <div style = "color: #111; font-family: 'Helvetica Neue', sans-serif; font-size: 30px; 
                font-weight: bold; letter-spacing: -1px; line-height: 1; text-align: center;">Add Individual Activity Details</div><br>                
                                
                <label for="game">Sport</label>    
                <select name="game_id" id="game_id">
                    <option value="0">Select Sport:</option>
                    <option value="5">Table Tennis</option>
                    <option value="7">Badminton</option>
                    <option value="9">Chess</option>
                    <option value="19">Carom</option>                   
                </select><br> 
                  
                <input placeholder="Player 1 Registration ID " type="text" class="input" required="" name = "reg_id_1"> <br><br> 
                <input placeholder="Player 2 Registration ID " type="text" class="input" required="" name = "reg_id_2"> <br><br> 
                
                <label for="win">Winner</label>    
                <select name="win" id="win">
                    <option value="0">Select Winner:</option>
                    <option value="player1">Player 1</option>
                    <option value="player2">Player 2</option>                                      
                </select><br>

                <input placeholder="Player 1 Points" type="text" class="input" required=""  name = "points_p1"> <br><br>  
                <input placeholder="Player 2 Points" type="text" class="input" required=""  name = "points_p2"> <br><br>         
                <input placeholder="Comments" type="text" class="input"  name = "comments"> <br><br>  

                <input id="button" type = "submit" value = "Add Activity"><br><br>
                <a href = "admincontrol.php">Admin Control Page</a>
            </form>
            
        </div>
        
</body>
</html>