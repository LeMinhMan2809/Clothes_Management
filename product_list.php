<?php
session_start();
require_once "connect-select-db.php";

if (isset($_POST['add_product'])) {

    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_FILES['product_image']['name'];
    $image_tmp_name = $_FILES['product_image']['tmp_name'];
    $image_folder = 'product_uploaded/' . $image;

    $sql = "INSERT INTO clothes (p_name ,p_price, p_image) VALUES ('$name', '$price', '$image')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        move_uploaded_file($image_tmp_name, $image_folder);
        $message[] = "Insert successfully";
    } else {
        $message[] = "Insert failed";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>

    <!-- CSS -->
    <link rel="stylesheet" href="./css/show_product.css">

    <!-- Font awesome (icon) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

</head>

<body>

    <?php
    if (isset($message)) {

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

    <header class="header">

        <div class="flex">

            <a href="" class="logo"><img src="./img/logohighclub.png" alt=""></a>

            <ul class="navbar">

                <li><a href="insert.php">Insert Product</a></li>
                <li><a href="updateDel.php">Update/Delete Product</a></li>
                <li><a href="product_list.php">Product List</a></li>
                <li><a href="clothes.php">Clothes</a></li>
            </ul>

            <div class="icons">
                <!-- <div id="menu-btn" class="fas fa-bars"></div> -->
                <div id="user-btn" class="fas fa-user"></div>
            </div>

            <div class="account-box">
                <p>Username: <span><?php echo $_SESSION['name']; ?></span></p>
                <p>Email: <span><?php echo $_SESSION['email']; ?></span></p>
                <a href="logout.php" class="delete-btn">Log out</a>
            </div>

        </div>

    </header>


    <?php

    $select_sql = "SELECT * FROM clothes";

    $select_query = mysqli_query($conn, $select_sql);

    ?>
    <div class="table_container">

        <table class="table">
            <thead>
                <tr>
                    <td>Image</td>
                    <td>Name</td>
                    <td>Price</td>
                </tr>
            </thead>

            <?php
            while ($row = mysqli_fetch_assoc($select_query)) { ?>
                <tr>
                    <td><img src="product_uploaded/<?php echo $row['p_image']; ?>" height="100" alt=""></td>
                    <td><?php echo $row['p_name']; ?> </td>
                    <td><?php echo $row['p_price']; ?><span> đ</span></td>

                </tr>
            <?php     } ?>

        </table>

    </div>

    <script src="./js/home.js"></script>

</body>

</html>