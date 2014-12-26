<?php
$mysql_server="w.rdc.sae.sina.com.cn:3307/app_hit6044";
$mysql_username="55005532ko";
$mysql_userpass="120x3x512ilxlhm15kxwilz0lx2mzwz5z0zhjj13";
$mysql_select_db="app_hit6044";
$config=mysql_connect($mysql_server,$mysql_username,$mysql_userpass)or die ("Error code AX000001");
$db=mysql_select_db($mysql_select_db)or die ("Error code AX000002");
mysql_query("set names gbk");
?>