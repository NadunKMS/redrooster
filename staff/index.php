<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Your Role</title>
    <link rel="shortcut icon" href="/public/images/logo_64.png">
    <link rel="stylesheet" href="../scrollbar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="../public/includes/dbh.inc.php">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100;200;300;400;500;600;700;800;900&family=Red+Hat+Text:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../public/output.css">
</head>
<body class="font-redhat bg-gradient-to-r from-orange-100 via-amber-50 to-orange-100">

  <div class="flex flex-col items-center justify-center h-screen">


    <form action="login.inc.php" method="post" class="flex flex-col">
      <h1 class="font-lexend text-primary pb-8 text-4xl font-bold">Staff Area</h1>

      <div class="py-2">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="w-full px-4 text-sm border-2 border-gray-100 rounded-lg" placeholder="ex : Amal@redrooster.rf.gd">
      </div>

      <div class="py-2">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="w-full px-4 text-sm border-2 border-gray-100 rounded-lg" placeholder="Enter password">
      </div>

      <div class='font-red py-2 text-sm font-semibold text-red-600' id="error-message"></div>
      <button type="submit" name="submit" class="bg-primary hover:bg-primary_hover w-full px-4 py-2 mt-4 text-sm font-bold text-white rounded-lg">Sign in</button>

      <p class="my-8 text-sm text-center text-gray-400" >OR</p>

      <a href="delivery_staff_login.php" target="_blank" rel="noopener noreferrer" class=" hover:bg-primary border-primary text-primary hover:text-white w-full px-4 py-2 text-sm font-bold text-center border rounded-lg">Sign in as delivery member</a>

      </form>

          <a href="delivery_staff_registration.php" target="_blank" class="fixed bottom-0 w-full p-4 mb-6 font-semibold text-center text-gray-500">Join Our Delivery Team Today! <span class="text-primary hover:underline font-semibold">Register Now.</span></a>

      </div>




<script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
<?php
if (isset($_GET['error'])) {
    if ($_GET['error'] === 'invalidpw') {
        echo "<script>document.getElementById('error-message').innerHTML = 'Invalid Password';</script>";
    } elseif ($_GET['error'] === 'emailnull') {
        echo "<script>document.getElementById('error-message').innerHTML = 'Email not registered';</script>";
    } else {
        echo "<script>document.getElementById('error-message').innerHTML = 'Unknown error!';</script>";
    }
}
?>


</body>
</html>