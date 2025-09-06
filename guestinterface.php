<?php
session_start();
if ($_SESSION['user_role'] !== 'client') {
    header("Location: login.php");
    exit;
}
$name = $_SESSION['user_name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>GreenLife Wellness Center - Client</title>

  <link rel="stylesheet" href="stylesheet.css">
  
</head>
<body>
        <h1 style="background-color: rgb(7, 93, 45); color: rgb(252, 252, 252);"> Greenlife wellness center </h1>
    <p><h2 style="text-align: center;"> The body calms the mind with organic food, yoga, ayruwedha, traditional music and nature</h2></p><br>
  <h1>GreenLife Wellness Center - Client Portal</h1>


  <!-- Services Section -->
  <h2>Our Services</h2>
  <div>Ayurvedic Therapy</div>
  <div>Yoga & Meditation Classes</div>
  <div>Nutrition & Diet Consultation</div>
  <div>Physiotherapy</div>
  <div>Massage Therapy</div>

  <!-- Appointment Booking -->
  <h2>Book an Appointment</h2>
  <form id="bookingForm">
    <label>Choose Service:</label>
    <select id="service">
      <option>Ayurvedic Therapy</option>
      <option>Yoga & Meditation Classes</option>
      <option>Nutrition & Diet Consultation</option>
      <option>Physiotherapy</option>
      <option>Massage Therapy</option>
    </select>
    <br><br>

    <label>Choose Therapist:</label>
    <select id="therapist">
      <option>Dr. Silva</option>
      <option>Dr. Fernando</option>
      <option>Dr. Perera</option>
      <option>Dr. Kumar</option>
    </select>
    <br><br>

    <label>Choose Date & Time:</label>
    <input type="datetime-local" id="datetime">
    <br><br>

    <button type="submit">Book Now</button>
  </form>
  

  <!-- My Appointments -->
  <h2>My Appointments</h2>
  <ul id="appointments"></ul>

  <!-- Personal Wellness Records -->
  <h2>My Wellness Records (Read-Only)</h2>
  <div>
    <strong>Past Appointments:</strong>
    <ul id="pastAppointments"><li>No records yet</li></ul>
  </div>
  <div>
    <strong>Therapist Notes / Recommendations:</strong>
    <ul id="therapistNotes"><li>No records yet</li></ul>
  </div>
  <div>
    <strong>Nutrition Plans / Yoga / Physiotherapy Exercises:</strong>
    <ul id="plans"><li>No records yet</li></ul>
  </div>

  
  
  <h2>Inquiry or Need Help?</h2>
  <a href="mailto:greenlifewellness@gmail.com">Email us</a> <br>




</body>
</html>