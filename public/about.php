<?php
session_start(); 
if(isset($_SESSION['email'])){
  $loggedIn = true;
  $email =$_SESSION['email'];
  $fname =$_SESSION['fname'];
  $lname =$_SESSION['lname'];
  if(!isset($fname)){
    header('Location:includes/signout.inc.php');
  }
}
else {
  $loggedIn = false;
}
include_once('includes/dbh.inc.php');
?>
<!DOCTYPEhtml>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Explore | Red Rooster</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
  <link rel="shortcut icon" href="images/logo_64.png">
  <link rel="stylesheet" href="scrollbar.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100;200;300;400;500;600;700;800;900&family=Red+Hat+Text:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="output.css">
</head>

<body class="font-redhat bg-orange-50/50">
 
    <nav class="bg-white shadow-sm">
        <div data-aos="fade-up" class="px-4 mx-auto">
            <div class="md:py-6 flex items-center justify-between px-4 py-2">
                <!-- Website Logo -->
                <a href="/" class="flex items-center">
                    <img src="images/logo_64.png" alt="Logo" class="mr-2 scale-125">
                    <h1 class="font-lexend text-2xl font-bold">Red Rooster</h1>
                </a>

                <!-- Primary Navbar items -->
                <div class="md:flex items-center hidden space-x-4">
                    <a href="home.php" class="nav-hover">Explore</a>
                    <a href="products/products.php" class="nav-hover">Products</a>
                    <a href="#" class="nav-active">About</a>
                    <a href="#" class="nav-hover">Contact Us</a>
                </div>

                <!-- Secondary Navbar items -->
                <div class="flex items-center space-x-4">
                  <?php if ($loggedIn): ?>
                    
                    <!-- cart button -->
                    <a href="#" >
                      <button class="hover:text-primary hover:border-primary p-2 text-gray-800 bg-gray-100 border-2 rounded-full">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                      </svg>
                      </button>
                    </a>
                    
                    <!-- user button -->
                    <a href="#">
                      <button class="hover:text-primary hover:border-primary p-2 text-gray-800 bg-gray-100 border-2 rounded-full" type="button" data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation" aria-controls="drawer-navigation">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                      <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z" clip-rule="evenodd" />
                      </svg>
                      </button>
                    </a>

                    <?php else: ?>
                    <!-- Navigation for visitors (not logged in) -->
                    <div class="md:flex items-center hidden space-x-4">
                    <a class="text-slate-600 hover:text-slate-500 dark:text-slate-400 dark:hover:text-slate-300 inline-flex items-center justify-center gap-2 text-sm font-medium" href="login.php">Sign In</a>
                    <a class="gap-x-2 hover:border-primary hover:text-primary disabled:opacity-50 disabled:pointer-events-none dark:border-blue-500 dark:text-blue-500 dark:hover:text-blue-400 dark:hover:border-blue-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 inline-flex items-center px-3 py-2 text-sm font-semibold text-gray-800 border border-gray-600 rounded-lg" href="signup.php">Start shopping</a>
                    </div>
                  <?php endif; ?>

                </div>

                <!-- Mobile menu button -->
                <button class="md:hidden focus:outline-none mobile-menu-button">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-6 h-6"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
                        />
                    </svg>
                </button>
            </div>
        </div>
        <!-- mobile menu -->
        <div class="mobile-menu hidden">
            <ul class="pl-4">
                <li><a href="#" class="hover:bg-primary hover:text-white block px-2 py-4 text-sm transition duration-300">Explore</a></li>
                <li><a href="#" class="hover:bg-primary hover:text-white block px-2 py-4 text-sm transition duration-300">Products</a></li>
                <li class="active"><a href="#" class="bg-primary block px-2 py-4 text-sm font-semibold text-white">About</a></li>
                <li><a href="#" class="hover:bg-primary hover:text-white block px-2 py-4 text-sm transition duration-300">Contact Us</a></li>
            </ul>
        </div>
    </nav>
              <!-- Profile Sidebar -->
              <div id="drawer-navigation" class="dark:bg-gray-800 fixed top-0 left-0 z-40 w-64 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white" tabindex="-1" aria-labelledby="drawer-navigation-label">
                <h5 id="drawer-navigation-label" class="dark:text-gray-400 text-base font-semibold text-gray-500 uppercase">P R O F I L E</h5>
                <button type="button" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 end-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" >
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close menu</span>
                </button>
              <div class="flex flex-col py-4 overflow-y-auto">
                   <hr>
                   <span class="flex justify-center pt-2 my-4">
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-16 h-16 text-gray-500">
                      <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
                      </svg>
                   </span>
                   <p class="mt-2 text-center text-gray-600">
                    <span><?php echo $fname; ?></span>
                    <span class="pl-1"><?php echo $lname; ?></span>
                   </p>
                   <p class="font-bold text-center text-gray-800"><?php echo $email; ?></p>
                   <a href="includes/signout.inc.php"><button class="hover:border-0 hover:bg-primary_bg hover:text-primary flex justify-center px-8 py-2 mx-auto mt-8 text-center text-gray-400 border-2 border-gray-200 rounded-full">Logout</button></a>
              </div>
            </div>


      <!-- Main Container -->
     <div data-aos="fade-down" data-aos-delay="300" class="md:py-16 md:px-32 md:space-y-0 md:flex-colcontainer flex flex-col items-center justify-center px-4 py-8 mx-auto space-y-8">
     <header class="mt-4 mb-20 text-center">
    <h1 class="text-4xl font-bold">About Red Rooster Farm</h1>
    </header>

    <main>
    <section class="p-6 mb-10 bg-yellow-100 rounded-lg">
        <h2 class="mb-4 text-2xl font-semibold">Our Story</h2>
        <p class="mb-4 leading-relaxed">Founded with a vision to reconnect people with the land and the food they eat, Red Rooster Farm has been a labor of love for our dedicated team. What started as a humble agricultural venture has blossomed into a thriving hub for farm-fresh produce and artisanal delights.</p>
    </section>

    <section class="p-6 mb-10 bg-orange-100 rounded-lg">
        <h2 class=" mb-4 text-2xl font-semibold">Our Mission</h2>
        <p class="mb-4 leading-relaxed">At Red Rooster Farm, we believe in the power of locally sourced, ethically produced food. Our mission is simple: to provide our community with the freshest, most flavorful fruits, vegetables, dairy products, and more, straight from our fields to your table.</p>
    </section>

    <section class="flex flex-col items-center p-6 mb-10 bg-yellow-100 rounded-lg">
        <h2 class="mb-4 text-4xl font-semibold">Why Choose Red Rooster Farm?</h2>
        <ul>
            <li class="my-8"><span class="text-xl font-semibold">Freshness Guaranteed:</span> <br> From crisp, hand-picked vegetables to creamy, farm-fresh dairy products, quality is our top priority.</li>
            <li class="my-8"><span class="text-xl font-semibold">Sustainability Matters:</span> <br> We're committed to sustainable farming practices that prioritize the health of our land, our animals, and our customers.</li>
            <li class="my-8"><span class="text-xl font-semibold">Convenience Redefined:</span>  <br> With our convenient online ordering and delivery service, enjoying farm-fresh goodness has never been easier.</li>
            <li class="my-8"><span class="text-xl font-semibold">Community Connection:</span> <br>  We're more than just a farm – we're a vibrant community hub where people come together to celebrate good food and good company.</li>
        </ul>
    </section>
