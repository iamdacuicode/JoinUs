<?php
/**
 * @Author Achan
 * @Date   201506031351
 * @Describe  引入admin前端JS,CSS文件类
 */


namespace app\assets;

use yii\web\AssetBundle;

class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot/admin';
    public $baseUrl = '@web/admin';
    public $css = [
        'css/main.css',
        'css/skin.css',
    ];
    public $js = [
        'js/jQuery-v1.7.2.js',
        'js/prototype.js',
        'admin/js/moo.js',
        'js/moo_002.js',
        'admin/js/prototype.js',
        
    ];
    public $depends = [
    ];
}