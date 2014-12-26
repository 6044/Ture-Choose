<div id="user_main">
<div id="admin">
<div id="admin_top"><div style="padding-top:5px;padding-left:10px;">后台管理 - 新闻发布</div></div>
<div id="admin_main">
<script type="text/javascript" src="../lhgdialog/lhgcore.min.js"></script> 
<script type="text/javascript" src="../lhgdialog/lhgdialog.min.js"></script>
<script type="text/javascript">

function opdg(id)
{
    var DG = new J.dialog({
		page:'updatead.php?id=' + id,
        title:'修改新闻内容',
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
        title:'删除新闻',  
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
$m="12";//每页显示的记录数
$numsql = "select * from xwmi_news";
$numery = mysql_query($numsql,$config);
$lognum = mysql_num_rows($numery);//总记录数
$zy = (int)(($lognum-1)/$m)+1;//总页数
isset($_GET['page'])?$page=$_GET['page']:$page="1";//当前页数
$one = (int)($page-1)*$m;//当前页的首条记录


$adsql = "select * from xwmi_news order by id asc limit $one,$m ";
$adery = mysql_query($adsql,$config);
echo '<table cellpadding="5" cellspacing="1" width="955"  bgcolor="#3573AB"><tr bgcolor="#E0ECF5" style="color:#173046"; ><th align="center" width="550">新闻标题</th><th align="center" >发布时间</th><th width="150" align="center">管理操作</th></tr>';
while($ad=mysql_fetch_array($adery))
{
echo '<tr bgcolor="#E7E7E7" >';
echo '<td align="left"><input disabled  style="border:0;width:550px;height:20px;" value='.$ad['title'].'></td>';
echo '<td align="center">'.$ad['datetime'].'</td>';
echo '<td align="center">';
echo '<button style="line-height: 18px;width: 60px;height:20px;background-color: #FFFF00;border:0;font-size:12px;color: #FF0000;" class="runcode" value="1" id="'.$ad['id'].'"onclick="opdg(this.id);">修改</button>';
echo "&nbsp;";
echo '<button style="line-height: 18px;width: 60px;height:20px;background-color: #FFFF00;border:0;font-size:12px;color: #FF0000;" class="runcode" value="1" id="'.$ad['id'].'" onclick="if(window.confirm(\'是否确定删除?\'))delad(this.id);">删除</button>'.'</td>';

echo '</tr>';
}

?>
</table>
<?php
if($lognum=="0")
{
    echo "<p>暂时没有记录！</p>";
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
    echo '<a href=?page=1>首页</a>';
    echo "&nbsp;";
    echo '<a href=?page='.($page-1).'>上一页</a>';
}

if($zy>$page)
{
    echo "&nbsp;";
    echo '<a href=?page='.($page+1).'>下一页</a>';
    echo "&nbsp;";
    echo '<a href=?page='.($zy).'>尾页</a>';
}


?>

</div>

 
 </div>

</div></div></div>