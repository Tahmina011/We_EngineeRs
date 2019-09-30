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
		$count=1;
		$mysqli=new mysqli('localhost','root','','funtime');
		$result=$mysqli->query("SELECT * FROM ques order by f_id desc");
		$post='';
		while($row=$result->fetch_assoc())
		{
			$w=$row['ques_id'];
			$res=$mysqli->query("SELECT * FROM ans where aques_id='$w'");
			$post .= "<div class='box'>";

			$post .= "<h4>".$count.". ".$row['ques']."</h4>";
			while($ro=$res->fetch_assoc())
			{
				$post .= '<div class="boxans">';
				$post .= "<h5>".$ro['username'].": ".$ro['ans']."</h5>";
				$u=$ro['username'];
				/*$post .= '<form>
				<input type="hidden" name="user">
				<input type="submit" name="Right">
				<input type="submit" name="Wrong">
				</form>';*/
				$post .= '</div>';
			}

			$post .= '<form>
			<input type="hidden" name="ques_id" id="ques_no" value="'.$row['ques_id'].'">
			<input type="hidden" name="username" id="user" value="'.$_SESSION['username'].'">
			<textarea name="ans" id="ans" cols="50" rows="2" placeholder="your answer"></textarea><br>
			<input type="submit" id="sub" name="submit">
			</form>';
			$post .= "</div>";
			$count++;

		}
		 ?>