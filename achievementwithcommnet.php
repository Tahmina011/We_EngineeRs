<?php
include('projectheader.php');
?>
<?php include('com/server.php'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="com/scripts.js"></script>
<link rel="stylesheet" type="text/css" href="homepagecss.css">
<link rel="stylesheet" href="commentstyles.css">
<div class="row" style="background-color: #E7EBEA;">
  <div class="column left">
  </div>
  <div class="column middle">
    <h1 style="color: black ;text-align: center;">ACHIEVEMENTS</h1>
    <?php 
    $mysqli=new mysqli('localhost','root','','allposts');
    $result=$mysqli->query("SELECT * FROM allpost where p_category='achievement' order by p_id desc");
    while($row=$result->fetch_assoc())
    {
      
      echo "<div class='box'>";
      echo "<h1>".$row['p_heading']."</h1>";
      echo "<img src='".$row['p_image']."'>";
      echo "<p>".nl2br($row['p_text'])."</p>";
      echo "<h5>BY: ".$row['p_username']."</h5>";
      /*$_SESSION['ar_id']=$row['id'];
      include('showcomment.php');*/
      echo '<form action="post_comment.php" method="POST">
    <input type="text" name="name" placeholder="Your name"><br>
    <textarea name="comment" cols="50" rows="2" placeholder="Leave a comment"></textarea><br>
    <input type="submit" name="" value="comment">
  </form>';
  echo "</div>";

    }
     ?>
      <div class="wrapper">';
    <?php echo $comments;?>
   <form class="comment_form">
      <div>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name">
      </div>
      <div>
        <label for="comment">Comment:</label>
        <textarea name="comment" id="comment" cols="30" rows="5"></textarea>
      </div>
      <button type="button" id="submit_btn">POST</button>
      <button type="button" id="update_btn" style="display: none;">UPDATE</button>
    </form>
  </div>
  </div>
  <div class="column right">
  </div>
</div>
<?php
include('projectfooter.php');
?>
