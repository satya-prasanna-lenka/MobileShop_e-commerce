<?php
session_start();
$mag = false;
$err = false;
include("./connects/connect.php");
if (!isset($_SESSION['login'])) {
    $_SESSION['warning'] = "Login ❌ You can not enter to this page without login";
    header("location:admin-login.php");
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $_SESSION['id']  = $id;
}


$id = $_SESSION['id'];


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['submit_mobile'])) {

        $phone = $_POST['phone_name'];
        $dipPrice = $_POST['dprice'];
        $sellPrice = $_POST['sprice'];
        $short_disp = $_POST['sdip'];
        $long_disp = $_POST['ldip'];
        $feature = "no";
        if (isset($_POST['feature'])) {
            $sql = "SELECT * FROM `admin_mobiles` WHERE `feature`= 'yes'";
            $result = mysqli_query($conn, $sql);

            $num = mysqli_num_rows($result);
            if ($num >= 3) {
                $feature = "no";
                $err = "You can not put more then three features , please uncheck other...";
                $sql = "UPDATE `admin_mobiles` SET `product_name` = '$phone',`d_price`='$dipPrice',`s_price`='$sellPrice',`short_disp`='$short_disp',`long_disp`='$long_disp',`feature`='$feature' WHERE `admin_mobiles`.`id` = '$id'";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    $mag = true;
                } else {
                    echo "error";
                }
            } else {
                $feature = "yes";
                $sql = "UPDATE `admin_mobiles` SET `product_name` = '$phone',`d_price`='$dipPrice',`s_price`='$sellPrice',`short_disp`='$short_disp',`long_disp`='$long_disp',`feature`='$feature' WHERE `admin_mobiles`.`id` = '$id'";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    $mag = true;
                } else {
                    echo "error";
                }
            }
        }

        // $sql = "SELECT * FROM `admin_mobiles` WHERE `id`= '$id'";
        // $result = mysqli_query($conn, $sql);

        // $row = mysqli_fetch_assoc($result);


        // $photo = $row['main_img'];
        // $subp1 = $row['subp1'];
        // $subp2 = $row['subp2'];
        // $subp3 = $row['subp3'];



        $sql = "UPDATE `admin_mobiles` SET `product_name` = '$phone',`d_price`='$dipPrice',`s_price`='$sellPrice',`short_disp`='$short_disp',`long_disp`='$long_disp',`feature`='$feature' WHERE `admin_mobiles`.`id` = '$id'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $mag = true;
        } else {
            echo "error";
        }
    } else {
        echo "ppp";
    }
} else {
    echo "sss";
}
?>
<!doctype html>
<html lang="en">

<head>

    <title><?php echo $_SESSION['name'] ?></title>
    <link rel="shortcut icon" href="./images/payment-method.png" type="image/x-icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">
    <style>
        .top_mob {
            display: none;
        }

        .bot_oth {
            display: none !important;

        }
    </style>

</head>

