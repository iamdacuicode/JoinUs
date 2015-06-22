<?php 
header("Cache-control:private"); 
use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\AppAsset;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?=Html::cssFile('admin/css/skin.css')?>
<?php AppAsset::register($this);?>
<?php ?>
<script src="/admin/js/admin_m/jquery-1.js"></script>
<script src="/admin/js/admin_m/jquery_002.js"></script>
<script src="/admin/js/admin_m/jquery_004.js"></script>
<script src="/admin/js/admin_m/jquery_011.js"></script>
<script src="/admin/js/admin_m/jquery_009.js"></script>
<script src="/admin/js/admin_m/jquery_012.js"></script>
<script src="/admin/js/admin_m/jquery_008.js"></script>
<script src="/admin/js/admin_m/jquery_006.js"></script>
<script src="/admin/js/admin_m/jquery_007.js"></script>
<script src="/admin/js/admin_m/jquery_010.js"></script>
<script src="/admin/js/admin_m/jquery_005.js"></script>
<script src="/admin/js/admin_m/jquery.js"></script>
<script src="/admin/js/admin_m/formvalidator.js"></script>
<script src="/admin/js/admin_m/jquery_013.js"></script>
<script src="/admin/js/admin_m/jquery_003.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="<?=Html::jsFile('admin/js/admin_m/jquery/flot/excanvas.min.js')?>></script><![endif]-->
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

<script>
$(function()
{
		$("input[type=submit], a, button").button().click(function(event) {
			    var bid = $(event.target)[0].id;
			    if(bid=="btnSave")
			    {
			                if(check()==true){
                        if (confirm("您确定要修改管理员密码吗？"))
                              newPass = $("#newPass").val();
                              url = "/index.php?r=blogadmin/login/pwdsave";
                              requestData = {'newPass':newPass};
                              $.post(url,requestData,function(data){
                                 if(data){
                                    alert(data);
                                    location.href="/index.php?r=blogadmin/login/repasswd";
                                 }
                                
                          });
                }                   
          
			    }
		});
});
function check()
{
    if($("#oldPass").val()=="")
    {
        $("#msg_oldPass").html("请输入原密码");
        return false;
    }
    $("#msg_oldPass").html("");
    if($("#newPass").val()=="")
    {
        $("#msg_newPass").html("请输入新密码");
        return false;
    }
    $("#msg_newPass").html("");
    if($("#conPass").val()=="")
    {
        $("#msg_conPass").html("请输入确认密码");
        return false;
    }
    $("#msg_conPass").html("");
    //$("#form1")[0].submit();
    return true;
}
</script>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tbody><tr>
    <td background="/admin/images/admin_m/mail_leftbg.gif" height="29" valign="top" width="17"><img src="/admin/images/admin_m/left-top-right.gif" height="29" width="17"></td>
    <td background="/admin/images/admin_m/content-bg.gif" height="29" valign="top"><table class="left_topbg" id="table2" border="0" cellpadding="0" cellspacing="0" height="31" width="100%">
      <tbody><tr>
        <td height="31"><div class="titlebt">修改密码</div></td>
      </tr>
    </tbody></table></td>
    <td background="/admin/images/admin_m/mail_rightbg.gif" valign="top" width="16"><img src="/admin/images/admin_m/nav-right-bg.gif" height="29" width="16"></td>
  </tr>
  <tr>
    <td background="/admin/images/admin_m/mail_leftbg.gif" height="71" valign="middle">&nbsp;</td>
    <td bgcolor="#F7F8F9" valign="top"><table border="0" cellpadding="0" cellspacing="0" height="138" width="100%">
      <tbody><tr>
        <td height="13" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td valign="top"><table align="center" border="0" cellpadding="0" cellspacing="0" width="98%">
          <tbody><tr>
            <td class="left_txt">当前位置：修改密码</td>
          </tr>
          <tr>
            <td height="20"><table bgcolor="#CCCCCC" border="0" cellpadding="0" cellspacing="0" height="1" width="100%">
              <tbody><tr>
                <td></td>
              </tr>
            </tbody></table></td>
          </tr>
          <tr>
            <td><table border="0" cellpadding="0" cellspacing="0" height="55" width="100%">
              <tbody><tr>
                <td height="55" valign="middle" width="10%"><img src="/admin/images/admin_m/title.gif" height="55" width="54"></td>
                <td valign="top" width="90%"><span class="left_txt2">在这里，您可以修改您的后台登陆密码</span></td>
              </tr>
            </tbody></table></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><table class="nowtable" border="0" cellpadding="0" cellspacing="0" height="31" width="100%">
              <tbody><tr>
                <td class="left_bt2">&nbsp;&nbsp;&nbsp;&nbsp;修改密码</td>
              </tr>
            </tbody></table></td>
          </tr>
          <tr>
            <td><table border="0" cellpadding="0" cellspacing="0" width="100%">
			<form name="form1" id="form1" method="POST" action="#" onsubmit="return check();"></form>
              <tbody><tr>
                <td class="left_txt2" align="right" bgcolor="#f2f2f2" height="50" width="100px">原密码：</td>
                <td bgcolor="#f2f2f2" width="20px">&nbsp;</td>
                <td bgcolor="#f2f2f2" width="100px"><input name="oldPass" id="oldPass" value="" size="30" type="password"></td>
                <td class="msg_txt" id="msg_oldPass" bgcolor="#f2f2f2" height="50"></td>
              </tr>
              <tr>
                <td class="left_txt2" align="right" height="50">新密码：</td>
                <td>&nbsp;</td>
                <td><input name="newPass" id="newPass" size="30" type="password"></td>
                <td class="msg_txt" id="msg_newPass"></td>
              </tr>
              <tr>
                <td class="left_txt2" align="right" bgcolor="#f2f2f2" height="50">确认新密码：</td>
                <td bgcolor="#f2f2f2">&nbsp;</td>
                <td bgcolor="#f2f2f2"><input name="conPass" id="conPass" size="30" type="password"></td>
                <td class="msg_txt" id="msg_conPass" bgcolor="#f2f2f2"></td>
              </tr>
              <tr><td colspan="3">&nbsp;</td></tr>
 			<tr>
              <td align="right"></td>
              <td align="right">&nbsp;</td>
              <td><button aria-disabled="false" role="button" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" id="btnSave"><span class="ui-button-text">保存</span></button>&nbsp;&nbsp;&nbsp;&nbsp;</td>
            </tr>
            
            </tbody></table></td>
          </tr>
        </tbody></table>
          </td>
      </tr>
    </tbody></table></td>
    <td background="/admin/images/admin_m/mail_rightbg.gif">&nbsp;</td>
  </tr>
  <tr>
    <td background="/admin/images/admin_m/mail_leftbg.gif" valign="middle"><img src="/admin/images/admin_m/buttom_left2.gif" height="17" width="17"></td>
      <td background="/admin/images/admin_m/buttom_bgs.gif" height="17" valign="top"><img src="/admin/images/admin_m/buttom_bgs.gif" height="17" width="17"></td>
    <td background="/admin/images/admin_m/mail_rightbg.gif"><img src="/admin/images/admin_m/buttom_right2.gif" height="17" width="16"></td>
  </tr>
</tbody></table>


</body></html>