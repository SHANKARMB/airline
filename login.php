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
					$servername = "localhost";
					$username = "root";
					$password = "";
					$dbname="airline";
					$conn = mysqli_connect($servername, $username, $password,$dbname);
					$sql="insert into user (pid,pname,pmobile,pemailid,paddress,ppassword) values ('".time()."','".$pname."','".$pmobile."','".$pemailid."','".$paddress."','".$ppassword."')";
					$result=mysqli_multi_query($conn,$sql) or die("Transaction Failed<br/>".$sql."-----".mysqli_error($conn));
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
