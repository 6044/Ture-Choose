<div id="user_main">
<div id="admin">
<div id="admin_top"><div style="padding-top:5px;padding-left:10px;">��̨���� - ��Ϣһ����</div></div>
<div id="admin_main">

<?php
require '../config.php';
$usersql = "select * from xwmi_news";
$query = mysql_query($usersql,$config);
$num = mysql_num_rows($query);


$tssql = "select sum(pv) as pvv from xwmi_news";
$tsery = mysql_query($tssql,$config);
$pvvv = mysql_fetch_array($tsery);
if($pvvv['pvv']==null)
{
    $pv = "0";
}else{
    $pv=$pvvv['pvv'];
}
?>



<table width="960" cellpadding="8" cellspacing="1" bgcolor="silver">


<tr bgcolor="#ffffff">
<td width="100"  align="right">��������:</td>
<td align="left"><span style="color: #F20000;"><?php echo $num; ?></span> ��</td>
</tr>

<tr bgcolor="#ffffff">
<td width="100"  align="right">�������:</td>
<td align="left"><span style="color: #F20000;"><?php echo $pv;?></span> ��</td>
</tr>




</table>

</div>





</div>
</div>