<?php
$conn=mysqli_connect("localhost","root","","review");

$id = $_GET['edit_id'];

// Fetch user details from the database based on the provided ID
$query = "SELECT * FROM parts WHERE id = $id";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
} else {
    echo "product not found!";
    exit();
}

if(isset($_POST["submit"])) {
    // Retrieve form data
    $productname = $_POST['productname'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    
    $productimage = $_FILES['productimage']['name'];
    $tempname = $_FILES['productimage']['tmp_name'];
    $folder= 'images/'.$productimage;

    // Move uploaded file to the desired location
    if(move_uploaded_file($tempname, $folder)){
        // Update user details in the database
        $query = "UPDATE parts SET productname='$productname', productimage='$productimage', price='$price', quantity='$quantity'   WHERE id=$id";

        if(mysqli_query($conn, $query)){
            echo "<script>alert('Product updated successfully');</script>";
            echo"<script>window.location.href='admin.php'</script>";
        } else {
            // Printing the error if query execution fails
            echo "Error: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    } else {
        echo "<script>alert('Failed to update');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="edit.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User Details</title>
    <style>
         .container{
            max-width: 1000px;
        min-height: 600px;
        margin: 50px auto;
        padding: 20px;
        background-color: #ffffff59;
        color:white;
        border: 2px solid black;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }
    </style>
</head>
<body style="  background-image: url('images/background.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed; 
    background-size: 100% 100%;">
<div class="container" >
    <div class="title" style="text-align: center;font-family:sans-serif; font-weight: bold; ">EDIT PRODUCT DETAILS</div><br>
    <form class="" action="" method="post" autocomplete="off" enctype="multipart/form-data">
        <div class="user-details">
            <div class="input-box">
                <input type="hidden" name="edit_id" value="<?php echo $id; ?>">
                <span class="details">Product Name : </span>
                <input class="textbox" type="text" name="productname" value="<?php echo $user['productname']; ?>" required>
            </div>
            <div class="input-box">
                <span class="details">Price : </span>
                <input class="textbox" type="text" name="price" value="<?php echo $user['price']; ?>" required>
            </div>
            <div class="input-box">
                <span class="details">Quantity : </span>
                <input class="textbox" type="text" name="quantity" value="<?php echo $user['quantity']; ?>" required>
            </div>
            
            <div class="input-box">
                <span class="details">Product Image : </span>
                <input class="textbox" type="file" name="productimage"   >
            </div>
            <div class="input-box">
                <img width="100" height="100" src="images/<?php echo $user['productimage']; ?>">

            </div>
            <button class="register" type="submit" name="submit">Update</button>
            <button class="register" onclick="location.href='admin.php'" >Back</button>
        </div>
    </form>
</div>
</body>
</html>
