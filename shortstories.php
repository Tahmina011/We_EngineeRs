<?php
  include('projectheader.php');
?>

<div class="row">
<div class="tab">
  <button class="tablinks" onclick="openStory(event, 'Story_1')" id="defaultOpen">A HOLE IN FENCE</button>
  <button class="tablinks" onclick="openStory(event, 'Story_2')">CHRISMAS FESTIVAL</button>
  <button class="tablinks" onclick="openStory(event, 'Story_3')">Story_3</button>
</div>

<div id="Story_1" class="tabcontent">
  <h2>A HOLE IN FENCE</h2>
  <img src="uploads/fence.png" style="width: 100%;height: 200px;">
  <p style="padding: 15px;"><?php
$myfile = fopen("uploads/RODELA.txt", "r") or die("Unable to open file!");
// Output one line until end-of-file
while(!feof($myfile)) {
  echo fgets($myfile) . "<br>";
}
fclose($myfile);
?></p>
</div>

<div id="Story_2" class="tabcontent">
  <h3>CHRISMAS FESTIVAL</h3>
   <img src="uploads/crismas.png" style="width: 100%;height: 200px;">
  <p style="padding: 15px;"><?php
$myfile = fopen("crismas.txt", "r") or die("Unable to open file!");
// Output one line until end-of-file
while(!feof($myfile)) {
  echo fgets($myfile) . "<br>";
}
fclose($myfile);
?></p>
</div>

<div id="Story_3" class="tabcontent">
  <h3>Story_3</h3>
  <p>Story_3..........</p> 
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