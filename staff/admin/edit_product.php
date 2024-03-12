<?php
include_once('../../public/includes/dbh.inc.php');

if (isset($_GET['pid'])) {
    $pid = $_GET['pid'];

    $sql = "SELECT * FROM products WHERE pid = $pid";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);
    
    
?>
        <!DOCTYPE html>
        <html lang="en">
    <head>
        <link rel="shortcut icon" href="/public/images/logo_64.png">
        <link rel="stylesheet" href="../../scrollbar.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100;200;300;400;500;600;700;800;900&family=Red+Hat+Text:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../../public/output.css">
        <title>Edit Products</title>
    </head>

        <body class="font-redhat bg-gradient-to-r from-orange-100 via-amber-50 to-orange-100">
                <a href="show_products.php" class="hover:bg-primary hover:text-white md:py-3 md:text-lg md:px-5 md:ml-12 hover:border-transparent inline-flex items-center justify-center px-4 py-2 mt-1 text-base font-medium text-gray-700 border border-gray-700 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                </svg>
                </a>
                
            <div class="my-4">
                <h1 class="text-2xl font-semibold text-center">Edit Product details</h1> <br>
                <form action="update_product.php" method="post" enctype="multipart/form-data" class="flex flex-col items-center justify-center">
                    <input type="hidden" name="pid" value="<?php echo $pid; ?>">

                    <label for="name">Product Name:</label>
                    <input type="text" id="name" name="name"class="rounded-lg"  value="<?php echo $product['name']; ?>" required><br><br>

                    <label for="type">Category:</label>
                        <select name="type" id="type" class="rounded-lg" required>
                            <option value="Vegetable" <?php echo $product['type'] === 'Vegetable' ? 'selected' : ''; ?>>Vegetable</option>
                            <option value="Fruit" <?php echo $product['type'] === 'Fruit' ? 'selected' : ''; ?>>Fruit</option>
                            <option value="Meat" <?php echo $product['type'] === 'Meat' ? 'selected' : ''; ?>>Meat</option>
                            <option value="Dairy" <?php echo $product['type'] === 'Dairy' ? 'selected' : ''; ?>>Dairy</option>
                            <option value="Other" <?php echo $product['type'] === 'Other' ? 'selected' : ''; ?>>Other</option>
                        </select><br><br>

                    <label for="price">Price:</label>
                    <input type="number" id="price" name="price" class="rounded-lg" value="<?php echo $product['price']; ?>" step="0.01" required><br><br>

                    <label for="qty">Quantity:</label>
                    <input type="number" id="qty" name="qty"class="rounded-lg"  value="<?php echo $product['qty']; ?>" required><br><br>

                    <label for="cod">COD (Cash on Delivery):</label>
                    <select id="cod" name="cod" class="rounded-lg" required>
                        <option value="y" <?php echo $product['COD'] == 'y' ? 'selected' : ''; ?>>Yes</option>
                        <option value="n" <?php echo $product['COD'] == 'n' ? 'selected' : ''; ?>>No</option>
                    </select><br><br>

                    <label for="image">Product Image:</label>
                    <input type="file" id="image" name="image" class="border-2 rounded-lg" onchange="previewImage(this);"> <br>
                    <img id="imagePreview" src="../../public/images/uploads/<?php echo $product['image']; ?>" alt="Product Image" class="max-h-64 mt-2 rounded-md"><br><br>


                    <button type="submit" class="hover:border-primary hover:text-white hover:bg-primary border-primary px-8 py-4 bg-white border-2 rounded-full shadow-sm">Update Product</button>
                </form>
            </div>
            <script>
                function previewImage(input) {
                    var preview = document.getElementById('imagePreview');
                    var file = input.files[0];
                    var reader = new FileReader();

                    reader.onloadend = function () {
                        preview.src = reader.result;
                    };

                    if (file) {
                        reader.readAsDataURL(file);
                    } else {
                        preview.src = "";
                    }
                }   
            </script>
        </body>

        </html>
<?php
    } else {
        echo "Product not found.";
    }
} else {
    echo "Product ID not provided.";
}
?>
