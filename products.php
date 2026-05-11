<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$url = "https://dummyjson.com/products";
$response = file_get_contents($url);

$data = json_decode($response, true);
$products = $data['products'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Products</title>



</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">

    <div class="logo">Products</div>
    

    <ul class="nav-links">
        <li><a href="dashboard.php">🏠 Dashboard</a></li>
        <li><a href="products.php" class="active">🛍 Products</a></li>
        <li><a href="user_page.php">👤 Users</a></li>
    
        <li><a href="posts.php">📝 Posts</a></li>
        <li><a href="logout.php">🚪 Logout</a></li>
    </ul>

</div>

<!-- MAIN CONTENT -->
<div class="main-content">
    <h2 style="color:white; grid-column:1/-1;">Product List</h2>

<div class="container1">

    <?php foreach ($products as $product): ?>
        <div class="card">

            <img src="<?php echo htmlspecialchars($product['thumbnail']); ?>"
                 alt="<?php echo htmlspecialchars($product['title']); ?>"
                 loading="lazy">

            <div class="title">
                <?php echo htmlspecialchars($product['title']); ?>
            </div>

            <div class="info">
                Category: <?php echo htmlspecialchars($product['category']); ?>
            </div>

            <div class="info price">
                Price: $<?php echo $product['price']; ?>
            </div>

            <div class="info stock">
                Stock: <?php echo $product['stock']; ?>
            </div>

        </div>
    <?php endforeach; ?>

</div>

</div>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, sans-serif;
}

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
    align-items:center;
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

/* MAIN CONTENT */
.main-content{
    margin-left:260px;
    padding:30px;
}

/* PRODUCT GRID (FIXED ALIGNMENT) */
.container1{
    padding:20px;
    display:grid;
    grid-template-columns:repeat(auto-fit, minmax(250px, 1fr));
    gap:20px;

    /* FIX */
    margin:0;
    width:100%;
}

/* CARD */
.container1 .card{
    background:#deffea;
    border-radius:12px;
    overflow:hidden;
    box-shadow:0 5px 10px rgba(0,0,0,0.1);
    transition:0.4s;
}

.container1 .card:hover{
    transform:translateY(-5px);
}

/* IMAGE */
.container1 .card img{
    width:100%;
    height:220px;
    object-fit:cover;
    background:rgba(0, 0, 0, 0.1);;
}

/* TEXT */
.container1 .title{
    font-size:18px;
    font-weight:bold;
    color:#006748;
    padding:15px 15px 5px;
}

.container1 .info{
    padding:5px 15px;
    color:#444;
    font-size:14px;
}

.container1 .price{
    color:#22c55e;
    font-weight:bold;
}

.container1 .stock{
    color:#006748;
    padding-bottom:15px;
}

</style>

</body>
</html>