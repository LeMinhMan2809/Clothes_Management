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
    <link rel="stylesheet" href="./css/home.css">

    <!-- Font awesome (icon) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

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

    <div class="add-product">

        <h1></h1>

        <form action="product_list.php" method="post" enctype="multipart/form-data">

            <h3>Add product</h3>

            <input type="text" name="name" class="box" placeholder="Enter product name">
            <input type="number" name="price" class="box" placeholder="Enter product price">
            <input type="file" accept="image/jpg, image/jpeg, image/png" name="product_image" class="box">
            <input type="submit" value="Add product" name="add_product" class="submit_button">

        </form>


    </div>

    <div class="box-container">

        <?php
        $select_sql = "SELECT * FROM clothes";
        $select_query = mysqli_query($conn, $select_sql);
        while ($row = mysqli_fetch_assoc($select_query)) {
        ?>

            <div class="box_product">
                <img src="product_uploaded/<?php echo $row['p_image']; ?>" alt="">
                <div><?php echo $row['p_name']; ?></div>
                <div class="price"><?php echo $row['p_price']; ?> <span> đ</span> </div>
                <a href="update.php?id=<?php echo $row['p_id']; ?>" class="edit-btn"> Update </a>
                <button class="del-btn" onclick="del(<?php echo $row['p_id']; ?>)">Delete</button>
            </div>

        <?php
        }
        ?>

    </div>


    <script src="./js/home.js"></script>
</body>

</html>