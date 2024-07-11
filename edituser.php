<?php

    $conn=mysqli_connect("localhost","root","","aqua");

    if(isset($_GET["delete_id"])) {
        $delete_id = $_GET['delete_id'];

        $query="DELETE FROM profile WHERE id=$delete_id";
        $result = mysqli_query($conn, $query);
        header("location:edituser.php");
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
    <title>display page</title>
</head>
<body style="background-color: #E8EFFA;" >
    <div class="container "   >
        <h2 style="text-align: center;">USER DETAILS</h2>
        <a class="btn-create" role="button"><i class="bi bi-person-add"></i>New User</a>
        <br>
        <table class="table"  >
            
                <tr>
                    <th class="th-left">ID</th>
                    <th>Fullname</th>
                    <th>Username</th>
                    <th>Gmail</th>
                    <th>Phone Number</th>
                    <th>Password</th>
                    
                    <th class="th-right">Action</th>
                    
                </tr>
            
                <?php

                    $query="SELECT * FROM profile";
                    $result=$conn->query($query);
                        while($row =$result->fetch_assoc()){                
                    ?>   
                    <tr>
                    <td class="row-left"><?php echo $row['id']; ?></td>
                        <td><?php echo $row['fullname']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['phno']; ?></td>
                        <td><?php echo $row['password']; ?></td>
                        <td class="row-right" ><button class="btn-edit" onclick="loadEditForm(<?php echo $row['id'];?>)"><i class="bi bi-pencil-square"></i>&nbsp;Edit</button>&nbsp;<a href="?delete_id=<?php echo $row['id'];?>"class="btn-danger "><i class="bi bi-trash"></i>&nbsp;Delete</a></td>
                    </tr>
                    
                    
                    <?php } ?>
        </table>
        <div id="editFormContainer"></div>
    </div>

    
</body>

    <script>
     function loadEditForm(id) {
            $.ajax({
                url: 'edit2.php',
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
    font-family: sans-serif;
 }
 #website-editFormContainer {
    margin-left: auto;
    margin-right: auto;
            width: 780px;
            height: 700px; /* Adjust height as needed */
            border: none; /* Remove iframe border */
            opacity: 1;
        }
 .table {
     color: #555;
     font-weight: bold;
     width: 780px;
     border-collapse: collapse;
     border-spacing: 0;
     border-radius: 20px;
     border: none;
     box-shadow: 0 0 10px rgba(0, 0, 0, 0.685);  
     background-color:rgba(57, 160, 91, 0.363) ;
      margin-bottom: 20px;
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
     text-align: center;   
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
     border: none;
     background-color: #30694B;
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
     transform: scale(1.1);
     -webkit-transform: scale(1.1);
     box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
     color:#D5AA4B;
 }
 .btn-danger:hover,.btn-danger:focus,.btn-danger:active{
     transform: scale(1.1);
     -webkit-transform: scale(1.1);
     box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
     color:#D5AA4B;
 }
 .btn-edit:hover,.btn-edit:focus,.btn-edit:active{
    color:#D5AA4B;
     transform: scale(1.1);
     -webkit-transform: scale(1.1);
     box-shadow: 0 0 10px rgba(0, 0, 0, 0.26);
 }
 
 
 .container {
   
    width:800px;
     
     padding-right:30px;
     padding-left: 30px;
     padding-top: 30px;
     margin-top: 50px;
     margin-left: auto;
    margin-right: auto;
 }
 
 
 </style>
</html>


