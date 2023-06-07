<?php
// connect to the database
$db = new PDO('mysql:host=localhost;dbname=car_rental', 'root', '');


$id = $_POST['data_id'];

// get the values from the form
$fullname = $_POST['fullname'];
$address = $_POST['address'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$sex = $_POST['sex'];

// check if the student already exists
$sql = "SELECT * FROM customers WHERE fullname = :fullname AND id != :id";
$statement = $db->prepare($sql);
$statement->bindParam(':fullname', $fullname);
$statement->bindParam(':id', $id);
$statement->execute();

// if the student already exists, redirect to the index page
if ($statement->fetchColumn() > 0) {
    header('Location: ../customers.php#error');
    exit();
}

// update the student record in the database
$sql = "UPDATE customers SET
        fullname = :fullname,
        address = :address,
        email = :email,
        phone = :phone,
        sex = :sex   
        WHERE id = :id";
$statement = $db->prepare($sql);
$statement->bindParam(':fullname', $fullname);
$statement->bindParam(':address', $address);
$statement->bindParam(':email', $email);
$statement->bindParam(':phone', $phone);
$statement->bindParam(':sex', $sex);
$statement->bindParam(':id', $id);
$statement->execute();

// redirect to the cars after updating the student
header('Location: ../customers.php#success');
exit();

?>