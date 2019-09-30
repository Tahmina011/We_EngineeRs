<?php include('projectheader.php');?>
<style>
.m{
	margin: 10px;
}
.m table,th,td {
  border : 1px solid black;
  border-collapse: collapse;
}
.m th,td {
  padding: 5px;
}
</style>
<div class="row" style="background-image: url('bac.jpg');background-repeat: no-repeat;background-size: cover;color: black;min-height: 550px;padding: 0px;">
	<div style="position: center;padding-top: 150px;font-size: 20px;line-height: 1.2em;word-spacing: 10px;padding-left: 450px;"><h1 style="text-align: center">ABOUT WE ENGINEERS</h1>
		<p>We Engineers is a platform for you to share what you make through words,<br> photos and files.<br><br>
From a one step recipe to a 100 step jet engine build, everyone has<br> something to share.
Join  ours community... </p>
<div class="m">
							<button type="button" onclick="loadDoc()">WE ENGINEERS BRIEF</button>
<br><br>
<table id="brief"></table>
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
  document.getElementById("brief").innerHTML = table;
}
</script>
<?php include('projectfooter.php');?>