<?php
// session_start();
include_once("connectDB.php");
$conn = new DB_conn;
$parentPath = '/Shop';
$parentPath2 = '/Shop/pages';

if (!empty($_GET["act"])) {
	$id = $_GET["id"];
	$act = $_GET["act"];
	if ($act == "add" && $id) {
		if (isset($_SESSION['cart'][$id])) {
			$_SESSION['cart'][$id]++;
		} else {
			$_SESSION['cart'][$id] = 1;
		}
	}

	if ($act == "remove" and !empty($id)) {
		unset($_SESSION['cart'][$id]);
	}

	if ($act == 'edit') {
		$amount_array = $_POST['quantity'];
		foreach ($amount_array as $id => $amount) {
			$_SESSION['cart'][$id] = $amount;
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description"
		content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

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
						<p>Fresh and Organic</p>
						<h1>Cart</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->
	<!-- cart -->
	<div class="cart-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<div class="cart-table-wrap">
						<table class="cart-table">
							<thead class="cart-table-head">
								<tr class="table-head-row">
									<th class="product-remove"></th>
									<th class="product-image">Product Image</th>
									<th class="product-name">Name</th>
									<th class="product-price">Price</th>
									<th class="product-quantity">Quantity</th>
									<th class="product-total">Total</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$total = 0;
								$shipp = 0;
								if (!empty($_SESSION['cart'])) {
									foreach ($_SESSION['cart'] as $id => $qty) {
										$shipp = 70;
										$query = $conn->select_product($id);
										$data = mysqli_fetch_array($query);
										$sum = $data['prod_price'] * $qty;
										$total += $sum; ?>
										<tr class="table-body-row" action="cart.php?id=<?php echo $data['prod_id'] ?>">
											<td class="product-remove"><a
													href="cart.php?id=<?php echo $data['prod_id'] ?>&act=remove"><i
														class="far fa-window-close"></i></a></td>
											<td class="product-image"><img src="<?php echo $data['prod_img'] ?>" alt="">
											</td>
											<td class="product-name">
												<?php echo $data['prod_name'] ?>
											</td>
											<td class="product-price"><div id="price" name="price" value="<?php echo $data['prod_price'] ?>"><?php echo $data['prod_price'] ?></div></td>
											<td class="product-quantity"><input type="number" value="<?php echo $qty ?>" id="quantity" name="quantity"></td>
											<td class="product-total">
												<p id="total"><?php echo $total ?></p>
											</td>
											

										</tr>
										<?php
									}
								} ?>
							</tbody>
						</table>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="total-section">
						<table class="total-table">
							<thead class="total-table-head">
								<tr class="table-total-row">
									<th>Total</th>
									<th>Price</th>
								</tr>
							</thead>
							<tbody>
								<tr class="total-data">
									<td><strong>Subtotal: </strong></td>
									<td>0</td>
								</tr>
								<tr class="total-data">
									<td><strong>Shipping: </strong></td>
									<td>
										<?php echo $shipp ?>
									</td>
								</tr>
								<tr class="total-data">
									<td><strong>Total: </strong></td>
									<td>
									<p id="totalprice"><?php echo $total ?></p>
									</td>
								</tr>
							</tbody>
						</table>
						<div class="cart-buttons">
							<a href="<?php echo $parentPath2.'/cart.php'?>" class="boxed-btn">Update Cart</a>
							<a href="checkout.html" class="boxed-btn black">Check Out</a>
						</div>
					</div>

					<div class="coupon-section">
						<h3>Apply Coupon</h3>
						<div class="coupon-form-wrap">
							<form action="index.html">
								<p><input type="text" placeholder="Coupon"></p>
								<p><input type="submit" value="Apply"></p>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	<!-- end cart -->

	<?php
	include_once("footer.php");
	?>
	<script>

	</script>
	<script src="assets/js/app.js"></script>

</body>

</html>