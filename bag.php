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
    <link rel="stylesheet" href="css/bag.css">
    <title>Bag</title>
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

<div>
    <table class="table">
    <thead class="thead-dark">
      <tr>
      <th scope="col">S.No.</th>
      <th scope="col">Image</th>
      <th scope="col">Price</th>
      <th scope="col">Remove</th>
      </tr>
    </thead>
    <tbody>
     <?php
      include('db.php');

      $id=$_SESSION['aid'];

      $qry= " SELECT * FROM `tab_$id` ";
   
      $run= mysqli_query($con,$qry);

      $row= mysqli_num_rows($run);

      if($row<1){
        ?>
        <tr>
           <th colspan="4">No Products Yet !! </th>
        </tr>
       <?php
      }else{
        $c=0;
        $s=0;
        while($data= mysqli_fetch_assoc($run)){
          
          $pid= $data['pid'];

          $qry1 = " SELECT * FROM `product` WHERE `id`='$pid' ";

          $run1= mysqli_query($con,$qry1);

          $row1= mysqli_num_rows($run1);

          while($data1= mysqli_fetch_assoc($run1)){
            $c++;
             ?>
             <tr>
               <th><?php echo $c; ?></th>
               <th><img src="admin/dataimg/<?php echo $data1['image']; ?>" style="max-width: 150px;"> </th>
               <th><?php echo $data1['price']; 
                         $s = $s+ $data1['price']; ?></th>
               <th><a href="remove.php?pid=<?php echo $data['id']; ?>" class="btn btn-warning">Remove</a></th>
             </tr>
           <?php
        }
      }
        ?>
        <center><table class="table" style="width: 30%; border: 2px solid black; float: right; margin-right:30%; ">
        <tr> <th> No of Products : </th>
             <th> <?php echo $c; ?></th>
         </tr>
        <tr>
         <th>Total Price :</th>
         <th><?php echo $s; ?></th>
         </tr>
         <tr>
           <th colspan="2"><center><a href="buy.php" class="btn btn-success">Buy </a></center></th>
         </tr>
         </table></centter>
         <?php
         
      }
     ?>
     </tr>
    </tbody>
    </table>   
     </div>

     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
</body>
</html>