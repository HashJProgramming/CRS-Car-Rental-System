<?php
// connect to the database
$db = new PDO('mysql:host=localhost;dbname=car_rental', 'root', '');

// get the values from the form
$name = $_POST['name'];
$brand = $_POST['brand'];
$color = $_POST['color'];
$price = $_POST['price'];
$status = $_POST['status'];

// check if the student already exists
$sql = "SELECT * FROM cars WHERE name = :name";
$statement = $db->prepare($sql);
$statement->bindParam(':name', $name);
$statement->execute();

// if the car already exists, redirect to the index page
    if ($statement->fetchColumn() > 0) {
        header('Location: ../cars.php#error');
        exit();
    }
    // if the student does not already exist, proceed with adding them
    else {
        // prepare and execute the SQL query
        $sql = "INSERT INTO cars (name, brand, color, price, status)
                VALUES (:name, :brand, :color, :price, :status)";
        $statement = $db->prepare($sql);
        $statement->bindParam(':name', $name);
        $statement->bindParam(':brand', $brand);
        $statement->bindParam(':color', $color);
        $statement->bindParam(':price', $price);
        $statement->bindParam(':status', $status);
        $statement->execute();

        // redirect to the index page after adding the student
        header('Location: ../cars.php#success');
        exit();
    }