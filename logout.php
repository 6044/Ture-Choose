<?php
	session_start ();
	$_SESSION=array();
	session_destroy();
	echo "<h3>logout succeed!<br />
	click here <a href='login.html'>login</a>";
?>