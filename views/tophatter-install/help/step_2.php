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
						 <h3 id="sec1">Tophatter Api Details</h3>
						 	<br>
					      

					            <img class="image-edit" src="<?= Yii::$app->request->baseUrl; ?>/images/guide/tophatter/tophatter-config1.png" alt="configuration-settings" />
					        	<p>To successfully integrate your Shopify Store with Tophatter and start selling on it, few settings are required to be configured. </p><p>
					            <span class="applicable">After clicking on “Continue” button on the Tophatter Shopify integration app, a configuration pop-up gets displayed. </span><span>Here, you are required to enter <b>Tophatter API DETAILS</b> i.e. <b>Tophatter Consumer Id</b>, <b>API Secret Key</b> and <b>Channel Type Id</b>. Thereafter, Click VALIDATE button.</span>
					            <p>
					            In order to obtain <b>Tophatter Consumer Id, API Secret Key and Channel Type Id </b> the merchant needs to login to his Tophatter Seller Panel. Click on the Settings icon > API option.
					            </p>
					            <p>    
					                  <img class="image-edit" src="<?= Yii::$app->request->baseUrl; ?>/images/tophatter-guide/get-tophatter-api-1.png" alt="configuration-settings-new"/>
					            </p>
					              <p>
					                Copy the <b>“Consumer ID” </b>, click on the <b>“Regenerate Key”</b> button to regenerate the secret key and copy the “Consumer Channel Type Id” from your tophatter seller panel one by one and paste these keys in the Configuration settings of the app.
					              </p>    
					                  <img class="image-edit" src="<?= Yii::$app->request->baseUrl; ?>/images/tophatter-guide/get-tophatter-api-2.png" alt="configuration-settings-new1" />
					              <p>    
					                  When you click on the <b>“Regenerate Key”</b> button then, a popup appears. Click <b>“Yes, Regenerate Key”</b> button, a new Secret Key is generated.
					                  <img class="image-edit" src="<?= Yii::$app->request->baseUrl; ?>/images/tophatter-guide/get-tophatter-api-3.png" alt="live-api"/>
					                   After that copy <b>“Consumer ID”, “Secret Key” and “Consumer Channel Type Id” </b> one by one, then paste these in the respective fields of the tophatter Shopify Integration app’s configuration settings.
					                  <img class="image-edit" src="<?= Yii::$app->request->baseUrl; ?>/images/tophatter-guide/get-tophatter-api-4.png" alt="live-api"/>
					                   Now that Shopify store is integrated with tophatter, importing products on tophatter from Shopify is the second step to start selling on tophatter.
					                  					                
					              </p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
