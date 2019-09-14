<?php
$con=mysqli_connect('localhost','root','','sms');
if ($con == false)
{echo "connection_aborted";}
$query="SELECT * FROM `student`";
$run=mysqli_query($con,$query);
 ?>
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
  <div class="container" id="print">  
  <table class="table table-bordered text-center">
    
    <tbody>
        <tr style="background-color:#000;color: #fff;">
      <th>No</th>
      <th>Image</th>
      <th>Name</th>
      <th>Roll no</th>
      <th>City</th>
      <th>Parent Mob.</th>
      
    </tr>
    <?php 
    $count=0;
      while($data=mysqli_fetch_assoc($run))
      { $count++;
    ?>
    <tr align="center">
      <td><?php echo $count; ?></td>
      <td>
      <img src="../images/<?php echo $data['image'];  ?>" style="max-width:100px;max-height:100px">
      </td>
      <td><?php echo $data['name'] ?></td>
      <td><?php  echo $data['rollno'] ?></td>
      <td><?php  echo $data['city'] ?></td>
      <td><?php  echo $data['pcon'] ?></td>
    </tr >
    <?php 
     }
    ?>

    </tbody>
  </table>
</div>
 <div class="p-2" align="center">
  <button class="btn btn-info btn-sm p-md-3 " onclick="fun('print')">Print
<!-- <span class="glyphicon glyphicon-print p-md-3 "></span> --></button>
   </div>  

 <div class="container" >
      <a class="btn btn-info btn-block" href="admindash.php">Back To Dash Board</a>
      <a class="btn btn-info btn-block" href="logout.php">Logout</a>
    </div>
</body>
</html> 
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