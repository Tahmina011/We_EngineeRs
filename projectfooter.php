<link rel="stylesheet" href="form.css" type="text/css">
<div class="footer">
  <?php
        $mysqli = new mysqli('localhost','root','','accounts');
        $sql='SELECT username,avater FROM users';
        $result=$mysqli->query($sql);
        ?>
        <div id="registered">
        	<span>ALL REGISTERED USERS</span>
        	<?php
        	while($row= $result->fetch_assoc())
        	{
        		echo "<div class='userlist'><span>
        		$row[username]</span><br/>";
        		echo "<img style='border-radius: 50%' src='$row[avater]'></div>";
        	}
        	?> 
        </div>
</div>


</body>
</html>