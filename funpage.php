<?php
include('projectheader.php'); 
include('funpage_one_server.php');
?>
<link rel="stylesheet" type="text/css" href="style.css">
<div class="row" style="background-color: #E7EBEA;">
<div class="column left">
	<?php
	 $mysqli=new mysqli('localhost','root','','funtime');
	 $res=$mysqli->query("SELECT username from rating where r_rating in (select max(r_rating) from rating)");
	 //$h=$res['username'];
	 while($ro=$res->fetch_assoc())
		{
			$h=$ro['username'];
			//echo $h;
			 $mysql = new mysqli('localhost','root','','accounts');
			 
        $sql="SELECT username,avater FROM users where username='$h'";
        $result=$mysql->query($sql);
        while($row=$result->fetch_assoc())
		{
        $pp=$row['username'];
        $pt=$row['avater'];
       // echo $pp;
       // echo $pt;
        		 echo '
	    <div style="height: 220px;width: 100%; border: 5px solid #A3D5BC;position: center;padding-bottom: 20px;">
        <span class="user" style="padding: 10px;"><img  style="height:150px; width:150px; border-radius:50%; border: 3px solid black;" src="'.$pt.'"></span><br/>
         WELCOME <span class="user" style="color: black;font-size: 18px;">'.$pp.'</span>
         	</div>';
         }
         }

	?>

	</div>

<link rel="stylesheet" type="text/css" href="funtime.css">

	
	<div class="column middle">
			
		<h1 style="color: black ;text-align: center;">ACHIEVEMENTS</h1>
		<?php echo $post ?>
	</div>
	<div class="column right">
	</div>
</div>

<?php
include('projectfooter.php');  
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="funpage_scripts.js"></script>