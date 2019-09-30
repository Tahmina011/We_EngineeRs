
<?php
include('projectheader.php');  ?>
<link rel="stylesheet" type="text/css" href="style.css">

<?php

$msg="";

if (isset($_POST['upload'])) {
	# code...
	if ($_SESSION['username']=='ADMIN') {
		# code...
		$id=$_POST['id'];
		
		$mysqli=new mysqli('localhost','root','','photos');
		$result=$mysqli->query("SELECT * FROM images where id='$id'");
		//$row=$result->fetch_assoc();
		while($row=$result->fetch_assoc())
		{
			$iid=$row['id'];
			$nam=$row['name'];
			$img=$row['image'];
			$txt=$row['i_text'];
			$head=$row['heading'];
			$cat=$row['category'];
			$mysql=new mysqli('localhost','root','','allposts');

			$mysql->query("INSERT INTO allpost VALUES('','$nam','$head','$img','$txt','$cat','$iid')");
		}
		/*$mysqli->query("INSERT INTO images VALUES('','$name','$target','$text')");*/

	}
	else{
	$target="images/".basename($_FILES['image']['name']);
	$name= $_SESSION['username'];

	$mysqli=new mysqli('localhost','root','','photos');
	$image=$_FILES['image']['name'];
	$text=$_POST['text'];
	$head=$_POST['heading'];
	$cat=$_POST['category'];
	if (move_uploaded_file($_FILES['image']['tmp_name'],$target)) {
		# code...
		$msg="Image uploaded successfully";
		$mysqli->query("INSERT INTO images VALUES('','$name','$target','$text','$head','$cat')"); 
	}
	else
	{
		$msg="There was a problem uploading image";
	}
}
}

?>

	<link rel="stylesheet" type="text/css" href="funtime.css">

	<div id="content">
		<?php 
		$mysqli=new mysqli('localhost','root','','photos');
		$result=$mysqli->query("SELECT * FROM images");
		if($_SESSION['username']=='ADMIN')
		{
			echo "<h1 style='padding-left:180px;'>ADMIN POST PAGE</h1>";
		while($row=$result->fetch_assoc())
		{
			echo "<div id='img_div'>";
			echo "<h1>".$row['heading']."</h1>";
			echo "<img src='".$row['image']."'>";
			echo "<p>".nl2br($row['i_text'])."</p>";
			echo "id:".$row['id'];
			echo '<form method="post" action="edit.php" enctype="multipart/form-data ">
		<input type="hidden" name="e_id" value="'.$row['id'].'"><br>
		<input type="hidden" name="e_name" value="'.$row['name'].'"><br>
		<input type="hidden" name="e_image" value="'.$row['image'].'"><br>
		<input type="hidden" name="e_text" value="'.$row['i_text'].'"><br>
		<input type="hidden" name="e_heading" value="'.$row['heading'].'"><br>
		<input type="hidden" name="e_category" value="'.$row['category'].'"><br>
		<input type="submit" name="edit" value="Edit">
		<input type="submit" name="delete" value="Delete">

	</form>';
	echo "</div>";

		}
	}
		 ?>

		 <link rel="stylesheet" type="text/css" href="postanythinguser.css">
		<?php
		if ($_SESSION['username']=='ADMIN') {
			# code...
			echo '<div class="postbox"><form method="post" action="post_edit_delete.php">
			<div>
				<input type="text" name="id"/><br>
				
			</div>
			<div>
				<input type="submit" name="upload" value="upload">
			</div>
			</form></div>';
		}
		else
		{
			echo "<h1 style='padding-left:180px;'>USER POST PAGE</h1>";
		echo '<div class="postbox"><form method="post" action="post_edit_delete.php" enctype="multipart/form-data">
			<input type="hidden" name="size" value="1000000">
			<div>
				<input type="file" name="image">
			</div>
			<div>
			<input type="text" name="heading" placeholder="Heading"/>
			</div>
			<div>
				<textarea name="text" cols="40" rows="4" placeholder="write here....">
				</textarea>
			</div>
			<div>
			<input type="text" name="category" placeholder="Category"/>
			</div>
			<div>
				<input type="submit" name="upload" value="upload">
			</div>
			
		</form></div>';
	}
		?>
	</div>

<?php
include('projectfooter.php');  ?>