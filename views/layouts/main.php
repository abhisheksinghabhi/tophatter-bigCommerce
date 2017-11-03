<?php
use frontend\modules\walmart\assets\AppAsset;
//use frontend\components\Jetappdetails;
use frontend\widgets\Alert;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use frontend\modules\walmart\components\Data;
use yii\widgets\Menu;
$valuecheck="";
//$obj=new Jetappdetails();
//$valuecheck=$obj->autologin();
AppAsset::register($this);
$urlCall = \yii\helpers\Url::toRoute(['site/schedulecall']);
$feedbackurl = \yii\helpers\Url::toRoute(['site/feedback']);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
	<link rel="icon" href="<?php echo Yii::$app->request->baseUrl?>/images/favicon.ico">
	<meta charset="<?= Yii::$app->charset ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta content="INDEX,FOLLOW" name="robots">
	
	<script type="text/javascript" src="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/js/jquery-1.10.2.min.js"></script>
	<link rel="stylesheet" href="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/css/font-awesome.min.css">
	<script type="text/javascript" src="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/js/jquery.datetimepicker.full.min.js"></script>
	    <?= Html::csrfMetaTags() ?>
	     <title><?= Html::encode("BigCommerce Walmart Integration | CedCommerce");?></title>
	<title><?= Html::encode($this->title) ?></title>
	    <?php $this->head() ?>

	<script type="text/javascript">
	    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	    ga('create', 'UA-63841461-1', 'auto');
	    ga('send', 'pageview');
	</script>  
</head>

<?php 
if(Yii::$app->controller->action->id=='pricing') {
	echo "<body class='pricing-page'>";
} else {
	echo "<body>";
}
?>

