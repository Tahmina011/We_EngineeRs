<!DOCTYPE html>
<html lang="ENGINEERs">


<head>
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


<body onLoad="renderTime()">

<div class="header">
	<div id="clockDisplay" class="clockcontainer"></div>
	<h1>
		WE ENGINEERS
	</h1>
	
</div>



<div class="topnav">
	<a href="we_enginners.php">Home</a>
	<a href="we_enginners.php">Home</a>
<a href="we_enginners.php">Poems</a>
	<a href="we_enginners.php">Short Stories</a>
	<a href="we_enginners.php">Achivements</a>
	<a href="we_enginners.php">Ideas</a>
	<a href="we_enginners.php">Events</a>
</div>


<div class="row">
	
	<div class="column left" style="background-color: #ccc;">
		<a href="">login</a>  <a href="">Register</a>
	</div>


	<div class="column middle"  style="background-color: #bbb">
			<img class="mySlides" src="student-working-robotics-engineering-575x380_1-SMALLER.jpg" width="100%" height="380" alt="Robotices img">
			<img class="mySlides" src="68417104-engineering-wallpapers.jpg" width="100%" height="380" alt="Robotices img" >
			<img class="mySlides" src="science-technology-pr.jpg" width="100%" height="380" alt="Robotices img">
		
		<h2 style="color: blue"> EnGineeRs</h2>
		<p>
			This is a world of Engineers. We come with an idea,rethink about it, analyse it,make an abstruct structure of it,construct it and <strong>Finally</strong> give world a new gift.
		</p>
	</div>


	<script >
			var myindex=0;
			slidechange();
			function slidechange()
			{
				var i;
				var x=document.getElementsByClassName("mySlides");
				for(i=0;i<x.length;i++)
				{
					x[i].style.display="none";
				}
				myindex++;
				if(myindex>x.length)
				{
					myindex=1
				}
				x[myindex-1].style.display="block";
				setTimeout(slidechange,5000);
			}
		</script>


	<div class="column right" style="background-color: #ccc;">
		<h2 style="color: green">Recent Events</h2>
	</div>

</div>


<div class="footer">
	<h2>footer</h2>
</div>


</body>
</html>