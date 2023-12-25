<?php
session_start();
?>
hi

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>

    <!-- CSS -->
    <link rel="stylesheet" href="./css/home.css">

    <!-- Font awesome (icon) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

</head>

<body>

    <header class="header">

        <div class="flex">

            <a href="admin_page.php" class="logo"><img src="./img/logohighclub.png" alt=""></a>

            <ul class="navbar">

                <li><a href="insert.php">Insert Product</a></li>
                <li><a href="updateDel.php">Update/Delete Product</a></li>
                <li><a href="product_list.php">Product List</a></li>
                <li><a href="clothes.php">Clothes</a></li>
            </ul>

            <div class="icons">
                <div id="menu-btn" class="fas fa-bars"></div>
                <div id="user-btn" class="fas fa-user"></div>
                <a href="login.php">Login</a>
                <a href="register.php">Register</a>
            </div>

            <div class="account-box">
                <p>Username: <span><?php echo $_SESSION['name']; ?></span></p>
                <p>Email: <span><?php echo $_SESSION['email']; ?></span></p>
                <a href="logout.php" class="delete-btn">Log out</a>
            </div>

        </div>

    </header>


    <section>
        <img src="./img/banner.jpg" alt="">

    </section>

    <script src="./js/home.js"></script>
</body>

</html>