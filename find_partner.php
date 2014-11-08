<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

</head>
<body>
	<?php
	include "connect_db.php";
		$place = $_GET["place"];
		$time = $_GET['time'];
		$price = $_GET['price'];
		$else = $_GET['else'];

		$result=mysql_query("insert into travel_prejudice (place,time,price) VALUES ('$place','$time','$price')");
		if (!$result)
			echo "insert error!";
		$select = mysql_query ("select* from travel_prejudice where place = '$place' && time = '$time'");
		if (!$select)
			echo "select fail";
		
		while($row = mysql_fetch_array($select))
		{
			echo $row['name'];
			echo "<br>";
		}

		mysql_close($conn);
	?>

</body>
</html>