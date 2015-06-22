<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<title>LampRookie Blog管理中心</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?= Html::cssFile('@web/admin/css/skin.css')?>
<meta http-equiv="refresh" content="60">
</head>
<body leftmargin="0" topmargin="0">
<table class="admin_topbg" border="0" cellpadding="0" cellspacing="0" height="64" width="100%">
<tbody><tr>
<td height="64" width="61%"><img src="/admin/images/admin_m/logo2.png" height="64" width="262"></td>
<td valign="top" width="39%"><table border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody><tr>
<td class="admin_txt" height="38" width="74%">超级用户：<b><?php echo Yii::$app->session['m_user'];?></b> 您好,感谢登陆使用！目前时间：
<span id="showtime"/></span></td>
<td width="22%"><a href="#" target="_self" onclick="logout();"><img src="/admin/images/admin_m/out.gif" alt="安全退出" border="0" height="20" width="46"></a></td>
<td width="4%">&nbsp;</td>
</tr>
<tr>
<td colspan="3" height="19">&nbsp;</td>
</tr>
</tbody></table></td>
</tr>
</tbody></table>
<script language="JavaScript">
function logout(){
if (confirm("您确定要退出管理后台吗？"))
top.location = "/index.php?r=blogadmin/login/login"
return false;
}
function showsubmenu(sid) {
		var whichEl = eval("submenu" + sid);
		var menuTitle = eval("menuTitle" + sid);
	if (whichEl.style.display == "none"){
		eval("submenu" + sid + ".style.display=\"\";");
	}else{
		eval("submenu" + sid + ".style.display=\"none\";");
	}
}
function showsubmenu(sid) {
	var whichEl = eval("submenu" + sid);
	var menuTitle = eval("menuTitle" + sid);
	if (whichEl.style.display == "none"){
		eval("submenu" + sid + ".style.display=\"\";");
	}else{
		eval("submenu" + sid + ".style.display=\"none\";");
	}
}

function ymdhis(){
	var obj = new Date();
	var y = obj.getFullYear();
	var m = obj.getMonth()+1;
	var d = obj.getDate();
	var h = obj.getHours();
	var i = obj.getMinutes();
	var s = obj.getSeconds();
	if(m<10)m="0"+m;
	if(d<10)d="0"+d;
	if(h<10)h="0"+h;
	if(i<10)i="0"+i;
	if(s<10)s="0"+s;
	var time = y+'-'+m+'-'+d+' '+h+':'+i+':'+s;
	document.getElementById("showtime").innerHTML=time;
	setTimeout(ymdhis,1000);
	}
	ymdhis();
</script>

