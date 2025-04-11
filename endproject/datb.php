<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "endproject";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from POST request
$start_point = $_POST['start_point'];
$destination_point = $_POST['destination_point'];
$transport_mode = $_POST['transport_mode'];
$distance = $_POST['distance'];
$duration = $_POST['duration'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO routes (start_point, destination_point, transport_mode, distance, duration) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $start_point, $destination_point, $transport_mode, $distance, $duration);

// Execute the statement
if ($stmt->execute()) {
    echo "New route saved successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close connections
$stmt->close();
$conn->close();
?>