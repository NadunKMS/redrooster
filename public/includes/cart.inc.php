<?php

include_once('dbh.inc.php');
session_start();

// Check if 'email' key is set in the session
if (!isset($_SESSION['email'])) {
    header('Location: ../login.php?alert=notlogged');
    exit();
}

$email = $_SESSION['email'];
$pid = $_POST['pid'];
$qty = $_POST['qty'];
$price = $_POST['price'];
$total = ($qty * $price);

// Check if the product is already in the user's cart
$checkDuplicateSql = "SELECT * FROM cart WHERE user_email = '$email' AND product_id = '$pid'";
$result = $conn->query($checkDuplicateSql);

if ($result->num_rows > 0) {
    // If the combination exists, update the quantity and total
    $row = $result->fetch_assoc();
    $newQty = $row['quantity'] + $qty;
    $newTotal = $row['total'] + $total;

    $updateSql = "UPDATE cart SET quantity = '$newQty', total = '$newTotal' WHERE user_email = '$email' AND product_id = '$pid'";

    if ($conn->query($updateSql) !== TRUE) {
        echo "Error updating record: " . $conn->error;
    }
} else {
    // If the combination doesn't exist, insert a new record
    $insertSql = "INSERT INTO cart (user_email, product_id, quantity, total) VALUES ('$email', '$pid', '$qty', '$total')";

    if ($conn->query($insertSql) !== TRUE) {
        echo "Error inserting record: " . $conn->error;
    }
}

// Redirect to the home page or any other desired destination
header('Location: ../home.php?alert=pradded');
exit();
?>
