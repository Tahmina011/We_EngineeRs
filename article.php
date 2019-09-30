<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>



<?php 
//include('projectcopy/projectheader.php');
$search=$_GET['title'];
		$mysqli=new mysqli('localhost','root','','allposts');
		$result=$mysqli->query("SELECT * FROM allpost where p_heading='$search'");
		$query=mysqli_num_rows($result);
		if ($query>0) {
			# code...
		//echo "There are ".$query." results!";
		while($row=$result->fetch_assoc())
		{
			echo "<div id='img_div'>";
			echo "<h2>".$row['p_heading']."</h2>";
			echo "<img src='".$row['p_image']."'>";
			echo "<p>".$row['p_text']."</p>";
			echo "<h5>BY: ".$row['p_username']."</h5>";
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
	else
	{
		echo "There is no results matching your search";
	}
		 ?>	
</body>
</html>