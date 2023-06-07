<?php
$db = new PDO('mysql:host=localhost;dbname=car_rental', 'root', '');

// Get the data from the form 
$customer_id = $_POST['customer_id'];
$car_id = $_POST['car_id'];
$borrow_date = $_POST['borrow'];
$return_date = $_POST['return'];

// Get the price
$sql = "SELECT price FROM cars WHERE id = $car_id";
$stmt = $db->prepare($sql);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$price = $row['price'];

// Convert the data to datetime
$borrow_date = new DateTime($borrow_date);
$return_date = new DateTime($return_date);

// Check if the check out date is in the past
if ($return_date <= $borrow_date) {
    header('location: ../transactions.php#error');
    exit;
}

// Get the difference between the two datetime objects
$diff = $return_date->diff($borrow_date);
// Get the number of days
$days = $diff->days;
// Calculate the total price
$total_price = $price * $days;

// Insert the data to the database
$sql = "INSERT INTO transactions (customer_id, car_id, borrow_date, return_date, total) VALUES (:customer_id, :car_id, :borrow_date, :return_date, :total_price)";
$stmt = $db->prepare($sql);
$stmt->bindParam(':customer_id', $customer_id);
$stmt->bindParam(':car_id', $car_id);
$stmt->bindParam(':borrow_date', $borrow_date->format('Y-m-d'));
$stmt->bindParam(':return_date', $return_date->format('Y-m-d'));
$stmt->bindParam(':total_price', $total_price);
$stmt->execute();


// Check if the cars exists
$sql = "SELECT * FROM cars WHERE id = :id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $car_id);
$stmt->execute();

if ($stmt->rowCount() === 0) {
    header('Location: ../transactions.php#error');
  exit;
}

// update the cars record in the database
$status = 0; // 0 means 'not available
$sql = "UPDATE cars SET
        status = :status   
        WHERE id = :id";
$statement = $db->prepare($sql);
$statement->bindParam(':status', $status);
$statement->bindParam(':id', $car_id);
$statement->execute();

header('location: ../transactions.php#success');