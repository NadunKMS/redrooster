<?php

include_once('../public/includes/dbh.inc.php');

$name = $_POST['name'];
$mobile = $_POST['mobile'];
$address = $_POST['address'];
$email = $_POST['email'];
$password = $_POST['password'];

// Hash the password
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

// SQL query to insert data into delivery_staff table
$sql = "INSERT INTO delivery_staff (`Name`, `Mobile`, `Address`, `email`, `password`) 
        VALUES ('$name', '$mobile', '$address', '$email', '$hashed_password')";

if ($conn->query($sql) === TRUE) {
    // Get the ID of the last inserted row
    $last_inserted_id = $conn->insert_id;
    
    // Redirect to the page using the ID
    header('location: delivery_staff_member.php?id=' . $last_inserted_id);
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>