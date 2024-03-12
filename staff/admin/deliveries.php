<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DELIVERIES | Redrooster</title>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100;200;300;400;500;600;700;800;900&family=Red+Hat+Text:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/output.css">
</head>
<body class="bg-gradient-to-r from-orange-100 via-amber-50 to-orange-100">
        <a href="index.php" class="hover:bg-primary hover:text-white md:py-3 md:text-lg md:px-5 md:ml-12 hover:border-transparent inline-flex items-center justify-center px-4 py-2 mt-1 text-base font-medium text-gray-700 border border-gray-700 rounded-full">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
        </svg>
    </a>
<div class="container flex justify-center mx-auto my-2">
<?php
include_once('../../public/includes/dbh.inc.php');

$sql = "SELECT `delivery_id`, `ds_id`, `o_id`, `c_id`, `tracking_status` FROM `deliveries`";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
?>
    <div class="overflow-x-auto">
        <table class="font-redhat border-gray-50 rounded-2xl min-w-full pt-2 mt-8 bg-white border-2 divide-y-2 divide-gray-200 shadow-md">
            <thead class="ltr:text-left rtl:text-right">
                <tr>
                    <th class="whitespace-nowrap font-lexend px-4 py-2 font-semibold text-gray-900">Delivery ID</th>
                    <th class="whitespace-nowrap font-lexend px-4 py-2 font-semibold text-gray-900">Driver ID</th>
                    <th class="whitespace-nowrap font-lexend px-4 py-2 font-semibold text-gray-900">Order ID</th>
                    <th class="whitespace-nowrap font-lexend px-4 py-2 font-semibold text-gray-900">Customer ID</th>
                    <th class="whitespace-nowrap font-lexend px-4 py-2 font-semibold text-gray-900">Tracking Status</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900"><?php echo $row['delivery_id']; ?></td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo $row['ds_id']; ?></td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo $row['o_id']; ?></td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo $row['c_id']; ?></td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo $row['tracking_status']; ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
<?php
}
?>
</div>
</body>
</html>
