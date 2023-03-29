<?php
//test
error_reporting(error_reporting() & ~E_NOTICE);
session_start();
if (isset($_REQUEST['p_id']) || isset($_REQUEST['act']) || isset($_REQUEST['qty'])) {

	if (isset($_REQUEST['p_id'])) {
		$p_id = $_REQUEST['p_id'];
		$act = $_REQUEST['act'];
		$qty = $_REQUEST['qty'];
		if ($act == 'add' && !empty($p_id)) {
			if (!isset($_SESSION['shopping_cart'])) {

				$_SESSION['shopping_cart'] = array();
			} else {
			}
			if (isset($_SESSION['shopping_cart'][$p_id])) {

				$_SESSION['shopping_cart'][$p_id] += $qty;
			} else {

				$_SESSION['shopping_cart'][$p_id] = $qty;
			}
		}
	}

	if ($_REQUEST['act'] == 'remove' && !empty($p_id))  //ยกเลิกการสั่งซื้อ
	{
		unset($_SESSION['shopping_cart'][$p_id]);
	}
	if ($_REQUEST['act'] == 'clear') {

		unset($_SESSION['shopping_cart']);
	}


	if ($_REQUEST['act'] == 'update') {
		if (isset($_POST["amount"]) && $_POST["amount"] == true) {
			$amount_array = $_POST['amount'];
			foreach ($amount_array as $p_id => $amount) {
				$_SESSION['shopping_cart'][$p_id] = $amount;
			}
		}
		echo "<script>window.location='../index.php'</script>";
	}
} else {
	$p_id = 0;
	$qty = 0;
}
// $p_id = $_REQUEST['p_id'];
// $act = $_REQUEST['act'];
// $qty = $_REQUEST['qty'];
// $qty = 0;



