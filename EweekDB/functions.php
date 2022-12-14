<?php


//If the user or admin is logged in, return the data. If not, redirect to the login page.
function check_login($con)
{
    if (isset($_SESSION['user_id'])) {
        $id = $_SESSION['user_id'];
        $query = "select * from userlog where userid = '$id' limit 1";

        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    } elseif (isset($_SESSION['admin_id'])) {
        $id = $_SESSION['admin_id'];
        $query = "select * from adminlog where adminid = '$id' limit 1";

        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }
    //redirect to login
    header("Location: login.php");
    die;
}

function check_admin_login($con)
{
    if (isset($_SESSION['admin_id'])) {
        $id = $_SESSION['admin_id'];
        $query = "select * from adminlog where adminid = '$id' limit 1";

        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }

    //redirect to admin login
    header("Location: adminlog.php");
    die;
}



//It gets the max id from the userlog table, adds 1 to it, and returns the result.
function getnextid($con, $id, $table)
{

    $query = "select max(" . $id . ") from " . $table;             //Sql query to get the max id from the userlog table.
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_row($result);                       //Get the result of the query to a array.
    $maxid = $row[0];                                       //Get the element from the array.   
    if ($result) {
        $maxid = $maxid + 1;                                //Add 1 to the max id.

        return $maxid;                                      //Return the new id.
    } else {                                                   //If the query fails, return 1.
        return 1;
    }
}


function isAvailable($con, $email)                           //Check if the email is already in use.
{
    $query = "select * from userlog where useremail = '$email'";

    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        return true;
    }
    return false;
}


function isAvailableAdmin($con, $email)                           //Check if the email is already in use.
{
    $query = "select * from adminlog where adminemail = '$email'";

    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        return true;
    }
    return false;
}

function isAvailablePlayer($con, $email)                           //Check if the email is already in use.
{
    $query = "select * from player where registrationid = '$email'";

    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        return true;
    }
    return false;
}

function isAvailableTeam($con, $teamid)                           //Check if the email is already in use.
{
    $query = "select gameid from team where teamid = '$teamid'";

    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        return true;
    }
    return false;
}

function isAvailablePlayerinTeamTable($con, $playerid)                          
{
    $query = "select * from team where playerid = '$playerid'";

    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        return true;
    }
    return false;
}

function isAvailablePlayerinTeam($con, $playerid, $teamid)                          
{
    $query = "select * from team where playerid = '$playerid' and teamid = '$teamid'";

    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        return true;
    }
    return false;
}


function addPoints($con, $id, $points)
{

    $query = "select points from player where registrationid = '$id' limit 1";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_row($result);
    $past_points = $row[0];

    $new_points = $past_points + $points;

    $query2 = "UPDATE player SET points='$new_points' WHERE registrationid='$id'";
    $result = mysqli_query($con, $query2);
}


function getGame($con, $id)
{

    $query = "select gamename from games where gameid=" . $id;
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_row($result);
    $game = $row[0];

    return $game;
}


function addTeamPoints($con, $teamid, $gameid,$points)
{
    
    $query = "select * from team where teamid = '$teamid' and gameid='$gameid'";
    $result = mysqli_query($con, $query);
       
     while($row = $result->fetch_assoc())
     {
        $playerid = $row['playerid'];
        addPoints($con, $playerid, $points);
     }
}