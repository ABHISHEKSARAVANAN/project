<?php

    include("config.php");
    if(isset($_GET["delete_id"])) {
        $delete_id = $_GET['delete_id'];

        $query="DELETE FROM corosal WHERE id=$delete_id";
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>display page</title>
</head>
<body>
    <div class="container my-5">
        <h2>USER DETAILS</h2>
        <a class="btn btn-primary btn-sm" href="create.php" role="button">New User</a>
        <br>
        <table class="table" >
            
                <tr>
                    <th>ID</th>
                    <th>Product_name</th>
                    <th>Product_Image</th>
                    <th>Action</th>
                    
                </tr>
            
                <?php

                    $query="SELECT * FROM corosal";
                    $result=$conn->query($query);
                        while($row =$result->fetch_assoc()){                
                    ?>   
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['product']; ?></td>
                        <td><img width="60" height="60" src="images/<?php echo $row['image']; ?>" ></td>
                        <td><a href="edit.php?edit_id=<?php echo $row['id'];?>"class="btn btn-primary ">Edit</a></td>
                        <td><a href="?delete_id=<?php echo $row['id'];?>"class="btn btn-danger ">Delete</a></td>

                    </tr>
                    <?php } ?>
        </table>
    </div>
</body>
</html>