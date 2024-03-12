<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add products</title>
    <link rel="shortcut icon" href="/public/images/logo_64.png">
    <link rel="stylesheet" href="../../scrollbar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100;200;300;400;500;600;700;800;900&family=Red+Hat+Text:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../public/output.css">
</head>
<body class="font-redhat bg-gradient-to-r from-orange-100 via-amber-50 to-orange-100">

    <a href="employee.php" class="hover:bg-primary hover:text-white md:py-3 md:text-lg md:px-5 md:ml-12 hover:border-transparent inline-flex items-center justify-center px-4 py-2 mt-1 text-base font-medium text-gray-700 border border-gray-700 rounded-full">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
        </svg>
    </a>
    <h1 class="md:text-3xl font-lexend my-4 text-2xl font-bold text-center">Add Daily Products</h1>
    <p id='dateString' class="text-center"></p>
    <br>
<div class="flex justify-center">
    <?php
// Assuming you have a database connection
include_once('../../public/includes/dbh.inc.php');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch products data
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
// $row = $result->fetch_assoc();

if ($result->num_rows > 0) {
    // Create a dropdown menu for product selection
    echo "<form>";
    echo '
    <div class="flex flex-col">
  <div class="-m-1.5 overflow-x-auto">
    <div class="p-1.5 min-w-full inline-block align-middle">
      <div class="dark:border-gray-700 overflow-hidden border rounded-lg">
        <table class="dark:divide-gray-700 min-w-full divide-y divide-gray-200 shadow-md">
          <thead class="dark:bg-gray-700 bg-gray-50">
            <tr>
              <th scope="col" class="text-start dark:text-gray-400 px-6 py-3 text-sm font-medium text-gray-900 uppercase">Product ID</th>
              <th scope="col" class="text-start dark:text-gray-400 px-6 py-3 text-sm font-medium text-gray-900 uppercase">Name</th>
              <th scope="col" class="text-start dark:text-gray-400 px-6 py-3 text-sm font-medium text-gray-900 uppercase">Type</th>
              <th scope="col" class="text-end dark:text-gray-400 px-6 py-3 text-sm font-medium text-gray-900 uppercase">Price</th>
              <th scope="col" class="text-end dark:text-gray-400 px-6 py-3 text-sm font-medium text-gray-900 uppercase">Quantity</th>
              <th scope="col" class="text-end dark:text-gray-400 px-6 py-3 text-sm font-medium text-gray-900 uppercase">New Quantity</th>
            </tr>
          </thead>
          <tbody class="dark:divide-gray-700 bg-white divide-y divide-gray-200">';
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td class="whitespace-nowrap px-6 py-4 text-sm font-medium text-center text-gray-800">'.$row['pid'].'</td>';
                echo '<td class="whitespace-nowrap px-6 py-4 text-sm font-medium text-center text-gray-800">'.$row['name'].'</td>';
                echo '<td class="whitespace-nowrap px-6 py-4 text-sm font-medium text-center text-gray-800">'.$row['type'].'</td>';
                echo '<td class="whitespace-nowrap px-6 py-4 text-sm font-medium text-center text-gray-800">'.$row['price'].'</td>';
                echo '<td class="whitespace-nowrap px-6 py-4 text-sm font-medium text-center text-gray-800">'.$row['qty'].'</td>';
                echo '<td class="whitespace-nowrap px-6 py-4 text-sm font-medium text-center text-gray-800">
                <input type="number" class="text-sm text-center border border-gray-300 rounded-full" placeholder="new quantity" name="qty">
                </td>';
                echo '<td class="whitespace-nowrap dark:text-gray-200 px-6 py-4 text-sm font-medium text-blue-600"><button type="submit">Add</button></td>';
                echo '</tr>';
                 }
    echo '
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>';
} else {
    echo "No products found.";
}

