<?php
$conn = mysqli_connect("localhost", "root", "", "kissan");

$total = 0;

$query = "SELECT price, item_quantity FROM cart";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $total += $row['price'] * $row['item_quantity'];
}

echo json_encode(['total' => $total]);
?>
