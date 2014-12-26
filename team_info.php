<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <script src="scripts/jquery.min.js"></script>
   <script src="sjs/bootstrap.min.js"></script>
</head>
<body>
	<table class="table table-boeder table-hover">
		<tr>
			<th>Userame</th>
			<th>Gender</th>
			<th>Age</th>
			<th>Phone</th>
		</tr>
		
<?php
$team=$_GET['team'];
include "connect_db.php";
$result=mysql_query("select * from login where team='$team'");
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