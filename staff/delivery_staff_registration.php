<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register Delivery Member</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/public/images/logo_64.png">
    <link rel="stylesheet" href="../scrollbar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="../public/includes/dbh.inc.php">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100;200;300;400;500;600;700;800;900&family=Red+Hat+Text:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../public/output.css">
</head>
<body class="font-redhat bg-gradient-to-r from-orange-100 via-amber-50 to-orange-100 flex items-center justify-center min-h-screen">

    <form action="ds_reg.inc.php" method="POST" class="w-96 p-8 bg-white rounded-lg shadow-md">
        <h2 class="text-primary mb-8 text-4xl font-bold">Register Delivery Member</h2>

<div class="mb-4">
    <label for="name" class="font-lexend block mb-1 text-sm text-gray-600">Name:</label>
    <input type="text" id="name" name="name" placeholder="Enter your name" required
        class="focus:outline-none focus:ring focus:border-blue-300 w-full px-4 py-2 border border-gray-100 rounded-lg">
</div>

<div class="mb-4">
    <label for="mobile" class="font-lexend block mb-1 text-sm text-gray-600">Mobile:</label>
    <input type="text" id="mobile" name="mobile" placeholder="Enter your mobile number" required
        class="focus:outline-none focus:ring focus:border-blue-300 w-full px-4 py-2 border border-gray-100 rounded-lg">
</div>

<div class="mb-4">
    <label for="address" class="font-lexend block mb-1 text-sm text-gray-600">Address:</label>
    <textarea id="address" name="address" placeholder="Enter your address" required
        class="focus:outline-none focus:ring focus:border-blue-300 w-full px-4 py-2 border border-gray-100 rounded-lg"></textarea>
</div>

<div class="mb-4">
    <label for="email" class="font-lexend block mb-1 text-sm text-gray-600">Email:</label>
    <input type="email" id="email" name="email" placeholder="Enter your email" required
        class="focus:outline-none focus:ring focus:border-blue-300 w-full px-4 py-2 border border-gray-100 rounded-lg">
</div>

<div class="mb-6">
    <label for="password" class="font-lexend block mb-1 text-sm text-gray-600">Password:</label>
    <input type="password" id="password" name="password" placeholder="Enter your password" required
        class="focus:outline-none focus:ring focus:border-blue-300 w-full px-4 py-2 border border-gray-100 rounded-lg">
</div>

        <button type="submit" class="bg-primary hover:bg-primary_hover w-full px-4 py-2 text-sm font-bold text-white rounded-lg">Register</button>
    </form>
<a href="delivery_staff_login.php" target="_blank" class="fixed bottom-0 w-full p-4 mb-6 font-semibold text-center text-gray-500">Already a member? <span class="text-primary hover:underline font-semibold">Sign in now.</span></a>
</body>
</html>