<?php $this->beginBody() ?>
    <!--<div class="trial-wrapper">
        <div class="col-sm-9 plateform-switch-body no-padding"><div class="install-walmart">
            <div class="install-button">
                <div>
                    <!-- <h2 class="rw-sentence">
                        <span>Try/Switch other integrations like</span>
                        <div class="rw-words rw-words-1">
                            <span>JET</span>
                            <span>NEWEGG</span>
                        </div>
                        <i class="fa fa-chevron-down" id="show_apps_div" aria-hidden="true"></i> -->
                        <!-- Code For Referral Start -->

                        <!-- Code For Referral End -->
                    <!-- </h2> -->
                    <!--  <i class="alert-icon"></i>
                    <p>Hurricane may effect disturbance in Product and Order Management for short Duration</p>
                </div> -->
                <!-- <div id="display_apps" style="display: none;">
                    <div class="jet">
                        <span class="jet-app">Jet app</span>
                        <?= $jetpath ?>
                    </div>
                    <div class="newegg">
                        <span class="newegg-app">Newegg app</span>
                        <?= $eggpath ?>
                    </div>
                </div> -->
            <!-- </div>
        </div>
    </div>
     </div> -->
		<div class="wrap ced-jet-navigation-mbl">

		<?php if (!Yii::$app->user->isGuest) {
									?>
		<!--<<div class="notification"><strong>NOTE:</strong>NEW FEATURES ARE LIVE ON THE BIGCOMMERCE APP FOR USER TESTING  - CONTACT US IN CASE FACING ANY DIFFICULTY</div>-->
			<div class="trial-nav-wrap">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="#"></a>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							
						<!-- <?php if (!Yii::$app->user->isGuest) {
									?> -->
	
							<ul class="nav navbar-nav navbar-right">
								<li><a href="<?= Yii::$app->request->baseUrl ?>/walmart/site/index">Home</a></li>
								<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Products<span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="<?= Yii::$app->request->baseUrl ?>/walmart/categorymap/index">Map Category</a></li>
										<li><a href="<?= Yii::$app->request->baseUrl ?>/walmart/walmart-attributemap/index">Attributes Mapping</a></li>
										<li><a href="<?= Yii::$app->request->baseUrl ?>/walmart/walmartproduct/index">Manage Products</a></li>
										<li role="separator"></li>
										<li><a href="<?= Yii::$app->request->baseUrl ?>/walmart/walmartrepricing/index">Repricing</a></li>
										<li><a href="<?= Yii::$app->request->baseUrl ?>/walmart/walmarttaxcodes/index">Get Taxcodes</a></li>
										<li><a href="<?= Yii::$app->request->baseUrl ?>/walmart/walmartproductfeed/index">Walmart Feeds</a></li>
									</ul>
								</li>

								<!-- <li>
									<a href="<?= Yii::$app->request->baseUrl ?>/walmart/walmart-carriers-map/index">Carrier Mapping</a>
								</li> -->

								<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Order<span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="<?= Yii::$app->request->baseUrl ?>/walmart/walmartorderdetail/index">Sales Order</a></li>
										<li><a href="<?= Yii::$app->request->baseUrl ?>/walmart/walmartorderimporterror/index">Failed Order</a></li>
										
									</ul>
								</li>
								<li class="dropdown">
	                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
	                                   aria-haspopup="true" aria-expanded="false">Import/Export<span
	                                            class="caret"></span></a>
	                                <ul class="dropdown-menu">
	                                    <li><a href="<?= Yii::$app->request->baseUrl ?>/walmart/updatecsv/index">Product Update</a></li>
	                                    <li>
	                                        <a href="<?= Yii::$app->request->baseUrl ?>/walmart/productcsv/index">Price, Inventory and Barcode</a></li>
	                                    <li>
	                                        <a href="<?= Yii::$app->request->baseUrl ?>/walmart/updatecsv/index-retire">Retire Product</a></li>
	                                </ul>
                            	</li>
                            	<li><a href="<?= Yii::$app->request->baseUrl ?>/walmart/faq/index">FAQs</a></li>

		
                                <!--<a class="icon-items">
                                    <img src="<?= Yii::getAlias('@walmartbasepath') ?>/assets/images/walmart-guide/icons/Layer-6.png">
                                </a>-->
                            </li>

                            
                                <li>
                                    <a class="icon-items" href="javascript:void(0)" onclick="callView()">
                                        <img src="<?= Yii::getAlias('@walmartbasepath') ?>/assets/images/walmart-guide/icons/Layer-7.png">
                                    </a>
                                </li>



                            <li>
                                <a class="icon-items"
                                   href="<?= Yii::$app->request->baseUrl ?>/walmart/walmartconfiguration/index"><img
                                            src="<?= Yii::getAlias('@walmartbasepath') ?>/assets/images/walmart-guide/icons/Layer-4.png"></a>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle icon-items" data-toggle="dropdown" role="button"
                                   aria-haspopup="true" aria-expanded="false"><img
                                            src="<?= Yii::getAlias('@walmartbasepath') ?>/assets/images/walmart-guide/icons/Layer-5.png"></a>
									<ul class="dropdown-menu">
										<li><a href="<?= Yii::$app->request->baseUrl ?>/walmart-marketplace/paymentplan">Payment Plan</a></li>
										<li><a href="http://support.cedcommerce.com/">Support</a></li>
										<li><a href="<?= Yii::$app->request->baseUrl ?>/walmart-marketplace/sell-on-walmart">Documentation</a></li>
										<li><a href="<?= Yii::$app->request->baseUrl ?>/walmart/site/index?tour">Quick Tour</a></li>
										<li><a href="<?= Yii::$app->request->baseUrl ?>/walmart/report/index">Report</a></li>
										<li class="logout_merchant"><a href="<?= Yii::$app->request->baseUrl ?>/walmart/site/logout">Logout</a></li>
									</ul>
								</li>
							</ul>

							<ul class="nav navbar-nav navbar-right navbar-2">
								<li><a href="<?= Yii::$app->request->baseUrl ?>/site/index">Home</a></li>
								<li class="dropdowns">
								<a href="#">Products</a>
									<ul class="dropdown-menus">
										<li><a href="<?= Yii::$app->request->baseUrl ?>/walmart/categorymap/index">Map Category</a></li>
										<li><a href="<?= Yii::$app->request->baseUrl ?>/walmart/walmart-attributemap/index">Attributes Mapping</a></li>
										<li><a href="<?= Yii::$app->request->baseUrl ?>/walmart/walmartproduct/index">Manage Products</a></li>
										<li role="separator"></li>
										<li><a href="<?= Yii::$app->request->baseUrl ?>/walmart/walmarttaxcodes/index">Get Taxcodes</a></li>
										<li><a href="<?= Yii::$app->request->baseUrl ?>/walmart/walmartproductfeed/index">Walmart Feeds</a></li>
									</ul>
								</li>

								<li>
									<a href="<?= Yii::$app->request->baseUrl ?>/walmart/walmart-carriers-map/index">Carrier Mapping</a>
								</li>

								<li class="dropdowns">
								<a href="#">Order</a>
									<ul class="dropdown-menus">
										<li><a href="<?= Yii::$app->request->baseUrl ?>/walmart/walmartorderdetail/index">Sales Order</a></li>
										<li><a href="<?= Yii::$app->request->baseUrl ?>/walmart/walmartorderimporterror/index">Failed Order</a></li>
										
									</ul>
								</li>

								<li ><a class="icon-items" href="<?= Yii::$app->request->baseUrl ?>/walmart/walmartconfiguration/index">Setting</a></li>

								<li class="dropdowns">
								<a href="#">Account</a>
									<ul class="dropdown-menus">
										<li><a href="<?= Yii::$app->request->baseUrl ?>/walmart-marketplace/paymentplan">Payment Plan</a></li>
										<li><a href="http://support.cedcommerce.com/">Support</a></li>
										<li><a href="<?= Yii::$app->request->baseUrl ?>/walmart-marketplace/sell-on-walmart">Documentation</a></li>
										<li><a href="<?= Yii::$app->request->baseUrl ?>/walmart/site/index?tour">Quick Tour</a></li>
										<li class="logout_merchant"><a href="<?= Yii::$app->request->baseUrl ?>/walmart/site/logout">Logout</a></li>
									</ul>
								</li>
							</ul>
							<!-- <?php } ?> -->
							
						</div>
					</div>
				</nav>
		 	</div>
<?php } ?>
		 	<div class="fixed-container-body-class">
                    <!-- <div class="promotion-Message">
                        <p>Like this solution?! Well there are couple more places where you can sell. Check <a href="https://www.bigcommerce.com/apps/newegg-marketplace-integration/" target="_blank">Newegg</a> & <a href="https://www.bigcommerce.com/apps/sears-marketplace-integration/" target="_blank">Sears</a> </p>
                        <span class="border"></span>
                    </div>-->
                   <?php
 				if (!Yii::$app->user->isGuest)
				{
					?>
					 	<div class="trial-wrapper">
					 		<div class="col-sm-9 plateform-switch-body no-padding">
					 			<?
					 				$merchant_id = Yii::$app->user->identity->id;
						 		
						 				$newpath = "site";
						 		
						 			$appurls=Data::checkInstalledApp($merchant_id,true);
						 		?>
			 					<div class="install-walmart">
		 							<div class="install-button">
		 								<div id="show_apps_div">
		 								<div>
		 									<h2 class="rw-sentence">
							                    <span>Switch to other integrations app</span>
							                    <div class="rw-words rw-words-1">
							                        <span> JET </span>
							                        <span> NEWEGG </span>
							                        <span> SEARS </span>
							                    </div>
		 									    <i class="fa fa-chevron-down" aria-hidden="true"></i>
		 								  <!-- Code For Referral Start -->
			                               <!--  <p class="referal-notice"> Become a Referrer & Earn Money or 1 Month Free Subscription
			                                    by <a href="<?= Yii::$app->request->baseUrl ?>/referral/account/dashboard"
			                                          target="_blank" class="referal-link">Clicking Here</a></p> -->
			                                <!-- Code For Referral End -->
			                                 <!-- Code For Survey for -->
			                                <!-- end survey for  -->
							                </h2>
							               <!--  <i class="alert-icon"></i>
                        					<p>Hurricane may effect disturbance in Product and Order Management for short Duration</p> -->
		 								</div>
		 								<div id="display_apps" style="display: none;">
		 									<div class="walmart">
		 										<span class="walmart-app">Jet app</span>
		 										<a <?php if($appurls['jet']['type']=="Install"){ echo 
				 											"target='_blank' href=".$appurls['jet']['url'];}
				 											else{echo "href=".$appurls['jet']['url']."/".$newpath;}?>>
		 											<button class="btn-path"><?= $appurls['jet']['type'];?></button>
		 										</a>
		 									</div>
		 									<div class="newegg">
		 										<span class="newegg-app">Newegg app</span>
		 										<a <?php if($appurls['newegg']['type']=="Install"){ echo "target='_blank' href=".$appurls['newegg']['url'];}else{echo "href=".$appurls['newegg']['url']."/".$newpath;}?>>
		 											<button class="btn-path"><?= $appurls['newegg']['type'];?></button>
		 										</a>
		 									</div>
		 									<div class="sears">
		 										<span class="sears-app">Sears app</span>
		 										<a <?php if($appurls['sears']['type']=="Install"){ echo "target='_blank' href=".$appurls['sears']['url'];}else{echo "href=".$appurls['sears']['url']."/".$newpath;}?>>
		 											<button class="btn-path"><?= $appurls['sears']['type'];?></button>
		 										</a>
		 									</div>
		 								</div>
		 							</div>
		 						</div>
		 						</div>
					 		</div>
					 	
				 		</div>
	 		<?php
			}
	 		?> 
		        <?= Breadcrumbs::widget([
		            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
		        ]) ?>		        
		    	<?= Alert::widget() ?>
		        <?= $content ?>
		    </div>
		    
		    <div id="view_call" style="display: none;"></div>
		    <div id="helpSection" style="display:none"></div>
		</div>
