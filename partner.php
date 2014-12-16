<?php
session_start();
//echo $_SESSION['id'];
	if(!$_SESSION["id"]) header("Location:login.html");

?>
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <script src="scripts/jquery.min.js"></script>
   <script src="sjs/bootstrap.min.js"></script>
</head>
<body>
<table class="table table-border table-hover">
							<tr>
								<th>sum</th>
								<th>time</th>
								<th>place</th>
								<th>phone</th>
								<th>Join</th>
								<th>Detail</th>
							</tr>
<?php
	include "connect_db.php";
	$result=mysql_query("select * from partner");
	while ($row=mysql_fetch_array($result))
	{
		$phone=$row['phone'];
		$id=$_SESSION['id'];
		//echo $phone;
		echo "<tr>";
			echo "<td>" . $row['sum'] . "</td>";
			echo "<td>" . $row['time'] . "</td>";
			echo "<td>" . $row['place'] . "</td>";
			echo "<td>" . $row['phone'] . "</td>";
?>

			<td><form action="<?php echo $_SERVER["PHP_SELF"];?>" method = "post">
						<button type="submit" name="submit" class="btn">Join in</button>
						</form></td>
<?php
			echo '<td><a href="team_info.php? team='.$phone.'">Detail</a></td>';
					
		echo "</tr>";
		
		if (isset($_POST['submit']))
		{
			$sum=$row['sum']+1;
			$place=$row['place'];
			//echo $place;
			$join_result=mysql_query("update partner set sum='$sum' where place='$place'");
			$join_team=mysql_query ("update login set team='$phone' where id='$id'");
		}
	}
	echo "</table>";
	
	mysql_close($conn);
?>
</table>
<div class="container">
<form  class="well" action="set_team.php" method = "post">
				
	Time:<input type="date" name="time" class="span2" /><br />
	Place:<input type="text" name= "place" class="span2" /><br />
	Phone:<input type="text" name= "phone" class="span2" /><br />
	<button type="submit" class="btn btn-success">Set up a team</button>
</form>	
</div>