if (isset($_SESSION['shopping_cart'])) {
	$sizearr = sizeof($_SESSION['shopping_cart']);
	echo "<script>const numProducts = $sizearr;</script>";
	echo "IF";
}
// else{
// 	$sizearr = sizeof($_SESSION['shopping_cart']);
// 	echo "<script>const numProducts = $sizearr;</script>";
// 	echo "ELSE";
// }



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

	<?php include_once('header.php');
	// print_r($_SESSION['shopping_cart']);
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
							<form id="frmcart" name="frmcart" method="post" action="?act=update">

								<tbody>
									<?php

									// $sizearr = sizeof($_SESSION['shopping_cart']);
									// echo "<script>const numProducts = $sizearr;</script>";
									?>

									<?php
									include_once("connectDB.php");
									$conn = new DB_conn; //สร้าง object ชื่อ $condb
									$parentPath = '/Shop';
									$parentPath2 = '/Shop/pages';
									?>
									<div id="product-form">
										<?php

										$i = 1;
										if (!empty($_SESSION['shopping_cart'])) {

											$total = 0;
											foreach ($_SESSION['shopping_cart'] as $p_id => $p_qty) {

												// $sum = $row['prod_price'] * $p_qty;
												// $total += $sum;
												$sql = $conn->select_product($p_id);
												while ($data = mysqli_fetch_array($sql)) {


													$sum = $data['prod_price'] * $p_qty;
													$total += $sum;

													$shipping = 45;
													$totalsumship = $total + $shipping;

													echo "<script>const sumshipJS = $shipping;</script>";
										?>


													<tr class="table-body-row">

														<td class="product-remove"><a href="cart.php?p_id=<?php echo $data['prod_id'] ?>&act=remove&qty"><i class="far fa-window-close"></i></a></td>
														<!-- รูป -->
														<td class="product-image"><img src="<?php echo $data['prod_img'] ?>" alt=""></td>

														<!-- ชื่อ -->
														<td class="product-name"><?php echo $data['prod_name'] ?></td>

														<!-- ราคา -->
														<td class="product-price"><?php echo $data['prod_price'] ?><p></p><input type="hidden" id="price<?php echo $i; ?>" name="price<?php echo $i; ?>" value="<?php echo $data['prod_price']; ?>"></td>

														<!-- จำนวนชิ้น -->
														<?php echo "<td class='product-quantity'><input type='number' id='quantity$i' name='amount[$p_id]' value='$p_qty' min='1' onchange='updateTotal()'></td>" ?>


														<!-- ราคาของสินค้า -->
														<td class="product-total">
															<p><span type="text" id="total<?php echo $i; ?>" value="<?php echo $data["prod_price"] * $p_qty; ?>"><?php echo $data["prod_price"] * $p_qty; ?></span></p>
														</td>


													</tr>

												<?php $i++;
												} ?>

									</div>
							<?php }
										} ?>


							<script>
								const items = [];
								for (let i = 1; i <= numProducts; i++) {
									let price = parseInt(document.getElementById(`price${i}`).value);
									let quantity = parseInt(document.getElementById(`quantity${i}`).value);


									items.push({
										price,
										quantity
									});


								}

								function updateTotal() {
									let grandTotal = 0;


									for (let i = 0; i < items.length; i++) {
										const priceInputId = `price${i + 1}`;
										const quantityInputId = `quantity${i + 1}`;

										items[i].price = document.getElementById(priceInputId).value;
										items[i].quantity = document.getElementById(quantityInputId).value;

										let total = items[i].price * items[i].quantity;
										grandTotal += total;

										document.getElementById(`total${i + 1}`).innerHTML = total;
									}

									document.getElementById("grandTotal").innerHTML = grandTotal.toFixed(2);

									// Shipping = 1000;
									grandTotal2 = grandTotal + sumshipJS;
									document.getElementById("sumship").innerHTML = grandTotal2.toFixed(2);
									// document.getElementById("grandTotal2").innerHTML = grandTotal + 1000;
								}
							</script>


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
									<td>

										<?php

										if (isset($total) && $total == true) {
											echo '<p><span id="grandTotal" value="' . number_format($total, 2) . '">' . number_format($total, 2) . '</span></p>';
										} else {
											$total = 0; // กำหนดค่าเริ่มต้นให้กับ $totalsumship
											echo '<p><span id="grandTotal" value="' . number_format($total, 2) . '">' . number_format($total, 2) . '</span></p>';
										}
										?>



									</td>


								</tr>
								<tr class="total-data">
									<td><strong>Shopping: </strong></td>
									<td>
										<?php
										if (isset($shipping) && $shipping == true) {
											echo '<p><span value="' . number_format($shipping, 2) . '">' . number_format($shipping, 2) . '</span></p>';
										} else {
											$shipping = 0; // กำหนดค่าเริ่มต้นให้กับ $shipping
											echo '<p><span value="' . number_format($shipping, 2) . '">' . number_format($shipping, 2) . '</span></p>';
										}
										?>
									</td>
								</tr>
								<tr class="total-data">
									<td><strong>Total: </strong></td>
									<td>

										<?php
										if (isset($totalsumship) && $totalsumship == true) {
											echo '<p><span id="sumship" value="' . number_format($totalsumship, 2) . '">' . number_format($totalsumship, 2) . '</span></p>';
										} else {
											$totalsumship = 0; // กำหนดค่าเริ่มต้นให้กับ $totalsumshipsumship
											echo '<p><span id="sumship" value="' . number_format($totalsumship, 2) . '">' . number_format($totalsumship, 2) . '</span></p>';
										}
										?>
									</td>
								</tr>
							</tbody>
						</table>

							<button class="cart-btn">Shopping</button>
							</form>
								<form id="order" name="order" method="post" action="insert_order.php?">
										<button name="ex" id="ex" class="cart-btn margin-bottom">Check Out </button>
								</form>
							<div class="cart-buttons">
								<a href="checkout.html" class="boxed-btn black">Check Out html</a>
								<a href="cart.php?act=clear" class="boxed-btn black"> Clear</a>
							</div>


						<!-- <div class="cart-buttons">
							<button class="boxed-btn black">Shopping</button>
							</form>
							<form id="order" name="order" method="post" action="insert_order.php?">
								<div class="cart-buttons">
									<button name="ex" id="ex" class="boxed-btn black">Check Out </button>
								</div>
							</form>
							<div class="cart-buttons">
								<a href="checkout.html" class="boxed-btn black">Check Out html</a>
								<a href="cart.php?act=clear" class="boxed-btn black"> Clear</a>
							</div>

						</div> -->




					</div>
				</div>
			</div>
		</div>




</body>
<br><br>
<?php
include_once('footer.php')
?>


</html>