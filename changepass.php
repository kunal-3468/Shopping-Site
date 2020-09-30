<?php

session_start();
if(isset($_SESSION['cid'])){
	 echo "";
}else{
	
	header('location:change.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
<title>Change Password</title>
</head>
<body>
<div style="margin-top: 10%;" > 
<center>
<h1>Change Password</h1>
<form action="changepass.php" method="post">
  
    <table class="table" style="width: 40% ;">
        <tr>
		   <th>Enter New Password:</th>
           <th><input type="password" name="pass" id="pass" required></th>
		   <th><input type="checkbox" onclick="see()"> Show Password
        </tr>
		<tr>
		  <th colspan="2"><center><input type="submit" name="login" class="btn btn-success" value="Change Password"></center></th>
		</tr>
     </table>
</form>	 
</center>
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
  
 if(isset($_POST['login'])){
	 
	 include('db.php');

	  $pass=$_POST['pass'];
	  $aid= $_SESSION['cid'];
	  
	  $qry="UPDATE `userdata` SET `pass`='$pass' WHERE `Id`='$aid'";
	 
	  $run=mysqli_query($con,$qry);
	  
      if($run == true){
		   ?>
		   <script>  
			     alert("Password Changed Sucessfully.");
				 window.open('index.php','_self');
		   </script>
			<?php
			  session_destroy();
	  }else{
		  echo"Error !!";
	  } 
 }
?>