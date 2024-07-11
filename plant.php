<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "aqua");
$count_cart = 0;
$fetch = "SELECT * FROM cart";
$count_cart = mysqli_num_rows(mysqli_query($conn, $fetch));
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST["add"])) {
   
    $name = $_POST['name'];
    $image = $_POST['image'];
   
    $price = $_POST['price'];
    $item_quantity = $_POST["item_quantity"];

    $query = "SELECT * FROM cart WHERE name='$name'";
    $res = mysqli_query($conn, $query);
    $count = mysqli_num_rows($res);

    
    $qur = "SELECT stock FROM plants WHERE name='$name'";
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
    $insert="INSERT INTO cart ( image,name,price,item_quantity) VALUES('$image','$name','Rs.$price','$item_quantity')";
    if(mysqli_query($conn, $insert)) {
        echo "<script>alert('Added to cart successfully')</script>";
        echo "<script>window.location.href='index.php';</script>";
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
    <title>Aquascape</title>
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
   <link  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
   <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="styles/products.css">
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
            <div class="cart"><i class="bi bi-cart4"></i></div>
        </nav>
    </header>
</div>
<div class="navi" >
    <div class="dropdown">
        <a href="#" class="hover-underline">All Categories</a>
        <div class="dropdown-content">
            <div class="dropdown-section">
                <a href="index.php">HOME</a>
                <a href="plant.php" style="color: #30694B; text-decoration:underline;">Aquatic Plants</a>
                <a href="fish.php">Fishes</a>
                <a href="#">Aquarium Substrate</a>
                <a href="accessories.php">Aquarium Accessories</a>
                <a href="#">Fish Food</a>
                <a href="#">Tissue Culture Aquatic Plant</a>
                <a href="#">Aquarium Built</a>
            </div>
        </div>
    </div>
    <div class="dropdown">
        <a href="fish.php" class="hover-underline">Aquatic Plants</a>
        <div class="dropdown-content">
            <div class="dropdown-section">
                <h3>Difficulty</h3>
                <a href="#">Easy</a>
                <a href="#">Medium</a>
                <a href="#">Advance</a>
            </div>
            <div class="dropdown-section">
                <h3>Light Condition</h3>
                <a href="#">Low</a>
                <a href="#">Medium</a>
                <a href="#">Bright</a>
            </div>
            <div class="dropdown-section">
                <h3>Plant Type</h3>
                <a href="#">Runners</a>
                <a href="#">Moss</a>
                <a href="#">Rhizome</a>
                <a href="#">Stem</a>
                <a href="#">Rosette</a>
                <a href="#">Floating Plants</a>
            </div>
        </div>
    </div>
    <div class="dropdown">
        <a href="fish.php" class="hover-underline">Fishes</a>
        <div class="dropdown-content">
            <div class="dropdown-section">
                <h3>Size</h3>
                <a href="#">Small</a>
                <a href="#">Medium</a>
                <a href="#">Large</a>
            </div>
            <div class="dropdown-section">
                <h3>Light Condition</h3>
                <a href="#">Low</a>
                <a href="#">Medium</a>
                <a href="#">Bright</a>
            </div>
            <div class="dropdown-section">
                <h3>Fish Type</h3>
                <a href="#">Guppies</a>
                <a href="#">Bettas</a>
                <a href="#">Gold Fishes</a>
                <a href="#">Shrimps</a>
                <a href="#">Reptiles</a>
                <a href="#">Sharks</a>
                <a href="#">Tetras</a>
            </div>
        </div>
    </div>
    <div class="dropdown">
        <a href="accessories.php" class="hover-underline">Aquatic Accessories</a>
        <div class="dropdown-content">
            <div class="dropdown-section">
                <h3>Accessories</h3>
                <a href="#">Filter</a>
                <a href="#">Heater</a>
                <a href="#">Lights</a>
                <a href="#">Medicine</a>
                <a href="#">Cleaning Objects</a>
                <a href="#">Aquatic Landscape</a>
            </div>
        </div>
    </div>
    <div class="dropdown">
        <a href="background.php" class="hover-underline">Background</a>
        <div class="dropdown-content">
            <div class="dropdown-section">
                <h3>Background</h3>
                <a href="#">Volcano</a>
                <a href="#">Corals</a>
                <a href="#">Caves</a>
                <a href="#">Drift Woods</a>
                <a href="#">Castles</a>
                <a href="#">Images</a>
            </div>
        </div>
    </div>
</div>
  <div class="container-fluid">
    <div class="left">
    <div class="plant-content">
            <div class="plant-section">
                <h3>DIFFICULTY</h3>
                <li><a href="#">Easy</a></li>
                <li> <a href="#">Medium</a></li>
                <li><a href="#">Advance</a></li>
                <br>
                <h3>LIGHT CONDITION</h3>
                <li><a href="#">Low</a></li>
                <li><a href="#">Medium</a></li>
                <li><a href="#">Bright</a></li>
            <br>
            
                <h3>PLANT TYPE</h3>
                <li><a href="#">Runners</a></li>
                <li><a href="#">Moss</a></li>
                <li><a href="#">Rhizome</a></li>
                <li><a href="#">Stem</a></li>
                <li><a href="#">Rosette</a></li>
                <li><a href="#">Floating Plants</a></li>
            <br>
            <h3>COLORATION</h3>
            <li>Brownisg</li>
            <li>Dark Green</li>
            <li>Green</li>
            <li>Light Green</li>
            <li>Red</li>

            <br>
            <h3>AREA</h3>
            <li>ForeGround</li>
            <li>MidGround</li>
            <li>Background</li>

    
        </div>
    </div>
  </div> 
  <div class="right">
        <div class="top-image"><img src="images/top-image.jpg" alt=""></div>
        <div class="aquatic-plants">
    <h2 style="text-align: center;margin-bottom:20px;margin-top:20px">Aquatic Plants</h2>
    <div class="ap-container">
    <div class="you-may-also-like-container" style="margin-left: 100px;margin-right:100px;">
    <?php
    $query = "SELECT * FROM plants ";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) { ?>
            <form action="index.php" method="post">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
                <input type="hidden" name="image" value="<?php echo $row['image']; ?>">
                <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                
                <div class="inner-box">
                    <img src="images/plants/<?php echo $row["image"]; ?>" alt=""><br><br>
                    <span style="color:#DBDBDB;">═══════════════</span>
                        <span><h5><?php echo $row["name"]; ?></h5></span>
                        <div class="inner-lower-box">
                        <span><h5>Rs.<?php echo $row["price"]; ?></h5></span>
                        <input type="number" name="item_quantity" value="1"min="1" style="width: 100px;"><br>
                        <button class="inner-box-add-to-cart" type="submit"  name="add">Add to cart</button>
                        </div>
                </div>
            </form>
            <?php }
    }
    ?>
    
