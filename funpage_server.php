<?php
if (isset($_POST['sub'])) {
	$mysqli=new mysqli('localhost','root','','funtime');
	$username=$_POST['username'];
	$ques_id=$_POST['ques_id'];
	$ans=$_POST['ans'];
	$mysqli->query("INSERT INTO ans VALUES('','$username','$ques_id','$ans')");
	$answer = '<div class="boxans">';
				$answer .= "<h5>".$username.": ".$ans."</h5>";

	$answer .= '<form>
				<input type="hidden" name="user" value="'.$username.'">
				<input type="submit" name="Right">
				<input type="submit" name="Wrong">
				</form></div>';
	echo $answer;
	exit();
	}
		?>