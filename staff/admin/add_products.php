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
<body class="bg-gradient-to-r from-orange-100 via-amber-50 to-orange-100">

    <a href="index.php" class="hover:bg-primary hover:text-white md:py-3 md:text-lg md:px-5 md:ml-12 hover:border-transparent inline-flex items-center justify-center px-4 py-2 mt-1 text-base font-medium text-gray-700 border border-gray-700 rounded-full">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
        </svg>
    </a>
    <h1 class="md:text-3xl font-lexend my-4 text-2xl font-bold text-center">Add Products</h1>
    
    <form action="includes/add_products.inc.php" method="POST" enctype="multipart/form-data">
        <div class="font-redhat flex flex-col items-center justify-center mt-8">
         
        <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-700"> Product Name </label>
            <input type="text" name="name" class="form-input focus:ring-0 focus:border-primary font-redhat px-4 mb-4 text-sm border-0 border-b-2 border-gray-200" placeholder="Carrot">
        </div>

        <div class="mb-6">
            <label for="price" class="block mb-2 text-sm font-medium text-gray-700">Price (€)</label>
            <input type="text" name="price" id='priceInput' class="form-input focus:ring-0 focus:border-primary font-redhat px-4 mb-2 text-sm border-0 border-b-2 border-gray-200" placeholder="Enter price">
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
        <span><input type="radio" name="cod" id="y" value="y" class="mx-2" required><label for="y">Avalible</label></span>
        <span><input type="radio" name="cod" id="n" value="n" class="mx-2">         <label for="n">Not Avalible<sup><span class="text-xs font-semibold text-gray-500">*(only available in Brussels)</span></label></span></sup>
        
    </span>
   </div>

    <input type="submit" name="submit" value="Add Product" class="form-input hover:bg-primary hover:border-0 hover:text-white disabled:opacity-50 disabled:pointer-events-none dark:border-blue-500 dark:text-blue-500 dark:hover:text-blue-400 dark:hover:border-blue-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 inline-flex items-center px-3 py-2 mt-4 mb-4 text-sm font-semibold text-gray-800 border border-gray-600 rounded-lg">
</div> 

    </form>

    <script>
const input = document.getElementById('dropzone-file');
const previewPhoto = () => {
    const file = input.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (event) {
            const preview = document.getElementById('file-preview');
            preview.src = event.target.result;
            preview.style.display = 'block';// Make the image visible
            preview.style.margin = '10px';// Make the image visible
        }
        reader.readAsDataURL(file);
    }
}
input.addEventListener("change", previewPhoto);

 // Get the value of the 'alert' query parameter from the URL
 const alertType = new URLSearchParams(window.location.search).get('alert');

// Check the alertType and display an alert accordingly
if (alertType === 'success') {
    alert('Product added successfully!');
} else if (alertType === 'error') {
    alert('Error adding product. Please try again.');
}
const newUrl = window.location.href.split('?')[0];
history.replaceState(null, document.title, newUrl);

    document.getElementById('priceInput').addEventListener('input', function() {
        // Remove non-numeric characters except for dots
        var inputValue = this.value.replace(/[^0-9.]/g, '');

        // Check for valid numeric value
        if (/^\d*\.?\d*$/.test(inputValue)) {
            // Do something with the numeric value
            console.log('Numeric value:', inputValue);
        } else {
            // Handle the case when the input is not a valid number
            console.log('Invalid input');
        }

        // Update the input value to the sanitized value
        this.value = inputValue;
    });

    </script>
</body>
</html>