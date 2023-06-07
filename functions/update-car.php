<?php
// connect to the database
$db = new PDO('mysql:host=localhost;dbname=car_rental', 'root', '');


$id = $_POST['data_id'];

// get the values from the form
$name = $_POST['name'];
$brand = $_POST['brand'];
$color = $_POST['color'];
$price = $_POST['price'];
$status = $_POST['status'];

// check if the student already exists
$sql = "SELECT * FROM cars WHERE name = :name AND id != :id";
$statement = $db->prepare($sql);
$statement->bindParam(':name', $name);
$statement->bindParam(':id', $id);
$statement->execute();

// if the student already exists, redirect to the index page
if ($statement->fetchColumn() > 0) {
    header('Location: ../cars.php#error');
    exit();
}

// update the student record in the database
$sql = "UPDATE cars SET
        name = :name,
        brand = :brand,
        color = :color,
        price = :price,
        status = :status   
        WHERE id = :id";
$statement = $db->prepare($sql);
$statement->bindParam(':name', $name);
$statement->bindParam(':brand', $brand);
$statement->bindParam(':color', $color);
$statement->bindParam(':price', $price);
$statement->bindParam(':status', $status);
$statement->bindParam(':id', $id);
$statement->execute();

// redirect to the cars after updating the student
header('Location: ../cars.php#success');
exit();

?>