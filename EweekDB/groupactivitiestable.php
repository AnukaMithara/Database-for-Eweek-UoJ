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

<h1>Sport : <?= getGame($con, $sportsid) ?></h1>
<h1>Batch : <?= $batch ?></h1>

<div class="container">


	<table>
		<thead>
			<tr>
				<th>Column 1</th>
				<th>Column 2</th>
				<th>Column 3</th>
				<th>Column 4</th>
				<th>Column 5</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Cell 1</td>
				<td>Cell 2</td>
				<td>Cell 3</td>
				<td>Cell 4</td>
				<td>Cell 5</td>
			</tr>
			<tr>
				<td>Cell 1</td>
				<td>Cell 2</td>
				<td>Cell 3</td>
				<td>Cell 4</td>
				<td>Cell 5</td>
			</tr>
			<tr>
				<td>Cell 1</td>
				<td>Cell 2</td>
				<td>Cell 3</td>
				<td>Cell 4</td>
				<td>Cell 5</td>
			</tr>
			<tr>
				<td>Cell 1</td>
				<td>Cell 2</td>
				<td>Cell 3</td>
				<td>Cell 4</td>
				<td>Cell 5</td>
			</tr>
			<tr>
				<td>Cell 1</td>
				<td>Cell 2</td>
				<td>Cell 3</td>
				<td>Cell 4</td>
				<td>Cell 5</td>
			</tr>
		</tbody>
	</table>


        
</div>
</body>
</html>





