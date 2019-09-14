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
        <form action="forgotKaNew.php" method="post">
         New Password : 
         <input type="password" name="Npass" required="required" placeholder="New Password">    
        <input class="btn btn-info btn-sm" type="submit" name="submit" value="change">
        </form>
      </div>
 </body>
</html>        
  <?php
    $con=mysqli_connect('localhost','root','','sms');
   if($con==false)
   {
   echo "connection error";
   }
      $id=$_POST['id'];
   // echo $_SESSION['id'];
   // $id=$_SESSION['a_id'];
   if(isset($_POST['submit']))
     { 
       
       if($run == true)
        {
         ?>
          <script>alert("successfully change password")</script>
          <?php
         }
        }  
?>
