<?php
session_start();
require_once "connect-select-db.php";
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

    <!-- Font awesome (icon) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body>

    <header class="header">

        <div class="flex">

            <a href="admin_page.php" class="logo"><img src="./img/logohighclub.png" alt=""></a>

            <ul class="navbar">

                <li><a href="insert.php">TOPS</a></li>
                <li><a href="updateDel.php">BOTTOMS</a></li>
                <li><a href="product_list.php">OUTERWEARS</a></li>
                <li><a href="clothes.php">ACCESSORIES</a></li>
            </ul>

            <div class="icons">
                <!-- <div id="menu-btn" class="fas fa-bars"></div> -->
                <div id="user-btn" class="fas fa-user"></div>
                <!-- <a href="login.php">Login</a>
                <a href="register.php">Register</a> -->
            </div>

            <div class="account-box">
                <p>Username: <span><?php echo $_SESSION['username']; ?></span></p>
                <p>Email: <span><?php echo $_SESSION['email']; ?></span></p>
                <a href="logout.php" class="delete-btn">Log out</a>
            </div>

        </div>

    </header>

    <section>
        <img class="banner" src="./img/banner.jpg" alt="">
    </section>


    <section>
        <h1 class="eos-title">End of Season</h1>

        <div class="eos-container">
            <?php
            $sql = "SELECT * FROM clothes";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <div class="eos-product">
                    <img src="product_uploaded/<?php echo $row['p_image']; ?>" alt="">
                    <div><?php echo $row['p_name']; ?></div>
                    <div class="price"><?php echo $row['p_price']; ?> <span> đ</span> </div>
                </div>
            <?php
            }
            ?>
        </div>
    </section>


    <!-- Footer -->
    <section class="footer">

        <div class="footer-container">

            <div class="footer-item">
                <p style="padding-bottom: 2rem; padding-top: 1rem; font-weight: 800;">Chính sách</p>
                <p class="footer-subitem">Chính sách đổi trả</p>
                <p class="footer-subitem">Chính sách bảo mật</p>
                <p class="footer-subitem">Chính sách giao nhận - kiểm hàng</p>
                <p class="footer-subitem">Chính sách bảo vệ thông tin</p>
            </div>

            <div style="padding-right: 1rem;">
                <p style="padding-bottom: 2rem; padding-top: 1rem; font-weight: 800;">Thông tin liên hệ</p>
                <p class="footer-subitem"><i style="padding-right: 1rem;" class="fa-solid fa-phone"></i>0904 821 393</p>
                <p class="footer-subitem"><i style="padding-right: 1rem;" class="fa-solid fa-location-dot"></i>số 280B3 đường Lương Định Của, phường An Phú, thành phố Thủ Đức, TP.HCM</p>
                <p class="footer-subitem"><i style="padding-right: 1rem;" class="fa-solid fa-envelope"></i>support@highclub.vn</p>
            </div>

            <div>
                <div style="padding-bottom: 2rem; padding-top: 1rem;">
                    <img style="width: 2rem;" src="https://file.hstatic.net/200000280689/file/600px-facebook-icon-1_f786836cf27145d297f0999fb1ce3f5b.jpg" alt="">
                    <img style="width: 2rem;" src="https://file.hstatic.net/200000280689/file/instagram_8c9f3629ae5b4b74a8170dec6680db20.png" alt="icon-social-2">
                    <img style="width: 2rem;" src="https://file.hstatic.net/200000280689/file/2015036_f36eb4b120fa4a9181ae5714de2a3770.jpg" alt="icon-social-3">
                </div>
            </div>
        </div>

        <div>
            <p style="text-align: center; font-weight: 400; font-size: 0.8rem;"><i>Get design idea from HIGHCLUB</i></p>
        </div>

    </section>




    <!-- JS -->
    <script src="./js/home.js"></script>
</body>

</html>