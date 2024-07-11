<?php
$conn=mysqli_connect("localhost","root","","wedding");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="styles/andrew.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
   
    <title>LV Wedding</title>
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            <img src="images/logo.png" alt="">
        </div>
        <div class="box1">
            <ul>
                <li><a href="login.php"><i class="bi bi-person-fill"></i> Login</a>
                </li>
                <li><a href="contact.php"><i class="bi bi-telephone-fill"></i> Contact</a></li>
            </ul>
        </div>
        
    </nav>
    <div class="banner" style="width: 100%;   background-image:url('banner1.jpg');">
    </div>
    <div class="nav2" style="width:100%;height:100px;">
        <ul>
            <li></li>
        </ul>
    </div>
    <div class="month" >
        <h1 style="text-align:center;color:#3F454A">Weddings Of Andrew & Emmy</h1><br><br>
        <div class="grid-container">
        <div class="grid-item">
            <img style="height:385px" src="images/couples/andrewemmy.jpg" ><br>
            <img style="height:385px" src="images/couples/andrewemmy4.jpg" >
        </div>
        <div class="grid-item">
            <img src="images/couples/andrewemmy2.jpg" style="height:350px"><br>
            <img src="images/couples/andrewemmy3.jpg"  style="height:400px">
            
        </div>
        <div class="grid-item">
            <img src="images/couples/andrewemmy5.jpg" style="height:800px">
            
        </div>
        
       
        </div>
    </div>
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/carousel/carousel1.jpg" class="d-block w-100" >
    </div>
    <div class="carousel-item">
      <img src="images/carousel/carousel2.jpg" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="images/carousel/carousel3.jpg" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="images/carousel/carousel4.jpg" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="images/carousel/carousel5.jpg" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="images/carousel/carousel6.jpg" class="d-block w-100">
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
<footer class="footer">
            <div class="footer-container">
                <div class="row">
                <div class="footer-col">
                        <h4>follow us</h4>
                        <ul>
                        <div class="social-links">
                            <a href="#"><i class="bi bi-twitter"></i></a>
                            <a href="#"><i class="bi bi-facebook"></i></a>
                            <a href="#"><i class="bi bi-instagram"></i></a>
                            <a href="#"><i class="bi bi-whatsapp"></i></a></ul>
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
                        <h4>Wedding ideas</h4>
                        <ul>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Location</a></li>
                            <li><a href="#">Palace</a></li>
                            <li><a href="#">Destination Wedding</a></li>
                            <li><a href="#">Wedding at Yatch</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>online shop</h4>
                        <ul>
                            <li><a href="#">Wedding</a></li>
                            <li><a href="#">Cattering</a></li>
                            <li><a href="#">Photography</a></li>
                            <li><a href="#"> Pre Wedding Shoot</a></li>
                        </ul>
                    </div>
                   
                    </div>
                </div>
            </div>
            <span class="footer-reserved">Copyright 2024 © LV Wedding. All Rights Reserved. LV WEDDING Trade Mark is registered.</span>
 </footer>
</body>
<style>
    body{
    margin: 0;
    padding: 0;
    box-sizing: border-box;   
   }
   
   .navbar{
       top: 0;
       height:100px;
       width: 100%;
       display: flex;
       justify-content: space-between;
       z-index: 1000;
      
   }
   .box1{
       padding-right: 100px;
   }
   .box1 ul{
   display: flex;
   gap: 30px;
   }
   .box1 li{
       text-decoration: none;
       list-style: none;
       
       
   }
   .box1 a{
       font-family: sans-serif;
       text-decoration: none;
       color: aliceblue;
       font-size: 2rem;
   }
   .box1 li:hover,.box1 li:focus,.box1 li:active{
       -webkit-transform: scale(1.1);
       transform: scale(1.1);
       transition-duration: 0.3s; 
   }
   .logo{
       margin-top: 10px;
       margin-left: 10px;
       width:80px;
       height:80px
   }
   .logo img{
       width: 100%;
       height: 100%;
   }
   
   .banner{
       position: absolute;
       top: 0;
       height:700px;
       width: 100%;
   }
   
   .month{
    padding-left: 50px;
       width: 100%;
       height:1000px;
     margin-top: 550px;
       margin-bottom: 30px;
   }
   .month-container{
       width:90%;
       height: 450px;
       margin-left: auto;
       margin-right: auto;
      
       justify-content: space-evenly;
       display: flex;
       gap: 10px;
   }
   .inner-box {
    margin-top: 20px;
    border: 2px solid pink;
    background-color: white;  
    border-radius:5px;
    padding: 10px;
    text-align: center;
    height: 330px;
    width: 300px;
}
.inner-box .inner-box-text{
    text-align: left;
    width: 200px;
    height: auto;
    padding-left: 90px;
}
.inner-box img {
    width: 120px;
    height: 120px;
    
}

.inner-box h5 {
    margin: 10px 0;
    font-weight: 500;
    font-size: small;
}

.inner-box input[type="number"] {
    width: 50px;
    text-align: center;
}

.inner-box-add-to-cart {
    margin-top: 10px;
    border:none;
    background-color: #30694B;
    color: white;
    border-radius: 3px;
}
.inner-box-add-to-cart:hover,.inner-box-add-to-cart:focus,.inner-box-add-to-cart:active{
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
    transition-duration: 0.3s;
}
.inner-box img:hover,.inner-box img:active,.inner-box img:focus{
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
    transition-duration: 0.3s;
    color: rgb(13, 15, 38);
}
.grid-container {
    margin-top: 10px;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-template-rows: repeat(2, 1fr);
    gap: 20px;
    height: 650px;
    width: 100%;
    max-width: 1400px;
    

}

.grid-item {
    position: relative;
}

.grid-item img {
    cursor: pointer;
    width: 100%;
    height: auto;
    display: block;
    border-radius: 5px;
}
.grid-item img:hover,.grid-item img:active,.grid-item img:focus{
    -webkit-transform: scale(1.05);
    transform: scale(1.05);
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
</style>
</html>