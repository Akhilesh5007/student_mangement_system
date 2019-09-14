<?php 
 $con=mysqli_connect('localhost','root','','sms');
if ($con==False)
{
	echo "connection_aborted";
}

  $rollno=mysqli_real_escape_string($con , $_POST["rollno"])  ;
  $name=$_POST["name"];
  $city=$_POST["city"];
  $pcon=$_POST["pmob"];
  $standard=$_POST["standard"];
  $id =$_POST["sid"];
  $imagename=$_FILES['simg']['name'];
  $tempname=$_FILES['simg']['tmp_name'];
  move_uploaded_file($tempname,"../images/$imagename");
  $qry="UPDATE `student` SET `rollno` = '$rollno', `name` = '$name', `city` = '$city', `pcon` = '$pcon', `standard` = '$standard', `image` = '$imagename' WHERE `student`.`id` = '$id'
";

  $run=mysqli_query($con, $qry);
  if($run == true)
  {
    ?>
    <script>
      alert('data uploded suceessfully');
      window.open('updateform.php?sid=<?php echo $id;?>','_self');
    </script>
    <?php
  }
  else
  {
    echo "not done updation";
  }
 ?>