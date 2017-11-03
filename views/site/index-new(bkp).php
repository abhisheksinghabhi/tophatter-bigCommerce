<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;

?>
<style>
  .wrap .container {
    width: 100%;
  }
  .install-me{
   margin-top: 1%;
 }
</style>
<div id="home-page">
 <?php
 $this->registerCssFile(Yii::$app->request->baseUrl."/css/animate.min.css"); 
 $this->registerCssFile(Yii::$app->request->baseUrl."/css/creative.css");    

 ?>
 <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <a class="navbar-brand page-scroll" href="#home-page" ><img alt="Ced Commerce" src="<?= Yii::$app->request->baseUrl; ?>/images/logo.png"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a class="page-scroll" href="#features">Features</a>
        </li>
        <li>
          <a class="page-scroll" href="#services">Services</a>
        </li>
        <li>
          <a class="page-scroll" href="#pricing">Pricing</a>
        </li>
        <li>
          <a class="page-scroll" href="#contact">Contact</a>
        </li>
                    <!-- <li>
                        <a class="page-scroll" href="<?php echo Yii::$app->request->baseUrl ?>/how-to-sell-on-walmart-com" target="_blank">How to Sell on walmart?</a>
                      </li> -->
                    </ul>
                  </div>
                  <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
              </nav>


              <!-- new header -->
              <div class="header-content-new">
                <div class="container">
                  <div class="header-conetent-new-wrap ">
                    <h1 class="wow fadeInUp">Start Selling <br>
                      <strong style="font-style: italic; font-size: 35px;">On</strong>
                    </h1>
                    <img class="img-responsive wow fadeInUp" data-wow-delay="0.2s" style="margin-top: 0;" src=<?= Yii::$app->request->getBaseUrl().'/images/walmart.png'?>>
                    <p class="wow fadeInUp" data-wow-delay="0.3s">All in one platform for merchants to list products on walmart marketplace and manage their inventory, order and shipping</p>
                    <?php $form = ActiveForm::begin([
                      'id' => 'login-form',
                      'options' => ['class' => 'form-horizontal wow fadeInUp'],
                      'action'  => \yii\helpers\Url::toRoute(['/walmart/site/login']),
                      'fieldConfig' => [
                      'template' => "{label}\n<div class=\"col-lg-12 shop-url-wrap\">{input}</div>",
                      ],
                      ]); ?>

                      <?= $form->field($model, 'username')->textInput(['placeholder'=>'www.example.com'])->label('') ?>

                      <?= Html::submitButton('Install', ['class' => 'install-me btn btn-primary button-inline btn btn-primary btn-xl page-scroll button-install ', 'name' => 'login-button']) ?>
                      <?php ActiveForm::end(); ?>
                    </div>
                  </div>
                </div>
                <!-- header new end -->
                <section class="bg-primary" id="features">
                  <div class="container">
                    <div class="row">
                      <div class="common_heading_wrapp bot_mrg">
                        <h1 class="wow fadeInDown" data-wow-delay="">Doing it for you</h1>
                        
                        <img class="wow fadeInDown" data-wow-delay="0.3s" style="margin-top: 0;" src=<?= Yii::$app->request->getBaseUrl().'/images/divider.png'?>>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-xs-12 text-center">
                        <div class="row">
                          <div class="columns-wrap">
                            <div class="col-md-4 columns">
                              <div class="panels panels-shortcode row">
                                <div class="col-xs-12 panel-item margin-bottom-60">
                                  <div class="panels-icon text-color-theme">
                                    <img class="img-responsive wow fadeInDown" src=<?= Yii::$app->request->getBaseUrl().'/images/005.png'?>>
                                  </div>
                                  <div class="panels-text wow fadeInUp">
                                    <h6>Auto Acknowledge Orders</h6>
                                    Auto accepts orders within 15 minutes
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-4 columns">
                              <div class="panels panels-shortcode row">
                                <div class="col-xs-12 panel-item margin-bottom-60">
                                  <div class="panels-icon text-color-theme">
                                    <img class="img-responsive wow fadeInDown" src=<?= Yii::$app->request->getBaseUrl().'/images/044.png'?>>
                                  </div>
                                  <div class="panels-text wow fadeInUp">
                                    <h6>Products Synchronization</h6>
                                    Updates any changes in products real time
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-4 columns">
                              <div class="panels panels-shortcode row">
                                <div class="col-xs-12 panel-item margin-bottom-60">
                                  <div class="panels-icon text-color-theme">
                                   <img class="img-responsive wow fadeInDown" src=<?= Yii::$app->request->getBaseUrl().'/images/031.png'?>>
                                 </div>
                                 <div class="panels-text wow fadeInUp">
                                  <h6>Orders Management</h6>
                                  Easily import products and make them ready for fulfillment       
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="columns-wrap">
                          <div class="col-md-4 columns">
                            <div class="panels panels-shortcode row">
                             <div class="col-xs-12 panel-item margin-bottom-60">
                              <div class="panels-icon text-color-theme">
                               <img class="img-responsive wow fadeInDown" src=<?= Yii::$app->request->getBaseUrl().'/images/094.png'?>>
                             </div>
                             <div class="panels-text wow fadeInUp">
                               <h6>Variants Product Support</h6>
                               Virtual or real, supports any product
                             </div>
                           </div>
                         </div>
                       </div>
                       <div class="col-md-4 columns">
                        <div class="panels panels-shortcode row">
                         <div class="col-xs-12 panel-item margin-bottom-60">
                          <div class="panels-icon text-color-theme">
                           <img class="img-responsive wow fadeInDown" src=<?= Yii::$app->request->getBaseUrl().'/images/042.png'?>>
                         </div>
                         <div class="panels-text wow fadeInUp">
                           <h6>Realtime Error Handling</h6>
                          Get error details preventing products from uploading
                         </div>
                       </div>
                     </div>
                   </div>
                   <div class="col-md-4 columns">
                    <div class="panels panels-shortcode row">
                     <div class="col-xs-12 panel-item margin-bottom-60">
                      <div class="panels-icon text-color-theme">
                        <img class="img-responsive wow fadeInDown" src=<?= Yii::$app->request->getBaseUrl().'/images/089.png'?>>
                      </div>
                      <div class="panels-text wow fadeInUp">
                       <h6>Fully Featured Dashboard</h6>
                       Comprehensive dashboard accounting for all sales
                     </div>
                   </div>
                 </div>
               </div>
             </div>
           </div>
           <a id="get-start" class="btn btn-primary button-inline btn btn-primary btn-xl page-scroll button-install page-scroll wow fadeInDown" data-wow-delay="" href="#home-page">Get Started!</a>
         </div>
       </div>
     </div>
   </section>

   <section id="services" class="ced-blue-bg">
    <div class="container">
      <div class="row">
        <div class="common_heading_wrapp bot_mrg">
          <h1 class="wow fadeInDown" data-wow-delay="">Getting from it</h1>
          <img class="wow fadeInDown" data-wow-delay="0.3s" style="margin-top: 0;" src=<?= Yii::$app->request->getBaseUrl().'/images/divider-white.png'?>>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">

        <div class="col-lg-3 col-md-6 text-center">
          <div class="service-box">
            <i class="fa fa-4x fa-paper-plane wow fadeInDown text-primary" data-wow-delay=".1s"></i>
            <h3 class="wow fadeInUp">Instant Notifications</h3>
            <p class="text-muted wow fadeInUp">Whenever an order comes  from Walmart</p>
          </div>
        </div>               
        <div class="col-lg-3 col-md-6 text-center">
          <div class="service-box">
            <i class="fa fa-4x fa-usd wow fadeInDown text-primary"></i><i class="fa fa-4x fa-usd wow fadeInDown text-primary"></i>
            <h3 class="wow fadeInUp">Regular Earning</h3>
            <p class="text-muted wow fadeInUp">Sustainable channel for continuous income</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 text-center">
          <div class="service-box">
            <i class="fa fa-4x fa-newspaper-o wow fadeInDown text-primary" data-wow-delay=".2s"></i>
            <h3 class="wow fadeInUp">Complete Documentation</h3>
            <p class="text-muted wow fadeInUp">Demo, User Guide, Snapshots and Video</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <div class="service-box">
            <i class="fa fa-4x fa-heart wow fadeInDown text-primary" data-wow-delay=".3s"></i>
            <h3 class="wow fadeInUp">Recurring Updates</h3>
            <p class="text-muted wow fadeInUp">Free updates for every Walmart released updates</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="new_pricing_wrap" id="pricing">
	<div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Pricing</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container-fluid">
          	<div class="col-xs-12 col-sm-6 col-sm-offset-3">
			  <div class="jet-plan-wrapper active">
			      <h3 class="plan-heading">Yearly plan</h3>
			      <div class="plan-wrapper">
			      <span class="price"><strong>$299</strong>/yr</span>
                  
			      <div class="clear"></div>
			      <a href="http://cedcommerce.com/bigcommerce-extensions/jet-bigcommerce-integration" class="btn btn-primary button-inline btn btn-primary btn-xl page-scroll button-install">Add to cart</a>
			      <div class="what-can-do">
				<p class="plush-sign1">+</p>
				  <ul>
				    <li class="yes">Discount</li>
                  	<li class="yes"> Number of products Upload On Walmart </li>
                  	<li class="no"> Number of Orders fulfill on Walmart </li>
                  	<li class="yes"> 24/7 support </li>
                  	<li class="yes"> Transaction fees </li>
                  	<li class="last no"> Real-time fulfillment </li>
				  </ul>
			      </div>
			    </div>
			  </div>
		  </div>  
		<div style="clear:both"></div>
		<div class="extra-plane">
			<div class="col-xs-12">
			  <p class="plush-sign1">+</p>
			</div>
			  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			      <img height="auto" width="100" src="<?= Yii::$app->request->baseUrl;?>/images/free_installation1.png" class="sub-feature-images1">
			      <div class="extra-features-text">Free Installation</div>
			  </div>
			  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			    <img height="auto" width="100" src="<?= Yii::$app->request->baseUrl;?>/images/free_support1.png" class="sub-feature-images1">
			    <div class="extra-features-text">Free Support</div>
			  </div>
			  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			    <img height="auto" width="100" src="<?= Yii::$app->request->baseUrl;?>/images/document.png" class="sub-feature-images1">
			    <div class="extra-features-text">Documention</div>
			  </div>
			  <div style="clear:both"></div>
		  </div>

        </div>
    </section>

  

