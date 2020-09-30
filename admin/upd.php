<?php

include('../db.php');

if(isset($_POST['update'])){

       $descr= $_POST['desc'];
       $price= $_POST['price'];
       $pid=$_POST['pid'];
       $picname= $_FILES['img']['name'];
       $temppic= $_FILES['img']['tmp_name'];

       move_uploaded_file($temppic,"dataimg/$picname");

       $qry="UPDATE `product` SET `image`='$picname',`description`='$descr',`price`='$price' WHERE `id`='$pid' ";
       
       $run= mysqli_query($con,$qry);

       if($run == true){
           ?>
              <script>
              alert("Product Dtails Updated Successfully.");
              window.open('update.php','_self');
              </script>
           <?php
       }else{
           echo"Error !!";
       }
}


?>