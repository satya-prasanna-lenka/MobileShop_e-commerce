<?php
session_start();
$err = false;
if (isset($_SESSION['choose_aproduct'])) {
  $err = $_SESSION['choose_aproduct'];
}

if (true) {
  sleep(0.1);
  $_SESSION['choose_aproduct'] = false;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <title>Product</title>

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/owl.css">
  <link rel="shortcut icon" href="./images/payment-method.png" type="image/x-icon">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
  <?php
  if ($err) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> Please choose a product to access checkout page
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
        <a class="navbar-brand" href="index.php">
          <h2>Banadevi<em> Mobiles & Studio</em></h2>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="products.php">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="checkout.php">Checkout</a>
            </li>
            <li class="nav-item dropdown">
              <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">About</a>

              <div class="dropdown-menu">
                <a class="dropdown-item" href="about.php">About Us</a>
                <a class="dropdown-item" href="blog.php">Blog</a>
                <a class="dropdown-item" href="testimonials.php">Testimonials</a>
                <a class="dropdown-item" href="terms.php">Terms</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact Us</a>
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
          <h1>Products</h1>
          <span>Our best products are here</span>
        </div>
      </div>
    </div>
  </div>

  <div class="services">
    <div class="container">
      <h1>Mobiles</h1>
      <br>
      <div class="row">
        <?php
        include("./connects/connect.php");
        $sql = "SELECT * FROM `admin_mobiles` WHERE `type`='mobile'";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
          echo '
          <div class="col-md-4">
          <div class="service-item">
            <img src="./images/' . $row['main_img'] . '" alt="Loading...">
            <div class="down-content">
              <h4>' . $row['product_name'] . '</h4>
              <div style="margin-bottom:10px;">
                <span>
                  <del><sup>$</sup>' . $row['d_price'] . ' </del> &nbsp; <sup>$</sup>' . $row['s_price'] . '
                </span>
              </div>

              <p>' . $row['short_disp'] . ' </p>
              <a href="product-details.php?id=' . $row['id'] . '" class="filled-button">View More</a>
            </div>
          </div>

          <br>
          </div>
          ';
        }

        ?>

      </div>

      <br>
      <br>



      <br>
      <br>
      <br>
      <br>
    </div>
    <div class="container">
      <h1>Others</h1>
      <br>
      <div class="row">
        <div class="col-md-4">
          <div class="service-item">
            <img src="assets/images/product-1-720x480.jpg" alt="">
            <div class="down-content">
              <h4>Lorem ipsum dolor sit amet</h4>
              <div style="margin-bottom:10px;">
                <span>
                  <del><sup>$</sup>1999 </del> &nbsp; <sup>$</sup>1779
                </span>
              </div>

              <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis asperiores eveniet iure impedit soluta
                aliquid. </p>
              <a href="product-details.html" class="filled-button">View More</a>
            </div>
          </div>

          <br>
        </div>

        <div class="col-md-4">
          <div class="service-item">
            <img src="assets/images/product-2-720x480.jpg" alt="">
            <div class="down-content">
              <h4>Lorem ipsum dolor sit amet</h4>
              <div style="margin-bottom:10px;">
                <span>
                  <del><sup>$</sup>1999 </del> &nbsp; <sup>$</sup>1779
                </span>
              </div>

              <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic, impedit itaque delectus laboriosam quas
                veniam. </p>
              <a href="product-details.html" class="filled-button">View More</a>
            </div>
          </div>

          <br>
        </div>

        <div class="col-md-4">
          <div class="service-item">
            <img src="assets/images/product-3-720x480.jpg" alt="">
            <div class="down-content">
              <h4>Lorem ipsum dolor sit amet</h4>
              <div style="margin-bottom:10px;">
                <span>
                  <del><sup>$</sup>1999 </del> &nbsp; <sup>$</sup>1779
                </span>
              </div>

              <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id eius at unde natus, sit possimus. </p>
              <a href="product-details.html" class="filled-button">View More</a>
            </div>
          </div>

          <br>
        </div>

        <div class="col-md-4">
          <div class="service-item">
            <img src="assets/images/product-4-720x480.jpg" alt="">
            <div class="down-content">
              <h4>Lorem ipsum dolor sit amet</h4>
              <div style="margin-bottom:10px;">
                <span>
                  <del><sup>$</sup>1999 </del> &nbsp; <sup>$</sup>1779
                </span>
              </div>

              <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab voluptatibus cupiditate repudiandae hic
                odio quas. </p>
              <a href="product-details.html" class="filled-button">View More</a>
            </div>
          </div>

          <br>
        </div>

        <div class="col-md-4">
          <div class="service-item">
            <img src="assets/images/product-5-720x480.jpg" alt="">
            <div class="down-content">
              <h4>Lorem ipsum dolor sit amet</h4>
              <div style="margin-bottom:10px;">
                <span>
                  <del><sup>$</sup>1999 </del> &nbsp; <sup>$</sup>1779
                </span>
              </div>

              <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat in a repellendus nobis! Iure,
                eveniet! </p>
              <a href="product-details.html" class="filled-button">View More</a>
            </div>
          </div>

          <br>
        </div>

        <div class="col-md-4">
          <div class="service-item">
            <img src="assets/images/product-6-720x480.jpg" alt="">
            <div class="down-content">
              <h4>Lorem ipsum dolor sit amet</h4>
              <div style="margin-bottom:10px;">
                <span>
                  <del><sup>$</sup>1999 </del> &nbsp; <sup>$</sup>1779
                </span>
              </div>

              <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque quis quam porro. Sint, in, at.
              </p>
              <a href="product-details.html" class="filled-button">View More</a>
            </div>
          </div>

          <br>
        </div>
      </div>

      <br>
      <br>

      <!-- <nav>
          <ul class="pagination pagination-lg justify-content-center">
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">«</span>
                <span class="sr-only">Previous</span>
              </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">»</span>
                <span class="sr-only">Next</span>
              </a>
            </li>
          </ul>
        </nav> -->

      <br>
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
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

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