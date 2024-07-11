<?php
$conn=mysqli_connect("localhost","root","","wedding");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="styles/style.css">
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
    <div class="container" style="margin-top: 650px;">
        <p style="text-align:center;font-family:cursive;font-size:3rem;color:#dbdbdb">Say “I Do” with a Love</p>
        <p style="text-align: center; font-size: 3rem; font-weight:600; color:#3F454A;">Tie The Knot With LV Wedding</p>
        <div class="para-container">
        <p>LV Wedding offers a variety of all-inclusive wedding packages for most budgets so you can set sail on your big day completely stress-free. 
            Our expert team of wedding sales managers and coordinators are here to serve you. All brides and grooms will receive a dedicated wedding coordinator that will guide the planning process every step of the way. 
            Our fleet  offer the perfect blend of breathtaking Wedding, fine dining and entertainment for wedding events from 25 to 5000 guests. Customize your theme, décor and more with a luxurious wedding. 
            Your nautical nuptials will be picture perfect with the stunning Clearity.
             Discover your dream wedding  by contacting one of our Sales Managers to schedule your site tour.</p>
    
        </div>    
    </div>
    <div class="month" >
        <h1 style="text-align:center;color:#3F454A">Weddings Of June</h1>
        <div class="month-container" >
        <?php
    $query = "SELECT * FROM couples ";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) { ?>
            <form action="index.php" method="post">
                <div class="inner-box">
                    <img src="images/couples/<?php echo $row["image"]; ?>" onclick="location.href='<?php echo $row['link'];?>'" style="width:100px;height:100px;"><br><br>
                    <span style="color:pink;">═══════════════</span>
                      <div class="inner-box-text">
                    <span><h5>Groom: <?php echo $row["groomname"]; ?></h5></span>
                        <span><h5>Bride: <?php echo $row["bridename"]; ?></h5></span>  
                        <span><h5>Date: <?php echo $row["date"]; ?></h5></span>
                        <span><h5>Place: <?php echo $row["place"]; ?></h5></span>
                        
                        </div>
                </div>
            </form>
            <?php }
    }
    ?>
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