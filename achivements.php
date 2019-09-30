<?php
	include('projectheader.php');
?>

<div class="row">
<div class="tab">
  <button class="tablinks" onclick="openStory(event, 'Story_1')" id="defaultOpen">achivement_1</button>
  <button class="tablinks" onclick="openStory(event, 'Story_2')">achivement_2</button>
  <button class="tablinks" onclick="openStory(event, 'Story_3')">achivement_3</button>
</div>

<div id="Story_1" class="tabcontent">
  <h3>achivement_1</h3>
  <p>achivement_1.........</p>
</div>

<div id="Story_2" class="tabcontent">
  <h3>achivement_2</h3>
  <p>achivement_2..........</p> 
</div>

<div id="Story_3" class="tabcontent">
  <h3>achivement_3</h3>
  <p>achivement_3..........</p> 
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