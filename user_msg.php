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
            <h1 class="text-center">Orders</h1>
            <thead>
                <tr>
                    <th scope="col">slno.</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">User Email</th>
                    <th scope="col">User Name</th>
                    <th scope="col">User Number</th>
                    <th scope="col">Home delivery</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Address</th>
                    <th scope="col">Alt Phone</th>
                    <th scope="col">Order Date</th>
                    <th scope="col">Delete</th>

                </tr>
            </thead>
            <tbody>
                <!-- <tr> -->
                <?php
                $sql = "SELECT * FROM `order_details` WHERE `email`!='' ";
                $result = mysqli_query($conn, $sql);
                $slno = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row['home_delivery'] == 1) {
                        $delivery = "yes";
                    } else {
                        $delivery = "No";
                    }
                    $slno += 1;

                    echo '
                            <tr>
                            <th scope="row">' . $slno . '</th>
                        <td>' . $row['phone_name'] . '</td>
                        <td>' . $row['email'] . '</td>
                        <td>' . $row['name'] . '</td>
                        <td>' . $row['phone_num'] . '</td>
                        <td>' . $delivery . '</td>
                        <td>' . $row['qty'] . '</td>
                        <td>' . $row['total'] . '</td>
                        <td>' . $row['address'] . ', <br>' . $row['city'] . ',' . $row['state'] . ',<br>' . $row['zip'] . '</td>
                        <td>' . $row['alt_phone'] . '</td>
                        <td>' . $row['date'] . '</td>
                      
                        <td><a href="delete_order.php?id=' . $row['id'] . '"><button class="btn btn-danger">Delete</button></a></td>
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

        <p class="text-center text-muted">Please delete the orders after the purchase had complited</p>
        <table class="table table-primary">
            <h1 class="text-center">Messages from user</h1>
            <thead>
                <tr>
                    <th scope="col">slno.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Number</th>
                    <th scope="col">Message</th>
                    <th scope="col">Date&time</th>
                    <th scope="col">Delete</th>

                </tr>
            </thead>
            <tbody>
                <!-- <tr> -->
                <?php
                $sql = "SELECT * FROM `user_msg` ";
                $result = mysqli_query($conn, $sql);
                $slno = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $slno += 1;

                    echo '
                            <tr>
                            <th scope="row">' . $slno . '</th>
                        <td>' . $row['name'] . '</td>
                        <td>' . $row['email'] . '</td>
                        <td>' . $row['subject'] . '</td>
                        <td>' . $row['msg'] . '</td>
                        <td>' . $row['date'] . '</td>
                      
                        <td><a href="delete_msg.php?id=' . $row['id'] . '"><button class="btn btn-danger">Delete</button></a></td>
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