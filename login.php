<?php 
session_start();
if(isset($_SESSION['uid']))
{
	header('Location:admin/admindash.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Admin login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
	<h1 class="text-center bg-secondary text-white">Admin Login.</h1>
	<form action="login.php" method="post">
	<div class="container">  
    <table class="table table-bordered">
    <tbody>
    <tr>
    	<td>User Name</td>
        <td>
        	<input type="text" name="uname" placeholder="Username" >
        </td>
	</tr>
	<tr>
    	<td>Mobile</td>
        <td>
        	<input type="text" name="umob" placeholder="Mobile" >
        </td>
	</tr>
    <tr>
		<td>Password</td>
		<td>
			<input type="password" name="pass" placeholder="Password">
			<marquee class="text-danger po">Password include Capital & small Letter with Symbols</marquee>
		</td>
	</tr>
	<tr>
	    <td colspan="2"align="center">
	    	<input class="btn btn-block btn-secondary" type="submit" name="login" value="login">
	    </td>
	</tr>
	
	    	
	
    </tbody>
    </table>
</div>
</form>
 <div class="container">
 	<a class="btn btn-secondary btn-block" href="forgot.php">forgot</a>
 </div>
</body>   
</html>
<?php 
$date=date('D /M / d /m /Y',time());
?>
<div class="text-center">
<?php echo ($date);?>
</div>

<?php
$con=mysqli_connect('localhost','root','','sms');
if($con==false)
{
echo "connection error";
}

if(isset($_POST['login']))
{
	$usernam=$_POST['uname'];
	$usermob=$_POST['umob'];
	$userpass=$_POST['pass'];

	// $selectdata="SELECT * FROM `admin` where (username='$usernam' and password='$userpass')";
	$selectdata="SELECT * FROM `admin` WHERE (username='$usernam' AND mobile='$usermob' AND password='$userpass')";
	$run=mysqli_query($con,$selectdata);
	$row=mysqli_num_rows($run);
	if($row < 1)
	{
		?>
		<script>
		alert('Username or password not Match!!');
		window.open('login.php','_self');
		</script>
		<?php
	}
	else
	{


		$data=mysqli_fetch_assoc($run);
		$id=$data['id'];
		$name=$data['username'];
		$_SESSION['uid']=$id; //array with name uid
		$_SESSION['unam']=$name; //array with name uname
		header('location:admin/admindash.php');
		// now we redirect on admin dash
	}
}
 ?>
