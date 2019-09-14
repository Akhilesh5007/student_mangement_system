<?php
session_start();
if(isset($_SESSION['unam'])==false)
{
    header('location:../login.php');
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Student Managment System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  </head>
<body>
    <div align="center">
    <h1 class="bg-info">Welcome to <?php echo $_SESSION['unam']; ?> Dashboard</h1>
    </div>
   
    <div>
      <div class="container">
        <table class="table table-bordered text-center">
          <tbody>
            <tr>
              <td>1</td>
              <td><a href="addstudent.php">Insert student detail</a></td>
            </tr>
            <tr>
              <td>2</td>
              <td><a href="updatestudent.php">Update student detail</a></td>
            </tr>
            <tr>
              <td>3</td>
              <td><a href="deletestudent.php">Delete student detail</a></td>
            </tr>
            <td>4</td>
              <td><a href="studentlist.php">Student List</a></td>
            </tr>
          </tbody>
        </table>
      </div>  
    </div>
    <div class="container text-center" >
      <a class="btn btn-info btn-sm" href="../index.php">Home</a>
      <a class="btn btn-info btn-sm" href="../changepass.php">Change Password</a>
      <a class=" btn btn-info btn-sm" href="logout.php">Logout</a>
    </div>
</body>
</html>
<!-- header('location:../login.php'); -->