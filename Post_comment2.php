<?php
include_once 'DbConfig.php';
if(isset($_POST['user_comm']) && isset($_POST['user_name']))
{
$comment=$_POST['user_comm'];
$name=$_POST['user_name'];
$insert=$connect->query("INSERT into comments values('','$name','$comment',CURRENT_TIMESTAMP)");

$id= $connect->insert_id;
$select=$connect->query("SELECT name,comment,post_time from comments where name='$name' and comment='$comment' and id='$id'");

if($row=$select->fetch_array(MYSQLI_ASSOC))
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
exit;
}
else{
echo "No Data Is set";
}

?>