$conn->close();
?>
</div>
    
    <!-- <form action="includes/add_products.inc.php" method="POST" enctype="multipart/form-data">
        <div class="font-redhat flex flex-col items-center justify-center mt-8">
         
        <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-700"> Product Name </label>
            <input type="text" name="name" class="form-input focus:ring-0 focus:border-primary font-redhat px-4 mb-4 text-sm border-0 border-b-2 border-gray-200" placeholder="Carrot">
        </div>

        <div class="mb-6">
            <label for="price" class="block mb-2 text-sm font-medium text-gray-700">Price (€)</label>
            <input type="number" name="price" class="form-input focus:ring-0 focus:border-primary font-redhat px-4 mb-2 text-sm border-0 border-b-2 border-gray-200" placeholder="Enter price">
        </div>
        
        <div class="mb-6">
            <select name="price_unit" id="price_unit" class="focus:outline-none focus:bg-white focus:border-gray-500 block w-full px-4 py-2 pr-8 leading-tight text-gray-700 bg-white border border-gray-200 rounded appearance-none">
                <option value="kg">Rate per (Kg)</option>
                <option value="item">Rate per Item</option>
            </select>
        </div>
        
        <div class="mt-8 mb-6">
            <label for="quantity" class="block mb-2 text-sm font-medium text-gray-700">Enter Quantity:</label>
            <input type="number" id="quantity" name="quantity" min="0" placeholder="Quantity" required class="form-input focus:ring-0 focus:border-primary font-redhat px-4 mb-2 text-sm border-0 border-b-2 border-gray-200">
            <select name="unit" id="unit" class="focus:outline-none focus:bg-white focus:border-gray-500 block w-full px-4 py-2 pr-8 leading-tight text-gray-700 bg-white border border-gray-200 rounded appearance-none">
                <option value="kg">Kilograms (Kg)</option>
                <option value="items">Items</option>
            </select>
        </div>


    <div class="mt-8 mb-2">
        <select name="type" id="type" class="px-4 border-0">
            <option value="Vegetable">Vegetable</option>
            <option value="Fruit">Fruit</option>
            <option value="Meat">Meat</option>
            <option value="Dairy">Dairy</option>
            <option value="Other">Other</option>
        </select>
    </div>
        
    <label for="dropzone-file" class="bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600 flex flex-col items-center justify-center h-64 px-8 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer">
        <div class="flex flex-col items-center justify-center pt-5 pb-6">
            <svg class="dark:text-gray-400 w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
            </svg>
            <p class="dark:text-gray-400 mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span> or drag and drop</p>
            <p class="dark:text-gray-400 text-xs text-gray-500">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
        </div>
        <input id="dropzone-file" name="image" id="image"  accept="image/*" type="file" class="hidden" />
    </label>
    <img src="#" alt="Preview Uploaded Image" id="file-preview" class="hidden">
    
<div>
   <label for="y" class="block my-2 text-sm font-medium text-gray-700"> Cash on delivery</label>
    <span class="flex flex-col space-y-5">
        <span><input type="radio" name="cod" id="y" value="y" class="mx-2" required><label for="y">Avalible (only in Brussels) </label></span>
        <span><input type="radio" name="cod" id="n" value="n" class="mx-2">         <label for="n">Not Avalible </label></span>
    </span>
   </div>

    <input type="submit" name="submit" value="Add Product" class="form-input hover:bg-primary hover:border-0 hover:text-white disabled:opacity-50 disabled:pointer-events-none dark:border-blue-500 dark:text-blue-500 dark:hover:text-blue-400 dark:hover:border-blue-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 inline-flex items-center px-3 py-2 mt-4 mb-4 text-sm font-semibold text-gray-800 border border-gray-600 rounded-lg">
</div> 
-->
    </form> 

    <script>
        const today = new Date();
const dateString = today.toLocaleDateString('en-US', {
  day: 'long',
  month: 'long',
  year: 'numeric',
});
document.getElementById('dateString').innerHTML = dateString;


 // Get the value of the 'alert' query parameter from the URL
 const alertType = new URLSearchParams(window.location.search).get('alert');

// Check the alertType and display an alert accordingly
if (alertType === 'success') {
    alert('Product added successfully!');
} else if (alertType === 'error') {
    alert('Error adding product. Please try again.');
}
    </script>
</body>
</html>