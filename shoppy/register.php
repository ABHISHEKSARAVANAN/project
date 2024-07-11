<?php
require 'config.php';

if(isset($_POST["submit"])){
   
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM userdetails WHERE username = '$username' and password='$password'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1) {
       
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username']=$username;
        $_SESSION['password']=$password;
         echo "<script>alert('Login successful')</script>";
         echo "<script>window.location.href='index.html'</script>";
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
    <link rel="stylesheet" href="registrationstyle.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="title">Login</div>
        <form class="" action="" method="post" autocomplete="off">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">User Name: </span>
                    <input class="textbox" type="text" name="username" placeholder="Enter Your Username" required>
                </div>
                <div class="input-box">
                    <span class="details">Password: </span>
                    <input class="textbox" type="password" name="password" placeholder="Enter Your Password" required>
                </div>
                <div class="login_button">
                    <button class="register" type="submit" name="submit">Login</button>
                    <button class="register"type="button" onclick="location.href='login.php'">Register</buttontu>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
