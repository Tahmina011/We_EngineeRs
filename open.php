
<?php include('projectheader.php'); ?>
<?php include('open_server.php'); ?>
  <link rel="stylesheet" href="open_styles.css">
 <div class="row" style="background-color: #E7EBEA;">
  <div class="column left">
  </div>
  <div class="column middle">

  <div class="wrapper">
     <?php echo $comments; ?>

    <div class="comment_form">
    <form >
      <div>
        <input type="hidden" name="name" id="name" value=<?php echo $_SESSION['username'];?>>
      </div>
      <div>
        <label for="comment">Share your feelings:</label>
        <textarea name="comment" id="comment" cols="30" rows="5"></textarea>
      </div>
      <button type="button" id="submit_btn">POST</button>
      <button type="button" id="update_btn" style="display: none;">UPDATE</button>
    </form>
    </div>
     </div>
</div>
  <div class="column right">
  </div>
</div>
</div>
<?php
include('projectfooter.php');
?>
<!-- Add JQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="open_scripts.js"></script>