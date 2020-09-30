<?php
session_start();

if(isset($_SESSION['aid'])){
   	echo"";
}else{
	header('location:index.php');
}
?>
<?php

include('db.php');

$rid= $_REQUEST['rid'];
$id=$_SESSION['aid'];

$qry=" DELETE FROM `wish_$id` WHERE `id`='$rid' ";

$run= mysqli_query($con,$qry);

if($run== true){
    ?>
      <script>
        alert("Product Removed from Wishlist.");
       window.open('wish.php','_self');   
      </script>
    <?php
}else{
    echo "Error.";
}
?>