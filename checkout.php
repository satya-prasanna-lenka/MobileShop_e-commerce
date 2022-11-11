<?php
session_start();
require("./connects/connect.php");
if ($_SESSION['phone_id'] == false) {
  $_SESSION['choose_aproduct'] = true;
  header("location:products.php");
}
$success = false;
$err = false;

$cod = 0;
$product_id = $_SESSION['phone_id'];
$sql = "SELECT * FROM `admin_mobiles` WHERE `id` = '$product_id' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);




if ($result) {
  $sql = "SELECT * FROM  `order_details` WHERE `phone_id` = '$product_id' ORDER BY `id` DESC";
  $result = mysqli_query($conn, $sql);
  $satya = mysqli_fetch_assoc($result);
  $my_id = $satya['id'];
  if ($satya['home_delivery'] == 1) {
    $cod = 20;
  }

  $price =  $row['s_price'];
  $all_p = (int) $satya['qty'];
  $price = $all_p * intval(preg_replace('/[^\d.]/', '', $price));
  // echo gettype($price);
  // echo $price;

  $final = $price + $cod;


  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone_num = $_POST['phone'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $alt_phone = $_POST['alt_phone'];

    $sql = "UPDATE `order_details` SET `name` = '$name' , `email` = '$email',`phone_num` = '$phone_num',`address`='$address',`city`='$city',`state`= '$state' ,`zip`='$zip', `alt_phone`= '$alt_phone',`total`='$final' WHERE `id`= '$my_id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      $email_to = $email;
      $subject = "Order success";
      $body = "Your order has been placed $name. We will contact you soon";
      $headers = "From : webtechd7@gmail.com";
      mail($email_to, $subject, $body, $headers);

      $email_admin = "satyale39@gmail.com";
      $subject = "Order placed";
      $body = "Order has been placed by $name , for more info vist http://localhost/all/BanadeviMobiles/user_msg.php";
      $headers = "From : webtechd7@gmail.com";
      mail($email_admin, $subject, $body, $headers);


      $success = "Your order has been placed";
      $_SESSION['phone_id'] = false;
      $_SESSION['choose_aproduct'] = false;
      // header("location:products.php");
      sleep(0.1);
    } else {
      $err = "Something went wrong";
    }
  }
}





?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="./images/payment-method.png" type="image/x-icon">

  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  <title>Checkout</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/owl.css">
</head>