<!-- custome support -->
<section class="customer_support">
    <div class="container">
        <div class="common_heading_wrapp bot_mrg">
            <h1>Catch Points</h1>
            <p>How far we go, if you want</p>
            <img style="margin-top: 0;" src=<?= Yii::$app->request->getBaseUrl().'/images/divider.png'?>>
        </div>
        <div class="extra-plane">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <img class="sub-feature-images1" src="/integration/images/free_installation1.png" height="auto" width="100">
                <div class="extra-features-text">Free Configuration & Uploading</div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <img class="sub-feature-images1" src="/integration/images/free_support1.png" height="auto" width="100">
                <div class="extra-features-text">Expert Training</div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <img class="sub-feature-images1" src="/integration/images/document.png" height="auto" width="100">
                <div class="extra-features-text">Documention</div>
            </div>
            <div style="clear:both"></div>
        </div>
    </div>
</section>
<!-- customer support -->
<aside class="ced-blue-bg">
  <div class="container text-center">
    <div class="call-to-action">
      <h2>Install app for Free</h2>
      <a href="#page-top" class="btn btn-default btn-xl wow tada" onClick="$('html,body').animate({scrollTop:0},'slow');return false;">Install Now!</a>
    </div>
  </div>
</aside>

<section id="contact">
  <div class="container">
    <div class="row">
      <div class="common_heading_wrapp bot_mrg">
            <h1>Let's Get In Touch!</h1>
            <p>Ready to start Shopify - walmart Integration ? That's great! <br> 
            Send us a query or email us and we will get back to you soon</p>
            <img style="margin-top: 0;" src=<?= Yii::$app->request->getBaseUrl().'/images/divider.png'?>>
      </div>
      <div class="col-lg-4 col-lg-offset-2 text-center">
        <i class="fa fa-ticket fa-3x wow bounceIn"></i>
        <p><a href="http://support.cedcommerce.com" target="_blank">support.cedcommerce.com</a></p>
      </div>
      <div class="col-lg-4 text-center">
        <i class="fa fa-envelope-o fa-3x wow bounceIn" data-wow-delay=".1s"></i>
        <p><a href="mailto:shopify@cedcommerce.com">shopify@cedcommerce.com</a></p>
      </div>
    </div>
  </div>
