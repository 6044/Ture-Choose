<?php
$time=$_POST['time'];
$place=$_POST['place'];
$phone=$_POST['phone'];
//echo $time;
//echo $place;
//echo $phone;
include "connect_db.php";
$result=mysql_query ("insert into partner (sum,time,place,phone)
values ('1','$time','$place','$phone')");
if (!$result)
	echo "set up faild";
else
	header ("location:partner.php");


?>