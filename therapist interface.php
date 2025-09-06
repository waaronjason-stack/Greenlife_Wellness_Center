<?php
session_start();

// Redirect if not logged in or not a therapist
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'therapist') {
    header("Location: login.php");
    exit;
}

$name = $_SESSION['user_name'];

include("db.php");

// SQL query to fetch therapist's appointments
$sql = "SELECT a.id, u.name AS client_name, a.service, a.date
        FROM appointments a
        JOIN users u ON a.client_id = u.id
        WHERE a.therapist = ?
        ORDER BY a.date ASC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $name);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Therapist Portal - GreenLife Wellness Center</title>

  <link rel="stylesheet" href="stylesheet.css">
  
</head>
<body>

        <h1 style="background-color: rgb(7, 93, 45); color: rgb(252, 252, 252);"> Greenlife wellness center </h1>
    <p><h2 style="text-align: center;"> The body calms the mind with organic food, yoga, ayruwedha, traditional music and nature</h2></p>
  <h1>Therapist Portal</h1>

  <!-- Manage Schedule -->
  <h2>Manage Personal Schedule & Availability</h2>
  <form id="scheduleForm">
    <label>Available Date & Time:</label>
    <input type="datetime-local" id="availableSlot">
    <button type="submit">Add Availability</button>
  </form>
  <ul id="availabilityList"></ul>

  <!-- View Client Appointments -->
  <h2>Assigned Client Appointments</h2>
  <ul id="clientAppointments">
    <li>No appointments assigned yet</li>
  </ul>

  <!-- Access Client Profiles -->
  <h2>Client Wellness Profiles (Read-Only)</h2>
  <div>
    <strong>Client: John Doe</strong>
    <ul>
      <li>Past Appointments: Yoga - 2 sessions</li>
      <li>Health Info: Age 35, Male, Active lifestyle</li>
      <li>Progress Records: Improved flexibility, recommended breathing exercises</li>
    </ul>
  </div>
  <div>
    <strong>Client: Jane Smith</strong>
    <ul>
      <li>Past Appointments: Ayurvedic Therapy - 1 session</li>
      <li>Health Info: Age 40, Female, Sedentary lifestyle</li>
      <li>Progress Records: Stress reduction, dietary changes recommended</li>
    </ul>
  </div>

  <!-- Add Progress Notes -->
  <h2>Update Progress Notes</h2>
  <form id="notesForm">
    <label>Client Name:</label>
    <input type="text" id="clientName"><br><br>
    <label>Notes:</label><br>
    <textarea id="progressNotes"></textarea><br>
    <button type="submit">Save Notes</button>
  </form>
  <ul id="notesList"></ul>
  
</body>
</html>

