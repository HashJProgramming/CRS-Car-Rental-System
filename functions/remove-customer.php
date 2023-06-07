<?php

// Connect to the database
$db = new PDO('mysql:host=localhost;dbname=car_rental', 'root', '');

// Get the form data
$id = $_POST['data_id'];

// Check if the customers exists
$sql = "SELECT * FROM customers WHERE id = :id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();

if ($stmt->rowCount() === 0) {
    header('Location: ../customers.php#error');
  exit;
}

// chec if the customer has any transactions
$sql = "SELECT * FROM transactions WHERE customer_id = :id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    // Remove the car from the database 
  $sql = "DELETE FROM transactions WHERE customer_id = :id";
  $stmt = $db->prepare($sql);
  $stmt->bindParam(':id', $id);
  $stmt->execute();
}


// Remove the car from the database 
$sql = "DELETE FROM customers WHERE id = :id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();

// Redirect the user to the home page
header('Location: ../customers.php#success');

?>