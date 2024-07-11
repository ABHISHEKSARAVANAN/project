<?php
$conn=mysqli_connect("localhost","root","","wedding");

if(isset($_GET["delete_id"])) {
    $delete_id = $_GET['delete_id'];

    $query="DELETE FROM couples WHERE id=$delete_id";
    $result = mysqli_query($conn, $query);
    header("location:viewdetails.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="month" >
        <h1 style="text-align:center;color:#3F454A">Weddings Of June</h1>
        <div class="month-container" >
        <?php
    $query = "SELECT * FROM couples ";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) { ?>
            <form action="" method="post">
                <div class="inner-box">
                    <img src="images/couples/<?php echo $row["image"]; ?>" ><br><br>
                    <span style="color:pink;">═══════════════</span>
                      <div class="inner-box-text">
                    <span><h5>Groom: <?php echo $row["groomname"]; ?></h5></span>
                        <span><h5>Bride: <?php echo $row["bridename"]; ?></h5></span>  
                        <span><h5>Date: <?php echo $row["date"]; ?></h5></span>
                        <span><h5>Place: <?php echo $row["place"]; ?></h5></span>
                        <td class="row-right"><button class="btnedit" onclick="loadEditForm(<?php echo $row['id'];?>)"><i class="bi bi-pencil-square"></i>&nbsp;Edit</button></i>&nbsp;</a>&nbsp;<a href="?delete_id=<?php echo $row['id'];?>"class="btn-danger"><i class="bi bi-trash"></i> Delete</a></td>
                    
                        </div>
                </div>
            </form>
            <?php }
    }
    ?>
        </div>
    </div>
    
    <div id="editFormContainer"></div>
</body>
<script>
     function loadEditForm(id) {
            $.ajax({
                url: 'editwedding.php',
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
     .month{
       width: 100%;
       height:600px;
     
       margin-bottom: 30px;
   }
   .month-container{
       width:90%;
       height: 450px;
       margin-left: auto;
       margin-right: auto;
       margin-top: 30px;
       justify-content: space-evenly;
       display: flex;
       gap: 10px;
   }
   .inner-box {
    margin-top: 20px;
    border: 2px solid pink;
    background-color: white;  
    border-radius:5px;
    padding: 10px;
    text-align: center;
    height: 330px;
    width: 200px;
}
.inner-box .inner-box-text{
    text-align: left;
    width: 200px;
    height: auto;
    padding-left: 50px;
}
.inner-box img {
    width: 120px;
    height: 120px;
    
}

.inner-box h5 {
    margin: 10px 0;
    font-weight: 500;
    font-size: small;
}

.inner-box input[type="number"] {
    width: 50px;
    text-align: center;
}

.inner-box-add-to-cart {
    margin-top: 10px;
    border:none;
    background-color: #30694B;
    color: white;
    border-radius: 3px;
}
.inner-box-add-to-cart:hover,.inner-box-add-to-cart:focus,.inner-box-add-to-cart:active{
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
    transition-duration: 0.3s;
}
.inner-box img:hover,.inner-box img:active,.inner-box img:focus{
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
    transition-duration: 0.3s;
    color: rgb(13, 15, 38);
}
.btnedit{
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
 .btn-danger {
    display: inline-block;
     padding: 8px 16px;
     text-align: center;
     text-decoration: none;
     color: #ffffff;
     border-radius: 4px;
     cursor: pointer;
     background-color: red;
     border:none;
     border-radius: 10px;
     font-size: small;
     font-weight: lighter;
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
 .btnedit:hover,.btnedit:focus,.btnedit:active{
    color:wheat;
     transform: scale(1.1);
     -webkit-transform: scale(1.1);
     box-shadow: 0 0 10px rgba(0, 0, 0, 0.26);
 }

</style>
</html>