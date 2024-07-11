<?php
$conn=mysqli_connect("localhost","root","","aqua");

if(isset($_POST["submit"])){
   
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM profile WHERE email = '$email' and password='$password'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1) {
       
        $row = mysqli_fetch_assoc($result);
        $_SESSION['email']=$email;
        $_SESSION['password']=$password;
         echo "<script>alert('Login successful')</script>";
         echo "<script>window.location.href='index.php'</script>";
        exit();
    } else {
        
        echo "<script>alert('invalid username or password')</script>";
    }

    
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
   <link  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
   <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>
<body>
    <div class="whole-navigation">
        <header class="main-header">
            <nav>
                <div class="logo">
                    <img src="images/logo1.png" alt="Logo">
                </div>
                <div class="links">
                    <a href="index.php">HOME</a>
                    <a href="login.php">SIGN IN</a>
                    <a href="about.php">ABOUT US</a>
                    <a href="contact.php">CONTACT US</a>
                    <a href="faq.php">FAQ</a>
                </div>
               
            </nav>
        </header>
    </div>
    <div class="login-container">
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="email"><i class="bi bi-envelope-fill"></i>&nbsp;Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" name="submit">Login</button>
            <button type="button" style="margin-top: 10px;" onclick="location.href='create.php'">Register</button>
        </form>
    </div>
</body>

<style>
    body {
    font-family: Arial, sans-serif;
    background-image: url('images/login-background.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin: 0;
    padding: 0;
}

.whole-navigation {
    width: 100%;
}

.main-header {
    background-color: rgb(13, 15, 38);
    width: 100%;
    height: 80px;
    top:0;
    margin-bottom: 100px;
}

nav {
    display: flex;
    justify-content: space-around;
    align-items: center;
}

nav .logo {
    height: 80px;
    width: 15%;
}

.logo img {
    width: 150px;
    height: 80px;
    border: none;
}

.links {
    width: 50%;
    display: flex;
    justify-content: space-evenly;
}

.links a {
    text-decoration: none;
    color: aliceblue;
    font-size: 1.25rem;
}

.links a:hover,
.links a:active,
.links a:focus {
    transform: scale(1.1);
    transition-duration: 0.3s;
}

.login-container {
    background-color: #fff;
    opacity: 0.9;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 300px;
    text-align: center;
    margin-top: 20px;
}

.login-container h2 {
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 15px;
    text-align: left;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
}

.form-group input {
    width: 100%;
    padding: 8px;
    box-sizing: border-box;
}

button {
    width: 100%;
    padding: 10px;
    background-color: #30694B;
    border: none;
    border-radius: 5px;
    color: white;
    font-size: 16px;
    cursor: pointer;
}

button:hover {
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
    transform: scale(1.01);
}

</style>
</html>
