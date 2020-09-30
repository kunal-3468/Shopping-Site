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

$pid= $_REQUEST['pid'];
$id=$_SESSION['aid'];

$qry=" DELETE FROM `tab_$id` WHERE `id`='$pid' ";

$run= mysqli_query($con,$qry);

if($run== true){
    ?>
      <script>
        alert("Product Removed from Bag.");
       window.open('bag.php','_self');   
      </script>
    <?php
}else{
    echo "Error.";
}
?>