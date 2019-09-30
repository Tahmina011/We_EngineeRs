<?php if(isset($_SESSION['open-book']) && $_SESSION['open-book']==1)
{
echo '<script language="javascript">';
echo 'alert("please log in or register..")';
echo '</script>';
$_SESSION['open-book']=0;

} ?>
<div class="row" style="background-color: #E7EBEA;">
	
	<div class="column left" class="nav-login" style="background-color: #E7EBEA; color: black;">
		 	<div>
		  <?php  
		  if($_SESSION['check']==1)
		  {
		  //$msg=	$_SESSION['message'];
		  $pic= $_SESSION['avatar'];
		  $nam= $_SESSION['username'];
		 // echo '<script> alert(")'
	    echo '
	    <div style="height: 220px;width: 93%; border: 5px solid #A3D5BC;position: center;padding-bottom: 20px;">
        <span class="user" style="padding: 10px;"><img  style="height:150px; width:150px; border-radius:50%; border: 3px solid black;" src="'.$pic.'"></span><br/>
         WELCOME <span class="user" style="color: black;font-size: 18px;">'.$nam.'</span>
         

         	<a href="uploading.php"><h4 style="color: black;padding:10px;">Want to share??</h4></a>
         	</div>';
         	}
         	?>
         </div> 
         	<div style="width: 90%; height: 350px;border-style: groove;padding: 5px;padding-top: 20px;">
         		<p style="font-size: 10px;color: red;"><h4 style="color: red;">The prizes for all categories are as follows:</h4><br/>
1. First prize – 7500/=, certificate, and publication on the website<br/>
<br>
2.Second prize-5000/=, certificate, and publication on the website<br/><br>
3.Third prize-2500/=, certificate, and publication on the website<br/></p>
         	</div>
</div>


<link rel="stylesheet" type="text/css" href="homepagecss.css">
	<div class="column middle" style="background-color: white;">
		<div class="box" style="border-radius: 0px 0px 10px 10px;">
		<h1> EnGineeRs</h1>
		
			<img class="mySlides" src="images/27023909-civil-engineering-wallpapers.jpg" width="100%" height="100%" alt="Robotices img">
			<img class="mySlides" src="images/engineering-pictures-8.jpg" width="100%" height="100%" alt="Robotices img" >
			<img class="mySlides" src="images/c-n-t-t.jpg" width="100%" height="100%" alt="Robotices img" >
			<img class="mySlides" src="images/wp2063103.jpg" width="100%" height="100%" alt="Robotices img">	
		<p>
			This is a world of Engineers. We come with an idea,rethink about it, analyse it,make an abstruct structure of it,construct it and <strong>Finally</strong> give world a new gift.
		</p>
		<p>We Engineers is a platform for you to share what you make through words,<br> photos and files.<br><br>
From a one step recipe to a 100 step jet engine build, everyone has<br> something to share.
Join  ours community... </p>
		</div>
		<?php 
		$mysqli=new mysqli('localhost','root','','allposts');
		$result=$mysqli->query("SELECT * FROM allpost where  p_id in(select max(p_id) from allpost group by p_category)");
		while($row=$result->fetch_assoc())
		{
			echo "<h1 style='color:black;letter-transform:uppercase;padding-left:20px'>".$row['p_category']."</h1>";
			echo "<div class='box'>";
			echo "<h1>".$row['p_heading']."</h1>";
			echo "<img src='".$row['p_image']."'>";
			$string=nl2br($row['p_text']);
			if (strlen($string) > 600) {
    $stringCut = substr($string, 0, 600);
    $endPoint = strrpos($stringCut, ' ');
    $string = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);
    if($row['p_category']=='short story')
    {
    $string .= '... <a href="shortstory.php">Read More</a>';
}
elseif ($row['p_category']=='achievement') {
 $string .= '... <a href="achievement.php">Read More</a>';	# code...
}
elseif ($row['p_category']=='tech') {
	# code...
	$string .= '... <a href="tech.php">Read More</a>';
}
}
				echo "<p>".$string."</p>";
			

			
			echo "<h5>BY: ".$row['p_username']."</h5>";
	echo "</div>";	
}
	?>
	
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
				setTimeout(slidechange,3000);
			}
		</script>
		<div class="column right">
		
                <div style=" background-color:#E7EBEA;border-style: ridge;border-color: gray;height: 370px; ">
                                  
                    <h4 style="color: black;padding: 10px;background-color: 
 #A1F1FD;">RECENT EVENTS</h4>
                                <marquee style="text-align: left;padding: 5px;height: 320px;background-color: #A0D9EA;" direction="up" scrollamount="2" onmouseover="this.stop()" onmouseout="this.start();">
                                                        													   
								    <a href="#" class="tabbed21">Online game will be organized..</a><div style="font-weight:bold;text-align:right">April 17, 2018</div><br /><hr style="color:#aad884;border:solid .005em #aad884;" />
								     <a href="#" class="tabbed21">Technival,2018 will be held on 24,april..</a><div style="font-weight:bold;text-align:right">April 24, 2018</div><br /><hr style="color:#aad884;border:solid .005em #aad884;" />
								      <a href="#" class="tabbed21">Short Stories competion will be arranged ..</a><div style="font-weight:bold;text-align:right">March 17, 2018</div><br /><hr style="color:#aad884;border:solid .005em #aad884;" />
                                                  
                                </marquee>
										
                  
						</div>
						
						
	    </div>
	</div>
<script>
function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      mFunction(this);
    }
  };
  xhttp.open("GET", "rules.xml", true);
  xhttp.send();
}
function mFunction(xml) {
  var i;
  var xmlDoc = xml.responseXML;
  var table="<tr><th>Title</th><th>Description</th></tr>";
  var x = xmlDoc.getElementsByTagName("TOPIC");
  for (i = 0; i <x.length; i++) { 
    table += "<tr><td>" +
    x[i].getElementsByTagName("TITLE")[0].childNodes[0].nodeValue +
    "</td><td>" +
    x[i].getElementsByTagName("RULE")[0].childNodes[0].nodeValue +
    "</td></tr>";
  }
  document.getElementById("demo").innerHTML = table;
}
</script>