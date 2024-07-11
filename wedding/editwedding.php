<?php

$conn = mysqli_connect("localhost", "root", "", "wedding");



if(isset($_POST["update"])){
    $groomname=$_POST['groomname'];
    $bridename=$_POST['bridename'];
    $date=$_POST['date'];
    $place=$_POST['place'];
    $image =$_FILES['pic']['name'];
    $tempname=$_FILES['pic']['tmp_name'];
    $folder='images/couples'.$image;
    
    

    $query = "UPDATE couples SET groomname='$groomname',bridename='$bridename',date='$date',place='$place',image='$image' WHERE id='$id'";
   
    if(mysqli_query($conn,$query)){
        echo "<script>alert('Wedding Detals Updated successfully');
        window.location.href='viewdetails.php';
        </script>";
    }
    else{
        echo "<script>alert('Failed to upload');</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Update Wedding Details</title>
    <style>
        body {
            background-color: #E8EFFA;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: block;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .supplier-container {
            background-color: #fff;
            border: 2px solid #aeaeae;
            border-radius: 10px;
            display: flex;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            max-width: 1000px;
            width: 100%;
            box-sizing: border-box;
        }
        h3 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .supplier-form-inner-box {
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
        }
        .supplier-form-inner-box label {
            margin-bottom: 5px;
            color: #555;
        }
        .supplier-form-inner-box input[type="text"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        @media (max-width: 480px) {
            .supplier-container {
                padding: 15px;
            }
            .supplier-form-inner-box input[type="text"] {
                font-size: 14px;
            }
            button {
                font-size: 14px;
                padding: 8px;
            }
        }
    </style>
</head>
<body>
    <div class="containerr">
        
<h3 style="color:#30694B;"><i class="bi bi-person-fill-add"></i> Update Wedding Details</h3>
    <div class="supplier-container">
        
    <?php
    $id = $_GET['edit_id'];
    $query = "SELECT * FROM couples WHERE id = $id";
    $result = mysqli_query($conn, $query);
while($user= mysqli_fetch_assoc($result))   { 
    ?>
        <form action="editwedding.php" method="post">
            <div class="left">
                <input type="hidden" name="id" value="<?php echo $user['id']?>">
                <div class="supplier-form-inner-box">
                    <label for="name"><i class="bi bi-person-fill"></i>Groom</label>
                    <input type="text" id="groomname" name="groomname" placeholder="Enter Groom name" value="<?php echo $user['groomname']; ?>" required>
                </div>
                <div class="supplier-form-inner-box">
                    <label for="email"><i class="bi bi-envelope-fill"></i> Bride</label>
                    <input type="text" id="bridename" name="bridename" placeholder="Enter Bride email" value="<?php echo $user['bridename']; ?>" required>
                </div>
                <div class="supplier-form-inner-box">
                    <label for="date"><i class="bi bi-geo-alt-fill"></i> date</label>
                    <input type="date" id="date" name="date" placeholder="Enter date" value="<?php echo $user['date']; ?>" required>
                </div>
                <div class="supplier-form-inner-box">
                    <label for="place"><i class="bi bi-geo-alt-fill"></i> Wedding Location</label>
                    <input type="text" id="place" name="place" placeholder="Enter Wedding Location" value="<?php echo $user['place']; ?>" required>
                </div>
                <div class="supplier-form-inner-box">
                    <label for="phno"><i class="bi bi-telephone-plus-fill"></i> Wedding Image</label>
                    <input type="file" id="image" name="pic"  required>
                 </div>
                
            </div>
           
            <button class="btn" type="submit" name="update" style="background-color: #30694B;"><i class="bi bi-database-add"></i> Update Supplier</button>
        </form>
        <?php
}
        ?>
    </div>
    </div>
</body>

<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    margin: 0;
    padding: 0;
}

.supplier-container {
    max-width: 800px;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

h3 {
    text-align: center;
    margin-bottom: 20px;
}

form {
    display: flex;
    flex-wrap: wrap;
}

.left, .right {
    flex: 1;
    padding: 10px;
}

.supplier-form-inner-box {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    color: #30694B;
}

input[type="text"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

input[type="text"]:focus {
    border-color: #30694B;
    outline: none;
}

button.btn {
    width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            margin-left: 40px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
}

.btn:hover,.btn:active,.btn:focus {

    color:wheat;
     transform: scale(1.1);
     -webkit-transform: scale(1.1);
     box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    
}

@media (max-width: 600px) {
    .left, .right {
        flex: 100%;
    }
}
button.btn {
    width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            margin-left: 40px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
}

.btn:hover,.btn:active,.btn:focus {

    color:wheat;
     transform: scale(1.1);
     -webkit-transform: scale(1.1);
     box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    
}

</style>
</html>
