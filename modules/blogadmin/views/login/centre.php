<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\session;
$session=Yii::$app->session;

$pass="<font color=green><b>√</b></font>";
$error="<font color=red><b>×</b></font>";
$mtime = explode(' ', microtime());
$pagestarttime = $mtime[1] + $mtime[0];
$php_self = $_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
function check_int()
    {
        $starttime = gettimeofday();
        for($i = 0; $i < 1000000; $i++);
        {
            $tem = 1+1;
        }
        $endtime = gettimeofday();
        $time = ($endtime["usec"]-$starttime["usec"])/1000000+$endtime["sec"]-$starttime["sec"];
        $time_int = round($time, 5)."秒";
        return $time_int;
    }
function check_float()
    {
        $t = pi();
        $starttime = gettimeofday();
        for($i = 0; $i < 1000000; $i++);
        {
            sqrt($tem);
        }
        $endtime = gettimeofday();
        $time = ($endtime["usec"]-$starttime["usec"])/1000000+$endtime["sec"]-$starttime["sec"];
        $time_float = round($time, 5)."秒";
        return $time_float;
    }
function check_io()
    {
        $fp = fopen($_SERVER['SCRIPT_FILENAME'], "r");
        $starttime = gettimeofday();
        for($i = 0; $i < 10000; $i++)
        {
            fread($fp, 10240);
            rewind($fp);
        }
        $endtime = gettimeofday();
        fclose($fp);
        $time = ($endtime["usec"]-$starttime["usec"])/1000000+$endtime["sec"]-$starttime["sec"];
        $time_io = round($time, 5)."秒";
        return $time_io;
    }

/**if ($_GET['info'] == "phpinfo")
    {   phpinfo();
        exit;}
    elseif($_POST['check'] == "check")
    {   $time_int = check_int();
        $time_float = check_float();
        $time_io = check_io();      }**/

function check($funcname,$func="function_exists")
{
    if ($func($funcname))
    {   $message='<font color=green><b>√</b></font>';   }
    else
    {   $message='<font color=red><b>×</b></font>'; }
    return $message;
}

function check2($funcname,$func="function_exists")
{
    if ($func($funcname))
    {   $message='<font color=green>ON</font>'; }
    else
    {   $message='<font color=red><b>OFF</b></font>';   }
    return $message;
}

function check3($funcname,$func="getenv")
{
    if ($func($funcname))
    {   $message=$func($funcname);  }
    else
    {   $message='服务器不支持显示数据';  }
    return $message;
}

