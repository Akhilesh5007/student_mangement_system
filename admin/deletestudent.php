<?php
session_start();
   if(isset($_SESSION['uid']))
   {
    
   }
   else
   {
    header('location:../login.php');
  }
  ?>

  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Update</title>
    <link rel="stylesheet" href="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

  </head>
  <body bgcolor="#ffff33">

    <div class="bg-success text-center ">
    <h1 id = "admin">Welcome to <?php echo $_SESSION['unam']; ?> Dashboard to  DELETE</h1>

</div>

  <div class="container">  
  <table class="table table-bordered text-center">
    
       <form action="deletestudent.php" method="post" enctype="multipart/form-data">
    <tbody>
      <tr>
        <th>Enter Standard</th>
        <td><input type="text" name="Sstandard" required="required" placeholder="Standard"></td>
      </tr>
      <tr>
        <th>Student Name</th>
        <td><input type="text" name="Sname" placeholder="Name"></td>
      </tr>
      <tr>
        <td align="center" colspan="2"><input type="submit" name="submit" value="login"></td>
      </tr></form>
    </tbody>
  </table>
</div>

 <div class="container">  
  <table class="table table-bordered text-center">
    
    <tbody>
        <tr style="background-color:#000;color: #fff;">
      <th>No</th>
      <th>Image</th>
      <th>Name</th>
      <th>Roll no</th>
      <th>City</th>
      <th>Parent Mob.</th>
      <th>Edit</th>
    </tr>

    <?php
if(isset($_POST['submit']))
{
     $con=mysqli_connect('localhost','root','','sms');
     if ($con==False)
     {
       echo "connection_aborted";
     }

  $standard=$_POST["Sstandard"];
  $name=$_POST["Sname"];
  
$qry="SELECT * FROM `student` where (standard='$standard' and name LIKE '%$name%')";

$run=mysqli_query($con, $qry);
  if(mysqli_num_rows($run)<1)
  {
    echo "<tr><td colspan='7'>No record found</td></tr>";
  }
  else
  {
    $count=0;
    while ($data=mysqli_fetch_assoc($run))
     {
      $count++;
      ?>
      <tr align="center">
      <td><?php echo $count; ?></td>
      <td><img src="../images/<?php echo $data['image'];  ?>" style="max-width:100px;max-height:100px"> </td>
      <td><?php echo $data['name'] ?></td>
      <td><?php  echo $data['rollno'] ?></td>
      <td><?php  echo $data['city'] ?></td>
      <td><?php  echo $data['pcon'] ?></td>
      <td>
      <a href="deleteform.php?sid=<?php echo $data['id']; ?>">Delete</a>
      </td>
      </tr >
      <?php
    }
  }
}
?>
 </tbody>
  </table>
</div>
<div class="container">
  <a class="btn btn-info btn-block" href="admindash.php">Back To Dash Board</a>
  <a class="btn btn-info btn-block" href="logout.php">Logout</a>
</div>
  </body>
  </html> 

  