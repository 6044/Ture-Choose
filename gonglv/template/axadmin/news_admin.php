<div id="user_main">
<div id="admin">
<div id="admin_top"><div style="padding-top:5px;padding-left:10px;">��̨���� - ���ŷ���</div></div>
<div id="admin_main">
<script type="text/javascript" src="../lhgdialog/lhgcore.min.js"></script> 
<script type="text/javascript" src="../lhgdialog/lhgdialog.min.js"></script>
<script type="text/javascript">

function opdg(id)
{
    var DG = new J.dialog({
		page:'updatead.php?id=' + id,
        title:'�޸���������',
        height:'500',
        width:'820',
        cancelBtn:false,
        resize:false,
        iconTitle:false,
        maxBtn:false,
        btnBar:false,
        onXclick:axoutauto,
        cover:true
	});
	DG.ShowDialog();
}
function delad(id)
{
    var DG = new J.dialog({
		page:'delad.php?id=' + id,
        title:'ɾ������',  
        height:'150',
        width:'350',
        cancelBtn:false,
        resize:false,
        iconTitle:false,
        maxBtn:false,
        cover:true,
        onXclick:axoutauto
	});
	DG.ShowDialog();
}

function axoutauto(){
history.go(0);
location.href='news_admin.php';
}
</script>

<?php
require_once("../config.php");
$m="12";//ÿҳ��ʾ�ļ�¼��
$numsql = "select * from xwmi_news";
$numery = mysql_query($numsql,$config);
$lognum = mysql_num_rows($numery);//�ܼ�¼��
$zy = (int)(($lognum-1)/$m)+1;//��ҳ��
isset($_GET['page'])?$page=$_GET['page']:$page="1";//��ǰҳ��
$one = (int)($page-1)*$m;//��ǰҳ��������¼


$adsql = "select * from xwmi_news order by id asc limit $one,$m ";
$adery = mysql_query($adsql,$config);
echo '<table cellpadding="5" cellspacing="1" width="955"  bgcolor="#3573AB"><tr bgcolor="#E0ECF5" style="color:#173046"; ><th align="center" width="550">���ű���</th><th align="center" >����ʱ��</th><th width="150" align="center">�������</th></tr>';
while($ad=mysql_fetch_array($adery))
{
echo '<tr bgcolor="#E7E7E7" >';
echo '<td align="left"><input disabled  style="border:0;width:550px;height:20px;" value='.$ad['title'].'></td>';
echo '<td align="center">'.$ad['datetime'].'</td>';
echo '<td align="center">';
echo '<button style="line-height: 18px;width: 60px;height:20px;background-color: #FFFF00;border:0;font-size:12px;color: #FF0000;" class="runcode" value="1" id="'.$ad['id'].'"onclick="opdg(this.id);">�޸�</button>';
echo "&nbsp;";
echo '<button style="line-height: 18px;width: 60px;height:20px;background-color: #FFFF00;border:0;font-size:12px;color: #FF0000;" class="runcode" value="1" id="'.$ad['id'].'" onclick="if(window.confirm(\'�Ƿ�ȷ��ɾ��?\'))delad(this.id);">ɾ��</button>'.'</td>';

echo '</tr>';
}

?>
</table>
<?php
if($lognum=="0")
{
    echo "<p>��ʱû�м�¼��</p>";
}
?>

 <style type="text/css">
 .pagelink
 {
float: right;
width:555px;
 
 }
.pagelink a
{
 color: #18344E;
}
.pagelink a:hover
{
 color: #BF0000;

}
 </style>
 <div style="padding-top: 10px;">
 <div style="float: left;">Page:<span style="color: #FF0000;"><?php echo $page;?></span>/<span style="color: #FF0000;"><?php echo $zy;?></span> | Record:<span style="color: #FF0000;"><?php echo $lognum;?></span></div>
 <div class="pagelink">
<?php
if($page > "1")
{
    echo '<a href=?page=1>��ҳ</a>';
    echo "&nbsp;";
    echo '<a href=?page='.($page-1).'>��һҳ</a>';
}

if($zy>$page)
{
    echo "&nbsp;";
    echo '<a href=?page='.($page+1).'>��һҳ</a>';
    echo "&nbsp;";
    echo '<a href=?page='.($zy).'>βҳ</a>';
}


?>

</div>

 
 </div>

</div></div></div>