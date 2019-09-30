<?php include('achi_server.php'); ?>
<?php include('projectheader.php');?>

  <link rel="stylesheet" href="achi_styles.css">
  <link rel="stylesheet" type="text/css" href="homepagecss.css">

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
      include('showcomment.php');
      echo '<form action="post_comment.php" method="POST">
    <input type="text" name="name" placeholder="Your name"><br>
    <textarea name="comment" cols="50" rows="2" placeholder="Leave a comment"></textarea><br>
    <input type="submit" name="" value="comment">
  </form>';*/
  echo '</div>';

    }
     ?>
   
   <div class="wrap">';
    <?php echo fetch_comment()?>;
   <form class="comment_form">
      <div>
        <input type="hidden" name="post_id" id="post_id" value="">
        <input type="hidden" name="name" id="name" value= <?php echo $_SESSION['username'];?>>
      </div>
      <div>
        <label for="comment">Comment:</label>
        <textarea name="comment" id="comment" cols="30" rows="5"></textarea>
      </div>
      <button type="button" class="submit_btn">POST</button>
      <button type="button" class="update_btn" style="display: none;">UPDATE</button>
    </form>
  </div>
  <div class="column right">
  </div>
</div>
 

<!-- Add JQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="achi_scripts.js"></script>
<?php
include('projectfooter.php');?>