<?php
session_start();
include("connection.php");
include("functions.php");
$user_data = check_login($con);
$batch = $_SESSION['batch'];
$sportsid = $_SESSION['sportsid'];
?>

<!DOCTYPE html>
<html>

<head>
	<title>View Player Details</title>
</head>

<body>
	<link rel="stylesheet" type="text/css" href="tablestyle.css">

	<h1 style="color:white;">Sport : <?= getGame($con, $sportsid) ?></h1>
	<h1 style="color:white;">Batch : <?= $batch ?></h1>
	<div class="container">
		<?php
		$query = "select teamid  from team WHERE batch like '$batch' AND gameid like '$sportsid'";
		if ($result = mysqli_query($con, $query)) {
			$i = 0;
			while ($row = $result->fetch_assoc()) {
				$teamid = $row['teamid'];
				$i++;
		?>
				<h1 style="color:white;">Team ID : <?= $teamid ?></h1><br>
				<table>
					<thead>
						<tr>
							<th>Registration ID</th>
							<th>First Name</th>
							<th>Last Name</th>
						</tr>
					</thead>
					<tbody>

						<?php

						$query2 = "select team.playerid, player.firstname, player.lastname  from player join team on player.registrationid = team.playerid where teamid like '$teamid'";

						if ($result2 = mysqli_query($con, $query2)) {

							while ($row2 = $result2->fetch_assoc()) {
								$playerid = $row2['playerid'];
								$firstname = $row2['firstname'];
								$lastname = $row2['lastname'];
						?>
								<tr>
									<td><?= $playerid ?></td>
									<td><?= $firstname ?></td>
									<td><?= $lastname ?></td>
								</tr>
						<?php
							}
							$result2->free();
						}

						?>
					</tbody>
				</table><br>
			<?php
			}
			if ($i == 0) {
			?>
				<h1 style="color:#FF9999;">No teams registered</h1>
	</div>
<?php
			}
			$result->free();
		}
?>
<br><br>
<span align="left">
	<button onclick="document.location='viewgroupact.php'">
		<span class="button_top"> Go back
		</span>
	</button>
</span>
&nbsp&nbsp&nbsp&nbsp
<span>
	<button onclick="document.location='usercontrol.php'">
		<span class="button_top"> User Control
		</span>
	</button>
</span>

</body>

</html>