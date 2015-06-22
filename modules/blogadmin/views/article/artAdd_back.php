<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加文章</title>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/js/ubbeditor/ubbEditor.js"></script>
</head>
<form action="/index.php?r=blogadmin/article/show" method="post">
<textarea id="content" name="content" style="WIDTH: 800px; HEIGHT: 300px"></textarea>
<input type="submit" name="sub" value="提交">
<script type="text/javascript">
var nEditor = new ubbEditor('content');
nEditor.tLang = 'zh-cn';
nEditor.tInit('nEditor', '<?php echo Yii::app()->request->baseUrl; ?>/assets/admin/js/ubbeditor/');
</script>
</body>
</html>