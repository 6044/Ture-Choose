<script  src="../editor/kindeditor.js"></script>
<script  src="../editor/lang/zh_CN.js"></script>
		<script>
			var editor;
			KindEditor.ready(function(K) {
				editor = K.create('textarea[name="content"]', {
					resizeType : 0,
					allowPreviewEmoticons : false,
					allowImageUpload : false,
					items : [
						'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
						'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
						'insertunorderedlist', '|', 'emoticons', 'image', 'link']
				});
			});
		</script>

<form method="POST" action="?">
<textarea name="content" style="width:700px;height:300px;"></textarea><input type="submit" />
</form>
    
        
        <?php
        echo stripcslashes($_POST['content']);
        ?>
        