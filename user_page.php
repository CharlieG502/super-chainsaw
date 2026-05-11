<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$userResponse = @file_get_contents("https://dummyjson.com/users");

if ($userResponse === false) {
    die("Failed to fetch users.");
}

$userData = json_decode($userResponse, true);

if (!isset($userData['users'])) {
    die("Invalid users API response.");
}

$users = $userData['users'];

$selectedUserId = isset($_GET['user_id']) ? intval($_GET['user_id']) : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Users</title>



</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">

    <div class="logo">Products</div>

    <ul class="nav-links">
        <li><a href="dashboard.php">🏠 Dashboard</a></li>
        <li><a href="products.php">🛍 Products</a></li>
        <li><a href="user_page.php" class="active">👤 Users</a></li>
        
        <li><a href="posts.php">📝 Posts</a></li>
        <li><a href="logout.php">🚪 Logout</a></li>
    </ul>

</div>

<!-- MAIN CONTENT -->
<div class="main-content">

    <div class="container users">

        <h2 style="color:white; grid-column:1/-1;">User List</h2>

        <?php foreach ($users as $user): ?>
        <div class="user-card">

            <img src="<?php echo htmlspecialchars($user['image']); ?>"
                 onerror="this.src='https://via.placeholder.com/150';">

            <strong>
                <?php echo htmlspecialchars($user['firstName'] . " " . $user['lastName']); ?>
            </strong><br>

            Email: <?php echo htmlspecialchars($user['email']); ?><br>
            Age: <?php echo htmlspecialchars($user['age']); ?><br>
            Phone: <?php echo htmlspecialchars($user['phone']); ?><br><br>

            <a href="cart.php?user_id=1" 
            style="background:#006748;
            color:white;
            padding:8px 12px;
            border-radius:6px;
            text-decoration:none;
            transition:0.3s;"
            onmouseover="this.style.background='#009966'; this.style.boxShadow='0 4px 10px rgba(0,0,0,0.2)';"
            onmouseout="this.style.background='#006748'; this.style.boxShadow='none';">
            View Cart
            </a>

        </div>
        <?php endforeach; ?>

    </div>

</div>

<!-- CART SECTION -->
<?php
if ($selectedUserId) {

    $cartResponse = @file_get_contents("https://dummyjson.com/carts");
    $cartData = json_decode($cartResponse, true);

    if (isset($cartData['carts'])) {
        foreach ($cartData['carts'] as $cart) {
            if ($cart['userId'] == $selectedUserId) {
?>

<div class="cart-box">

    <h3>Cart ID: <?php echo $cart['id']; ?></h3>
    Total Products: <?php echo $cart['totalProducts']; ?><br>
    Total Amount: $<?php echo $cart['total']; ?><br><br>

    <strong>Products:</strong><br><br>

    <?php foreach ($cart['products'] as $product): ?>
        <div class="cart-item">
            <?php echo htmlspecialchars($product['title']); ?>
            | Qty: <?php echo $product['quantity']; ?>
            | Price: $<?php echo $product['price']; ?>
            | Total: $<?php echo $product['total']; ?>
        </div>
    <?php endforeach; ?>

</div>

<?php
            }
        }
    }
}
?>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, sans-serif;
}

/* BODY */
body{
    background:#5a9e71;
    min-height:100vh;
}

/* SIDEBAR */
.sidebar{
    width:260px;
    background:#006748;
    color:white;
    height:100vh;
    position:fixed;
    left:0;
    top:0;
    padding-top:20px;
}

.logo{
    text-align:center;
    font-size:26px;
    font-weight:bold;
    margin-bottom:30px;
}

.nav-links{
    list-style:none;
}

.nav-links li{
    margin:8px 0;
}

.nav-links a{
    text-decoration:none;
    color:white;
    display:flex;
    gap:15px;
    padding:14px 20px;
    transition:0.3s;
    border-left:4px solid transparent;
}

.nav-links a:hover,
.nav-links a.active{
    background:#22c55e;
    border-left:4px solid #22c55e;
}

/* MAIN */
.main-content{
    margin-left:260px;
    padding:30px;
}

/* USERS GRID */
.container.users{
    display:grid;
    grid-template-columns:repeat(auto-fit, minmax(240px, 1fr));
    gap:20px;
}

/* USER CARD */
.user-card{
    background:#deffea;
    border-radius:12px;
    padding:20px;
    box-shadow:0 6px 15px rgba(0,0,0,0.12);
    text-align:center;
    transition:0.3s;
}

.user-card:hover{
    transform:translateY(-5px);
}

.user-card img{
    width:90px;
    height:90px;
    border-radius:50%;
    object-fit:cover;
    margin-bottom:10px;
}

/* CART */
.cart-box{
    margin-left:260px;
    margin-top:20px;
    background:white;
    padding:20px;
    border-radius:12px;
    box-shadow:0 6px 15px rgba(0,0,0,0.12);
}

.cart-item{
    padding:8px 0;
    border-bottom:1px solid #eee;
}



</style>

</body>
</html>