<?php
session_start();
include_once('dbh.inc.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming the form fields are submitted as arrays
    $product_ids = $_POST['product_id'];
    $quantities = $_POST['quantity'];
    $totals = $_POST['total'];
    $pay_type = $_POST['pay_method'];

    // Get user information from the session
    $user_email = $_SESSION['email'];
    $user_fname = $_SESSION['fname'];

    // Calculate total cost
    $total_cost = array_sum($totals);

    // Insert order data into the 'orders' table
    $order_type = "online";
    $order_status = "pending";
    $order_time = date('Y-m-d H:i:s');

    $insert_order_sql = "INSERT INTO orders (user_email, type, total, time , pay_type) 
                         VALUES ('$user_email', '$order_type', '$total_cost', '$order_time' , '$pay_type')";

    if ($conn->query($insert_order_sql) === TRUE) {
        $order_id = $conn->insert_id;

        // Insert order items into the 'order_items' table
        for ($i = 0; $i < count($product_ids); $i++) {
            $product_id = $product_ids[$i];
            $quantity = $quantities[$i];
            $subtotal = $totals[$i];

            $insert_order_item_sql = "INSERT INTO order_items (order_id, pid, qty, total ,status) 
                                      VALUES ('$order_id', '$product_id', '$quantity', '$subtotal' ,'$order_status')";

            if ($conn->query($insert_order_item_sql) !== TRUE) {
                echo "Error inserting order items: " . $conn->error;
                // Handle any necessary error handling for order item insertion
            }
        }

        // If all order items are successfully inserted, delete cart
        $del_cart_sql = "DELETE FROM cart WHERE user_email = '$user_email'";
        
        if ($conn->query($del_cart_sql) === TRUE) {
            header('location:../orders.php?alert=thankyou');
        } else {
            echo "Error deleting cart: " . $conn->error;
        }

        // Redirect to a thank you page or any other desired destination
        // header("Location:../orders.php?alert=thankyou");
        exit();
    } else {
        // Handle error if insertion of order fails
        echo "Error inserting order: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
