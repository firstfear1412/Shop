<?php
include_once("connectDB.php");
$conn = new DB_conn; //สร้าง object ชื่อ $condb
?>
    <?php
    include_once("header.php")
    ?> 

<!DOCTYPE html>
<html lang="en">



<head>
	<title>Display Products</title>
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
    <!-- end header -->
    <!-- hero area -->
	<div class="hero-area hero-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 offset-lg-2 text-center">
					<div class="hero-text">
						<div class="hero-text-tablecell">

            

							<p class="subtitle">ADMIN PANEL</p>
							<h1>Display Product</h1>
              
							<!-- <div class="hero-btns">
								<a href="addProd.php" class="boxed-btn">Add Product</a>
								<a href="admin-panel.php" class="bordered-btn">Admin</a>
							</div> -->

             

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end hero area -->


       <!-- breadcrumb-section -->
       <!-- <div class="breadcrumb-section breadcrumb-bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 offset-lg-2 text-center">
            <div class="breadcrumb-text">
              <p>ADMIN PANEL</p>
              <h1>Display Product</h1>
            </div>
          </div>
        </div>
      </div>
    </div> -->
    <!-- end breadcrumb section -->


    <!-- displayProd -->
    

    <div class="cart-section mt-150 mb-150">
      <div class="container">
        <div class="row justify-content-center " >
          <div class="col-lg-8 col-md-12">
            
          <div class="text-center">
          <div class="DispayProd" >
          <h1>PRODUCT LIST</h1>
          </div>
          </div>
            
          <!-- <div class="text-center">
          <a href="<?php echo '/Shop/pages/' ?>addProd.php" class="cart-btn"><i class='bx bxs-book-add bx-sm'></i>ADD PRODUCT</a>
          <a href="<?php echo '/Shop/pages/' ?>admin-panel.php" class="cart-btn">ADMIN PANEL</a>
          </div> -->

          <!-- <a href="admin-panel.php" class="bordered-btn">ADMIN</a> -->

          <br></br>
            <div class="cart-table-wrap">
              <table class="cart-table">
                <thead class="cart-table-head">
                  <tr class="table-head-row">
                    
                    <th class="product-image">Product Image</th>
                    <th class="product-name">Name</th>
                    <th class="product-price">Price</th>
                    <th class="product-Detail">Detail</th>
                    <th class="product-Prod_id">Prod_id</th>
                    <th class="product-edit">Edit</th>
                    <th class="product-del">Remove</th>
                    
                
              

                  </tr>
                </thead>
                <tbody >

                <?php
                        $sql = $conn->display_prod();
                        $i = 1;
                        while ($data = mysqli_fetch_array($sql)) {
                            // echo $data['first_name']; 
                            ?>
                            
                            <tr>
                            

                             

                                <td class="product-image"> 
                                <img src= <?php echo $data['prod_img'] ?> alt="" />
                                </td>
                                
                                <td class="product-name"> <?php echo $data['prod_name'] ?> </td>
                                <td class="product-price"> <?php echo $data['prod_price'] ?> </td>
                                <td class="product-Detail"> <?php echo $data['prod_detail'] ?> </td>
                                <td class="product-Prod_id"> <?php echo $data['prod_id'] ?> </td>

                                <td class="product-edit"><a href= "formEdit_Prod.php?id=<?php echo $data['prod_id'] ?>">
                                <i class="bx bx-edit bx-md" ></i></a></td>

                                <td class="product-del"><a href="del_Prod.php?id=<?php echo $data['prod_id'] ?>"
                                onclick="return confirm('คุณต้องการลบข้อมูลใช่หรือไม่')">       
                                <i class="bx bx-x-circle bx-md"></i></a></td>
                            
                            </tr>
                            

                            <?php $i = $i + 1;  ?>
                            <?php
                        }
                        // ?>
                </tbody>
              </table>
            </div>

          <br></br>
          <div class="text-center">

          
          <a href="<?php echo '/Shop/pages/' ?>addProd.php" class="cart-btn"><i class='bx bx-add-to-queue bx-sm'></i>Add Product</a>
          <?Php echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'?>
          <a href="<?php echo '/Shop/pages/' ?>admin-panel.php" class="cart-btn">Admin PANEL</a>
          </div>

          </div>
          </div>
          </div>
          </div>

      
    <!-- end displayProd -->


    <?php
    include_once("footer.php");
    ?>



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
