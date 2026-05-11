<?php
session_start();

$conn = new mysqli("localhost", "root", "", "register_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    // Get user by email only
    $sql = "SELECT * FROM register_list WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {

        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {

          
            $_SESSION['username'] = $user['username'];
            $_SESSION['fullname'] = $user['fullname'];

            header("Location: dashboard.php");
            exit();

        } else {

            $_SESSION['login_error'] = "Incorrect email or password";
            $_SESSION['active_form'] = "login";

            header("Location: index.php");
            exit();
        }

    } else {

        $_SESSION['login_error'] = "Incorrect email or password";
        $_SESSION['active_form'] = "login";

        header("Location: index.php");
        exit();
    }
}
?>
