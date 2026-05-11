<?php
session_start();

$loginError = $_SESSION['login_error'] ?? '';
$registerError = $_SESSION['register_error'] ?? '';
$activeForm = $_SESSION['active_form'] ?? 'login';

unset($_SESSION['login_error']);
unset($_SESSION['register_error']);
unset($_SESSION['active_form']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login/Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-box <?= ($activeForm == 'login') ? 'active' : '' ?>" id="login-form">
    <form action="login.php" method="post">
        <h2>LOGIN</h2>

        <?php if ($loginError) { ?>
            <p class="error-message"><?= $loginError ?></p> <?php } ?>

        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Login</button>

        <p> Don't have an account? <a href="#" class="no-underline" onclick="showForm('register-form')">Register</a></p>
    </form>
</div>

<div class="form-box <?= ($activeForm == 'register') ? 'active' : '' ?>" id="register-form">
    <form action="register.php" method="post">
        <h2>REGISTER</h2>

        <?php if ($registerError) { ?>
            <p class="error-message"><?= $registerError ?></p>
        <?php } ?>

        <input type="text" name="fullname" placeholder="Fullname" required>
         <input type="email" name="email" placeholder="Email" required>
         <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="re-enter" placeholder="Re-enter Password" required>
        

        <button type="submit" name="register">Register</button>
        <p> Already have an account? <a href="#" class="no-underline" onclick="showForm('login-form')">Login</a></p>
    </form>
</div>

<script>
function showForm(formId){
    document.querySelectorAll(".form-box").forEach(f => f.classList.remove("active"));
    document.getElementById(formId).classList.add("active");
}
</script>
<style>
       body {
      margin: 0;
      height: 100vh;
      background-image: url('green.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      display: flex;
      justify-content: center;
      align-items: center;
      color: white;
      font-family: Arial, sans-serif;
    }

    .content {
      background: rgba(0,0,0,0.5);
      padding: 20px 40px;
      border-radius: 10px;
      text-align: center;
    }

h2{
    color:white;
}
button {
    background: #ffffff47;
    color: rgb(255, 255, 255);
    border: none;
    transition: 0.3s;
    border-radius: 30px;
    cursor: pointer;   
    padding: 10px 20px;   
    width:350px;
    
}
p{
    color:white;
}
.no-underline {
  text-decoration: none;
  color:red;
}
 button:hover {
    background-color:#22c55e;
    transform: scale(1.1);
  }
</style>

</body>
</html>