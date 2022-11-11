<?php
session_start();
include("./connects/connect.php");
$myMsg = false;

if (isset($_SESSION['msg'])) {
    $myMsg = $_SESSION['msg'];
} else if (isset($_SESSION['warning'])) {
    $myMsg = $_SESSION['warning'];
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `admin_login` WHERE `email` = '$email' AND `status` = 'active'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION['name'] = $row['name'];
            $_SESSION['login'] = true;
            header("location:admin.php");
        } else {
            $myMsg = "Enter the correct password";
        }
    } else {
        $myMsg = "Activate your account or signup this email";
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Admin Login</title>
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
            if ($myMsg) {
                echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
  <strong>Please!</strong> ' . $myMsg . '
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
            }
            ?>
            <form action="admin-login.php" method="POST">
                <h3 style="color: white;">login</h3>
                <p style="color: white;">This page is only for admin . No other can login from this page. A conformation email will be send to a particular account.
                </p>

                <label class="form-group" style=" margin-bottom: 30px; border-bottom: 2px solid rgb(33, 143, 253); ">
                    <input name="email" style="background-color: transparent; border:none;" type="text" class="form-control" required>
                    <span for="">Your Mail</span>
                    <span class="border"></span>
                </label>
                <label class="form-group" style=" margin-bottom: 30px; border-bottom: 2px solid rgb(33, 143, 253); ">
                    <input name="password" style="background-color: transparent; border:none;" type="password" class="form-control" required>
                    <span for="">Password</span>
                    <span class="border"></span>
                </label>


                <!-- <label class="form-group" style="border-bottom: 2px solid rgb(33, 143, 253);">
                    <textarea style="background-color: transparent; border:none;" name="" id="" class="form-control" required></textarea>
                    <span for="">Your Message</span>
                    <span class="border"></span>
                </label> -->
                <button type="submit" name="submit">Login
                    <i class="zmdi zmdi-arrow-right"></i>
                </button>
                <p style="color: white;margin-top: 20px;">
                    If you are not signed up yet follow the link <a href="admin-signup.php">Click here?</a>
                </p>
            </form>
            <p style="color: white;margin-top: 20px;">
                Forget password? <a href="forget.php">Click here?</a>
            </p>
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