</main>

<footer>
    <section class="p-6 mb-10 bg-orange-100 rounded-lg">
        <h2 class="mb-4 text-2xl font-semibold">Get in Touch</h2>
        <p>Ready to experience the taste of farm-fresh goodness? Visit our product outlet in Brussels City or place your order online today. Join us in supporting local agriculture and savoring the flavors of the season, one bite at a time.</p>
    </section>
</footer>

     

    </div>


</div>
</div>


  <script src="../node_modules/preline/dist/preline.js"></script>
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="https://unpkg.com/@studio-freight/lenis@1.0.32/dist/lenis.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  <script>

    //swiper configuration
    const btn = document.querySelector("button.mobile-menu-button");
				const menu = document.querySelector(".mobile-menu");

				btn.addEventListener("click", () => {
					menu.classList.toggle("hidden");
				});

        const swiper = new Swiper('.swiper', {
          slidesPerView: 'auto',
          speed: 400,
          spaceBetween: 100,
          autoplay: {
          delay: 3000,
        },
          effect: 'coverflow',
          coverflowEffect: {
          rotate: 50,
          slideShadows: false,
        },    
        loop:true,
        });

  //AOS configuration
  AOS.init();


  //lenis configuration
  const lenis = new Lenis()

  lenis.on('scroll', (e) => {
    console.log(e)
  })

  function raf(time) {
    lenis.raf(time)
    requestAnimationFrame(raf)
  }

  requestAnimationFrame(raf)


  // Check if the 'alert' parameter with the value 'notlogged' is present in the URL
  const urlParams = new URLSearchParams(window.location.search);
  const alertParam = urlParams.get('alert');
  if (alertParam === 'pradded') {
      alert("Product was added successfully!");
  }

  </script>

<?php include_once('footer.php'); ?>
</body>
</html>