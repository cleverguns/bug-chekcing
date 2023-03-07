<?php
/**
require_once("wp-includes/config.php");
require_once("wp-includes/session.php");
$_SESSION['csrf_token'] = bin2hex(random_bytes(32));
if (!isset($user_id)) {
    header("Location: /");
}
*/
?>


<?php
session_start();
require_once('config.php');

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}

if (isset($_POST['action']) && $_POST['action'] == 'delete') {
    foreach ($_SESSION['cart'] as $key => $value) {
        if ($value['id'] == $_POST['id']) {
            unset($_SESSION['cart'][$key]);
        }
    }
    echo '<script>alert("Product has been removed...!")</script>';
    echo '<script>window.location="cart.php"</script>';
}

if (isset($_POST['update'])) {
    foreach ($_POST['quantity'] as $key => $value) {
        if ($value == 0) {
            unset($_SESSION['cart'][$key]);
        } else {
            $_SESSION['cart'][$key]['quantity'] = $value;
        }
    }
    echo '<script>alert("Cart has been updated...!")</script>';
    echo '<script>window.location="cart.php"</script>';
}

if (isset($_POST['checkout'])) {
    $total = 0;
    foreach ($_SESSION['cart'] as $item) {
        if (isset($_POST['check' . $item['id']]) && $_POST['check' . $item['id']] == 'on') {
            $total += $item['price'] * $item['quantity'];
        }
    }
    $status = "Pending";
    $qty = $_POST['qty'];
    $insert_order = $conn->query("INSERT INTO tbl_order (user_id, total, qty, status) VALUES ('$user_id','$total','$qty','$status')");
    $order_id = $conn->insert_id;
    foreach ($_SESSION['cart'] as $item) {
        $product_id = $item['id'];
        $quantity = $item['quantity'];
        $price = $item['price'];
        $sql = "INSERT INTO tbl_order_detail (order_id, product_id, quantity, price) VALUES ('$order_id', '$product_id', '$quantity', '$price')";
        $conn->query($sql);
    }
    unset($_SESSION['cart']);
    echo '<script>alert("You have successfully placed an order...!")</script>';
    echo '<script>window.location="index.php"</script>';
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Shopping Cart | PHP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Shopping Cart</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav
            <ul class="navbar-nav ml-auto">
                <?php if (isset($_SESSION['user_id'])) { ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Hello <?php echo $_SESSION['username']; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php">Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php">Cart</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </nav>

    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="text-center">Shopping Cart</h1>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-12">
                <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) { ?>
                    <form action="" method="post">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Image</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-center">Price</th>
                                        <th class="text-center">Total</th>
                                        <th class="text-center">Action</th>
                                        <th class="text-center">Select</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $counter = 0;
                                    $grand_total = 0;
                                    foreach ($_SESSION['cart'] as $key => $value) {
                                        ++$counter;
                                        $total = $value['price'] * $value['quantity'];
                                        $grand_total += $total;
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo $counter; ?></td>
                                            <td class="text-center"><img src="<?php echo $value['image']; ?>" width="50"></td>
                                            <td class="text-center"><?php echo $value['name']; ?></td>
                                            <td class="text-center"><input type="number" name="quantity[<?php echo $key; ?>]" value="<?php echo $value['quantity']; ?>" class="form-control" min="1"></td>
                                            <td class="text-center"><?php echo number_format($value['price'], 2); ?></td>
                                            <td class="text-center"><?php echo number_format($total, 2); ?></td>
                                            <td class="text-center">
                                                <form action="" method="post">
                                                    <input type="hidden" name="id" value="<?php echo $value['id']; ?>">
                                                    <input type="hidden" name="action" value="delete">
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to remove this item?')">Delete</button
                                    </form>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="selected[]" value="<?php echo $key; ?>">
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5" align="right"><b>Grand Total:</b></td>
                            <td class="text-center"><?php echo number_format($grand_total, 2); ?></td>
                            <td colspan="2" align="center">
                                <button type="submit" name="update_cart" class="btn btn-primary">Update Cart</button>
                                <button type="submit" name="delete_cart" class="btn btn-danger" onclick="return confirm('Are you sure you want to remove selected item(s)?')">Delete Selected</button>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </form>
    <?php } else { ?>
        <div class="alert alert-info" role="alert">
            Your cart is empty.
        </div>
    <?php } ?>
</div>
</div>
</body>
</html>
