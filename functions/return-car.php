<?php
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

// get return date
$sql = "SELECT * FROM transactions WHERE id = :id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$transaction = $stmt->fetch(PDO::FETCH_ASSOC);
$borrow_date = $transaction['borrow_date'];
$return_date = $transaction['return_date'];
$total_rental = $transaction['total'];
$returned_date = date('Y-m-d');

// check if the car is returned late
if ($returned_date > $return_date) {
    $sql = "SELECT * FROM cars WHERE name = :name";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':name', $car);
    $stmt->execute();
    $car = $stmt->fetch(PDO::FETCH_ASSOC);
    $price = $car['price'];
    $days = (strtotime($returned_date) - strtotime($return_date)) / (60 * 60 * 24);
    $total = $price * $days;

    $sql = "UPDATE transactions SET
            penalty = :penalty,
            returned_date = :returned_date   
            WHERE id = :id";
    $statement = $db->prepare($sql);
    $statement->bindParam(':penalty', $total);
    $statement->bindParam(':returned_date', $returned_date);
    $statement->bindParam(':id', $id);
    $statement->execute();

    // update the cars record in the database
    $status = 1; // 1 means 'available
    $sql = "UPDATE cars SET
            status = :status   
            WHERE name = :name";
    $statement = $db->prepare($sql);
    $statement->bindParam(':status', $status);
    $statement->bindParam(':name', $car);
    $statement->execute();

    header('Location: ../success.php?borrow='.$borrow_date.'&total='.$total_rental.'&penalty=' . $total . '&days=' . $days . '&car=' . $car . '&returned_date=' . $returned_date . '&return_date=' . $return_date . '#success');
} else {
    $sql = "SELECT * FROM transactions WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $transaction = $stmt->fetch(PDO::FETCH_ASSOC);
    $borrow_date = $transaction['borrow_date'];
    $return_date = $transaction['return_date'];
    $total_rental = $transaction['total'];
    $returned_date = date('Y-m-d');

    $sql = "UPDATE transactions SET
            penalty = 0,
            returned_date = :returned_date   
            WHERE id = :id";
    $statement = $db->prepare($sql);
    $statement->bindParam(':returned_date', $returned_date);
    $statement->bindParam(':id', $id);
    $statement->execute();



    // update the cars record in the database
    $status = 1; // 1 means 'available
    $sql = "UPDATE cars SET
            status = :status   
            WHERE name = :name";
    $statement = $db->prepare($sql);
    $statement->bindParam(':status', $status);
    $statement->bindParam(':name', $car);
    $statement->execute();

    header('Location: ../success.php?borrow='.$borrow_date.'&total='.$total_rental.'&penalty=0&days=0&car=' . $car . '&returned_date=' . $returned_date . '&return_date=' . $return_date . '#success');

}
