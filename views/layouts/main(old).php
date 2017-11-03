<?php
use frontend\assets\AppAsset;
//use frontend\components\Jetappdetails;
use frontend\widgets\Alert;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\widgets\Menu;
$valuecheck="";
//$obj=new Jetappdetails();
//$valuecheck=$obj->autologin();
AppAsset::register($this);
$uri = array();
if(isset($_SERVER['REQUEST_URI']))
{
	$uri=explode('/',$_SERVER['REQUEST_URI']);
}
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
	
	<?php if(Yii::$app->controller->id.'/'.Yii::$app->controller->action->id=='site/index'){?>
	    <script type="text/javascript" src="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/js/jquery.lightbox-0.5.min.js"></script>
		<link rel="stylesheet" href="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/css/jquery.lightbox-0.5.css">
	<?php }?>
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
<body>
	<?php 
	//$helpurl="https://shopify.cedcommerce.com/jet/site/needhelp";
	$flag=false;
	$value="";

	?>
	    <?php $this->beginBody() ?>
	    <!-- <div class="wrap ced-jet-navigation-mbl"> -->	       
    	 	<script src="<?= Yii::$app->request->baseUrl ?>/js/raphael-min.js"></script>
    	 	<script src="<?= Yii::$app->request->baseUrl ?>/js/jquery-1.8.2.min.js"></script>
			<script src="<?= Yii::$app->request->baseUrl ?>/js/morris-0.4.1.min.js"></script>
    	 	<link rel="stylesheet" href="<?= Yii::$app->request->baseUrl ?>/css/AdminLTE.min.css">
    	 	<?php 
    	 	//$id=Yii::$app->user->identity->id;
    	 	
    	 	//(start) Test (dashboard)
    	 	$session = Yii::$app->session;
    	 	$connection = Yii::$app->getDb();	        	 	
        	
    	 	?>
    	 	<div class="wrap ced-jet-navigation-mbl">
    <?php 	NavBar::begin([
	        	'brandLabel' => Html::img(Yii::$app->request->baseUrl.'/images/logo.png', ['alt'=>'Ced Commerce']),
	        	'brandUrl' => Yii::$app->homeUrl,
	        	'options' => [
	        	 	'class' => 'navbar-inverse navbar-fixed-top',
	        	 ],
	        ]);
	        	 	
	        $menuItems = [['label' => 'Home', 'url' => ['/walmart/site/index']]];

			if (Yii::$app->user->isGuest) {
	        	$menuItems[] = ['label' => 'Login', 'url' => ['/walmart/site/login']];
			} else {
				$menuItems[] = ['label' => 'Admin Settings', 'url' => ['/walmart/walmartconfiguration/index']];
	        	 		
	        	$menuItems[] = ['label' => 'Manage Products',			        	 		
			        	 		'items' =>
			        	 		[
			        	 			['label' => 'Map Category','url' => ['/walmart/categorymap/index'] ],
			        	 			['label' => 'Attribute Mapping', 'url' => ['/walmart/walmart-attributemap/index']],
			        	 			['label' => 'Upload Products', 'url' => ['/walmart/walmartproduct/index']],
			        	 			['label' => 'Get Taxcodes', 'url' => ['/walmart/walmarttaxcodes/index']],
			        	 			['label' => 'Walmart Feeds', 'url' => ['/walmart/walmartproductfeed/index']],
			        	 			//['label' => 'CSV Export/Import', 'url' => ['/productcsv/index']],					        	 				
			        	 		],
	        	 			];
	        	 		
				$menuItems[] = ['label' => 'Manage Order',
					        	'items' =>
					        	[
					        		['label' => 'Sales Orders', 'url' => ['/walmart/walmartorderdetail/index']],
					        	 	['label' => 'Failed Orders', 'url' => ['/walmart/walmartorderimporterror/index']],
					        	],			        	 		
	        	 			];
	        	
	        	$menuItems[] = [
	        	 				'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
	        	 				'url' => ['/walmart/site/logout'],
	        	 				'linkOptions' => ['data-method' => 'post','class'=>'logout_merchant']
	        	 			];
	        }
