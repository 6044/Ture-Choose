<?php
error_reporting(0);
require("check.php");
require("../config.php");
isset($_GET['id'])?$id=$_GET['id']:null;
$dxsql = "select * from axphp_liuyan where id='$id'";
$dxery = mysql_query($dxsql,$config);
$dx = mysql_fetch_array($dxery);
$action = $_GET['post'];
if($action == "post"){
    $hfcontent = $_POST['hfcontent'];

    $uphfsql = "update axphp_liuyan set hfcontent = '$hfcontent',huifu = '<font color=\"#FF0000\">�ѻظ�</font>' where id = '$id'";
    $upok = mysql_query($uphfsql,$config);
    echo "<script>window.onload=function(){ alert('�ظ��ѷ���!');location.href='huifu.php?id=$id';}</script>";
    }
?>
<style type="text/css">
table tr td.text{
    padding-left: 30px;
}
</style>
<script src="../js/inad.js"></script>
<form method="post" action="?post=post&id=<?php echo $id;?>">
<table align="center" width="550" cellpadding="8" cellspacing="1" bgcolor="silver">
<tr bgcolor="#ffffff">
<td ><span style="color: #00699B;font-size:22px;">&raquo;</span><b style="color:#00699B;font-size:16px;"> �û� <?php echo $dx['username'];?> ����ѯ����</b></td>
</tr>

<tr bgcolor="#ffffff">
<td class="text">����:<?php echo $dx['title'];?></td>
</tr>

<tr bgcolor="#ffffff">
<td class="text">����:<?php echo $dx['content'];?></td>
</tr>

<tr bgcolor="#ffffff">
<td class="text">״̬:<?php echo $dx['huifu'];?>&nbsp;&nbsp;����:[<span style="color: #C2290A;"><?php echo $dx['leixing'];?></span>]&nbsp;&nbsp;���:[<span style="color: #C2290A;"><?php echo $dx['jinji'];?></span>]</td>
</tr>



<tr  bgcolor="#ffffff">
<td><span style="color: #00699B;font-size:22px;">&raquo;</span><b style="color:#00699B;font-size:16px;"> ����Ա�ظ�</b></td>
</tr>

<tr bgcolor="#ffffff">
<td class="text"><textarea name="hfcontent" style="width: 500px;height:80px;"><?php echo $dx['hfcontent'];?></textarea></td>
</tr>


<tr bgcolor="#ffffff">
<td align="left" style="padding-left: 30px;" >
<button type="submit" style="width: 100px;height:25px;background-color: #FFFFFF;border:#004D00 solid 1px;font-size:14px;color: #004D00;" >���ͻظ�</button>
</td>

</tr>
</form>
</table>