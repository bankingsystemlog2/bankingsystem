<?php
	include('conn.php');
	if(!empty($_FILES["image"]["tmp_name"])){
		$fileinfo=PATHINFO($_FILES["image"]["name"]);
		$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
		move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $newFilename);
		$location="upload/" . $newFilename;
		
		mysqli_query($con,"insert into image_tb (img_location) values ('$location')");
		header('location:gallery.php');
	}else{
		echo "<script>alert('No Image selected.');location.replace('./gallery.php');</script>";
	}
	
?>