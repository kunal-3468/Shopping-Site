<?php
 session_start();
 
 if(isset($_SESSION['uid'])){
	echo"";

	 }else{
	 header('location:../index.php');
 }
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/admindash.css">
<title>Admin Dashboard</title>
</head>
<body>
<div class="container-fluid">
<div id="wel">
   <div style="padding: 0.5%;">
     <input type="button" value="Logout" class="btn btn-danger" onclick="lo()" id="but">
   </div>
<h1 align="center">Admin Dashboard</h1>
</div>

<div>
	<table class="table">
	     <tr>
		     <th class="no">1.</th>
			 <th class="anc"><a href="addpro.php">Insert Product Details</a></th>
		 </tr>
		 <tr>
		     <th class="no">2.</th>
			 <th class="anc"><a href="update.php">Update Product Details</a></th>
		 </tr>
		 <tr>
		     <th class="no">3.</td>
			 <th class="anc"><a href="delete.php">Delete Product Details</a></th>
		 </tr>
	 </table>
</div>
<center><a href="change.php" class="btn btn-secondary">Change Password</a></center>
</div>
<script>

     function lo(){
		 window.open('../index.php','_self');
	 }

</script>

     <script src="../js/jquery.js"></script>
     <script src="../js/bootstrap.min.js"></script>
</body>
</html>