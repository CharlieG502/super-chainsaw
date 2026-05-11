<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard</title>


</head>

<body>

<!-- SIDEBAR -->

<div class="sidebar">

    <div class="logo">Dashboard</div>

    <ul class="nav-links">
        <li><a href="#" class="active">🏠 Dashboard</a></li>
        <li><a href="products.php">🛍 Products</a></li>
        <li><a href="user_page.php">👤 Users</a></li>
        <li><a href="posts.php">📝 Posts</a></li>
        <li><a href="logout.php">🚪 Logout</a></li>
    </ul>

</div>

<!-- MAIN CONTENT -->

<div class="main-content">

    <!-- WELCOME MESSAGE -->

    <div class="welcome">
        Welcome, 
        <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong>
    </div>

    <!-- DASHBOARD CARDS -->

    <div class="container">

        <div class="card">
            <h3>🛍 Products</h3>
            <a href="products.php">View Products</a>
        </div>

        <div class="card">
            <h3>👤 Users</h3>
            <a href="user_page.php">View Users</a>
        </div>

        <div class="card">
            <h3>🛒  Carts</h3>
            <a href="user_page.php">View Carts</a>
        </div>

        <div class="card">
            <h3>📝 Posts</h3>
            <a href="posts.php">View Posts</a>
        </div>

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
    margin:0;
    min-height:100vh;

    background:
    
    url('shopping.jpg')center center/cover no-repeat;

    background-size:cover;
    background-position:center;
    background-repeat:no-repeat;
    background-attachment:fixed;
}

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
    color:white;
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

.nav-links a:hover{
    background:#22c55e;
    border-left:4px solid #22c55e;
    padding-left:25px;
}

.nav-links a.active{
    background:#22c55e;
    border-left:4px solid #22c55e;
}


.main-content{
    margin-left:260px;
    padding:30px;
}


.welcome{
    font-size:40px;
    margin-bottom:30px;
    color:white;
    
}


.container{
    display:grid;
    grid-template-columns:repeat(auto-fit, minmax(220px, 1fr));
    gap:20px;
    margin: 10px;
}

.card{
    background:#429179;
    padding:25px;
    border-radius:12px;
    box-shadow:0 4px 10px rgba(0,0,0,0.1);
    transition:0.3s;

}

.card:hover{
    transform:translateY(-5px);
}

.card h3{
    margin-bottom:15px;
    color:white;
    font-family:sans-serif;
}

.card a{
    text-decoration:none;
    background:#006748;
    color:white;
    padding:10px 15px;
    border-radius:6px;
    display:inline-block;
}

.card a:hover{
    background:#22c55e;
}

</style>

</body>
</html>