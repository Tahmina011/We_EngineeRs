<?php
session_start(); 
if(isset($_POST['submit']))
{
	 include 'db.inc.php';
	 $uid=mysqli_real_escape_string($conn,$_POST['username']);
	 $pwd=mysqli_real_escape_string($conn,$_POST['password']);
	 $p=$_POST['password'];
	 //error handlers
	 //check if inputs are empty
	 if(empty($uid)||empty($pwd)){
	 	header("Location:../form.php?login=empty");
	 	exit();
	 }
	 else
	 {
	 	$sql ="SELECT * FROM users where username='$uid'";
	 	$result=mysqli_query($conn,$sql);
	 	$resultCheck=mysqli_num_rows($result);
	 	if($resultCheck<1){
	 		header("Location:../form.php?login=no rows newt_form_set_background(from, background)");
	 	exit();
	 	}  
	 	else
	 	{
	 		if($row=mysqli_fetch_assoc($result))
	 		{
	 		
	 			$hashedPwdCheck=password_verify($pwd ,$row['password']);
	 			if($hashedPwdCheck==false)
	 			{
	 				header("Location:../form.php?login=falses");
	 				exit();

	 			 }
	 			 elseif($hashedPwdCheck==true){
	 			 	if(isset($_POST['remember']))
	 			 	{
	 			 		setcookie('username',$row['username'],time()+(30));
	 			 		setcookie('password',$p,time()+(30));
	 			 	}
	 			 setcookie('session', 1, time()+(60*2));
	 			 $_SESSION['check']=1;
	 			 $_SESSION['user_id']=$row['id'];
	 			 $_SESSION['username']=$row['username'] ;
	 			 $_SESSION['email']=$row['email'];
	 			 $_SESSION['avatar']=$row['avater']  ;
	 			  $_SESSION['password']=$row['password'];
	 			 header("location: projecthomepage.php");
	 			}
	 		}   
	 		
	 		
	 	}
	 }

} 
else
	{
	 	header("Location:../form.php?login=error");
	 	exit();
}
?>