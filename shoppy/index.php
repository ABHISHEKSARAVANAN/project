<?php
    $conn=mysqli_connect("localhost","root","","website");
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astha's Shopping</title>
    <link rel="stylesheet" href="carosal.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  
  <nav class="navlist">
    <div class="logo"> <img src="logo.png" alt=""></div>
      <ul>
         <li><a href="vegetables.html">Vegetables</a></li>
         <li><a href="fruits.html">Fruits</a></li>
         <li><a href="meat.html">Meat</a></li>
         <li><a href="fish.html">Fish</a></li>
         <li><a href="DryFruits.html">DryFruits</a></li>
         <li><a href="oil.html">Oil</a></li>
         <li><a href="flour.html">Flour</a></li>
         <li><input type="text" placeholder="search on shoppy"></li>
         <li><div class="login">
             <button onclick="location.href='register.php'">Login</button>
          </div></li>
      </ul>  
  </nav>


<div class="overall"> 
    <div class="left">
        <img src="offer.png" alt="">
    </div>
  
    <div class="container">
      <div class="innerbox">
        <img src="veg.jpg" >
        <img src="fish.jpeg" >
        <img src="flour.jpg" >
        <img src="nonveg.jpeg" >
      </div>
    </div> 
  
   <div class="grid-container">
        <h2>Catogories</h2>
        <div class="row">
          <div class="column">
            <a href=""><img src="veg.jpg" alt=""></a>
          <a href="">Vegetables</a>
          </div>
          <div class="column">
            <a href=""><img src="fish.jpeg" alt=""></a>
          <a href="">Fish</a>
          </div>
          <div class="column">
            <a href=""><img src="fruit.jpg" alt=""></a>
          <a href="">Fruit</a>
          </div>
        </div>
        <div class="row">
            <div class="column">
              <a href=""><img src="nonveg.jpeg" alt=""></a>
            <a href="">Meat</a>
            </div>
            <div class="column">
              <a href=""><img src="flour.jpg" alt=""></a>
            <a href="">Flour</a>
            </div>
            <div class="column">
              <a href=""><img src="cereals.jpg" alt=""></a>
            <a href="">cereals</a>
            </div>   
          </div>
          <div class="row">
            <div class="column">
              <a href=""><img src="dry fruits.jpg" alt=""></a>
            <a href="">Dry Fruits</a>
            </div>
            <div class="column">
              <a href=""><img src="spice.jpg" alt=""></a>
            <a href="">Spice</a>
            </div>
            <div class="column">
              <a href=""><img src="snacks.jpg" alt=""></a>
            <a href="">Snacks</a>
            </div>   
          </div>
   </div>
  </div>

    <div class="lower-grid">
      <table class="table" >
    <?php
  $query="SELECT * FROM corosal";
  $result=$conn->query($query);
    while($row =$result->fetch_assoc()){                
?>   
<td >
    <td><img src="images/<?php echo $row['image']; ?> " ><input type="text" class="box" value="<?php echo $row['product']?>" ></td>
</td>


<?php } ?>
</table>
    </div>
 <footer class="footer">
            <div class="footer-container">
                <div class="row">
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
                            <li><a href="#">watch</a></li>
                            <li><a href="#">bag</a></li>
                            <li><a href="#">shoes</a></li>
                            <li><a href="#">dress</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>follow us</h4>
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