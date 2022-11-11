<?php
include("./connects/connect.php");
session_start();
$err = false;
$success = false;

if (isset($_SESSION['warning'])) {
    $_SESSION['warning'] = false;
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    $pass = password_hash($password, PASSWORD_BCRYPT);
    $token = bin2hex(random_bytes(15));

    $sql = "SELECT * FROM `admin_login` WHERE `email`= '$email'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num > 0) {
        $err = "This email already registered";
    } else if ($password == $cpassword) {

        // $sql = "INSERT INTO `admin_login` (`id`, `name`, `email`, `password`, `token`, `status`) VALUES (NULL, '$name', '$email', '$pass', '$token', 'inactive')";
        // $result = mysqli_query($conn, $sql);
        // if ($result) {
        // $subject = "Email activation";
        // $body = "Hi, click here to active your acount
        //     http://localhost/notice/activate.php?token=$token";
        // $headers = "From: webtechd7@gmail.com";
        // $emai = "satyale39@gmail.com";

        // if (mail($emai, $subject, $body, $headers)) {
        //     session_start();
        //     $_SESSION['msg'] = "Check your email to activate your account $emai";
        //     header('location:admin-login.php');
        // } else {
        //     // echo "Email sending fail";
        //     $err = "Email sending failed";
        // }
        // } else {
        //     $err = "Something went wrong";
        // }
    } else {
        $err = "Password do not match";
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Admin Signup</title>
    <link rel="shortcut icon" href="./images/payment-method.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="my_css/style.css">

    <!-- Bootstrap core CSS -->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <?php
    include("./connects/header.php");
    ?>

    <div class="wrapper">
        <div class="inner">

            <?php
            if ($err) {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> ' . $err . '
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
            }
            ?>

            <form action="admin-signup.php" method="POST">
                <h3 style="color: white;">signup</h3>
                <p style="color: white;">This page is only for admin . No other can signup from this page. A conformation email will be send to a particular account.
                </p>
                <label class="form-group" style="margin-bottom: 30px;border-bottom: 2px solid rgb(33, 143, 253);">
                    <input name="name" style="background-color: transparent; border:none; color: white;" type="text" class="form-control" required>
                    <span>Your Name</span>
                    <span class="border"></span>
                </label>
                <label class="form-group" style=" margin-bottom: 30px; border-bottom: 2px solid rgb(33, 143, 253); ">
                    <input name="email" style="background-color: transparent; border:none;color: white;" type="text" class="form-control" required>
                    <span for="">Your Mail</span>
                    <span class="border"></span>
                </label>
                <label class="form-group" style=" margin-bottom: 30px; border-bottom: 2px solid rgb(33, 143, 253); ">
                    <input name="password" style="background-color: transparent; border:none;color: white;" type="password" class="form-control" required>
                    <span for="">Password</span>
                    <span class="border"></span>
                </label>
                <label class="form-group" style=" margin-bottom: 30px; border-bottom: 2px solid rgb(33, 143, 253); ">
                    <input name="cpassword" style="background-color: transparent; border:none;color: white; " type="password" class="form-control" required>
                    <span for="">Confirm password</span>
                    <span class="border"></span>
                </label>

                <!-- <label class="form-group" style="border-bottom: 2px solid rgb(33, 143, 253);">
                    <textarea style="background-color: transparent; border:none;" name="" id="" class="form-control" required></textarea>
                    <span for="">Your Message</span>
                    <span class="border"></span>
                </label> -->
                <button type="submit" name="submit">Signup
                    <i class="zmdi zmdi-arrow-right"></i>
                </button>
            </form>
        </div>
    </div>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/accordions.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>