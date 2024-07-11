<?php
$conn=mysqli_connect("localhost","root","","review");

$total = 0;

$query = "SELECT price, quantity FROM cart";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $total += $row['price'] * $row['quantity'];
}

  
if(isset($_POST["submit"])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phno     = $_POST['phno'];
  $address = $_POST['address'];
  $state = $_POST['state'];
    
// Fetch all items in the cart
    $qur = "SELECT * FROM cart";
    $res = mysqli_query($conn, $qur);
            
   while ($row = mysqli_fetch_assoc($res)) {
    $productname = $row['productname'];
    $quantity = $row['quantity'];
    // Update the quantity in the products table
     $update_query = "UPDATE parts SET quantity = quantity - $quantity WHERE productname = '$productname'";     
     mysqli_query($conn, $update_query);
    
 
  
// Clear the cart after purchase
      $clear_cart = "DELETE FROM cart";
      mysqli_query($conn, $clear_cart);            
      echo "<script>alert('Purchase successful!');</script>";
      echo "<script>window.location.href='index.php'</script>";
    
            
$query = "INSERT INTO userdetails (name,email, phno, address, state,total) VALUES ('$name', '$email', '$phno', '$address', '$state','$total')";
   mysqli_query($conn,$query);
 
mysqli_close($conn);
   }
  
}
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="check.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check - Out</title>
</head>
<body style="  background-image: url('images/background.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed; 
    background-size: 100% 100%;"><div class="container">
<div class="title">Check-Out</div>
<form class="" action="" method="post" autocomplete="off">
  <div class="user-details">
    <div class="input-box">
      <span class="details">Full Name : </span>
      <input class="textbox" type="text" name="name" placeholder="Enter Your Name" required>
    </div>
    <div class="input-box">
      <span class="details">Email : </span>
      <input class="textbox" type="text" name="email" placeholder="Enter Your Email" required>
    </div>
    <div class="input-box">
      <span class="details">Phone Number : </span>
      <input class="textbox" type="number" name="phno" placeholder="Enter Your ph Number" required>
    </div>
    <div class="input-box">
      <span class="details">Address:</span>
      <input class="textbox" type="text" name="address" placeholder="Enter Your address" required>
    </div>
    <div class="input-box">
      <span class="details">State : </span>
      <input class="textbox" type="text" name="state" placeholder="Enter your State" required>
    </div>
    <div class="input-box">
      <span><h3 style="margin-top: 35px;">Total: RS. <?php echo number_format($total, 2); ?></h3></span>
          </div>
    <button class="register" type="submit" name="submit">Check-Out</button>
    <button class="register" type="button" onclick="location.href='cart.php'" >Back</button>
    
  
</form>
</div>

</body>
</html>