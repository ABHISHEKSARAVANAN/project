<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "wedding");
if(isset($_POST["submit"])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM profile WHERE email = '$email' and password='$password'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        echo "<script>alert('Login successful')</script>";
        echo "<script>window.location.href='adminpannel.php'</script>";
        exit();
    } else {
        echo "<script>alert('Invalid username or password')</script>";
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Login</title>
</head>
<body>
    <div class="containerr" style=" margin-top:100px;  width: 500px; margin-left: auto; margin-right: auto;">
        
<h3 style="color:white;"><i class="bi bi-person-fill-add"></i> Login</h3>
    <div class="supplier-container">
        
        <form action="login.php" method="post">
            <div class="left">
                
                <div class="supplier-form-inner-box" style="margin-top: 20px;">
                    <label for="email"><i class="bi bi-envelope-fill"></i> Email</label>
                    <input type="text" id="email" name="email" placeholder="Enter Your email" required>
                </div>
                <div class="supplier-form-inner-box">
                    <label for="password"><i class="bi bi-person-fill-lock"></i> Password</label>
                    <input type="password" id="passwrd" name="password" placeholder="password" required>
                </div>
            </div>
           
            <button class="btn" type="submit" name="submit" style="background-color: #5BC0E0;"><i class="bi bi-database-add"></i> Login</button>
        </form>
    </div>
    </div>
</body>

<style>
    body {
    font-family: Arial, sans-serif;
    background-image:url('login.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    margin: 0;
    padding: 0;
}

.supplier-container {
    max-width: 250px;
    height:300px;
    margin: 50px auto;
    background-color: transparent;
    padding: 20px;
    box-shadow: 0 0 20px white;
    border-radius: 8px;
}

h3 {
    text-align: center;
    padding-right: 15px;
    margin-bottom: 10px;
}

form {
    display: flex;
    flex-wrap: wrap;
}

.left, .right {
    flex: 1;
    padding: 10px;
}

.supplier-form-inner-box {
    margin-bottom: 50px;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    color: white;
}

input[type="text"] {
    width: 95%;
    padding: 10px;
    box-shadow: 0 0 10px white;
    border: 1px solid #ccc;
    border-radius: 4px;
}

input[type="text"]:focus {
    border-color: white;
    
    outline: none;
}
input[type="password"] {
    width: 95%;
    padding: 10px;
    border: 1px solid #ccc;
    box-shadow: 0 0 10px white;
    border-radius: 4px;
}

input[type="password"]:focus {
    border-color: #30694B;
    outline: none;
}

.btn {
    display: block;
    width: 150px;
    padding: 10px;
    border: none;
    margin-left:55px;
    border-radius: 4px;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
}

.btn:hover,.btn:active,.btn:focus {

    color:wheat;
     transform: scale(1.1);
     -webkit-transform: scale(1.1);
     box-shadow: 0 0 10px white;
    
}

@media (max-width: 600px) {
    .left, .right {
        flex: 100%;
    }
}

</style>
</html>
