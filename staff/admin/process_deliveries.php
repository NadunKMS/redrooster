<?php
include_once('../../public/includes/dbh.inc.php');

$order_id = $_POST['order_id'];
$ds_id = $_POST['ds_id'];

// Check delivery staff availability
$availability_result = $conn->query("SELECT availability FROM delivery_staff WHERE ds_id = $ds_id");
$availability_row = $availability_result->fetch_assoc();
$availability = trim($availability_row['availability']);

if ($availability == 'available') {
    // Fetch additional information about the order and customer
    $order_info_result = $conn->query("SELECT * FROM orders WHERE oid = $order_id");
    $order_info = $order_info_result->fetch_assoc();
    
    // Get the user_email from the order_info
    $customeremail = $order_info['user_email'];

    $customer_info_result = $conn->query("SELECT customer_id FROM customers WHERE email = '$customeremail'");
    $customer_info = $customer_info_result->fetch_assoc();

    // Update the status in the order_items table
    $conn->query("UPDATE order_items SET status = 'assigned' WHERE order_id = $order_id");

    // Insert data into the deliveries table
    $conn->query("INSERT INTO deliveries (ds_id, o_id, c_id, tracking_status) 
                  VALUES ($ds_id, $order_id, {$customer_info['customer_id']}, 'assigned')");

    // Update delivery staff availability to unavailable
    $conn->query("UPDATE delivery_staff SET availability = 'unavailable' WHERE ds_id = $ds_id");

    // echo "Delivery Staff successfully assigned to Order!";
     header('location:deliveries.php');
} else {
    echo "Delivery Staff is not available.";
    echo "ds_id: $ds_id, availability: $availability";
}

$conn->close();
?>
