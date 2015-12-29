<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AdminAsset;

AdminAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->

<body>

<?php $this->beginBody() ?>
	<div id="container" class="effect mainnav-lg">
		
		<!--NAVBAR-->
		<!--===================================================-->
		<?= $this->render('_widget/_header') ?>
		<!--===================================================-->
		<!--END NAVBAR-->

		<div class="boxed">

			<!--CONTENT CONTAINER-->
			<!--===================================================-->
			<?= $content ?>
			<!--===================================================-->
			<!--END CONTENT CONTAINER-->


			
			<!--MAIN NAVIGATION-->
			<!--===================================================-->
			<?= $this->render('_widget/_mainnav') ?>
			<!--===================================================-->
			<!--END MAIN NAVIGATION-->
			
			<!--ASIDE-->
			<!--===================================================-->
			<?= $this->render('_widget/_aside') ?>
			<!--===================================================-->
			<!--END ASIDE-->

		</div>

		

		<!-- FOOTER -->
		<!--===================================================-->
		<footer id="footer">

			<!-- Visible when footer positions are fixed -->
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<div class="show-fixed pull-right">
				<ul class="footer-list list-inline">
					<li>
						<p class="text-sm">SEO Proggres</p>
						<div class="progress progress-sm progress-light-base">
							<div style="width: 80%" class="progress-bar progress-bar-danger"></div>
						</div>
					</li>

					<li>
						<p class="text-sm">Online Tutorial</p>
						<div class="progress progress-sm progress-light-base">
							<div style="width: 80%" class="progress-bar progress-bar-primary"></div>
						</div>
					</li>
					<li>
						<button class="btn btn-sm btn-dark btn-active-success">Checkout</button>
					</li>
				</ul>
			</div>

		</footer>
		<!--===================================================-->
		<!-- END FOOTER -->


		<!-- SCROLL TOP BUTTON -->
		<!--===================================================-->
		<button id="scroll-top" class="btn"><i class="fa fa-chevron-up"></i></button>
		<!--===================================================-->



	</div>
	<!--===================================================-->
	<!-- END OF CONTAINER -->


	
	
	<!-- SETTINGS - DEMO PURPOSE ONLY -->
	<!--===================================================-->
		<?= $this->render('_widget/_setting') ?>
	<!--===================================================-->
	<!-- END SETTINGS -->

	
	<!--JAVASCRIPT-->
	<!--=================================================-->

	

	

		
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

