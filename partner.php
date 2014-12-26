<?php
session_start();
//echo $_SESSION['id'];
	if(!$_SESSION["id"]) header("Location:login.html");
	//include ("nav.html");
	//echo "nav.html";
?>
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
<table class="table table-border table-hover">
							<tr>
								
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
		$teamid=$row['teamid'];
		$id=$_SESSION['id'];
		$sum=0;
		$sum_result=mysql_query("select * from login where teamid='$teamid'");
		
		while ($row2=mysql_fetch_array ($sum_result))
			$sum++;
		echo "<tr>";
			//echo "<td>" . $sum . "</td>";
			echo "<td>" . $row['time'] . "</td>";
			echo "<td>" . $row['place'] . "</td>";
			echo "<td>" . $row['phone'] . "</td>";
		?>

			<td><form action="<?php echo $_SERVER["PHP_SELF"];?>" method = "post">
						<button type="submit" name="submit" class="btn">Join in</button>
						</form></td>
		<?php
			echo '<td><a href="team_info.php? teamid='.$teamid.'">Detail</a></td>';
					
		echo "</tr>";
		//join in a team
		if (isset($_POST['submit']))
		{
			
			//update personnal information of teamid to join in
			$join_team=mysql_query ("update login set teamid='$teamid' where id='$id'");
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