<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>

    <!-- CSS -->
    <link rel="stylesheet" href="./css/home.css">
    <!-- Bootstrap -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->

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
                <!-- <div id="menu-btn" class="fas fa-bars"></div> -->
                <div id="user-btn" class="fas fa-user"></div>
                <a href="login.php">Login</a>
                <a href="register.php">Register</a>
            </div>

            <div class="account-box">
                <p>Username: <span><?php echo $_SESSION['username']; ?></span></p>
                <p>Email: <span><?php echo $_SESSION['email']; ?></span></p>
                <a href="logout.php" class="delete-btn">Log out</a>
            </div>

        </div>

    </header>


    <!-- <section>
        <img class="banner" src="./img/banner.jpg" alt="">
    </section> -->

    <section>
        <h1 class="text-center mt-5">End of Season</h1>
    </section>

    <div class="d-flex justify-content-center">
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./img/basic_black.png" class="d-block w-95" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./img/basic_black.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./img/basic_black.png" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>



    <script src="./js/home.js"></script>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>