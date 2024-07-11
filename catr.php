<?php
$conn = mysqli_connect("localhost", "root", "", "aqua");

// Update quantity in the cart
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $quantity = $_POST['quantity'];
    $name=$_POST['name'];
    
    $check= "SELECT stock FROM plants where name='$name'";
    $result = mysqli_query($conn, $check);

while ($row = mysqli_fetch_assoc($result)) {

}
    $sql = "UPDATE cart SET item_quantity='$quantity' WHERE id='$id'";
    mysqli_query($conn, $sql);

    echo "<script>window.location.href='catr.php'</script>";
}

// Remove item from the cart
if (isset($_POST['remove'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM cart WHERE id='$id'";
    mysqli_query($conn, $sql);

    echo "<script>window.location.href='catr.php'</script>";
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

    <title>Cart</title>
</head>
<body>
<div class="whole-navigation" >
    <header class="main-header">
        <nav>
            <div class="logo">
                <img src="images/logo1.png" alt="">
            </div>
            <div class="links">
                <a href="index.php">HOME</a>
                <a href="login.php">SIGN IN</a>
                <a href="about.php">ABOUT US</a>
                <a href="contact.php">CONTACT US</a>
                <a href="faq.php">FAQ</a>
            </div>
            <div class="search">
                <input type="text"  placeholder="Search here" >
            </div>
            <div class="cart"><a href="catr.php"><i class="bi bi-cart4"></i></a></div>
        </nav>
    </header>
</div>


   <main>
        <div class="container">
            <h2 style=" color: #30694B;margin-top:10px;padding-top:10px;">Your Cart</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Name</th>
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
                            $productTotal = $row['price'] * $row['item_quantity'];
                            $total += $productTotal;
                    ?>
                    <tr>
                        <td><img src="images/<?php echo $row['image']; ?>" alt="Product" width="50"></td>
                        <td><?php echo $row['name']; ?></td>
                        <td>RS. <?php echo $row['price']; ?></td>
                        
                        <td>
                            <form action="catr.php" method="post">
                                <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <input type="number" name="quantity" value="<?php echo $row['item_quantity']; ?>" min="1" style="width: 50px;">
                                <button type="submit" name="update">Update</button>
                            </form>
                        </td>
                        <td>RS. <?php echo $productTotal; ?></td>
                        <td>
                            <form action="catr.php" method="post">
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
                            <li><a href="#">Fishes</a></li>
                            <li><a href="#">Plants</a></li>
                            <li><a href="#">Reptiles</a></li>
                            <li><a href="#">Aquarium built</a></li>
                        </ul>
                    </div>
                   
                    </div>
                </div>
            </div>
            <span class="footer-reserved">Copyright 2024 © Aquascape. All Rights Reserved. Aquascape Trade Mark is registered.</span>
 </footer>


</body>
<style>
body{
    top:0;
    box-sizing: border-box;
    margin: 0;
    font-family: sans-serif;
}
.main-header{
    background-color: rgb(13, 15, 38);
    width: 100%;
    height: 80px;
    }
nav{
    display: flex;
    justify-content:space-around;
}
nav .logo{
    height: 80px;
    width: 15%;
}
.logo img{
    width: 150px;
    height: 80px;
    border: none;
    
}
.links{
    width: 50%;
    display: flex;
    justify-content: space-evenly;
    padding-top: 30px;

    
}
.links a{
    text-decoration: none;
    color: aliceblue;
    font-size: 1.25rem;
}
.links a:hover,.links a:active,.links a:focus{
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
    transition-duration: 0.3s;  
}
.cart{
    align-content: center;
    font-size: xx-large;
    width: 100px;
    color: white;
}
.search{
    width: 20%; 
    align-content: space-evenly;
    margin-right: 20px;
}
.search input{
    width: 200px;
    height: 25px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
  background-color: white;
  background-image: url('search.svg');
  background-position: 170px ; 
  background-repeat: no-repeat;
 padding-left: 5px;
}
.search button{
 border: none;
}

.container {
    max-width: 1000px;
    min-height: 600px;
    margin: 50px auto;
    padding: 20px;
    background-color: #ffffff59;
    
    border: 2px solid  #30694B;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {

    text-align: center;
    margin-bottom: 5px;
    
}

.table {
    border-radius: 10px;
    width: 100%;
    border: none;
    border-collapse: collapse;
    margin-bottom: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.377);
    overflow: hidden;
}

.table th, .table td {
    padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
}

.table th {
    background-color:  #30694B;
    color: white;
}

.table td img {
    width: 50px;
    height: auto;
}

.total {
    text-align: right;
    margin-top: 20px;
    font-size: 1.2em;
    font-weight: bold;
}
.checkout:hover,.checkout:active,.Checkout:focus{
    box-shadow:0 0 10px rgb(0, 0,0.5);
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
    transition-duration: 0.3s;
}

button {
    padding: 5px 10px;
    border: none;
    background-color: #30694B;
    color: white;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color:#bbbbbb;
    color:  #30694B;
}
 

.footer-container{
    max-width: 1170px;
    margin:auto;
    background-color: rgba(57, 160, 91, 0.363);
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
  
    background-color:#30694B ;
    padding-top: 70px;
    padding-bottom: 20px;
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
.footer-reserved{
   margin-left: 50px;
    color: white;
    font-size: x-small;
}

</style>
</html>