</div>
</section>

<!-- jQuery -->
<?php /* <script src="js/jquery.js"></script>*/ ?>

<!-- Bootstrap Core JavaScript -->
<?php /*<script src="js/bootstrap.min.js"></script> */ ?>

<!-- Plugin JavaScript -->

<?php $this->registerJsFile(Yii::$app->request->baseUrl.'/js/bootstrap.min.js',['depends' => [\yii\web\JqueryAsset::className()]]); ?>

<?php $this->registerJsFile(Yii::$app->request->baseUrl.'/js/jquery.easing.min.js',['depends' => [\yii\web\JqueryAsset::className()]]); ?>
<?php $this->registerJsFile(Yii::$app->request->baseUrl.'/js/jquery.fittext.js',['depends' => [\yii\web\JqueryAsset::className()]]); ?>
<?php $this->registerJsFile(Yii::$app->request->baseUrl.'/js/wow.min.js',['depends' => [\yii\web\JqueryAsset::className()]]); ?>

<?php $this->registerJsFile(Yii::$app->request->baseUrl.'/js/creative.js',['depends' => [\yii\web\JqueryAsset::className()]]); ?>


<?php /*
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/jquery.fittext.js"></script>
    <script src="js/wow.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/creative.js"></script> */ ?>

    <!-- Custom Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>


    <script type="text/javascript">


    /*$jQuery('#get-start').on('click', function(){
        $jQuery('html, body').animate({scrollTop:0}, 'slow');
        //$j(this).fadeOut();
      });*/

    </script>
<style>
.col-lg-4 col-md-4 col-sm-6 col-xs-12{
	width: 500px;
}
</style>