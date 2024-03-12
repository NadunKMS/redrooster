<?php
session_start(); 
if(isset($_SESSION['email'])){
  $loggedIn = true;
  $email =$_SESSION['email'];
  $fname =$_SESSION['fname'];
  $lname =$_SESSION['lname'];
  if(!isset($fname)){
    header('Location:includes/signout.inc.php');
  }
}
include_once('dbh.inc.php');

// Check if the product_id is provided in the URL
if (isset($_GET['cart_id']) && is_numeric($_GET['cart_id'])) {
    // Sanitize the input to prevent SQL injection
    $cart_id = mysqli_real_escape_string($conn, $_GET['cart_id']);

    // Prepare the DELETE query
    $delete_query = "DELETE FROM cart WHERE id = '$cart_id'";

    // Execute the DELETE query
    if (mysqli_query($conn, $delete_query)) {
        // Deletion successful
        header("Location:../cart.php");
    } else {
        // Deletion failed
        echo "Error deleting product: " . mysqli_error($conn);
    }
} else {
    // Product ID not provided or invalid
    echo "Invalid product ID";
}

if (isset($_GET['id']) && isset($_GET['quantity'])) {
    $productId = $_GET['id'];
    $newQuantity = $_GET['quantity'];

    // Fetch the product price from the database
    $priceQuery = "SELECT price FROM products WHERE pid = $productId";
    // Execute the query using your database connection

    $priceResult = $conn->query($priceQuery);

if ($priceResult && $priceResult->num_rows > 0) {
    $row = $priceResult->fetch_assoc();
    $productPrice = $row['price'];

    // Calculate the new total
    $newTotal = $productPrice * $newQuantity;

    // Update the quantity and total in the cart table
    $updateSql = "UPDATE cart SET quantity = $newQuantity, total = $newTotal WHERE product_id = $productId AND user_email = '$email'";
    // Execute the update query using your database connection

    echo $updateSql;
    
    if (mysqli_query($conn, $updateSql)) {
        // Update successful
        header("Location:../cart.php");
        exit();
    } else {
        // Update failed
        echo "Error updating cart: " . mysqli_error($conn);
    }
} else {
    // Handle the case when the product is not found
    echo "Product not found";
}

} else {
    // Handle the case when id or quantity is not provided in the URL
    echo "Invalid request";
}

// Close the database connection
mysqli_close($conn);
?>