<?php
require("check.php");
require("../config.php");
isset($_GET['id'])?$id=$_GET['id']:null;

$ax_deladsql = "delete from xwmi_news where id ='$id'";
$ax_deladok = mysql_query($ax_deladsql,$config);
if($ax_deladok)
{
    echo "ɾ���ɹ�!";
}
else
{
    echo "ϵͳ���ִ���,�޷�ɾ������,����!";
}
?>