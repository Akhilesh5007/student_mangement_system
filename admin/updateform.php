 <?php
session_start();
   if(isset($_SESSION['unam']))
   {
    echo "welcome ! ".$_SESSION['unam'];
   }
   else
   {
    header('location:../login.php');
  }
  ?>
<?php
$con=mysqli_connect('localhost','root','','sms');
if ($con==false)
{
	echo "connection_aborted";
} 
$sid=$_GET['sid'];
$sql="SELECT * FROM `student` where id='$sid'";
$run=mysqli_query($con,$sql);
$data=mysqli_fetch_assoc($run);
?>  
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<!-- <link rel="stylesheet" href=""> -->

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>
<body bgcolor="#fff33">
	<div class="admintitle" align="center">
 		<h4><a href="logout.php">logout</a></h4>
 		<h1>Welcome to  <?php echo $_SESSION['unam']; ?>  Dashboard to completly update</h1>
 	</div>
 	<form action="updatedata.php" method="post" enctype="multipart/form-data">
        <div class="container">  
  <table class="table table-bordered">
    
    <tbody>
      <tr>
      <td>Roll No</td>
      <td><input type="text" name="rollno" value="<?php echo $data['rollno']; ?>"></td>
    </tr>
    <tr>
      <td>Full Name</td>
      <td><input type="text" name="name"value="<?php echo $data['name']; ?>"></td>
    </tr>
    <tr>
      <td>City</td>
      <td><input type="text" name="city"value="<?php echo $data['city']; ?>"></td>
    </tr>
    <tr>
      <td>Parent contact Number</td>
      <td><input type="number" name="pmob" value="<?php echo $data['pcon']; ?>" required="requireed"></td>
    </tr>
    <tr>
      <td>Standard</td>
      <td><input type="text" name="standard"value="<?php echo $data['standard']; ?>"></td>
    </tr>
     <tr>
        <td>Image</td>
        <td><input type="file" name="simg" required="required"></td>
      </tr>
    <tr>
    <input type="hidden" name="sid" value=" <?php echo $data['id']; ?> " >
    </tr>
    <tr>
      <td colspan="2" align="center">
        <input type="submit" name="submit" value="fillup"></td>
    </tr>
    
    </tbody>
  </table>
</div>
 	</form>
  <div class="container" >
      
      <a class="btn btn-info btn-block" href="admindash.php">Back To Dash Board</a>
      <a class="btn btn-info btn-block" href="logout.php">Logout</a>
    </div>
</body>
</html>
