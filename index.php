<?php



session_start();
$err = false;
$insert = false;
// error_reporting(0);

if (isset($_SESSION['success'])) {
  $insert = true;
}

if (isset($_SESSION['err'])) {
  $err = $_SESSION['err'];
}

if (isset($_POST['enter'])) {
  include("./connects/connect.php");
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $message = $_POST['message'];


  $sql = "SELECT * FROM `user_msg` WHERE `email`='$email'";
  $result = mysqli_query($conn, $sql);
  $num = mysqli_num_rows($result);
  if ($num < 10) {

    $sql = "INSERT INTO `user_msg` (`id`, `name`, `email`, `subject`, `msg`, `date`) VALUES (NULL, '$name', '$email', '$phone', '$message', current_timestamp())";


    $result = mysqli_query($conn, $sql);
    if ($result) {
      $insert = true;
      // $_SESSION['success'] = true;
      // header("location:./index.php");
    } else {
      $err = "Something went wrong...";
      // $_SESSION['err'] = "Something went wrong...";
    }
  } else {

    $err = "You have crossed the limit";
    // $_SESSION['err'] = "You have crossed the limit";
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

  <title>Banadevi Mobiles</title>

  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/owl.css">
  <style>
    .left-image {
      position: relative;
      left: -15px;
    }
  </style>
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
  <?php
  if ($insert) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Successfully inserted!</strong> Your qurrey is inserted successfully we will contact you soon...
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    session_unset();
    session_destroy();
  }
  if ($err) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Bad request!</strong>' . $err . '
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    session_unset();
    session_destroy();
  }

  ?>

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

  <header class="">
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
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
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
                <hr>
                <a class="dropdown-item" href="admin.php">Admin</a>
                <a class="dropdown-item" href="admin-login.php">Admin Login</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact Us</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <!-- Page Content -->
  <!-- Banner Starts Here -->
  <div class="main-banner header-text" id="top">
    <div class="Modern-Slider">
      <!-- Item -->
      <div class="item item-1">
        <div class="img-fill">
          <div class="text-content">
            <h6>Banadevi Mobiles</h6>
            <h4>no fear no limt no excuses</h4>
            <p>If plans does not include mobiles, your plans are not finished.</p>
            <a href="products.php" class="filled-button">Products</a>
          </div>
        </div>
      </div>
      <!-- // Item -->
      <!-- Item -->
      <div class="item item-2">
        <div class="img-fill">
          <div class="text-content">
            <h6>Banadevi Studio</h6>
            <h4>Photography is nothing to do with cameras</h4>
            <p>Once photography enters your bloodstream, It is like a disease</p>
            <a href="about.php" class="filled-button">About Us</a>
          </div>
        </div>
      </div>
      <!-- // Item -->
      <!-- Item -->
      <div class="item item-3">
        <div class="img-fill">
          <div class="text-content">
            <h6>Banadevi Digitals</h6>
            <h4>All kindes of mobiles <br>Pre and post marraige photoshoot</h4>
            <p>You can get a large range of verities in phones in Banadevi Mobiles, You can place order directly thorugh
              our wesite and also from our store.
              <br>
              You can contact Banadevi studio for any kind of videography and photography for more details you can vist
              our blog page
            </p>
            <!-- <br> -->
            <!-- <p>You can contact Banadevi studio for any kind of videography and photography for more details you can vist our blog page</p> -->
            <a href="contact.php" class="filled-button">Contact Us</a>
          </div>
        </div>
      </div>
      <!-- // Item -->
    </div>
  </div>
  <!-- Banner Ends Here -->

  <div class="request-form">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <h4>Require a mobile right now?</h4>
          <span>Don't fear Banadevi Mobiles is here to resolve your problems...</span>
        </div>
        <div class="col-md-4">
          <a href="contact.php" class="border-button">Contact Us</a>
        </div>
      </div>
    </div>
  </div>

  <div class="services">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Featured <em>Products</em></h2>
            <span>Our best products in stock</span>
          </div>
        </div>

        <?php
        include("./connects/connect.php");
        $sql = "SELECT * FROM `admin_mobiles` WHERE `feature` = 'yes' ";
        $result = mysqli_query($conn, $sql);

        $num = mysqli_num_rows($result);
        if ($num == 0) {
          echo ' <div class="col-md-4">
          <div class="service-item">
            <img src="assets/images/product-1-720x480.jpg" alt="">
            <div class="down-content">
              <h4>Lorem ipsum dolor sit amet</h4>
              <div style="margin-bottom:10px;">
                <span> <del><sup>$</sup>2000.00</del> <sup>$</sup>1700.00 </span>
              </div>

              <p>Nullam nibh mi, tincidunt sed sapien ut, rutrum hendrerit velit. Integer auctor a mauris sit amet eleifend.</p>
              <a href="product-details.php" class="filled-button">View More</a>
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
                <span> <del><sup>$</sup>2000.00</del> <sup>$</sup>1700.00 </span>
              </div>

              <p>Nullam nibh mi, tincidunt sed sapien ut, rutrum hendrerit velit. Integer auctor a mauris sit amet eleifend.</p>
              <a href="product-details.php" class="filled-button">View More</a>
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
                <span> <del><sup>$</sup>2000.00</del> <sup>$</sup>1700.00 </span>
              </div>

              <p>Nullam nibh mi, tincidunt sed sapien ut, rutrum hendrerit velit. Integer auctor a mauris sit amet eleifend.</p>
              <a href="product-details.php" class="filled-button">View More</a>
            </div>
          </div>

          <br>
        </div>';
        } else {
          while ($row = mysqli_fetch_assoc($result)) {
            echo ' <div class="col-md-4">
          <div class="service-item">
            <img src="./images/' . $row['main_img'] . '" alt="Loading...">
            <div class="down-content">
              <h4>' . $row['product_name'] . '</h4>
              <div style="margin-bottom:10px;">
                <span> <del><sup>$</sup>' . $row['d_price'] . '</del> <sup>$</sup>' . $row['s_price'] . ' </span>
              </div>

              <p>' . $row['short_disp'] . '</p>
              <a href="product-details.php?id=' . $row['id'] . '" class="filled-button">View More</a>
            </div>
          </div>

          <br>
        </div>';
          }
        }



        ?>


        <!-- <div class="col-md-4">
          <div class="service-item">
            <img src="assets/images/product-1-720x480.jpg" alt="">
            <div class="down-content">
              <h4>Lorem ipsum dolor sit amet</h4>
              <div style="margin-bottom:10px;">
                <span> <del><sup>$</sup>2000.00</del> <sup>$</sup>1700.00 </span>
              </div>

              <p>Nullam nibh mi, tincidunt sed sapien ut, rutrum hendrerit velit. Integer auctor a mauris sit amet
                eleifend.</p>
              <a href="product-details.php" class="filled-button">View More</a>
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
                <span> <del><sup>$</sup>2000.00</del> <sup>$</sup>1700.00 </span>
              </div>

              <p>Nullam nibh mi, tincidunt sed sapien ut, rutrum hendrerit velit. Integer auctor a mauris sit amet
                eleifend.</p>
              <a href="product-details.php" class="filled-button">View More</a>
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
                <span> <del><sup>$</sup>2000.00</del> <sup>$</sup>1700.00 </span>
              </div>

              <p>Nullam nibh mi, tincidunt sed sapien ut, rutrum hendrerit velit. Integer auctor a mauris sit amet
                eleifend.</p>
              <a href="product-details.php" class="filled-button">View More</a>
            </div>
          </div>

          <br>
        </div> -->
      </div>
    </div>
  </div>

  <div class="fun-facts">
    <div class="container">
      <div class="more-info-content">
        <div class="row">
          <div class="col-md-6">
            <div class="left-image">
              <!-- <img src="assets/images/about-1-570x350.jpg" class="img-fluid" alt=""> -->
              <!-- <img src="./images/download.jpeg" height="570px" width="350px" class="img-fluid" alt=""> -->
              <video controls autoPlay muted loop>
                <source src="./videos/WhatsApp Video 2022-07-08 at 11.32.38 PM.mp4" type="video/mp4">
              </video>
            </div>
          </div>
          <div class="col-md-6 align-self-center">
            <div class="right-content">
              <span>Who we are</span>
              <h2>Get to know about <em>our studio</em></h2>
              <p>Pick up a camera. Shoot something. No matter how small, no matter how cheesy, no matter whether your
                friends and your sister star in it. Put your name on it as director. Now you’re a director. Everything
                after that you’re just negotiating your budget and your fee.</p>
              <a href="about.php" class="filled-button">Read More</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="more-info">
    <div class="container">
      <div class="section-heading">
        <h2>Read our <em>Blog</em></h2>
        <span>Get to know more about us</span>
      </div>

      <div class="row" id="tabs">
        <div class="col-md-4">
          <ul>
            <li><a href='#tabs-1'>Banadevi Mobiles <br> <small>We servers a large range of mobiles in Raj Nilagiri |
                  06.07.2022</small></a></li>
            <li><a href='#tabs-2'>Banadevi Studio <br> <small>Any kind of photography and videography | 06.07.2022
                </small></a></li>
            <li><a href='#tabs-3'>Techinical issues in mobile?<br> <small>Any kind techinical issue in phone can be
                  resoleved here | 06.07.2022</small></a></li>
          </ul>

          <br>

          <div class="text-center">
            <a href="about.php" class="filled-button">Read More</a>
          </div>

          <br>
        </div>

        <div class="col-md-8">
          <section class='tabs-content'>
            <article id='tabs-1'>
              <!-- <img src="assets/images/blog-image-1-940x460.jpg" alt=""> -->
              <img src="./images/271883380_308170417990939_2782410141270560725_n (1).jpg" style="height: 400px; width: 800px; object-fit: cover;" alt="">
              <h4><a href="blog-details.php">Banadevi Mobiles.</a></h4>
              <p>You can find all kind of products related to mibile here. Like earphones , headphones , BT headsets ,
                mobile chargers...</p>
            </article>
            <article id='tabs-2'>
              <!-- <img src="assets/images/blog-image-2-940x460.jpg" alt=""> -->
              <img src="./images/286175943_400534622087851_4454876148661795164_n.jpg" style="height: 400px; width: 800px; object-fit: cover;" alt="">
              <h4><a href="blog-details.php">Banadevi Studio</a></h4>
              <p>You can contact us for pre and post weading photography and videography to capture all your dream
                memories and stories...</p>
            </article>
            <article id='tabs-3'>
              <img src="assets/images/blog-image-3-940x460.jpg" alt="">
              <h4><a href="blog-details.php">Techinical issues in mobile</a></h4>
              <p>If you have any techinical issue in your smartphone , you can come to our shope without doing any
                further delay... </p>
            </article>
          </section>
        </div>
      </div>


    </div>
  </div>

  <!-- this causing long loading of the page -->
  <!-- <div class="testimonials">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>What they say <em>about us</em></h2>
            <span>testimonials from our greatest clients</span>
          </div>
        </div>
        <div class="col-md-12">
          <div class="owl-testimonials owl-carousel">

            <div class="testimonial-item">
              <div class="inner-content">
                <h4>Rama hari Das</h4>
                <span>Buyer of mobile</span>
                <p>"Banadevi Mobiles provide very good coustmer satisfication of any kind of buyers. They are very coustmer friendly .they contain a large range of mobile verities"</p>
              </div>
              <img src="http://placehold.it/60x60" alt="">
            </div>

            <div class="testimonial-item">
              <div class="inner-content">
                <h4>Satya Parsanna Lenka</h4>
                <span>Coustmer of Banadevi Studio</span>
                <p>"I clicked few photoes from this studio and I foud one of the best service in this price range . Their editing skill is just starning. their videography quality is also very good"</p>
              </div>
              <img src="http://placehold.it/60x60" alt="">
            </div>

            <div class="testimonial-item">
              <div class="inner-content">
                <h4>David Wood</h4>
                <span>Chief Accountant</span>
                <p>"Ut ultricies maximus turpis, in sollicitudin ligula posuere vel. Donec finibus maximus neque, vitae egestas quam imperdiet nec. Proin nec mauris eu tortor consectetur tristique."</p>
              </div>
              <img src="http://placehold.it/60x60" alt="">
            </div>

            <div class="testimonial-item">
              <div class="inner-content">
                <h4>Andrew Boom</h4>
                <span>Marketing Head</span>
                <p>"Curabitur sollicitudin, tortor at suscipit volutpat, nisi arcu aliquet dui, vitae semper sem turpis quis libero. Quisque vulputate lacinia nisl ac lobortis."</p>
              </div>
              <img src="http://placehold.it/60x60" alt="">
            </div>

          </div>
        </div>
      </div>
    </div>
  </div> -->

  <div class="callback-form">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Request a <em>call back</em></h2>
            <span>We are always there to hear you</span>
          </div>
        </div>

        <div class="col-md-12">
          <div class="contact-form">
            <form id="contact" action="./index.php" method="post">
              <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12">
                  <fieldset>
                    <input name="name" type="text" class="form-control" id="name" placeholder="Full Name" required="">
                  </fieldset>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                  <fieldset>
                    <input name="email" type="text" class="form-control" id="email" pattern="[^ @]*@[^ @]*" placeholder="E-Mail Address" required="">
                  </fieldset>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                  <fieldset>
                    <input name="phone" type="tel" class="form-control" id="phone" placeholder="Phone" required="">
                  </fieldset>
                </div>
                <div class="col-lg-12">
                  <fieldset>
                    <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your Message" required=""></textarea>
                  </fieldset>
                </div>
                <div class="col-lg-12">
                  <fieldset>
                    <button type="enter" name="enter" id="form-submit" class="border-button">Send Message</button>
                  </fieldset>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

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
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

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