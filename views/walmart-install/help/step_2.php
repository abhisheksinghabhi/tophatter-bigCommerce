<?php
use yii\helpers\Html;
use yii\base\view;
?>
<style>
.fixed-container-body-class {
    padding-top: 0;
}
	.image-edit {
  box-shadow: 0 2px 15px 0 rgba(78, 68, 137, 0.3);
  height: auto;
  margin-bottom: 20px;
  margin-top: 20px;
  padding: 15px;
  width: 100%;
}
</style>
<div class="page-content jet-install">
	<div class="container">
		<div class="row">
			<div class="col-lg-offset-2 col-md-offset-2 col-lg-8 col-md-8 col-sm-12 col-xs-12">
				<div class="content-section">
					<div class="form new-section">
						 <h3 id="sec1">Walmart Api Details</h3>
						 	<br>
					      

					            <img class="image-edit" src="<?= Yii::$app->request->baseUrl; ?>/images/guide/walmart/walmart-config1.png" alt="configuration-settings" />
					        	<p>To successfully integrate your Shopify Store with Walmart and start selling on it, few settings are required to be configured. </p><p>
					            <span class="applicable">After clicking on “Continue” button on the Walmart Shopify integration app, a configuration pop-up gets displayed. </span><span>Here, you are required to enter <b>WALMART API DETAILS</b> i.e. <b>Walmart Consumer Id</b>, <b>API Secret Key</b> and <b>Channel Type Id</b>. Thereafter, Click VALIDATE button.</span>
					            <p>
					            In order to obtain <b>Walmart Consumer Id, API Secret Key and Channel Type Id </b> the merchant needs to login to his Walmart Seller Panel. Click on the Settings icon > API option.
					            </p>
					            <p>    
					                  <img class="image-edit" src="<?= Yii::$app->request->baseUrl; ?>/images/walmart-guide/get-walmart-api-1.png" alt="configuration-settings-new"/>
					            </p>
					              <p>
					                Copy the <b>“Consumer ID” </b>, click on the <b>“Regenerate Key”</b> button to regenerate the secret key and copy the “Consumer Channel Type Id” from your Walmart seller panel one by one and paste these keys in the Configuration settings of the app.
					              </p>    
					                  <img class="image-edit" src="<?= Yii::$app->request->baseUrl; ?>/images/walmart-guide/get-walmart-api-2.png" alt="configuration-settings-new1" />
					              <p>    
					                  When you click on the <b>“Regenerate Key”</b> button then, a popup appears. Click <b>“Yes, Regenerate Key”</b> button, a new Secret Key is generated.
					                  <img class="image-edit" src="<?= Yii::$app->request->baseUrl; ?>/images/walmart-guide/get-walmart-api-3.png" alt="live-api"/>
					                   After that copy <b>“Consumer ID”, “Secret Key” and “Consumer Channel Type Id” </b> one by one, then paste these in the respective fields of the Walmart Shopify Integration app’s configuration settings.
					                  <img class="image-edit" src="<?= Yii::$app->request->baseUrl; ?>/images/walmart-guide/get-walmart-api-4.png" alt="live-api"/>
					                   Now that Shopify store is integrated with Walmart, importing products on Walmart from Shopify is the second step to start selling on Walmart.
					                  					                
					              </p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
