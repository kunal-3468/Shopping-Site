<?php
session_start();

if(isset($_SESSION['aid'])){
   header('location: login.php');	
}else{
	
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styleind.css">
    <title>Goyal Sons</title>
</head>
<body>
<div class="container-fluid">
   <form action="admin/admin.php" method="post">
   <div style="padding: 0.5%;">
   <button type="button" style="float: right;" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Admin Login</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Admin Login :</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Username:-</label>
            <input type="text" name="name" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Password:</label>
            <input type="password" name="pass" class="form-control" id="pass" id="recipient-name">
            <input type="checkbox" onclick="see1()">Show Password
          </div>
        </form>
      </div>
      <div class="modal-footer">
      <input type="submit" class="btn btn-success" name="login" value="Login">
      </div>
    </div>
  </div>
  </div>
  </form>
   </div>
   <div id="gs">
        <table>
        <tr>
           <th><img src="images/gs.jpg" width="200rem" height="200rem"></th> 
           <th><h2 style="font-family: 'Permanent Marker'; font-size: 4.5em; margin-left: 20rem; "> Goyal Sons</h2></th>
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
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/cl1.jpg" class="d-block w-100 h-75" alt="images/cl1.jpg">
    </div>
    <div class="carousel-item">
      <img src="images/cl2.jpg" class="d-block w-100 h-75"  alt="images/cl2.jpg">
    </div>
    <div class="carousel-item">
      <img src="images/cl3.jpg" class="d-block w-100 h-75" alt="images/cl3.jpg">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>

<div>

<form action="index.php" method="post" >
<center><div class="card" style="height: 70%;">
  <div class="card-header " >
    Welcome User
  </div>
  <div class="card-body" >
  <table class="table">
       <tr>
         <th>Enter Username</th>
         <th><input type="text" placeholder="Username" name="na" required></th>
       </tr>
       <tr>
         <th>Enter Password</th>
         <th><input type="password" placeholder="Password" name="pa" id="pass1" required></th>
         <th><input type="checkbox" onclick="see()"> Show Password
       </tr>
    </table>
    <input type="submit" name="login" value="Login" class="btn btn-success">
    <a href="signup.php" class="btn btn-primary">Sign Up</a><br><br>
    <a href="change.php">Change Password</a>
  </div>
</div></center>
</form> 

</div>
</div>

<script>
         function see(){
			 
			 var a= document.getElementById("pass1");
			 
			 if(a.type==="password"){
				 
				 a.type="text";
			 }else{
				 a.type="password";
			 }
		 }
    
     function see1(){
			 
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
  if(isset($_POST['login'])){

       $name=$_POST['na'];
       $pass=$_POST['pa'];

       $qry="SELECT * FROM `userdata` WHERE `name`='$name' AND `pass`='$pass' ";

       $run= mysqli_query($con,$qry);

       $row=mysqli_num_rows($run);

       if($row<1){
        ?>   
        <script>
            alert("Incorrect Username & Password !!");
            window.open('index.php','_self');
        </script>
        <?php
       }else{
        $data=mysqli_fetch_assoc($run);
		   
        $id=$data['id'];
        
        $_SESSION['aid']=$id;
 
        ?>
        <script>
         window.open("login.php",'_self');
        </script>
        <?php
       }

  }
?>