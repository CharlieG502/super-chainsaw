<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$response = file_get_contents("https://dummyjson.com/posts");
$data = json_decode($response, true);
$posts = $data['posts'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Posts</title>

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

/* POSTS GRID */
.container{
    display:grid;
    grid-template-columns:repeat(auto-fit, minmax(260px, 1fr));
    gap:20px;
    padding:20px;
}

/* POST CARD */
.post-card{
    background:#deffea;
    padding:20px;
    border-radius:12px;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
    transition:0.3s;
}

.post-card:hover{
    transform:translateY(-5px);
}

/* TITLE */
.post-title{
    font-size:18px;
    font-weight:bold;
    color:#006748;
    margin-bottom:10px;
}

/* BODY */
.post-body{
    font-size:14px;
    color:#444;
    margin-bottom:15px;
}

/* TAGS */
.tags{
    margin-bottom:10px;
}

.tag{
    display:inline-block;
    background:#22c55e;
    color:white;
    padding:4px 8px;
    border-radius:6px;
    font-size:12px;
    margin-right:5px;
}

/* LIKES */
.reactions{
    font-weight:bold;
    color:#006748;
}

</style>

</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">

    <div class="logo">Posts</div>

    <ul class="nav-links">
        <li><a href="dashboard.php">🏠 Dashboard</a></li>
        <li><a href="products.php">🛍 Products</a></li>
        <li><a href="user_page.php">👤 Users</a></li>
        
        <li><a href="posts.php" class="active">📝 Posts</a></li>
        <li><a href="logout.php">🚪 Logout</a></li>
    </ul>

</div>

<!-- MAIN CONTENT -->
<div class="main-content">
   <h2 style="color:white; grid-column:1/-1;">Post List</h2>

<div class="container">

<?php foreach ($posts as $post): ?>

    <div class="post-card">

        <div class="post-title">
            <?= htmlspecialchars($post['title']) ?>
        </div>

        <div class="post-body">
            <?= substr(htmlspecialchars($post['body']), 0, 120) ?>...
        </div>

        <div class="tags">
            <?php foreach ($post['tags'] as $tag): ?>
                <span class="tag"><?= htmlspecialchars($tag) ?></span>
            <?php endforeach; ?>
        </div>

        <div class="reactions">
            ❤️ <?= $post['reactions']['likes'] ?> Likes
        </div>

    </div>

<?php endforeach; ?>

</div>

</div>

</body>
</html>