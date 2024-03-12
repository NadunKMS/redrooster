<?php

include_once('../../../public/includes/dbh.inc.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Your existing form processing logic

    // Handle image upload
    $name = $_POST['name'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $cod = $_POST['cod'];
    $qty= $_POST['quantity'];

    $targetDirectory = "../../../public/images/uploads/";

    $image = $name . '.' . pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
    $targetFile = $targetDirectory . $image;

    $uploadOk = 1;
    echo "Target File: " . $targetFile . "<br>";
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check === false) {
        echo "File is not an image.";
        $uploadOk = 0;
    }


    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    

    

    // Allow only certain file formats
    $allowedFormats = array("jpg", "jpeg", "png", "gif");
    if (!in_array($imageFileType, $allowedFormats)) {
        echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // If everything is ok, try to upload file
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } 

    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";

    } else {
        
        // If everything is ok, try to upload file
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->stmt_init();

        if ($stmt->prepare("INSERT INTO `products`(`name`, `type`, `price`, `COD`, `image`,`qty`) VALUES (?, ?, ?, ?, ?, ?)")) {
            $stmt->bind_param("ssdssd", $name, $type, $price, $cod, $image, $qty);

                       
            if ($stmt->execute()) {
                header('Location:../add_products.php?alert=success');
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Error preparing statement: " . $stmt->error;
        }

        $conn->close();
    }
}
?>
