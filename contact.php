<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/contact.css">
    <title>Contact Us</title>
</head>
<body>
<div class="container-fluid">
<div id="gs">
        <table>
        <tr>
           <th><img src="images/gs.jpg" width="200px" height="200px"></th> 
           <th><h2 id="hg"> Goyal Sons</h2></th>
        </tr>
        </table>
</div> 
<div id="bo">
<center>
           <a class="ban" href="index.php">Home</a>
           <a class="ban" href="about.php">About Us</a>
           <a class="ban" href="contact.php">Contact Us</a>
           <a class="ban" href="help.php">Help</a>
</center>
</div>

<div>
<h1>Contact Us :</h1><br>
<form action="contact.php" method="post" style="margin-left: 1%;">

<div class="form-group">
     <label for="exampleFormControlInput1">Enter Full Name :-</label><br>  
     <input type="text" class="form-control inp" placeholder="Name" name="name" required>
</div>
<div class="form-group">
     <label for="exampleFormControlInput1">Enter Email Id :-</label><br>  
     <input type="email" class="form-control inp"  placeholder="Email Id" name="email" required>
</div>
<div class="form-group">
     <label for="exampleFormControlInput1">Mobile Number :-</label><br>  
     <input type="text" class="form-control inp"  placeholder="Mobile No." name="mob" required>
</div>
<div class="form-group">
     <label for="exampleFormControlTextarea1">Subject :-</label>
     <textarea class="form-control inp" rows="3" name="sub" placeholder="Write Something..." required ></textarea>
</div>
<input type="submit" value="Submit" name="submit" class="btn btn-success">
</form>
</div>
</div>
     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php

include('db.php');
if(isset($_POST['submit'])){

    $name=$_POST['name'];
    $email=$_POST['email'];
    $cont=$_POST['mob'];
    $sub=$_POST['sub'];

    $qry =" INSERT INTO `contact`(`name`, `email`, `cont`, `subject`) VALUES ('$name','$email','$cont','$sub') ";
    
    $run= mysqli_query($con,$qry);

    if($run==true){
        ?>
         <script>
             alert("We will contact you soon.");
             window.open('contact.php','_self');
         </script>
        <?php
    }else{
        echo "Error !!";
    }
}

?>