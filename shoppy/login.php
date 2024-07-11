<?php
require 'config.php';

if(isset($_POST["submit"])){
   
  $email = $_POST['email'];
  $query="SELECT * FROM userdetails WHERE email='$email'";
  $result=mysqli_query($conn,$query);
  $count=mysqli_num_rows($result);
    if($count>0)
    {
        echo"<script>alert('user already available')</script>";
    }
    else
    {
    
        $username = $_POST['username'];

        $query="SELECT * FROM userdetails WHERE username='$username'";
    
        $result=mysqli_query($conn,$query);
        $count=mysqli_num_rows($result);
    
          if($count>0){
            echo"<script>alert('username already available, please enter another username')</script>";
          }
          else{

            $phno     = $_POST['phno'];

            $query="SELECT * FROM userdetails WHERE phno='$phno'";
            $result=mysqli_query($conn,$query);
            $count=mysqli_num_rows($result);
          
            if($count>0){
            echo"<script>alert('phone number already available,use login or enter different phone number')</script>";
             }
            else{
              $fullname = $_POST['fullname'];
              $password = $_POST['password'];
              $confirmpassword = $_POST['confirmpassword'];
          
              $query = "INSERT INTO userdetails (fullname, username, email, phno, password, confirmpassword) VALUES ('$fullname', '$username', '$email', '$phno', '$password', '$confirmpassword')";

          
                if(mysqli_query($conn, $query)){
                  echo "<script>alert('Registered successfully')</script>";
                  echo "<script>window.location.href='register.php'</script>";
                  exit();
                }
                else{
                  // Printing the error if query execution fails
                  echo "Error: " . mysqli_error($conn);
                }

                // Closing the database connection
                mysqli_close($conn);
        }
      }
   }
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
<body><div class="container">
<div class="title">Registration</div>
<form class="" action="" method="post" autocomplete="off">
  <div class="user-details">
    <div class="input-box">
      <span class="details">Full Name : </span>
      <input class="textbox" type="text" name="fullname" placeholder="Enter Your Name" required>
    </div>
    <div class="input-box">
      <span class="details"> User Name: </span>
      <input class="textbox" type="text" name="username" placeholder="Enter Your Username" required>
    </div>
    <div class="input-box">
      <span class="details">Email : </span>
      <input class="textbox" type="text" name="email" placeholder="Enter Your Email" required>
    </div>
    <div class="input-box">
      <span class="details">Phone Number : </span>
      <input class="textbox" type="number" name="phno" placeholder="Enter Your Number" required>
    </div>
    <div class="input-box">
      <span class="details">Password : </span>
      <input class="textbox" type="password" name="password" placeholder="Enter Your Password" required>
    </div>
    <div class="input-box">
      <span class="details">Confirm Password : </span>
      <input class="textbox" type="password" name="confirmpassword" placeholder="Confirm your password" required>
    </div>
    <button class="register" type="submit" name="submit">Register</button>
    <button class="register"type="button" onclick="location.href='register.php'">login</buttontu>
  </div>
</form>
</div>

</body>
</html>