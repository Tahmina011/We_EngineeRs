<?php
	include('projectheader.php');
?>

<div class="row" style="background-color: #CBE1D4" >
<div class="tab">
  <button class="tablinks" onclick="openStory(event, 'Story_1')" id="defaultOpen">TECHNIVAL,2018</button>
  <button class="tablinks" onclick="openStory(event, 'Story_2')">2nd workshop</button>
  <button class="tablinks" onclick="openStory(event, 'Story_3')">first workshop</button>
</div>

<div id="Story_1" class="tabcontent">
  <h2>TECHNIVAL,2018</h2>
  <img src="uploads/sony.png" style="width: 100%;height: 200px;">
  <p style="padding: 15px;"><?php
$myfile = fopen("uploads/sony.txt", "r") or die("Unable to open file!");
// Output one line until end-of-file
while(!feof($myfile)) {
  echo fgets($myfile) . "<br>";
}
fclose($myfile);
?></p>
</div>

<div id="Story_2" class="tabcontent">
  <h2>3rd WORKSHOP IN MECHANICAL ENGINEERING DEPT</h2>
  <img src="uploads/student-working-robotics-engineering-575x380_1-SMALLER.jpg" style="width: 100%;height: 200px;">
  <p><?php
$myfile = fopen("uploads/kk.txt", "r") or die("Unable to open file!");
// Output one line until end-of-file
while(!feof($myfile)) {
  echo fgets($myfile) . "<br>";
}
fclose($myfile);
?></p>
</div>

<div id="Story_3" class="tabcontent">
  <h2>3rd WORKSHOP IN MECHANICAL ENGINEERING DEPT</h2>
  <img src="uploads/student-working-robotics-engineering-575x380_1-SMALLER.jpg" style="width: 100%;height: 200px;">
  <p><?php
$myfile = fopen("uploads/kk.txt", "r") or die("Unable to open file!");
// Output one line until end-of-file
while(!feof($myfile)) {
  echo fgets($myfile) . "<br>";
}
fclose($myfile);
?></p>
</div>

<script>
function openStory(evt, story) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(story).style.display = "block";
    evt.currentTarget.className += " active";
}


document.getElementById("defaultOpen").click();
</script>
</div>

<?php
	include('projectfooter.php');
?>