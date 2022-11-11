<?php
session_start();
include("./connects/connect.php");
if (!isset($_SESSION['login'])) {
    $_SESSION['warning'] = "Login ❌ You can not enter to this page without login";
    header("location:admin-login.php");
}
?>
<!DOCTYPE html>
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
</head>

<body>
    <!-- </header>  -->
    <?php
    include("./connects/header.php");
    ?>

    <div class=" mt-4">
        <div class="col-md-12 text-center mb-5 ">
            <h2 class="heading-section">Hello <span style="color: #46b5d1;"><?php echo $_SESSION['name'] ?></span></h2>
        </div>
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">slno.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Display price</th>
                    <th scope="col">Selling price</th>
                    <th scope="col">Short Disp.</th>
                    <th scope="col">Long Disp.</th>
                    <th scope="col">Main image</th>
                    <th scope="col">sub img1</th>
                    <th scope="col">sub img2</th>
                    <th scope="col">sub img3</th>
                    <th scope="col">Feature?</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <!-- <tr> -->
                <?php
                $sql = "SELECT * FROM `admin_mobiles` WHERE `type`= 'mobile'";
                $result = mysqli_query($conn, $sql);
                $slno = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $slno += 1;

                    echo '
                            <tr>
                            <th scope="row">' . $slno . '</th>
                        <td>' . $row['product_name'] . '</td>
                        <td>' . $row['d_price'] . '</td>
                        <td>' . $row['s_price'] . '</td>
                        <td>' . $row['short_disp'] . '</td>
                        <td>' . $row['long_disp'] . '</td>
                        <td><img src="./photos/' . $row['main_img'] . '" alt="HTML5 Icon" style="width:128px;height:128px;object-fit: cover;"></td>
                        <td><img src="./photos/' . $row['subp1'] . '" alt="No image" style="width:128px;height:128px;object-fit: cover;background-repeat: no-repeat;"></td>
                        <td><img src="./photos/' . $row['subp2'] . '" alt="No image" style="width:128px;height:128px;object-fit: cover;"></td>
                        <td><img src="./photos/' . $row['subp3'] . '" alt="No image" style="width:128px;height:128px;object-fit: cover;"></td>
                       
                        <td style="text-transform: uppercase;">' . $row['feature'] . '</td>
                        <td><a href="edit.php?id=' . $row['id'] . '"><button class="btn btn-success">Edit</button></a></td>
                        <td><a href="delete.php?id=' . $row['id'] . '"><button class="btn btn-danger">Delete</button></a></td>
                        </tr>
                        ';
                }


                ?>
                <!-- <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td> -->
                <!-- </tr> -->
            </tbody>
        </table>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/main.js"></script>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>