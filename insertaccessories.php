<?php

    $conn=mysqli_connect("localhost","root","","aqua");

   
    if(isset($_POST["submit"])){
        $productname=$_POST['name'];
        $productimage =$_FILES['image']['name'];
        $tempname=$_FILES['image']['tmp_name'];
        $folder='images/accessories'.$productimage;
        $price = $_POST['price'];
        $type = $_POST['type'];

        $stock=$_POST['stock'];
        $description=$_POST['description'];
        $query="INSERT INTO accessories (image ,name, stock,description,price,type ) VALUES('$productimage','$productname','$stock','$description','$price','$type')";
        if(move_uploaded_file($tempname,$folder)){
        if(mysqli_query($conn,$query)){
            echo "<script>alert('Data entered successfully')</script>";
            echo "<script>window.location.href='insertaccessories.php'</script>";
   
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
    <h1 style="text-align: center;color:#30694B;" >Insert Accessories</h1>

<div class="container" >
<form class="" action="" method="post" autocomplete="off" enctype="multipart/form-data">
        <div class="user-details">
            <div class="input-box">
                <input type="hidden" name="edit_id" value="<?php echo $id; ?>">
                <span class="details">Accessories Name : </span>
                <input class="textbox" type="text" name="name" required>
            </div>
            <div class="input-box">
                <input type="hidden" name="edit_id" value="<?php echo $id; ?>">
                <span class="details">Stock : </span>
                <input class="textbox" type="text" name="stock"  required>
            </div>
            <div class="input-box">
                <input type="hidden" name="edit_id" value="<?php echo $id; ?>">
                <span class="details">Description : </span>
                <input class="textbox" type="text" name="description" >
            <div class="input-box">
                <span class="details">Price : </span>
                <input class="textbox" type="text" name="price" required>
            </div> 
            <div class="input-box">
                <span class="details">Type : </span>
                <input class="textbox" type="text" name="type" required>
            </div> 
            <div class="input-box">
            <span class="details">Product image : </span>
                <input class="textbox" type="file" name="image"required>
        </div>
            <button class="register" type="submit" name="submit">Insert</button>
           
        </div>
    </form> </div>
</b>    
</body>

<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
}



.container {
    max-width: 400px;
    margin: 50px auto;
    padding: 20px;
    background-color: rgba(57, 160, 91, 0.363);
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.24);
}

h2 {
    text-align: center;
    margin-bottom: 20px;
}

label {
    font-weight: bold;
}

input[type="text"],
input[type="email"],
input[type="password"] ,input[type="number"],input[type="file"]{
    background-color:#f2f2f2 ;
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
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}



.results {
    max-width: 400px;
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
        background-color: #45a049;
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