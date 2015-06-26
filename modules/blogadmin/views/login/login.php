<?php 
header("Cache-control:private"); 
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
?>
<!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">-->
<?=Html::cssFile('admin/css/login.css') ?>
<?=Html::cssFile('bootstrap/css/bootstrap.min.css') ?>
<?=Html::jsFile('admin/js/jQuery-v1.7.2.js') ?>
<!--<title>Welcome LampRookie Blog管理后台登录</title>-->
<script type="text/javascript">
 $(document).ready(function(){
     user = $("#admin_user").val();
     if(user !=""){
        document.getElementById('admin_user').value = "";
     }
    $("#focus .input_txt").each(function(){
     var thisVal=$(this).val();
     //判断文本框的值是否为空，有值的情况就隐藏提示语，没有值就显示
     if(thisVal!=""){
       $(this).siblings("span").hide();
      }else{
       $(this).siblings("span").show();
       
      }
     //聚焦型输入框验证 
    $(this).focus(function(){
       $(this).siblings("span").hide();
      }).blur(function(){
        var val=$(this).val();
        if(val!=""){
         $(this).siblings("span").hide();
        }else{
         $(this).siblings("span").show();
        } 
      });
    })
      })
//应急方案
$(document).ready(function(){
    var img = new Image;
    img.onload=function(){
        $("#admin_user").val('');
        $("#admin_pwd").val('');
        $("#captcha").val('');
        $('#captchaimg').trigger('click');
    }
    img.src = $('#captchaimg').attr('src');
});
</script>
</script>
</head>
<body>
    <div class="login">Please Login</div>
        <div class="main">
        <form action="#" method="" id="focus" class="border_radius">
                        <div class="login_img">
                        <div class="login_user_img"><img src="admin/images/30.User.png"></div>
                    </div> 
<ul style="margin-top:80px">
                <li>  
                     <!--<span style="color:red">*</span>&nbsp;&nbsp;-->
                     <label>
                         <span class="focus_user">管理员</span>
                         <input type="text" value="" size="30" name="admin_user" id="admin_user" class="input_txt border_radius" onblur="showUser(this.value)">
                     </label>
                  </li>
                  <div id="" style="width:350px;position:absolute;margin-left:17px">
                        <span style="color: red;" id="authname"></span>
                  </div> 
                  <li class="li_passwd">  
                     <!--<span style="color:red">*</span>&nbsp;&nbsp;-->
                     <label><span class="focus_pwd">管理员密码</span><input type="password" value="" size="30" name="admin_pwd" id="admin_pwd" onblur="showPwd(this.value)" class="input_txt border_radius"></label>
                  <div  id="" style="width:350px;position:absolute;margin-left:17px">
                        <span style="color: red;" id="authpwd"></span>
                  </div>                      
                </li>
                <?php 
                        $form = ActiveForm::begin([
                            'id' => 'login-form',                                         
                        ]); 
                ?>
                <li class="li_captcha">
                    <div>
                        <input type="text" size="10" id="captcha" class="input_captcha" onblur="showCaptcha(this.value)">
                    </div>
                        <?php echo Captcha::widget(['name'=>'captchaimg','captchaAction'=>'login/captcha','imageOptions'=>['id'=>'captchaimg', 'title'=>'换一个', 'alt'=>'换一个', 'style'=>'cursor:pointer;margin-left:200px;position:absolute;margin-top:-40px;font-size:16px'],'template'=>'{image}']); ?>
                </li>
                <span id="authCaptcha" style="color:red"></span>
                <li class="li_sub">
                    <input type="submit" name="sub" id="login_submit" value="登   录" onclick="authLogin();" class="input_sub btn btn-info"/>
                </li>
            </ul>
        </form>
    </div>
        <?php ActiveForm::end(); ?>
        <?=Html::jsFile('admin/js/md5/md5_sha.js') ?>
        <?=Html::jsFile('admin/js/md5/base64.js') ?>
        <?= Html::jsFile('admin/js/loginauth.js') ?>
        <?= Html::jsFile('bootstrap/js/bootstrap.min.js') ?>;
</body>
</html>