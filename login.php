<?php

require_once "connect-select-db.php";
session_start();

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $pass = $_POST['password'];
    // $email = $_POST['email'];
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$pass'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $_SESSION['username']= $row['username'];
        $_SESSION['email'] = $row['email'];

        if ($row['usertype'] == 'user'){
            header("Location:user_page.php");
        }
        else if ($row['usertype'] == 'admin') {
            header("Location:admin_page.php");
        }
        } else {
        $message[] = "Wrong username and password";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- CSS -->
    <link rel="stylesheet" href="./css/login.css">

    <!-- Font awesome (icon) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body>


<?php
    if (isset($message)){

    foreach ($message as $message) {
        echo '
       <div class="message">
          <span>' . $message . '</span>
          <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
       </div>
       ';
    }
    }
?>

    <div class="center">

        <h2>Login</h2>
        <form action="" method="post">

            <div class="text-field">
                <input type="text" name="username" autofocus required>
                <span></span>
                <label for="name">Enter your username</label>
            </div>

            <div class="text-field">
                <input type="password" name="password" required>
                <span></span>
                <label for="password">Enter your password</label>
            </div>

            <input type="submit" value="Login" name="login">

            <div class="login_link">
                Don't have an account? <a href="register.php">Register now</a>
            </div>
        </form>

    </div>


</body>
</html>