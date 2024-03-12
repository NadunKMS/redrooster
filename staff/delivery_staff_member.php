
<!--This template is based on: https://dribbble.com/shots/6531694-Marketing-Dashboard by Gregoire Vella -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADMIN Area | Redrooster</title>
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100;200;300;400;500;600;700;800;900&family=Red+Hat+Text:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/output.css">
    <!--Replace with your tailwind.css once created-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">

</head>

<body class="font-redhat from-orange-100 via-amber-50 to-orange-100 flex h-screen">

    <div class="flex flex-row flex-wrap content-start flex-1 flex-grow pl-16">

        <div class="lg:h-20 flex flex-wrap w-full h-40">

            <nav id="header1" class="lg:order-2 bg-gradient-to-r from-orange-200 via-amber-100 to-orange-200 flex-1 order-1 w-auto">

                <div class="flex items-center justify-center h-full">

                    <div class="relative flex pr-6">
                        <div class="flex flex-row">
                        <img src="../public/images/removed_bg.png" alt="Logo" class="w-10 h-10 mx-4">
                        <h1 class="font-lexend text-2xl font-semibold">Admin</h1>
                        </div>
                </div>

            </nav>
        </div>

        <!--Dash Content -->
        <div id="dash-content" class="lg:py-0 lg:max-w-sm bg-gradient-to-r from-orange-100 via-amber-50 to-orange-100 flex flex-wrap content-start w-full py-6">

        </div>

        <!--Graph Content -->
                            <div id="main-content" class="bg-gradient-to-r from-orange-100 via-amber-50 to-orange-100 flex-1 w-full h-screen">
                                
                            <?php

                            include_once('../public/includes/dbh.inc.php');

                            // Assuming $ds_id contains the value you want to use
                            if (isset($_GET['id'])) {
                                $ds_id = $_GET['id'];
                            
                                // SQL query to select delivery details for a specific ds_id
                                $selectDeliveries = "SELECT `delivery_id`, `ds_id`, `o_id`, `c_id` FROM `deliveries` WHERE `ds_id` = $ds_id";
                            
                                $result = $conn->query($selectDeliveries);
                            
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        // $row contains the details for each delivery
                                        echo "Delivery ID: " . $row['delivery_id'] . "<br>";
                                        echo "DS ID: " . $row['ds_id'] . "<br>";
                                        echo "Order ID: " . $row['o_id'] . "<br>";
                                        echo "Customer ID: " . $row['c_id'] . "<br>";
                                        echo "<hr>";
                                    }
                                } else {
                                    echo "No deliveries found for you!";
                                }
                            } else {
                                echo "ds_id not specified in the URL";
                            }
                            
                            $conn->close();

                            ?>

                             </div>

                        </div>
               
                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>
