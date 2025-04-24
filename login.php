<!DOCTYPE HTML>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<p>Group Scheduler!</p>
	<a href="homepage.html">Homepage</a>
	<p>Login</p>
	 <form action="processLogin.php" method="POST">
  		<label for="GroupName">Groupname</label><br>
  		<input type="text" id="GroupName" name="GroupName"><br>
  		<label for="Password">Password</label><br>
  		<input type="text" id="Password" name="Password"><br>
		<label for="YourName">Your name</label><br>
		<input type="text" id="Name" name="Name">
		<input type="submit" value="login">
	</form>
</body>
