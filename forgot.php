<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Change Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  </head>
<body>
    <div align="center">
    <h1 class="bg-info">Password Section</h1>
    </div>

      <div class="container">
        <form action="forgot.php" method="post">
        <table class="table table-bordered text-center">
          <tbody>
            <tr>
              <th>Enter Old Name</th>
              <td><input type="text" name="Oname" required="required" placeholder="Old Name"></td>
            </tr>
             <tr>
              <th>Enter Old Mobile</th>
              <td><input type="text" name="Omob" required="required" placeholder="Old Mobile no."></td>
            </tr>
              <tr>
              <th>Enter  New Password</th>
              <td><input type="password" name="Npass" required="required" placeholder="New Password"></td>
            </tr>
              <tr>
            	  <td colspan="2"align="center">
                   <input class="btn btn-info btn-sm" type="submit" name="submit" value="change">
                </td>
              </tr>
          </tbody>
        </table>
        </form>
      </div>  
      <div class="container">
  <a class="btn btn-info btn-block" href="admin/admindash.php">Back To Dash Board</a>
</div>
</body>
</html>
<?php
   $con=mysqli_connect('localhost','root','','sms');
   if($con==false)
   {
   echo "connection error";
   }
   if(isset($_POST['submit']))
   {
     $oldname=$_POST['Oname'];
     $oldmob=$_POST['Omob'];
     // $select="SELECT * FROM `admin` WHERE (username='$oldname' AND password='$oldpass')";
     $select="SELECT * FROM `admin` WHERE (username='$oldname' AND mobile='$oldmob')";
       $runq=mysqli_query($con,$select);
       // $row=mysqli_num_rows($runq);
       $dta=mysqli_fetch_assoc($runq);
       $aid=$dta['id'];
       if($aid==false)
       {
         ?>
         <script>
         alert('Username or password not Match!!');
         </script>
         <?php
       }
       else
       { ?>

    <?php
       $newpass=$_POST['Npass'];
       $qry="UPDATE `admin` SET `password`='$newpass' WHERE `admin`.`id`='$aid'";
       if(mysqli_query($con, $qry)==true)
       {
        ?>
        <script>alert('Password change successfully')</script>
        <div align="center">
          <a href="login.php" class="btn btn-info btn-sm">Home</a>
        </div>
        <?php
       }
       }
    }
?>   
