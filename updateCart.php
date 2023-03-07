<?php
include_once("../wp-includes/config.php");
require_once("../wp-includes/session.php");

if (isset($_POST['price'])) {
    $price = $_POST['price'];
    $productId = $_POST['productId'];
    $qty = $_POST['quantity'];
    $total = $qty * $price;
    $uid = $_SESSION['user_token'];
    $verify_cart = $conn->query("SELECT * FROM tbl_carts WHERE user_id = '{$uid}' AND product_id = '{$productId}' LIMIT 1");

    if ($verify_cart->num_rows > 0) {
        $update = $conn->query("UPDATE tbl_carts SET qty = '{$qty}', total = '{$total}' WHERE user_id = '{$user_id}' AND product_id = '{$productId}' LIMIT 1");

        if ($update) {
            $getUpdate = $conn->query("SELECT SUM(total) as total FROM tbl_carts WHERE user_id = '{$user_id}' AND status = 'checkout' LIMIT 1");

            $fetchRow = $getUpdate->fetch_assoc();

            $total = number_format($fetchRow['total']);
            $res = (object) [
                "status" => "Success",
                "total" => $total,
                "quantity" => $qty,
            ];
        } else {
            $res = (object) [
                "status" => "Error",
            ];
        }
    } else {
        $res = (object) [
            "status" => "Error",
            "total" => 0,
            "quantity" => $qty,
        ];
    }
} elseif (isset($_POST['status'])) {
    $productId = $_POST['productId'];
    $check_cart = $conn->query("SELECT SUM(total) as total, status FROM tbl_carts WHERE user_id = '{$user_id}' AND product_id = '{$productId}' GROUP BY status LIMIT 1");

    if ($check_cart->num_rows > 0) {
        $fetch_cart = $check_cart->fetch_assoc();
        if ($_POST['status'] === 'checkout') {
            $update = $conn->query("UPDATE tbl_carts SET status = null WHERE user_id = '{$user_id}' AND product_id = '{$productId}' LIMIT 1");
            if ($update) {
                $getUpdate = $conn->query("SELECT SUM(total) as total FROM tbl_carts WHERE user_id = '{$user_id}' status = 'checkout' LIMIT 1");
                if ($getUpdate->num_rows > 0) {
                    $fetchRow = $getUpdate->fetch_assoc();

                    $total = number_format($fetchRow['total']);
                    $res = (object) [
                        "status" => "Success",
                        "total" => $total,
                    ];
                }
            }
        } else {
            $update = $conn->query("UPDATE tbl_carts SET status = 'checkout' WHERE user_id = '{$user_id}' AND product_id = '{$productId}' LIMIT 1");
            if ($update) {
                $getUpdate = $conn->query("SELECT SUM(total) as total FROM tbl_carts WHERE user_id = '{$user_id}' status = 'checkout' LIMIT 1");
                if ($getUpdate->num_rows > 0) {
                    $fetchRow = $getUpdate->fetch_assoc();

                    $total = number_format($fetchRow['total']);
                    $res = (object) [
                        "status" => "Success",
                        "total" => $total,
                    ];
                } else {
                    $res = (object) [
                        "status" => "Failed",
                        "total" => 0,
                    ];
                }
            }
        }
    } else {
        $res = "invalid";
    }
}

echo (json_encode($res));
?>