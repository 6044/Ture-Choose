<?php
require_once("check.php");
$a = $_SERVER['QUERY_STRING'];
if($a=="a"){


require_once("../config.php");
$text = stripcslashes($_POST['content']);

$htmltext = strip_tags($text);
$jianjie = mb_substr($htmltext,0,130,'GB2312');

ini_set("datetime.zone","PRC");
$date = date("Y-m-d H:i:s");
$imgurl = $_POST['imgurl'];
$title = $_POST['title'];
$inadsql = "insert into xwmi_news (content,images,title,jianjie,datetime) values ('$text','$imgurl','$title','$jianjie','$date')";
$inadok = mysql_query($inadsql,$config);
if($inadok){
    echo "<script>window.onload=function a(){
        alert('成功发布!');location.href='news_admin.php';
    }</script>";
}
}
?>

<div id="user_main">
<div id="admin">
<div id="admin_top"><div style="padding-top:5px;padding-left:10px;">后台管理 - 新闻发布</div></div>
<div id="admin_main">
<link rel="stylesheet" href="../editor/themes/default/default.css" />
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
	<script>
			KindEditor.ready(function(K) {
				var uploadbutton = K.uploadbutton({
					button : K('#uploadButton')[0],
					fieldName : 'imgFile',
					url : '../editor/php/upload_json.php?dir=image',
					afterUpload : function(data) {
						if (data.error === 0) {
							var url = K.formatUrl(data.url, 'absolute');
							K('#imgurl').val(url);
						} else {
							alert(data.message);
						}
					},
					afterError : function(str) {
						alert('自定义错误信息: ' + str);
					}
				});
				uploadbutton.fileBox.change(function(e) {
					uploadbutton.submit();
				});
			});
		</script>
 
<form method="post" action="?a" >
<table cellpadding="6" cellspacing="1">
<tr>
<td align="right">标&nbsp;题:</td>
<td><input type="text" name="title" style="width: 350px;height:25px;line-height: 25px;" /> </td>
</tr>
<tr>
<td>缩&nbsp;图:</td>
<td><input class="ke-input-text" style="width: 350px;height:25px;" type="text" id="imgurl" name="imgurl" value="" readonly="readonly" /> <input type="button" id="uploadButton" value="上传图片" />&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size: 12px;">建议图片尺寸:125*96</span></td>
</tr>
<tr>
<td valign="top" align="right">内&nbsp;容:</td>
<td><textarea name="content" style="width:700px;height:350px;"></textarea></td>
</tr>
<tr>
<td></td>
<td><input type="submit" style="width: 100px;height:28px;background-color: #FFFFFF;border:#004D00 solid 1px;font-size:14px;color: #004D00;" value="发布" /></td>
</tr>
</table>
</td>
</tr>