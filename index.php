<!DOCTYPE html>
<html>
<head>
<title>Fly High Airline Booking : Search Page</title>
<link rel='stylesheet' href='css/index.css'>
<script>

			function checkSubmission(){
					//window.alert("Lol");



			}
		</script>
</head>
<body onload="checkSubmission()">

		<div class="phead">
			<h1 style="font-style: italic;">Fly High Airline Booking</h1>
			<table class="nav">
				<tr>
					<td class="nav"><a class="nav" href="index.php">Search</a></td>
					<td class="nav"><a class="nav" href="login.php">Login</a></td>
					<td class="nav"><a class="nav" href="help.html">Help</a></td>
				</tr>
			</table>
		</div>
		<div id="pbody" >
			<h1>Welcome to Fly High Airline Booking</h1></br>
		</br>
			<form action="select.php" method="POST">
				<?php
					
// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:shankarserver1.database.windows.net,1433; Database = airline", "smbinju195", "Shankar195");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "smbinju195@shankarserver1", "pwd" => "Shankar195", "Database" => "airline", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:shankarserver1.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);

echo "<script>console.log('Connection Success');</script>";

				?>
				<table>

					<tr>
						<td>From:</td>
						<td>
							<input type="text" list="fromloclist" name="fromloc" id="fromloc" required />
							<datalist id="fromloclist">
								<?php
									$sql="select fromloc from flight";
									$result=sqlsrv_query($conn,$sql);
									if ($result && sqlsrv_num_rows($result) > 0)
										while($row = sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC))
											echo "<option value='".$row["fromloc"]."'>".$row["fromloc"]."</option>";
									else
										echo "<script>console.log('no data');</script>";

								?>
							</datalist>

						</td>
						<td>To:</td>
						<td>

							<input type="text" list="toloclist" name="toloc" id="toloc" required />
							<datalist id="toloclist">
								<?php
									$sql="select toloc from flight";
									$result=sqlsrv_query($conn,$sql);
									if ($result && sqlsrv_num_rows($result) > 0)
										while($row = sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC))
											echo "<option value='".$row["toloc"]."'>".$row["toloc"]."</option>";
									else
										echo "<script>console.log('no data');</script>";
									sqlsrv_close($conn);
								?>
							</datalist>

						</td>
					</tr>
					<tr>
						<td>Departure Date:</td>
						<td><input type="date" name="depdate"  /></td>
					</tr>
				</table>
				<input type="submit" name='submit' value="Check Availability" />
			</form>

		</div>
	</body>
</html>
