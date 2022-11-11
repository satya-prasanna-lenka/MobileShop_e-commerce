<?php
if (isset($_POST['putvalue'])) {
  session_start();
  include("./connect.php");
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
      $_SESSION['success'] = true;
    } else {
      $_SESSION['err'] = "Something went wrong...";
      // $err = "Something went wrong...";
    }
  } else {
    $_SESSION['err'] = "You have crossed the limit";
    // $err = "You have crossed the limit";
  }
  header("location:../index.php");
}
echo ' <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-3 footer-item">
          <h4>Mobile Store</h4>
          <p>Banadevi mobile store is the one of best mobile store in this area which provide very good product as well as services...</p>
          <ul class="social-icons">
            <li><a rel="nofollow" href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
          </ul>
        </div>
        <div class="col-md-3 footer-item">
          <h4>Useful Links</h4>
          <ul class="menu-list">
            <li><a href="#">Vivamus ut tellus mi</a></li>
            <li><a href="#">Nulla nec cursus elit</a></li>
            <li><a href="#">Vulputate sed nec</a></li>
            <li><a href="#">Cursus augue hasellus</a></li>
            <li><a href="#">Lacinia ac sapien</a></li>
          </ul>
        </div>
        <div class="col-md-3 footer-item">
          <h4>Additional Pages</h4>
          <ul class="menu-list">
            <li><a href="./products.php">Products</a></li>
            <li><a href="./about.php">About Us</a></li>
            <li><a href="./blog.php">Blog</a></li>
            <li><a href="./contact.php">Contact Us</a></li>
            <li><a href="./terms.php">Terms</a></li>
          </ul>
        </div>
        <div class="col-md-3 footer-item last-item">
          <h4>Contact Us</h4>
          <div class="contact-form">
            <form id="contact footer-contact" action="./connects/footer.php" method="post">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <fieldset>
                    <input name="name" type="text" class="form-control" id="name" placeholder="Full Name" required="">
                  </fieldset>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <fieldset>
                    <input name="email" type="text" class="form-control" id="email" pattern="[^ @]*@[^ @]*" placeholder="E-Mail Address" required="">
                  </fieldset>
                </div>
                 <div class="col-lg-12 col-md-12 col-sm-12">
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
                    <button type="putvalue" name="putvalue" id="form-submit" class="filled-button">Send Message</button>
                  </fieldset>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <div class="sub-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <p>
            Copyright © <?php echo date("Y"); ?> Company Name:
- Created by: <a target="_blank" href="https://www.sattan-b.in">Satya Prasanna Lenka</a>
</p>
</div>
</div>
</div>
</div>';
