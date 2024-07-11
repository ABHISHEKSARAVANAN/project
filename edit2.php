<?php
$conn=mysqli_connect("localhost","root","","aqua");


if(isset($_POST["submit"])) {
    $id=$_POST['edit_id'];
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $phno = $_POST['phno'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "UPDATE profile SET fullname='$fullname', username='$username', email='$email', phno='$phno', password='$password' WHERE id=$id";

    if(mysqli_query($conn, $query)){
        echo "<script  type='text/javascript'>alert('User updated successfully');
         window.location.href='edituser.php'</script>";  
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User Details</title>
</head>
<body>
<div class="container1">
    <?php
    
$id = $_GET['edit_id'];

$query = "SELECT * FROM profile WHERE id = $id";
$result = mysqli_query($conn, $query);
while($user=mysqli_fetch_assoc($result)){
    ?>
    <div class="title" style="text-align: center;font-family:sans-serif; font-weight: bold;">EDIT USER DETAILS</div><br>
    <form  action="edit2.php" method="post" autocomplete="off" enctype="multipart/form-data">
        <div class="user-details">
            <div class="input-box">
                <input type="hidden" name="edit_id" value="<?php echo $id; ?>">
                <span class="details">Full Name : </span>
                <input class="textbox" type="text" name="fullname" value="<?php echo $user['fullname']; ?>" required>
            </div>
            <div class="input-box">
                <span class="details">User Name: </span>
                <input class="textbox" type="text" name="username" value="<?php echo $user['username']; ?>" required>
            </div>
            <div class="input-box">
                <span class="details">Email : </span>
                <input class="textbox" type="text" name="email" value="<?php echo $user['email']; ?>" required>
            </div>
            <div class="input-box">
                <span class="details">Phone Number : </span>
                <input class="textbox" type="number" name="phno" value="<?php echo $user['phno']; ?>" required>
            </div>
            <div class="input-box">
                <span class="details">Password : </span>
                <input class="textbox" type="text" name="password" value="<?php echo $user['password']; ?>" required>
            </div>
            <button  type="submit" name="submit" style="  margin: 5px 0% 0% 40%;
        width: 130px;
        height: 30px;
        background-color: #45a049;
        border-radius: 5px;
        border-color: transparent;
        color: white;
        font-weight: 500;">Update</button>
        </div>
    </form>
    <button onclick="goBack()" style="  margin: 5px 0% 0% 40%;
        width: 130px;
        height: 30px;
        background-color: #45a049;
        border-radius: 5px;
        border-color: transparent;
        color: white;
        font-weight: 500;">Back</button>

        <?php
        }?>
</div>
<script>
    function goBack() {
        window.history.back();
    }
</script>
</body>
<style>
    
    body {
        font-family: Arial, sans-serif;
        background-color: transparent;
        margin: 0;
        padding: 0;
    }

    .container1 {
        max-width: 500px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border: 2px solid #777777;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
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
    input[type="password"],
    input[type="number"],
    input[type="file"] {
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
        max-width: 600px;
        margin: 20px auto;
        padding: 10px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    

    button:hover {
        box-shadow: 0 0 5px rgb(0, 0, 0.5);
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
