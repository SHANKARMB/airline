<html>
	<head>
	<title>Fly High Airline Booking : Login Page</title>
	<link rel='stylesheet' href='css/login.css'>
			<script>
		count=0;
		function checkNum(e) {
    var x = e.which || e.keyCode;
    if (x>57 || x<48) {
	e.preventDefault();

}
}

		</script>
	</head>
	<body>
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

		<div>



		</br><h2>Login</h2>
		<form name='login' method="POST" action="history.php" >

			</br><pre>Name:              </pre><input type="text" name="pname"  required="required"  />
			</br><pre>Password:          </pre><input type="password" name="ppassword"  required="required" />
			</br></br><input type="submit" name="login" value="Login"  />
		</form>
		</div>

		<?php

				if(isset($_POST['register'])){
					extract($_POST);
					foreach($_POST as $x => $xv)
						echo "$x => $xv,";
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


					$sql="insert into user1 (pid,pname,pmobile,pemailid,paddress,ppassword) values ('".time()."','".$pname."','".$pmobile."','".$pemailid."','".$paddress."','".$ppassword."')";
					$result=sqlsrv_query($conn,$sql) or die("Transaction Failed<br/>".$sql."-----".sqlsrv_errors($conn));
					echo "<div id='success'>User Created !!</br>Enter the username and password to Login</div>";
					die();
				}

		?>





		</br><h2>Register</h2>
		<form name='register' method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" >

			</br><pre>Name:              </pre><input type="text" name="pname"   required="required" />
			</br><pre>Mobile#:           </pre><input type="text" onkeypress="checkNum(event)" maxlength=10 name="pmobile" required="required" />
			</br><pre>E-mailId:          </pre><input type="email" name="pemailid" required="required" />
			</br><pre>Address:           </pre><input type="text" name="paddress" required="required" />
			</br><pre>Password:          </pre><input type="password" name="ppassword" required="required" />
			</br></br><input type="submit" name="register" value="Register"  />
		</form>



	</body>
</html>
