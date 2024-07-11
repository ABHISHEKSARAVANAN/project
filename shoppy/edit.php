<?php
require 'config.php';

$id = $_GET['edit_id'];

// Fetch user details from the database based on the provided ID
$query = "SELECT * FROM corosal WHERE id = $id";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
} else {
    echo "product not found!";
    exit();
}

if(isset($_POST["submit"])) {
    // Retrieve form data
    $productname = $_POST['product'];
    $image = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder= 'images/'.$image;

    // Move uploaded file to the desired location
    if(move_uploaded_file($tempname, $folder)){
        // Update user details in the database
        $query = "UPDATE corosal SET product='$productname', image='$image' WHERE id=$id";

        if(mysqli_query($conn, $query)){
            echo "<script>alert('Product updated successfully');</script>";
            echo"<script>window.location.href='admin.php'</script>";
        } else {
            // Printing the error if query execution fails
            echo "Error: " . mysqli_error($conn);
        }

        // Closing the database connection
        mysqli_close($conn);
    } else {
        echo "<script>alert('Failed to update product details');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product Details</title>
</head>
<body>
<div class="container">
    <div class="title" style="text-align: center;font-family:sans-serif; font-weight: bold; ">EDIT USER DETAILS</div><br>
    <form class="" action="" method="post" autocomplete="off" enctype="multipart/form-data">
        <div class="user-details">
            <div class="input-box">
                <input type="hidden" name="edit_id" value="<?php echo $id; ?>">
                <span class="details">Product Name : </span>
                <input class="textbox" type="text" name="product" value="<?php echo $user['product']; ?>" required>
            </div>
            <div class="input-box" >
                <span class="details" >Product Image</span>
                <input class="textbox" type="file" name="image" required>
            </div>
            <div class="input-box">
                <img width="100" height="100" src="images/<?php echo $user['image']; ?>">

            </div>
            <button class="register" type="submit" name="submit">Update</button>
            <button class="register" onclick="location.href='admin.php'" >Back</button>
        </div>
    </form>
</div>
</body>
</html>
