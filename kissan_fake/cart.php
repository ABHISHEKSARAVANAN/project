<?php
$conn = mysqli_connect("localhost", "root", "", "kissan");

// Update quantity in the cart
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $quantity = $_POST['quantity'];
    
    
    $check= "SELECT stock FROM mixedjam where name='$name'";
    $result = mysqli_query($conn, $check);

while ($row = mysqli_fetch_assoc($result)) {

}
    $sql = "UPDATE cart SET item_quantity='$quantity' WHERE id='$id'";
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
        <div class="navbox1">
            <div class="logo">
                <img class="logo" src="images/kissan-logo.png" alt="Kissan Logo">
            </div>
            <div class="links">
                <div class="dropdown">
                    <a href="#" class="hover-underline">PRODUCTS</a>
                    <div class="dropdown-content">
            
                        <div class="dropdown-section">
                            <h3>Jam</h3>
                            <a href="Mixed Fruit Jam.php" style="color: #e63946;text-decoration:underline;">Mixed Fruit Jam</a>
                            <a href="pineapple.php">Pineapple Jam</a>
                            <a href="orange.php">Orange Marmalade</a>
                            <a href="mango.php">Mango Jam</a></div>
                        
                        <div class="dropdown-section">
                            <h3>Ketchup & Sauces</h3>
                            <a href="#">Chilli Tomato Sauce</a>
                            <a href="#">No Onion No Garlic Tomato Sauce</a>
                            <a href="#">Fresh Tomato Ketchup</a>
                            <a href="#">Sweet & Spicy Sauce</a>
                        </div>
                        <div class="dropdown-section">
                            <h3>Peanut Butter</h3>
                            <a href="#">Peanut Butter</a>
                        </div>
                        <div class="dropdown-section">
                            <h3>Squash</h3>
                            <a href="#">Juicy Lemon Squash</a>
                            <a href="#">Juicy Grape Squash</a>
                            <a href="#">Juicy Mango Squash</a>
                            <a href="#">Juicy Orange Squash</a>
                        </div>
                    </div>
                </div>
                <div class="dropdown">
                    <a href="#" class="hover-underline">RECIPES</a>
                    <div class="dropdown-content">
                        <div class="dropdown-section">
                            <h3>Recipes by Course</h3>
                            <a href="#">Breakfast Recipes</a>
                            <a href="#">Dessert Recipes</a>
                            <a href="#">Snack Recipes</a>
                            <a href="#">Dinner Recipes</a></div>
                        
                        <div class="dropdown-section">
                            <h3>Recipes By Product</h3>
                            <a href="#">Ketchup & Sauces</a>
                            <a href="#">Peanut Butter</a>
                            <a href="#">Jam</a>
                        </div>
                        <div class="dropdown-section">
                            <h3>Quick Recipes</h3>
                            <a href="#">Rolls & Wraps</a>
                            <a href="#">Sandwiches</a>
                        </div>
                       
                    </div>
                </div>
                <a href="#" class="hover-underline">OUR STORY</a>
            </div>
        </div>
        <div class="navbox2">
            <div class="buy-online">
                <span onclick="location.href='online.php'">BUY ONLINE</span>
            </div>
            <div class="search">
                <input type="text" placeholder="Search products, recipes">
            </div>
        </div>
        <a href="index.php"><i class="fa fa-home"style="font-size:35px; color: #e52129; margin-top:20px;"></i></a>
           </nav> 
   <main>
        <div class="container">
            <h2 style="background-color: #e63946; border-radius: 20px; height:50px; color: white;margin-top:10px;padding-top:10px;">Your Cart</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Item_Quantity</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    if(mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            $productTotal = $row['price'] * $row['item_quantity'];
                            $total += $productTotal;
                    ?>
                    <tr>
                        <td><img src="images/<?php echo $row['image']; ?>" alt="Product" width="50"></td>
                        <td><?php echo $row['name']; ?></td>
                        <td>RS. <?php echo $row['price']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td>
                            <form action="cart.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <input type="number" name="quantity" value="<?php echo $row['item_quantity']; ?>" min="1" style="width: 50px;">
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
                        echo "<tr><td colspan='7'>Your cart is empty</td></tr>";
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
                        <h4>follow us</h4>
                        <ul>
                        <div class="social-links">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a></ul>
                        </div>
                    <div class="footer-col">
                        <h4>company</h4>
                        <ul>
                            <li><a href="#">about us</a></li>
                            <li><a href="#">our services</a></li>
                            <li><a href="#">privacy policy</a></li>
                            <li><a href="#">affiliate program</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>get help</h4>
                        <ul>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">shipping</a></li>
                            <li><a href="#">returns</a></li>
                            <li><a href="#">order status</a></li>
                            <li><a href="#">payment options</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>online shop</h4>
                        <ul>
                            <li><a href="#">JAM</a></li>
                            <li><a href="#">SAUCE</a></li>
                            <li><a href="#">RECIPES</a></li>
                            <li><a href="#">PEANUT BUTTER</a></li>
                        </ul>
                    </div>
                   
                    </div>
                </div>
            </div>
 </footer>

</body>
<style>
        body {
    margin: 0;
    padding-top: 80px; /* Add padding to the top of the body to make space for the fixed nav */
}

nav {
    z-index: 1000;
    display: flex;
    position: fixed;
    top: 0; /* Make sure the nav stays at the top */
    left: 0;
    background-color: #fff;
    width: 100%;
    height: 80px;
    border-bottom: 4px solid #e52129;
    justify-content: space-between;
    color: #e52129;
    cursor: pointer;
    font-family: proxima-nova, sans-serif;
    font-size: 1.25rem;
    font-weight: 700;
    line-height: 1.44rem;
}



.hover-underline {
    text-decoration: none;
    position: relative;
    color:  #bd0d4c;
    font-size: 18px;
    font-weight: bold;
}

.hover-underline::after {
    content: '';
    position: absolute;
    width: 100%;
    height: 3px;
    bottom: -10px;
    left: 0;
    border-right: 3px;
    color:  #bd0d4c;
    background-color: #bd0d4c;
    transform: scaleX(0);
    transform-origin: bottom left;
    transition: transform 0.3s ease-in-out;
}

.hover-underline:hover::after {
    transform: scaleX(1);
    transform-origin: bottom left;
}

.navbox1{
    margin-left: 130px;
    display: flex;
    word-spacing: 40px;
    letter-spacing: -0.5;
}
.navbox1 .logo{
    padding-top: 5px;
}
.navbox1 .logo img{
    width: 100px;
    height: 55px;
}
.navbox1 .links {
    margin-left: 30px;
padding-top: 25px;
}
.navbox1 .links a{
   
    word-spacing: 0;
    text-decoration: none;
    color: #555;
}
.navbox2{
    
    display: flex;
    word-spacing: 36px; 
}
.buy-online{
    
    margin-top: 25px;
    color: #e52129;
    font-size: 1.125rem;
    line-height: 1.22rem;
    word-spacing: 0;
}
.navbox2 .search{
    margin-top: 20px;
    margin-left: 30px;
}
.navbox2 .search input[type="text"]{
    background-image: url('images/search.png' ) ;
    background-position: 5px 4px; 
    background-repeat: no-repeat;
    background-size: 25px 25px;
    padding: 12px 20px 12px 40px;
    height: 30px;
    font-size: small;
    border: transparent;
    border: 1px solid #55555588;
    border-radius: 3px;
}

nav {
    background-color: #fff;
    display: flex;
    justify-content: space-between;
    padding: 10px 20px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.navbox1, .navbox2 {
    display: flex;
    align-items: center;
}

.logo img {
    height: 40px;
}

.links {
    width:100%;
    display: flex;
    align-items: center;
    margin-left: 20px;
}

.links a {
    margin-right: 20px;
    text-decoration: none;
    color: #000;
    font-weight: bold;
    position: relative;
}

.links a:hover, .buy-online span:hover {
    color: #e63946;
}

.links a {
    /* ... other styles ... */
    transition: color 0.3s ease; /* Smooth color transition */
}

.links a:hover {
    color: #e63946;
}
.dropdown-content {
    /* ... other styles ... */
    width: 100%; /* Initial width matches parent */
    max-width: 1500px; /* Maximum width when open */
}
.dropdown-section {
    display: inline-block; /* Arrange sections horizontally */
    vertical-align: top;
    width:200px; /* Adjust width as needed for columns */
    margin-right: 1%; /* Add spacing between columns */
}


.buy-online span {
    cursor: pointer;
    font-weight: bold;
    color: #e63946;
}

.search input {
    padding: 5px 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

.dropdown {
    position: relative;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #fff;
    box-shadow: 0 8px 16px rgba(0,0,0,0.1);
    z-index: 1000;
    padding: 20px;
    top: 100%;
    left: 0;
}

.dropdown-content .dropdown-section {
    margin-bottom: 10px;
}
.dropdown-section {
    width:200px;
  
}

.dropdown-content h3 {
    margin: 0;
    margin-bottom: 5px;
    font-size: medium;
    color: #555;
    font-weight: bold;
    word-spacing: normal;
}

.dropdown-content a {
    color: #555;
    text-decoration: none;
    font-size: small;
    display: block;
    margin-bottom: 5px;
}

.dropdown-content a:hover {
 
    color: #e63946;
}

.dropdown:hover .dropdown-content {
    margin-top: 10px;
    width:1200px;
    display: block;
}

</style>
</html>
