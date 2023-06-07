<?php
// Connect to the database
$db = new PDO('mysql:host=localhost;dbname=car_rental', 'root', '');

// Get the form data
$id = $_POST['data_id'];
$car = $_POST['car_id'];

// Check if the transactions exists
$sql = "SELECT * FROM transactions WHERE id = :id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();

if ($stmt->rowCount() === 0) {
    header('Location: ../transactions.php#error');
  exit;
}

// Remove the transactions from the database 
$sql = "DELETE FROM transactions WHERE id = :id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();


// Check if the cars exists
$sql = "SELECT * FROM cars WHERE name = :name";
$stmt = $db->prepare($sql);
$stmt->bindParam(':name', $car);
$stmt->execute();

if ($stmt->rowCount() === 0) {
    header('Location: ../transactions.php#error');
  exit;
}

// update the cars record in the database
$status = 1; // 1 means 'available
$sql = "UPDATE cars SET
        status = :status   
        WHERE name = :name";
$statement = $db->prepare($sql);
$statement->bindParam(':status', $status);
$statement->bindParam(':name', $car);
$statement->execute();

// Redirect the user to the transactions page
header('Location: ../transactions.php#success');

?>