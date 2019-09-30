
<?php
include('projectheader.php');  

if (empty($_COOKIE['session'])) {
  echo "<script>alert('Your session has been expired!!'); window.location='logout.inc.php';</script>";
}
?>
<link rel="stylesheet" type="text/css" href="style.css">
<div class="row" style="background-color: #E7EBEA;">
<div class="column left">
	<?php
	 $mysqli=new mysqli('localhost','root','','funtime');
	 $res=$mysqli->query("SELECT username from rating where r_rating in (select max(r_rating) from rating)");
	 //$h=$res['username'];
	 while($ro=$res->fetch_assoc())
		{
			$h=$ro['username'];
			//echo $h;
			 $mysql = new mysqli('localhost','root','','accounts');
			 
        $sql="SELECT username,avater FROM users where username='$h'";
        $result=$mysql->query($sql);
        while($row=$result->fetch_assoc())
		{
        $pp=$row['username'];
        $pt=$row['avater'];
       // echo $pp;
       // echo $pt;
        		 echo '
	    <div style="height: 220px;width: 100%; border: 5px solid #A3D5BC;position: center;padding-bottom: 20px;">
        <span class="user" style="padding: 10px;"><img  style="height:150px; width:150px; border-radius:50%; border: 3px solid black;" src="'.$pt.'"></span><br/>
          Congratulations <span class="user" style="color: black;font-size: 18px;">'.$pp.'</span>
         	</div>';
         }
         }

	?>

	</div>
<?php
if (isset($_POST['upload'])) {
	$mysqli=new mysqli('localhost','root','','funtime');
	$ques1=$_POST['id1'];
	$ques2=$_POST['id2'];
	$ques3=$_POST['id3'];
	$ques4=$_POST['id4'];
	$ques5=$_POST['id5'];
	
		$mysqli->query("INSERT INTO ques VALUES('','id1','$ques1')");
		$mysqli->query("INSERT INTO ques VALUES('','id2','$ques2')"); 
		$mysqli->query("INSERT INTO ques VALUES('','id3','$ques3')");  
		$mysqli->query("INSERT INTO ques VALUES('','id4','$ques4')"); 
		$mysqli->query("INSERT INTO ques VALUES('','id5','$ques5')"); 

}

?>
<?php
if (isset($_POST['submit'])) {
	$mysqli=new mysqli('localhost','root','','funtime');
	$username=$_POST['username'];
	$ques_id=$_POST['ques_id'];
	$ans=$_POST['ans'];
	$mysqli->query("INSERT INTO ans VALUES('','$username','$ques_id','$ans')");

	}

?>
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
			
}
}
?>

<link rel="stylesheet" type="text/css" href="funtime.css">

	
	<div class="column middle">
			
		<h1 style="color: black ;text-align: center;">ACHIEVEMENTS</h1>
		<?php 
		$count=1;
		$mysqli=new mysqli('localhost','root','','funtime');
		$result=$mysqli->query("SELECT * FROM ques order by f_id desc");
		while($row=$result->fetch_assoc())
		{
			if($count>5)
			{
				break;
			}
			$w=$row['ques_id'];
			$res=$mysqli->query("SELECT * FROM ans where aques_id='$w'");
			echo "<div class='box'>";

			echo "<h4>".$count.". ".$row['ques']."</h4>";
			$r=0;
		while($ro=$res->fetch_assoc())
		{
			if($_SESSION['username']==$ro['username'])
			{
			echo '<div class="boxans">';
			echo "<h4 style='color:black;float:left;'>".$ro['username'].":</h4>";
			echo "<p>".$ro['ans']."</p>";
			$u=$ro['username'];
			$r=1;
	echo '</div>';
	break;
}
		}
		if($r!=1){
			echo '<form action="fun-time.php" method="POST" style="padding:20px;min-height=60px;width:90%;border-radius:15px;">
			<input type="hidden" name="ques_id" value="'.$row['ques_id'].'">
			<input type="hidden" name="username" value="'.$_SESSION['username'].'">
		<textarea name="ans" cols="50" rows="2" placeholder="your answer"></textarea><br>
		<input type="submit" name="submit" value="submit">
	</form>';
}
	echo "</div>";
	$count++;

		}
		 ?>
	</div>
	<div class="column right">
	</div>
</div>

<?php
include('projectfooter.php');  
?>