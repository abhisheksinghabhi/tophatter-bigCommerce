<div class="content-section">
	<div class="form new-section">
		<div class="jet-pages-heading">
			<div class="title-need-help">
		    	<h3 class="Jet_Products_style">FAQ</h3>
		    </div>
		</div>
		<div>
			<section class="cd-faq">


				<div class="cd-faq-items">
					<ul id="basics" class="cd-faq-group">
						<?php foreach($data as $row){ ?>
						<li>
							<a class="cd-faq-trigger" href="#0"><?= $row['query'] ?></a>
							<div class="cd-faq-content">
								<p><?= $row['description'] ?></p>
							</div> <!-- cd-faq-content -->
						</li>
						<?php } ?>
						
					</ul> <!-- cd-faq-group -->

				</div> <!-- cd-faq-items -->
				<a href="#0" class="cd-close-panel">Close</a>
			</section> <!-- cd-faq -->
		</div>
	</div>
</div>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/css/faqreset.css"> <!-- CSS reset -->
<link rel="stylesheet" href="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/css/faqstyle.css"> <!-- Resource style -->
<script type="text/javascript" src="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/js/modernizr.js"></script>
<script type="text/javascript" src="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/js/jquery-2.1.1.js"></script>
<script type="text/javascript" src="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/js/jquery.mobile.custom.min.js"></script>
<script type="text/javascript" src="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/js/main.js"></script>