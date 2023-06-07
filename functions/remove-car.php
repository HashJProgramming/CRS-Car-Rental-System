<?php

// Connect to the database
$db = new PDO('mysql:host=localhost;dbname=car_rental', 'root', '');

// Get the form data
$id = $_POST['data_id'];

// Check if the user exists
$sql = "SELECT * FROM cars WHERE id = :id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();

if ($stmt->rowCount() === 0) {
    header('Location: ../cars.php#error');
  exit;
}

// chec if the car has any transactions
$sql = "SELECT * FROM transactions WHERE car_id = :id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    // Remove the car from the database 
  $sql = "DELETE FROM transactions WHERE car_id = :id";
  $stmt = $db->prepare($sql);
  $stmt->bindParam(':id', $id);
  $stmt->execute();
}

// Remove the car from the database 
$sql = "DELETE FROM cars WHERE id = :id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();

// Redirect the user to the home page
header('Location: ../cars.php#success');

?>