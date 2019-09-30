<?php
	include('projectheader.php');
?>

<div class="row">
<div class="tab">
  <button class="tablinks" onclick="openStory(event, 'Story_1')" id="defaultOpen">BRAIN TEASERS</button>
  <button class="tablinks" onclick="openStory(event, 'Story_2')">MATHS FUN</button>
  <button class="tablinks" onclick="openStory(event, 'Story_3')">JOKES</button>
</div>

<div id="Story_1" class="tabcontent">
  <div style="background-color: #B9F8F2;border-style: ridge;border-color: gray;box-shadow: #D8D9DC">
  <h2 style="background-color: #B9F8F2;">BRAIN TEASERS</h2><br/>
  <h4 style="color: black;background-color: #B9F8F2">
    THE QUESTIONS ARE..<br>
  </h4>
  <h5 style="color: blue;padding: 10px;background-color:#B9F8F2 ">
    1.If 5 men takes around 3 hours to dig 3 holes, how long will it take for 2 men to dig half a hole?<br><br>
    2.Two girls played and completed 5 games of chess. Each of them won same number of games and there wasn’t any tie in any game. How did it happen?<br><br>
    3.How many oranges can you put into an empty container?<br><br>
    4.When you add two letters, the five letter word becomes shorter. What it is?<br><br>
    5.How many seconds do you have in a year?<br><br>
  </h5>
  </div>
  <div style="background-color:  #ff99ff;border-style: ridge;border-color: #ff80ff;box-shadow: #ffb3ff;">
    <?php  
  //session_start();
  $mysqli=new mysqli('localhost','root','','accounts');
if($_SERVER['REQUEST_METHOD']=='POST'){
   $ans=$mysqli->real_escape_string($_POST['ans']);
   $sql = "INSERT INTO answers (ans) VALUES ('$ans')";
   if($mysqli->query($sql)===true)
          {
            header("location: ideas.php");
          }
}
  ?>
  <h2 style="background-color: #C91FD8;padding: 15px;color: black;">Please,answer these questions...!!</h2>
  <form  action="ideas.php" method="post" enctype="multipart/form-data" autocomplete="off">
    <div style="background-color: #F2F2F2;min-height: 200px;padding-left: 50px;padding-top: 50px;padding-right: 5px;">
    <textarea style="min-height: 100px;padding-top: 30px;font-size: 16px;border-style: ridge;box-shadow: 2px 2px 4px 4px gray;width: 90%;color: black; " name="ans" placeholder="share your feelings or somethings as anonymous"></textarea>
    <input style="width: auto;height: auto;float: right;background-color: gray;color: black;" type="submit" value="POST" name="register" class="btn btn-block btn-primary" />
    </div>
  </form>
  <div style="border-color: gray;color: black;">
     <?php
        $mysqli = new mysqli('localhost','root','','accounts');
        $sql='SELECT * FROM answers';
        $result=$mysqli->query($sql);
        ?>
        <div style="padding:5px; border-style: ridge;border-width: 5px;background-color: #0F2439;padding-left:10px;">
          <span>USERS' ANSWERS</span>
          <?php
          while($row= $result->fetch_assoc())
          {
            $stat = nl2br($row['ans']);
            echo "<div style='background-color:#C0DFFD;padding:10px;font-size:18px;box-shadow:2px 3px 2px 4px #CFE3D7;width: 90%;padding-left:10px;'>$stat<br/>";
            echo "<p style='float:right;font-size: 12px;'>$row[status_time]</p></div><br/><br/>";
          }
          ?> 
    
  </div>
</div>
</div>
</div>



<div id="Story_2" class="tabcontent">
 <h3>MATH FUN</h3>
  <p style="font-size: 16px;"><?php
$myfile = fopen("uploads/math.txt", "r") or die("Unable to open file!");
// Output one line until end-of-file
while(!feof($myfile)) {
  echo fgets($myfile) . "<br>";
}
fclose($myfile);
?></p>  
</div>


<div id="Story_3" class="tabcontent">
  <h3>JOKES TIME</h3>
  <p style="font-size: 16px;"><?php
$myfile = fopen("uploads/jokes.txt", "r") or die("Unable to open file!");
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
</div>
</div>

<?php
	include('projectfooter.php');
?>