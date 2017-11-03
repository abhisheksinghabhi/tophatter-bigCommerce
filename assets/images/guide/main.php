<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;
use yii\bootstrap\ActiveForm;
use  yii\widgets\Menu;
use frontend\components\Jetappdetails;

/* @var $this \yii\web\View */
/* @var $content string */
$valuecheck="";
$obj=new Jetappdetails();
$valuecheck=$obj->autologin();
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
<link rel="icon"
	href="<?php echo Yii::$app->request->baseUrl?>/images/favicon.ico">
<meta charset="<?= Yii::$app->charset ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords"
	content="shopify jet integration, shopify, jet integration, jet api integration" />
<meta name="description" content="Integration of jet api in shopify" />
<script type="text/javascript"
	src="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/js/jquery-1.10.2.min.js"></script>
    <?php if(Yii::$app->controller->id.'/'.Yii::$app->controller->action->id=='site/index'){?>
    	<script type="text/javascript"
	src="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/js/jquery.lightbox-0.5.min.js"></script>
<link rel="stylesheet"
	href="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/css/jquery.lightbox-0.5.css">
    <?php }?>
    <link rel="stylesheet"
	href="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/css/font-awesome.min.css">
    <?php /*if($valuecheck!=""){?>
	<link rel="stylesheet" href="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/css/embapp.css">
	<?php }*/?>
    <script type="text/javascript"
	src="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/js/jquery.datetimepicker.full.min.js"></script>
<script type="text/javascript"
	src="<?= Yii::$app->homeUrl;?>js/jquery.treeview.js"></script>

    <?= Html::csrfMetaTags() ?>
     <title><?= Html::encode("Shopify Jet Integration | CedCommerce");?></title>
<title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<style>
#LoadingMSG {
	display: none;
}

#LoadingMSG, #LoadingMSG img {
	margin: 0 auto;
}

.overlay {
	background-color: rgba(0, 0, 0, 0.20);
	height: 100%;
	left: 0;
	position: fixed;
	right: 0;
	text-align: center;
	top: 0;
	width: 100%;
	z-index: 99999;
}

.overlay img {
	position: relative;
	top: 40%;
}

.breadcrumb {
	margin-bottom: 5px !important;
}

.btn-danger {
	margin-left: 5px;
}

.dropdown-menu>li>a {
	padding: 3px 19px !important;
}

.bs-example-modal-lg ol.carousel-indicators {
	background-image: linear-gradient(to right, rgb(155, 155, 158) 0%,
		rgb(217, 217, 221) 50%, rgb(155, 155, 158) 100%);
	float: left !important;
	margin: 0 auto;
	padding-bottom: 5px;
	padding-top: 5px;
	position: static;
	width: 100%;
}

.bs-example-modal-lg .carousel-caption {
	color: rgb(0, 0, 0);
	font-size: 16px;
	left: 2% !important;
	margin-top: 0;
	padding-bottom: 0;
	right: 2%;
	text-shadow: none !important;
}

.help_jet {
	float: left;
	margin-bottom: 0;
	margin-top: 5px;
}
/* .help_jet::before {
  background: #337ab7 none repeat scroll 0 0;
  border-radius: 50%;
  color: #fff;
  content: "?";
  display: inline-block;
  font-weight: bold;
  margin-right: 5px;
  padding: 4px 2px 2px;
  text-align: center;
  width: 26px;
} */
.help_jet::before {
	background: #337ab7 none repeat scroll 0 0;
	border-radius: 50%;
	color: #fff;
	content: "?";
	display: inline-block;
	font-size: 20px;
	font-weight: bold;
	margin-left: 8px;
	margin-right: 5px;
	padding: 4px 6px 1px;
	text-align: center;
	width: 33px;
}

.yii_notice::before {
	background: #ef765d none repeat scroll 0 0;
	border-radius: 100%;
	color: #fff;
	content: "!";
	display: inline-block;
	font-size: 21px;
	margin-right: 5px;
	padding: 0;
	text-align: center;
	width: 30px;
}

.yii_notice {
	background-color: #f5f5f5;
	border-color: #d6e9c6;
	border-radius: 4px;
	color: #333;
	font-size: 14px;
	font-weight: bold;
	line-height: 27px;
	margin-bottom: 8px;
	padding: 5px 10px;
}

.yii_notice {
	color: #333;
	font-size: 14px;
	font-weight: bold;
	line-height: 27px;
}

.yii_notice a {
	background: #00acac none repeat scroll 0 0;
	border-radius: 2px;
	color: #fff;
	float: right;
	font-size: 15px;
	padding: 2px 8px;
	text-decoration: unset;
}

h1, .h1 {
	font-size: 27px !important;
}

.Jet_Products_style {
	float: left;
	margin-right: 5px;
	margin-top: 5px;
}

