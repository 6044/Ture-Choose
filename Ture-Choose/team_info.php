<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <script src="scripts/jquery.min.js"></script>
   <script src="sjs/bootstrap.min.js"></script>
</head>
<body>
<link href="images/style1.css" rel="stylesheet" type="text/css" />
<ul id="nav">
    <li><a href="index.php">首页</a></li>
    <li><a href="partner.php">驴友组队</a></li>
    <li><a href="rocboss/index.php">驴友社区</a></li>
    <li><a href="gonglv/index.php">旅游攻略</a></li>
    <li><a href="in.php">路线评价</a></li>
    <li><a href="logout.php">退出</a></li>
</ul>
	<table class="table table-boeder table-hover">
		<tr>
			<th>Userame</th>
			<th>Gender</th>
			<th>Age</th>
			<th>Phone</th>
		</tr>
		
<?php
$teamid=$_GET['teamid'];
include "connect_db.php";
$result=mysql_query("select * from login where teamid='$teamid'");
while ($row=mysql_fetch_array($result))
{
	echo "<tr>";
			echo "<td>" . $row['username'] . "</td>";
			echo "<td>" . $row['gender'] . "</td>";
			echo "<td>" . $row['age'] . "</td>";
			echo "<td>" . $row['phone'] . "</td>";
		echo "</tr>";
}
echo "</table>";
mysql_close($conn);

?>
</body>
</html>