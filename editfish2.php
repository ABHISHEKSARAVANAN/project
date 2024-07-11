<?php
$conn=mysqli_connect("localhost","root","","aqua");

$id = $_GET['edit_id'];
$query = "SELECT * FROM fish WHERE id = $id";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
} else {
    echo "product not found!";
    exit();
}

if(isset($_POST["submit"])) {

    $name = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock']; 
    $description=$_POST['description'];
    $image = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder= 'images/fish/'.$image;

    
    if(move_uploaded_file($tempname, $folder)){
     
        $query = "UPDATE plants SET name='$name', image='$image', price='$price', stock='$stock',description='$description'   WHERE id=$id";

        if(mysqli_query($conn, $query)){
            echo "<script>alert('Product updated successfully');</script>";
            echo"<script>window.location.href='editfish.php'</script>";
        } else {
            
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
    <link rel="stylesheet" href="styles/edit.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Fishes Details</title>
    <style>
        .details{
            font-size: x-large;
            font-weight:bold ;
        }
         .containerr{
            max-width: 1100px;
        min-height: 600px;
        margin: 50px auto;
        padding: 20px;
        background-color: #ffffff59;
        color:#30694B;
        border: 2px solid black;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }
    </style>
</head>
<body >
<div class="containerr" >
    <div class="title" style="text-align: center;font-family:sans-serif; font-weight: bold; ">EDIT Fishes DETAILS</div><br>
    <form class="" action="" method="post" autocomplete="off" enctype="multipart/form-data">
        <div class="user-details">
            <div class="input-box">
                <input type="hidden" name="edit_id" value="<?php echo $id; ?>">
                <span class="details">Product Name : </span>
                <input class="textbox" type="text" name="name" value="<?php echo $user['name']; ?>" required>
            </div>
            <div class="input-box">
                <span class="details">Price : </span>
                <input class="textbox" type="text" name="price" value="<?php echo $user['price']; ?>" required>
            </div>
            <div class="input-box">
                <span class="details">stock : </span>
                <input class="textbox" type="text" name="stock" value="<?php echo $user['stock']; ?>" required>
            </div>
            <div class="input-box">
                <span class="details">Description : </span>
                <input class="textbox" type="text" name="description" value="<?php echo $user['description']; ?>" required>
            </div>
            
            <div class="input-box">
                <span class="details">Product Image : </span>
                <input class="textbox" type="file" name="image"   >
            </div>
            <div class="input-box">
                <img width="100" height="100" src="images/fish/<?php echo $user['image']; ?>">

            </div>
            <button class="register" type="submit" name="submit">Update</button>
            <button class="register" onclick="goBack()" >Back</button>
        </div>
    </form>
</div>
</body>
<script>
    function goBack() {
        window.history.back();
    }
</script>
</html>
