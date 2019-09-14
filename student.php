<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Student Managment System</title>
	<link rel="stylesheet" href="">

	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js">
  </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
  </script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 -->
</head>
<body>
	<h1 class="badge-success text-center  m">Welcome  Student  </h1>
	<form action="student.php" method="post">
		<div class="container">  
  <table class="table table-bordered">
    
    <tbody class="text-dark">
    	<tr>
				<td align="center" colspan="2">Student Information.</td>
			</tr>
			<tr>
				<td>Choose Standard.</td>
				<td>
					<select name="std">
					<option value="1">1st</option>
					<option value="2">2nd</option>
					<option value="3">3rd</option>
					<option value="4">4th</option>
					<option value="5">5th</option>
					<option value="6">6th</option>
					<option value="7">7th</option>
					<option value="8">8th</option>
					<option value="9">9th</option>
					<option value="10">10th</option>
					<option value="11">11th</option>
					<option value="12">12th</option>
					<option value="Btech">Btech</option>
					<option value="other">Other</option>
				</select>
			</td>
			</tr>
			<tr>
				<td>Enter Roll Number.</td>
				<td>
					<input type="number" name="rolno" placeholder="Roll no" required="required"></td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<button class="btn btn-success " type="submit" name="submit">Show Info</button>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
      <a class="btn btn-success " href="index.php">Home</a>
				</td>
			</tr>
    </tbody>
  </table>
</div>
</form>
</body>
</html>
<?php 
if(isset($_POST['submit']))
{
  $standardd=$_POST["std"];
  $rllno=$_POST["rolno"];
  include('dbcon.php');
  // include('function.php');
  showdetails($standardd,$rllno);
}
 ?>
 <?php 
   function showdetails($standardd,$rllno)
{
$con=mysqli_connect('localhost','root','','sms');
if ($con == false)
{
	echo "connection_aborted";
}

$sq="SELECT * FROM `student` where (rollno='$rllno' and standard='$standardd')"; 
	$run=mysqli_query($con,$sq);
	 
	if(mysqli_num_rows($run)>0)
	{
      $data=mysqli_fetch_assoc($run);		
      ?>


	<div class="container" id="print">  
	 <table class="table table-bordered">
    <tbody class="text-center">

		<tr>
			<th colspan="3" >Student Information</th>
		</tr>
		<tr>
			<td rowspan="6">
				<img class="rounded-circle" src="images/<?php echo $data['image'];?>" height="200px" width="150px">
			</td>	
		</tr>
		<tr>
			<th>Roll no</th>
				<td><?php echo $data['rollno']; ?> </td>
		</tr>
		<tr>
			
				<th>Name</th>
				<td><?php echo $data['name']; ?> </td>
		</tr>
		<tr>
			<th>City</th>
				<td><?php echo $data['city']; ?> </td>
		</tr>

		<tr>
			<th>Standard</th>
				<td><?php echo $data['standard']; ?> </td>
		</tr>

		<tr>

				<th>Parent mobile</th>
				<td><?php echo $data['pcon']; ?> </td>
			
		</tr>
    </tbody>
  </table>
</div>
 <div class="p-2" align="center">
  <button class="btn btn-info btn-sm p-md-3 " onclick="fun('print')">Print
<!-- <span class="glyphicon glyphicon-print p-md-3 "></span> --></button>
   </div>    
     <?php
	}
	 else
	  {
		echo " <script>alert('no student found')</script> ";
	   }


}
 ?>     
  <script type="text/javascript">
  	function fun(parvalue)
  	{
  		var backup=document.body.innerHTML;
  		var divcontent=document.getElementById(				
  			parvalue).innerHTML;
  		document.body.innerHTML=divcontent;
  		window.print();
  		document.body.innerHTML=backup;
  	}
  </script>