<?php
session_start();

if(isset($_SESSION['aid'])){
   	echo"";
}else{
	header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/wish.css">
    <title>Wishlist</title>
</head>
<body>

<div class="container-fluid"> 
<div id="gs">
    <a style="float: right; margin-top: 5px; margin-right: 5px;" class="btn btn-danger" href="login.php">Back </a>
        <table>
        <tr>
           <th><img src="images/gs.jpg" width="200px" height="200px"></th> 
           <th><h2 id="hg"> Goyal Sons</h2></th>
        </tr>
        </table>
</div>
</div>

<div style="margin-top: 1%;">

<div class="container">
<div class="row">

<?php

include('db.php');
    
     $id=$_SESSION['aid'];

      $qry= " SELECT * FROM `wish_$id` ";
   
      $run= mysqli_query($con,$qry);

      $row= mysqli_num_rows($run);   

      if($row<1){
          ?>
          <tr>
          <th><h3>No Products Yet </h3></th>
          </tr>
          <?php
      }else{
         
          while($data= mysqli_fetch_assoc($run)) {

           $pid= $data['pid'];

           $qry1 = " SELECT * FROM `product` WHERE `id`='$pid' ";

           $run1= mysqli_query($con,$qry1);

           $row1= mysqli_num_rows($run1);

           while($data1= mysqli_fetch_assoc($run1)){

            ?>
            <div class="col-md-4">
          <div class="card-deck"  style="width: 20rem;">
            <img src="admin/dataimg/<?php echo $data1['image']; ?>" style="width: 20rem; height: 28rem" class="card-img-top img-responsive">
          <div class="card-body">
            <h5 class="card-title">Product Details :</h5>
            <p class="card-text"><?php echo $data1['description']; ?></p>
            <h4>Price :- <?php echo $data1['price']; ?></h4>
            <a href="addbagwish.php?wid=<?php echo $data['id']; ?>" class="btn btn-primary">Add To Bag</a>
            <a href="removewish.php?rid=<?php echo $data['id']; ?>" class="btn btn-danger">Remove</a>
          </div>
          </div>
          </div>
         <?php
            }
          }
    }
?>

</div>
</div>
</div>
</div>
     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
    
</body>
</html>