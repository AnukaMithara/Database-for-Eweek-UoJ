<?php
session_start();

include("connection.php");
include("functions.php");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Eweek</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <!--Link to the css file-->
</head>

<body>
    <div class="nav">
        <div class="logo">
            E week
        </div>
        <div class="menu">
            <ul>
                <li><a href="signup.php">Signup</a></li>
                <li><a href="usercontrol.php">User</a></li>
                <li><a href="admincontrol.php">Admin Control</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>


    <div class="banner">
        <div class="banner-clip-path">
        </div>
        <?php

        $query1 = "SELECT SUM(points) FROM player WHERE batch = 'E18'";
        $query2 = "SELECT SUM(points) FROM player WHERE batch = 'E19'";
        $query3 = "SELECT SUM(points) FROM player WHERE batch = 'E20'";
        $query4 = "SELECT SUM(points) FROM player WHERE batch = 'E21'";


        $result1 = mysqli_query($con, $query1);
        $result2 = mysqli_query($con, $query2);
        $result3 = mysqli_query($con, $query3);
        $result4 = mysqli_query($con, $query4);

        $row1 = mysqli_fetch_row($result1);
        $row2 = mysqli_fetch_row($result2);
        $row3 = mysqli_fetch_row($result3);
        $row4 = mysqli_fetch_row($result4);

        ?>
        <div class="cards">



            <div class="card">
                <div class="card-details">
                    <p class="text-title">E18</p><br>
                    <p class="text-body">Points : <?= $row1[0]; ?> </p>
                </div>

            </div>

            <div class="card">
                <div class="card-details">
                    <p class="text-title">E19</p><br>
                    <p class="text-body">Points : <?= $row2[0]; ?></p>
                </div>
            </div>

            <div class="card">
                <div class="card-details">
                    <p class="text-title">E20</p><br>
                    <p class="text-body">Points : <?= $row3[0]; ?></p>
                </div>
            </div>

            <div class="card">
                <div class="card-details">
                    <p class="text-title">E21</p><br>
                    <p class="text-body">Points : <?= $row4[0]; ?></p>
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
                    <?php
                    $query1 = "SELECT * FROM groupspactivities WHERE eventid=(SELECT MAX(eventid) FROM `groupspactivities`)";
                    $query2 = "SELECT * FROM individualspactivities WHERE eventid=(SELECT MAX(eventid) FROM `individualspactivities`)";
                    $query3 = "SELECT * FROM creativeactivities WHERE eventid=(SELECT MAX(eventid) FROM `creativeactivities`) && rank=(SELECT MIN(rank) FROM `creativeactivities`)";
                    $query4 = "SELECT * FROM athlatics WHERE eventid=(SELECT MAX(eventid) FROM `athlatics`) && rank=(SELECT MIN(rank) FROM `athlatics`)";


                    $result1 = mysqli_query($con, $query1);
                    $result2 = mysqli_query($con, $query2);
                    $result3 = mysqli_query($con, $query3);
                    $result4 = mysqli_query($con, $query4);


                    $user_data1 = mysqli_fetch_assoc($result1);
                    $user_data2 = mysqli_fetch_assoc($result2);
                    $user_data3 = mysqli_fetch_assoc($result3);
                    $user_data4 = mysqli_fetch_assoc($result4);

                    ?>

                    <tbody>
                        <tr>
                            <td> <?= "    Team     " . $user_data1["win"] . "      won the latest team event, Sport  :  " . getGame($con, $user_data1["gameid"]) . "  ,  " . $user_data1["comments"] ?> </td>
                        </tr>
                        <tr>
                            <td> <?= "    Player    " . $user_data2["win"] . "      won the latest solo event, Sport  :  " . getGame($con, $user_data2["gameid"]) . "  ,  " . $user_data2["comments"] ?> </td>
                        </tr>
                        <tr>
                            <td> <?= "    Player    " . $user_data3["playerid"] . "      won the latest Aesthetic event, Event  :  " . getGame($con, $user_data3["gameid"]) ?> </td>
                        </tr>
                        <tr>
                            <td> <?= "    Player     " . $user_data4["playerid"] . "      won the latest Athletic event, Sport  :  " . getGame($con, $user_data4["gameid"]) . "  ,  " . $user_data4["comments"] ?> </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>