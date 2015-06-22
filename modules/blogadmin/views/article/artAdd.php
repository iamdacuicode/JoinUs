<?php header("Cache-control:private"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta charset="utf-8" />
<title>KindEditor PHP</title>
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/css/themes/default/default.css" />
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/css/plugins/code/prettify.css" />
<script charset="utf-8" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/js/kindeditor.js"></script>
<script charset="utf-8" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/js/lang/zh_CN.js"></script>
<script charset="utf-8" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/js/plugins/code/prettify.js"></script>
<style type="text/css">
	body{margin:0px; padding:0px;font-size:12px}
	#mainbody{width:900px; height:680px; border:1px solid #ccc;}
	#basic{width:95%;height:94%;margin:0 auto;margin:19px;clear:both}
	textarea{resize:none;outline:none;width: 99%; height: 400px; visibility: hidden;
			overflow:hidden;clear:both}
	ul li{list-style:none;float:left;font-size:14px}
	.con_nav{height:5px;width:100%;clear:both}
	#con_title{width:500px};
</style>
</head>
<body>
	<form name="example" method="post" action="/index.php?r=blogadmin/article/show">
	<div id="mainbody">
		<div class="标题">
			<ul>
				<li>标题：&nbsp;&nbsp;</li>
				<li><input type="text" name="con_title" value="" id="con_title"</li>
			</ul>
			<ul>
				<li>文章分类：</li>
				<li><input type="text" name="con_type" value="" id="con_type"</li>
			</ul>
		</div>
		<div class="con_nav"></div>
		<div id="basic">
			<textarea name="content">
			</textarea>
			<br /> <input type="submit" name="button" value="提交内容" /> (提交快捷键: Ctrl + Enter)
		</form>
		</div>
	</div>
</body>
<script>
		KindEditor.ready(function(K) {
			var editor1 = K.create('textarea[name="content"]', {
				//cssPath : '../plugins/code/prettify.css',
				//uploadJson : '../php/upload_json.php',
				//fileManagerJson : '../php/file_manager_json.php',
				resizeType: 1,
				wyswygMode: true,
				useContextmenu: true,
				allowFileManager : true,
				afterCreate : function() {
					var self = this;
					K.ctrl(document, 13, function() {
						self.sync();
						K('form[name=example]')[0].submit();
					});
					K.ctrl(self.edit.doc, 13, function() {
						self.sync();
						K('form[name=example]')[0].submit();
					});
				}
			});
			prettyPrint();
		});
</script>
</html>

