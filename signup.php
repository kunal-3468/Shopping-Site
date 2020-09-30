<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/stysignup.css">
    <title>Sign Up</title>
</head>
<body>
<div class="container-fluid">
<div>
   <h1>Sign Up Form : </h1><br>
</div>
<div>
     <form action="signup.php" method="post">
         
     <div class="form-group">
     <label for="exampleFormControlInput1">Enter Username :-</label><br>  
     <input type="text" class="form-control inp" placeholder="Username" name="name" required>
     </div>
     <div class="form-group">
     <label for="exampleFormControlInput1">Enter Email Id :-</label><br>  
     <input type="email" class="form-control inp"  placeholder="Email Id" name="email" required>
     </div>
     <div class="form-group">
     <label for="exampleFormControlInput1">Enter Mobile Number :-</label><br>  
     <input type="text" class="form-control inp" placeholder="Mobile Number" name="mob" required>
     </div>
     <div class="form-group">
     <label for="exampleFormControlInput1">Enter Password :-</label><br>  
     <input type="password" class="form-control inp" id="pass" placeholder="Password" name="pass" required>
     <input type="checkbox" onclick="see()">Show Password
     </div>
     <label for="exampleFormControlInput1">Select Gender :- </label> <br> 
     <div class="form-check form-check-inline">
     <input class="form-check-input" type="radio" name="gender" value="male">
     <label class="form-check-label" for="inlineRadio1">Male</label>
     </div>
     <div class="form-check form-check-inline">
     <input class="form-check-input" type="radio" name="gender" value="female">
     <label class="form-check-label" for="inlineRadio2">Femele</label>
     </div>
     <div class="form-check form-check-inline">
     <input class="form-check-input" type="radio" name="gender" value="other" >
     <label class="form-check-label" for="inlineRadio3">other</label>
     </div>
     <div class="form-group">
     <label for="exampleFormControlTextarea1">Enter Address :-</label>
     <textarea class="form-control inp" rows="2" name="add" required></textarea>
     </div>
     
     <input type="submit" value="Sign Up" name="signup" class="btn btn-primary">

     </form>
</div>
</div>
    <script>
      function see(){
			 
			 var a= document.getElementById("pass");
			 
			 if(a.type==="password"){
				 
				 a.type="text";
			 }else{
				 a.type="password";
			 }
		 }

    </script>

     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
</body>
</html>

<?php

 include('db.php');
 if(isset($_POST['signup'])){

    $name=$_POST['name'];
    $email=$_POST['email']; 
    $mob=$_POST['mob'];
    $pass=$_POST['pass'];
    $gen=$_POST['gender'];
    $add=$_POST['add'];

    $qry="INSERT INTO `userdata`(`name`, `cont`, `address`, `gender`, `email`, `pass`) VALUES ('$name','$mob','$add','$gen','$email','$pass')";

    $run= mysqli_query($con,$qry);

    if($run == true){     
        ?>   
        <script>
            alert("Successfully Sign Up");
            window.open('index.php','_self');
        </script>
        <?php
    }else{
        echo"Error !!";
    }

 }

?>