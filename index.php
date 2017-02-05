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
					$servername = "localhost";
					$username = "root";
					$password = "";
					$dbname="airline";
					$conn = mysqli_connect($servername, $username, $password,$dbname);


				?>
				<table>

					<tr>
						<td>From:</td>
						<td>
							<input type="text" list="fromloclist" name="fromloc" id="fromloc" required />
							<datalist id="fromloclist">
								<?php
									$sql="select fromloc from flight";
									$result=mysqli_query($conn,$sql);
									if ($result && mysqli_num_rows($result) > 0)
										while($row = mysqli_fetch_assoc($result))
											echo "<option value='".$row["fromloc"]."'>".$row["fromloc"]."</option>";

								?>
							</datalist>

						</td>
						<td>To:</td>
						<td>

							<input type="text" list="toloclist" name="toloc" id="toloc" required />
							<datalist id="toloclist">
								<?php
									$sql="select toloc from flight";
									$result=mysqli_query($conn,$sql);
									if ($result && mysqli_num_rows($result) > 0)
										while($row = mysqli_fetch_assoc($result))
											echo "<option value='".$row["toloc"]."'>".$row["toloc"]."</option>";

									mysqli_close($conn);
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
