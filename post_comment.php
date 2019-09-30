<?php

/*mysql_connect("121.0.0.1","root","");
mysql_select_db("comment");*/
session_start();
$mysqli=new mysqli('localhost','root','','comment');
 $name=$mysqli->real_escape_string($_POST['name']);
    $comment=$mysqli->real_escape_string($_POST['comment']);
$comment_length=strlen($comment);
$arr_id=$_SESSION['ar_id'];
 if($_SESSION['check']==1)
		  {
		  //$msg=	$_SESSION['message'];
		  $name= $_SESSION['username'];
		}
if($comment_length>190)
{
	header("location: index.php?error=1");
}
else
{
	$mysqli->query("INSERT INTO comments VALUES('','$name','$comment','$arr_id')");
	header("location: index.php"); 
}

?>