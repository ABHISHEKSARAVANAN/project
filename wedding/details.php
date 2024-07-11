<?php

$conn = mysqli_connect("localhost", "root", "", "wedding");

if(isset($_POST["submit"])){
    $groomname=$_POST['groomname'];
    $bridename=$_POST['bridename'];
    $date=$_POST['date'];
    $place=$_POST['place'];
    $image =$_FILES['pic']['name'];
    $tempname=$_FILES['pic']['tmp_name'];
    $folder='images/couples'.$image;
    
    if(move_uploaded_file($tempname,$folder)){

    $query="INSERT INTO couples ( groomname,bridename,image,date,place ) VALUES('$groomname','$bridename','$image','$date','$place')";
      
    if(mysqli_query($conn,$query)){
        echo "<script>alert('Wedding Details Entered successfully');
        window.location.href='details.php';
        </script>";
    }
    else{
        echo "<script>alert('Failed to upload');</script>";
    }
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title> Wedding Details</title>
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
        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #45a049;
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
        
<h3 style="color:#30694B;"><i class="bi bi-person-fill-add"></i> Enter Wedding Details</h3>
    <div class="supplier-container">
        
        <form action="details.php" method="post" enctype="multipart/form-data">
            <div class="left">
                <div class="supplier-form-inner-box">
                    <label for="name"><i class="bi bi-gender-male"></i> Groom Name :</label>
                    <input type="text" id="name" name="groomname" placeholder="Enter Groom name" required>
                </div>
                <div class="supplier-form-inner-box">
                    <label for="name"><i class="bi bi-gender-female"></i> Bride Name :</label>
                    <input type="text" id="name" name="bridename" placeholder="Enter Bride name" required>
                </div>
                <div class="supplier-form-inner-box">
                    <label for="image"><i class="bi bi-card-image"></i> Weddding Image :</label>
                    <input type="file" id="image" name="pic"  required>
                </div>
                <div class="supplier-form-inner-box">
                    <label for="date"><i class="bi bi-calendar-heart"></i> Wedding Date :</label>
                    <input type="date" id="date" name="date" placeholder="Enter Wedding Date" required>
                </div>
                <div class="supplier-form-inner-box">
                    <label for="place"><i class="bi bi-geo-alt-fill"></i> Wedding Location :</label>
                    <input type="text" id="place" name="place" placeholder="Enter Wedding Location" required>
                </div>
                
            </div>
            <button class="btn" type="submit" name="submit" style="background-color: #30694B;"><i class="bi bi-database-add"></i> Enter Wedding Details</button>
        </form>
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

.supplier-form-inner-box input[type="text"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}
.supplier-form-inner-box input[type="date"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}
.supplier-form-inner-box input[type="file"] {
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
    display: block;
    width: 600px;
    padding: 10px;
    border: none;
    margin-left:70px;
    border-radius: 4px;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
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

</style>
</html>
