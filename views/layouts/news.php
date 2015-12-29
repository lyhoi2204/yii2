<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\NewAsset;

NewAsset::register($this);
?>
<?php $this->beginPage(); ?>


<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="<?= Yii::$app->charset ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php $this->head() ?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="author" content="MyPassion">




<link rel="shortcut icon" href="/frontend/img/sms-4.ico" />

<!--[if lt IE 9]> <script type="text/javascript" src="js/customM.js"></script> <![endif]-->


</head>

<body>
<?php $this->beginBody() ?>
<!-- Body Wrapper -->
<div class="body-wrapper">
	<div class="controller">
    <div class="controller2">

        <!-- Header -->
            <?= $this->render('_widget/_header') ?>
        <!-- /Header -->
        
        <!-- Slider -->
            
        <!-- / Slider -->
        
        <!-- Content -->
        <section id="content">
            <div class="container">
            	<!-- Main Content -->
                

                    <?= $content ?>

                <!-- /Left Sidebar -->
                
            </div>    
        </section>
        <!-- / Content -->
        
        <!-- Footer -->
        <?= $this->render('_widget/_footer') ?>
        <!-- / Footer -->
    
    </div>
	</div>
</div>
<!-- / Body Wrapper -->





<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
