<?php
include('projectheader.php');
 ?>
  <?php if($_SESSION['check']!=1){
    /* echo '<script language="javascript">';
echo 'alert("message successfully sent")';
echo '</script>';*/
$_SESSION['open-book']=1;
    header("location: projecthomepage.php");
} 
?>


<div class="column left">
	
</div>
<div class="column middle" style="background-color: black;color: white;">
	<?php  
	//session_start();
	$mysqli=new mysqli('localhost','root','','accounts');
if($_SERVER['REQUEST_METHOD']=='POST'){
	 $status=$mysqli->real_escape_string($_POST['status']);
	 $sql = "INSERT INTO posts (status) VALUES ('$status')";
	 if($mysqli->query($sql)===true)
          {
            header("location: open-book.php");
          }
}
	?>
	<h2 style="background-color: #EBEDEF;padding: 15px;color: black;">Share something anonymously..!!</h2>
	<form  action="open-book.php" method="post" enctype="multipart/form-data" autocomplete="off">
		<div style="background-color: #F2F2F2;padding-left: 10px;padding-top: 20px;padding-right: 5px;min-height: 200px;">
		<textarea style="min-height: 100px;padding-top: 20px;font-size: 16px;border-style: ridge;background-color: #C0DFFD ;border-color: #FE7C6D ;border-width: 6px; color: black; " name="status" placeholder="share your feelings or somethings as anonymous"></textarea>
		<input style="width: auto;height: auto;float: right;background-color: gray;color: black;position: " type="submit" value="POST" name="register" class="btn btn-block btn-primary" />
		</div>
	</form>
	<div style="border-color: gray;color: black;">
		 <?php
        $mysqli = new mysqli('localhost','root','','accounts');
        $sql='SELECT * FROM posts order by post_id desc';
        $result=$mysqli->query($sql);
        ?>
        <div style="padding:5px; border-style: ridge;border-width: 5px;background-color: #0F2439;padding-left:10px;">
        	<?php
        	while($row= $result->fetch_assoc())
        	{
        		$stat = nl2br($row['status']);
        		echo "<div style='background-color:#C0DFFD;padding:10px;font-size:18px;border-style: groove;width: 90%;padding-left:10px;'>$stat<br/>";
        		echo "<p style='float:right;font-size: 12px;'>$row[status_time]</p></div><br/><br/>";
        	}
        	?> 
		
	</div>
	</div>
</div>
<div class="column right">
	
</div>

<?php 
include('projectfooter.php');
 ?>