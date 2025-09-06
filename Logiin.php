<?php
// Simple login script (for demo only, not production-safe!)

$valid_username = "admin";   // example username
$valid_password = "12345";   // example password

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username === $valid_username && $password === $valid_password) {
        // Redirect to guest interface if login is successful
        header("Location: guestinterface.html");
        exit();
    } else {
        echo "<h2 style='color:red;'>Invalid Username or Password</h2>";
        echo "<a href='login.html'>Go back</a>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Client Login - GreenLife Wellness</title>
  <link rel="stylesheet" href="stylesheet.css">
</head>
<body>

  <h1 style="background-color: rgb(7, 93, 45); color: rgb(252, 252, 252);"> Greenlife Wellness Center </h1>
  <h2 style="text-align: center;"> The body calms the mind with organic food, yoga, ayruwedha, traditional music and nature</h2>

  <div style="display:flex; align-items: center; justify-content: center;">
    <img src="images/login.webp" height="300" width="400">
  </div>

  <!-- Login Form -->
  <h2>Login</h2> 
  <form action="login.php" method="POST">
    <input type="text" name="username" placeholder="Username or Email" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button type="submit">Login</button>
  </form>
  
  <br>
  <a href="forgotpassword.html"><button>Forgot Password?</button></a>
  <br><br>
  <a href="Register.php">Register</a>

</body>
</html>
