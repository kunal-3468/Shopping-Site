<?php

session_start();
if(isset($_SESSION['cid'])){
   header('location:changepass.php');	
}else{
	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
<title>Change Password</title>
</head>
<body>
<div class="container-fluid">
<div style="padding: 0.5% ; ">
<a style="margin-bottom: 10% ; " style="float: left;" class="btn btn-dark" href="admin.php">Back</a>
</div>
<div>
<center>
<h1>Change Password</h1>
<form action="change.php" method="post">
     
    <table class="table" style="width: 40%;">
        <tr>
		   <th>Enter Current Username:</th>
           <th><input type="text" name="un" required></th>
        </tr>
        <tr>
		   <th>Enter Current Password:</th>
           <th><input type="password" name="pass" id="pass" required></th>
		   <th><input type="checkbox" onclick="see()"> Show Password
        </tr>
		<tr>
		  <th colspan="2"><center><input type="submit" name="login" class="btn btn-success" value="Submit"></center></th>
		</tr>
     </table>
</form>	 
</center>
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

     <script src="../js/jquery.js"></script>
     <script src="../js/bootstrap.min.js"></script>
</body>
</html>
<?php

include('../db.php');

if(isset($_POST['login'])){
	
     $name=$_POST['un'];
     $pass=$_POST['pass'];

     $query="SELECT * FROM `admin` WHERE `Username`='$name' AND `Password`='$pass' ";

     $run=mysqli_query($con,$query);
	 
	 $row=mysqli_num_rows($run);
	 
	 if($row<1){
		 
		 ?>   
		 <script>
		     alert("Incorrect Username & Password !!");
			 window.open('change.php','_self');
		 </script>
		 <?php
	 }else{
		   
		   $data=mysqli_fetch_assoc($run);
		   
		   $id=$data['Id'];
		   
		   $_SESSION['cid']=$id;
		   
		   header('location:changepass.php');	   
	 } 	
}
?>