<?php

 session_start();
 
 if(isset($_SESSION['uid'])){
	echo"";
 }else{
	 header('location: admin.php');
 }
?>
<?php
 
  include('../db.php'); 

  $pid=$_REQUEST['pid'];

  $qry= " SELECT * FROM `product` WHERE `id`='$pid' ";

  $run= mysqli_query($con,$qry);

  $data= mysqli_fetch_assoc($run);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/addpro.css">
    <title>Add Product</title>
</head>
<body>
<div class="container-fluid">
<div id="gs">
    <a style="float: right; margin-top: 5px; margin-right: 5px;" class="btn btn-danger" href="update.php">Back </a>
        <table>
        <tr>
           <th><img src="../images/gs.jpg" width="200px" height="200px"></th> 
           <th><h2 id="hg"> Goyal Sons</h2></th>
        </tr>
        </table>
    </div>
<div class="di2">
<form action="upd.php" method="post" enctype="multipart/form-data">
         
<div class="card" style="width: 50%; margin:auto; ">
  <h5 class="card-header">Add Product Details :- </h5>
  <div class="card-body">
     <table class="table">
      <tr>
        <th>Select Image :- &nbsp &nbsp</th>
        <th>     
        <input type="file" class="form-control" name="img" required><span><?php echo $data['image']; ?></span>
        </th>
        </tr>
        <tr>
         <th>Description :- &nbsp &nbsp</th>
         <th><textarea class="form-control" rows="3" name="desc" placeholder="Description" ><?php echo $data['description']; ?></textarea></th>
        </tr>
        <tr>
         <th>Price :- &nbsp &nbsp</th>
         <th><input type="text" class="form-control" name="price" value="<?php echo $data['price']; ?>" placeholder="Price" required></th> 
        </tr>
        <tr>
         <th><input type="hidden" value="<?php echo $data['id']; ?>" name="pid"></th>
         <th><input type="submit" value="Update" name="update" class="btn btn-primary"></th>
       </tr>
  </div>
</div>

</form>
</div>
</div>   
     <script src="../js/jquery.js"></script>
     <script src="../js/bootstrap.min.js"></script>
</body>
</html>