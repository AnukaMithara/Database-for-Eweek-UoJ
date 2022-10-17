<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);
/* Hello, <?php echo $user_data['username']; ?>, <?php echo $user_data['useremail']; ?>    This is how you print something  --> */
?>

<!DOCTYPE html>
<html>
<head>
    <title>Eweek</title>
    <link rel="stylesheet" type="text/css" href="style.css">          <!--Link to the css file-->
</head>
<body>
    <div class ="nav">
        <div class = "logo">
            E week
            </div>
                <div class ="menu">
                    <ul>
                        <li><a href="signup.php">Signup</a></li>  
                        <li><a href="login.php">Login</a></li>  
                        <li><a href="adminlog.php">Admin</a></li>  
                        <li><a href="logout.php">Logout</a></li>  
                        <li><a href="addplayer.php">Add Player</a></li>   
                        

                    </ul>
                </div>
            </div>
    <div class="banner">
        <div class="banner-clip-path">            
        </div>

        <div class="cards">
            <div class="card">
                <div class="card-details">
                    <p class="text-title">E18</p><br>
                    <p class="text-body">Points</p>
                 </div>
                
            </div>

            <div class="card">
                <div class="card-details">
                    <p class="text-title">E19</p><br>
                    <p class="text-body">Points</p>
                 </div>
            </div>

            <div class="card">
                <div class="card-details">
                    <p class="text-title">E20</p><br>
                    <p class="text-body">Points</p>
                 </div>
            </div>

            <div class="card">
                <div class="card-details">
                    <p class="text-title">E21</p><br>
                    <p class="text-body">Points</p>
                 </div>
            </div>
                        
<!--table-->
            <div class="container">
                <table>	
                    
                <thead>
			        <tr>
				    <th>Latest Match Details</th>
			
			        </tr>
		        </thead>

                <tbody>
                    <tr>
                        <td>Latest Team Match Details </td>				
                    </tr>
                    <tr>
                        <td>Latest Solo Match Details </td>
                    </tr>
                    <tr>
                        <td>Latest Creative activity Details </td>				
                    </tr>
                    <tr>
                        <td>Latest Athletic Details </td>				
                    </tr>			
                </tbody>
                </table>
            </div>
        </div>
    </div> 
       
</body>
</html>

