<?php
include_once('header.php');
include_once('connectDB.php');
$conndb = new DB_conn;
$server = $conndb->conn;

$member_id = $_GET["id"];
$name = $_GET["name"];
$email = $_GET["email"];
$address = $_GET["address"];
$mobile = $_GET["mobile"];

print_r($mobile);
print_r($_SESSION['shopping_cart']);


if (!empty($_SESSION['shopping_cart'])) {
    $i = 1;
    echo '<table>';
    echo '<thead><tr><th>No</th><th>Product ID</th><th>Quantity</th></tr></thead>';
    echo '<tbody>';
    foreach ($_SESSION['shopping_cart'] as $p_id => $p_qty) {
        echo '<tr><td>' . $i . '</td><td>' . $p_id . '</td><td>' . $p_qty . '</td></tr>';
        $i++;
    }
    echo '</tbody>';
    echo '</table>';
}

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) { // ตรวจสอบสถานะการล็อกอิน
    $member_id = $_SESSION['member_id'];
    $username = $_SESSION['username'];
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $address = $_SESSION['address'];
} else {
    $member_id = "";
    $total = 0;
}
$total = $_SESSION['totalPrice'];


$sql = $conndb->insert_order($member_id, $name, $email, $address, $total, $mobile);
if (mysqli_query($server, $sql)) {
    $last_id = mysqli_insert_id($server);
    foreach ($_SESSION['shopping_cart'] as $p_id => $p_qty) {
        $prod_id = $p_id;
        $quantity = $p_qty;
        $sqlSelectProduct = $conndb->select_product($prod_id);
        while ($data = mysqli_fetch_array($sqlSelectProduct)) {
            $sumPerItem = $data['prod_price'] * $quantity;
        }
        $sql = $conndb->insert_orderProductTest($last_id,$prod_id,$quantity,$sumPerItem);
        mysqli_query($server, $sql);

    $_SESSION['shopping_cart'] = array();
}
}
