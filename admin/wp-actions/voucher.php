<?php
session_start();
require_once("../../wp-includes/autoLoader.php");
require_once("../../wp-includes/utils.php");

$redirect = header("Location: ../dashboard/vouchers.php");

if(isset($_POST['add-voucher']) && !empty($_POST['csrf_token'])){
    if ($_POST['csrf_token'] === $_SESSION['csrf_token']) {
        $voucher_id = "vid_". generate_number(11);
        $voucher_name = str_replace(' ', '_',$_POST['name']);
        $amount = $_POST['amount'];
        $voucher->addLogs($logged_id, "Vouchers - Add new voucher.");
        $voucher->addVoucher($voucher_id, $voucher_name, $amount);
        $redirect;
    } else {
        $_SESSION['error'] = "Invalid Request";
        $redirect;
    }
}elseif(isset($_GET['voucher_id']) && !empty($_GET['_token'])){
    if($_GET['_token'] === $_SESSION['csrf_token']){
        $voucher->addLogs($logged_id, "Vouchers - Deleted voucher.");
        $voucher->deleteVoucher($_GET['voucher_id']);
        $redirect;
    }else{
        $_SESSION['error'] = "Invalid Request";
        $redirect;
    }
}elseif(isset($_POST['update-voucher']) && !empty($_POST['csrf_token'])){
    if ($_POST['csrf_token'] === $_SESSION['csrf_token']) {
        $voucher_id = $_POST['voucher_id'];
        $voucher_name = $_POST['name'];
        $amount = $_POST['amount'];
        $voucher->addLogs($logged_id, "Vouchers - Edited voucher.");
        $voucher->updateVoucher($voucher_id, $voucher_name, $amount);
        $redirect;
    } else {
        $_SESSION['error'] = "Invalid Request";
        $redirect;
    }
}else{
    $_SESSION['error'] = "Invalid Request";
    $redirect;
}
?>