<?php include('likes.php');?>
<?php include('onlyforlikepageprojectheader.php'); 
if (empty($_COOKIE['session'])) {
  echo "<script>alert('Your session has been expired!!'); window.location='logout.inc.php';</script>";
}
?>

  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="like-dislike/main.css">
  <link rel="stylesheet" type="text/css" href="homepagecss.css">
  <div class="row" style="background-color: #F5F5F0;">

  <div class="column left">
  </div>
  <div class="column middle">
  <h1 style="color: black ;text-align: center;">SHORT STORIES OF KUETIANS</h1>
   <?php foreach ($posts as $post): ?>
   	<div class="box">
      <?php
      echo "<h1>".$post['p_heading']."</h1>";
      echo "<img src='".$post['p_image']."'>";
      echo "<p>".nl2br($post['p_text'])."</p>";
      echo "<h5>BY: ".$post['p_username']."</h5>"; ?>
      <div class="post-info">
      	<i <?php if (userLiked($post['p_id'])): ?>
      		  class="fa fa-thumbs-up like-btn"
      	  <?php else: ?>
      		  class="fa fa-thumbs-o-up like-btn"
      	  <?php endif ?>
      	  data-id="<?php echo $post['p_id'] ?>"></i>
      	<span class="likes"><?php echo getLikes($post['p_id']); ?></span>
      	
      	&nbsp;&nbsp;&nbsp;&nbsp;
      	<i 
      	  <?php if (userDisliked($post['p_id'])): ?>
      		  class="fa fa-thumbs-down dislike-btn"
      	  <?php else: ?>
      		  class="fa fa-thumbs-o-down dislike-btn"
      	  <?php endif ?>
      	  data-id="<?php echo $post['p_id'] ?>"></i>
      	<span class="dislikes"><?php echo getDislikes($post['p_id']); ?></span>
      </div>
   	</div>
   <?php endforeach ?>
  </div>
  <script src="likescripts.js"></script>
  <div class="column right">
  </div>
</div>
<?php
include('projectfooter.php');  
?>
