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

    // Get the product's available quantity from the parts table
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
    $insert="INSERT INTO cart ( image,name,price,item_quantity) VALUES('$image','$name','$price','$item_quantity')";
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
   <link rel="stylesheet" href="styles/styles.css">
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
<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/carousel1.jpg" class="d-block w-100" >
    </div>
    <div class="carousel-item">
      <img src="images/carousel2.jpg" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="images/crousel3.jpg" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="images/carousel4.jpg" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="images/carousel5.jpg" class="d-block w-100">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev" >
    <span class="carousel-control-prev-icon" aria-hidden="true" ></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


<div class="navi" >
    <div class="dropdown">
        <a href="#" class="hover-underline">All Categories</a>
        <div class="dropdown-content">
            <div class="dropdown-section">
                <a href="#">HOME</a>
                <a href="plant.php">Aquatic Plants</a>
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

<div class="grid-container">
        <div class="grid-item">
            <img src="images/grid1.jpg" alt="Tissue Culture"><br>
            <img style="height:385px" src="images/grid4.jpg" alt="Aquarium Fish">
        </div>
        <div class="grid-item">
            <img src="images/grid2.jpg" alt="Aquarium Substrate"><br>
            <img src="images/grid5.jpg" alt="Pet Store Owner" style="height:300px">
            
        </div>
        <div class="grid-item">
            <img src="images/grid3.jpg" alt="Aquatic Plants">
            
        </div>
        
       
        </div>
    </div>
<div class="aquatic-plants">
    <h2 style="text-align: center;margin-bottom:20px;margin-top:20px">Aquatic Plants</h2>
    <div class="ap-container">
    <div class="you-may-also-like-container" style="margin-left: 100px;margin-right:100px;">
    <?php
    $query = "SELECT * FROM plants LIMIT 8";
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
  
<div class="new-arival" style="background-color: #DBDBDB;">

        <h2>New Arivals</h2>
        <div class="inner-box"style="background-color:#F3F3F3">
            <button class="carousel2-control prev" onclick="prevSlide()">&#10094;</button>
            <div class="carousel2">
                <div class="carousel2-inner"style="gap:10px;">
                <?php
    $query = "SELECT * FROM plants LIMIT 8";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) { ?>
                    <div class="carousel2-item"><img src="images/plants/<?php echo $row['image'];?>" >
                    <span style="color:#DBDBDB;">═══════════════</span>
                     <div class="carousel2-item-name"><?php echo $row['name'];?></span><br><br>
                    <span>Rs.<?php echo $row['price'];?></span></div></div>
                    <?php }
    }
    ?>
                </div>
            </div>
            <button class="carousel2-control next" onclick="nextSlide()">&#10095;</button>
          
        </div>
    </div>
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
    let currentIndex = 0;

function showSlide(index) {
  const slides = document.querySelectorAll('.carousel2-item');
  const totalSlides = slides.length;
  const visibleSlides = 4;

  if (index >= totalSlides - visibleSlides + 1) {
    currentIndex = totalSlides - visibleSlides;
  } else if (index < 0) {
    currentIndex = 0;
  } else {
    currentIndex = index;
  }

  const offset = -currentIndex * (100 / visibleSlides);
  document.querySelector('.carousel2-inner').style.transform = `translateX(${offset}%)`;
}

function nextSlide() {
  showSlide(currentIndex + 1);
}

function prevSlide() {
  showSlide(currentIndex - 1);
}
showSlide(currentIndex);
</script>
</html>