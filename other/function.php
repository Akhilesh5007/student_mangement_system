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
		<table width="80%" border="2" align="center">
			<tr>
				<th colspan="3" align="center">Student Information</th>
			</tr>
			<tr>
				<td rowspan="5"><img src="../images/ <?php echo $data['image']; ?>">  </td>
			</tr>
			<tr>
				<th>Roll no</th>
				<td><?php echo $data['rollno']; ?> </td>

				<th>Name</th>
				<td><?php echo $data['name']; ?> </td>

				<th>City</th>
				<td><?php echo $data['city']; ?> </td>
				<th>Standard</th>
				<td><?php echo $data['standard']; ?> </td>
				<th>parent mobile</th>
				<td><?php echo $data['pcon']; ?> </td>
			</tr>
		</table>

     <?php
	}
	 else
	  {
		echo " <script>alert('no student found')</script> ";
	   }


}
 ?>
