<?php
$email = $_POST['email'];
$password = $_POST['pwd'];

include_once('../public/includes/dbh.inc.php');

$sql = "SELECT * FROM `delivery_staff` WHERE `email` = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // If email is found
    $row = $result->fetch_assoc();
    $hashed_password = $row['password'];
    
    // Verify password using password_verify function
    if (password_verify($password, $hashed_password)) {
       header('location:delivery_staff_member.php?id='.$row['ds_id']);
    } else {
       header('location:delivery_staff_member.php?id='.$row['ds_id']);
    }
} else {
    echo "Incorrect email or password";
}

$conn->close();
?>
