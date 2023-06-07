<?php
// connect to the database
$db = new PDO('mysql:host=localhost;dbname=car_rental', 'root', '');

// get the values from the form
$fullname = $_POST['fullname'];
$address = $_POST['address'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$sex = $_POST['sex'];

// check if the student already exists
$sql = "SELECT * FROM customers WHERE fullname = :fullname OR email = :email";
$statement = $db->prepare($sql);
$statement->bindParam(':fullname', $fullname);
$statement->bindParam(':email', $email);
$statement->execute();

// if the car already exists, redirect to the index page
    if ($statement->fetchColumn() > 0) {
        header('Location: ../customers.php#error');
        exit();
    }
    // if the student does not already exist, proceed with adding them
    else {
        // prepare and execute the SQL query
        $sql = "INSERT INTO customers (fullname, address, email, phone, sex)
                VALUES (:fullname, :address, :email, :phone, :sex)";
        $statement = $db->prepare($sql);
        $statement->bindParam(':fullname', $fullname);
        $statement->bindParam(':address', $address);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':phone', $phone);
        $statement->bindParam(':sex', $sex);
        $statement->execute();

        // redirect to the index page after adding the student
        header('Location: ../customers.php#success');
        exit();
    }