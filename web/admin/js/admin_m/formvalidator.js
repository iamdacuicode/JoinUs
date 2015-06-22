function isDate(str){ 
var reg = /^((((1[6-9]|[2-9]\d)\d{2})-(0?[13578]|1[02])-(0?[1-9]|[12]\d|3[01]))|(((1[6-9]|[2-9]\d)\d{2})-(0?[13456789]|1[012])-(0?[1-9]|[12]\d|30))|(((1[6-9]|[2-9]\d)\d{2})-0?2-(0?[1-9]|1\d|2[0-8]))|(((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))-0?2-29-))$/
if (reg.test(str)){return true;}else{return false;}
}
function isPhoneNum( strPhone ) 
{ 
    if(strPhone.indexOf("-")!=-1)
    {
        var allNum = strPhone.split("-");
        areaNum = allNum[0];
        phoneNum = allNum[1];
        if(isNumber(areaNum))
        {
           if(areaNum.length>4)
           {
               return false;
           }
        }
        else
        {
            return false;
        }
        if(isNumber(phoneNum))
        {
           if(phoneNum.length>10)
           {
               return false;
           }
        }
        else
        {
            return false;
        }
    }
    return true;
}

function isNumber( s )
{ 
	var regu = "^[0-9]+$"; 
	var re = new RegExp(regu); 
	if (s.search(re) != -1) { return true;} else { return false;} 
} 

function checkMobile( s )
{ 
	var regu =/^[1][3,5][0-9]{9}$/; 
	var re = new RegExp(regu); 
	if (re.test(s)) 
	{ 
		return true; 
	}
	else
	{ 
		return false; 
	} 
} 

function isEmail(strEmail) 
{ 
	//var emailReg = /^[_a-z0-9]+@([_a-z0-9]+\.)+[a-z0-9]{2,3}$/; 
	var emailReg = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/; 
	if( emailReg.test(strEmail) ){ return true; }else{ return false; } 
}
function   isIDCardNum   (str)    
{   //身份证正则表达式(15位)    
     //isIDCard1=/^[1-9]\d{7}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}$/;  
    //身份证正则表达式(18位)  
    //isIDCard2=/^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{4}$/;  
    //验证身份证，返回结果    
    //return   (isIDCard1.test(str)||isIDCard2.test(str));
	if(isNumber(str))
	{
	    if(str.length!=15 && str.length!=18)
	    {
	        return false;
	    }
	    else
	    {
	        return true;
	    }
	}
	else
	{
	    return false;
	}      
}
function isURL(str_url)
{
	var strRegex = "^((https|http|ftp|rtsp|mms)://)"
	+ "(([0-9a-z_!~*’().&=+$%-]+: )?[0-9a-z_!~*’().&=+$%-]+@)?" //ftp的user@
	+ "(([0-9]{1,3}\.){3}[0-9]{1,3}" // IP形式的URL- 199.194.52.184
	+ "|" // 允许IP和DOMAIN（域名）
	+ "([0-9a-z_!~*’()-]+\.)*" // 域名- www.
	+ "([0-9a-z][0-9a-z-]{0,61})?[0-9a-z]\." // 二级域名
	+ "[a-z]{2,6})" // first level domain- .com or .museum
	+ "(:[0-9]{1,4})?" // 端口- :80
	var re=new RegExp(strRegex);
	if (re.test(str_url))
	{
		return (true);
	}else
	{
		return (false);
	}
}
function isDomain(strIP) 
{	 
	var re=/([\w-]+\.)+[\w-]+(\/[\w- .\/?%&=]*)?/ //匹配IP地址的正则表达式
	if(re.test(strIP))
	{
	    return true;
	}
	return false;
}
function isChinese(ivalue)
{
	if(/[\u4e00-\u9fa5]/.test(ivalue)==false)
	{
	   return true;
	}
	else
	{
	   return false;
	}
}
