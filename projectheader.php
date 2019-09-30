
<!DOCTYPE html>
<html lang="en">
<head>
  <?php session_start();
if(isset($_SESSION['check']))
{

}
else
{
        $_SESSION['check']=0;
}
?>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="UTF-8">
	<title>WE ENGINEERs
		
</title>
<script>
function showResult(str) {
  if (str.length==0) { 
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").classList.add("boxsearch");
    }
  }
  xmlhttp.open("GET","livesearch1.php?q="+str,true);
  xmlhttp.send();
}
</script>
<style>
.boxsearch{
  background-color: #E1E2E6;
  border-radius: 15px;
min-height: 0px;
float: center;
padding: 20px;
}
.sticky {
  position: fixed;
  top: 0;
  width: 100%;
  padding-top: 102px;
}
div.container
{
    font-family: Raleway;
    margin: 0 auto;
  
    padding: .5em .5em .5em .5em;
    text-align: center;
    height:2em;

}
div.container input[type=text] {
  border: none;
  margin-bottom: 5px;
  width: 150px;
  background-color: white;
  float: left;
  height: 27px;
     background-image: url('search.png');
    background-position: 5px; 
    background-repeat: no-repeat;
     padding: 12px 20px 12px 40px;
  margin-bottom: 10px;
  color: black;
   -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}
div.container input[type=text]:focus {
    width: 340px;
}

div.container a
{
    float: left;
    color: #FFF;
    text-decoration: none;
    font: 16px Raleway;
    margin: 0px 7px;
   padding: 7px;
    position: relative;
    z-index: 0;
    cursor: pointer;
}



.deepOrange
{
    background: #142F44;
}
div.pullRightLeft a:before, div.pullRightLeft a:after
{
    position: absolute;
    width: 2px;
    height: 90%;
    top: 0px;
    content: '';
    border-radius: 10px;
    background: white;
    opacity: 0.2;
    transition: all 0.3s;
}

div.pullRightLeft a:before
{
    left: 0px;
} 

div.pullRightLeft a:after
{
    right: 0px;
}

div.pullRightLeft a:hover:before, div.pullRightLeft a:hover:after
{
    width: 100%;
}
</style>
<link rel="stylesheet" type="text/css" href="homepage_En.css"/>

<script>

    function digitized() {
        var dt = new Date();    
        var hrs = dt.getHours();
        var min = dt.getMinutes();
        var sec = dt.getSeconds();

        min = Ticking(min);
        sec = Ticking(sec);

        document.getElementById('dc').innerHTML = hrs + ":" + min;
        document.getElementById('dc_second').innerHTML = sec;

        if (hrs > 12) { 
            document.getElementById('dc_hour').innerHTML = 'PM'; 
        }
        else { 
            document.getElementById('dc_hour').innerHTML = 'AM'; 
        }

               var time
        time = setInterval('digitized()', 1000);
    }

    function Ticking(ticVal) {
        if (ticVal < 10) {
            ticVal = "0" + ticVal;
        }
        return ticVal;
    }
</script>
</head>
<body onLoad="digitized()">

<div class="header">
  <div style="background-color: gray;
        max-width:100px;width:90%;margin:0 auto;padding: 5px;float: right;">

        <table class="tabBlock" align="center" cellspacing="0" cellpadding="0" border="0" >
            <tr><td class="clock" id="dc"></td>  <!-- THE DIGITAL CLOCK. -->
                <td>
                    <table cellpadding="0" cellspacing="0" border="0" ">
                    
                        <!-- HOUR IN 'AM' AND 'PM'. -->
                        <tr><td class="clocklg" id="dc_hour"></td></tr>

                        <!-- SHOWING SECONDS. -->
                        <tr><td class="clocklg" id="dc_second"></td></tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
	<h1 style="text-shadow: 3px 2px gray;padding-top: 20px;font-size: 45px;padding-left: 30px;">
		WE ENGINEERS
	</h1>
	

</div>
<div class="container deepOrange pullRightLeft" id="nav" style="z-index: 3;">
    <a href="projecthomepage.php">HOME</a>
     <?php if($_SESSION['check']==1){
      echo '<a href="like-index.php">SHORT STORIES</a>';
} 
else
{
    echo '<a href="shortstory.php">SHORT STORIES</a>';
}?>

    <a href="achievement.php">ACHIEVEMENTS</a>
    <?php if($_SESSION['check']==1){
    if($_SESSION['username']=='ADMIN') {
      echo '<a href="fun-time.php">FUN TIME</a>';

    }
    else{
       echo '<a href="fun_tim.php">FUN TIME</a>';
    }
}?>
        <a href="tech.php">TECH</a>
    <?php if($_SESSION['check']==1){
    if($_SESSION['username']=='ADMIN') {
      echo '<a href="open.php">OPEN-BOOK</a>';
    }
    else{
       echo '<a href="openuser.php">OPEN-BOOK</a>';
    }
}
else
{
  echo '<a href="openl.php">OPEN-BOOK</a>';
} ?>
   
    <form>
<input type="text" size="30" placeholder="Search..." onkeyup="showResult(this.value)">

</form>
<a href="about.php" style="float: right;">ABOUT</a>
    <?php if($_SESSION['check']==1){

      echo '<a href="logout.inc.php" style="float: right;">LOGOUT</a>';
      echo '<a href="post_edit_delete.php" style="float: right;">POST</a>';
} 
else
{
    echo '<a href="login.php" style="float: right;">LOGIN</a>';
     echo '<a href="form.php" style="float: right;">REGISTER</a>';
}?>

    


</div>
 <div id="livesearch"></div>




<script>
window.onscroll = function() {yFunction()};

var header = document.getElementById("nav");
var sticky = header.offsetTop;

function yFunction() {
  if (window.pageYOffset >= sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
</script>
