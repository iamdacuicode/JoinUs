<?php
//==================================================//
// Program Author:   kimi
// Program Version:  1.1
// Program Homepage: http://www.ccvita.com
// Copyright (C) www.ccita.com All Rights Reserved.
//==================================================//
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


function check($funcname,$func="function_exists")
{
  if ($func($funcname))
  { $message='<font color=green><b>√</b></font>'; }
  else
  { $message='<font color=red><b>×</b></font>'; }
  return $message;
}

function check2($funcname,$func="function_exists")
{
  if ($func($funcname))
  { $message='<font color=green>ON</font>'; }
  else
  { $message='<font color=red><b>OFF</b></font>'; }
  return $message;
}

function check3($funcname,$func="getenv")
{
  if ($func($funcname))
  { $message=$func($funcname);  }
  else
  { $message='服务器不支持显示数据';  }
  return $message;
}

function check4($funcname,$func="getenv")
{
  if ($func($funcname))
  { $message=$func($funcname);
    $message="<a title=".$message.">点我</a>";}
  else
  { $message='<font color=green>NO</font>'; }
  return $message;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-CN" lang="zh-CN">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="content-language" content="zh-CN" />
<title>PHP探针 - Powered by: CcVita.Com</title>
<style type="text/css">
a {
  color: #666666;
  text-decoration: none;
  font-weight: bold;
  background-color: transparent;
  font-size: small;
  }
a:hover {
  color: #ff6600;
  text-decoration: none;
  }
body,td,th {
  font-size: small;
}
</style>
</head>
<body><br>
        <table width="760" border="0" align="center" cellpadding="4" cellspacing="1">
          <tr>
            <td width="20%" bgcolor="#dee3e7" align="center"><a href="http://www.ccvita.com" target="_blank">CcVita HmoePage</a></td>
            <td width="20%" bgcolor="#dee3e7" align="center"><a href="http://www.ccvita.com" target="_blank">About CcVta</a></td>
            <td width="20%" bgcolor="#dee3e7" align="center"><a href="http://www.ccvita.com" target="_blank">About This</a></td>
            <td width="20%" bgcolor="#dee3e7" align="center"><a href="http://www.ccvita.com" target="_blank">About Me</a></td>
            <td width="20%" bgcolor="#dee3e7" align="center"><a href="mailto:jianxieshui@qq.com" target="_blank">E-mail</a></td>
          </tr>
        </table>
    <br>
        <table width="760" border="0" align="center" cellpadding="4" cellspacing="1">
          <tr>
            <td width="20%" bgcolor="#dee3e7" align="center"><a href="#server">服务器特性</a></td>
            <td width="20%" bgcolor="#dee3e7" align="center"><a href="#php">PHP基本特性</a></td>
            <td width="20%" bgcolor="#dee3e7" align="center"><a href="#basic">组件支持状况</a></td>
            <td width="20%" bgcolor="#dee3e7" align="center"><a href="#define">自定义检测</a></td>
            <td width="20%" bgcolor="#dee3e7" align="center"><a href="&info=phpinfo">服务器性能检测</a></td>
          </tr>
        </table><br><br>
    <a name="server"></a>
        <table width="760" border="0" align="center" cellpadding="4" cellspacing="1">
          <tr>
            <td colspan="2" bgcolor="#2F5376"><font color="#FFFFFF">服务器特性</font></td>
          </tr>
          <tr>
            <td width="30%" bgcolor="#c2cdd6"> 服务器时间</td>
            <td width="70%" bgcolor="#dee3e7"><?php echo date("Y年m月d日 h:i:s",time());?></td>
          </tr>
          <tr>
            <td bgcolor="#c2cdd6"> 服务器域名/IP地址</td>
            <td bgcolor="#E9E9E9"><?php echo check3("SERVER_NAME");?>/<?php echo check3("SERVER_ADDR");?></td>
          </tr>
          <tr>
            <td bgcolor="#c2cdd6">服务器操作系统</td>
            <td bgcolor="#dee3e7"><?php echo php_uname();?></td>
          </tr>
          <tr>
            <td bgcolor="#c2cdd6"> 服务器解译引擎</td>
            <td bgcolor="#E9E9E9"><?php echo check3("SERVER_SOFTWARE");?></td>
          </tr>
          <tr>
            <td bgcolor="#c2cdd6">服务器空余空间</td>
            <td bgcolor="#dee3e7"><?php echo intval(diskfreespace(".") / (1024 * 1024)).'Mb';?></td>
          </tr>
          <tr>
            <td bgcolor="#c2cdd6"> Web服务端口</td>
            <td bgcolor="#E9E9E9"><?php echo check3("SERVER_PORT");?></td>
          </tr>
          <tr>
            <td bgcolor="#c2cdd6">本文件路径</td>
            <td bgcolor="#dee3e7"><?php echo check3("SCRIPT_FILENAME");?></td>
          </tr>
        </table><br>
    <a name="php"></a>
        <table width="760" border="0" align="center" cellpadding="4" cellspacing="1">
          <tr>
            <td colspan="4" bgcolor="#2F5376"><font color="#FFFFFF">PHP基本信息</font></td>
          </tr>
          <tr>
            <td width="25%" bgcolor="#c2cdd6"> PHP版本</td>
            <td width="25%" bgcolor="#dee3e7"><?php echo PHP_VERSION;?></td>
            <td width="25%" bgcolor="#c2cdd6"> PHP信息</td>
            <td width="25%" bgcolor="#dee3e7"><a href="<?php echo $php_self;?>?info=phpinfo" target="_blank">查看</a></td>
          </tr>
          <tr>
            <td bgcolor="#c2cdd6"> PHP运行方式</td>
            <td bgcolor="#E9E9E9"><?php echo strtoupper(php_sapi_name());?></td>
            <td bgcolor="#c2cdd6"> 运行于安全模式</td>
            <td bgcolor="#E9E9E9"><?php echo check("safe_mode","get_cfg_var");?></td>
          </tr>
          <tr>
        <td bgcolor="#c2cdd6"> 脚本超时时间</td>
            <td bgcolor="#dee3e7"><?php echo check3("max_execution_time","get_cfg_var");?>秒</td>
            <td bgcolor="#c2cdd6">允许使用URL打开文件</td>
            <td bgcolor="#dee3e7"><?php echo check("allow_url_fopen","get_cfg_var");?></td>
          </tr>
          <tr>
            <td bgcolor="#c2cdd6"> Zend引擎版本</td>
            <td bgcolor="#E9E9E9"><?php echo zend_version();?></td>
            <td bgcolor="#c2cdd6">允许动态加载链接库</td>
            <td bgcolor="#E9E9E9"><?php echo check("enable_dl","get_cfg_var");?></td>
          </tr>
          <tr>
            <td bgcolor="#c2cdd6"> 脚本运行可占最大内存</td>
            <td bgcolor="#dee3e7"><?php echo check3("memory_limit","get_cfg_var");?></td>
            <td bgcolor="#c2cdd6"> 显示错误信息</td>
            <td bgcolor="#dee3e7"><?php echo check("display_errors","get_cfg_var");?></td>
          </tr>
          <tr>
            <td bgcolor="#c2cdd6"> POST最大字节数</td>
            <td bgcolor="#E9E9E9"><?php echo check3("post_max_size","get_cfg_var");?></td>
            <td bgcolor="#c2cdd6">magic_quotes_gpc</td>
            <td bgcolor="#E9E9E9"><?php echo check("magic_quotes_gpc","get_cfg_var");?></td>
          </tr>
          <tr>
            <td bgcolor="#c2cdd6">脚本上传文件大小限制</td>
            <td bgcolor="#dee3e7"><?php echo check3("upload_max_filesize","get_cfg_var");?></td>
            <td bgcolor="#c2cdd6">magic_quotes_runtime</td>
            <td bgcolor="#dee3e7"><?php echo check("magic_quotes_runtime","get_cfg_var");?></td>
          </tr>
          <tr>
            <td bgcolor="#c2cdd6">被屏蔽的函数</td>
            <td bgcolor="#E9E9E9"><?php echo check4("disable_functions","get_cfg_var");?></td>
            <td bgcolor="#c2cdd6"> register_globals</td>
            <td bgcolor="#E9E9E9"><?php echo check2("register_globals","get_cfg_var");?></td>
          </tr>
          <tr>
            <td bgcolor="#c2cdd6"> 短标记&lt;? ?&gt;支持</td>
            <td bgcolor="#dee3e7"><?php echo check("short_open_tag","get_cfg_var");?></td>
            <td bgcolor="#c2cdd6"> 标记&lt;% %&gt;支持</td>
            <td bgcolor="#dee3e7"><?php echo check("asp_tags","get_cfg_var");?></td>
          </tr>
        </table><br>
    <a name="basic"></a>
        <table width="760" border="0" align="center" cellpadding="4" cellspacing="1">
          <tr>
            <td colspan="4" bgcolor="#2F5376"><font color="#FFFFFF">PHP数据库组件支持情况</font></td>
    <tr>
    <tr>
      <td width="40%" bgcolor="#c2cdd6">MySQL数据库</td>
      <td width="10%" align="center" bgcolor="#E9E9E9"><?php echo check("mysql_close");?></td>
      <td width="40%" bgcolor="#c2cdd6">mSQL数据库</td>
      <td width="10%" align="center" bgcolor="#E9E9E9"><?php echo check("msql_close");?></td>
    </tr>
    <tr>
      <td bgcolor="#c2cdd6">MySQL数据库持续连接</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("mysql.allow_persistent","get_cfg_var");?></td>
      <td bgcolor="#c2cdd6">Adabas D数据库</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("ada_close");?></td>
    </tr>
      <td bgcolor="#c2cdd6">MySQL最大连接数</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo @get_cfg_var("mysql.max_links")==-1 ? "不限制" : @get_cfg_var("mysql.max_links");?></td>
      <td bgcolor="#c2cdd6">DBA数据库</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("dba_close");?></td>
    </tr>
    <tr>
      <td bgcolor="#c2cdd6">ODBC数据库连接</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("odbc_close");?></td>
      <td bgcolor="#c2cdd6">DBM数据库</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("dbmclose");?></td>
    </tr>
    <tr>
      <td bgcolor="#c2cdd6">DBX数据库</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("dbx_close");?></td>
      <td bgcolor="#c2cdd6">DB++数据库</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("dbplus_close");?></td>
    </tr>
    <tr>
      <td bgcolor="#c2cdd6">FrontBase数据库</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("fbsql_close");?></td>
      <td bgcolor="#c2cdd6">Hyperwave数据库</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("hw_close");?></td>
    </tr>
    <tr>
      <td bgcolor="#c2cdd6">Informix数据库</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("ifx_close");?></td>
      <td bgcolor="#c2cdd6">ingres数据库</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("ingres_close");?></td>
    </tr>
    <tr>
      <td bgcolor="#c2cdd6">InterBase数据库</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("ibase_close");?></td>
      <td bgcolor="#c2cdd6">Lotus Notes数据库</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("notes_version");?></td>
    </tr>
    <tr>
      <td bgcolor="#c2cdd6">dBase数据库</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("dbase_close");?></td>
      <td bgcolor="#c2cdd6">Oracle数据库</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("ora_close");?></td>
    </tr>
    <tr>
      <td bgcolor="#c2cdd6">Oracle 8 数据库</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("OCILogOff");?></td>
      <td bgcolor="#c2cdd6">Ovrimos SQL数据库</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("ovrimos_close");?></td>
    </tr>
    <tr>
      <td bgcolor="#c2cdd6">Postgre SQL数据库</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("pg_close");?></td>
      <td bgcolor="#c2cdd6">SESAM数据库</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("sesam_disconnect");?></td>
    </tr>
    <tr>
      <td bgcolor="#c2cdd6">SQLite数据库</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("sqlite_close");?></td>
      <td bgcolor="#c2cdd6">SQL Server数据库</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("mssql_close");?></td>
    </tr>
    <tr>
      <td bgcolor="#c2cdd6">SyBase数据库</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("sybase_close");?></td>
      <td bgcolor="#c2cdd6">FilePro数据库</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("filepro");?></td>
    </tr>
        </table><br>
    <a name="other"></a>
        <table width="760" border="0" align="center" cellpadding="4" cellspacing="1">
          <tr>
            <td colspan="4" bgcolor="#2F5376"><font color="#FFFFFF">PHP其他组件支持情况</font></td>
    </tr>
    <tr>
      <td width="40%" bgcolor="#c2cdd6">拼写检查 ASpell Library</td>
      <td width="10%" align="center" bgcolor="#E9E9E9"><?php echo check("aspell_new");?></td>
      <td width="40%" bgcolor="#c2cdd6">物件集合支持</td>
      <td width="10%" align="center" bgcolor="#E9E9E9"><?php echo check("aggregate_info");?></td>
    </tr>
    <tr>
      <td bgcolor="#c2cdd6">apache专用函数库支持</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("apache_lookup_uri");?></td>
      <td bgcolor="#c2cdd6">高精度数学运算 BCMath</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("bcadd");?></td>
    </tr>
    <tr>
      <td bgcolor="#c2cdd6">BZIP2压缩文件支持</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("bzclose");?></td>
      <td bgcolor="#c2cdd6">历法运算 Calendar</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("JDToGregorian");?></td>
    </tr>
    <tr>
      <td bgcolor="#c2cdd6">CLASS/OBJECT 类/对象支持</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("class_exists");?></td>
      <td bgcolor="#c2cdd6">CCVS API支持</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("ccvs_add");?></td>
    </tr>
    <tr>
      <td bgcolor="#c2cdd6">客户端URL支持</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("curl_close");?></td>
      <td bgcolor="#c2cdd6">CrackLib支持</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("crack_check");?></td>
    </tr>
    <tr>
      <td bgcolor="#c2cdd6">cybercash加密支持</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("cybercash_decr");?></td>
      <td bgcolor="#c2cdd6">Cyrus IMAP电子邮件系统支持</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("cyrus_close");?></td>
    </tr>
    <tr>
      <td bgcolor="#c2cdd6">字串类型检测支持</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("ctype_upper");?></td>
      <td bgcolor="#c2cdd6">直接的IO操作支持</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("dio_close");?></td>
    </tr>
    <tr>
      <td bgcolor="#c2cdd6">DOM XML支持</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("domxml_xmltree");?></td>
      <td bgcolor="#c2cdd6">.NET支持</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("dotnet_load");?></td>
    </tr>
    <tr>
      <td bgcolor="#c2cdd6">FDF表单资料格式 Forms Data Format</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("FDF_close");?></td>
      <td bgcolor="#c2cdd6">fribidi支持</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("fribidi_log2vis");?></td>
    </tr>
    <tr>
      <td bgcolor="#c2cdd6">FTP支持</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("ftp_login");?></td>
      <td bgcolor="#c2cdd6">GMP支持</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("gmp_mul");?></td>
    </tr>
    <tr>
      <td bgcolor="#c2cdd6">图形处理 GD Library</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("imageline");?></td>
      <td bgcolor="#c2cdd6">GNU Readline支持</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("readline");?></td>
    </tr>
    <tr>
      <td bgcolor="#c2cdd6">GNU Recode支持</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("recode");?></td>
      <td bgcolor="#c2cdd6">Iconv字符编码函数</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("iconv");?></td>
    </tr>
    <tr>
      <td bgcolor="#c2cdd6">IMAP电子邮件系统</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("imap_close");?></td>
      <td bgcolor="#c2cdd6">IRC网关系统支持</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("ircg_join");?></td>
    </tr>
    <tr>
      <td bgcolor="#c2cdd6">LDAP目录存取协议</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("ldap_close");?></td>
      <td bgcolor="#c2cdd6">MCAL历法支持</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("mcal_close");?></td>
    </tr>
    <tr>
      <td bgcolor="#c2cdd6">MCrypt加密处理</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("mcrypt_cbc");?></td>
      <td bgcolor="#c2cdd6">MCVE支持</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("mcve_adduser");?></td>
    </tr>
    <tr>
      <td bgcolor="#c2cdd6">哈希计算 MHash</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("mhash");?></td>
      <td bgcolor="#c2cdd6">Mimetype支持</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("mime_content_type");?></td>
    </tr>
    <tr>
      <td bgcolor="#c2cdd6">ming FLASH 支持</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("ming_setscale");?></td>
      <td bgcolor="#c2cdd6">mnoGoSearch搜索引擎支持</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("udm_find");?></td>
    </tr>
    <tr>
      <td bgcolor="#c2cdd6">msession支持</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("msession_connect");?></td>
      <td bgcolor="#c2cdd6">多字节字串支持</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("mb_language");?></td>
    </tr>
    <tr>
      <td bgcolor="#c2cdd6">muscat支持</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("muscat_close");?></td>
      <td bgcolor="#c2cdd6">Ncurses终端屏幕控制支持</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("ncurses_color_set");?></td>
    </tr>
    <tr>
      <td bgcolor="#c2cdd6">OpenSSL支持</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("openssl_open");?></td>
      <td bgcolor="#c2cdd6">进程控制支持</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("pcntl_exec");?></td>
    </tr>
    <tr>
      <td bgcolor="#c2cdd6">PREL相容语法 PCRE</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("preg_match");?></td>
      <td bgcolor="#c2cdd6">正则扩展(兼容perl)支持</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("preg_match");?></td>
    </tr>
    <tr>
      <td bgcolor="#c2cdd6">PDF文档支持</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("pdf_close");?></td>
      <td bgcolor="#c2cdd6">PHP和JAVA综合支持</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("java_last_exception_get");?></td>
    </tr>
    <tr>
      <td bgcolor="#c2cdd6">POSIX支持</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("posix_ctermid");?></td>
      <td bgcolor="#c2cdd6">打印功能支持</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("printer_close");?></td>
    </tr>
    <tr>
      <td bgcolor="#c2cdd6">Pspell拼写检查支持</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("pspell_check");?></td>
      <td bgcolor="#c2cdd6">qtdom支持</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("qdom_tree");?></td>
    </tr>
    <tr>
      <td bgcolor="#c2cdd6">Semaphore,IPC,共享内存支持</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("sem_release");?></td>
      <td bgcolor="#c2cdd6">Session支持</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("session_start");?></td>
    </tr>
    <tr>
      <td bgcolor="#c2cdd6">Shockwave Flash支持</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("swf_closefile");?></td>
      <td bgcolor="#c2cdd6">SNMP网络管理协议</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("snmpget");?></td>
    </tr>
    <tr>
      <td bgcolor="#c2cdd6">SMTP支持</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("SMTP","get_cfg_var");?></td>
      <td bgcolor="#c2cdd6">共享内存控制支持</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("shmop_close");?></td>
    </tr>
    <tr>
      <td bgcolor="#c2cdd6">Socket支持</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("fsockopen");?></td>
      <td bgcolor="#c2cdd6">流媒体支持</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("stream_context_create");?></td>
    </tr>
    <tr>
      <td bgcolor="#c2cdd6">Tokenizer支持</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("token_name");?></td>
      <td bgcolor="#c2cdd6">URL支持</td><td align="center" bgcolor="#E9E9E9"><?php echo check("parse_url");?></td>
    </tr>
    <tr>
      <td bgcolor="#c2cdd6">VMailMgr邮件处理</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("vm_adduser");?></td>
      <td bgcolor="#c2cdd6">vpopmail支持</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("vpopmail_add_user");?></td>
    </tr>
    <tr>
      <td bgcolor="#c2cdd6">W32api支持</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("w32api_deftype");?></td>
      <td bgcolor="#c2cdd6">WDDX支持(Web Distributed Data Exchange)</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("wddx_add_vars");?></td>
    </tr>
    <tr>
      <td bgcolor="#c2cdd6">XML解析</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("xml_set_object");?></td>
      <td bgcolor="#c2cdd6">XML-RPC解析支持</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("xmlrpc_decode");?></td>
    </tr>
    <tr>
      <td bgcolor="#c2cdd6">XSLT支持</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("xslt_create");?></td>
      <td bgcolor="#c2cdd6">YAZ支持</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("yaz_close");?></td>
    </tr>
    <tr>
      <td bgcolor="#c2cdd6">Yellow Page系统</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("yp_match");?></td>
      <td bgcolor="#c2cdd6">YP/NIS支持</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("yp_all");?></td>
    </tr>
    <tr>
      <td bgcolor="#c2cdd6">ZIP只读支持</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("zip_close");?></td>
      <td bgcolor="#c2cdd6">压缩文件支持(Zlib)</td>
      <td align="center" bgcolor="#E9E9E9"><?php echo check("gzclose");?></td>
    </tr>
    </table><br>
</body>
</html>