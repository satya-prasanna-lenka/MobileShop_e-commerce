<?php
include("./connects/connect.php");
session_start();
if (!isset($_GET['id']) && !isset($_POST['submit'])) {
  header("location:products.php");
}

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $_SESSION['phone_id'] = $id;
  $sql = "SELECT * FROM `admin_mobiles` WHERE `id`='$id'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $product_name = $row['product_name'];
}

if (isset($_POST['submit'])) {
  $id = $_SESSION['phone_id'];
  $sql = "SELECT * FROM `admin_mobiles` WHERE `id`='$id'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $product_name = $row['product_name'];

  $select = $_POST['select'];
  $qty = $_POST['qty'];


  $sql = "INSERT INTO `order_details` (`id`, `phone_id`, `phone_name`, `home_delivery`, `qty`, `date`) VALUES (NULL, '$id', '$product_name', '$select', '$qty', current_timestamp())";
  $result = mysqli_query($conn, $sql);


  if ($result) {
    header("location:checkout.php");
  } else {
    echo "satya";
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

  <title>Product Details</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/owl.css">
</head>

<body>

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
  <?php
  include("./connects/header.php");
  ?>



  <!-- Page Content -->
  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1><small><del><sup>$</sup><?php echo $row['d_price'] ?> </del></small> &nbsp; <sup>$</sup><?php echo $row['s_price'] ?></h1>
          <span>
            <?php echo $row['product_name'] ?>
          </span>
        </div>
      </div>
    </div>
  </div>

  <div class="services">
    <div class="container">
      <div class="row">
        <div class="col-md-7">
          <div>
            <?php echo '<img src="./photos/' . $row['main_img'] . '" alt="" class="img-fluid wc-image">' ?>
            <!-- <img src="assets/images/product-1-720x480.jpg" alt="" class="img-fluid wc-image"> -->
          </div>

          <br>

          <div class="row">
            <div class="col-sm-4 col-6">
              <div>
                <?php echo ' <img src="./photos/' . $row['subp1'] . '" alt="" class="img-fluid">' ?>
                <!-- <img src="assets/images/product-1-720x480.jpg" alt="" class="img-fluid"> -->
              </div>
              <br>
            </div>
            <div class="col-sm-4 col-6">
              <div>
                <?php echo ' <img src="./photos/' . $row['subp2'] . '" alt="" class="img-fluid">' ?>
                <!-- <img src="assets/images/product-2-720x480.jpg" alt="" class="img-fluid"> -->
              </div>
              <br>
            </div>
            <div class="col-sm-4 col-6">
              <div>
                <?php echo ' <img src="./photos/' . $row['subp3'] . '" alt="" class="img-fluid">' ?>
                <!-- <img src="assets/images/product-3-720x480.jpg" alt="" class="img-fluid"> -->
              </div>
              <br>
            </div>
          </div>

          <br>
        </div>

        <div class="col-md-5">
          <div class="sidebar-item recent-posts">
            <div class="sidebar-heading">
              <h4><?php echo $row['product_name'] ?></h4>
            </div>
            <br>
            <div class="content">
              <p><?php echo $row['short_disp'] ?></p>
            </div>
          </div>

          <br>
          <br>

          <h4>Add to Cart</h4>

          <br>

          <form action="./product-details.php" method="post">
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <div class="form-group">
                  <label for="">Home delevary is only for Nilagiri which may cost additional 20 rupees</label>
                  <br>
                  <br>
                  <select name="select" class="form-control">
                    <option value="0">Buy from our shop</option>
                    <option value="1">Home delivery</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 col-sm-12">
                <div class="form-group">
                  <label for="">Quantity</label>
                  <input type="number" name="qty" value="1" required class="form-control">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <button type="submit" name="submit" class="btn btn-primary">Add to Cart</button>
                </div>
              </div>
            </div>
          </form>

          <br>
        </div>
      </div>

      <br>

      <h4>Description</h4>
      <br>
      <p>

        <?php echo $row['long_disp'] ?>
      </p>



      <br>
      <br>
      <br>
    </div>
  </div>

  <!-- Footer Starts Here -->

  <?php
  include("./connects/footer.php")
  ?>


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Additional Scripts -->
  <script src="assets/js/custom.js"></script>
  <script src="assets/js/owl.js"></script>
  <script src="assets/js/slick.js"></script>
  <script src="assets/js/accordions.js"></script>

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