</div>
    </div>

</div>
<hr style="width: 100%;margin-left:5px; margin-right: 5px;">
<p style="text-indent: 50px;font-size:15px;color:#AEAEAE; margin-left: 20px;">
        Aquarium Plants are a real attraction to the aquarium tank. 
        They provide optimal habitat for the fishes especially for the fry( baby fishes). 
        It maintains the ecosystem of the aquarium tanks by providing good oxygen, food and also act as a good hiding place for the baby fish. 
        Always try to choose plants that will suit with the type of fish that you are planning to have, because some aquarium fish tend to destroy the plants.
         Mostly all aquatic plants are very easy to grow and care.
         They are always good for gold fish and other similar fishes. There is a huge variety of plants. You will be able to buy some of the commonly seen aquarium plants in India here.
         Also get wholesale rates when you purchase in bulk quantities. Buy aquarium plants online.</p>

    </div>
  </div>
  <div class="reviews-section">
        <h2>Customer Reviews</h2>
        <div class="reviews-container">
            <div class="over-cover">
            <div class="review-card">
                <div class="review-content">
                    <p>Received the aquatic plants in excellent condition. Quality and delivery service exceptionally good. Definitely going to order other products and will recommend to everybody. with regards and best wishes, anandaraj.</p>
                </div>
                <div class="review-author">
                    <p><strong>ANANDARAJ CHATTERJEE</strong></p>
                </div>
            </div></div>
            <div class="over-cover">
            <div class="review-card">
                <div class="review-content">
                    <p>I used to order plants (mainly Amazon Swords) frequently from bunnycart. The packaging was great. But the plants seems to be not upto the mark with holes or damaged leaves. Please try to send the plants which are in good condition.</p>
                </div>
                <div class="review-author">
                    <p><strong>Manoj</strong></p>
                </div>
            </div></div>
            <div class="over-cover">
            <div class="review-card">
                <div class="review-content">
                    <p>You guys rockzzzzzz. Very pleased with the response I got today from bunnycart help desk and aquarium consultant. From now Bunnycart is my first choice to buy aquarium related things. Very innovative idea... keep doing great.</p>
                </div>
                <div class="review-author">
                    <p><strong>Paranji Gowtham</strong></p>
                </div>
            </div></div>
        </div>
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
<script>

    function scrollToTop() {
  window.scrollTo({
    top: 0,
    behavior: 'smooth'
  });
}


window.onscroll = function() {
  const scrollButton = document.querySelector('.scroll-to-top');
  if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
    scrollButton.style.display = 'block';
  } else {
    scrollButton.style.display = 'none';
  }
};

</script>
</html>