<body>
  <?php
  if ($success) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong>' . $success . '
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  } else if ($err) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> ' . $err . '
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  }
  ?>
  <!-- ***** Preloader Start ***** -->
  <div id="preloader">
    <div class="jumper">
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- Header -->
  <div class="sub-header">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-xs-12">
          <ul class="left-info">
            <li><a href="mailto:satyale39@gmail.com"><i class="fa fa-envelope"></i>satyale39@gmail.com</a></li>
            <li><a href="tel:8280799142"><i class="fa fa-phone"></i>8280799142</a></li>
          </ul>
        </div>
        <div class="col-md-4">
          <ul class="right-icons">
            <li><a target="_blank" href="https://www.facebook.com/banadevimobiles/"><i class="fa fa-facebook"></i></a>
            </li>
            <li><a target="_blank" href="https://api.whatsapp.com/send?phone=+918280799142"><i class="fa fa-whatsapp"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.html"><h2>Mobile Store<em> Website</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="index.html">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="products.html">Products</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="checkout.html">Checkout</a>
              </li>
              <li class="nav-item dropdown">
                <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">About</a>
              
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="about.html">About Us</a>
                    <a class="dropdown-item" href="blog.html">Blog</a>
                    <a class="dropdown-item" href="testimonials.html">Testimonials</a>
                    <a class="dropdown-item" href="terms.html">Terms</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.html">Contact Us</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header> -->
  <?php
  include("./connects/header.php");
  ?>


  <!-- Page Content -->
  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1>Checkout</h1>
          <span><?php echo $row['product_name'] ?></span>
        </div>
      </div>
    </div>
  </div>

  <div class="contact-information">
    <div class="container">
      <ul class="list-group list-group-flush">
        <li class="list-group-item">
          <div class="row">
            <div class="col-6">
              <em>Sub-total</em>
            </div>

            <div class="col-6 text-right">
              <strong>$ <?php echo $row['s_price'] ?></strong>
            </div>
          </div>
        </li>

        <li class="list-group-item">
          <div class="row">
            <div class="col-6">
              <em>Delivery Charge</em>
            </div>

            <div class="col-6 text-right">
              <strong>$ <?php echo $cod ?></strong>
            </div>
          </div>
        </li>

        <li class="list-group-item">
          <div class="row">
            <div class="col-6">
              <em>Quantity</em>
            </div>

            <div class="col-6 text-right">
              <strong><?php $all_p = (int) $satya['qty'];
                      echo $all_p;

                      ?></strong>
            </div>
          </div>
        </li>

        <li class="list-group-item">
          <div class="row">
            <div class="col-6">
              <em>Grand Total</em>
            </div>

            <div class="col-6 text-right">
              <strong>$ <?php
                        $price =  $row['s_price'];
                        $price = $all_p * intval(preg_replace('/[^\d.]/', '', $price));
                        // echo gettype($price);
                        // echo $price;

                        $final = $price + $cod;
                        echo $final;
                        ?></strong>
            </div>
          </div>
        </li>

        <!-- <li class="list-group-item">
          <div class="row">
            <div class="col-6">
              <em>Deposit payment required</em>
            </div>

            <div class="col-6 text-right">
              <strong>$ 20.00</strong>
            </div>
          </div>
        </li> -->
      </ul>
    </div>
  </div>

  <div class="callback-form contact-us">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="contact-form">
            <form action="./checkout.php" method="POST" id="contact">
              <div class="row">
                <div class="col-sm-6 col-xs-12">
                  <div class="form-group">
                    <select class="form-control" data-msg-required="This field is required.">
                      <option value="">-- Choose Title --</option>
                      <option value="dr">Dr.</option>
                      <option value="miss">Miss</option>
                      <option value="mr">Mr.</option>
                      <option value="mrs">Mrs.</option>
                      <option value="ms">Ms.</option>
                      <option value="other">Other</option>
                      <option value="prof">Prof.</option>
                      <option value="rev">Rev.</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                  <div class="form-group">
                    <input type="text" required name="name" class="form-control" placeholder="*Name:">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6 col-xs-12">
                  <div class="form-group">
                    <input type="email" required name="email" class="form-control" placeholder="*Email:">
                  </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                  <div class="form-group">
                    <input type="text" required name="phone" class="form-control" placeholder="*Phone:">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6 col-xs-12">
                  <div class="form-group">
                    <input type="text" name="address" class="form-control" placeholder="Address 1:">
                  </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                  <!-- <div class="form-group">
                    <input type="text" name="alt_address" class="form-control" placeholder="Address 2:     *optional">
                  </div> -->
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6 col-xs-12">
                  <div class="form-group">
                    <input type="text" name="city" class="form-control" placeholder="City:">
                  </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                  <div class="form-group">
                    <input type="text" name="state" class="form-control" placeholder="State:">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6 col-xs-12">
                  <div class="form-group">
                    <input type="text" name="zip" class="form-control" placeholder="Zip:">
                  </div>
                </div>



                <div class="col-sm-6 col-xs-12">
                  <div class="form-group">
                    <input type="text" name="alt_phone" class="form-control" placeholder="Alternative Phone">
                  </div>
                </div>
              </div>


              <div class="row">
                <div class="col-lg-12">
                  <button type="submit" name="submit" id="form-submit" class="filled-button">Buy Now</button>
                </div>
              </div>
            </form>
            <br>
            <p>* marked labels are mandatory to fill </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer Starts Here -->
  <?php
  include("./connects/footer.php");
  ?>




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

  <script language="text/Javascript">
    cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
    function clearField(t) { //declaring the array outside of the
      if (!cleared[t.id]) { // function makes it static and global
        cleared[t.id] = 1; // you could use true and false, but that's more typing
        t.value = ''; // with more chance of typos
        t.style.color = '#fff';
      }
    }
  </script>

</body>

</html>