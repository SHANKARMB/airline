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
					extract($_POST);
					$servername = "localhost";
					$username = "root";
					$password = "";
					$dbname="airline";
					$conn = mysqli_connect($servername, $username, $password,$dbname);
					$sql1="select pid from user where pname='".$pname."' and ppassword='".$ppassword."'";
					#echo "---sql1----$sql1--------</br>";
					$pid=mysqli_query($conn,$sql1) or die("Transaction Failed<br/>".$sql1."-----".mysqli_error($conn));
					$pid=mysqli_fetch_assoc($pid);
					#echo "----pid------$pid---------</br>";
					$sql2="select * from booking where pid='".$pid["pid"]."'";
					#echo "--sql2---$sql2----</br>";
					$result=mysqli_query($conn,$sql2) or die("Transaction Failed<br/>".$sql2."-----".mysqli_error($conn));
					$str="<table>";
					$str.="<tr   ><th>Name</th><th>Mobile</th><th>EmaiID</th><th>Address</th><th>Seat No</th><th>Flight No</th></tr>";
					if ($result && mysqli_num_rows($result) > 0)
						while($row = mysqli_fetch_assoc($result)){
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
				mysqli_close($conn);
		?>
	</div>

	</body>
</html>
