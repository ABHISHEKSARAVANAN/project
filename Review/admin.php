<?php

    $conn=mysqli_connect("localhost","root","","review");

    if(isset($_GET["delete_id"])) {
        $delete_id = $_GET['delete_id'];

        $query="DELETE FROM parts WHERE id=$delete_id";
        $result = mysqli_query($conn, $query);
        header("location:admin.php");
        exit();
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ad.css">
    <title>display page</title>
</head>
<body style="  background-image: url('images/background.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed; 
    background-size: 100% 100%;">
    <div class="container " style="height: auto;margin-bottom: 50px;">
        <h2>PRODUCT DETAILS</h2>
        <a class="btn-create" href="insert.php" role="button">New Product</a>
        <br>
        <table class="table" style="margin-bottom: 50px;" >
            
                
                <tr>
                    <th class="th-left">ID</th>
                    <th style="width: 150px;text-align: center;">Productname</th>
                    <th style="width: 150px;text-align: center;">Price</th>
                    <th style="width: 150px;text-align: center;">Quantity</th>
                    <th style="width: 150px;text-align: center;">Productimage</th>
                    <th class="th-right" style="text-align: center;">Action</th>
                    
                </tr>
            
                <?php

                    $query="SELECT * FROM parts";
                    $result=$conn->query($query);
                        while($row =$result->fetch_assoc()){                
                    ?>   
                    <tr>
                    <td class="row-left"><?php echo $row['id']; ?></td>
                        <td><?php echo $row['productname']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td><img width="60" height="60" src="images/<?php echo $row['productimage']; ?>" ></td>
                        <td><a href="edit.php?edit_id=<?php echo $row['id'];?>"class="btn-edit ">Edit</a>&nbsp;<a href="?delete_id=<?php echo $row['id'];?>"class="btn-danger">Delete</a></td>
                        

                    
                    <?php } ?>
        </table>
    </div>
</body>
</html>