<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/stysignup.css">
    <title>Buy</title>
</head>
<body>
<div class="container-fluid">
<div>
<a href="bag.php" class="btn btn-danger" style="float: right;">Back</a>
<br>
<h2>Payment Form :</h2>
</div>

<div>

<form action="buy.php" method="post">
         
<div class="form-group">
         <label for="exampleFormControlInput1">Select Card :-</label><br>  
         <select class="form-control inp" name="card" required>
         <option value="Rupay">Rupay</option>
         <option value="Visa">Visa</option>
         <option value="Master">Master Card</option>
         </select>
         </div>
         <div class="form-group">
         <label for="exampleFormControlInput1">Name on Card :-</label><br>  
         <input type="text" class="form-control inp" placeholder="Username" name="name" required>
         </div>
         <div class="form-group">
         <label for="exampleFormControlInput1">Card Number:-</label><br>  
         <input type="number" class="form-control inp" placeholder="Card Number" name="cardno" required>
         </div>
         <div class="form-group">
         <label for="exampleFormControlInput1">CVV Number:-</label><br>  
         <input type="number" class="form-control inp" placeholder="Card Number" name="cvv" required>
         </div>
         <div class="form-group">
         <label for="exampleFormControlInput1">Expiry Date:-</label><br>  
         <input type="date" class="form-control inp" placeholder="Exp. Date" name="date" required>
         </div>
         <input type="submit" value="Pay" name="pay" class="btn btn-success">
</form>

</div>
</div>
</body>
</html>
<?php

include('db.php');

if(isset($_POST['pay'])){

    $card=$_POST['card'];
    $name=$_POST['name'];
    $cardno=$_POST['cardno'];
    $expdate=$_POST['date'];
    $cvv=$_POST['cvv'];

    $qry=" INSERT INTO `card`(`type`, `name`, `cardno`, `expdate`, `cvv`) VALUES ('$card','$name','$cardno','$expdate','$cvv') ";

    $run=mysqli_query($con,$qry);

    if($run==true){
        ?>
         <script>
         window.open('https://netbanking.hdfcbank.com/netbanking/?_ga=2.170048608.1935033966.1561100744-1644571816.1561100744','_self');
         </script>
        <?php
    }else{
        echo "Error !!";
    }

}


?>