<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$userId = isset($_GET['user_id'])
    ? intval($_GET['user_id'])
    : 0;

if (!$userId) {
    die("No user selected.");
}

$cartResponse = @file_get_contents("https://dummyjson.com/carts");

if ($cartResponse === false) {
    die("Failed to fetch carts.");
}

$cartData = json_decode($cartResponse, true);

if (!isset($cartData['carts'])) {
    die("Invalid carts API response.");
}

$userCart = null;

foreach ($cartData['carts'] as $cart) {

    if ($cart['userId'] == $userId) {
        $userCart = $cart;
        break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>User Cart</title>



</head>

<body>

<div class="cart-container">

    <!-- BACK BUTTON -->

    <a href="user_page.php" class="back-btn">
        ← Back to Users
    </a>

    <?php if ($userCart): ?>

        <div class="cart-box">

            <h1 class="cart-title">
                🛒 User Cart
            </h1>

            <div class="cart-info">
                <strong>Cart ID:</strong>
                <?php echo $userCart['id']; ?>
            </div>

            <div class="cart-info">
                <strong>User ID:</strong>
                <?php echo $userCart['userId']; ?>
            </div>

            <div class="cart-info">
                <strong>Total Products:</strong>
                <?php echo $userCart['totalProducts']; ?>
            </div>

            <div class="cart-info">
                <strong>Total Amount:</strong>
                $<?php echo $userCart['total']; ?>
            </div>

            <h3 class="products-title">
                Products
            </h3>

            <?php foreach ($userCart['products'] as $product): ?>

                <div class="cart-item">

                    <strong>
                        <?php echo htmlspecialchars($product['title']); ?>
                    </strong>

                    <br><br>

                    Quantity:
                    <?php echo $product['quantity']; ?>

                    <br>

                    Price:
                    $<?php echo $product['price']; ?>

                    <br>

                    Total:
                    $<?php echo $product['total']; ?>

                </div>

            <?php endforeach; ?>

        </div>

    <?php else: ?>

        <div class="empty">
            No cart found for this user.
        </div>

    <?php endif; ?>

</div>
<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, sans-serif;
}

body{
   
    min-height:100vh;
    padding:30px;
    background-image: url('green.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;

  
    
}


.cart-container{
    max-width:900px;
    margin:auto;
}


.back-btn{
    display:inline-block;
    margin-bottom:20px;
    background:#006748;
    color:white;
    padding:12px 18px;
    border-radius:8px;
    text-decoration:none;
    transition:0.3s;
}

.back-btn:hover{
    background:#009966;
}


.cart-box{
    background:#009966;
    padding:25px;
    border-radius:14px;
    box-shadow:0 6px 15px rgba(0,0,0,0.12);
}


.cart-title{
    color:white;
    margin-bottom:20px;
}


.cart-info{
    margin-bottom:10px;
    font-size:16px;
}

.products-title{
    margin-top:25px;
    margin-bottom:15px;
    color:#111827;
}


.cart-item{
    background:#e2e8f0;
    padding:15px;
    border-radius:10px;
    margin-bottom:12px;
    transition:0.3s;
}

.cart-item:hover{
    background:#dbeafe;
}

.cart-item strong{
    color:#111827;
}


.empty{
    background:white;
    padding:30px;
    border-radius:12px;
    text-align:center;
    box-shadow:0 6px 15px rgba(0,0,0,0.12);
    font-size:18px;
    color:red;
}

</style>

</body>
</html>