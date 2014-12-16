	<?php
		session_start();
		if (!isset($_SESSION['username']or$_SESSION['username']==""))
		{
			echo "You are not login!<br />
			Please click here <a href='login.html'>login</a>";
		}
		exit;
	?>