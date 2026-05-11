<?php
session_start();

$conn = new mysqli("localhost", "root", "", "register_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

/* ================= REGISTER ================= */
if (isset($_POST['register'])) {

    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if email exists
    $check = $conn->query("SELECT * FROM register_list WHERE email='$email'");

    if ($check && $check->num_rows > 0) {

        $_SESSION['register_error'] = "Email already exists";
        $_SESSION['active_form'] = "register";

        header("Location: index.php");
        exit();
    }

    // HASH PASSWORD
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user with hashed password
    $conn->query("
        INSERT INTO register_list (fullname, username, email, password)
        VALUES ('$fullname', '$username', '$email', '$hashed_password')
    ");

    $_SESSION['active_form'] = "login";

    header("Location: index.php");
    exit();
}
?>