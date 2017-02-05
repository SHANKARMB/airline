<!DOCTYPE html>
<html>
<head>
<style>


</style>
<title>Fly High Airline Booking : Select Page</title>
<link rel='stylesheet' href='css/select.css'>
<script>

			var booking,flight,flightOptions;
			var selectedSeats=[];
			var selectedFno="";

			function confirmSeats(){

				if(selectedSeats.length!=0){

					for(j=0;j<selectedSeats.length;j++)
						if(flight[j][0]==selectedFno)
							break;

					str="wish to book "+selectedSeats.length+" seats from "+flight[j][1];
					str+=" Flight, From: "+flight[j][2]+", To: "+flight[j][3]+", Departure Date: ";
					str+=flight[j][4]+", SeatNos: "+selectedSeats.join(" ");

					if(window.confirm(str))
						document.getElementsByName("submit")[0].click();
				}
				else
					window.alert("No Seats Selected");

			}


			function checkSelection(fno,tid){
				abc=[];
				for(i=0;i<selectedSeats.length;i++)
				if(tid==selectedSeats[i])break;

				if(i==selectedSeats.length){
					selectedSeats.push(tid);
					document.getElementById(tid).setAttribute("style","background:yellow;color:black;");
				}
				else {
					delete selectedSeats[i];
					document.getElementById(tid).setAttribute("style","background:lightblue;color:black;");
				}
				//window.alert(selectedSeats.length);
				for(i=0;i<selectedSeats.length;i++)
					if(selectedSeats[i]!=undefined)
					abc.push(selectedSeats[i]);
				selectedSeats=abc;
				document.getElementsByName("selectedSeats")[0].setAttribute("value",selectedSeats.join(" "));

			}

			function viewSeats(fno,seats){
					if(selectedFno!=fno){
						if(selectedFno!="")
							document.getElementById(selectedFno).setAttribute("style","background:lightgreen;color:black;");
						selectedFno=fno;
						document.getElementById(selectedFno).setAttribute("style","background:yellow;color:black;");
						document.getElementsByName("selectedFno")[0].setAttribute("value",selectedFno);
						booking=document.getElementById("booking").innerHTML;
						booking=booking.split(";");
						for(i=0;i<booking.length;i++)
									booking[i]=booking[i].split(",");
						var bookingOptions;
						bookingOptions=document.createElement("div");
						bookingOptions.setAttribute("id","bookingOptions");
						printContent="<br><strong>Click on the row to see the seats</strong><br>";
						printContent="<table class=\"b\">";
						for(j=0;j<4;++j)
						{
								printContent+="<tr>";
								for(k=j;k<seats;k+=6){
									if(j!=3){
										printContent+="<td id='p"+k+"' onclick=\"checkSelection('"+fno+"',this.id)\">A-p"+k+"</td>";

									}
									else
										printContent+="<td><pre>      </pre></td>";

								}
								printContent+="</tr>";

								//window.alert(printContent);

						}
						for(j=3;j<6;++j)
						{
								printContent+="<tr>";
								for(k=j;k<seats;k+=6){
										printContent+="<td id='p"+k+"' onclick=\"checkSelection('"+fno+"',this.id)\">A-p"+k+"</td>";

								}
								printContent+="</tr>";

						}
						printContent+="</table>";


						bookingOptions.innerHTML=printContent;
						if(document.getElementById("bookingOptions"))
							document.getElementById("pbody").replaceChild(bookingOptions,document.getElementById("bookingOptions"));
						else
						document.getElementById("pbody").appendChild(bookingOptions);


						for(i=0;i<booking.length;i++)
							if(booking[i][0]==fno)break;

						index=i;
						if(index<booking.length){

						temp=booking[index];
						//window.alert(temp);
						for(i=1;i<temp.length;i++)
						{
							document.getElementById(temp[i]).innerHTML="B-"+temp[i];
							document.getElementById(temp[i]).setAttribute("style","background:black;color:lightblue;");
							document.getElementById(temp[i]).onclick="";
						}
						}


						selectedSeats=[];

					}
			}

			function loadreqd(){
					//window.alert("Lol");
					flight=document.getElementById("flight").innerHTML;
					flightOptions=document.createElement("div");
					flightOptions.setAttribute("id","flightOptions");
					flight=flight.split(";");
					flight.pop();
					//window.alert(flight[0]);
					for(i=0;i<flight.length;i++)
						flight[i]=flight[i].split(",");

					printContent="";
					userSelection=document.getElementById("userSelection").innerHTML.split(",");
					//window.alert(userSelection[1]);
					flightMeta=["Flight No","Flight Name","From Location","Destination","Departure Date","Departure Time","Arrival Date","Arrival Time","Seats"];
					printContent="<table class=\"f\">";
					printContent+="<tr>";
					for(j=1;j<flightMeta.length-1;j++){
								printContent+="<th >"+flightMeta[j]+"</th>";
					}
					printContent+="</tr>";
					//window.alert(userSelection[2]);

					for(i=0;i<flight.length;i++)
					{
						//window.alert(flight[i]);
						//if(flight[i][4]==userSelection[2] )

							printContent+="<tr id='"+flight[i][0]+"' onclick=\"viewSeats('"+flight[i][0]+"'"+","+flight[i][flight[i].length-1]+")\">";
							for(j=1;j<flight[i].length-1;j++){
								printContent+="<td >"+flight[i][j]+"</td>";

							}
							//window.alert(printContent);
							printContent+="</tr>";

					}
					printContent+="</table>";
					//window.alert(printContent);
					flightOptions.innerHTML=printContent;
					document.getElementById("pbody").appendChild(flightOptions);

			}
		</script>
