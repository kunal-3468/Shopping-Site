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
    
    $pid=$_REQUEST['pid'];
    $id=$_SESSION['aid'];


    $qry=" INSERT INTO `tab_$id` (`pid`,`img`, `descr`, `price`) SELECT `id`,`image`, `description`, `price` FROM `product` WHERE `id`='$pid' " ;


    $run= mysqli_query($con,$qry);

    if($run== true){
        ?>
           <script>
                  alert("Added To Bag."); 
                  window.open('login.php','_self');  
           </script>    
        <?php
    }else{
        echo "Error !!";
    }

?>