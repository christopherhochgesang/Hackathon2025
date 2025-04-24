<!DOCTYPE HTML>
<head>
        <title>Signup</title>
        <link rel="stylesheet" href="style.css">
</head>
<body>
        <p>Group Scheduler!</p>
        <a href = "homepage.html">Homepage</a>
        <p>Signup</p>
        <form action="processSignup.php" method="POST">
                <label for="GroupName">Groupname</label><br>
                <input type="text" id="GroupName" name="GroupName"><br>
                <label for="Password">Password</label><br>
                <input type="text" id="Password" name="Password">
                <input type="submit" value="Sign Up!">
        <p><b>THIS SITE IS HORRIFICALLY INSECURE!!! PASSWORDS ARE STORED IN PLAINTEXT AND IS EXTREMELY VULNERABLE TO SQL INJECTION! DO NOT USE A PASSWORD YOU'D USE ANYWHERE ELSE!!!</b></p>
        </form>
</body>

