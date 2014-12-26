<?php
session_start();
//echo $_SESSION['id'];
	if(!$_SESSION["id"]) header("Location:login.html");
	
	
$time=$_POST['time'];
$place=$_POST['place'];
$phone=$_POST['phone'];
$id=$_SESSION['id'];
//echo $time;
//echo $place;
//echo $phone;
include "connect_db.php";
$result=mysql_query ("insert into partner (sum,time,place,phone)
values ('1','$time','$place','$phone')");
if (!$result)
	;
	//echo "set up faild";
else
{
	$result2=mysql_query ("select * from partner where place='$place'&&phone='$phone'");
	$row=mysql_fetch_array ($result2);
	$teamid=$row['teamid'];
	//echo $teamid;
	$join_team=mysql_query ("update login set teamid='$teamid' where id='$id'");
}
header ("location:partner.php");
?>