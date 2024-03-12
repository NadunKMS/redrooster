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
    <link rel="stylesheet" href="../../public/output.css">
    <!--Replace with your tailwind.css once created-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">

    <style>
        
        .border-b-1 {
            border-bottom-width: 1px;
        }
        
        .border-l-1 {
            border-left-width: 1px;
        }
        
        hover\:border-none:hover {
            border-style: none;
        }
        
        #sidebar {
            transition: ease-in-out all .2s;
            z-index: 9999;
        }
        
        #sidebar span {
            opacity: 0;
            position: absolute;
            transition: ease-in-out all .0.5s;
        }
        
        #sidebar:hover {
            width: 150px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            /*shadow-2xl*/
        }
        
        #sidebar:hover span {
            opacity: 1;
        }
    </style>

</head>

<body class="font-redhat bg-gray-50 flex h-screen">

    <!-- Side bar-->
    <div id="sidebar" class="menu nunito fixed flex items-center w-16 h-screen px-4 text-white bg-white shadow">

        <ul class="list-reset ">
            <li class="md:my-0 my-2">
                <a href="#" class="md:py-3 hover:text-primary block py-1 pl-1 text-gray-600 no-underline align-middle">
                    <i class="fas fa-chart-area fa-fw text-primary mr-3"></i><span class="md:pb-0 inline-block w-full pb-1 text-sm">Home</span>
                </a>
            </li>
            <li class="md:my-0 my-2">
                <a href="#" class="md:py-3 hover:text-primary block py-1 pl-1 text-gray-600 no-underline align-middle">
                    <i class="fas fa-tasks fa-fw mr-3"></i><span class="md:pb-0 inline-block w-full pb-1 text-sm">Tasks</span>
                </a>
            </li>
            <li class="md:my-0 my-2">
                <a href="#" class="md:py-3 hover:text-primary block py-1 pl-1 text-gray-600 no-underline align-middle">
                    <i class="fa fa-envelope fa-fw mr-3"></i><span class="md:pb-0 inline-block w-full pb-1 text-sm">Messages</span>
                </a>
            </li>
            <li class="md:my-0 my-2">
                <a href="#" class="md:py-3 hover:text-primary block py-1 pl-1 text-gray-600 no-underline align-middle">
                    <i class="fas fa-tasks fa-fw mr-3"></i><span class="md:pb-0 inline-block w-full pb-1 text-sm">Analytics</span>
                </a>
            </li>
            <li class="md:my-0 my-2">
                <a href="#" class="md:py-3 hover:text-primary block py-1 pl-1 text-gray-600 no-underline align-middle">
                    <i class="fa fa-wallet fa-fw mr-3"></i><span class="md:pb-0 inline-block w-full pb-1 text-sm">Payments</span>
                </a>
            </li>
        </ul>

    </div>

    <div class="flex flex-row flex-wrap content-start flex-1 flex-grow pl-16">

        <div class="lg:h-20 flex flex-wrap w-full h-40">

            <nav id="header1" class="lg:order-2 bg-gradient-to-r from-orange-200 via-amber-100 to-orange-200 flex-1 order-1 w-auto">

                <div class="flex items-center justify-center h-full">

                    <div class="relative flex pr-6">
                        <div class="flex flex-row">
                        <img src="../../public/images/removed_bg.png" alt="Logo" class="w-10 h-10 mx-4">
                        <h1 class="font-lexend text-2xl font-semibold">Employee</h1>
                        </div>
                </div>

            </nav>
        </div>

        <!--Dash Content -->
        <div id="dash-content" class="lg:py-0 lg:max-w-sm bg-gradient-to-r from-orange-100 via-amber-50 to-orange-100 flex flex-wrap content-start w-full py-6">

            <div class="lg:w-full w-1/2">
                <div class="hover:border-transparent hover:bg-white hover:shadow-xl md:mx-10 md:my-6 p-6 m-2 border-2 border-orange-400 border-dashed rounded-lg">
                    <div class="flex flex-col items-center">
                        <div class="flex-shrink pr-4">
                            <div class="bg-primary p-3 rounded-full"><i class="fa fa-wallet fa-fw fa-inverse text-white"></i></div>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-3xl font-bold">$3249 <span class="text-green-500"><i class="fas fa-caret-up"></i></span></h3>
                            <h5 class="font-bold text-gray-500">Total Revenue</h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:w-full w-1/2">
                <div class="hover:border-transparent hover:bg-white hover:shadow-xl md:mx-10 md:my-6 p-6 m-2 border-2 border-orange-400 border-dashed rounded-lg">
                    <div class="flex flex-col items-center">
                        <div class="flex-shrink pr-4">
                            <div class="bg-primary p-3 rounded-full"><i class="fas fa-users fa-fw fa-inverse text-white"></i></div>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-3xl font-bold">249 <span class="text-orange-500"><i class="fas fa-exchange-alt"></i></span></h3>
                            <h5 class="font-bold text-gray-500">Total Users</h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:w-full w-1/2">
                <div class="hover:border-transparent hover:bg-white hover:shadow-xl md:mx-10 md:my-6 p-6 m-2 border-2 border-orange-400 border-dashed rounded-lg">
                    <div class="flex flex-col items-center">
                        <div class="flex-shrink pr-4">
                            <div class="bg-primary p-3 rounded-full"><i class="fas fa-user-plus fa-fw fa-inverse text-white"></i></div>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-3xl font-bold">2 <span class="text-green-600"><i class="fas fa-caret-up"></i></span></h3>
                            <h5 class="font-bold text-gray-500">New Users</h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:w-full w-1/2">
                <div class="hover:border-transparent hover:bg-white hover:shadow-xl md:mx-10 md:my-6 p-6 m-2 border-2 border-orange-400 border-dashed rounded-lg">
                    <div class="flex flex-col items-center">
                        <div class="flex-shrink pr-4">
                            <div class="bg-primary p-3 rounded-full"><i class="fas fa-mortar-pestle fa-fw fa-inverse text-white"></i></div>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-3xl font-bold">132 </h3>
                            <h5 class="font-bold text-gray-500">Total Products</h5>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!--Graph Content -->
                            <div id="main-content" class="bg-gradient-to-r from-orange-100 via-amber-50 to-orange-100 flex-1 w-full">
                                
                            <div class="container mx-10 my-6">
                                <a href="add_daily_products.php">
                                    <button class="hover:border-primary hover:text-primary px-8 py-4 bg-white border-2 border-transparent rounded-full shadow-sm">Add daily products</button>
                                </a>
                                <a href="show_products.php">
                                    <button class="hover:border-primary hover:text-primary px-8 py-4 bg-white border-2 border-transparent rounded-full shadow-sm">Show products</button>
                                </a>

                            </div>

                             </div>

                        </div>
               
                    </div>

                </div>

            </div>

        </div>

    </div>


    <script>
        /*Toggle dropdown list*/
        /*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/

        var userMenuDiv = document.getElementById("userMenu");
        var userMenu = document.getElementById("userButton");

        document.onclick = check;

        function check(e) {
            var target = (e && e.target) || (event && event.srcElement);

            //User Menu
            if (!checkParent(target, userMenuDiv)) {
                // click NOT on the menu
                if (checkParent(target, userMenu)) {
                    // click on the link
                    if (userMenuDiv.classList.contains("invisible")) {
                        userMenuDiv.classList.remove("invisible");
                    } else {
                        userMenuDiv.classList.add("invisible");
                    }
                } else {
                    // click both outside link and outside menu, hide menu
                    userMenuDiv.classList.add("invisible");
                }
            }

        }

        function checkParent(t, elm) {
            while (t.parentNode) {
                if (t == elm) {
                    return true;
                }
                t = t.parentNode;
            }
            return false;
        }
    </script>


</body>
</html>