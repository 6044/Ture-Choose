<?php
error_reporting(0);
isset($_COOKIE['admin'])?$check=$_COOKIE['admin']:$check=null;
isset($_COOKIE['admin_name'])?$admin_user=$_COOKIE['admin_name']:$user=null;
if($check != "Y" ){header("Location:../index.php");exit;}
?>