<?php
$conn=mysqli_connect("localhost","root","","aqua");

if(isset($_POST["submit"])){
   
  $email = $_POST['email'];
  $query="SELECT * FROM profile WHERE email='$email'";
  $result=mysqli_query($conn,$query);
  $count=mysqli_num_rows($result);
    if($count>0)
    {
        echo"<script>alert('user already available')</script>";
    }
    else
    {
    
        $username = $_POST['username'];

        $query="SELECT * FROM profile WHERE username='$username'";
    
        $result=mysqli_query($conn,$query);
        $count=mysqli_num_rows($result);
    
          if($count>0){
            echo"<script>alert('username already available, please enter another username')</script>";
          }
          else{

            $phno     = $_POST['phno'];

            $query="SELECT * FROM profile WHERE phno='$phno'";
            $result=mysqli_query($conn,$query);
            $count=mysqli_num_rows($result);
          
            if($count>0){
            echo"<script>alert('phone number already available,use login or enter different phone number')</script>";
             }
            else{
              $fullname = $_POST['fullname'];
              $password = $_POST['password'];
              
              
              
              // Move uploaded file to the desired location
             
                // Inserting data into database if file moved successfully
                $query = "INSERT INTO profile (fullname, username, email, phno, password ) VALUES ('$fullname', '$username', '$email', '$phno', '$password')";

                if(mysqli_query($conn, $query)){
                    echo "<script type='text/javascript'>
            alert('User aded successfully!'); 
            window.close();
          </script>";
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
      exit;
   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
   <link  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
   <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>User profile</title>
</head>
<body >

<div class="container" >
<div class="title" style="text-align: center;font-family:sans-serif; font-weight: bold; ">Register</div><br>
<form class="" action="" method="post" autocomplete="off" enctype="multipart/form-data">
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
      <span class="details"><i class="bi bi-envelope-fill"></i>&nbsp;Email : </span>
      <input class="textbox" type="text" name="email" placeholder="Enter Your Email" required>
    </div>
    <div class="input-box">
      <span class="details"><i class="bi bi-telephone-fill"></i>&nbsp;Phone Number : </span>
      <input class="textbox" type="number" name="phno" placeholder="Enter Your Number" required>
    </div>
    <div class="input-box">
      <span class="details">Password : </span>
      <input class="textbox" type="password" name="password" placeholder="Enter Your Password" required>
    </div>
    <button class="register" type="submit" name="submit">Add user</button><button class="register" type="submit" onclick=" closeWindow()">Back</button>

    
    
  </div>
</form>
</div>

</body>
<script>
    function closeWindow() {
        window.location.href = 'about:blank';
        }
</script>
<style>
    body {
    font-family: Arial, sans-serif;
   background-color: white;
    padding: 0;
}


.container {
    max-width: 800px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    margin-bottom: 20px;
}

label {
    font-weight: bold;
}
.details{
 font-weight: bold;

}
input[type="text"],
input[type="email"],
input[type="password"] ,input[type="number"],input[type="file"]{
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #30694B;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}



.results {
    max-width: 600px;
    margin: 20px auto;
    padding: 10px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
button{
        margin: 5px 0% 0% 40%;
        width: 130px;
        height: 30px;
        background-color: #30694B;
        border-radius: 5px;
        border-color: transparent;
        color: white;
        font-weight: 500;
}
button:hover{
    box-shadow:0 0 5px rgb(0, 0,0.5);
    -webkit-transform: scale(1.01);
    transform: scale(1.01);
}

@media screen and (max-width: 768px) {
    .container {
        max-width: 90%;
    }
}

</style>
</html>