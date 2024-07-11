<?php 

    $conn=mysqli_connect("localhost","root","","website");

    if(isset($_POST["submit"])){
        $productname=$_POST['product'];
        $image=$_FILES['image']['name'];
        $tempname=$_FILES['image']['tmp_name'];
        $folder='images/'.$image;
        move_uploaded_file( $tempname, $folder );
if(mysqli_query($conn,$query)){
        $query="INSERT INTO corosal (product , image) values ('$productname', '$image')";
        echo"<script>alert('Product detail created Successfully')</script>";
        echo"<script>window.location.href='admin.php'</script>";
}
        
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>ADMIN</title>
</head>
<body>
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
        
        <button type="submit" name="submit">submit</button>
        <button type="button" onclick="location.href='admin.php'">Back</button>
        
        </div>
    </form>
    </div>
</body>
</html>