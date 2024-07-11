<?php
$conn = mysqli_connect("localhost", "root", "", "review");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$count_cart = 0;
$fetch = "SELECT * FROM cart";
$count_cart = mysqli_num_rows(mysqli_query($conn, $fetch));

if (isset($_POST["add"])) {
    $productid = $_GET['id'];
    $productname = $_POST['hidden_name'];
    $quantity = $_POST['quantity'];
    

    // Check if the product is already in the cart
    $query = "SELECT * FROM cart WHERE productname='$productname'";
    $res = mysqli_query($conn, $query);
    $count = mysqli_num_rows($res);

    // Get the product's available quantity from the parts table
    $qur = "SELECT quantity FROM parts WHERE productname='$productname'";
    $re = mysqli_query($conn, $qur);
    $row = mysqli_fetch_assoc($re);
    $available_quantity = $row['quantity'];

    if ($available_quantity <= 0) {
        echo "<script>alert('Out of stock');</script>";
    } 
    else if($available_quantity< $quantity){
        echo "<script>alert('Your order exceed our stock, sorry for inconvenience');</script>";
    }
    else {
        if ($count > 0) {
            echo "<script>alert('Product is already available in your cart');</script>";
            echo "<script>window.location.href='index.php';</script>";
        } else {
            $productimage = $_POST['hidden_image'];
           
            $price = $_POST['price'];

            $sql = "INSERT INTO cart (productname, productimage, price, quantity) VALUES ('$productname', '$productimage', '$price', '$quantity')";
            mysqli_query($conn, $sql);

            echo "<script>window.location.href='index.php';</script>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <title>Review</title>
</head>
<body style="background-image: url('images/background.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%;">
   <nav>
    <span><img src="images/logo.png" alt="Logo"></span>
    <a href="#">Car Wash</a>
    <a href="#">Premium Coating</a>
    <a href="#">Service</a>
    <a href="#"><i class="fa fa-user-circle-o" style="font-size:30px;"></i></a>
    <a href="cart.php" style="margin-right:50px;"><i class="fa fa-cart-plus" style="font-size:35px;"></i>
    <span class="cart-count"><?php echo $count_cart; ?></span>
    </a>
   </nav> 
   <main>
   <div class="container2">
         <section class="middle">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="images/display1.jpg" alt="First slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="images/corosal2.jpg" alt="Second slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="images/corosal3.jpg" alt="Third slide">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
            </div>
        </section>
        <div class="inner-right">
            <span style="background-color: white; color:black; border-radius: 10px;text-align:center;margin-left:20px;">Our Services</span>
            <ul>
                <li>Painting</li>
                <li>Full Checkup</li>
                <li>ECU Tuning</li>
                <li>Stickering</li>
                <li>Test Drive</li>
                <li>Performance Test</li>
            </ul>
        </div>
    </div>
    <div class="container">
        <table class="table">
            <?php
            $conn = new mysqli("localhost", "root", "", "review");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $query = "SELECT * FROM parts ORDER BY id ASC";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>   
            <td>
                <form action="index.php?add&id=<?php echo $row['id'] ?>" method="post">
                    <td>
                        <div class="product" style="text-align:center; background-color: #bbbbbb;">
                            <img src="images/<?php echo $row['productimage']; ?>" alt="Product Image">
                            <h3><?php echo $row['productname']; ?></h3>
                            <p>RS. <?php echo $row['price']; ?></p>
                            <input style="width: 30px; margin-left:5px" type="number" name="quantity" value="1" min="1"> 
                            <button class="add-to-cart" type="submit" name="add">Add to cart</button>
                            <input type="hidden" name="hidden_image" value="<?php echo $row['productimage']; ?>">
                            <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                            <input type="hidden" name="hidden_name" value="<?php echo $row['productname']; ?>">
                        </div>
                    </td>
                </form>
            </td>
            <?php
                }
            }
            $conn->close();
            ?>
        </table>
    </div>
    <div class="total">
        <span>Total: RS. <span id="total-amount">0.00</span></span>
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
                    <h4>Online Shop</h4>
                    <ul>
                        <li><a href="#">Watch</a></li>
                        <li><a href="#">Bag</a></li>
                        <li><a href="#">Shoes</a></li>
                        <li><a href="#">Dress</a></li>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Fetch and display the total amount
        function updateTotal() {
            fetch('calculate_total.php')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('total-amount').textContent = data.total.toFixed(2);
                });
        }

        document.addEventListener('DOMContentLoaded', () => {
            updateTotal();
            const addToCartButtons = document.querySelectorAll('.add-to-cart');
            addToCartButtons.forEach(button => {
                button.addEventListener('click', () => {
                    setTimeout(updateTotal, 1000); // Delay to ensure DB update completes
                });
            });
        });
    </script>
</body>
</html>
