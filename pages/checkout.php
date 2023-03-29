<?php
$parentPath = '/Shop';
$parentPath2 = '/Shop/pages';
// $cart=$_SESSION["cart"];
include_once("header.php");
include_once("connectDB.php");
$conn = new DB_conn; //สร้าง object ชื่อ $condb


if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) { // ตรวจสอบสถานะการล็อกอิน
	$member_id = $_SESSION['member_id'];
	$username = $_SESSION['username'];
	$name = $_SESSION['name'];
	$email = $_SESSION['email'];
	$address = $_SESSION['address'];
} else {
	$member_id = "";
	$username = "";
	$name = "Name";
	$email = "Email";
	$address = "Address";
}
//สำหรับทดสอบค่า
// echo "<br>=============================";
// echo "<br>id : " . $member_id;
// echo "<br>username : " . $username;
// echo "<br>name : " . $name;
// echo "<br>email : " . $email;
// echo "<br>address : " . $address;
// echo "<br>=============================<br>";
?>
<!DOCTYPE html>

<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>Cart</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="assets/css/all.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="assets/css/owl.carousel.css">
	<!-- magnific popup -->
	<link rel="stylesheet" href="assets/css/magnific-popup.css">
	<!-- animate css -->
	<link rel="stylesheet" href="assets/css/animate.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="assets/css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- responsive -->
	<link rel="stylesheet" href="assets/css/responsive.css">

</head>

<body>

	<?php
	include_once('header.php');

	?>

	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Detail for shipping</p>
						<h1>Checkout</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- check out section -->
	<div class="checkout-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="checkout-accordion-wrap">
						<div class="accordion" id="accordionExample">
							<div class="card single-accordion">
								<div class="card-header" id="headingOne">
									<h5 class="mb-0">
										<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
											Billing Address
										</button>
									</h5>
								</div>

								<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
									<div class="card-body">
										<div class="billing-address-form">
											<!-- <form action="editMember.php?id=<?php echo $data['member_id'] ?>">
						        		<p><input type="text" placeholder="<?php echo $data['name'] ?>" disabled></p>
						        		<p><input type="email" placeholder="Email" disabled></p>
						        		<p><input type="text" placeholder="<?php echo $data['address'] ?>" disabled></p>
						        		<p><input type="tel" placeholder="Phone" name = "phone"></p>
						        		<input type="submit" value="edit"/>
						        	</form> -->
											<!-- <form action="editMember.php?id=<?php echo $data['member_id'] ?>"> -->
											<form action="editMember.php?id=<?php echo $member_id ?>">
												<p><input type="text" name="name" placeholder="<?php echo $name ?>" disabled></p>
												<p><input type="email" name="email" placeholder="<?php echo $email ?> " disabled></p>
												<p><input type="text" name="address" placeholder="<?php echo $address ?>" disabled></p>
												<p><input type="tel" name="mobile" placeholder="Phone"></p>
												<p><input type="hidden" name="id" value="<?php echo $member_id ?>"></p>
												<input type="submit" value="Edit" />
											</form>
										</div>
									</div>
								</div>
							</div>
							<div class="card single-accordion">
								<div class="card-header" id="headingThree">
									<h5 class="mb-0">
										<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
											Card Details
										</button>
									</h5>
								</div>
								<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
									<div class="card-body">
										<div class="card-details">
											<p>Your card details goes here.</p>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>

				<div class="col-lg-4">
					<div class="order-details-wrap">
						<table class="order-details">
							<thead>
								<tr>
									<th>Your order Details</th>
									<th>Price</th>
								</tr>
							</thead>
							<tbody class="order-details-body">
								<tr>
									<td>Product</td>
									<td>Total</td>
								</tr>
								<tr>
									<td>Strawberry</td>
									<td>$85.00</td>
								</tr>
								<tr>
									<td>Berry</td>
									<td>$70.00</td>
								</tr>
								<tr>
									<td>Lemon</td>
									<td>$35.00</td>
								</tr>
							</tbody>
							<tbody class="checkout-details">
								<tr>
									<td>Subtotal</td>
									<td>$190</td>
								</tr>
								<tr>
									<td>Shipping</td>
									<td>$50</td>
								</tr>
								<tr>
									<td>Total</td>
									<td>$240</td>
								</tr>
							</tbody>
						</table>
						<a href="#" class="boxed-btn">Place Order</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end check out section -->
	<?php
	include_once("footer.php");
	?>
	<!-- jquery -->
	<script src="assets/js/jquery-1.11.3.min.js"></script>
	<!-- bootstrap -->
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- count down -->
	<script src="assets/js/jquery.countdown.js"></script>
	<!-- isotope -->
	<script src="assets/js/jquery.isotope-3.0.6.min.js"></script>
	<!-- waypoints -->
	<script src="assets/js/waypoints.js"></script>
	<!-- owl carousel -->
	<script src="assets/js/owl.carousel.min.js"></script>
	<!-- magnific popup -->
	<script src="assets/js/jquery.magnific-popup.min.js"></script>
	<!-- mean menu -->
	<script src="assets/js/jquery.meanmenu.min.js"></script>
	<!-- sticker js -->
	<script src="assets/js/sticker.js"></script>
	<!-- main js -->
	<script src="assets/js/main.js"></script>

</body>

</html>