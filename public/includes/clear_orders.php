<?php
session_start();
include_once('dbh.inc.php');

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Your SQL query to delete orders with status 'success' or 'canceled'
    $sql = "DELETE FROM `order_items` WHERE status IN ('completed', 'canceled')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Orders cleared successfully";
    } else {
        echo "Error clearing orders: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Invalid request method";
}


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['orderId']) && isset($_GET['productId'])) {
        $orderId = $_GET['orderId'];
        $productId = $_GET['productId'];

        // Use prepared statement to prevent SQL injection
        $updateSql = "UPDATE `order_items` SET status = 'canceled' WHERE pid = ? AND order_id = ?";
        $stmt = $conn->prepare($updateSql);
        $stmt->bind_param("ii", $productId, $orderId);

        if ($stmt->execute()) {
            header('location: ../orders.php');
        } else {
            echo "Error updating order status: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "Invalid request";
    }
} else {
    echo "Invalid request method";
}

?>
