<?php 

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AdminAsset;
use yii\web\View;
$this->title = "Welcome you come to LampRookie Blog管理中心";   
?>
<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html lang="<?= Yii::$app->language ?>">
<head>
    <?php //AdminAsset::register($this,['position' => View::POS_HEAD]);?>
    <meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::$app->charset ?>">
    <?php // Html::csrfMetaTags() ?>
    <title>Welcome you come to LampRookie Blog管理中心</title><?php //Html::encode($this->title) ?>
    <?php $this->head() ?>
    
</head>
            <?php echo $content; ?>
        <?php $this->beginBody();?>
        <?php $this->endBody();?>
</html>
<?php $this->endPage() ?>