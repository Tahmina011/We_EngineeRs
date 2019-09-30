<!DOCTYPE html>
<html lang="ENGINEERs">


<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>WE ENGINEERs
		
</title>
<link rel="stylesheet" type="text/css" href="homepage_En.css"/>
<script>
	function renderTime(){
	//Date
	var mydate= new Date();
	var year=mydate.getYear();
	if(year<1000)
	{
		year += 1900;
	}
	var day =mydate.getDay();
	var month=mydate.getMonth();
	var daym=mydate.getDate();
	var dayarray= new Array("Sunday,","Monday,","Tuesday,","Wednesday,","Thursday,","Friday,","Saturday,");
	var montharray=new Array("January,","February,","March,","April,","May,","June,","July,","August,","September,","October,","November,","December,");
	//Date end


	//Time
	var currentTime=new Date();
	var h=currentTime.getHours();
	var m=currentTime.getMinutes();
	var s=currentTime.getSeconds();

	if(h == 24){
		h = 0;
	}
	else if(h>12){
		h = h - 0;
	}
	if (h<10) {
		h = "0" + h;
	}
	if (m < 10) {
		m = "0" + m;
	}
	if (s < 10) {
		s = "0" + s;
	}

	var myClock=document.getElementById("clockDisplay");
	myClock.textContent="" +dayarray[day]+" "+daym + " "+montharray[month]+" "+year+" | "+h+":"+m+":"+s;
	myClock.innerText="" +dayarray[day]+" "+daym + " "+montharray[month]+" "+year+" | "+h+":"+m+":"+s;

	setTimeout("renderTime()", 1000);

}
</script>
</head>
<body onLoad="renderTime()" style="background-color: #214366;">

<div class="header">
	<div id="clockDisplay" class="clockcontainer"></div>
	<h1 style="text-shadow: 4px 3px gray;">
		WE ENGINEERS
	</h1>
	
</div>
	<?php
session_start();
$_SESSION['message']='';
$mysqli=new mysqli('localhost','root','','accounts');
if($_SERVER['REQUEST_METHOD']=='POST'){
  //TWO PASSWORD ARE EQUAL TO EACH OTHER
  if($_POST['password']==$_POST['confirmpassword'])
  {
    $username=$mysqli->real_escape_string($_POST['username']);
    $email=$mysqli->real_escape_string($_POST['email']);
    $password=$mysqli->real_escape_string($_POST['password']);
    $avatar_path=$mysqli->real_escape_string('images/'.$_FILES['avatar']['name']);
    //make sure file type is image
    if(preg_match("!image!", $_FILES['avatar']['type']))
    {
        //copy image to images folder
      if(copy($_FILES['avatar']['tmp_name'], $avatar_path))
      {
          $_SESSION['username']=$username;
          $_SESSION['avatar']=$avatar_path;
          $hashedpwd=password_hash($password,PASSWORD_DEFAULT);
          $sql = "INSERT INTO users (username,email,password,avater) VALUES ('$username','$email','$hashedpwd','$avatar_path')"; 
          //if the query  is successful,redirect to welcome.php page,done!
          if($mysqli->query($sql)===true)
          {
            $_SESSION['message']='Registration successful! Added $username to the database!';
            $_SESSION['check']=1;
            header("location: projecthomepage.php");
          }
          else
          {
            $_SESSION['message']="User could not be added to the database!";
          }
      }
      else
      {
        $_SESSION['message']="File upload failed!";
      }
    }
    else
    {
      $_SESSION['message']="Please only upload gif,jpg,or png images!";
    }
  }
  else
  {
    $_SESSION['message']='Two Password do not match!';
  }
}
?>

<link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="form.css" type="text/css">
<div class="body-content"> 
  <div class="module">
    <h2>Create an account</h2>
    <form class="form" action="form.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"><?=$_SESSION['message']?></div>
      <input type="text" placeholder="User Name" name="username" required />
      <input type="email" placeholder="Email" name="email" required />
      <input type="password" placeholder="Password" name="password" autocomplete="new-password" required />
      <input type="password" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" required />
      <div class="avatart"><label>Select your avatar: <br></label><input type="file" name="avatar" accept="image/*" required /></div>
      <input type="submit" value="Register" name="register" class="btn btn-block btn-primary" />
    </form>
  </div>
</div>
