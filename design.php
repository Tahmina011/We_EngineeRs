<?php if(isset($_SESSION['open-book']) && $_SESSION['open-book']==1)
{
echo '<script language="javascript">';
echo 'alert("please log in or register..")';
echo '</script>';
$_SESSION['open-book']=0;

} ?>
<div class="row" style="background-color: #E7EBEA;">
	
	<div class="column left" class="nav-login" style="background-color: #E7EBEA; color: black;">
		 	<div>
		  <?php  
		  if($_SESSION['check']==1)
		  {
		  //$msg=	$_SESSION['message'];
		  $pic= $_SESSION['avatar'];
		  $nam= $_SESSION['username'];
		 // echo '<script> alert(")'
	    echo '
	    <div style="height: 220px;width: 100%; border: 5px solid #A3D5BC;position: center;padding-bottom: 20px;">
        <span class="user" style="padding: 10px;"><img  style="height:150px; width:150px; border-radius:50%; border: 3px solid black;" src="'.$pic.'"></span><br/>
         WELCOME <span class="user" style="color: black;font-size: 18px;">'.$nam.'</span>
         

         	<a href="uploading.php"><h4 style="color: black;padding:10px;">Want to share??</h4></a>
         	</div>';
         	}
         	?>
         </div> 
         	<div style="width: 90%; height: 350px;border-style: groove;padding: 5px;padding-top: 20px;">
         		<p style="font-size: 10px;color: red;"><h4 style="color: red;">The prizes for all categories are as follows:</h4><br/>
1. First prize – 7500/=, certificate, and publication on the website<br/>
<br>
2.Second prize-5000/=, certificate, and publication on the website<br/><br>
3.Third prize-2500/=, certificate, and publication on the website<br/></p>
         	</div>
</div>



	<div class="column middle" style="background-color: #CBE1D4;color: black;">
		<?php 
		$mysqli=new mysqli('localhost','root','','allposts');
		$result=$mysqli->query("SELECT * FROM allpost  where p_category ='short story' order by p_id desc ");
		while($row=$result->fetch_assoc())
		{
			
			echo "<div id='img_div'>";
			echo "<h2>".$row['p_heading']."</h2>";
			echo "<img src='".$row['p_image']."'>";
			echo "<p>".$row['p_text']."</p>";
			echo "<h5>BY: ".$row['p_username']."</h5>";
			echo "<div><i class='fa fa-thumbs-o-up'></i>
			<i class='fa fa-thumbs-o-down'></i></div>";
			/*$_SESSION['ar_id']=$row['id'];
			include('showcomment.php');
			echo '<form action="post_comment.php" method="POST">
		<input type="text" name="name" placeholder="Your name"><br>
		<textarea name="comment" cols="50" rows="2" placeholder="Leave a comment"></textarea><br>
		<input type="submit" name="" value="comment">
	</form>';*/
	echo "</div>";

		}
		?>
	</div>


	<script >
			var myindex=0;
			slidechange();
			function slidechange()
			{
				var i;
				var x=document.getElementsByClassName("mySlides");
				for(i=0;i<x.length;i++)
				{
					x[i].style.display="none";
				}
				myindex++;
				if(myindex>x.length)
				{
					myindex=1
				}
				x[myindex-1].style.display="block";
				setTimeout(slidechange,3000);
			}
		</script>
		<div class="column right">
		
                <div style=" background-color:#E7EBEA;border-style: ridge;border-color: gray;height: 370px; ">
                                  
                    <h4 style="color: black;padding: 10px;background-color: 
 #A1F1FD;">RECENT EVENTS</h4>
                                <marquee style="text-align: left;padding: 5px;height: 320px;background-color: #A0D9EA;" direction="up" scrollamount="2" onmouseover="this.stop()" onmouseout="this.start();">
                                                        													   
								    <a href="#" class="tabbed21">Online game will be organized..</a><div style="font-weight:bold;text-align:right">April 17, 2018</div><br /><hr style="color:#aad884;border:solid .005em #aad884;" />
								     <a href="#" class="tabbed21">Technival,2018 will be held on 24,april..</a><div style="font-weight:bold;text-align:right">April 24, 2018</div><br /><hr style="color:#aad884;border:solid .005em #aad884;" />
								      <a href="#" class="tabbed21">Short Stories competion will be arranged ..</a><div style="font-weight:bold;text-align:right">March 17, 2018</div><br /><hr style="color:#aad884;border:solid .005em #aad884;" />
                                                  
                                </marquee>
										
                  
						</div>
	    </div>
	</div>
