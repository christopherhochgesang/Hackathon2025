<!DOCTYPE HTML>
<head>
	<title>GroupScheduler</title>
	<link rel="stylesheet" href="style.css">
	<link rel = "stylesheet" href="calendarStyle.css">
</head>
<body>
	<?php
	echo "Logged in as <b>".$_COOKIE["Name"]."</b> for <b>".$_COOKIE["GroupName"] . "</b> Group Scheduler";
	?>
	<div class="schedule">
		<div class = "times">
			<div class = "hour" style="color:white;">##:##</div>
			<?php
			for($time = 0;$time <48;$time++){
				if($time %2 ==0){
					//##:00
					echo "<div class =\"hour\">" . (string)(floor($time/2)).":00</div>\n";
				} else {
					//##:30
					echo "<div class =\"hour\">" . (string)(floor($time/2)).":30</div>\n";
				}
			}
			?>
		</div>
		<?php
		$servername = "localhost:3306";
		$username = "local_user";
		$password = "Password1@";
		$dbname = "GroupScheduler";

		$availabilityArray=[];
		$conn = new mysqli($servername, $username, $password, $dbname);

		if( $conn->connect_error){
		        die("Connection failed: ". $conn->connect_error);
		} else {
			$sql = "SELECT * FROM Availability,Groupst WHERE Groupst.GroupID=Availability.GroupID AND Groupst.LoginName='".$_COOKIE["GroupName"]."';";
			$result = $conn->query($sql);
			$availabilityArray=array_values($result->fetch_all());
		}
		$days=["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"];
		for($day=0;$day<7;$day++){
			echo "<div class = \"day\">".$days[$day]."\n";
			for($time = 0+48*$day;$time<48+48*$day;$time++){
				if($availabilityArray[$time][3]==0){
					//open block
					echo "<div class=\"available\">".
						"<form method = \"POST\" action = /processSchedule.php>".
						"<input type = \"hidden\" name = \"GroupName\" value=\"".$_COOKIE["GroupName"]."\"/>".
						"<input type = \"hidden\" name = \"Day\" value=\"".$days[$day]."\"/>".
						"<input type = \"hidden\" name = \"Index\" value=\"".($time-48*$day)."\"/>".
						"<input type = \"hidden\" name = \"WhatDo\" value=\"close\"/>".
						"<input type = \"hidden\" name = \"Name\" value=\"".$_COOKIE["Name"]."\"/>".
						"<button class = \"button\" type=\"submit\" >Mark Unavailable</button>".
						"</form>"."</div>\n";

				} else {
					//reserved block
					echo "<div class=\"unavailable\">".
						"<form method = \"POST\" action = /processSchedule.php>".
						"<input type = \"hidden\" name = \"GroupName\" value=\"".$_COOKIE["GroupName"]."\"/>".
						"<input type = \"hidden\" name = \"Day\" value=\"".($days[$day])."\"/>".
						"<input type = \"hidden\" name = \"Index\" value=\"".($time-$day*48)."\"/>".
						"<input type = \"hidden\" name = \"WhatDo\" value=\""."open"."\"/>".
						"<input type = \"hidden\" name = \"Name\" value=\"".$_COOKIE["Name"]."\"/>".
						"<button class = \"button\" type=\"submit\" >".$availabilityArray[$time][2]." - Mark Available</button>".
						"</form>".
						"</div>\n";
				}


			}
			echo "</div>\n";
		}
		?>
  	</div>
</body>
