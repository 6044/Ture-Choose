<?php
	session_start();
	echo "sdlkjf";
	if(!$_SESSION["id"]) 
		header("Location:login.html");
	echo "sdlkjf";
?>	
<html>
<head>
   <title>结伴</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <script src="/scripts/jquery.min.js"></script>
   <script src="sjs/bootstrap.min.js"></script>
   <style type="text/css">
   
   </style>
</head>
<body background="find_partner_background.jpg">
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
			<div class="row-fluid">
				<div class="span12">
					<p>
						真选驴友辅助系统--结伴
					</p>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span2">
				</div>
				<div class="span6">
					<div align = "center">
						<form role = "form" action = "find_partner.php" method = "get" >
							<div class = "form-group">
								<label for = "place">地点</label>
								<input class = "form-control" type = "text" name = 'place' id = "place" placeholder= "请输入您想去的地点"/>
							</div>
							<div class = "form-group">
								<label for = "time">时间</label>
								<input type = "text" class = "form-control" name = 'time' id = "time" placeholder = "请输入您想去的时间"/>
							</div>
							<div class = "form-group">
								<label for = "price">资金预算</label>
								<input type = "text" class = "form-control" name = 'price' id = "price" />
							
							</div>
							<div class = "form-group">
								<label for = "else">其他</label>
								<input type = "text" class = "form-control" name = 'else' id = "else" />
							
							</div>
							<div class = "form-group">
								<input type = "submit" value = "提交"/>
							</div>
						</form>
					</div>
				
				
				</div>
				<div class="span4">
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<address><strong>真选组</strong></address> <address><abbr title="Phone">P:</abbr> 18646083517</address> <address>2014.11.11</address>
				</div>
			</div>
		</div>
	</div>
</div>
	

</body>
</html>