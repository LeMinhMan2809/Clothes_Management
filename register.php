<?php

require_once "connect-select-db.php";

if (isset($_POST['register'])) {

   $name = $_POST['name'];
   $email = $_POST['email'];
   $pass = $_POST['password'];
   $cpass = $_POST['cpassword'];

   $sql = "SELECT * FROM users WHERE name = '$name' AND password = '$pass'";

   $result = mysqli_query($conn, $sql);

   if (mysqli_num_rows($result) > 0) {
      $message[] = "User already exist";
   } else {
      if ($pass != $cpass) {
         $message[] = "Confirm password not matched!";
      } else {
         mysqli_query($conn, "INSERT INTO `users`(name, email, password) VALUES('$name', '$email', '$pass')") or die('query failed');
         $message[] = 'Registered successfully!';
         //          header('location:login.php');
      }
   }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="./css/register.css">

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


   <div class="center">

      <h2>Register</h2>
      <form action="" method="post" onsubmit="return validateRegister()">

         <div class="text-field">
            <input type="text" name="name" id="name" autofocus>
            <span></span>
            <label for="name">Enter your username</label>

            <span id="error_name" class="error"></span>
         </div>

         <div class="text-field">
            <input type="email" name="email" id="email">
            <span></span>
            <label for="email">Enter your email</label>
            <span id="error_email" class="error"></span>
         </div>

         <div class="text-field">
            <input type="password" name="password" id="password">
            <span></span>
            <label for="password">Enter your password</label>
            <span id="error_password" class="error"></span>
         </div>

         <div class="text-field">
            <input type="password" name="cpassword" id="password2">
            <span></span>
            <label for="cpassword">Confirm your password</label>
            <span id="error_password2" class="error"></span>
         </div>

         <input type="submit" value="Register" name="register">

         <div class="login_link">
            Already have an account? <a href="login.php">Login now</a>
         </div>
      </form>

   </div>


   <!-- <div class="form-container">

        <form action="" method="post">
            <h3>Register</h3>
            <input type="text" name="name" placeholder="enter your name" required class="box">
            <input type="password" name="password" placeholder="enter your password" required class="box">
            <input type="password" name="cpassword" placeholder="confirm your password" required class="box">
            <input type="submit" name="submit" value="Register now" class="btn">
            <p>Already have an account? <a href="login.php">Login now</a></p>
        </form>

    </div> -->

   <script src="./js/register.js"></script>

</body>

</html>