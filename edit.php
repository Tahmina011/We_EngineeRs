<link rel="stylesheet" type="text/css" href="postanythinguser.css">
<?php
if (isset($_POST['edit'])) {
	# code...

$mysqli=new mysqli('localhost','root','','photos');
$e_id=$_POST['e_id'];
			$nam=$_POST['e_name'];
			$img=$_POST['e_image'];
			$txt=$_POST['e_text'];
			$head=$_POST['e_heading'];
			$cat=$_POST['e_category'];
echo '<div class="postbox"><form method="post" action="update.php" enctype="multipart/form-data">
			<input type="hidden" name="size" value="1000000">
			<div>
				<input type="file" name="image" value="'.$img.'">
			</div>
			<div>
			<input type="text" name="heading"  value="'.$head.'"/>
			</div>
			<div>
				<textarea name="text" cols="40" rows="4">'.$txt.'
				</textarea>
			</div>
			<div>
			<input type="text" name="category"  value="'.$cat.'"/>
			</div>
			<input type="hidden" name="id"  value="'.$e_id.'"/>
			<div>
				<input type="submit" name="editsubmit" value="Edit">
			</div>
			
		</form></div>';
	}
	if (isset($_POST['delete'])) {
	# code...

$mysqli=new mysqli('localhost','root','','photos');
$e_id=$_POST['e_id'];
$mysqli->query("DELETE FROM images  where id='$e_id'"); 
$mysql=new mysqli('localhost','root','','allposts');

			$mysql->query("DELETE FROM allpost  where i_id='$e_id'");
header("Location: post_edit_delete.php");
}


?>
