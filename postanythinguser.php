
<?php
include('projectheader.php');  ?>
<link rel="stylesheet" type="text/css" href="style.css">
<?php

$msg="";
//if upload button is pressed

if (isset($_POST['upload'])) {
	# code...
	if ($_SESSION['username']=='ADMIN') {
		# code...
		$id=$_POST['id'];
		
		$mysqli=new mysqli('localhost','root','','photos');
		$result=$mysqli->query("SELECT * FROM images where id=$id");
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
		while($row=$result->fetch_assoc())
		{
			echo "<div id='img_div'>";
			echo "<img src='".$row['image']."'>";
			echo "<p>".nl2br($row['i_text'])."</p>";
			echo "id:".$row['id'];
			/*$_SESSION['ar_id']=$row['id'];
			include('showcomment.php');
			echo '<form action="post_comment.php" method="POST">
		<input type="text" name="name" placeholder="Your name"><br>
		<textarea name="comment" cols="50" rows="2" placeholder="Leave a comment"></textarea><br>
		<input type="submit" name="" value="comment">
	</form>';*/
	echo "</div>";

		}
	}
		 ?>
		 <link rel="stylesheet" type="text/css" href="postanythinguser.css">
		<?php
		if ($_SESSION['username']=='ADMIN') {
			# code...
			echo '<div class="postbox"><form method="post" action="postanythinguser.php">
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
		echo '<div class="postbox"><form method="post" action="postanythinguser.php" enctype="multipart/form-data">
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