# bug-chekcing

in cart.php


To calculate the total cost of the selected items, you have added a piece of JavaScript code that loops through all the checkboxes and adds up the cost of the selected items. However, this code is not working correctly because it is not checking whether each checkbox is checked or not. Instead, it is adding up the cost of all the items in the cart, regardless of whether they are selected or not.

To fix this, you need to modify your JavaScript code to only add up the cost of the selected items. You can do this by checking whether each checkbox is checked before adding the cost of the corresponding item to the total. Here's an example of how you could modify your code to do this:


function calculateTotal() {
  var total = 0;
  var checkboxes = document.getElementsByName("check");
  for (var i = 0; i < checkboxes.length; i++) {
    if (checkboxes[i].checked) {
      var itemPrice = parseFloat(checkboxes[i].value);
      total += itemPrice;
    }
  }
  document.getElementById("totalPrice").innerHTML = total.toFixed(2);
}

In this code, we first initialize the total cost to zero. Then we get an array of all the checkboxes with the name "check". We loop through this array and check whether each checkbox is checked or not. If it is checked, we extract the price of the corresponding item (which is stored in the value attribute of the checkbox), convert it to a float, and add it to the total. Finally, we update the HTML of the element with the ID "totalPrice" to display the total cost, rounded to 2 decimal places.
