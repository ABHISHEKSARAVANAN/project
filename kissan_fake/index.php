<?php
$conn=mysqli_connect("localhost","root","","kissan");
$count_cart = 0;
$fetch = "SELECT * FROM cart";
$count_cart = mysqli_num_rows(mysqli_query($conn, $fetch));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kissan</title>
    <link rel="icon" type="image/x-icon" href="images/kissan-logo.png">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    
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
            <a href="cart.php"><i class="fa fa-shopping-cart" style="font-size:35px; color: #e52129; margin-top:20px;margin-left:20px;"></i><span class="cart-count"><?php echo $count_cart; ?></span></a>
        </div>
        
    </nav>
    
    
    <div class="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/peanut-butter-jar.png" alt="Image 1">
      </div>
      <div class="carousel-item">
        <img src="images/tomato-sauce-jar.png" alt="Image 2">
      </div>
      <div class="carousel-item">
        <img src="images/jam-jar.png" alt="Image 3">
      </div>
    </div>
    <button class="carousel-control prev" onclick="prevSlide()">&#10094;</button>
    <button class="carousel-control next" onclick="nextSlide()">&#10095;</button>
  </div>
  
  <div class="our-story"><h2>OUR STORY</h2></div>
  <div class="story-image">
    <div class="story-container">
        <p>During the British era, trains passing through Punjab made a stop at a processing unit where farmers sold freshly picked fruits. 
            Locals called this spot Kissan and from there on it became a household name. The UB group, under the Late Vittal Mallya then, acquired Kissan from Mitchell Bros. in the year 1950. In 1993,
             Kissan was acquired by Brooke Bond India and is now an integral part of Hindustan Unilever Limited (HUL).</p>
    </div>
    <div class="read-our-story">
        <span>READ FULL STORY</span>
    </div>
  </div>
  <div class="recipe-container">
        <h2>RECIPES</h2>
        <div class="inner-box">
            <button class="carousel2-control prev" onclick="prevSlide()">&#10094;</button>
            <div class="carousel2">
                <div class="carousel2-inner">
                    <div class="carousel2-item"><img src="images/recipe/recipe1.jpg" alt="Image 1"> <div class="carousel2-item-name">Aloo Methi Roll</div></div>
                    <div class="carousel2-item"><img src="images/recipe/recipe2.jpg" alt="Image 2"><div class="carousel2-item-name">Peanut Butter Cookies</div></div>
                    <div class="carousel2-item"><img src="images/recipe/recipe3.jpg" alt="Image 3"><div class="carousel2-item-name">Quick No-Bake Cookies</div></div>
                    <div class="carousel2-item"><img src="images/recipe/recipe4.jpg" alt="Image 4"><div class="carousel2-item-name">Oats & Peanut Butter Bar</div></div>
                    <div class="carousel2-item"><img src="images/recipe/recipe5.jpg" alt="Image 5"><div class="carousel2-item-name">Whole Wheat & Oats Peanut Butter Pancake</div></div>
                    <div class="carousel2-item"><img src="images/recipe/recipe6.jpg" alt="Image 6"><div class="carousel2-item-name">Caramelized Bananas with Peanut Butter on Toast</div></div>
                    <div class="carousel2-item"><img src="images/recipe/recipe7.jpg" alt="Image 7"><div class="carousel2-item-name">Peanut Butter & Date Smoothie</div></div>
                    <div class="carousel2-item"><img src="images/recipe/recipe8.jpg" alt="Image 8"><div class="carousel2-item-name">Chocolate & Peanut Butter Mousse</div></div>
                </div>
            </div>
            <button class="carousel2-control next" onclick="nextSlide()">&#10095;</button>
            <div class="view-all-recipe">
        <span>VIEW ALL RECIPES</span>
    </div>
        </div>
    </div>
  
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

function showSlide(index) {
  const slides = document.querySelectorAll('.carousel-item');
  if (index >= slides.length) {
    currentIndex = 0;
  } else if (index < 0) {
    currentIndex = slides.length - 1;
  } else {
    currentIndex = index;
  }
  const offset = -currentIndex * 100;
  document.querySelector('.carousel-inner').style.transform = `translateX(${offset}%)`;
}

function nextSlide() {
  showSlide(currentIndex + 1);
}

function prevSlide() {
  showSlide(currentIndex - 1);
}

// Initialize carousel
showSlide(currentIndex);

</script>
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

showSlide(currentIndex);
</script>
<style>
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
.navbox2 a{
    text-decoration: none;
    color:#e63946;
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
.search input img{
  width:10px;
  height:10px;
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
  
  .cart-count a{
    margin-bottom:5px;
    margin-left: 2px;
  }
  body {
  margin: 0;
   /* Add padding to the top of the body to make space for the fixed nav */
}
</style>
</html>
