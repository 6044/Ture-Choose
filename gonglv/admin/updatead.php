<?php
error_reporting(0);
require("check.php");
require("../config.php");

isset($_GET['id'])?$id=$_GET['id']:null;
$adsql = "select * from xwmi_news where id='$id'";
$adery = mysql_query($adsql,$config);
$ad = mysql_fetch_array($adery);
$action = $_SERVER['QUERY_STRING'];
if($action == "post"){
    $id = $_POST['id'];
    $title = $_POST['title'];
    $text = stripcslashes($_POST['content']);
    $upsql = "update xwmi_news set title='$title',content = '$text'  where id='$id'";
    $upok = mysql_query($upsql,$config);
    if($upok)
    {
        echo "<center style=color:red;>修改成功!</center>";
        header("refresh:1;url=updatead.php?id=$id");
    }
exit;
}
?>
<script  src="../editor/kindeditor.js"></script>
<script  src="../editor/lang/zh_CN.js"></script>
<script>
var editor;
KindEditor.ready(function(K) {
editor = K.create('textarea[name="content"]', {
resizeType : '0',
allowPreviewEmoticons : false,
allowImageUpload : false,
items : [
'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
'insertunorderedlist', '|', 'emoticons', 'image', 'link']
});
});
</script>

<style>
body{
    margin:0;
    padding:0;
    text-align:center;
}
#main{
    margin-top:10px;
    width:710px;
    height:400px;
    margin-left:auto;
    margin-right:auto;
    text-align:left;
}


</style>

<body>
<form method="post" action="?post"  >
<div id="main"><input type="hidden" value="<?php echo $id;?>" name="id" />
<input value="<?php echo $ad['title'];?>" name="title" style="padding-left:5px;width: 700px;height:24px;background-color: #F0F8FF;border: #7F9DB9 solid 1px;line-height: 20px;color:#FF0000;" />
<textarea name="content" style="width:695px;height:350px;"><?php echo $ad['content'];?></textarea>
<button type="submit" style="width: 120px;height:28px;background-color: #FFFFFF;border:#004D00 solid 1px;font-size:14px;color: #004D00;" >&nbsp;修改</button>
</div>
</form>
</body>




