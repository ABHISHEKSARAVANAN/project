<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "kissan");
$count_cart = 0;
$fetch = "SELECT * FROM cart";
$count_cart = mysqli_num_rows(mysqli_query($conn, $fetch));
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST["add"])) {
   
    $name = $_POST['name'];
    $image = $_POST['image'];
    $quantity = $_POST["quantity"];
    $price = $_POST['price'];
    $item_quantity = $_POST["item_quantity"];

    $query = "SELECT * FROM cart WHERE name='$name'";
    $res = mysqli_query($conn, $query);
    $count = mysqli_num_rows($res);

    // Get the product's available quantity from the parts table
    $qur = "SELECT stock FROM mixedjam WHERE name='$name'";
    $re = mysqli_query($conn, $qur);
    $row = mysqli_fetch_assoc($re);
    $stock = $row['stock'];
    if ($stock <= 0) {
        echo "<script>alert('Out of stock');</script>";
    } 
    else if($stock< $item_quantity){
        echo "<script>alert('Your order exceed our stock, sorry for inconvenience');</script>";
    }
else{
    if ($count > 0) {
        echo "<script>alert('Product is already available in your cart');</script>";
        echo "<script>window.location.href='index.php';</script>";
    }
    else{
    $insert="INSERT INTO cart ( image,name,quantity,price,item_quantity) VALUES('$image','$name','$quantity','$price','$item_quantity')";
    if(mysqli_query($conn, $insert)) {
        echo "<script>alert('Added to cart successfully')</script>";
    }
}
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kissan</title>
    <link rel="icon" type="image/x-icon" href="images/kissan-logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="mixed-fruit-jam.css">
</head>
<body>
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
                        <a href="Mixed Fruit Jam.php">Mixed Fruit Jam</a>
                        <a href="pineapple.php">Pineapple Jam</a>
                        <a href="orange.php" style="color: #e63946; text-decoration:underline;">Orange Marmalade</a>
                        <a href="mango.php" >Mango Jam</a>
                    </div>
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
                        <a href="#">Dinner Recipes</a>
                    </div>
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
    <a href="index.php"><i class="fa fa-home" style="font-size:35px; color: #e52129; margin-top:20px;"></i></a>
    <a href="cart.php"><i class="fa fa-shopping-cart" style="font-size:35px; color: #e52129; margin-top:20px;"></i>
    <span class="cart-count" style="font-size:20px; color: #e52129;"><?php echo $count_cart; ?></span></a>
</nav>
<a href="index.php" style="margin-left: 150px;color:#555;font-weight:bold;">Home</a>&nbsp;/&nbsp;<a href="all.php" style="color:#555;font-weight:bold;">All products</a>
<div class="container">
    <div class="inner-container">
        <div class="jam-pic">
            <?php
            $query = "SELECT image FROM mixedjam WHERE name='Orange Marmalade'";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = $result->fetch_assoc()) { ?>
                    <img src="images/<?php echo $row["image"]; ?>" alt="">
                <?php }
            }
            ?>
        </div>
        <div class="content">
            <?php
            $query = "SELECT * FROM mixedjam WHERE name='Orange Marmalade'";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = $result->fetch_assoc()) { ?>
                    <form action="Mixed Fruit Jam.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
                        <input type="hidden" name="image" value="<?php echo $row['image']; ?>">
                        <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                        <input type="hidden" name="quantity" value="<?php echo $row['quantity']; ?>">
                        <div class="heading"><span><h2><?php echo $row["name"]; ?></h2></span></div>
                        <div class="quantity"><span><h3><?php echo $row["quantity"]; ?></h3></span></div>
                        <div class="description">
                            <span><?php echo $row["description"]; ?></span>
                        </div>
                        <div class="buy">
                            <div class="price" style="margin-top: 10px;color:black;"><span><h4>Rs.<?php echo $row["price"]; ?></h4></span></div>
                            <input type="number" name="item_quantity" value="1"min="1" style="width: 100px;">
                            <button style=" margin-top: 20px;" class="add-to-cart" type="submit" name="add">Add to cart</button>
                        </div>
                    </form>
                <?php }
            }
            ?>
        </div>
    </div>
</div>
<div class="our-story"><h2>YOU MAY ALSO LIKE</h2></div>
<div class="you-may-also-like-container">
    <?php
    $query = "SELECT * FROM mixedjam WHERE id in (1, 3, 4)";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) { ?>
            <form action="Mixed Fruit Jam.php" method="post">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
                <input type="hidden" name="image" value="<?php echo $row['image']; ?>">
                <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                <input type="hidden" name="quantity" value="<?php echo $row['quantity']; ?>">
                <div class="inner-box">
                    <img src="images/<?php echo $row["image"]; ?>" alt="">
                    
                        <span><h4><?php echo $row["name"]; ?></h4></span>
                        <div class="inner-lower-box">
                        <span><h5>Rs.<?php echo $row["price"]; ?></h5></span>
                        <input type="number" name="item_quantity" value="1"min="1" style="width: 100px;"><br>
                        <button class="inner-box-add-to-cart" type="submit" name="add">Add to cart</button>
                        </div>
                </div>
            </form>
        <?php }
    }
    ?>
</div>
    <button class="scroll-to-top" onclick="scrollToTop()">&#10094;</button>

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
<script>
    function scrollToTop() {
  window.scrollTo({
    top: 0,
    behavior: 'smooth'
  });
}

</script>
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

.jam-pic {
    position: relative;
    max-height: 800px;
  
}

.jam-pic img {
    margin-top: 10px;
   margin-left: 100px;
    width: 400px;
    height: 400px;
   
}

