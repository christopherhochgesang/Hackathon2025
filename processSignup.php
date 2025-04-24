<?php
$LoginName = $_POST['GroupName'];
$FormPassword = $_POST['Password'];

$servername = "localhost:3306";
$username = "local_user";
$password = "Password1@";
$dbname = "GroupScheduler";

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if( $conn->connect_error){
	die("Connection failed: ". $conn->connect_error);

} else {

}

$sql = "SELECT * FROM Groupst WHERE LoginName = '".$LoginName."';";
$result = $conn->query($sql);

if(!$result){
	echo "Something when horribly wrogn :(\n";
	echo "<a href = \"http://20.83.153.193/homepage.html\">Homepage</a>";
}

if($result->num_rows<1){
	$count = "SELECT COUNT(*) AS Count FROM Groupst;";
	$countResult = $conn->query ($count);

	$countNum =(int)$countResult->fetch_assoc()['Count'];
	$sql = "INSERT INTO Groupst VALUES(". (string)($countNum+1) . ",'".$LoginName."','".$FormPassword."','".$LoginName."');";
	$conn->query($sql);
	$days=["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"];
	for($day = 0;$day<7;$day++){
		for($x=0;$x<48;$x++){
			if($x<14 || $x>42){
				$sql = "INSERT INTO Availability VALUES(".(string)($countNum+1).",".(string)($x).",'Default',"."1,'".$days[$day]."');";
				$conn->query($sql);
			} else {
				$sql = "INSERT INTO Availability VALUES(".(string)($countNum+1).",".(string)($x).",'',"."0,'".$days[$day]."');";
				$conn->query($sql);
			}
		}
	}
	echo "<html><head><meta http-equiv=\"refresh\" content=\"3;url=login.php\" /></head><body><h1>Redirecting to login in 3 seconds...</h1></body></html>";

} else {
 echo "account already exists\n";
 echo "<a href=\"signup.php\">Return to signup</a>";
}
$conn->close();
?>