<?php  	  
	if(Yii::$app->controller->id.'/'.Yii::$app->controller->action->id != 'site/guide')
	{
?>
		<footer class="container-fluid footer-section">
			<div class="contact-section">
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
						<div class="ticket">
							<div class="icon-box">
								<div class="image">
									<a title="Click Here to Submit a Support Ticket" href="http://support.cedcommerce.com/" target="_blank"><img src="<?= Yii::$app->request->baseUrl ?>/images/ticket.png"></a>
								</div>
							</div>
							<div class="text-box">
								<span>Submit issue via ticket</span>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
						<div class="mail">
							<div class="icon-box">
								<div class="image">
									<a title="Click Here to Contact us through Mail" href="mailto:bigcommerce@cedcommerce.com" target="_blank"><img src="<?= Yii::$app->request->baseUrl ?>/images/mail.png"></a>
								</div>
							</div>
							<div class="text-box">
								<span>Send us an E-mail</span>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
						<div class="skype">
							<div class="icon-box">
								<div class="image">
									<a title="Click Here to Connect With us through Skype" href="javascript:void(0)"><img src="<?= Yii::$app->request->baseUrl ?>/images/skype.png"></a>
								</div>
							</div>
							<div class="text-box">
								<span>Connect via skype</span>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					
				</div>
			</div>
		</footer>
		<div class="copyright-section">
			<div class="row">
				
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<div class="copyright">
						<span>Copyright © 2017 CEDCOMMERCE | All Rights Reserved.</span>
					</div>
				</div>
			</div>
		</div>
		<div class="overlay" style="display: none;" id="LoadingMSG">
            <div id="fountainG">
                <div id="fountainG_1" class="fountainG"></div>
                <div id="fountainG_2" class="fountainG"></div>
                <div id="fountainG_3" class="fountainG"></div>
                <div id="fountainG_4" class="fountainG"></div>
                <div id="fountainG_5" class="fountainG"></div>
                <div id="fountainG_6" class="fountainG"></div>
                <div id="fountainG_7" class="fountainG"></div>
                <div id="fountainG_8" class="fountainG"></div>
            </div>
        </div>
<?php 
	}
