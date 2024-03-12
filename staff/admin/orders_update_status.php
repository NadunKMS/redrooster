<?php
include_once('../../public/includes/dbh.inc.php');

// Check if orderId and status are set in the POST request
if (isset($_POST['orderId']) && isset($_POST['status'])) {
    // Sanitize and retrieve values from the POST data
    $orderId = mysqli_real_escape_string($conn, $_POST['orderId']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    // Update the status in the order_items table
    $updateSql = "UPDATE order_items SET status = '$status' WHERE order_id = '$orderId'";
    if (mysqli_query($conn, $updateSql)) {
        echo "Order status updated successfully";
    } else {
        echo "Error updating order status: " . mysqli_error($conn);
    }
} else {
    // Handle the case where orderId or status is not set in the POST request
    echo "Invalid request";
}

// Close the database connection
mysqli_close($conn);
?>