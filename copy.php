<?php
session_start();
$msg="";
//if upload button is pressed
if (isset($_POST['upload'])) {
	# code...
	/*$target= "images/".basename($_FILES['image']['name']);*/
	$name= $_SESSION['username'];

	$mysqli=new mysqli('localhost','root','','photos');
	$target=$mysqli->real_escape_string('images/'.$_FILES['image']['name']);
	$text=$mysqli->real_escape_string($_POST['text']);
	$mysqli->query("INSERT INTO images VALUES('','$name','$image','$text')"); 
	if (move_uploaded_file($_FILES['image']['tmp_name'],$target)) {
		# code...
		$msg="Image uploaded successfully";
	}
	else
	{
		$msg="There was a problem uploading image";
	}

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>image upload</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id="content">
		<form method="post" action="index.php" enctype="multipart/form.data">
			<input type="hidden" name="size" value="1000000">
			<div>
				<input type="file" name="image">
			</div>
			<div>
				<textarea name="text" cols="40" rows="4" placeholder="say something about this image....">
				</textarea>
			</div>
			<div>
				<input type="submit" name="upload" value="upload image">
			</div>
			
		</form>
	</div>

</body>
</html>