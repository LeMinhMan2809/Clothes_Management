<?php
session_start();
require_once "connect-select-db.php";
$id = $_GET['id'];

if (isset($_POST['update_product'])) {

    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_FILES['product_image']['name'];
    $image_tmp_name = $_FILES['product_image']['tmp_name'];
    $image_folder = 'product_uploaded/' . $image;

    $update_sql = "UPDATE clothes SET p_name = '$name', p_price = '$price' WHERE p_id = $id";
    $update_result = mysqli_query($conn, $update_sql);
    if ($update_result) {
        header("Location:clothes.php");
        move_uploaded_file($image_tmp_name, $image_folder);                                                                                                                              
    } else {
        $message[] = "Update failed";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Page</title>

    <!-- CSS -->
    <link rel="stylesheet" href="./css/home.css">

    <!-- Font awesome (icon) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

</head>

<body>

    <?php
    if (isset($message)) {
        foreach ($message as $message) {
            echo '
       <div class="message">
          <span style="margin-left: auto; margin-right:auto;font-size: 1.3rem;
                font-weight: 500;">' . $message . '</span>
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

        <form action="" method="post" enctype="multipart/form-data">

            <?php
            $id = $_GET['id'];
            $sql = "SELECT * FROM clothes WHERE p_id = $id ";
            $result = mysqli_query($conn, $sql);

            $row = mysqli_fetch_assoc($result);
            ?>

            <h3>Update product</h3>

            <input type="text" name="name" class="box" value="<?php echo $row['p_name'] ?>">
            <input type="number" name="price" class="box" value="<?php echo $row['p_price'] ?>">
            <input type="file" accept="image/jpg, image/jpeg, image/png" name="product_image" class="box">
            <input type="submit" value="Update product" name="update_product" class="submit_button">

        </form>
    </div>

    <script src="./js/home.js"></script>
</body>

</html>