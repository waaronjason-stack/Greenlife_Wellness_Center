<?php
// Database connection settings
$servername = "localhost";   // change if needed
$username   = "root";        // your DB username
$password   = "";            // your DB password
$dbname     = "greenlife";   // your DB name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get form data (with basic security)
$name      = htmlspecialchars($_POST['name']);
$email     = htmlspecialchars($_POST['email']);
$phone     = htmlspecialchars($_POST['phone']);
$password  = password_hash($_POST['password'], PASSWORD_DEFAULT); // secure password
$age       = intval($_POST['age']);
$gender    = htmlspecialchars($_POST['gender']);
$lifestyle = htmlspecialchars($_POST['lifestyle']);

// Insert into database
$sql = "INSERT INTO users (name, email, phone, password, age, gender, lifestyle) 
        VALUES ('$name', '$email', '$phone', '$password', '$age', '$gender', '$lifestyle')";

if ($conn->query($sql) === TRUE) {
  echo "Registration successful! <a href='guestlogin.html'>Click here to login</a>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>

    <link rel="stylesheet" href="stylesheet.css">
    
</head>
<body>
    
        <h1 style="background-color: rgb(7, 93, 45); color: rgb(252, 252, 252);"> Greenlife wellness center </h1>
    <p><h2 style="text-align: center;"> The body calms the mind with organic food, yoga, ayruwedha, traditional music and nature</h2></p>

<!-- Registration Form -->

  
    <h2>Create Account</h2>
    <input type="text" id="name" placeholder="Full Name"> <br>
    <input type="text" id="name" placeholder="user Name"> <br>
    <input type="email" id="email" placeholder="Email"> <br>
    <input type="tel" id="phone" placeholder="Phone Number"> <br>
    <input type="password" id="password" placeholder="Password"> <br>
    <input type="number" id="age" placeholder="Age"> <br>
    <select id="gender"> <br>
      <option value="">Gender </option>
      <option>Male</option>
      <option>Female</option>
      <option>Other</option>
    </select> <br>
    <input type="text" id="lifestyle" placeholder="Lifestyle Details (optional)">
    <button> <a href="guestlogin.html">Register</button></a> 

  

</body>
</html>

