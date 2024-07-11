<?php
$conn=mysqli_connect("localhost","root","","kissan");

$total = 0;

$query = "SELECT price, item_quantity FROM cart";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $total += $row['price'] * $row['item_quantity'];
}

  
if(isset($_POST["submit"])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phno     = $_POST['phno'];
  $address = $_POST['address'];
  $state = $_POST['state'];
    
// Fetch all items in the cart
    $qur = "SELECT * FROM cart";
    $res = mysqli_query($conn, $qur);
    
            
   while ($row = mysqli_fetch_assoc($res)) {
    $name = $row['name'];
    $item_quantity = $row['item_quantity'];

    
    // Update the quantity in the products table
     $update_query = "UPDATE mixedjam SET stock = stock - $item_quantity WHERE name = '$name'";     
     mysqli_query($conn, $update_query);
    
 
  
// Clear the cart after purchase
      $clear_cart = "DELETE FROM cart";
      mysqli_query($conn, $clear_cart);            
      echo "<script>alert('Purchase successful!');</script>";
      echo "<script>window.location.href='index.php'</script>";
    
            
$query = "INSERT INTO userdetails (name,email, phno, address, state,total) VALUES ('$name', '$email', '$phno', '$address', '$state','$total')";
   mysqli_query($conn,$query);
 
mysqli_close($conn);
   }
  
}
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="check.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check - Out</title>
</head>
<body >
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
                        <a href="orange.php">Orange Marmalade</a>
                        <a href="mango.php">Mango Jam</a>
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
    <a href="cart.php"><i class="fa fa-shopping-cart" style="font-size:35px; color: #e52129; margin-top:20px;"></i></a>
</nav>
<div class="container" style="margin-top:100px;">
<div class="title">Check-Out</div>
<form class="" action="" method="post" autocomplete="off">
  <div class="user-details" >
    <div class="input-box">
      <span class="details">Full Name : </span>
      <input class="textbox" type="text" name="name" placeholder="Enter Your Name" required>
    </div>
    <div class="input-box">
      <span class="details">Email : </span>
      <input class="textbox" type="text" name="email" placeholder="Enter Your Email" required>
    </div>
    <div class="input-box">
      <span class="details">Phone Number : </span>
      <input class="textbox" type="number" name="phno" placeholder="Enter Your ph Number" required>
    </div>
    <div class="input-box">
      <span class="details">Address:</span>
      <input class="textbox" type="text" name="address" placeholder="Enter Your address" required>
    </div>
    <div class="input-box">
      <span class="details">State : </span>
      <input class="textbox" type="text" name="state" placeholder="Enter your State" required>
    </div>
    <div class="input-box">
      <span><h3 style="margin-top: 35px;">Total: RS. <?php echo number_format($total, 2); ?></h3></span>
          </div>
    <button class="register" type="submit" name="submit">Check-Out</button>
    <button class="register" type="button" onclick="location.href='cart.php'" >Back</button>
    
  
</form>
</div>

</body>

<style>
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
</style>
</html>