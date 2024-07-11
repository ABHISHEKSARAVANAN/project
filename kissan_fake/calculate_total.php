<?php
$conn = mysqli_connect("localhost", "root", "", "review");

$total = 0;

$query = "SELECT price, quantity FROM cart";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $total += $row['price'] * $row['quantity'];
}

echo json_encode(['total' => $total]);
?>
