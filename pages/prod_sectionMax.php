<?php 
include_once("connectDB.php");
include_once("header.php");
$conn = new DB_conn; //สร้าง object ชื่อ $condb
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
}
?>

<!DOCTYPE html>
<html lang="en">
  
  
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">
    
    <!-- title -->
    <title>Fruitkha</title>
</head>

<!-- product section -->
<div class="product-section mt-150 mb-150">
  
  <div class="container">
    <div class="row flex-row">
      
      
      <?php
        $sql = $conn->display_prod();
        while ($data = mysqli_fetch_array($sql)) {
          ?>


<?php
          $str = $data['prod_img'];
          $pathImg = substr($str, 9); //นับเเต่ตัวที่9
          $parentPathImg  = 'p_img/'.$pathImg;
          $parentPath  = '/shop/pages/';
          $parentPath2  = '/shop/';
          
          ?>
          <div class="col-lg-4 col-md-6 text-center">
            <div class="single-product-item">
              
              
              <a href="<?php echo $parentPath ?>singleproductmax.php?id=<?php echo $data['prod_id']; ?>">

                <img src="<?php echo$data['prod_img'] ?>" alt="" /></a> 
              <h3>
                <?php echo $data['prod_name'] ?>
              </h3>
              <p class="product-price"><span>ต่อหนึ่งใบ</span>
                <?php echo $data['prod_price'] . " บาท" ?>
              </p>
              <a href="<?php echo $parentPath ?>cart.php?id=<?php echo $data['prod_id']; ?>&act=add" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>


              <!-- <a href="pages/cart3.php?p_id=<?php echo $data['prod_id'] ?>&act=add" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a> -->
              <!-- <a href="pages/cart.php?q=<?php echo base64_encode($data['prod_id']); ?>" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a> -->
            </div>
          </div>
        <?php
        }
        ?>
      </div>
    </div>
 
</div>
<!-- end product section -->



<!-- jquery -->
<script src="../assets/js/jquery-1.11.3.min.js"></script>
<!-- bootstrap -->
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<!-- count down -->
<script src="../assets/js/jquery.countdown.js"></script>
<!-- isotope -->
<script src="../assets/js/jquery.isotope-3.0.6.min.js"></script>
<!-- waypoints -->
<script src="../assets/js/waypoints.js"></script>
<!-- owl carousel -->
<script src="../assets/js/owl.carousel.min.js"></script>
<!-- magnific popup -->
<script src="../assets/js/jquery.magnific-popup.min.js"></script>
<!-- mean menu -->
<script src="../assets/js/jquery.meanmenu.min.js"></script>
<!-- sticker js -->
<script src="../assets/js/sticker.js"></script>
<!-- main js -->
<script src="../assets/js/main.js"></script>


</body>

</html>