// 	        $menuItems[] = ['label' => 'Documentation','url' => ['/walmart-marketplace/sell-on-walmart'], 'linkOptions' => ['target' => '_blank'],];
	        $menuItems[] = ['label' => 'Pricing','url' => 'http://cedcommerce.com/bigcommerce-extensions/walmart-bigcommerce-integration', 'linkOptions' => ['target' => '_blank'],];
	        $menuItems[] = ['label' => 'Support','url' => 'http://support.cedcommerce.com/', 'linkOptions' => ['target' => '_blank'],];

	        echo Nav::widget([
	        	 			'options' => ['class' => 'navbar-nav navbar-right nav-pills'],
	        	 			'items' => $menuItems,
	        	 		]);
	        	 NavBar::end();
			?>
			 <?php if(Yii::$app->controller->action->id=='paymentplan'){
			 	?>
	        	<?php echo "<div class='container-1'>"; ?>
	        <?php	} 
	        	else{
	        		?>
	        			<?php echo "<div class='container'>"; ?>
	        <?php } ?>
	        <?= Breadcrumbs::widget([
	            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
	        ]) ?>
	         <?php  if(!Yii::$app->user->isGuest){?>

	        <?php }?>
	        <?= Alert::widget() ?>
	       <!-- Searching box -->
				<!-- code end --> 
	            <?= $content ?>
	        </div>
	        <div id="helpSection" style="display:none"></div>
		</div>
		<footer class="footer">
			<div class="container">
				<p class="pull-left">&copy; CedCommerce <?= date('Y') ?></p>
				<p class="pull-right"><?= Yii::powered() ?></p>
			</div>
			<div id='LoadingMSG' style="display: none;" class="overlay">
				<img src="<?= Yii::$app->urlManager->baseUrl?>/images/482.gif">
			</div>
		</footer>
	    <?php $this->endBody() ?>
	  <?php if(!\Yii::$app->user->isGuest && $valuecheck)
	  	{
		    ?>
		    <script src="https://cdn.shopify.com/s/assets/external/app.js"></script>
			<script type="text/javascript">
				ShopifyApp.init({
					apiKey: "<?php echo WALMART_API_KEY;?>",
					shopOrigin: "<?php echo "https://".SHOP;?>"
				});
				ShopifyApp.ready(function(){
					ShopifyApp.Bar.initialize({
						//icon: "https://lay-buys.com/vt/themes/hebo/img/LAY-BUYS-logo-medium.png",
						//title: "Need Help",
						buttons: 
						{
					        primary: {
					          	label: 'Help',
					          	message: 'need help',
					          	callback: function(){
					            	ShopifyApp.Bar.loadingOn();
					            	//doSomeCustom();
					          	}
					        }
					    }
					});

				});
				/*function doSomeCustom(){
					j$('#LoadingMSG').show();
					$.post("<?= $helpurl ?>",
				        {	
				        	hi:"hello", 
						},
				        function(data,status){
				        	j$('#LoadingMSG').hide();
				            j$('#helpSection').html(data);
				            j$('#helpSection').css("display","block");	  
				            $('#helpSection #myModal').modal('show');
				        });
// 					window.location.href='https://shopify.cedcommerce.com/inetegration/walmart/site/needhelp';
				}*/
			</script>
	<?php } ?> 
		<script type="text/javascript">
		    $(document).ready(function(){ 
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
			});
			/* $('.carousel').carousel({
			    interval: false,
			}); */ 
			if( self !== top ){
		 		// var head1=$('head', self.document);
		 		var head1=$(self.document).find('head');
		 		console.log(head1);
				var url = '<?= Yii::$app->getUrlManager()->getBaseUrl();?>/css/embapp.css';
				head1.append($("<link/>", { rel: "stylesheet", href: url, type: "text/css" } ));
				$('.logout_merchant').css('display','none');
			}	
		</script>
		<!--Start of Zopim Live Chat Script-->
		<script type="text/javascript">
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
		</script>
		<!--End of Zopim Live Chat Script-->

		<!-- menu -->
			<script type="text/javascript">

				jQuery(document).ready(function(){
					
					$('.dropdown').addClass('dropdown1').removeClass('dropdown');
				});
// 				j$(document).ready(function(){ });
				$(".dropdown1").click(function(e){
	
			    });
			</script>
		<!-- end menu -->
		<!-- Hotjar Tracking Code for https://shopify.cedcommerce.com/integration -->
		<script>
		    (function(h,o,t,j,a,r){
		        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
		        h._hjSettings={hjid:305411,hjsv:5};
		        a=o.getElementsByTagName('head')[0];
		        r=o.createElement('script');r.async=1;
		        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
		        a.appendChild(r);
		    })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
		</script>


	</body>
</html>
<?php $this->endPage() ?>