<body>
    <?php
    include("./connects/header.php");
    ?>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <?php
                if ($mag) {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Your data has been Updated . <a href="dashbord.php">Click here?</a>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
                }
                if ($err) {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> ' . $err . ' <a href="dashbord.php">Click here?</a>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
                }
                ?>
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Hello <span style="color: #46b5d1;"><?php echo $_SESSION['name'] ?></span> ,You can edit your details
                    </h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="wrapper">
                        <div class="row mb-5 d-flex justify-content-center">

                            <div class="col-md-3" id="mobile">
                                <div class="dbox w-100 text-center">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <span class="fa fa-mobile"></span>
                                    </div>
                                    <div class="text">
                                        <p><span>Go back to:</span><a href="dashbord.php">Dashbord</a></p>
                                    </div>
                                </div>
                            </div>



                            <?php

                            $sql = "SELECT * FROM `admin_mobiles` WHERE `id`= '$id'";
                            $result = mysqli_query($conn, $sql);

                            $row = mysqli_fetch_assoc($result);
                            $feature = $row['feature'];
                            if ($feature == "yes") {
                                echo '
                                <div class="row no-gutters" id="top_mob">
                                    <div class="col-md-7">
                                        <div class="contact-wrap w-100 p-md-5 p-4">
                                            <h3 class="mb-4">Phones</h3>
                                           
                                            <form method="POST" action="edit.php" id="contactFormm" enctype="multipart/form-data" class="contactForm">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="label" for="name">Phone Name</label>
                                                            <input style="color:#46b5d1 ;" required value="' . $row['product_name'] . '" type="text" class="form-control" name="phone_name" id="name" placeholder="Name *">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="label" for="email">Diplay price</label>
                                                            <input style="color:#46b5d1 ;" value="' . $row['d_price'] . '"  type="text" required class="form-control" name="dprice" id="email" placeholder="Diplay Price *">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="label" for="subject">Selling price</label>
                                                            <input style="color:#46b5d1 ;" value="' . $row['s_price'] . '"  type="text" required class="form-control" name="sprice" id="subject" placeholder="Selling price *">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="label" for="subject">Feature</label>
                                                            <input style="color:#46b5d1 ;" value="' . $row['feature'] . '" checked type="checkbox"  class=""
                                                                name="feature" id="subject" >
                                                        </div>
                                                    </div>
                                                
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="label" for="#">Short discription</label>
                                                            <textarea  style="color:#46b5d1 ;" name="sdip" required class="form-control" id="message" cols="30" rows="2" placeholder="Write somethimg within 50 words *">' . $row['short_disp'] . '</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="label" for="#">Long discription</label>
                                                            <textarea  style="color:#46b5d1 ;" name="ldip" class="form-control" id="message" cols="30" rows="4" placeholder="Describe about this phone in broad">' . $row['long_disp'] . '</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <button type="submit" name="submit_mobile" class="btn btn-primary">Upload</button>
                                                            <div class="submitting"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-md-5 d-flex align-items-stretch">
                                        <div class="info-wrap w-100 p-5 img" style="background-image: url(images/eberhard-grossgasteiger-3uFxLmBTHN4-unsplash.jpg);">
                                        </div>
                                    </div>
                                </div>
                                
                                ';
                            } else {



                                echo '
                                <div class="row no-gutters" id="top_mob">
                                    <div class="col-md-7">
                                        <div class="contact-wrap w-100 p-md-5 p-4">
                                            <h3 class="mb-4">Phones</h3>
                                           
                                            <form method="POST" action="edit.php" id="contactFormm" enctype="multipart/form-data" class="contactForm">
                                            <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="label" for="name">Phone Name</label>
                                                            <input style="color:#46b5d1 ;" required value="' . $row['product_name'] . '" type="text" class="form-control" name="phone_name" id="name" placeholder="Name *">
                                                        </div>
                                                        </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="label" for="email">Diplay price</label>
                                                            <input style="color:#46b5d1 ;" value="' . $row['d_price'] . '"  type="text" required class="form-control" name="dprice" id="email" placeholder="Diplay Price *">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="label" for="subject">Selling price</label>
                                                            <input style="color:#46b5d1 ;" value="' . $row['s_price'] . '"  type="text" required class="form-control" name="sprice" id="subject" placeholder="Selling price *">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="label" for="subject">Feature</label>
                                                            <input style="color:#46b5d1 ;" value="' . $row['feature'] . '"  type="checkbox"  class=""
                                                                name="feature" id="subject" >
                                                        </div>
                                                    </div>
                                                 
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="label" for="#">Short discription</label>
                                                            <textarea  style="color:#46b5d1 ;" name="sdip" required class="form-control" id="message" cols="30" rows="2" placeholder="Write somethimg within 50 words *">' . $row['short_disp'] . '</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="label" for="#">Long discription</label>
                                                            <textarea  style="color:#46b5d1 ;" name="ldip" class="form-control" id="message" cols="30" rows="4" placeholder="Describe about this phone in broad">' . $row['long_disp'] . '</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <button type="submit" name="submit_mobile" class="btn btn-primary">Upload</button>
                                                            <div class="submitting"></div>
                                                        </div>
                                                        </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-md-5 d-flex align-items-stretch">
                                    <div class="info-wrap w-100 p-5 img" style="background-image: url(images/eberhard-grossgasteiger-3uFxLmBTHN4-unsplash.jpg);">
                                        </div>
                                    </div>
                                </div>
                                
                                ';
                            }

                            ?>

                        </div>
                    </div>
                    <a href="logout.php" class="btn btn-primary mt-4">Logout</a>
                </div>
            </div>
    </section>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/main.js"></script>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>


</body>

</html>