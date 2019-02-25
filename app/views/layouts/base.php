<?php
use yii\helpers\Html;
$asset = \app\assets\AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		

        <meta http-equiv="content-language" content="vi" />
		<link rel="alternate" href="http://chiehandmade.com" hreflang="vi" />
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <meta name="geo.region" content="VN" />
        <meta name="geo.placename" content="Hà Nội" />
        <meta name="geo.position" content="21.01355, 105.8317,0.0" />
        <meta name="ICBM" content="21.01355, 105.8317, 0.0" />
        <link rel="shortcut icon" href="/image/icon.png" type="image/x-icon">
        <link rel="icon" href="/image/icon.png" type="image/x-icon">
        <?php $this->head() ?>
    </head>
    <body class="page page-id-30 page-template-default footer-static header-2 woocommerce wpb-js-composer js-comp-ver-4.9 vc_responsive" style="font-family: Arial">
      <div id="wrapper">
          
        <?php $this->beginBody() ?>
        <?= $content ?>
        <?php $this->endBody() ?>
      </div> 
    </body>
</html>
<?php $this->endPage() ?>