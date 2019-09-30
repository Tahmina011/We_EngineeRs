<?php 
//include('projectheader.php');

$search=$_GET['q'];
		$mysqli=new mysqli('localhost','root','','allposts');
		$result=$mysqli->query("SELECT * FROM allpost where p_heading like '%$search%' or p_text like '%$search%'or p_username like '%$search%'");
		$query=mysqli_num_rows($result);
		if ($query>0) {
			# code...
		echo "There are ".$query." results!";
		while($row=$result->fetch_assoc())
		{
			echo "<a href='article.php?title=".$row['p_heading']."'><div id='img_div'>";
			echo $row['p_heading'];
			//echo "<img src='".$row['p_image']."'>";
			echo "<p>".$row['p_text']."</p>";
			echo $row['p_username'];
			/*$_SESSION['ar_id']=$row['id'];
			include('showcomment.php');
			echo '<form action="post_comment.php" method="POST">
		<input type="text" name="name" placeholder="Your name"><br>
		<textarea name="comment" cols="50" rows="2" placeholder="Leave a comment"></textarea><br>
		<input type="submit" name="" value="comment">
	</form>';*/
	echo "</div></a>";

		}
	}
	else
	{
		echo "There is no results matching your search";
	}
		 ?>	
