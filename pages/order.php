<?php
// fix path 
$parentPath = '/Shop';
$parentPath2 = '/Shop/pages'
?>

<?php
include_once("header.php");
?>

<?php
include_once("connectDB.php");
$conn = new DB_conn; //สร้าง object ชื่อ $condb
?>
<!DOCTYPE html>
<html lang="en">
<html>



<body>
    <!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->

    <!-- Header -->


    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>status</p>
                        <h1>Tracking Order</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- Body -->
    <div class='container text-left'>
        <p>ชื่อผู้สั่งซื้อ : </p>
        <p>ที่อยู่จัดส่ง : </p>
    </div>
    <table class="layout-table">
        <div class="container">
            <thead class="cart-table-head text-center">
                <tr>
                    <td colspan="8">
                        <h4>รายละเอียดรายการสั่งซื้อ</h4>
                    </td>
                </tr>
                <tr>
                    <th class="column-name">รูปสินค้า</th>
                    <th class="column-name">ชื่อสินค้า</th>
                    <th class="column-name">ราคา</th>

                </tr>
            </thead>
            <tbody>

            </tbody>
        </div>
    </table>
    <div class="container">
        <p>ราคารวมสุทธิ : 100</p>
    </div>

    <!-- Footer-->
    <?php
    include_once('footer.php')
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