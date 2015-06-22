<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\assets\AdminAsset;
use yii\helpers\Url;
$this->title = "Welcome you come to LampRookie Blog管理中心";
?>
<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::$app->charset ?>">
    <title><?= Html::encode($this->title) ?></title>
    <?php AdminAsset::register($this);?>
</head>
<frameset rows="64,*,20" frameborder="0" border="0" framespacing="0">
  <frame src="<?php echo Url::toRoute('login/top');?>" noresize="noresize" frameborder="0" name="topFrame" marginwidth="0" marginheight="0" target="main" scrolling="no">
  <frameset cols="200,*" id="frame">
	<frame src="<?php echo Url::toRoute('login/left');?>" name="leftFrame" noresize="noresize" marginwidth="0" marginheight="0" frameborder="0" target="main" scrolling="no">
	<frame src="<?php echo Url::toRoute('login/centre');?>" name="main" marginwidth="0" marginheight="0" frameborder="0" target="_self" scrolling="auto">
  </frameset>
  <frame src="<?php echo Url::toRoute('login/bottom');?>" width="100%" noresize="noresize" frameborder="0" name="footFrame" marginwidth="0" marginheight="0" target="main" scrolling="no">
</frameset>
</html>
<?php $this->endPage() ?>
