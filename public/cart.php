<?php
session_start(); 
if(isset($_SESSION['email'])){
  $email =$_SESSION['email'];
  $fname =$_SESSION['fname'];
  $lname =$_SESSION['lname'];
  if(!isset($fname)){
    header('Location:includes/signout.inc.php');
  }
}
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cart | Red Rooster</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
<link rel="shortcut icon" href="images/logo_64.png">
<link rel="stylesheet" href="scrollbar.css">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100;200;300;400;500;600;700;800;900&family=Red+Hat+Text:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="output.css">
</head>
<body class="font-redhat bg-gradient-to-r from-orange-100 via-amber-50 to-orange-100">
<?php
include_once('includes/dbh.inc.php');

$sql = "SELECT cart.* , products.name ,products.image
        FROM cart
        JOIN products ON cart.product_id = products.pid
        WHERE cart.user_email = '$email'";

$result = $conn->query($sql);

if ($result === false) {
    die("Error in query: " . $conn->error);
}

$total = 0; // Initialize $total here

?>
<a href="home.php" class="hover:bg-primary hover:text-white md:py-3 md:text-lg md:px-5 md:ml-12 hover:border-transparent inline-flex items-center justify-center px-2 py-1 mt-1 text-base font-medium text-gray-700 border border-gray-700 rounded-full">
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
</svg>
</a>
<section class="sm:px-6 sm:py-12 lg:px-8 max-w-screen-xl px-4 py-8 mx-auto">
    <div class="max-w-3xl mx-auto">
        <header class="text-center">
            <h1 class="sm:text-xl text-3xl font-semibold text-left text-gray-900">Farm Fresh Choices ✨ <br> <span class="font-bold"><?php echo $fname ?></span>! Your Cart Awaits Checkout 🛒</h1>
        </header>
        <div class="mt-8 space-y-4">
            <?php if ($result->num_rows > 0) : ?>
            <?php $orderDetails = array(); ?>
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <div class="flex items-center gap-4 p-4 bg-orange-100 rounded shadow-sm">
                        <img src="images/uploads/<?php echo $row['image']; ?>"
                            alt="<?php echo $row['image']; ?>" class="object-cover w-16 h-16 rounded-md">
                        <div>
                            <h3 class="font-lexend ml-2 text-gray-900"><?= $row["name"] ?></h3>
                            <dl class="mt-0.5 space-y-px text-xs text-gray-600">
                                <div>
                                    <label for="quantity" class="sr-only">Quantity</label>
                                    <div x-data="{ productQuantity: <?= $row["quantity"] ?>, originalQuantity: <?= $row["quantity"] ?> }">
                                        <div class="flex items-center justify-center mb-2 rounded">
                                            <button type="button" x-on:click="productQuantity > 0 ? productQuantity-- : null"
                                                class="hover:opacity-75 w-10 h-10 font-bold leading-10 text-gray-800 transition bg-white rounded-l-full">
                                                &minus;
                                            </button>
                                
                                            <input type="number" id="quantity" name="qty" x-model="productQuantity"
                                                class="h-10 w-16 border-transparent bg-white text-center [-moz-appearance:_textfield] sm:text-sm [&::-webkit-inner-spin-button]:m-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:m-0 [&::-webkit-outer-spin-button]:appearance-none" />
                                
                                            <button type="button" x-on:click="productQuantity++"
                                                class="hover:opacity-75 w-10 h-10 font-bold leading-10 text-gray-800 transition bg-white rounded-r-full">
                                                &plus;
                                            </button>
                                        </div>
                                        
                                        <a
                                        x-show="productQuantity !== originalQuantity" @click="confirmQuantityChange"  :href="'includes/update_cart.php?id=<?= $row["product_id"] ?>&quantity=' + productQuantity"
                                        class="hover:opacity-75 text-primary hover:bg-primary hover:text-white border-primary px-4 py-2 my-4 ml-2 border rounded-full">
                                        Confirm
                                        </a>
                                        
                                    </div>
                                </div>
                            </dl>
                        </div>
                        
                        <div class="flex items-center justify-end flex-1 gap-2">
                            <span class="px-4 text-sm font-semibold">€ <?php echo $row['total']?></span>
                            <a href="includes/update_cart.php?cart_id=<?php echo $row['id']; ?>" class="hover:text-red-600 text-gray-600 transition" onclick="return confirm('Are you sure you want to remove this item?');">
                        <span class="sr-only">Remove item</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"></path>
                        </svg>
                    </a>
                        </div>
                    </div>
                    <?php
                    $itemTotal = $row['total'];
                    $total += $itemTotal;
                    $orderDetails[] = array(
                  'product_id' => $row['product_id'],
                  'quantity' => $row['quantity'],
                  'total' => $itemTotal,
    );
                    ?>
                <?php endwhile; ?>
            <?php else : ?>
                <p class="text-gray-600">Cart is empty! <a href="home.php" class="text-primary hover:underline">shop now</a></p>
            <?php endif; ?>
        </div> 

        <div class="flex justify-end my-8">
          <dl class="space-y-0.5 text-sm text-gray-700">
            <div class="flex justify-between">
            <div class="flex !text-base font-medium">
              <dt>Total</dt>
              <dd class="mx-2">£<?php echo $total; ?></dd>
            </div>
          </dl>
        </div>

       
        <div class="flex justify-end">
          <form action="includes/checkout.inc.php" method="post">
    <?php if (!empty($orderDetails)): ?>
        <?php foreach ($orderDetails as $item): ?>
            <input type="hidden" name="product_id[]" value="<?php echo $item['product_id']; ?>">
            <input type="hidden" name="quantity[]" value="<?php echo $item['quantity']; ?>">
            <input type="hidden" name="total[]" value="<?php echo $item['total']; ?>">
            <div class="flex flex-row space-x-4">
                <select name="pay_method" id="pay" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                    <option value="COD">Cash-on Delivery</option>
                    <option value="online">Card</option>
                </select>
                        <?php endforeach; ?>
                        <button type="submit" class="hover:bg-gray-600 block px-5 py-3 text-sm text-gray-100 transition bg-gray-700 rounded">
                Checkout
                        </button>
            </div>
    <?php else: ?>

    <?php endif; ?>
</form>

        </div>
      </div>
    </div>
  </div>
</div>
</div>
</section>
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>
