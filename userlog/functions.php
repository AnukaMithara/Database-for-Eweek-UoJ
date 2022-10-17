<?php


//If the user is logged in, return the user's data. If not, redirect to the login page.

function check_login($con)
{
    if(isset($_SESSION['user_id']))
    {
        $id = $_SESSION['user_id'];
        $query = "select * from userlog where userid = '$id' limit 1";
        
        $result = mysqli_query($con, $query);
        
        if($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }
    //redirect to login
    header("Location: login.php");
    die;
}



//It gets the max id from the userlog table, adds 1 to it, and returns the result.
function getnextid($con, $id,$table)
{

    $query = "select max(".$id.") from ".$table;             //Sql query to get the max id from the userlog table.
    $result = mysqli_query($con, $query);                   
    $row = mysqli_fetch_row($result);                       //Get the result of the query to a array.
    $maxid = $row[0];                                       //Get the element from the array.   
    if($result)
    {
        $maxid = $maxid + 1;                                //Add 1 to the max id.
        
        return $maxid;                                      //Return the new id.
    }
    else{                                                   //If the query fails, return 1.
        return 1;
    }
   
}


function isAvailable($con,$email)                           //Check if the email is already in use.
  {
        $query = "select * from userlog where useremail = '$email'" ;

        $result = mysqli_query($con, $query); 

        if($result && mysqli_num_rows($result) > 0)
        {
            return true;
       }
       return false;
}

function isAvailablePlayer($con,$email)                           //Check if the email is already in use.
  {
        $query = "select * from player where registrationid = '$email'" ;

        $result = mysqli_query($con, $query); 

        if($result && mysqli_num_rows($result) > 0)
        {
            return true;
       }
       return false;
}