<?php
session_start();
if(isset($_SESSION['unam']))
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
    <title></title>
    <link rel="stylesheet" href="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    
</head>
<body bgcolor="#fff33">
    <div class="admintitle" align="center">
    <h1>Welcome to <?php echo $_SESSION['unam']; ?> Dashboard To Insert Data</h1>
    </div>
    <form action="addstudent.php" method="post" enctype="multipart/form-data">
    <div class="container">
        <table class="table table-striped ">
        <tbody>
            <tr>
              <td>Roll No</td>
              <td><input type="text" name="rollno" placeholder="Rollno."></td>
            </tr>
            <tr>
              <td>Full Name</td>
              <td><input type="text" name="name" placeholder="Full Name"></td>
            </tr>
            <tr>
              <td>City</td>
              <td><input type="text" name="city"placeholder="City"></td>
            </tr>
            <tr>
              <td>Parent contact Number</td>
              <td><input type="number" name="pmob" placeholder="Contact"required="requireed"></td>
            </tr>
            <tr>
              <td>Standard</td>
              <td><input type="text" name="standard"placeholder="Standard"></td>
            </tr>
            <tr>
              <td>Image</td>
              <td><input type="file" name="simg"></td>
            </tr>
            <tr>
              <td colspan="2" align="center">
                <input type="submit" name="submit" value="fillup">
              </td>
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
<?php
if(isset($_POST['submit']))
{
$con=mysqli_connect('localhost','root','','sms');
if ($con==False)
{
echo "connection_error!";
}
$rollno=mysqli_real_escape_string($con , $_POST["rollno"])  ;
$name=$_POST["name"];
$city=$_POST["city"];
$pcon=$_POST["pmob"];
$standard=$_POST["standard"];
$imagename=$_FILES['simg']['name'];
$tempname=$_FILES['simg']['tmp_name'];
move_uploaded_file($tempname,"../images/$imagename");
$qry="INSERT INTO `student`  (`rollno`, `name`, `city`, `pcon`, `standard`,`image`) VALUES ('$rollno','$name','$city','$pcon','$standard','$imagename')";
$run=mysqli_query($con, $qry);
if($run == true)
{
?>
<script>
alert('data insert suceessfully')   
</script>
<?php
}
else
{
echo "not done";
}

// $sqls="SELECT `image` FROM `student` order by id desc limit 1";
// $res=mysqli_query($con,$sqls);
// if (mysqli_num_rows($res)>0) 
// {
//         while ($row=mysqli_fetch_assoc($res))
//         {
//           $path=$row[`image`];
//           echo "<img src='image' alt='image'>";
//         }   
// }







}
?>



<!-- 
<form action="load.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="file" >
    <input type="submit" value="Upload Image" name="submit">
</form>
 -->
