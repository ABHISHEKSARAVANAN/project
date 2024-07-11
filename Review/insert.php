<?php

    $conn=mysqli_connect("localhost","root","","review");

   
    if(isset($_POST["submit"])){
        $productname=$_POST['product'];
        $productimage =$_FILES['image']['name'];
        $tempname=$_FILES['image']['tmp_name'];
        $folder='images/'.$productimage;
        $price = $_POST['price'];
        $quantity = $_POST['quantity']; 
        $query="INSERT INTO parts (productname , productimage , price, quantity) VALUES('$productname','$productimage','$price','$quantity')";
        if(move_uploaded_file($tempname,$folder)){
        if(mysqli_query($conn,$query)){
            echo "<script>alert('Data entered successfully')</script>";
            echo "<script>window.location.href='admin.php'</script>";
   
    }
    else{

        echo "<script>alert('Data not entered successfully')</script>";

         }
        }
        else{
            echo "<script>alert('file not found')</script>";
  
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="insert.css">
    <title>insert page</title>
</head>
<body>
    <nav><h1>Insert Database</h1></nav>
<main>
<div class="container" >
    <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
    <div class="user-details" >
        
         <div class="input-box">
            <span class="details">Product Name : </span>
                <input class="textbox" type="text" name="product" placeholder="Enter product Name" required>
        </div>
        <div class="input-box">
            <span class="details">Product image : </span>
                <input class="textbox" type="file" name="image"required>
        </div>
        <div class="input-box">
            <span class="details">Product Price : </span>
                <input class="textbox" type="text" name="price" placeholder="Enter product Price" required>
        </div>
        <div class="input-box">
            <span class="details">Product Quantity : </span>
                <input class="textbox" type="text" name="quantity" placeholder="Enter product Quantity" required>
        </div>
        
        <button type="submit" name="submit"  onclick="location.href='admin.php'">submit</button>
      
        
        </div>
    </form>
    </div>
</main>    
</body>
</html>