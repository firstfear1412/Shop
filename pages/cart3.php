<?php
    error_reporting( error_reporting() & ~E_NOTICE );
    session_start(); 
    $p_id = $_REQUEST['p_id']; 
	$act = $_REQUEST['act'];

	if($act=='add' && !empty($p_id))
	{
		if(!isset($_SESSION['shopping_cart']))
		{
			 
			$_SESSION['shopping_cart']=array();
		}else{
		 
		}
		if(isset($_SESSION['shopping_cart'][$p_id]))
		{
			$_SESSION['shopping_cart'][$p_id]++;
		}
		else
		{
			$_SESSION['shopping_cart'][$p_id]=1;
		}
	}

	if($act=='remove' && !empty($p_id))  //ยกเลิกการสั่งซื้อ
	{
		unset($_SESSION['shopping_cart'][$p_id]);
	}

	if($act=='update')
	{
		$amount_array = $_POST['amount'];
		foreach($amount_array as $p_id=>$amount)
		{
			$_SESSION['shopping_cart'][$p_id]=$amount;
		}
	}
	?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shopping Cart devbanban</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>
<!-- <?php include("menu.php");?> -->
<br>
<br>
<div class="container">
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-7">
      <form id="frmcart" name="frmcart" method="post" action="?act=update">
        <table width="100%" border="0" align="center" class="table table-hover">
        <tr>
          <td height="40" colspan="7" align="center" bgcolor="#CCCCCC"><strong><b>ตะกร้าสินค้า</span></strong></td>
        </tr>
        <tr>
          <td align="center" bgcolor="#EAEAEA"><strong>No.</strong></td>
          <td align="center" bgcolor="#EAEAEA"><strong>image</strong></td>
          <td align="center" bgcolor="#EAEAEA"><strong>สินค้า</strong></td>
          <td align="center" bgcolor="#EAEAEA"><strong>ราคา</strong></td>
          <td align="center" bgcolor="#EAEAEA"><strong>จำนวน</strong></td>
          <td align="center" bgcolor="#EAEAEA"><strong>รวม/รายการ</strong></td>
          <td align="center" bgcolor="#EAEAEA"><strong>ลบ</strong></td>
        </tr>
        <?php


// $sql = $conn->display_prod_edit($id);//เลือก
// while ($data = mysqli_fetch_array($sql)) {
//       $p_name = $data['prod_name'];
//       $p_price = $data['prod_price'];
//       $p_detail = $data['prod_detail'];
//       $p_img = $data['prod_img'];
// }
echo "
<script>
function updateTotal() {
    var price = document.getElementById('price').getAttribute('value');
    var quantity = document.getElementById('quantity').value;
    var total = price * quantity;
    var toalprices=total+70;
    document.getElementById('total').innerHTML = total;
    document.getElementById('totalprice').innerHTML = toalprices;
	return totalItem;

  }
</script>";

include_once("connectDB.php");
$conn = new DB_conn; //สร้าง object ชื่อ $condb


if(!empty($_SESSION['shopping_cart']))
{
	$total = 0;
	$i = 0;
	foreach($_SESSION['shopping_cart'] as $p_id=>$p_qty)
	{
		// $sql = "select * from shop_prod where prod_id=$p_id";
		// $query = mysql_db_query($database_condb, $sql);
		// while($row = mysql_fetch_array($query))
		// {
                            $sql = $conn->display_prod_edit($p_id);//เลือก

		// $total = 0;
		// $i = 0;
                            while ($row = mysqli_fetch_array($sql)) {		
                                        		 
		$sum = $row['prod_price'] * $p_qty;
		$priceItem = $row["prod_price"];
		// $subTotalItem = $priceItem * 
		$total += $sum;
		?>
		<p id="total"></p>
		<label for="quantity">จำนวนสินค้า:</label>
		<input type="text" id="price" name="price" value="100">
		<input type="number" id="quantity" name="quantity" value="1" min="1" onchange="updateTotal()">
		<p id="total"></p>
		  
		<?php
		echo "<tr>";
		echo "<td>";
		echo $i += 1;
		echo ".";
		echo "</td>";
		echo "<td width='100'>"."<img src='$row[prod_img]'  width='50'/>"."</td>";
		echo "<td width='334'>"." " . $row["prod_name"] . "</td>";
		// echo $priceItem;
		echo "<td id='price' width='100' align='right'>' . $priceItem .'</td>";
		?>
		<p id="price" name="price"></p>
		<td width='57' align='right'>
		<input type="number" id="quantity" name="quantity" value="1" min="1" onchange="updateTotal()">
		<p id="total" value='$'>0</p>
		<?php
		// echo "<td width='100' align='right' value = '10'>dsg</td>";
		// echo "<td width='100' align='right'>" .number_format($sum,2)."</td>";
		echo "<td width='100' align='center'><a href='cart3.php?p_id=$p_id&act=remove' class='btn btn-danger btn-xs'>ลบ</a></td>";
		
		echo "</tr>";
		}
 
	}
	echo "<tr>";
  	echo "<td colspan='5' bgcolor='#CEE7FF' align='right'>Total</td>";
  	echo "<td align='right' bgcolor='#CEE7FF'>";
  	echo "<b>";
  	echo  number_format($total,2);
  	echo "</b>";
  	echo "</td>";
  	echo "<td align='left' bgcolor='#CEE7FF'></td>";
	echo "</tr>";
}
?>
        <tr>
          <td></td>
          <td colspan="5" align="right">
          <button type="submit" name="button" id="button" class="btn btn-warning"> คำนวณราคาใหม่ </button>
            <!-- <button type="button" name="Submit2"  onclick="window.location='confirm.php';" class="btn btn-primary"> 
            <span class="glyphicon glyphicon-shopping-cart"> </span> สั่งซื้อ </button> -->
            <button type="button" name="Submit2"  onclick="window.location='confirm.php';" class="btn btn-primary"> 
            <span class="glyphicon glyphicon-shopping-cart"> </span> สั่งซื้อ </button>

	</td>
        </tr>
      </form>
      <p align="center"> <a href="../index.php" class="btn btn-primary">กลับไปเลือกสินค้า</a> </p>
      <!-- <p align="center"> <a href="index.php" class="btn btn-primary">กลับไปเลือกสินค้า</a> </p> -->
    </div>
  </div>
</div>


<!-- MAX -->
	<!-- cart -->
	<!-- <div class="cart-section mt-150 mb-150">
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
											<td class="product-quantity"><input type="number" value="<?php echo $qty ?>" id="quantity" name="quantity" onchange="updateTotal()"></td>
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
							<a href="cart.html" class="boxed-btn">Update Cart</a>
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
	</div> -->
	<!-- end cart -->

</body>
</html>


<!-- จากCode นี้ Warning: Undefined variable $total in D:\xampp\htdocs\Shop\pages\cart2.php on line 103 ต้องเเก้อย่างไง -->