function showUser(uname)
{
    if(uname=="" || uname=="undefined")
    {
        $("#authname").html("用户名不能为空");
        return false;
    }else{
        document.getElementById("authname").innerHTML="<p></p>";
    }
}

function showPwd(passwd)
{
    if(passwd=="" || passwd=="undefined")
    {
        $("#authpwd").html("密码不能为空");
        return false;
    }else{
        document.getElementById("authpwd").innerHTML="";
    }
}

function showCaptcha(captcha)
{
    if(captcha == "" || captcha == "undefined")
    {
        $("#authCaptcha").html("验证码不能为空");
        return false;
    }
}
/**
 * 后台管理登录ajax验证
 * @param  {[type]} e [description]
 * @return {[type]}   [description]
 */
$('form').submit(function(e){
    username = $("#admin_user").val();
    password = $("#admin_pwd").val();
    captcha = $("#captcha").val();
//    var b = new Base64();  
//    var str = b.encode(username);  
//    alert("base64 encode:" + str);  
////　解密
//    str = b.decode(str);  
//    alert("base64 decode:" + str);  
        
    if(username=="" || username=="undefined")
    {
        $("#authname").html("用户名不能为空");
        return false;
    }
    if(password=="" || password=="undefined")
    {
        $("#authpwd").html("密码不能为空");
        return false;
    }
    if(captcha == "" || captcha == "undefined")
    {
        $("#authCaptcha").html("验证码不能为空");
        return false;
    }
    e.preventDefault();
    var url = "/index.php?r=blogadmin/login/auth/";
    requestData = {'username': username, 'password': password,'captcha':captcha};
    $.post(url, requestData, function(data) {
                if(data)
                {    
                    if(data == 1)
                    {
                        $("#authCaptcha").html("用户名密码不正确");
//                                    $("#admin_user").val('');
//                                    $("#admin_pwd").val('');
                        return false;
                    }
                    if(data == 2)
                    {
                        $("#authCaptcha").html("验证码不正确");
//                                    $("#captcha").val('');
                        return false;
                    }

                }else{
                    location.href="/index.php?r=blogadmin/login/index";
                }
        });
});
