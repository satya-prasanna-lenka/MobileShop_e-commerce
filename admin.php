<?php

session_start();
$mag = false;
$err = false;
include("./connects/connect.php");
if (!isset($_SESSION['login'])) {
	$_SESSION['warning'] = "Login ❌ You can not enter to this page without login";
	header("location:admin-login.php");
} else if (isset($_SESSION['warning'])) {
	$_SESSION['warning'] = false;
}


if (isset($_SESSION['msg'])) {
	$_SESSION['msg'] = false;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if (isset($_POST['submit_mobile'])) {

		$phone = $_POST['phone_name'];
		$dipPrice = $_POST['dprice'];
		$sellPrice = $_POST['sprice'];
		$short_disp = $_POST['sdip'];
		$long_disp = $_POST['ldip'];




		$photo = $_FILES['photo']['name'];
		$pdf_type = $_FILES['photo']['type'];
		$pdf_size = $_FILES['photo']['size'];
		$pdf_tem_loc = $_FILES['photo']['tmp_name'];
		$pdf_store = "photos/" . $photo;
		move_uploaded_file($pdf_tem_loc, $pdf_store);

		$subp1 = $_FILES['subp1']['name'];
		$pdf_type = $_FILES['subp1']['type'];
		$pdf_size = $_FILES['subp1']['size'];
		$pdf_tem_loc = $_FILES['subp1']['tmp_name'];
		$pdf_store = "photos/" . $subp1;
		move_uploaded_file($pdf_tem_loc, $pdf_store);


		$subp2 = $_FILES['subp2']['name'];
		$pdf_type = $_FILES['subp2']['type'];
		$pdf_size = $_FILES['subp2']['size'];
		$pdf_tem_loc = $_FILES['subp2']['tmp_name'];
		$pdf_store = "photos/" . $subp2;
		move_uploaded_file($pdf_tem_loc, $pdf_store);

		$subp3 = $_FILES['subp3']['name'];
		$pdf_type = $_FILES['subp3']['type'];
		$pdf_size = $_FILES['subp3']['size'];
		$pdf_tem_loc = $_FILES['subp3']['tmp_name'];
		$pdf_store = "photos/" . $subp3;
		move_uploaded_file($pdf_tem_loc, $pdf_store);

		$sql = "INSERT INTO `admin_mobiles` (`id`, `product_name`, `d_price`, `s_price`, `short_disp`, `long_disp`,`main_img` ,`subp1`,`subp2`,`subp3`,`type`,`feature`,`date`) VALUES (NULL, '$phone', '$dipPrice', '$sellPrice', '$short_disp', '$long_disp', '$photo','$subp1','$subp2','$subp3','mobile','no',current_timestamp())";
		$result = mysqli_query($conn, $sql);

		if ($result) {
			$mag = true;
		} else {
			$err = true;
		}
	}
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
  <strong>Success!</strong> Your data has been added , you can menage it in dash board <a href="dashbord.php">Click here?</a>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
				}
				if ($err) {
					echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> The text type you entered is unacceptable ,Please try again with different short and long discription.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
				}
				?>
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Hello <span style="color: #46b5d1;"><?php echo $_SESSION['name'] ?></span></h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12">
					<div class="wrapper">
						<div class="row mb-5 d-flex justify-content-center">
							<div class="col-md-3">
								<div class="dbox w-100 text-center">
									<div class="icon d-flex align-items-center justify-content-center">
										<span class="fa fa-comment"></span>
									</div>
									<div class="text">
										<p><span>Messages & Orders</span><a href="user_msg.php"> From users.</a></p>
									</div>
								</div>
							</div>
							<div class="col-md-3" id="mobile" style="cursor: pointer">
								<div class="dbox w-100 text-center">
									<div class="icon d-flex align-items-center justify-content-center">
										<span class="fa fa-mobile"></span>
									</div>
									<div class="text">
										<p><span>Add:</span> Phone details</p>
									</div>
								</div>
							</div>
							<div class="col-md-3" id="other" style="cursor: pointer;">
								<div class="dbox w-100 text-center">
									<div class="icon d-flex align-items-center justify-content-center">
										<span class="fa fa-headphones"></span>
									</div>
									<div class="text">
										<p><span>Add:</span>Other items
										</p>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="dbox w-100 text-center">
									<div class="icon d-flex align-items-center justify-content-center">
										<span class="fa fa-globe"></span>
									</div>
									<div class="text">
										<p><span>dashboard</span> <a href="dashbord.php">Menage your details</a></p>
									</div>
								</div>
							</div>
						</div>
						<div class="row no-gutters" id="top_mob">
							<div class="col-md-7">
								<div class="contact-wrap w-100 p-md-5 p-4">
									<h3 class="mb-4">Phones</h3>
									<!-- <div id="form-message-warning" class="mb-4"></div>
									<div id="form-message-success" class="mb-4">
										Your message was sent, thank you!
									</div> -->
									<form method="POST" action="admin.php" id="contactFormm" enctype="multipart/form-data" class="contactForm">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="label" for="name">Phone Name</label>
													<input required type="text" class="form-control" name="phone_name" id="name" placeholder="Name *">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="label" for="email">Diplay price</label>
													<input type="text" required class="form-control" name="dprice" id="email" placeholder="Diplay Price *">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="label" for="subject">Selling price</label>
													<input type="text" required class="form-control" name="sprice" id="subject" placeholder="Selling price *">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label class="label" for="subject">Main image</label>
													<input type="file" required class="form-control" name="photo" id="subject" placeholder="Selling price *">
												</div>
											</div>

											<p class="col-md-12">Choose three different sub images. ***optional***</p>
											<div class="col-md-4">
												<div class="form-group">
													<label class="label" for="subject">Sub image</label>
													<input type="file" class="form-control" name="subp1" id="subject" placeholder="Selling price">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label class="label" for="subject">Sub image</label>
													<input type="file" class="form-control" name="subp2" id="subject" placeholder="Selling price">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label class="label" for="subject">Sub image</label>
													<input type="file" class="form-control" name="subp3" id="subject" placeholder="Selling price">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label class="label" for="#">Short discription</label>
													<textarea name="sdip" required class="form-control" maxlength="140" id="message" cols="30" rows="2" placeholder="Write somethimg within 50 words *"></textarea>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label class="label" for="#">Long discription</label>
													<textarea name="ldip" class="form-control" id="message" maxlength="1000" placeholder="Describe about this phone in broad"></textarea>
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
								<div class="info-wrap w-100 p-5 img" style="background-image: url(images/img.jpg);">
								</div>
							</div>
						</div>
						<div class="row no-gutters mt-5 bot_oth" id="bot_oth">
							<div class="col-md-7">
								<div class="contact-wrap w-100 p-md-5 p-4">
									<p class="text-danger">Under Construction. Will be ready soon...</p>
									<h3 class="mb-4">Other</h3>
									<div id="form-message-warning" class="mb-4"></div>
									<div id="form-message-success" class="mb-4">
										Your message was sent, thank you!
									</div>
									<form method="get" id="contactForm" name="contactForm" class="contactForm">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="label" for="name">Full Name</label>
													<input type="text" class="form-control" name="name" id="name" placeholder="Name">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="label" for="email">Email Address</label>
													<input type="email" class="form-control" name="email" id="email" placeholder="Email">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label class="label" for="subject">Subject</label>
													<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label class="label" for="#">Message</label>
													<textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Message"></textarea>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="submit" name="other" value="Send Message" class="btn btn-primary">
													<div class="submitting"></div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
							<div class="col-md-5 d-flex align-items-stretch">
								<div class="info-wrap w-100 p-5 img" style="background-image: url(images/img.jpg);">
								</div>
							</div>
						</div>
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

	<script>
		let mobile = document.getElementById("mobile");
		let other = document.getElementById("other");
		let top_mob = document.getElementById("top_mob");
		let bot_oth = document.getElementById("bot_oth");

		mobile.addEventListener("click", () => {
			bot_oth.classList.add("bot_oth");
			top_mob.classList.remove("top_mob");

		})

		other.addEventListener("click", () => {
			bot_oth.classList.remove("bot_oth");
			top_mob.classList.add("top_mob");

		})
	</script>

</body>

</html>