<?php

    $conn=mysqli_connect("localhost","root","","aqua");

    if(isset($_GET["delete_id"])) {
        $delete_id = $_GET['delete_id'];

        $query="DELETE FROM plants WHERE id=$delete_id";
        $result = mysqli_query($conn, $query);
        header("location:editproduct.php");
        exit();
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <title>Admin page</title>
</head>
<body style="background-color: #E8EFFA;">
    <div class="container " style="height: auto;margin-bottom: 50px;">
        <h2 style="text-align:center;margin-top:20px;color:#30694B;">PRODUCT DETAILS</h2>
        <br>
        <table class="table" style="margin-bottom: 50px;color: #555;
     font-weight: bold;
     
     border-collapse: collapse;
     border-spacing: 0;
     border-radius: 20px;
     border: none;
     box-shadow: 0 0 10px rgba(0, 0, 0, 0.685);  
     background-color: rgba(57, 160, 91, 0.363);
      margin-bottom: 20px;" >
            
                
                <tr>
                    <th class="th-left">ID</th>
                    <th style="width: 150px;text-align: center;">Image</th>
                    <th style="width: 150px;text-align: center;">Name</th>
                    <th style="width: 150px;text-align: center;">Stock</th>
                    <th style="width: 150px;text-align: center;">Description</th>
                    <th style="width: 150px;text-align: center;">Price</th>
                    <th class="th-right" style="text-align: center;">Action</th>
                    
                </tr>
            
                <?php

                    $query="SELECT * FROM plants";
                    $result=$conn->query($query);
                        while($row =$result->fetch_assoc()){                
                    ?>   
                    <tr>
                    <td style="text-align:center;" class="row-left"><?php echo $row['id']; ?></td>
                    <td style="text-align:center;"><img width="60" height="60" src="images/plants<?php echo $row['image']; ?>" ></td>
                        <td style="text-align:center;"><?php echo $row['name']; ?></td>
                        <td style="text-align:center;"><?php echo $row['stock']; ?></td>
                        <td ><input type="text" style="border: none;" value="<?php echo $row['description']; ?>"></td>
                        <td style="text-align:center;">Rs.<?php echo $row['price']; ?></td>
                        <td class="row-right"><button class="btn-edit" onclick="loadEditForm(<?php echo $row['id'];?>)"><i class="bi bi-pencil-square"></i>&nbsp;Edit</button></i>&nbsp;</a>&nbsp;<a href="?delete_id=<?php echo $row['id'];?>"class="btn-danger"><i class="bi bi-trash"></i> Delete</a></td>
                    <?php } ?>
        </table>
        <div id="editFormContainer"></div>
    </div>
    
</body>
<script>
     function loadEditForm(id) {
            $.ajax({
                url: 'editproduct2.php',
                type: 'GET',
                data: { edit_id: id },
                success: function(response) {
                    $('#editFormContainer').html(response);
                }
            });
        }


    </script>

<style>
    body{
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    font-family: sans-serif;
 }
   
 .th-right{
     border-top-right-radius: 20px;
 }
 .th-left{
     border-top-left-radius: 20px;
 }   
 .table th,
 .table td {
     padding: 8px;
     text-align: left;   
 }
 tr{
 border-bottom: none;
 
 }
 
 
 .table th{
     background-color:#30694B;
     height: 40px;
     color: white;
     transform: none;
    
 }
 
 
 .table tr:hover,.table tr:active,.table tr:focus{
 
     transform: scale(1.04);
     -webkit-transform: scale(1.04);
    cursor: pointer;
     background-color:rgba(57, 160, 91, 0.363);
     color:black;
     border: 2px;
     border-color: aliceblue;
     
 }
 
 .row-left{
     border-top-left-radius: 20px;
     border-bottom-left-radius: 20px;
 }
 .row-right{
     border-top-right-radius: 20px;
     border-bottom-right-radius: 20px;
    
 }
  
 .btn-danger {
    display: inline-block;
     padding: 8px 16px;
     text-align: center;
     text-decoration: none;
     color: #ffffff;
     border-radius: 4px;
     cursor: pointer;
     background-color: #30694B;
     border:none;
     border-radius: 10px;
     font-size: small;
     font-weight: lighter;
 }
 .btn-edit{
    display: inline-block;
     padding: 8px 16px;
     text-align: center;
     text-decoration: none;
     color: #ffffff;
     border-radius: 4px;
     cursor: pointer;
     background-color: #30694B;
     border:none;
     border-radius: 10px;
     font-size: small;
     font-weight: lighter;
 
 }
 .btn-create{
     display: inline-block;
     padding: 8px 16px;
     text-align: center;
     text-decoration: none;
     color: #ffffff;
     border-radius: 4px;
     cursor: pointer;
     background-color: #30694B;
     border:none;
     border-radius: 10px;
     margin-bottom: 10px;
 }
 .btn-create:hover,.btn-create:focus,.btn-create:active{
    color:wheat;
     transform: scale(1.1);
     -webkit-transform: scale(1.1);
     box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
 }
 .btn-danger:hover,.btn-danger:focus,.btn-danger:active{
    color:wheat;
     transform: scale(1.1);
     -webkit-transform: scale(1.1);
     box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
 }
 .btn-edit:hover,.btn-edit:focus,.btn-edit:active{
    color:wheat;
     transform: scale(1.1);
     -webkit-transform: scale(1.1);
     box-shadow: 0 0 10px rgba(0, 0, 0, 0.26);
 }
</style>
</html>