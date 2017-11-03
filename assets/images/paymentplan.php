<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Tabs;
?>
<style>
.screenshot_images {
    float: right;
    margin-top: 5px;
}
.ced_price-box {
 /*  border-bottom: 1px dashed #ccc;
  border-top: 1px dashed #ccc; */
  width:100%;
  text-align:center;
  font-size:60px;
 }
 .addtocart{
 	background:none repeat scroll 0 0 #FF5200;
 	border-radius:5px;
 	color: #FA942F;
 	display: inline-block;
    font-size: 16px;
    font-weight: bold;
    margin-bottom: 19px;
    padding: 11px 92px;
    font-color:white;
 }
 .addtocart  {
    font-color: white ;!important;
}
ol, ul {
  list-style: none;
  margin: 0;
  padding: 0;
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    list-style: decimal outside;
}
.what-can-do li {
    background-position: 158px 8px;
    background-repeat: no-repeat;
    background-size: 20px auto;
    font-size: 15px;
    line-height: 30px;
    list-style: outside none none;
    margin-bottom: 5px;
    padding-left: 190px;
    text-align: left;
}
.jet-plan-wrapper {
	width: 40%;
}
.price_val{
font-size:30px;
font-weight: bold;
}
.rateit{
	color: #469ccf;
    font-family: "Glyphicons Halflings";
    font-size: 14px;
    font-weight: 400;
}
</style>
<div class="payment_preview">
	<h2>Thank you for using Jet-Integration App</h2>
	 <!-- <div class="jet-plan-wrap">
     <div class="col-xs-12 sub-feature-heading">
     	<h1>Thank you for using Jet-Integration App</h1>
      </div> 
      
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="jet-plan-wrapper">
              <h3 class="plan-heading">Yearly plan</h3>
              <div class="plan-wrapper">
                <span class="old-price">$360</span>
                <span class="price"><strong>$299</strong> per year</span>
                
                <a href="http://cedcommerce.com/shopify-extensions/jet-shopify-integration"><div class="addtocart">Add to cart</div></a>
                <p class="push-sign"></p>
                <div class="what-can-do">
                  <p class="plush-sign1">+</p>
                    <ul>
                      <li>Simple and Variants Product Management</li>
                      <li>Mapping Jet Category with Product Type</li>
                      <li>Inventory Synchronization</li>
                      <li>Order Management</li>
                      <li>Return Management</li>
                      <li>Settlement</li>
                      <li>Flat 30% Saving</li>
                    </ul>
                </div>
              </div>
          </div>
      </div> -->
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      	  <h3>Just one click to pay for app</h3>
          <div class="jet-plan-wrapper active">
              <h3 class="plan-heading">Recurring Payment Plan</h3>
              <div class="plan-wrapper">
              <span class="price_val">$</span><span style="font-size:80px;font-weight: bold;">30</span><span class="price_val">/mo</span>
              <div class="clear"></div>
              <a href="<?= Yii::$app->request->getBaseUrl().'/site/paymentplan?plan=1' ?>">
              	<div class="addtocart"> 
	              	Start
					<span class="freeDayNum">30</span>
					day free trial 
				</div>
			 </a>
              <div class="what-can-do">
                <p class="plush-sign1">+</p>
                <ul>
                  <li>Lowest Price</li>
                  <li>Real Time Sync</li>
                </ul>
              </div>
            </div>
          </div>
    </div>
    <div style="clear:both"></div> 
	  <h3>Follow 3 fluid steps to connect your store with Jet marketplace</h3>
	  <div class="panel-group" id="accordion">
	     <div class="panel panel-default">
		     <div class="panel-heading">
		        <h4 class="panel-title">
		          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
		          	<i class="fa fa-plus-circle" aria-hidden="true"></i> Login to get test api from Jet Partner Panel
		          </a>
		        </h4>
		      </div>
		      <div id="collapse1" class="panel-collapse collapse">
		        	<div class="panel-body">
		        		<a id="test_api" class="screenshot_images" data-toggle="modal" data-target=".bs-example-modal-lg" href="javascript:void(0);" title="Screenshot" onclick="changeImage(this.id)"><i class="fa fa-camera fa-2x" aria-hidden="true"></i></a>
		        		-&nbsp;&nbsp;Login on Jet Partner Panel <a href="https://partner.jet.com/login" target="_blank" >here</a>.
		        		<br>-&nbsp;&nbsp;Goto <b>API</b> section to get api user,secret and merchant id.
		        		<br>-&nbsp;&nbsp;For Fulfillment node id,goto <b>fulfillment</b> section.
		        		
		        	</div>
		      </div> 
	    </div>
	    <div class="panel panel-default">
		      <div class="panel-heading">
		        <h4 class="panel-title">
		          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
		          	<i class="fa fa-plus-circle" aria-hidden="true"></i> Activate jet api
		          </a>
		        </h4>
		      </div>
		      <div id="collapse2" class="panel-collapse collapse">
		        <div class="panel-body">
		        	<a id="activate_image" class="screenshot_images" data-toggle="modal" data-target=".bs-example-modal-lg" href="javascript:void(0);" title="Screenshot" onclick="changeImage(this.id)"><i class="fa fa-camera fa-2x" aria-hidden="true"></i></a>
		        	Enter test api(s) and fulfillment node received from jet. After that click on "activate api".
		        </div>
		      </div>
	    </div>
	    <div class="panel panel-default">
	      <div class="panel-heading">
	        <h4 class="panel-title">
	          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
	          	<i class="fa fa-plus-circle" aria-hidden="true"></i> Save jet live api
	          </a>
	        </h4>
	      </div>
	      <div id="collapse3" class="panel-collapse collapse">
	      	<a id="live_api" class="screenshot_images" data-toggle="modal" data-target=".bs-example-modal-lg" href="javascript:void(0);" title="Screenshot" onclick="changeImage(this.id)"><i class="fa fa-camera fa-2x" aria-hidden="true"></i></a>
	        <div class="panel-body">After successfully activation of jet api(s).Reload jet partner panel and get live api credentials on dashboard.</div>
	      </div>
	    </div>
  	</div>
  	 <div class="extra-plane">
        <div class="col-xs-12">
          <p class="plush-sign1">+</p>
        </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
              <img class="sub-feature-images1" src="<?php echo Yii::$app->request->baseUrl?>/images/free_installation1.png" width="100" height="auto">
              <div class="extra-features-text">Free Installation</div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <img class="sub-feature-images1" src="<?php echo Yii::$app->request->baseUrl?>/images/free_support1.png" width="100" height="auto">
            <div class="extra-features-text">Free Support</div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <img class="sub-feature-images1" src="<?php echo Yii::$app->request->baseUrl?>/images/document.png" width="100" height="auto">
            <div class="extra-features-text">Documention</div>
          </div>
          <div style="clear:both"></div>
      </div> 
      <!-- boostrap model popup for images --> 
      <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg">
		    <div class="modal-content">
		      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				  <!-- Wrapper for slides -->
				  <div class="carousel-inner">
				  	<div class="item active">
				     <img class="img-responsive" src="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/images/guide/test-api.png" alt="Login">
				      <div class="carousel-caption">
				        Login on jet partner panel
				      </div>
				    </div>
				    <div class="item">
				     <img class="img-responsive" src="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/images/guide/test-api.png" alt="test api">
				      <div class="carousel-caption">
				        API Section
				      </div>
				    </div>
				    <div class="item">
				      <img class="img-responsive" src="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/images/guide/fulfillment-node.png" alt="fulfillment node">
				      <div class="carousel-caption">
				        Fulfillment Section
				      </div>
				    </div>
				    <div class="item">
				      <img class="img-responsive" src="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/images/guide/live-api.png" alt="api congiguration">
				      <div class="carousel-caption">
				        Enter test api on app
				      </div>
				    </div>
				     <div class="item">
				      <img class="img-responsive" src="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/images/guide/live-api.png" alt="live api">
				      <div class="carousel-caption">
				        Live api on dashboard
				      </div>
				    </div>
				    <div class="item">
				      <img class="img-responsive" src="<?= Yii::$app->getUrlManager()->getBaseUrl();?>/images/guide/live-api.png" alt="save live api">
				      <div class="carousel-caption">
				        Enter and save live api
				      </div>
				    </div>
				  </div>
				  <!-- Controls -->
				  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
				    <span class="glyphicon glyphicon-chevron-left"></span>
				  </a>
				  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
				    <span class="glyphicon glyphicon-chevron-right"></span>
				 </a>
			 </div>
		  </div>
	   </div>
	</div>
	<!-- review slider -->
	<div class="customer col-md-12 clearfix">
        <h1 class="text-center text-black">
   			 Clients <span class="customer-color">love</span> <span class="customer-color">Jet-Integration</span>,<br>we believe so will you
		</h1>
		<div class="col-md-12 customer-review">
            <div class="row">
				<div data-ride="carousel" class="carousel slide" id="review-slider">
					<!-- Wrapper for slides -->
				    <div class="carousel-inner">
				        <div class="item">
				            <div class="bk-item col-md-12">
				    			<div class="row">
							        <div class="col-sm-3 col-md-3">
							            <div class="row">
							                <div class="img-customer">
							                     <img class="lazy-loading" data-src="<?= Yii::$app->request->getBaseUrl().'/images/logo-rnd.png' ?>" src="<?= Yii::$app->request->getBaseUrl().'/images/logo-rnd.png' ?>">
							                </div>
							            </div>
							        </div>
							        <div class="col-sm-9 col-md-9">
							            <div class="row">
							                <div class="infomation-shop">
							                    <div class="review">
							                        <span class="rateit">
							                             <i class="glyphicon glyphicon-star"></i>
							                             <i class="glyphicon glyphicon-star"></i>
							                             <i class="glyphicon glyphicon-star"></i>
							                             <i class="glyphicon glyphicon-star"></i>
							                             <i class="glyphicon glyphicon-star"></i>
							                        </span>
							                    </div>
							                    <div class="name-shop">
							                        <a target="_blank" href="https://www.rndaccessories.com/">Rnd Power Solutions</a>
							                    </div>
							                    <div class="information">
							                        So far so good with this app, Be aware that Jet.com right now takes weeks and even months to upload product on their site as they go over every item uploaded by merchants so please be patient.
							                    </div>
							                </div>
							            </div>
							        </div>
				    			</div>
							</div>
				       </div>
				        <div class="item active">
				            <div class="bk-item col-md-12">
							    <div class="row">
							        <div class="col-sm-3 col-md-3">
							            <div class="row">
							                <div class="img-customer">
							                    <img class="lazy-loading" data-src="<?= Yii::$app->request->getBaseUrl().'/images/logo-desk.png' ?>" src="<?= Yii::$app->request->getBaseUrl().'/images/logo-desk.png' ?>">
							                </div>
							            </div>
							        </div>
							        <div class="col-sm-9 col-md-9">
							            <div class="row">
							                <div class="infomation-shop">
							                    <div class="review">
							                        <span class="rateit">
							                        	<i class="glyphicon glyphicon-star"></i>
							                         	<i class="glyphicon glyphicon-star"></i>
							                         	<i class="glyphicon glyphicon-star"></i>
							                            <i class="glyphicon glyphicon-star"></i>
							                            <i class="glyphicon glyphicon-star"></i>
							                        </span>
							                    </div>
							                    <div class="name-shop">
							                        <a target="_blank" href="http://www.purpleprintz.com/">Desk Jockey</a>
							                    </div>
							                    <div class="information">
							                        App works. WIll allow you to sell on Jet through your shopify store pretty seamlessly. 
							                        Support is very good, and very patient and walked me thorough setup. Once you do it once its super easy. Highly recommend!
							                    </div>
							                </div>
							            </div>
							        </div>
							    </div>
							</div>
				       </div>
				       <div class="item">
				            <div class="bk-item col-md-12">
				    			<div class="row">
							        <div class="col-sm-3 col-md-3">
							            <div class="row">
							                <div class="img-customer">
							                    <img class="lazy-loading" data-src="<?= Yii::$app->request->getBaseUrl().'/images/logo-filter.png' ?>" src="<?= Yii::$app->request->getBaseUrl().'/images/logo-filter.png' ?>">
							                </div>
							            </div>
							        </div>
							        <div class="col-sm-9 col-md-9">
							            <div class="row">
							                <div class="infomation-shop">
							                    <div class="review">
							                        <span class="rateit">
							                            <i class="glyphicon glyphicon-star"></i>
							                            <i class="glyphicon glyphicon-star"></i>
							                            <i class="glyphicon glyphicon-star"></i>
							                            <i class="glyphicon glyphicon-star"></i>
							                            <i class="glyphicon glyphicon-star"></i>                                
							                        </span>
							                    </div>
							                    <div class="name-shop">
							                        <a target="_blank" href="http://filter-dudez.myshopify.com">Filter Dudez</a>
							                    </div>
							                    <div class="information">
							                        So far so good.Excellent feature to upload products in bulk on Jet. Great support, I would highly recommend this app!!
							                    </div>
							                </div>
							            </div>
							        </div>
				    			</div>
							</div>
				       </div>
				       <div class="item">
				            <div class="bk-item col-md-12">
				    			<div class="row">
							        <div class="col-sm-3 col-md-3">
							            <div class="row">
							                <div class="img-customer">
							                    <img class="lazy-loading" data-src="<?= Yii::$app->request->getBaseUrl().'/images/logo-costumeish.png' ?>" src="<?= Yii::$app->request->getBaseUrl().'/images/logo-costumeish.png' ?>">
							                </div>
							            </div>
							        </div>
							        <div class="col-sm-9 col-md-9">
							            <div class="row">
							                <div class="infomation-shop">
							                    <div class="review">
							                        <span class="rateit">
							                            <i class="glyphicon glyphicon-star"></i>
							                            <i class="glyphicon glyphicon-star"></i>
							                            <i class="glyphicon glyphicon-star"></i>
							                            <i class="glyphicon glyphicon-star"></i>
							                            <i class="glyphicon glyphicon-star"></i>                                
							                        </span>
							                    </div>
							                    <div class="name-shop">
							                        <a target="_blank" href="http://costumeish.myshopify.com">Costumeish</a>
							                    </div>
							                    <div class="information">
							                        Brilliant App.Uploaded my products to jet.com go for it.
							                    </div>
							                </div>
							            </div>
							        </div>
				    			</div>
							</div>
				       </div>
				       <div class="item">
				            <div class="bk-item col-md-12">
				    			<div class="row">
							        <div class="col-sm-3 col-md-3">
							            <div class="row">
							                <div class="img-customer">
							                    <img class="lazy-loading" data-src="<?= Yii::$app->request->getBaseUrl().'/images/logo-likeprime.png' ?>" src="<?= Yii::$app->request->getBaseUrl().'/images/logo-likeprime.png' ?>">
							                </div>
							            </div>
							        </div>
							        <div class="col-sm-9 col-md-9">
							            <div class="row">
							                <div class="infomation-shop">
							                    <div class="review">
							                        <span class="rateit">
							                            <i class="glyphicon glyphicon-star"></i>
							                            <i class="glyphicon glyphicon-star"></i>
							                            <i class="glyphicon glyphicon-star"></i>
							                            <i class="glyphicon glyphicon-star"></i>
							                            <i class="glyphicon glyphicon-star"></i>                                
							                        </span>
							                    </div>
							                    <div class="name-shop">
							                        <a target="_blank" href="http://likeprime.myshopify.com">Likeprime</a>
							                    </div>
							                    <div class="information">
							                        I had installed the app for my shop. I am using it flawlessly. Yes it is little bit difficult to manage the UI interface of shopify jet app. But the due to strong support of CedCommerce team I am able to use it and upload my product. I must say a strong support of cedcommerce keep it up.
							                    </div>
							                </div>
							            </div>
							        </div>
				    			</div>
							</div>
				       	 </div>
				      </div>
				  </div>
                  <!-- Left and right controls -->
                   <a data-slide="prev" role="button" href="#review-slider" class="left carousel-control control-campaign-left">
                       <span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span>
                   </a>
                   <a data-slide="next" role="button" href="#review-slider" class="right carousel-control control-campaign-right">
                       <span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span>
                   </a>          
	         </div>
          </div>
       </div>
    </div>
</div>      