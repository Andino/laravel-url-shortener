<?php

/**
* Given a list of products such as 'name', 'unit price', 'quantity',
*
* - write a script to display the products sorted by prices, the most expensive first
* - if 2 products have the same price, sort by quantities, the highest first
* - bonus: display in your sorted list of products the total price per product (quantity * unit
price)
*/

$products = [
    ['Milk', '1.25', 2],
    ['Eggs', '4.99', 1],
    ['Granulated sugar', '1.25', 1],
    ['Broccoli', '2.34', 3],
    ['Chocolate bar', '1.25', 5],
    ['Organic All-purpose flour', '4.99', 2]
];

function sortByOrder ($a, $b) {
    if($a[1] === $b[1]){
        return $b[2] - $a[2];
    }
    return $b[1]-$a[1];
}

for($i=0; $i<2; $i++){
    usort($products, 'sortByOrder');
}
?>

<table>
  <tr>
    <th>Name</th>
    <th>Individual Price</th>
    <th>Quantity</th>
    <th>Final Price</th>
  </tr>
  <?php foreach ($products as $items) {?>
    <tr>
    <td><?php echo $items[0] ?></td>
    <td>$<?php echo $items[1] ?></td>
    <td><?php echo $items[2] ?></td>
    <td>$<?php echo $items[1] * $items[2] ?></td>
  </tr>
  <?php } ?>

</table>