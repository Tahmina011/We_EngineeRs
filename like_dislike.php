

  <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Like and Dislike system</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="like-dislike/main.css">
</head>

<?php 
include('like.php'); 
?>
<body>
  <div class="posts-wrapper">
   <?php foreach ($posts as $post): ?>
   	<div class="post">
      <?php echo $post['p_text']; ?>
      <div class="post-info">
	    <!-- if user likes post, style button differently -->
      	<i <?php if (userLiked($post['p_id'])): ?>
      		  class="fa fa-thumbs-up like-btn"
      	  <?php else: ?>
      		  class="fa fa-thumbs-o-up like-btn"
      	  <?php endif ?>
      	  data-id="<?php echo $post['p_id'] ?>"></i>
      	<span class="likes"><?php echo getLikes($post['p_id']); ?></span>
      	
      	&nbsp;&nbsp;&nbsp;&nbsp;

	    <!-- if user dislikes post, style button differently -->
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
  <script src="likescript.js"></script>
</body>
</html>
