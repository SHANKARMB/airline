<!DOCTYPE html>
<html>
<head>
	<title>Fly High Airline Booking : Booking Page</title>
	<script type='text/javascript' src=''></script>
	<link rel='stylesheet' href='css/booking.css'>
</head>
<body onload="">
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


<?php




extract($_POST);



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



if(isset($_POST['register'])){

	$pid=time();
	$sql="insert into user (pid,pname,pmobile,pemailid,paddress,ppassword) values ('".$pid."','".$pname."','".$pmobile."','".$pemailid."','".$paddress."','".$ppassword."')";
	$result=sqlsrv_query($conn,$sql) or die("Transaction Failed<br/>".$sql."-----".sqlsrv_errors($conn));
	echo "<div id='success'>User Created !!</br>Enter the username and password to Login</div>";

	foreach( explode(" ",$selectedSeats) as $pseatno)
	{
		$sql1="insert into booking (pid,pname,pmobile,pemailid,paddress,pseatno,flightno) values ('";
		$sql1.=$pid."','".$pname."','".$pmobile."','".$pemailid."','".$paddress."','".$pseatno."','".$selectedFno."')";

		$result=sqlsrv_query($conn,$sql1) or die("Transaction Failed<br/>".$sql1."");
	}

	echo "<h2>Booked successfully..!!!</br>Login to check for your booking History..</br>Thank You.Visit Again</h2>";
	die();
}
else if(isset($_POST['login'])){

	$sql1="select pid from user where pname='".$pname."' and ppassword='".$ppassword."'";
	#echo "---sql1----$sql1--------</br>";
	$pid=mysqli_query($conn,$sql1) or die("Transaction Failed<br/>".$sql1."-----".sqlsrv_errors($conn));
	$pid=sqlsrv_fetch_array($pid,SQLSRV_FETCH_ASSOC));
	$sql2="select * from user where pid='".$pid["pid"]."'";
	#echo "--sql2---$sql2----</br>";
	$result=mysqli_query($conn,$sql2) or die("Transaction Failed<br/>".$sql2."-----".sqlsrv_errors($conn));
	$row=sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC));
	$pid=$row["pid"];
	$pname=$row["pname"];
	$pmobile=$row["pmobile"];
	$pemailid=$row["pemailid"];
	$paddress=$row["paddress"];

	foreach( explode(" ",$selectedSeats) as $pseatno)
	{
		$sql1="insert into booking (pid,pname,pmobile,pemailid,paddress,pseatno,flightno) values ('";
		$sql1.=$pid."','".$pname."','".$pmobile."','".$pemailid."','".$paddress."','".$pseatno."','".$selectedFno."')";

		$result=sqlsrv_query($conn,$sql1) or die("Transaction Failed<br/>".$sql1."");
	}


	echo "<h2>Booked successfully..!!!</br>Login to check for your booking History..</br>Thank You.Visit Again</h2>";
	die();
}

?>





		<div id="pbody">
		</br>
		<h2>Login or Register to Continue...</h2></br>

		</br><h2>Login</h2>
		<form id='booking1' name='login' method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" >

			</br><pre>Name:              </pre><input type="text" name="pname"  required="required"  />
			</br><pre>Password:          </pre><input type="password" name="ppassword"  required="required" />
			</br></br><input type="submit" name="login" value="Login"  />
		</form>



				</br><h2>Register</h2>
				<form id='booking2' name='register' method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" >

					</br><pre>Name:              </pre><input type="text" name="pname"   required="required" />
					</br><pre>Mobile#:           </pre><input type="text" onkeypress="checkNum(event)" maxlength=10 name="pmobile" required="required" />
					</br><pre>E-mailId:          </pre><input type="email" name="pemailid" required="required" />
					</br><pre>Address:           </pre><input type="text" name="paddress" required="required" />
					</br><pre>Password:          </pre><input type="password" name="ppassword" required="required" />
					</br></br><input type="submit" name="register" value="Register"  />
				</form>
				</br>
				</br>
			</br>
			</br>
		<?php



				if(isset($_POST['submit']) && $_POST['submit']=='select'){
					echo "<div style='display:none'>";
					echo "</br><pre>Selected Seats:     </pre><input type='text' name='selectedSeats' value='".$_POST['selectedSeats']."' form='booking1' />";
					echo "</br><pre>Selected FlightNo:  </pre><input type='text' name='selectedFno' value='".$_POST['selectedFno']."' form='booking1' />";
					echo "</br><pre>Selected Seats:     </pre><input type='text' name='selectedSeats' value='".$_POST['selectedSeats']."' form='booking2' />";
					echo "</br><pre>Selected FlightNo:  </pre><input type='text' name='selectedFno' value='".$_POST['selectedFno']."' form='booking2' />";
					echo "</div>";
					}




sqlsrv_close($conn);

		?>








</div>






</body>
</html>
