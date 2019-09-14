<?php 
if(isset('submit'))
{
	$file=$_FILES['file'];
	$fileName=$_FILES['file']['name'];
	$fileTmpName=$_FILES['file']['tmp_name'];
	$fileSize=$_FILES['file']['size'];
	$fileError=$_FILES['file']['error'];
	$fileTmpType=$_FILES['file']['type'];

	$fileExt=explode('.', $filename);
	$fileActualExt=strtolower(end($fileExt));
	$allowed= array('jpg','jpeg','png','pdf' );
	if (in_array($fileActualExt,$allowed))
	 {
		if ($fileError == 0) 
		{
			if($fileSize<1000000)
			{
				$fileNameNew=uniqid('',true).".".$fileActualExt;
				$fileDestination='uploads/'.$fileNameNew;
				move_uploaded_file($fileTmpName, $fileDestination);
				header("Location:addstudent.php?uploadsuccess");
			}
			else
			{
						echo "your file is too big ";
			}
		}
		else
	    {
		echo "error on uploading image";
	    }	
	}
	else
	{
		echo "you cant allowed upload image";
	}

}

 ?>