<?php

include('../db.php');

$pid= $_REQUEST['pid'];

$qry=" DELETE FROM `product` WHERE `id`='$pid' ";

$run= mysqli_query($con,$qry);

if($run== true){
    ?>
      <script>
        alert("Product Deleted.");
        window.open('delete.php','_self');   
      </script>
    <?php
}else{
    echo "Error.";
}
?>