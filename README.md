# bug-chekcing

in cart.php
To fix this issue, you could modify your server-side code to only add the prices of the selected items. One way to do this would be to add a check for each item in the cart to see if its corresponding checkbox is selected or not. If the checkbox is selected, you would add the price of the item to the order total; otherwise, you would skip that item.

Here's an example of how you could modify your checkout.php file to do this:

$total = 0;
foreach($_SESSION['cart'] as $item){
    if(isset($_POST['check'.$item['id']]) && $_POST['check'.$item['id']] == 'on'){
        $total += $item['price'] * $item['quantity'];
    }
}
