<?php
$xmlfile="config.xml";
//$dom=simplexml_load_file("config.xml");
define("TITLE",$dom->title);
define("DESC",$dom->description);
define("HOST",$dom->dbhost);
define("USER",$dom->dbuser);
define("PASS",$dom->dbpass);
define("PAGESIZE",$dom->pagesize);
define("ADMIN_USER",$dom->adminuser);
define("ADMIN_PASS",$dom->adminpass);
$conn = mysql_connect ("w.rdc.sae.sina.com.cn:3307/app_hit6044","55005532ko","120x3x512ilxlhm15kxwilz0lx2mzwz5z0zhjj13");
mysql_query("set names 'utf8'");
mysql_select_db("app_hit6044",$conn);
?>