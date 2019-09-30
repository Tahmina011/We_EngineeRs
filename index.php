<?php
session_start();
$msg="";
//if upload button is pressed
if (isset($_POST['upload'])) {
	# code...
	$target="images/".basename($_FILES['image']['name']);
	$name= $_SESSION['username'];

	$mysqli=new mysqli('localhost','root','','photos');
	$image=$_FILES['image']['name'];
	$text=$_POST['text'];
	
	if (move_uploaded_file($_FILES['image']['tmp_name'],$target)) {
		# code...
		$msg="Image uploaded successfully";
		$mysqli->query("INSERT INTO images VALUES('','$name','$target','$text')"); 
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
		<?php 
		$mysqli=new mysqli('localhost','root','','photos');
		$result=$mysqli->query("SELECT * FROM images");
		while($row=$result->fetch_assoc())
		{
			echo "<div id='img_div'>";
			echo "<img src='".$row['image']."'>";
			//echo "<p>".$row['text']."</p>";
			/*$_SESSION['ar_id']=$row['id'];
			include('showcomment.php');
			echo '<form action="post_comment.php" method="POST">
		<input type="text" name="name" placeholder="Your name"><br>
		<textarea name="comment" cols="50" rows="2" placeholder="Leave a comment"></textarea><br>
		<input type="submit" name="" value="comment">
	</form>';*/
	echo "</div>";

		}
		?>
		
		<form method="post" action="index.php" enctype="multipart/form-data">
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