.container {
   width: 100%;
}

.inner-container {
    margin-top: 80px;
    display: flex;
     /* Adjusts spacing between child elements */
    align-items: flex-start;
    width: 100%;
    height: 500px;

}
.quantity h3{
    font-family: proxima-nova, sans-serif;
    font-style: normal;
    color: #555;
}
.price h4{
    font-family: proxima-nova, sans-serif;
    font-style: normal;
    color: #555;
}
.heading h2{
    
    text-align: left;
    display: block;
    margin-block-start: 0.83em;
    margin-block-end: 0.83em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    font-weight: bold;
    font-family: proxima-nova, sans-serif;
    font-style: normal;
    font-weight: 700;
    font-size: 3rem;
    line-height: 3.375rem;
    color: #555;
}

.content {
    margin-left: 50px;
    position: relative;
    
}

.description {
    width: 450px;
    
    color: #555;
    font-size: 1.125rem;
    line-height: 1.5;
    padding-top: 30px;
    text-transform: inherit;
    font-family: proxima-nova, sans-serif;
    font-style: normal;
    font-weight: 400;
}
.inner-box-add-to-cart{
    margin-top: 10px;
    font-family: proxima-nova, sans-serif;
    line-height: 1;
    background-color: #e52129;
    border: none;
    border-radius: 3px;
    font-weight: bold;
    color: #fff;
    cursor: pointer;
    font-size: 1rem;
    justify-content: left;
    line-height: 1rem;
    max-width: 150px;
    min-width: 100px;
    height:30px;
    position: relative;
    text-align: center;
    text-transform: uppercase

}
.inner-lower-box{
    justify-content: left;
}
.add-to-cart{
   
    font-family: proxima-nova, sans-serif;
    display: block;
    unicode-bidi: isolate;
    -webkit-text-size-adjust: 100%;
    line-height: 1.15;
    -webkit-box-pack: left;
    -ms-flex-pack: left;
    background-color: #e52129;
    border: none;
    border-radius: 3px;
    font-weight: bold;
    color: #fff;
    cursor: pointer;
    font-size: 1.125rem;
    justify-content: left;
    line-height: 1.22rem;
    max-width: 200px;
    min-width: 150px;
    padding: 17px 16px;
    position: relative;
    text-align: center;
    text-transform: uppercase
}
.our-story h2{
    text-align: center;
    display: block;
    margin-block-start: 0.83em;
    margin-block-end: 0.83em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    font-weight: bold;
    unicode-bidi: isolate;
    font-family: proxima-nova, sans-serif;
    font-style: normal;
    font-weight: 700;
    font-size: 3rem;
    line-height: 3.375rem;
    color: #555;
  }
  .you-may-also-like-container{
    margin-bottom: 10px;
    display: flex;
    justify-content: space-evenly;
  }
.inner-box{
    max-height: 800px;
    width: 400px;
    justify-content: center;
    text-align: center;
    
}
.inner-box img{
   
    width: 80%;
    height: 80%;
}
.inner-box h3{
    color: #555;
    font-size: 1.125rem;
    line-height: 1.5;
    padding-top: 10px;
    text-transform: inherit;
    font-family: proxima-nova, sans-serif;
    font-style: normal;
    font-weight: 400;
}
.scroll-to-top {
    text-align: center;
    position: fixed;
    bottom: 20px;
    right: 20px;
    height: 40px;
    width: 40px;
    background-color: red;
    color: white;
    border: none;
    border-radius: 50%;
    padding-bottom: 3px;
    cursor: pointer;
    display: none; /* Hidden by default */
    transform: rotate(90deg);
    font-size: 20px;
    font-weight: bolder;
    z-index: 1000; /* Ensure it's above other elements */
  }

  .scroll-to-top:hover,.scroll-to-top:active,.scroll-to-top:focus{
    -webkit-transform: scale(1.3);
    transform: scale(1.3)!important;
    transition-duration: 0.3s;
    
  }

   
  .footer-container{
    max-width: 1170px;
    margin:auto;
}
.lower-grid .box{
  margin-top: 5px;
}
.footer .row{
    display: flex;
    flex-wrap: wrap;
}
.footer ul{
    list-style: none;
}
.footer{
  
    background-color: #24262b;
    padding: 70px 0;
}
.footer-col{
   width: 25%;
   padding: 0 15px;
}
.footer-col h4{
    font-size: 18px;
    color: #ffffff;
    text-transform: capitalize;
    margin-bottom: 35px;
    font-weight: 500;
    position: relative;
}
.footer-col h4::before{
    content: '';
    position: absolute;
    left:0;
    bottom: -10px;
    background-color: #e91e63;
    height: 2px;
    box-sizing: border-box;
    width: 50px;
}
.footer-col ul li:not(:last-child){
    margin-bottom: 10px;
}
.footer-col ul li a{
    font-size: 16px;
    text-transform: capitalize;
    color: #ffffff;
    text-decoration: none;
    font-weight: 300;
    color: #bbbbbb;
    display: block;
    transition: all 0.3s ease;
}
.footer-col ul li a:hover{
    color: #ffffff;
    padding-left: 8px;
}
.footer-col .social-links a{
    display: inline-block;
    height: 40px;
    width: 40px;
    background-color: rgba(255,255,255,0.2);
    margin:0 10px 10px 0;
    text-align: center;
    line-height: 40px;
    border-radius: 50%;
    color: #ffffff;
    transition: all 0.5s ease;
}
.footer-col .social-links a:hover{
    color: #24262b;
    background-color: #ffffff;
}
.navbox2 a{
    text-decoration: none;
    color:#e63946;
}
</style>
</html>