<?php
$servername = "localhost";
$username = "if0_38133248";
$password = "kVsiqixLNvSB";
$dbname = "chess_tournament";

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];
$sql = "SELECT name FROM participants WHERE player_id = '$id'";
$result = $conn->query($sql);

$response = [];

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $response = ["exists" => true, "name" => $row['name']];
} else {
  $response = ["exists" => false];
}

echo json_encode($response);
$conn->close();
?>
