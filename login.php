<!DOCTYPE html>
<html lang="ENGINEERs">


<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>WE ENGINEERs
    
</title>
<link rel="stylesheet" type="text/css" href="homepage_En.css"/>
<link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="form.css" type="text/css">
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
      <div class="body-content">  
        <div class="module">
          <h2>LOG IN</h2>
          <form class="form" action="login.inc.php" method="post" enctype="multipart/form-data" autocomplete="off">
           <input type="text" placeholder="User Name" name="username" id="username" required />
            <input type="password" placeholder="Password" name="password" id ="password" autocomplete="new-password" required />
            <input type="checkbox" name="remember">Remember me</input>
            <button type="submit" name="submit" style="background-color: #2AB6F7;">LOGIN</button>
          </form>
        </div>
      </div>

    <?php
if(isset($_COOKIE['username']) && isset($_COOKIE['password']))
{
   $pwd= $_COOKIE['password'];
   $uid=  $_COOKIE['username'];
   echo "<script>
   document.getElementById('username').value ='$uid';
   document.getElementById('password').value ='$pwd';
   </script>";
}
?>
