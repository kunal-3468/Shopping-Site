<?php

session_start();

if(isset($_SESSION['uid'])){
   header('location:admindash.php');	
}else{
	
}
?>
<?php

include('../db.php');

if(isset($_POST['login'])){
	
     $name=$_POST['name'];
     $pass=$_POST['pass'];

     $query="SELECT * FROM `admin` WHERE `Username`='$name' AND `Password`='$pass'";

     $run=mysqli_query($con,$query);
	 
	 $row=mysqli_num_rows($run);
	 
	 if($row<1){
		 
		 ?>   
		 <script>
		     alert("Incorrect Username & Password !!");
			 window.open('../login.php','_self');
		 </script>
		 <?php
	 }else{
		   
		   $data=mysqli_fetch_assoc($run);
		   
		   $id=$data['Id'];
		   
		   $_SESSION['uid']=$id;
		   
		   header('location:admindash.php');
	 }
	 	
}	

?>