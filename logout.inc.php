<?php
	session_start();
	session_unset();
	session_destroy();
	if(isset($_COOKIE['username']) && isset($_COOKIE['password']))
{
   $pwd= $_COOKIE['password'];
   $uid=  $_COOKIE['username'];
	setcookie('username',$uid,time()-(30));
	 setcookie('password',$pwd,time()-(30));
	}
	header("Location: projecthomepage.php");
	exit();

?>
