<?php

 session_start();
 
 if(isset($_SESSION['uid'])){
	echo"";
	 }else{
	 header('location: admin.php');
 }
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
    <a style="float: right; margin-top: 5px; margin-right: 5px;" class="btn btn-danger" href="admindash.php">Back </a>
        <table>
        <tr>
           <th><img src="../images/gs.jpg" width="200px" height="200px"></th> 
           <th><h2 id="hg"> Goyal Sons</h2></th>
        </tr>
        </table>
    </div>
<div class="di2">
    <form action="addpro.php" method="post" enctype="multipart/form-data">
         
<div class="card" style="width: 50%; margin:auto; ">
  <h5 class="card-header">Add Product Details :- </h5>
  <div class="card-body">
     <table class="table">
      <tr>
        <th>Select Image :- &nbsp &nbsp</th>
        <th>     
         <input type="file" class="form-control" name="img" required>
        </th>
        </tr>
        <tr>
          <th>Description :- &nbsp &nbsp</th>
          <th><textarea class="form-control" rows="2" name="desc" required></textarea></th>
        </tr>
        <tr>
           <th>Price :- &nbsp &nbsp</th>
           <th><input type="text" class="form-control" name="price" placeholder="Price" required></th> 
        </tr>
        <tr>
       <th colspan="2"><center><input type="submit" value="Add" name="add" class="btn btn-primary"></center></th>
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

<?php

include('../db.php');

if(isset($_POST['add'])){

       $descr= $_POST['desc'];
       $price= $_POST['price'];
       $picname= $_FILES['img']['name'];
       $temppic= $_FILES['img']['tmp_name'];

       move_uploaded_file($temppic,"dataimg/$picname");

       $qry="INSERT INTO `product`(`image`, `description`, `price`) VALUES ('$picname','$descr','$price') ";
       
       $run= mysqli_query($con,$qry);

       if($run == true){
           ?>
              <script>
              alert("Product Dtails Inserted Successfully.");
              window.open('addpro.php','_self');
              </script>
           <?php
       }else{
           echo"Error !!";
       }
}
?>