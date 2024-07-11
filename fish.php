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

    
    $qur = "SELECT stock FROM fish WHERE name='$name'";
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
        echo "<script>window.location.href='fish.php';</script>";
    }
    else{
    $insert="INSERT INTO cart ( image,name,price,item_quantity) VALUES('$image','$name','Rs.$price','$item_quantity')";
    if(mysqli_query($conn, $insert)) {
        echo "<script>alert('Added to cart successfully')</script>";
        echo "<script>window.location.href='fish.php';</script>";
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
                <a href="plant.php" >Aquatic Plants</a>
                <a href="fish.php" style="color: #30694B; text-decoration:underline;">Fishes</a>
                <a href="#">Aquarium Substrate</a>
                <a href="accessories.php">Aquarium Accessories</a>
                <a href="#">Fish Food</a>
                <a href="#">Tissue Culture Aquatic Plant</a>
                <a href="#">Aquarium Built</a>
            </div>
        </div>
    </div>
    <div class="dropdown">
        <a href="plant.php" class="hover-underline">Aquatic Plants</a>
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
        <a href="backgrund.php" class="hover-underline">Background</a>
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
    <div class="left" style="height:850px">
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
            
                <h3>FISH TYPE</h3>
                <li><a href="#">Bettas</a></li>
                <li><a href="#">Guppies</a></li>
                <li><a href="#">Tetras</a></li>
                <li><a href="#">Sword Tails</a></li>
                <li><a href="#">Shrimps</a></li>
                <li><a href="#"> Reptiles</a></li>
            <br>
            <h3>COLORATION</h3>
            <li>Brownish</li>
            <li>Black</li>
            <li>Green</li>
            <li>Yellow</li>
            <li>Red</li>
            <li>Gold</li>
            <li>Hybrid</li>
            <li>Blue</li>

            <br>
            <h3>SIZE</h3>
            <li>Small Fishes</li>
            <li>Medium Fishes</li>
            <li>Large Fishes</li>

    
        </div>
    </div>
  </div> 
  <div class="right">
        <div class="top-image"><img src="images/carousel1.jpg" alt=""></div>
        <div class="aquatic-plants">
    <h2 style="text-align: center;margin-bottom:20px;margin-top:20px">Exotic Fishes</h2>
    <div class="ap-container">
    <div class="you-may-also-like-container" style="margin-left: 100px;margin-right:100px;">
    <?php
    $query = "SELECT * FROM fish ";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) { ?>
            <form action="fish.php" method="post">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
                <input type="hidden" name="image" value="<?php echo $row['image']; ?>">
                <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                
                <div class="inner-box">
                    <img  src="images/fish/<?php echo $row["image"]; ?>" alt=""><br><br>
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
Aquarium fishes are a true attraction for our eyes. Fishkeeping is an entertaining hobby of having aquarium at home.
 Aquarists are the people who have the fishkeeping as their hobby. Even small Pet stores sell a variety of freshwater
  fishes such as Goldfish, Angelfish, Guppies, Neon tetra, Betta Fish, Platy, and Gourami, Mollies etc. Feel free to buy 
  fishes at the lowest rates available online.</p>

    </div>
  </div>
  <div class="reviews-section">
        <h2>Customer Reviews</h2>
        <div class="reviews-container">
            <div class="over-cover">
            <div class="review-card">
                <div class="review-content">
                    <p>Cardinals are my favourite, thank you so much for helping us to maintain our hobby even staying 1000 kms away from Bangalore.thank you so much for helping us to maintain our hobby even staying 1000 kms away from Bangalore.</p>
                </div>
                <div class="review-author">
                    <p><strong>ANITHA KUMARAN</strong></p>
                </div>
            </div></div>
            <div class="over-cover">
            <div class="review-card">
                <div class="review-content">
                    <p>I am a bignner fir aquarium hobby but the fish health and the rate really did push me more further to keep buying more.
Waiting for my first shrimp delivery.
I am very happy with the services.I an very happy with the delivery also, Thank you </p></div>
                <div class="review-author">
                    <p><strong>Rahul Ashis</strong></p>
                </div>
            </div></div>
            <div class="over-cover">
            <div class="review-card">
                <div class="review-content">
                    <p>The order was very promptly delivered, neatly packed and arrived without any damage or deaths. The shrimps have been very active. loved the redressal system of best4pets, they answered all my questions and cleared my doubts. </p></div>
                <div class="review-author">
                    <p><strong>Megna Surya</strong></p>
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