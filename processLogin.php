<?php
$LoginName = $_POST['GroupName'];
$FormPassword = $_POST['Password'];

$servername = "localhost:3306";
$username = "local_user";
$password = "Password1@";
$dbname = "GroupScheduler";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} else {

}

//$sql = "SELECT * FROM Groupst WHERE LoginName ='" . $fname ."';";
$sql = "SELECT * FROM Groupst WHERE LoginName ='".$LoginName."'AND Password='".$FormPassword."';";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  //return token
  echo "Login Successful!\n";
  echo "<html><head><meta http-equiv=\"refresh\" content=\"3;url=http://20.83.153.193/group.php\" /></head><body><h1>Redirecting in 3 seconds...</h1></body></html>";
  setcookie("GroupName",$LoginName);
  setcookie("Name",$_POST['Name']);
} else {
  echo "Login failed :(\n";
  echo "<a href = \"login.php\">Back to login</a>"; 
}

$conn->close();
?>
