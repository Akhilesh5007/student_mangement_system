<?php 
 $con=mysqli_connect('localhost','root','','sms');
if ($con==False)
{
  echo "connection_aborted";
}

   $id=$_REQUEST['sid'];
  $qry="DELETE FROM `student` WHERE id='$id'
";

  $run=mysqli_query($con, $qry);
  if($run == true)
  {
    ?>
    <script>
      alert('data deleted suceessfully');
      window.open('deletestudent.php','_self');
    </script>
    <?php
  }
  else
  {
    echo "not done updation";
  }
 ?>