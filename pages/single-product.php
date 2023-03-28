<?php
include_once("connectDB.php");
$conn = new DB_conn; //สร้าง object ชื่อ $condb
// fix path 
$parentPath = '/Shop';
$parentPath2 = '/Shop/pages';
$qty = 1;
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

  <!-- favicon -->
  <link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
  <!-- google font -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
  <!-- fontawesome -->
  <link rel="stylesheet" href="../assets/css/all.min.css">
  <!-- bootstrap -->
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
  <!-- owl carousel -->
  <link rel="stylesheet" href="../assets/css/owl.carousel.css">
  <!-- magnific popup -->
  <link rel="stylesheet" href="../assets/css/magnific-popup.css">
  <!-- animate css -->
  <link rel="stylesheet" href="../assets/css/animate.css">
  <!-- mean menu css -->
  <link rel="stylesheet" href="../assets/css/meanmenu.min.css">
  <!-- main style -->
  <link rel="stylesheet" href="../assets/css/main.css">
  <!-- responsive -->
  <link rel="stylesheet" href="../assets/css/responsive.css">

</head>


<body>


  <!--PreLoader-->
  <div class="loader">
    <div class="loader-inner">
      <div class="circle"></div>
    </div>
  </div>
  <!--PreLoader Ends-->

  <!-- header -->
  <?php
  include_once("header.php")
  ?>
  <!-- end header -->


  <!-- search area -->
  <div class="search-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <span class="close-btn"><i class="fas fa-window-close"></i></span>
          <div class="search-bar">
            <div class="search-bar-tablecell">
              <h3>Search For:</h3>
              <input type="text" placeholder="Keywords" />
              <button type="submit">
                Search <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end search arewa -->

  <?php

  $id = base64_decode($_GET['q']);
  echo "$id"

  ?>

  <!-- breadcrumb-section -->
  <div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2 text-center">
          <div class="breadcrumb-text">
            <p>See more Details</p>
            <h1>Single Product</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end breadcrumb section -->

  <!-- single product -->

  <?php
  $sql = $conn->display_prod_edit($id); //เลือก
  while ($data = mysqli_fetch_array($sql)) {
    $p_name = $data['prod_name'];
    $p_price = $data['prod_price'];
    $p_detail = $data['prod_detail'];
    $p_img = $data['prod_img'];
  }
  ?>

  <div class="single-product mt-150 mb-150">
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          <div class="single-product-img">

            <td class="product-image">
              <img src="<?php echo "$p_img" ?>" alt="" />
            </td>


          </div>
        </div>
        <div class="col-md-7">
          <div class="single-product-content">
            <h3><?php echo $p_name ?></h3>
            <p class="single-product-pricing"><span>Price</span><?php echo $p_price ?>฿</p>
            <p>
              <?php echo $p_detail ?>
            </p>
            <div class="single-product-form">

              <form id="addToCartForm" method="POST" action="<?php echo $parentPath2 ?>/cart.php">
                <input type="hidden" name="p_id" value="<?php echo $id ?>" />
                <input type="hidden" name="act" value="add" />
                <input type="number" name="qty" value="1" />
                <br></br>

                <!-- ส่งไปเมื่อกด button นี้ -->
                <button type="submit" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</button>


              </form>
            </div>

            <h4>Share:</h4>
            <ul class="product-share">
              <li>
                <a href=""><i class="fab fa-facebook-f"></i></a>
              </li>
              <li>
                <a href=""><i class="fab fa-twitter"></i></a>
              </li>
              <li>
                <a href=""><i class="fab fa-google-plus-g"></i></a>
              </li>
              <li>
                <a href=""><i class="fab fa-linkedin"></i></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end single product -->


  <!-- more products -->

  <!-- end more products -->


  <!-- product section -->
  <div class="product-section mt-150 mb-150">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2 text-center">
          <div class="section-title">
            <h3><span class="orange-text">Related</span> Products</h3>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit.
              Aliquid, fuga quas itaque eveniet beatae optio.
            </p>
          </div>
        </div>
      </div>



      <!-- product section -->

      <!-- ../p_img/product12.jpg -->
      <?php
      include_once("prod_section.php");
      ?>


      <!-- end product section -->








      <!-- footer -->
      <?php
      include_once("footer.php");
      ?>

      <!-- end footer -->





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