function check4($funcname,$func="getenv")
{
    if ($func($funcname))
    {   $message=$func($funcname);
        $message="<a title=".$message.">点我</a>";}
    else
    {   $message='<font color=green>NO</font>'; }
    return $message;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?= Html::jsFile('admin/js/admin_m/jquery-1.js')?>
<?= Html::cssFile('admin/css/skin.css')?>
<style>
select{height:20px; width:100px}
input.text {height:20px;width:100px }
fieldset { padding:0; border:0; margin-top:15px; }
h1 { font-size: 1.2em; margin: .6em 0; }
div#users-contain {width:100%;}
div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
.ui-dialog .ui-state-error { padding: .3em; }
.validateTips { border: 1px solid transparent; padding: 0.3em; }
#divPageNav .curr{color:#d2d2d2;font-size:15px;}
#divPageNav a{color:#555555;font-size:15px;}
a:hover {text-decoration: underline;color:blue;}
</style>
<script>
$.ajaxSetup({cache:false});
var reportPicOptions = {
        lines: { show: true },
        points: { show: true },
        grid: { hoverable: true, clickable: true },
        xaxis: {labelWidth:50,mode:"time",minTickSize:[1, "day"],timeformat: "%y/%m/%d",color:"black"},
        yaxis:{ticks:1,tickDecimals:0}
    	};
    /** 
    * 时间对象的格式化 
    */  
    Date.prototype.format = function(format)  
    {  
    /* 
    * format="yyyy-MM-dd hh:mm:ss"; 
    */  
    var o = {  
    "M+" : this.getMonth() + 1,  
    "d+" : this.getDate(),  
    "h+" : this.getHours(),  
    "m+" : this.getMinutes(),  
    "s+" : this.getSeconds(),  
    "q+" : Math.floor((this.getMonth() + 3) / 3),  
    "S" : this.getMilliseconds()  
    }  
      
    if (/(y+)/.test(format))  
    {  
    format = format.replace(RegExp.$1, (this.getFullYear() + "").substr(4  
    - RegExp.$1.length));  
    }  
      
    for (var k in o)  
    {  
    if (new RegExp("(" + k + ")").test(format))  
    {  
    format = format.replace(RegExp.$1, RegExp.$1.length == 1  
    ? o[k]  
    : ("00" + o[k]).substr(("" + o[k]).length));  
    }  
    }  
	 return format;  
    }  
</script></head>
<body>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tbody><tr>
            <td background="/admin/images/admin_m/mail_leftbg.gif" valign="top" width="17">
            <img src="/admin/images/admin_m/left-top-right.gif" height="29" width="17">
            </td>
            <td background="/admin/images/admin_m/content-bg.gif" valign="top">
            <table class="left_topbg" id="table2" border="0" cellpadding="0" cellspacing="0" height="31" width="100%">
    <tbody>
        <tr>
            <td height="31"><div class="titlebt">欢迎界面</div></td>
        </tr>
    </tbody></table></td>
            <td background="/admin/images/admin_m/mail_rightbg.gif" valign="top" width="16"><img src="/admin/images/admin_m/nav-right-bg.gif" height="29" width="16"></td>
        </tr>
        <tr>
            <td background="/admin/images/admin_m/mail_leftbg.gif" valign="middle">&nbsp;</td>
            <td bgcolor="#fff" height="670px;" valign="top"><table align="center" border="0" cellpadding="0" cellspacing="0" width="98%">
      <tbody><tr>
            <td colspan="2" valign="top">&nbsp;</td>
            <td>&nbsp;</td>
            <td valign="top">&nbsp;</td>
      </tr>
      <tr>
            <td colspan="2" valign="top"><span class="left_bt">感谢您使用LAMNPBLOG后台管理系统 </span><br>
            </td>
      </tr>
    </tbody>
    
    <table width="100%" height="18%" style="border:1px solid #c7d8ea;margin-left:10px;line-height:28px">
        <tr><td style="background:url(/assets/admin/images/admin_m/x_bg.png) repeat-x scroll left -42px rgba(0, 0, 0, 0);border-bottom:1px solid #c7d8ea;color:#3a6ea5;line-height: 28px;font-weight:bold;">我的个人信息</td></tr>
        <tr style="border-left:1px solid #ccc;border-right:1px solid #ccc;border-top:1px solid #ccc;border-bottom:1px dotted #ccc;margin-left:10px;padding-top:10px"><td>你好：<span style="color:red">
            <?php echo Yii::$app->session->get('m_user')?></span></td></tr>
        <tr><td>所属角色：<span style="color:red">超级管理员</span></td><br/></tr>
        <tr><td style="border-top:1px dotted #ccc;line-height:28px">上次登录IP：
        <?php $ip = $_SERVER['REMOTE_ADDR'];echo $ip;$url="http://ip.taobao.com/service/getIpInfo.php?ip=123.57.17.8 ";
        $content=file_get_contents($url);
        $cons=json_decode($content,true);
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        echo $cons['data']['country'].'&nbsp;&nbsp;'.$cons['data']['region'].'&nbsp;&nbsp;'.$cons['data']['city'];?>
        </td></tr><tr><td style="line-height:28px">当前登录时间：<?php echo Yii::$app->session->get('m_logintime')?></td></tr>
    </table><br/>
    <table width="100%" height="10%" style="border:1px solid #c7d8ea;margin-left:10px;line-height:28px">
        <tr height=10%><td style="background:url(/assets/admin/images/admin_m/x_bg.png) repeat-x scroll left -42px rgba(0, 0, 0, 0);border-bottom:1px solid #c7d8ea;color:#3a6ea5;line-height: 28px;font-weight:bold;">LamnpBlog系统开发团队</td></tr>
        <tr style="border-left:1px solid #ccc;border-right:1px solid #ccc;border-top:1px solid #ccc;border-bottom:1px dotted #ccc;margin-left:10px;padding-top:10px"><td>版权所有：lamnp小菜鸟团队</td></tr>
        <tr><td>总策划：JACK.AChan</td></tr>
        <tr><td>开发与支持团队：JACK.AChan</td></tr>
        <tr><td>UI 设计：JACK.AChan</td></tr>
        <tr><td>lamnpblog官方网站：<a href="http://www.lamnpblog.com.cn" target="_blank" class="lamp_click">lamnp小菜鸟</td></tr>
    </table><br/>
    <table width="100%" height="10%" style="border:1px solid #c7d8ea;margin-left:10px;line-height:28px">
        <tr height=10%><td style="background:url(/assets/admin/images/admin_m/x_bg.png) repeat-x scroll left -42px rgba(0, 0, 0, 0);border-bottom:1px solid #c7d8ea;color:#3a6ea5;line-height: 28px;font-weight:bold;">系统信息</td></tr>
        <tr style="border-left:1px solid #ccc;border-right:1px solid #ccc;border-top:1px solid #ccc;border-bottom:1px dotted #ccc;margin-left:10px;padding-top:10px"><td>服务器操作系统：<?php echo php_uname();?></td></tr>
        <tr><td>服务器解译引擎：<?php echo $_SERVER['SERVER_SOFTWARE'];?></td></tr>
        <tr><td>服务器空余空间：<?php echo intval(diskfreespace(".") / (1024 * 1024)).'Mb';?></td></tr>
        
        <tr><td>服务器PHP版本：<?php echo PHP_VERSION;?></td></tr>
        <tr><td>数据库信息：<?php echo mysql_get_client_info();?></td></tr>
        <tr><td>服务器IP：<?php echo $_SERVER['SERVER_ADDR']?></td></tr>
    </table>
</table>
</body></html>