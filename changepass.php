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
    <div>
      <div class="container">
        <form action="changepass.php" method="post">
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
              <th>Enter Old Password</th>
              <td><input type="password" name="Opass" required="required" placeholder="Old Password"></td>
            </tr>
             <tr>
              <th>New Pasword</th>
               <td><input type="password" name="Npass" required="required" placeholder="New Password"></td>
             </tr>
             <tr>
                <td colspan="2"align="center">
                   <input class="btn btn-info btn-sm" type="submit" name="submit" value="change">
                </td>
              </tr>
              <tr>

              </tr>
              <tr><td class="text-center" colspan="2"><?php echo "<h1>Welcome ".$_SESSION['unam']."!</h1>";?></td></tr>
          </tbody>
        </table>
               <a class="btn btn-info btn-block " href="admin/logout.php">Logout</a>
               <a class="btn btn-info btn-block " href="index.php">Home</a>

        </form>
      </div>  
    </div>
    <div class="container-fluid" >
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
     $oldpass=$_POST['Opass'];
     // $select="SELECT * FROM `admin` WHERE (username='$oldname' AND password='$oldpass')";
     $select="SELECT * FROM `admin` WHERE (username='$oldname' AND mobile='$oldmob' AND password='$oldpass')";
       $runq=mysqli_query($con,$select);
       $row=mysqli_num_rows($runq);
       $dta=mysqli_fetch_assoc($runq);
       $aid=$dta['id'];
       if($aid == false)
       {
         ?>
         <script>
         alert('Username or password not Match!!');
         </script>
         <?php
       }
       else
     {
       $newpass=$_POST['Npass'];
       $qry="UPDATE `admin` SET `password`='$newpass' WHERE `admin`.`id`='$aid'";
       $run=mysqli_query($con, $qry);
       if($run == true)
        {
          ?>
          <script>alert("successfully change")</script>
          <?php

        }   
     }
}
?>   