.enable_check a::before {
	color: #91c058;
	content: "";
	display: inline-block;
	font-size: 19px;
	font-weight: normal;
	left: 84px;
	margin-right: 8px;
	position: absolute;
	top: -6px;
}

.enable_check>a {
	padding-left: 25px;
	position: relative;
}

.btn-primary {
	float: right;
	margin-left: 5px;
	margin-bottom: 8px;
}

.form-control.pull-right {
	width: 10%;
}
.select_error{
		border-color: #a94442;
    	box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
	}
</style>
<body>
<?php 
//$url="<img src=Yii::$app->request->baseUrl.'/images/logo.png'>";
//Yii::$app->session->setFlash('notice', "If you'd uploaded product(s) on live and product status(s)'re still 'Under Jet review' then please raise a ticket from partner panel <a href='https://partner.jet.com/support'>Request Support</a>.");
$flag=false;
$value="";
$value=Jetappdetails::isValidateapp();
$contoller=Yii::$app->controller->id.'/'.Yii::$app->controller->action->id;
?>
    <?php $this->beginBody() ?>
    <div class="wrap">
		<input type="hidden" id="validate_message"
			value="<?php echo $value;?>">
        <?php
            NavBar::begin([
                'brandLabel' => Html::img(Yii::$app->request->baseUrl.'/images/logo.png', ['alt'=>'Ced Commerce']),
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            $menuItems = [
                ['label' => 'Home', 'url' => ['/site/index']],
            		
            ];
           /* if (!Yii::$app->user->isGuest) {
            	$menuItems[] = ['label' => 'Create Post', 'url' => ['/site/createpost']];
            	$menuItems[] = ['label' => 'Mailbox('.$count.')', 'url' => ['/site/mailbox']];
            	$menuItems[] = ['label' => 'View Ignore User', 'url' => ['/site/viewignoreuser']];
            	$menuItems[] = ['label' => 'View Profile', 'url' => ['/site/viewuser']];
            	$menuItems[] = ['label' => 'Edit Profile', 'url' => ['/site/editprofile']];
            	
            } */
            if (Yii::$app->user->isGuest) {
               /* $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];*/
                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
            } 
            else
            {
					if(\Yii::$app->user->identity->id==13 || \Yii::$app->user->identity->id==53){
						$menuItems[] = ['label' => 'Jet','items' => [
								//['label' => 'Activate API', 'url' => ['/jetapi/index']],
							//['label' => 'Jet Products', 'url' => ['/jetproduct/index']],
								['label' => 'Manage Products',
							 
								'items' =>
								[
									['label' => 'CSV Export/Import', 'url' => ['/productcsv/index']],
									['label' => 'Upload Products', 'url' => ['/jetproduct/index']],
									['label' => 'Rejected Products', 'url' => ['/jetrejectfiles/index']],
								 
								],
							],
							['label' => 'Map Category','url' => ['/categorymap/index'] ],
								//	'items'=>
								// [
								//	['label' => 'Category Selection','url' => ['/jetselectcat/index']],
								//	['label' => 'Map Category','url' => ['/categorymap/index']],
								//],
								// ],
								//['label' => 'Jet category Attributes', 'url' => ['/jetcatattribute/index']],
								//['label' => 'Jet Order', 'url' => ['/jetorderdetail/index']],
								['label' => 'Manage Order',
								'items' =>
								[
								
									['label' => 'Sales Order', 'url' => ['/jetorderdetail/index']],
									['label' => 'Failed Sales Order', 'url' => ['/jetorderimporterror/index']],
									['label' => 'Return Order', 'url' => ['/jetreturn/index']],
									['label' => 'Refund Order', 'url' => ['/jetrefund/index']],
									//['label' => 'Shopify Customer Detail', 'url' => ['/shopifytestcustomer/index']],
								],
							 
							],
								['label' => 'Order Settlement', 'url' => ['/jetsettlement/index']],
								['label' => ' Jet API Configuration', 'url' => ['/jetconfiguration/index']],
							]];
					}else{
						$menuItems[] = ['label' => 'Jet','items' => [
							//['label' => 'Activate API', 'url' => ['/jetapi/index']],
							//['label' => 'Jet Products', 'url' => ['/jetproduct/index']],
							['label' => 'Manage Products',
								
								'items' =>
								[
								
									['label' => 'Upload Products', 'url' => ['/jetproduct/index']],
									['label' => 'Rejected Products', 'url' => ['/jetrejectfiles/index']],
									
								],
							],
							['label' => 'Map Category','url' => ['/categorymap/index'] ],
								//	'items'=>
								// [
								//	['label' => 'Category Selection','url' => ['/jetselectcat/index']],
								//	['label' => 'Map Category','url' => ['/categorymap/index']],
								//],
								// ],
								//['label' => 'Jet category Attributes', 'url' => ['/jetcatattribute/index']],
								//['label' => 'Jet Order', 'url' => ['/jetorderdetail/index']],
							['label' => 'Manage Order',
								'items' =>
								[
								
								['label' => 'Sales Order', 'url' => ['/jetorderdetail/index']],
								['label' => 'Failed Sales Order', 'url' => ['/jetorderimporterror/index']],
								['label' => 'Return Order', 'url' => ['/jetreturn/index']],
								['label' => 'Refund Order', 'url' => ['/jetrefund/index']],
								//['label' => 'Shopify Customer Detail', 'url' => ['/shopifytestcustomer/index']],
								],
							
							],
							['label' => 'Order Settlement', 'url' => ['/jetsettlement/index']],
							['label' => ' Jet API Configuration', 'url' => ['/jetconfiguration/index']],
						]];
					}
            		$menuItems[] = [
							'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
							'url' => ['/site/logout'],
							'linkOptions' => ['data-method' => 'post','class'=>'logout_merchant']
								];
            	
            }
            $menuItems[] = ['label' => 'Help','items' => [
            		['label' => 'FAQ(s)', 'url' => 'http://support.cedcommerce.com/kb/faq.php?cid=24', 'linkOptions' => ['target' => '_blank']],
            
            		['label' => 'Pricing', 'url' => ['/site/pricing'], 'linkOptions' => ['target' => '_blank']],
            		['label' => 'Document', 'url' => 'http://cedcommerce.com/media/userguides/jet-shopify/Jet%20Shopify-User-Manual-0.0.3.pdf', 'linkOptions' => ['target' => '_blank']],
            		['label' => 'Support', 'url' => 'http://support.cedcommerce.com/', 'linkOptions' => ['target' => '_blank']],
            		 
            ]];
			$menuItems[] = ['label' => 'How To Sell On Jet','url' => 'https://shopify.cedcommerce.com/frontend/how-to-sell-on-jet-com','linkOptions' => ['target' => '_blank']];
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right nav-pills'],
                'items' => $menuItems,
            ]);
            NavBar::end();
        ?>
        
       
        
        
        <?php 
        /*if(!Yii::$app->user->isGuest){
            if(Yii::$app->session->hasFlash('success')){
                 echo Yii::$app->session->getFlash('success');
              }
              if(Yii::$app->session->hasFlash('error')){
                 echo Yii::$app->session->getFlash('error');
              }

                //echo Yii::$app->session->setFlash('success', "Note: If you'd uploaded product(s) on live and product status(s)'re still 'Under Jet review' then please raise a ticket from Jet Partner Panel <a href='https://partner.jet.com/support' target='_blank'>Request Support</a>.");
            }
        */
        ?>
       
        <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
         <?php  if(!Yii::$app->user->isGuest){?>
        <div class="yii_notice">
				<!--<span class="glyphicons glyphicons-envelope" aria-hidden="true"></span>-->
				If you'd uploaded product(s) on live and product status(s)'re still
				'Under Jet review' then please raise a ticket from Jet Partner Panel
				<a target="_blank" href="https://partner.jet.com/support">Request
					Support</a>
			</div>
        <?php include "notification.php";?>
        <?php }?>
        <?= Alert::widget() ?>
       <!-- Searching box -->
			<!-- code end --> 
            <?= $content ?>
        </div>

	</div>
	<?php 
	$merchant_id=Yii::$app->user->identity->id;
	//Jetappdetails::checkConfiguration($merchant_id)==false
	
	if(!\Yii::$app->user->isGuest)
	{
		$uri = array();
		if(isset($_SERVER['REQUEST_URI']))
		{
			$uri=explode('/',$_SERVER['REQUEST_URI']);
		}
		if(Jetappdetails::checkConfiguration($merchant_id)==false && !(in_array("how-to-sell-on-jet-com",$uri)))
		{
			include "configpopup.php";
		}
	}	?>
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
				apiKey: "<?php echo "5c6572757797b3edb02915535ce47d11";?>",
				shopOrigin: "<?php echo "https://".\Yii::$app->user->identity->username;?>"
			});
			ShopifyApp.ready(function(){
				ShopifyApp.Bar.initialize({
				//icon: "https://lay-buys.com/vt/themes/hebo/img/LAY-BUYS-logo-medium.png",
				//title: "Account Details"
				});
			});
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
		$('.carousel').carousel({
		    interval: false,
		}); 
		if ( self !== top ) {
     		// var head1=$('head', self.document);
     		var head1=$(self.document).find('head');
     		console.log(head1);
			var url = '<?= Yii::$app->getUrlManager()->getBaseUrl();?>/css/embapp.css';
			head1.append($("<link/>", { rel: "stylesheet", href: url, type: "text/css" } ));
			$('.logout_merchant').css('display','none');
		}
	</script>
</body>
</html>
<?php $this->endPage() ?>
