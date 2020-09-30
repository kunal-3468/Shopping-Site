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
    <title>Edit Product</title>
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
    <div>
    <table class="table">
    <thead class="thead-dark">
      <tr>
      <th scope="col">Image</th>
      <th scope="col" style="width: 40%;">Description</th>
      <th scope="col">Price</th>
      <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
    <?php
   include('../db.php');

   $qry=" SELECT * FROM `product` ";

   $run= mysqli_query($con,$qry);

   $row= mysqli_num_rows($run);

   if($row<1){
       ?>
        <script>
         alert("No data yet");
         window.open('admindash.php','_self');
        </script>
       <?php
   }else{

       while( $data=mysqli_fetch_assoc($run) ){
        ?>
         <tr>
            <th><img src="dataimg/<?php echo $data['image']; ?>" style="max-width: 100px;"> </th>
            <th><?php echo $data['description']; ?></th>
            <th><?php echo $data['price']; ?></th>
            <th><a href="deletepro.php?pid=<?php echo $data['id'];  ?> "class="btn btn-danger">Delete</a></th>
         </tr>
        <?php           
        }
     }
   ?>
    </tbody>
    </table>   
     
     </div>
</div>
     <script src="../js/jquery.js"></script>
     <script src="../js/bootstrap.min.js"></script>
</body>
</html>