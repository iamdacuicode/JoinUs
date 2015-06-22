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
<?=Html::cssFile('admin/css/common.css') ?>
<?=Html::cssFile('admin/js/jQuery-v1.7.2.js') ?>
<!--<title>Welcome LampRookie Blog管理后台登录</title>-->
<style>
    .login{height:auto;left:50%;margin-left: -175px;margin-top: -170px;position: absolute;top:50%;width: 350px;}
    h1{font-size: 36px;font-weight: bold;height: 50px}
    .main{height:300px;left:50%;margin-left:-175px;margin-top: -70px;position:absolute;top:70%;width:600px}
</style>
</head>
<body>
        <div class="login"><h1>Please Login</h1></div>
        <form onsubmit="return CheckLogin(document.login);" id="login" name="login" method="post" action="#">
        <div class="main">
            111
        </div>
	<div class="content">
		<div class="loginborder">
			<div class="center">
				<form action="#" method="post">
				<?php
//					$form = $this->beginWidget('CActiveForm', array(
//					    'id' => 'login-form',
//					    	'enableClientValidation' => true,
//					    	'clientOptions' => array(
//					        	'validateOnSubmit' => true,
//					    		),
//					        ));
					?>
                                    
				<div class="" style="float:center;height:60px">
					<div style="float:left;width:20%;height:60px;text-align:right;">登录:</div>
					<div style="width:auto;height:60px;float:left">
					<input type="text" name="username" id="username" onblur="showUser(this.value)" value="">
					<span id="authname"></span>
					</div>
						
				</div>
				<div class="" style="float:center;height:60px">
					<div style="float:left;width:20%;height:60px;text-align:right;">密码:</div>
					<div style="width:auto;height:60px;float:left">
					<input type="password" name="password" id="password" onblur="showPwd(this.value)" value="">
					<span id="authpwd"></span>
					</div>
				</div>
				<div class="" style="float:center;">
					<div style="float:left;width:20%;height:60px;text-align:right;">验证码:</div>
					<div style="width:auto;height:60px;float:left">
					<input type="text" name="captcha" id="verify"  value="" onblur="showCaptcha(this.value)">
					</div>
					<div style="width:30%;height:60px;float:left;text-align:center;">
						<?php 
//                                                $this->widget('CCaptcha', array('showRefreshButton'=>false,'id' => 'veryCode',
//           						 'clickableImage' => true,
//           						 'imageOptions'=>array('alt'=>'点击换图','title'=>'点击换图','style' => 'cursor:pointer;','script'=>"onclick='showCaptcha(this.value)'",)));
       					 ?>
                                            <?php 
                                            $form = ActiveForm::begin([
                                                'id' => 'login-form',                                         
                                            ]); 
                                    ?>
                                     <?php  
//                                     $captchaAction = "login/captcha";
//                                     $Captcha = new Captcha($captchaAction);?>
                                    <?php echo Captcha::widget(['name'=>'captchaimg','captchaAction'=>'login/captcha','imageOptions'=>['id'=>'captchaimg', 'title'=>'换一个', 'alt'=>'换一个', 'style'=>'cursor:pointer;margin-left:25px;'],'template'=>'{image}']); ?>

       					 <span id="authCaptcha"></span>
					</div>
				</div>
				<div class="" style="float:center;">
				<input type="submit" name="sub" value="登录" class="logins" onclick="authLogin();">
				<input type="reset" name="reset" value="重置" class="res" onclick="document.getElementById('username').focus();">
				</div>
                                    <?php ActiveForm::end(); ?>
				<?php //$this->endWidget();?>
				</form>
			</div>
		</div>
	</div>
    <?= Html::jsFile('admin/js/loginauth.js')?>
</body>
</html>