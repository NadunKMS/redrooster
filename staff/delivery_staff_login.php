<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/public/images/logo_64.png">
    <link rel="stylesheet" href="../scrollbar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="../public/includes/dbh.inc.php">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100;200;300;400;500;600;700;800;900&family=Red+Hat+Text:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../public/output.css">
    <title>Login</title>
</head>
<body class="font-redhat bg-gradient-to-r from-orange-100 via-amber-50 to-orange-100">

    <div class="flex flex-col items-center justify-center h-screen">

        <form action="ds_log.inc.php" method="post" class="flex flex-col">
            <h2 class="font-lexend text-primary pb-8 text-4xl font-bold">Login as delivery staff member</h2>

            <div class="py-2">
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email"
                    class="w-full px-4 text-sm border-2 border-gray-100 rounded-lg"
                    placeholder="ex: sajith@redrooster.rf.gd" required>
            </div>

            <div class="py-2">
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="pwd"
                    class="w-full px-4 text-sm border-2 border-gray-100 rounded-lg" placeholder="Enter password"
                    required>
            </div>

            <button type="submit" class="bg-primary hover:bg-primary_hover w-full px-4 py-2 mt-4 text-sm font-bold text-white rounded-lg">Login</button>

        </form>
    <a href="delivery_staff_registration.php" target="_blank" class="fixed bottom-0 w-full p-4 mb-6 font-semibold text-center text-gray-500">Not a member? Join Our Delivery Team Today! <span class="text-primary hover:underline font-semibold">Register Now.</span></a>
    </div>

</body>
</html>
