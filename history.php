<html>
	<head>
	<title>Fly High Airline Booking : History Page</title>
	<link rel='stylesheet' href='css/history.css'>

<style>

#pbody table{

border:solid black 2px;border-collapse:collapse;margin-left: 4%;margin-top: 3%;
width:70%;
    background-color: #2b193f;
    color: #faad51;

font-size: 1.5em;
}
#pbody td{

border:solid black 2px;border-collapse:collapse;

}
#pbody th{

border:solid black 2px;border-collapse:collapse;

}
.ptitle{
	color:rgb(255, 0, 74);
	padding-left:43%;
}

body{
background-image:url(images/abc.jpg);
width:80%;
margin-left:20%;

}

h1{
margin-top:3%;
margin-left: 21.5%;font-size:3em;
height:10%;

}
a.nav {text-decoration:none;}
a.nav:focus{text-decoration:none;}
table.nav {
width: 40%;
    text-align: center;
    margin-left: 18%;
    height: 5%;
}

td.nav {
color:#ebb495;
background-color:rgba(255, 0, 0, 0.7);
font-size:2em;
border-style: outset;
width: 33.33333%;
}
th.nav {
color:#ebb495;
background-color:rgba(255, 0, 0, 0.7);
font-size:2em;
border-style: outset;
width: 33.33333%;
}

a.nav {color: inherit;}

td.nav:hover{

	background-color:#ebb495;
	color:rgba(255, 0, 0, 0.7);
	box-shadow: 10px 10px 10px 5px #888888;
	cursor:hand;
}
th.nav:hover {

	background-color:#ebb495;
	color:rgba(255, 0, 0, 0.7);
	box-shadow: 10px 10px 10px 5px #888888;
	cursor:hand;
}




</style>


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


		<div id="pbody">
		<?php

				if(isset($_POST['login'])){
					
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
extract($_POST);
foreach($_POST as $x => $xv)
						echo "$x => $xv,";
echo "<script>console.log('Lol,...');</script>";						
					$sql1="select pid from user1 where pname='".$pname."' and ppassword='".$ppassword."'";
					echo "<script>console.log($sql1);</script>";
					#echo "---sql1----$sql1--------</br>";
					$pid=sqlsrv_query($conn,$sql1) or die("Transaction Failed<br/>".$sql1."-----".sqlsrv_errors($conn));
					$pid=sqlsrv_fetch_array($pid,SQLSRV_FETCH_ASSOC);
					echo "<script>console.log('pid ==== $pid');</script>";
					#echo "----pid------$pid---------</br>";
					$sql2="select * from booking where pid='".$pid["pid"]."'";
					#echo "--sql2---$sql2----</br>";
					$result=sqlsrv_query($conn,$sql2) or die("Transaction Failed<br/>".$sql2."-----".sqlsrv_errors($conn));
					$str="<table>";
					$str.="<tr><th>Name</th><th>Mobile</th><th>EmaiID</th><th>Address</th><th>Seat No</th><th>Flight No</th></tr>";
					if ($result && sqlsrv_num_rows($result) > 0)
						while($row = sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC)){
							$str.="<tr     >";
							$str.="<td>".$row["pname"]."</td>";
							$str.="<td>".$row["pmobile"]."</td>";
							$str.="<td>".$row["pemailid"]."</td>";
							$str.="<td>".$row["paddress"]."</td>";
							$str.="<td>".$row["pseatno"]."</td>";
							$str.="<td>".$row["flightno"]."</td>";
							$str.="</tr>";
						}
					$str.="</table>";
					echo "$str";
					die();
				}
				sqlsrv_close($conn);
		?>
	</div>

	</body>
</html>
