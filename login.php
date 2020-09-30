<?php
session_start();

if(isset($_SESSION['aid'])){
   	echo "";
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
    <link rel="stylesheet" href="css/login.css">
    <title>Welcome To Goyal Sons</title>
</head>
<body>
<div class="container-fluid"> 
<div id="gs">
    <a style="float: right; margin-top: 5px; margin-right: 5px;" class="btn btn-danger" href="logout.php">Logout </a>
        <table>
        <tr>
           <th><img src="images/gs.jpg" width="200px" height="200px"></th> 
           <th><h2 id="hg"> Goyal Sons</h2></th>
        </tr>
        </table>
</div> 
<div>
<div class="btn-group w-100" role="group" aria-label="Basic example">
  <button type="button" class="btn btn-secondary " onclick="home()">Home</button>
  <button type="button" class="btn btn-secondary " onclick="bag()">Bag</button>
  <button type="button" class="btn btn-secondary " onclick="wishlist()">Wishlist</button>
</div>
</div>

<div style="margin-top: 1%;">

<div class="container">
<div class="row align-items-stretch justify-content-start card-deck">
<?php

include('db.php');

$qry=" SELECT * FROM `product` ";

$run=mysqli_query($con,$qry);

$row= mysqli_num_rows($run);

if($row<1){
  echo "<h2>No Products Yet</h2>";
}else{
    while($data= mysqli_fetch_assoc($run)){
    ?>
    
    <div class="col-md-4">
  <div class="card-deck"  style="width: 20rem;">
    <img src="admin/dataimg/<?php echo $data['image']; ?>" style="width: 20rem; height: 28rem" class="card-img-top img-responsive">
  <div class="card-body">
    <h5 class="card-title">Product Details :</h5>
    <p class="card-text"><?php echo $data['description']; ?></p>
    <h4>Price :- <?php echo $data['price']; ?></h4>
    <a href="addbag.php?pid=<?php echo $data['id']; ?>" class="btn btn-primary">Add To Bag</a>
    <a href="addwish.php?pid=<?php echo $data['id']; ?>" class="btn btn-primary">Add To Wishlist</a>
  </div>
  </div>
  </div>
<?php
    }
}
?>
</div>
</div>
</div>
</div>

<script>
   function home(){
    open('login.php','_self');
   }
   function bag(){
    open('bag.php','_self');
   }
   function wishlist(){
    open('wish.php','_self');
   }

</script>
    <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php

include('db.php');

$id=$_SESSION['aid'];

$qry1=" CREATE TABLE tab_$id ( id INT NOT NULL AUTO_INCREMENT PRIMARY KEY , 
       pid INT NOT NULL,
       img TEXT NOT NULL, 
       descr VARCHAR (300) NOT NULL,
       price	VARCHAR (20) NOT NULL 
        ); ";

$qry2=" CREATE TABLE wish_$id ( id INT NOT NULL AUTO_INCREMENT PRIMARY KEY , 
pid INT NOT NULL,
img TEXT NOT NULL, 
descr VARCHAR (300) NOT NULL,
price	VARCHAR (20) NOT NULL 
 ); ";

$run1= mysqli_query($con,$qry1);

$run2= mysqli_query($con,$qry2);

?>