<?php
$GroupName = $_POST['GroupName'];
$FormDay = $_POST['Day'];
$FormIndex = $_POST['Index'];
$Whatdo = $_POST['WhatDo'];
$Name = $_POST['Name'];

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

if($Whatdo == "close"){
//mark unavailable
$sql = "UPDATE Availability,Groupst SET Availability.Open=1 WHERE Groupst.LoginName='".
	$GroupName."'AND Availability.Day='".$FormDay."' AND Availability.StartIndex=".
	$FormIndex.";" ;
$result = $conn->query($sql);

$sql = "UPDATE Availability,Groupst SET Availability.Reason='".$Name."' WHERE Groupst.LoginName='".
	$GroupName."'AND Availability.Day='".$FormDay."' AND Availability.StartIndex=".
	$FormIndex.";" ;
$result = $conn->query($sql);

} else {
//mark availbable
$sql = "UPDATE Availability,Groupst SET Availability.Open=0 WHERE Groupst.LoginName='".
	$GroupName."'AND Availability.Day='".$FormDay."' AND Availability.StartIndex=".
	$FormIndex.";" ;
$result = $conn->query($sql);

$sql = "UPDATE Availability,Groupst SET Availability.Reason='' WHERE Groupst.LoginName='".
	$GroupName."'AND Availability.Day='".$FormDay."' AND Availability.StartIndex=".
	$FormIndex.";" ;
$result = $conn->query($sql);

}
echo "<html><head><meta http-equiv=\"refresh\" content=\"0;url=group.php\" /></head><body><h1>Redirecting to login in 0 seconds...</h1></body></html>";
//echo redirect back to group


$conn->close();
?>
