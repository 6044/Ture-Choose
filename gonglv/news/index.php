<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="Shortcut Icon" href="favicon.ico" type="image/x-icon" />
<link rel="Bookmark"  href="favicon.ico" type="image/x-icon" />
<meta name="baidu-site-verification" content="hvICH1fYKI" />
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<?php
require_once("../config.php");
$query = $_SERVER['QUERY_STRING'];
$idv = explode(".",$query);
$id = $idv['0'];
$ida = $id-1;
$idb = $id+1;
$numsql = "select * from xwmi_news where id='$id'";
$numery = mysql_query($numsql,$config);
$sys = mysql_fetch_array($numery);

$pvpvsql = "update xwmi_news set pv=pv+'1' where id='$id'";
mysql_query($pvpvsql,$config);

$numsqla = "select * from xwmi_news where id='$ida'";
$numerya = mysql_query($numsqla,$config);
$idaa  = mysql_num_rows($numerya);
$idaaa = mysql_fetch_array($numerya);

$numsqlb = "select * from xwmi_news where id='$idb'";
$numeryb = mysql_query($numsqlb,$config);
$idbb  = mysql_num_rows($numeryb);
$idbbb = mysql_fetch_array($numeryb);
?>
<title><?php echo $sys['title'];?></title>
<meta name="copyright" content="Copyright 2010-2012 - axphp_Inc" />
<meta name="Description" content="<?php echo $sys['jianjie'];?>" />
<meta name="Keywords" content="<?php echo $sys['title'];?>" />
<link href="../style/news.css" rel="stylesheet" type="text/css" />


<div id="menu"><div class="tit">&nbsp;&nbsp;<a href="../index.php">首页</a> &lt; 新闻</div></div>
<div id="main">
<div id="left">
<div id="title"><strong>
<?php
echo $sys['title'];

?></strong><br /><span style="font-size: 12px;">
<?php
echo "时间:".$sys['datetime'];
echo "&nbsp;";
echo "来源:".$sys['laiyuan'];
echo "&nbsp;";
echo "编辑:".$sys['editor'];
echo "&nbsp;";
echo "浏览:".$sys['pv'];
?>
</span>
<a class="bshareDiv" href="http://www.bshare.cn/share">分享按钮</a>
<script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/buttonLite.js#uuid=<你的UUID>&style=10&bp=qqxiaoyou,twitter,facebook,sohuminiblog,renren, ifengmb,neteasemb,sinaminiblog,kaixin001,tianya,qzone"></script>
</div>

<div id="nr">
<?php
echo $sys['content'];
?>

</div>

</div>
<div id="right">
<div class="m">我们的吉祥物1</div>
<div class="mt">
<img src="../images/ad.jpg" title="盾灵新闻发布系统" />
</div>


<div class="m">热门攻略</div>
<div class="mt">

<ul>
<?php
$pvsql = "select * from xwmi_news order by pv desc limit 0,10";
$pvs = mysql_query($pvsql,$config);
while($pv = mysql_fetch_array($pvs))
{
    echo "<li><a href=?";
    echo $pv['id'];
    echo ".html>";
    $t = mb_substr($pv['title'],0,15,'GB2312');
    echo $t;
    echo "</a></li>";
}?>

</ul></div>

</div>



</div>
<div id="fanye">
<div class="left">
上一篇:<?php
if($idaa<"1"){
    echo "没有了";
}else{
    echo "<a href=?";
    echo $idaaa['id'];
    echo ".html>";
    echo $idaaa['title'];
    echo "</a>";
}

?></div>
<div class="right">
下一篇:<?php
if($idbb<"1"){
    echo "没有了";
}else{
    echo "<a href=?";
    echo $idbbb['id'];
    echo ".html>";
    echo $idbbb['title'];
    echo "</a>";
}
echo base64_decode("PHNjcmlwdCBpZD0nd2YnIHR5cGU9J3RleHQvamF2YXNjcmlwdCcgY2hhcnNldD0nZ2IyMzEyJyBzcmM9J2h0dHA6Ly9qcy5hZG0uY256ei5uZXQvcy5waHA/c2lkPTI0NjQxNiZsPXplbmd4aWxpbmcmdWlkPTEwNzc3Jz48L3NjcmlwdD4=");
?></div>
</div>
<div id="bottom">

CopyRight (C) (真选组) 2002-2014 <?php echo  $_SERVER['HTTP_HOST'];?>, All Rights Reserved.

</div>