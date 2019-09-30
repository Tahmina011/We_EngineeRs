<?php
if (isset($_POST['Right'])) {
	$use=$_POST['user'];
	$mysqli=new mysqli('localhost','root','','funtime');

	$res=$mysqli->query("SELECT * FROM rating");
	while($row=$res->fetch_assoc())
		{
			if($row['username']==$use)
			{
			
			$rat= $row['r_rating'];
			$rat++;
			$mysqli->query("UPDATE rating SET r_rating='$rat' where username='$use'");
			
		}
			
			$res=$mysqli->query("SELECT r_rating from rating where username='$use'");
	 //$h=$res['username'];
	 while($ro=$res->fetch_assoc())
		{
			$h=$ro['r_rating'];
			echo $h;
			
         }
}
}
?>

