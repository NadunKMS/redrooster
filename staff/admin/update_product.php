<?php
include_once('../../public/includes/dbh.inc.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pid = $_POST['pid'];

    // Get and sanitize other form fields
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $qty = mysqli_real_escape_string($conn, $_POST['qty']);
    $cod = mysqli_real_escape_string($conn, $_POST['cod']);

    // Check if a new image is uploaded
    if ($_FILES['image']['error'] == UPLOAD_ERR_OK) {
        // Delete the old image
        $sqlSelectImage = "SELECT image FROM products WHERE pid = $pid";
        $resultSelectImage = mysqli_query($conn, $sqlSelectImage);

        if ($resultSelectImage && mysqli_num_rows($resultSelectImage) > 0) {
            $oldImage = mysqli_fetch_assoc($resultSelectImage)['image'];
            $oldImagePath = '../../public/images/uploads/' . $oldImage;

            // Check if the old image file exists before attempting to delete
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        // Use the product name as the image name
        $newImageName = strtolower(str_replace(' ', '_', $name)) . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $newImagePath = '../../public/images/uploads/' . $newImageName;
        move_uploaded_file($_FILES['image']['tmp_name'], $newImagePath);

        // Update the database with the new image name
        $sql = "UPDATE products SET name = '$name', type = '$type', price = '$price', qty = '$qty', COD = '$cod', image = '$newImageName' WHERE pid = $pid";
    } else {
        // If no new image is uploaded, update the database without changing the image
        $sql = "UPDATE products SET name = '$name', type = '$type', price = '$price', qty = '$qty', COD = '$cod' WHERE pid = $pid";
    }

    // Perform the update
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('location:show_products.php?alert=productupdated');
    } else {
        echo "Error updating product details: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request method.";
}
?>