</head>
<body onload="loadreqd()">

		<div class="phead" id="phead" >
			<h1 style="font-style: italic;">Fly High Airline Booking</h1>
			<table class="nav">
				<tr>

					<td class="nav"><a class="nav" href="index.php">Search</a></td>
					<td class="nav"><a class="nav" href="login.php">Login</a></td>
					<td class="nav"><a class="nav" href="help.html">Help</a></td>
				</tr>
			</table>
		</div>
		<div id="phidden" >
			<?php
				if(isset($_POST['submit'])){
					$servername = "localhost";
					$username = "root";
					$password = "";
					$dbname="airline";
					$conn = mysqli_connect($servername, $username, $password,$dbname) or die ("Connection Error");
					extract($_POST);
					$depi=strtotime($depdate);
					$depd = date('Y-m-d',$depi+60*60*24);
					$sql1="select * from flight where fromloc=\"".$fromloc."\" and toloc=\"".$toloc."\""." and depdate >='".date('Y-m-d',$depi-60*60*24*4)."' and depdate <= '".date('Y-m-d',$depi+60*60*24*4)."'";
					$flightTable=mysqli_query($conn,$sql1);
					$flight="";
					$booking="";
					if($flightTable && mysqli_num_rows($flightTable)>0)
					{	//echo "</br>flight quired successfully";
						while($row=mysqli_fetch_assoc($flightTable))
						{	//echo "-".$row["flightno"]."-";
							$flight.=$row["flightno"].",".$row["fname"].",".$row["fromloc"].",".$row["toloc"].",".$row["depdate"].",".$row["deptime"];
							$flight.=",".$row["arrdate"].",".$row["arrtime"].",".$row["seats"].";";
							$sql2="select * from booking where flightno=\"".$row["flightno"]."\"";
							//echo $sql2;
							$bookingTable=mysqli_query($conn,$sql2);
							if($bookingTable && mysqli_num_rows($bookingTable)>0)
							{	//echo "</br>booking quired successfully";
								$booking.=$row["flightno"]."";
								while($row=mysqli_fetch_assoc($bookingTable))
									$booking.=",".$row["pseatno"];
								$booking.=";";
								//echo "-".$booking."-";
							}

							else if(mysqli_num_rows($bookingTable)<=0){
								//echo "</br>No Data in Table \"booking\" for flightno=".$row["flightno"];
							}
							else {
								//echo "</br>Error quering database for flightno=".$row["flightno"]." : ".mysqli_error($conn);
							}

							//echo "-".$flight."-";

						}
						//echo "</br>$flight";
					}

					else if(mysqli_num_rows($bookingTable)<=0){
						echo "</br>No Data in Table \"flight\"";
					}
					else {
						echo "</br>Error quering database: " . mysqli_error($conn);
					}
					echo "</br></br></br>";
					echo "<div id=\"flight\" style=\"display:none;\" >$flight</div>";
					echo "<div id=\"booking\" style=\"display:none;\" >$booking</div>";
					echo "<div id=\"userSelection\" style=\"display:none;\" >";
					foreach($_POST as $x => $xv)
						echo "$xv,";
					echo "</div>";
					mysqli_close($conn);
				}
			?>

		</div>
		<div id="pbody">

		</div>
		<div id="pfoot">
			<form action="booking.php" method="POST">
				<input type="text" name="selectedFno" style="display:none" />
				<input type="text" name="selectedSeats" style="display:none"  />
				<input type="button" value="Submit" name="confirm" onclick="confirmSeats()" />
				<input type="submit" value="select" name="submit" style="display:none">
			</form>
		</div>
	</body>
</html>
