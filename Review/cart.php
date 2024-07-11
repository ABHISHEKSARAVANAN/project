<?php
$conn = mysqli_connect("localhost", "root", "", "review");

// Update quantity in the cart
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $quantity = $_POST['quantity'];
    $sql = "UPDATE cart SET quantity='$quantity' WHERE id='$id'";
    mysqli_query($conn, $sql);

    echo "<script>window.location.href='cart.php'</script>";
}

// Remove item from the cart
if (isset($_POST['remove'])) {  
    $id = $_POST['id'];

    $sql = "DELETE FROM cart WHERE id='$id'";
    mysqli_query($conn, $sql);

    echo "<script>window.location.href='cart.php'</script>";
}

// Fetch cart items
$query = "SELECT * FROM cart";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="checkout.css">
    <title>Cart</title>
</head>
<body style="  background-image: url('images/background.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed; 
    background-size: 100% 100%;">
   <nav>
    <span><img src="images/logo.png" alt="Logo"></span>
    <div class="log-and-cart">
        <a href="index.php"><i class="fa fa-home" style="font-size:30px;color:white;"></i></a>
    </div>
   </nav> 
   <main>
        <div class="container">
            <h2 style="background-color: black; border-radius: 20px; height:50px; color: white;margin-top:10px;padding-top:10px;">Your Cart</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    if(mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            $productTotal = $row['price'] * $row['quantity'];
                            $total += $productTotal;
                    ?>
                    <tr>
                        <td><img src="images/<?php echo $row['productimage']; ?>" alt="Product Image" width="50"></td>
                        <td><?php echo $row['productname']; ?></td>
                        <td>RS. <?php echo $row['price']; ?></td>
                        <td>
                            <form action="cart.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <input type="number" name="quantity" value="<?php echo $row['quantity']; ?>" min="1" style="width: 50px;">
                                <button type="submit" name="update">Update</button>
                            </form>
                        </td>
                        <td>RS. <?php echo $productTotal; ?></td>
                        <td>
                            <form action="cart.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <button type="submit" name="remove">Remove</button>
                            </form>
                        </td>
                    </tr>
                    <?php
                        }
                    } else {
                        echo "<tr><td colspan='6'>Your cart is empty</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
            <div class="total">
                <h3>Total: RS. <?php echo number_format($total, 2); ?></h3><br>
                <div class="btn">
                <button class="checkout" style="height: 30px;" onclick="location.href='index.php'">Back</button> 
                <button class="checkout" style="height: 30px;margin-left:10px;" onclick="location.href='checkout.php'"> Check-out</button></div>
            </div>
        </div>
   </main>
   <footer class="footer">
        <div class="footer-container">
            <div class="row">
                <div class="footer-col">
                    <h4>Company</h4>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Our Services</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Affiliate Program</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Get Help</h4>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Shipping</a></li>
                        <li><a href="#">Returns</a></li>
                        <li><a href="#">Order Status</a></li>
                        <li><a href="#">Payment Options</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>We Have</h4>
                    <ul>
                        <li><a href="#">Interior</a></li>
                        <li><a href="#">Premium Washing</a></li>
                        <li><a href="#">Exterior</a></li>
                        <li><a href="#">Tuning</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Follow Us</h4>
                    <div class="social-links">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
