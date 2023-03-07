<?php
class Vouchers {
    private $conn;
    public $tbl_name = "tbl_vouchers";

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function addLogs($user_id, $actions)
    {
        $date = new DateTime("now", new DateTimeZone('Asia/Manila'));
        $current = $date->format('Y-m-d H:i:s');

        $date = date('Y-m-d h:i:s', strtotime('now'));
        $this->conn->query("INSERT INTO tbl_logs(user_id, action, date) VALUES('{$user_id}', '{$actions}', '{$current}')");
    }

    public function addVoucher($vid, $name, $amount){
        $stmt = $this->conn->prepare("INSERT INTO {$this->tbl_name} (voucher_id, voucher_code, amount) 
        VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $vid, $name, $amount);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            $_SESSION['success'] = "Successfully Saved";
        } else {
            $_SESSION['error'] = "Failed Saved";
        }
    }

    public function updateVoucher($vid, $name, $amount){
        $stmt = $this->conn->prepare("UPDATE {$this->tbl_name} SET voucher_code = ?, amount = ? WHERE voucher_id = ? LIMIT 1");
        $stmt->bind_param("sss", $name, $amount, $vid);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            $_SESSION['success'] = "Updated Successfully";
        } else {
            $_SESSION['error'] = "Failed Saved";
        }
    }

    public function deleteVoucher($vid){
       $this->conn->query("DELETE FROM {$this->tbl_name} WHERE voucher_id = '{$vid}' LIMIT 1");
    }

    public function totalVouchers(){
        $vouchers_query = $this->conn->query("SELECT * FROM {$this->tbl_name}");
        $total = mysqli_num_rows($vouchers_query);
        return $total;
    }
}

$voucher = new Vouchers($conn);
?>