?>
<?php $this->endBody() ?>

	<script type="text/javascript">
		function callView() {
		    var url = '<?= $urlCall ?>';
		    $('#LoadingMSG').show();
		    $.ajax({
		        method: "post",
		        url: url,

		    })
		    .done(function (msg) {
		        //console.log(msg);
		        $('#LoadingMSG').hide();
		        $('#view_call').html(msg);
		        $('#view_call').css("display", "block");
		        $('#view_call #myModal').modal('show');
		    });
		}
        $("#show_apps_div").click(function () {
        var x = document.getElementById('display_apps');
        if (x.style.display === 'none') {
            x.style.display = 'block';
        } else {
            x.style.display = 'none';
        }
    });
		function showfeedback() 
		{
		    //$('#feedback').css('display', 'none');
		    var url = '<?= $feedbackurl ?>';
		    $.ajax({
		        method: "post",
		        url: url,

		    })
		    .done(function (msg) 
		    {
		        console.log(msg);
		        $('#view_feedback').html(msg);
		    });
		}

		if( self !== top ){
				var head1=$(self.document).find('head');
				console.log(head1);
			var url = '<?= Yii::$app->getUrlManager()->getBaseUrl();?>/css/embapp.css';
			head1.append($("<link/>", { rel: "stylesheet", href: url, type: "text/css" } ));
			$('.logout_merchant').css('display','none');
		}	
		
	    $(document).ready(function()
	    {
	        <?php if (!Yii::$app->user->isGuest) 
   			{?>
	        	showfeedback();
	        <?php }?>
	        $('#hide').click(function(e)
	        {
	            if($('#i_tag').attr('class')=='glyphicon glyphicon-chevron-right'){
	                 $("#i_tag").attr('class', "glyphicon glyphicon-chevron-left");
	            }
	            else{
	                 $("#i_tag").attr('class', "glyphicon glyphicon-chevron-right");
	            }
	            $('#feedback').toggleClass('show');
	            e.preventDefault();
	        })
	        $(document).on('pjax:send', function() {
				  j$('#LoadingMSG').show();
				  console.log('pjax send');
			})
			$(document).on('pjax:complete', function() {
				j$('#LoadingMSG').hide()
			 	console.log('pjax complete');
			})
		    $('.carousel').carousel({
			    interval: 6000
			});
			$('.dropdown').addClass('dropdown1').removeClass('dropdown'); 
	    });
		window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
		d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
		_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
		$.src="//v2.zopim.com/?322cfxiaxE0fIlpUlCwrBT7hUvfrtmuw";z.t=+new Date;$.
		type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
		
		$zopim(function(){
			window.setTimeout(function() {
			//$zopim.livechat.window.show();
			}, 2000); //time in milliseconds
		});
		function closenoticehide()
		{
			$('#imp-notice-hide').css("display","none");
		}
	</script>
	<!-- Hotjar Tracking Code for http://bigcommerce.cedcommerce.com/integration/walmart -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:574491,hjsv:5};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
</script>
</body>
</html>
<?php $this->endPage() ?>
