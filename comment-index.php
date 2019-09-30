<html>
<head>
<link rel="stylesheet" type="text/css" href="commentstyle.css"/>
<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript">

function sendPost() {
var comment = document.getElementById("comment").value;
var name = document.getElementById("username").value;
if (comment && name) {
$.ajax
({
type: 'POST',
url: 'Post_comment2.php',
data: {
user_comm: comment,
user_name: name
},
success: function (response) {
console.log(response);
document.getElementById("all_comments").innerHTML = response + document.getElementById("all_comments").innerHTML;
document.getElementById("comment").value = "";
document.getElementById("username").value = "";

}
});

}

return false;
}

</script>

</head>

<body>

<form method='post' action="" onsubmit="return sendPost();">
<textarea id="comment" name="comment" placeholder="Write Your Comment Here....."></textarea>
<br>
<input type="text" id="username" name="username" placeholder="Your Name">
<br>
<input type="submit" value="Post Comment">
</form>

<div align="center" id="all_comments">
<?php
include_once 'DbConfig.php';
$comm = $connect->query("SELECT name,comment,post_time from comments order by post_time desc");
while($row=$comm->fetch_array(MYSQLI_ASSOC))
{
$name=$row['name'];
$comment=$row['comment'];
$time=$row['post_time'];
?>

<div class="comment_div">
<p class="name">Posted By:<?php echo $name;?></p>
<p class="comment"><?php echo $comment;?></p>
<p class="time"><?php echo $time;?></p>
</div>

<?php
}
?>
</div>

</body>
</html>